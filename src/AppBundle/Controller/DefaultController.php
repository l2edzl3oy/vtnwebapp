<?php

// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage")
     */
    public function indexAction()
    {
        $form = $this->createFormBuilder()
            ->add('username', 'text')
            ->add('password', 'password')
            ->add('login', 'submit')
            ->getForm();
        
        
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('AppBundle::login.html.twig', array(
            'form' => $form->createView(),
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
    
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request)
    {
        
        // Activate the next 4 lines for openstack integration
        //$currentUser = $this->getUser();
        //$username = $currentUser->getUsername();
        //$openstackTenantID = (string) $currentUser->getOpenstackTenantID();
        //$openstackTenantID = substr($openstackTenantID,0,12) . substr($openstackTenantID,13,19);
        
        // to remove the following 2 lines if not using global view
        $username = 'Global';
        $openstackTenantID = '';
        
        // For Openstack view
        //$vtns = json_decode($this->get('curl_service')->curl($openstackTenantID, 'GET', ''), true);
        ////foreach ($vtns["vtn"] as $vtn) {
        //    $vBridges[] = json_decode($this->get('curl_service')->curl($vtns["name"] . '/vbridges', 'GET', ''), true);
        //    foreach (end($vBridges)["vbridge"] as $vBridge) {
        //        $vBridgeInterfaces[] = json_decode($this->get('curl_service')->curl($vtns["name"] . '/vbridges/' . $vBridge["name"] . '/interfaces', 'GET', ''), true);
        //        foreach (end($vBridgeInterfaces)["interface"] as $interface) {
        //            $portmaps[] = json_decode($this->get('curl_service')->curl($vtns["name"] . '/vbridges/' . $vBridge["name"] . '/interfaces/' . $interface["name"] . '/portmap', 'GET', ''), true);
        //        }
        //    }
        ////}
        
        //For Global view
        $vtns = json_decode($this->get('curl_service')->curl($openstackTenantID, 'GET', ''), true);
        foreach ($vtns["vtn"] as $vtn) {
            $vBridges[] = json_decode($this->get('curl_service')->curl($vtn["name"] . '/vbridges', 'GET', ''), true);
            foreach (end($vBridges)["vbridge"] as $vBridge) {
                $vBridgeInterfaces[] = json_decode($this->get('curl_service')->curl($vtn["name"] . '/vbridges/' . $vBridge["name"] . '/interfaces', 'GET', ''), true);
                foreach (end($vBridgeInterfaces)["interface"] as $interface) {
                    $portmaps[] = json_decode($this->get('curl_service')->curl($vtn["name"] . '/vbridges/' . $vBridge["name"] . '/interfaces/' . $interface["name"] . '/portmap', 'GET', ''), true);
                }
            }
        }

        // Create VTN Form
        $createVTNForm = $this->container->get('form.factory')->createNamedBuilder('createVTN')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('description', 'text', array('label' => 'VTN Description (Optional)', 'required' => false))
                ->add('create', 'submit', array('label' => 'Create VTN'))
                ->getForm();
        $createVTNForm->handleRequest($request);
        if ($createVTNForm->isValid()) {
            $data = $createVTNForm->getData();
            $body = '{"description":"'.$data["description"].'"}';
            $this->get('curl_service')->curl($data["name"], 'POST', $body);
            return $this->redirect($this->generateUrl('admin'));
        }

        // Delete VTN Form
        $deleteVTNForm = $this->container->get('form.factory')->createNamedBuilder('deleteVTN')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('delete', 'submit', array('label' => 'Delete VTN'))
                ->getForm();
        $deleteVTNForm->handleRequest($request);
        if ($deleteVTNForm->isValid()) {
            $data = $deleteVTNForm->getData();
            $this->get('curl_service')->curl($data["name"], 'DELETE', '');
            return $this->redirect($this->generateUrl('admin'));
        }
        
        // Create vBridge Form
        $createVBridgeForm = $this->container->get('form.factory')->createNamedBuilder('createVBridge')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('vBridgeName', 'text', array('label' => 'vBridge Name'))
                ->add('description', 'text', array('label' => 'vBridge Description (Optional)', 'required' => false))
                ->add('create', 'submit', array('label' => 'Create vBridge'))
                ->getForm();
        $createVBridgeForm->handleRequest($request);
        if ($createVBridgeForm->isValid()) {
            $data = $createVBridgeForm->getData();
            $body = '{"description":"'.$data["description"].'", "ageInterval":"600"}';
            $this->get('curl_service')->curl($data["name"] . '/vbridges/' . $data["vBridgeName"], 'POST', $body);
            return $this->redirect($this->generateUrl('admin'));
        }

        // Delete vBridge Form
        $deleteVBridgeForm = $this->container->get('form.factory')->createNamedBuilder('deleteVBridge')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('vBridgeName', 'text', array('label' => 'vBridge Name'))
                ->add('delete', 'submit', array('label' => 'Delete vBridge'))
                ->getForm();
        $deleteVBridgeForm->handleRequest($request);
        if ($deleteVBridgeForm->isValid()) {
            $data = $deleteVBridgeForm->getData();
            $this->get('curl_service')->curl($data["name"] . '/vbridges/' . $data["vBridgeName"], 'DELETE', '');
            return $this->redirect($this->generateUrl('admin'));
        }

        // Create vBridge Interface Form
        $createVBridgeIfForm = $this->container->get('form.factory')->createNamedBuilder('createVBridgeIf')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('vBridgeName', 'text', array('label' => 'vBridge Name'))
                ->add('vBridgeIfName', 'text', array('label' => 'vBridge Interface Name'))
                ->add('description', 'text', array('label' => 'vBridge Interface Description (Optional)', 'required' => false))
                ->add('create', 'submit', array('label' => 'Create vBridge Interface'))
                ->getForm();
        $createVBridgeIfForm->handleRequest($request);
        if ($createVBridgeIfForm->isValid()) {
            $data = $createVBridgeIfForm->getData();
            $body = '{"description":"'.$data["description"].'", "enabled":"true"}';
            $this->get('curl_service')->curl($data["name"] . '/vbridges/' . $data["vBridgeName"] .'/interfaces/' . $data["vBridgeIfName"], 'POST', $body);
            return $this->redirect($this->generateUrl('admin'));
        }
        
        // Delete vBridge Interface Form
        $deleteVBridgeIfForm = $this->container->get('form.factory')->createNamedBuilder('deleteVBridgeIf')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('vBridgeName', 'text', array('label' => 'vBridge Name'))
                ->add('vBridgeIfName', 'text', array('label' => 'vBridge Interface Name'))
                ->add('delete', 'submit', array('label' => 'Delete vBridge Interface'))
                ->getForm();
        $deleteVBridgeIfForm->handleRequest($request);
        if ($deleteVBridgeIfForm->isValid()) {
            $data = $deleteVBridgeIfForm->getData();
            $this->get('curl_service')->curl($data["name"] . '/vbridges/' . $data["vBridgeName"] .'/interfaces/' . $data["vBridgeIfName"], 'DELETE', '');
            return $this->redirect($this->generateUrl('admin'));
        }
        
        // Create vBridge Interface Mapping Form
        $createPortMapForm = $this->container->get('form.factory')->createNamedBuilder('createPortMap')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('vBridgeName', 'text', array('label' => 'vBridge Name'))
                ->add('vBridgeIfName', 'text', array('label' => 'vBridge Interface Name'))
                ->add('nodeID', 'text', array('label' => 'Node ID'))
                ->add('portName', 'text', array('label' => 'Port Name'))
                ->add('create', 'submit', array('label' => 'Create vBridge Interface Port Mapping'))
                ->getForm();
        $createPortMapForm->handleRequest($request);
        if ($createPortMapForm->isValid()) {
            $data = $createPortMapForm->getData();
            $body = '{"node":{"type":"OF","id":"'.$data["nodeID"].'"},"port":{"name":"'.$data["portName"].'"}}';
            $this->get('curl_service')->curl($data["name"] . '/vbridges/' . $data["vBridgeName"] .'/interfaces/' . $data["vBridgeIfName"] . '/portmap', 'PUT', $body);
            return $this->redirect($this->generateUrl('admin'));
        }
        
        // Delete vBridge Interface Form
        $deletePortMapForm = $this->container->get('form.factory')->createNamedBuilder('deletePortMap')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('vBridgeName', 'text', array('label' => 'vBridge Name'))
                ->add('vBridgeIfName', 'text', array('label' => 'vBridge Interface Name'))
                ->add('delete', 'submit', array('label' => 'Delete vBridge Interface Port Mapping'))
                ->getForm();
        $deletePortMapForm->handleRequest($request);
        if ($deletePortMapForm->isValid()) {
            $data = $deletePortMapForm->getData();
            $this->get('curl_service')->curl($data["name"] . '/vbridges/' . $data["vBridgeName"] .'/interfaces/' . $data["vBridgeIfName"] . '/portmap', 'DELETE', '');
            return $this->redirect($this->generateUrl('admin'));
        }
        
        return $this->render('AppBundle::admin.html.twig', 
                array('username' => $username, 
                    'tenantID' => $openstackTenantID,
                    'vtns' => (empty($vtns) ? "No defined VTNs currently" : $vtns),
                    'vBridges' => (empty($vBridges)  ? "No defined vBridges currently" : $vBridges),
                    'vBridgeInterfaces' => (empty($vBridgeInterfaces)) ? "No defined vBridge Interfaces currently" : $vBridgeInterfaces,
                    'portmaps' => (empty($portmaps)) ? "No defined vBridge Interface Mappings currently" : $portmaps,
                    'createVTNForm' => $createVTNForm->createView(),
                    'deleteVTNForm' => $deleteVTNForm->createView(),
                    'createVBridgeForm' => $createVBridgeForm->createView(),
                    'deleteVBridgeForm' => $deleteVBridgeForm->createView(),
                    'createVBridgeIfForm' => $createVBridgeIfForm->createView(),
                    'deleteVBridgeIfForm' => $deleteVBridgeIfForm->createView(),
                    'createPortMapForm' => $createPortMapForm->createView(),
                    'deletePortMapForm' => $deletePortMapForm->createView()
                ));
    }
  
    
    /**
     * @Route("/admin/logic", name="logic")
     */
    public function logicAction(Request $request)
    {
        $flowconditions = json_decode($this->get('curl_service')->curl('flowconditions', 'GET', ''),true);
        
        // Create Flow Condition Form
        $createFlowCondForm = $this->container->get('form.factory')->createNamedBuilder('createFlowCond')
                ->add('name', 'text', array('label' => 'Flow Condition Name'))
                ->add('ethSrc', 'text', array('label' => '[L2] Source MAC', 'required' => false))
                ->add('ethDst', 'text', array('label' => '[L2] Destination MAC', 'required' => false))
                ->add('ethType', 'text', array('label' => '[L2] Ethernet Type (in Dec)', 'required' => false))
                //->add('vlan', 'text', array('label' => '[L2] VLAN ID', 'required' => false))
                ->add('vlanpri', 'text', array('label' => '[L2] VLAN Priority / CoS / PCP', 'required' => false))
                ->add('IPSrc', 'text', array('label' => '[L3] Source IP and Suffix', 'required' => false))
                ->add('IPDest', 'text', array('label' => '[L3] Destination IP and Suffix', 'required' => false))
                ->add('IPType', 'text', array('label' => '[L3] IP Type (in Dec)', 'required' => false))
                ->add('dscp', 'text', array('label' => '[L3] DSCP', 'required' => false))
                ->add('TCPSrcRange', 'text', array('label' => '[L4] TCP Source Range', 'required' => false))
                ->add('TCPDestRange', 'text', array('label' => '[L4] TCP Destination Range', 'required' => false))
                ->add('UDPSrcRange', 'text', array('label' => '[L4] UDP Source Range', 'required' => false))
                ->add('UDPDestRange', 'text', array('label' => '[L4] UDP Destination Range', 'required' => false))
                ->add('ICMPType', 'text', array('label' => '[L4] ICMP Type', 'required' => false))
                ->add('ICMPCode', 'text', array('label' => '[L4] ICMP Code', 'required' => false))
                ->add('create', 'submit', array('label' => 'Put Flow Condition'))
                ->getForm();
        $createFlowCondForm->handleRequest($request);
        if ($createFlowCondForm->isValid()) {
            $data = $createFlowCondForm->getData();
            $body = '{"name":"'.$data["name"].'","match":[{"index":1,';
            
            // L2
            $ethernet = '{';
            if (!empty($data["ethSrc"])) {
                $ethernet = $ethernet . '"src":"'.$data["ethSrc"].'",';
            }
            if (!empty($data["ethDst"])) {
                $ethernet = $ethernet . '"dst":"'.$data["ethDst"].'",';
            }
            if (!empty($data["ethType"])) {
                $ethernet = $ethernet . '"type":"'.$data["ethType"].'",';
            }
            if (!empty($data["vlanpri"])) {
                $ethernet = $ethernet . '"vlanpri":"'.$data["vlanpri"].'",';
            }
            if (strcmp($ethernet, '{') != 0) {
                $ethernet = rtrim($ethernet, ",") . '}';
                $body = $body . '"ethernet":'.$ethernet.',';
            }
            
            // L3
            $inet4 = '{';
            if (!empty($data["IPSrc"])) {
                $pieces = explode("/",$data["IPSrc"]);
                $inet4 = $inet4 . '"src":"'.$pieces[0].'",';
                if (sizeof($pieces) > 1) {
                    $inet4 = $inet4 . '"srcsuffix":"'.$pieces[1].'",';
                }
            }
            if (!empty($data["IPDest"])) {
                $pieces = explode("/",$data["IPDest"]);
                $inet4 = $inet4 . '"dst":"'.$pieces[0].'",';
                if (sizeof($pieces) > 1) {
                    $inet4 = $inet4 . '"dstsuffix":"'.$pieces[1].'",';
                }
            }
            if (!empty($data["IPType"])) {
                $inet4 = $inet4 . '"protocol":"'.$data["IPType"].'",';
            }
            if (!empty($data["dscp"])) {
                $inet4 = $inet4 . '"dscp":"'.$data["dscp"].'",';
            }
            if (strcmp($inet4, '{') != 0) {
                $inet4 = rtrim($inet4, ",") . '}';
                $body = $body . '"inetMatch":{"inet4":'.$inet4.'},';
            }

            // L4 TCP 
            $tcp = '{';
            if (!empty($data["TCPSrcRange"])) {
                $pieces = explode("-",$data["TCPSrcRange"]);
                $tcp = $tcp . '"src":{"from":'.$pieces[0].'},';
                if (sizeof($pieces) > 1) {
                    $tcp = rtrim($tcp, "},") . ',"to":'.$pieces[1].'},';
                }
            }
            if (!empty($data["TCPDestRange"])) {
                $pieces = explode("-", $data["TCPDestRange"]);
                $tcp = $tcp . '"dst":{"from":' . $pieces[0] . '},';
                if (sizeof($pieces) > 1) {
                    $tcp = rtrim($tcp, "},") . ',"to":' . $pieces[1] . '},';
                }
            }
            if (strcmp($tcp, '{') != 0) {
                $tcp = rtrim($tcp, ",") . '}';
                $body = $body . '"l4Match":{"tcp":'.$tcp.'},';
            }
            
            // L4 UDP
            $udp = '{';
            if (!empty($data["UDPSrcRange"])) {
                $pieces = explode("-",$data["UDPSrcRange"]);
                $udp = $udp . '"src":{"from":'.$pieces[0].'},';
                if (sizeof($pieces) > 1) {
                    $udp = rtrim($udp, "},") . ',"to":'.$pieces[1].'},';
                }
            }
            if (!empty($data["UDPDestRange"])) {
                $pieces = explode("-", $data["UDPDestRange"]);
                $udp = $udp . '"dst":{"from":' . $pieces[0] . '},';
                if (sizeof($pieces) > 1) {
                    $udp = rtrim($udp, "},") . ',"to":' . $pieces[1] . '},';
                }
            }
            if (strcmp($udp, '{') != 0) {
                $udp = rtrim($udp, ",") . '}';
                $body = $body . '"l4Match":{"udp":'.$udp.'},';
            }
            
            // L4 ICMP
            $icmp = '{';
            if (!empty($data["ICMPType"])) {
                $icmp = $icmp . '"type":"'.$data["ICMPType"].'",';
            }
            if (!empty($data["ICMPCode"])) {
                $icmp = $icmp . '"code":"'.$data["ICMPCode"].'",';
            }
            if (strcmp($icmp, '{') != 0) {
                $icmp = rtrim($icmp, ",") . '}';
                $body = $body . '"l4Match":{"icmp":'.$icmp.'},';
            }
            
            $body = rtrim($body, ",") . '}]}';
            
            $this->get('curl_service')->curl('flowconditions/' . $data["name"], 'PUT', $body);
            return $this->redirect($this->generateUrl('logic'));
        }
        
        // Delete Flow Condition Form
        $deleteFlowCondForm = $this->container->get('form.factory')->createNamedBuilder('deleteFlowCond')
                ->add('name', 'text', array('label' => 'Flow Condition Name'))
                ->add('delete', 'submit', array('label' => 'Delete Flow Condition'))
                ->getForm();
        $deleteFlowCondForm->handleRequest($request);
        if ($deleteFlowCondForm->isValid()) {
            $data = $deleteFlowCondForm->getData();
            $this->get('curl_service')->curl('flowconditions/' . $data["name"], 'DELETE', '');
            return $this->redirect($this->generateUrl('logic'));
        }
        
        // Get Flow Filter(s) List Form
        $flowfilters = "Nothing retrieved yet. Please submit GET Flow Filter(s) form.";
        $getFlowFiltersForm = $this->container->get('form.factory')->createNamedBuilder('getFlowFilters')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('vBridgeName', 'text', array('label' => 'vBridge Name'))
                ->add('vBridgeIfName', 'text', array('label' => 'vBridge Interface Name'))
                ->add('listType', 'text', array('label' => 'List Type (In/Out)'))
                ->add('get', 'submit', array('label' => 'Get Flow Filter(s)'))
                ->getForm();
        $getFlowFiltersForm->handleRequest($request);
        if ($getFlowFiltersForm->isValid()) {
            $data = $getFlowFiltersForm->getData();
            $flowfilters = json_decode($this->get('curl_service')->curl($data["name"] . '/vbridges/' . $data["vBridgeName"] .'/interfaces/' . $data["vBridgeIfName"] . '/flowfilters/' . $data["listType"], 'GET', ''),true);
        }
        
        // Put Flow Filter Form
        $putFlowFilterForm = $this->container->get('form.factory')->createNamedBuilder('putFlowFilter')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('vBridgeName', 'text', array('label' => 'vBridge Name'))
                ->add('vBridgeIfName', 'text', array('label' => 'vBridge Interface Name'))
                ->add('listType', 'text', array('label' => 'List Type (In/Out)'))
                ->add('index', 'text', array('label' => 'Index'))
                ->add('flowCond', 'text', array('label' => 'Match/Flow Condition'))
                ->add('filterType', 'text', array('label' => 'Pass, Drop, or [Redirect - NOT READY]', 'required' => false))
                ->add('dlSrc', 'text', array('label' => 'Set Source MAC', 'required' => false))
                ->add('IPSrc', 'text', array('label' => 'Set Source IP', 'required' => false))
                //->add('vlanPCP', 'text', array('label' => 'Set [L2] VLAN PCP', 'required' => false))
                ->add('dscp', 'text', array('label' => 'Set [L3] DSCP', 'required' => false))
                ->add('tcpSrc', 'text', array('label' => 'Set [L4] TCP Source', 'required' => false))
                ->add('get', 'submit', array('label' => 'Put Flow Filter'))
                ->getForm();
        $putFlowFilterForm->handleRequest($request);
        if ($putFlowFilterForm->isValid()) {
            $data = $putFlowFilterForm->getData();
            $body = '{"index":'.$data["index"].',"condition":"'.$data["flowCond"].'","filterType":{"'.$data["filterType"].'":{}},"actions":[';
            //if (!empty($data["vlanPCP"])) {
            //    $body = $body . '{"vlanpcp": {"priority": '.$data["vlanPCP"].'}},';
            //}
            if (!empty($data["dscp"])) {
                $body = $body . '{"dscp": {"dscp": '.$data["dscp"].'}},';
            }
            if (!empty($data["dlSrc"])) {
                $body = $body . '{"dlsrc": {"address": "'.$data["dlSrc"].'"}},';
            }
            if (!empty($data["IPSrc"])) {
                $body = $body . '{"inet4src": {"address": "'.$data["IPSrc"].'"}},';
            }
            if (!empty($data["tcpSrc"])) {
                $body = $body . '{"tpsrc": {"port": "'.$data["tcpSrc"].'"}},';
            }
            $body = rtrim($body,",") . ']}';
            $this->get('curl_service')->curl($data["name"] . '/vbridges/' . $data["vBridgeName"] .'/interfaces/' . $data["vBridgeIfName"] . '/flowfilters/' . $data["listType"] . '/' . $data["index"], 'PUT', $body);
            return $this->redirect($this->generateUrl('logic'));
        }
        
        // Delete Flow Filter Form
        $deleteFlowFilterForm = $this->container->get('form.factory')->createNamedBuilder('deleteFlowFilter')
                ->add('name', 'text', array('label' => 'VTN Name'))
                ->add('vBridgeName', 'text', array('label' => 'vBridge Name'))
                ->add('vBridgeIfName', 'text', array('label' => 'vBridge Interface Name'))
                ->add('listType', 'text', array('label' => 'List Type (In/Out)'))
                ->add('index', 'text', array('label' => 'Index (Empty -> Delete ALL)', 'required' => false))
                ->add('delete', 'submit', array('label' => 'Delete Flow Filter'))
                ->getForm();
        $deleteFlowFilterForm->handleRequest($request);
        if ($deleteFlowFilterForm->isValid()) {
            $data = $deleteFlowFilterForm->getData();
            $this->get('curl_service')->curl($data["name"] . '/vbridges/' . $data["vBridgeName"] .'/interfaces/' . $data["vBridgeIfName"] . '/flowfilters/' . $data["listType"] . '/' . $data["index"], 'DELETE', '');
            return $this->redirect($this->generateUrl('logic'));
        }
        
        return $this->render('AppBundle::logic.html.twig',
                array('flowconditions' => $flowconditions,
                    'createFlowCondForm' => $createFlowCondForm->createView(),
                    'deleteFlowCondForm' => $deleteFlowCondForm->createView(),
                    'flowfilters' => $flowfilters,
                    'getFlowFiltersForm' => $getFlowFiltersForm->createView(),
                    'putFlowFilterForm' => $putFlowFilterForm->createView(),
                    'deleteFlowFilterForm' => $deleteFlowFilterForm->createView()
                ));
    }
    
    /**
     * @Route("/admin/statistics", name="statistics")
     */
    public function statisticsAction(Request $request)
    {
        // Get Statistics Form
        $statisticsFlow = "Nothing retrieved yet. Please submit GET Statistics form.";
        $statisticsPort = "Nothing retrieved yet. Please submit GET Statistics form.";
        $statisticsTable = "Nothing retrieved yet. Please submit GET Statistics form.";
        $getStatisticsForm = $this->container->get('form.factory')->createNamedBuilder('getStatistics')
                ->add('nodeType', 'text', array('label' => 'Node Type'))
                ->add('nodeID', 'text', array('label' => 'Node ID'))
                ->add('get', 'submit', array('label' => 'Get Statistics'))
                ->getForm();
        $getStatisticsForm->handleRequest($request);
        if ($getStatisticsForm->isValid()) {
            $data = $getStatisticsForm->getData();
            $statisticsFlow = json_decode($this->get('curl_service')->curl('statistics/default/flow/node/' . $data["nodeType"] . '/' . $data["nodeID"], 'GET', ''),true);
            $statisticsPort = json_decode($this->get('curl_service')->curl('statistics/default/port/node/' . $data["nodeType"] . '/' . $data["nodeID"], 'GET', ''),true);
            $statisticsTable = json_decode($this->get('curl_service')->curl('statistics/default/table/node/' . $data["nodeType"] . '/' . $data["nodeID"], 'GET', ''),true);
        }
        
        return $this->render('AppBundle::statistics.html.twig',
                array('statisticsFlow' => $statisticsFlow,
                    'statisticsPort' => $statisticsPort,
                    'statisticsTable' => $statisticsTable,
                    'getStatisticsForm' => $getStatisticsForm->createView(),
                ));
    }
    
}