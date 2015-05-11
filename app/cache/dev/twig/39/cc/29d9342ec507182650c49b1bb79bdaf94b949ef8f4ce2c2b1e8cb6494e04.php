<?php

/* AppBundle::admin.html.twig */
class __TwigTemplate_39cc29d9342ec507182650c49b1bb79bdaf94b949ef8f4ce2c2b1e8cb6494e04 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("AppBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'accordian' => array($this, 'block_accordian'),
            'tabs' => array($this, 'block_tabs'),
            'tabscontent' => array($this, 'block_tabscontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<nav class=\"navbar navbar-default navbar-inverse navbar-fixed-top\" role=\"navigation\">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class=\"container-fluid\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\"
                    data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">
                <span class=\"sr-only\">Toggle navigation</span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <a class=\"navbar-brand\" ";
        // line 16
        echo ">VTNWebApp</a>
        </div>
        <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
            ";
        // line 19
        echo $this->env->getExtension('knp_menu')->render("AppBundle:Builder:mainMenu", array("style" => "navbar"));
        echo "
        </div>
    </div>
</nav>
            

<div class=\"container-fluid\" style=\"padding-top: 70px\">
    <div class=\"col-md-6\" style=\"padding-bottom: 20px\">
        <div id=\"accordion\" class=\"panel-group\">
        ";
        // line 28
        $this->displayBlock('accordian', $context, $blocks);
        // line 91
        echo "        </div>
    </div>

    <div class=\"col-md-6\">
        <ul class=\"nav nav-tabs\">
        ";
        // line 96
        $this->displayBlock('tabs', $context, $blocks);
        // line 128
        echo "        </ul>
        <div class=\"tab-content\">
        ";
        // line 130
        $this->displayBlock('tabscontent', $context, $blocks);
        // line 181
        echo "        </div>
    </div>

</div>

";
    }

    // line 28
    public function block_accordian($context, array $blocks = array())
    {
        // line 29
        echo "            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4 class=\"panel-title\">
                        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\">1. Tenant</a>
                    </h4>
                </div>
                <div id=\"collapseOne\" class=\"panel-collapse collapse in\">
                    <div class=\"panel-body\">
                        <h4>Username: <small>";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "html", null, true);
        echo "</small></h4>
                        <h4>Tenant ID: <small>";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["tenantID"]) ? $context["tenantID"] : $this->getContext($context, "tenantID")), "html", null, true);
        echo "</small></h4>
                    </div>
                </div>
            </div>
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4 class=\"panel-title\">
                        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseTwo\">2. Virtual Tenant Network(s)</a>
                    </h4>
                </div>
                <div id=\"collapseTwo\" class=\"panel-collapse collapse\">
                    <div class=\"panel-body\">
                        <p>";
        // line 50
        echo $this->env->getExtension('dump')->dump($this->env, $context, (isset($context["vtns"]) ? $context["vtns"] : $this->getContext($context, "vtns")));
        echo "</p>
                    </div>
                </div>
            </div>
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4 class=\"panel-title\">
                        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseThree\">3. vBridge(s)</a>
                    </h4>
                </div>
                <div id=\"collapseThree\" class=\"panel-collapse collapse\">
                    <div class=\"panel-body\">
                        <p>";
        // line 62
        echo $this->env->getExtension('dump')->dump($this->env, $context, (isset($context["vBridges"]) ? $context["vBridges"] : $this->getContext($context, "vBridges")));
        echo "</p>
                    </div>
                </div>
            </div>
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4 class=\"panel-title\">
                        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseFour\">4. vBridge Inteface(s)</a>
                    </h4>
                </div>
                <div id=\"collapseFour\" class=\"panel-collapse collapse\">
                    <div class=\"panel-body\">
                        <p>";
        // line 74
        echo $this->env->getExtension('dump')->dump($this->env, $context, (isset($context["vBridgeInterfaces"]) ? $context["vBridgeInterfaces"] : $this->getContext($context, "vBridgeInterfaces")));
        echo "</p>
                    </div>
                </div>
            </div>
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h4 class=\"panel-title\">
                        <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseFive\">5. vBridge Inteface Mapping(s)</a>
                    </h4>
                </div>
                <div id=\"collapseFive\" class=\"panel-collapse collapse\">
                    <div class=\"panel-body\">
                        <p>";
        // line 86
        echo $this->env->getExtension('dump')->dump($this->env, $context, (isset($context["portmaps"]) ? $context["portmaps"] : $this->getContext($context, "portmaps")));
        echo "</p>
                    </div>
                </div>
            </div>
        ";
    }

    // line 96
    public function block_tabs($context, array $blocks = array())
    {
        // line 97
        echo "            <li class=\"dropdown\">
                <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">VTN<b class=\"caret\"></b></a>
                <ul class=\"dropdown-menu\">
                    <li><a data-toggle=\"tab\" href=\"#createVTN\">Create</a></li>
                    <li><a data-toggle=\"tab\" href=\"#deleteVTN\">Delete</a></li>
                </ul>
            </li>
            <li class=\"dropdown\">
                <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">vBridge<b class=\"caret\"></b></a>
                <ul class=\"dropdown-menu\">
                    <li><a data-toggle=\"tab\" href=\"#createVBridge\">Create</a></li>
                    <li><a data-toggle=\"tab\" href=\"#deleteVBridge\">Delete</a></li>
                </ul>
            </li>
            ";
        // line 113
        echo "            <li class=\"dropdown\">
                <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">vBridge Interface<b class=\"caret\"></b></a>
                <ul class=\"dropdown-menu\">
                    <li><a data-toggle=\"tab\" href=\"#createIf\">Create</a></li>
                    <li><a data-toggle=\"tab\" href=\"#deleteIf\">Delete</a></li>
                </ul>
            </li>
            <li class=\"dropdown\">
                <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">vBridge Interface Mapping<b class=\"caret\"></b></a>
                <ul class=\"dropdown-menu\">
                    <li><a data-toggle=\"tab\" href=\"#createIfMap\">Create</a></li>
                    <li><a data-toggle=\"tab\" href=\"#deleteIfMap\">Delete</a></li>
                </ul>
            </li>
        ";
    }

    // line 130
    public function block_tabscontent($context, array $blocks = array())
    {
        // line 131
        echo "            <div id=\"createVTN\" class=\"tab-pane fade in active\">
                <p>";
        // line 132
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["createVTNForm"]) ? $context["createVTNForm"] : $this->getContext($context, "createVTNForm")), 'form_start');
        echo "
                    ";
        // line 133
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["createVTNForm"]) ? $context["createVTNForm"] : $this->getContext($context, "createVTNForm")), 'widget');
        echo "
                    ";
        // line 134
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["createVTNForm"]) ? $context["createVTNForm"] : $this->getContext($context, "createVTNForm")), 'form_end');
        echo "
                    ";
        // line 136
        echo "                </p>
            </div>
            <div id=\"deleteVTN\" class=\"tab-pane fade\">
                <p>";
        // line 139
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deleteVTNForm"]) ? $context["deleteVTNForm"] : $this->getContext($context, "deleteVTNForm")), 'form_start');
        echo "
                    ";
        // line 140
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["deleteVTNForm"]) ? $context["deleteVTNForm"] : $this->getContext($context, "deleteVTNForm")), 'widget');
        echo "
                    ";
        // line 141
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deleteVTNForm"]) ? $context["deleteVTNForm"] : $this->getContext($context, "deleteVTNForm")), 'form_end');
        echo "
                </p>
            </div>
            <div id=\"createVBridge\" class=\"tab-pane fade\">
                <p>";
        // line 145
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["createVBridgeForm"]) ? $context["createVBridgeForm"] : $this->getContext($context, "createVBridgeForm")), 'form_start');
        echo "
                    ";
        // line 146
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["createVBridgeForm"]) ? $context["createVBridgeForm"] : $this->getContext($context, "createVBridgeForm")), 'widget');
        echo "
                    ";
        // line 147
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["createVBridgeForm"]) ? $context["createVBridgeForm"] : $this->getContext($context, "createVBridgeForm")), 'form_end');
        echo "
                </p>
            </div>
            <div id=\"deleteVBridge\" class=\"tab-pane fade\">
                <p>";
        // line 151
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deleteVBridgeForm"]) ? $context["deleteVBridgeForm"] : $this->getContext($context, "deleteVBridgeForm")), 'form_start');
        echo "
                    ";
        // line 152
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["deleteVBridgeForm"]) ? $context["deleteVBridgeForm"] : $this->getContext($context, "deleteVBridgeForm")), 'widget');
        echo "
                    ";
        // line 153
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deleteVBridgeForm"]) ? $context["deleteVBridgeForm"] : $this->getContext($context, "deleteVBridgeForm")), 'form_end');
        echo "
                </p>
            </div>
            <div id=\"createIf\" class=\"tab-pane fade\">
                <p>";
        // line 157
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["createVBridgeIfForm"]) ? $context["createVBridgeIfForm"] : $this->getContext($context, "createVBridgeIfForm")), 'form_start');
        echo "
                    ";
        // line 158
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["createVBridgeIfForm"]) ? $context["createVBridgeIfForm"] : $this->getContext($context, "createVBridgeIfForm")), 'widget');
        echo "
                    ";
        // line 159
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["createVBridgeIfForm"]) ? $context["createVBridgeIfForm"] : $this->getContext($context, "createVBridgeIfForm")), 'form_end');
        echo "
                </p>
            </div>
            <div id=\"deleteIf\" class=\"tab-pane fade\">
                <p>";
        // line 163
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deleteVBridgeIfForm"]) ? $context["deleteVBridgeIfForm"] : $this->getContext($context, "deleteVBridgeIfForm")), 'form_start');
        echo "
                    ";
        // line 164
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["deleteVBridgeIfForm"]) ? $context["deleteVBridgeIfForm"] : $this->getContext($context, "deleteVBridgeIfForm")), 'widget');
        echo "
                    ";
        // line 165
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deleteVBridgeIfForm"]) ? $context["deleteVBridgeIfForm"] : $this->getContext($context, "deleteVBridgeIfForm")), 'form_end');
        echo "
                </p>
            </div>
            <div id=\"createIfMap\" class=\"tab-pane fade\">
                <p>";
        // line 169
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["createPortMapForm"]) ? $context["createPortMapForm"] : $this->getContext($context, "createPortMapForm")), 'form_start');
        echo "
                    ";
        // line 170
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["createPortMapForm"]) ? $context["createPortMapForm"] : $this->getContext($context, "createPortMapForm")), 'widget');
        echo "
                    ";
        // line 171
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["createPortMapForm"]) ? $context["createPortMapForm"] : $this->getContext($context, "createPortMapForm")), 'form_end');
        echo "
                </p>
            </div>
            <div id=\"deleteIfMap\" class=\"tab-pane fade\">
                <p>";
        // line 175
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deletePortMapForm"]) ? $context["deletePortMapForm"] : $this->getContext($context, "deletePortMapForm")), 'form_start');
        echo "
                    ";
        // line 176
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["deletePortMapForm"]) ? $context["deletePortMapForm"] : $this->getContext($context, "deletePortMapForm")), 'widget');
        echo "
                    ";
        // line 177
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deletePortMapForm"]) ? $context["deletePortMapForm"] : $this->getContext($context, "deletePortMapForm")), 'form_end');
        echo "
                </p>
            </div>
        ";
    }

    public function getTemplateName()
    {
        return "AppBundle::admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  343 => 177,  339 => 176,  335 => 175,  328 => 171,  324 => 170,  320 => 169,  313 => 165,  309 => 164,  305 => 163,  298 => 159,  294 => 158,  290 => 157,  283 => 153,  279 => 152,  275 => 151,  268 => 147,  264 => 146,  260 => 145,  253 => 141,  249 => 140,  245 => 139,  240 => 136,  236 => 134,  232 => 133,  228 => 132,  225 => 131,  222 => 130,  204 => 113,  188 => 97,  185 => 96,  176 => 86,  161 => 74,  146 => 62,  131 => 50,  116 => 38,  112 => 37,  102 => 29,  99 => 28,  90 => 181,  88 => 130,  84 => 128,  82 => 96,  75 => 91,  73 => 28,  61 => 19,  56 => 16,  42 => 4,  39 => 3,  11 => 1,);
    }
}
