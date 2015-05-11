1. Introduction
===============

VTNWebApp is a web application built using the Symfony2 PHP framework and it interfaces with OpenDaylight and OpenStack. Please glance through the following report first to get some background on what it is all about: http://tinyurl.com/UROPFinalReport. The relevant topics include software-defined networking, network virtualization, datacenter networks, cloud computing, and network design/architecture.

2. Symfony Standard Edition
===========================

Welcome to the Symfony Standard Edition - a fully-functional Symfony2
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * [**AsseticBundle**][12] - Adds support for Assetic, an asset processing
    library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  http://symfony.com/doc/2.6/book/installation.html
[6]:  http://symfony.com/doc/2.6/bundles/SensioFrameworkExtraBundle/index.html
[7]:  http://symfony.com/doc/2.6/book/doctrine.html
[8]:  http://symfony.com/doc/2.6/book/templating.html
[9]:  http://symfony.com/doc/2.6/book/security.html
[10]: http://symfony.com/doc/2.6/cookbook/email.html
[11]: http://symfony.com/doc/2.6/cookbook/logging/monolog.html
[12]: http://symfony.com/doc/2.6/cookbook/assetic/asset_management.html
[13]: http://symfony.com/doc/2.6/bundles/SensioGeneratorBundle/index.html

The main components used for VTNWebApp include:

  * Symfony2 authentication mechanism [see User Classes and User Providers especially, and take note that the default UserProviderInterface.php (Symfony core, Security) was edited to include $password as input parameter for loadUserByUsername() method].

  * Symfony2 forms to capture all user inputs, e.g. username and password (which is passed to the authentication mechanism to authenticate with Openstack), creation of vBridges (inputs are passed to OpenDaylight to be handled), etc.

  * Symfony2 service which was used to handle all curl requests to OpenDaylight and Openstack via RESTful APIs.


Put all files in this repository into a folder called vtnwebapp. Then, put the vtnwebapp folder into the folder where the web files are normally placed into. For e.g. if you are using XAMPP, then the vtnwebapp folder would be put into the htdocs folder. You'll then have to start Apache httpd before the web application can be accessed through a web browser. The main page is http://127.0.0.1/vtnwebapp/web/app_dev.php/admin. Do note that OpenDaylight (mandatory) and/or OpenStack (optional) should already be up and running before you run VTNWebApp. Also, VTNWebApp may need some manual tweaking to work properly - see vtnwebapp/src/AppBundle/Controller/DefaultController.php and the inline comments there.

IDEs such as NetBeans can open Symfony2 projects.

3. OpenDaylight
===============

The main project within OpenDaylight that is of relevance to VTNWebApp is the Virtual Tenant Network (VTN) project. Do take note that only VTN Manager is required, and not the other major component which is VTN Coordinator. A very useful link is the VTN Manager REST API: https://jenkins.opendaylight.org/releng/view/vtn/job/vtn-merge-master/lastSuccessfulBuild/artifact/manager/northbound/target/site/wsdocs/index.html.

Network statistics belongs to the controller project within OpenDaylight. Link to the northbound REST API: https://developer.cisco.com/media/XNCJavaDocs/org/opendaylight/controller/statistics/northbound/package-summary.html

4. OpenStack
============

OpenStack Neutron is the networking component of OpenStack that is relevant to VTNWebApp. Although Neutron is somewhat decoupled from VTNWebApp, an understanding of its concepts (e.g. what is a Neutron Network, Neutron Subnet, and Neutron Port) is very helpful.

5. Other tools
==============

A Minimet VM is probably needed for testing purposes. Mininet can be used alongside Putty and Xming for SSH-ing and "GUI"s respectively. Diagnostic tools like Wireshark are useful. Do have a careful look through Section 3 of the report hyperlinked in the Introduction section of this Readme for more detailed information.
