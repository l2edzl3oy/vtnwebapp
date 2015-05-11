<?php

/* AppBundle::logic.html.twig */
class __TwigTemplate_d77bc5af6538ad8a68747dfaa3c8e845df67e54d14918572456a584bdfcb0550 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("AppBundle::admin.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'accordian' => array($this, 'block_accordian'),
            'tabs' => array($this, 'block_tabs'),
            'tabscontent' => array($this, 'block_tabscontent'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AppBundle::admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_accordian($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"panel panel-default\">
        <div class=\"panel-heading\">
            <h4 class=\"panel-title\">
                <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\">1. Flow Condition(s) List</a>
            </h4>
        </div>
        <div id=\"collapseOne\" class=\"panel-collapse collapse in\">
            <div class=\"panel-body\">
                <h4>";
        // line 12
        echo $this->env->getExtension('dump')->dump($this->env, $context, (isset($context["flowconditions"]) ? $context["flowconditions"] : $this->getContext($context, "flowconditions")));
        echo "</h4>
            </div>
        </div>
    </div>
    <div class=\"panel panel-default\">
        <div class=\"panel-heading\">
            <h4 class=\"panel-title\">
                <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseTwo\">2. Flow Filter(s) List</a>
            </h4>
        </div>
        <div id=\"collapseTwo\" class=\"panel-collapse collapse\">
            <div class=\"panel-body\">
                <h4>";
        // line 24
        echo $this->env->getExtension('dump')->dump($this->env, $context, (isset($context["flowfilters"]) ? $context["flowfilters"] : $this->getContext($context, "flowfilters")));
        echo "</h4>
            </div>
        </div>
    </div>
";
    }

    // line 30
    public function block_tabs($context, array $blocks = array())
    {
        // line 31
        echo "    <li class=\"dropdown\">
        <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">Flow Condition<b class=\"caret\"></b></a>
        <ul class=\"dropdown-menu\">
            <li><a data-toggle=\"tab\" href=\"#createFlowCond\">Put</a></li>
            <li><a data-toggle=\"tab\" href=\"#deleteFlowCond\">Delete</a></li>
        </ul>
    </li>
    <li class=\"dropdown\">
        <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">Flow Filter(s)<b class=\"caret\"></b></a>
        <ul class=\"dropdown-menu\">
            <li><a data-toggle=\"tab\" href=\"#getFlowFilters\">Get</a></li>
            <li><a data-toggle=\"tab\" href=\"#createFlowFilter\">Put</a></li>
            <li><a data-toggle=\"tab\" href=\"#deleteFlowFilter\">Delete</a></li>
        </ul>
    </li>
";
    }

    // line 48
    public function block_tabscontent($context, array $blocks = array())
    {
        // line 49
        echo "    <div id=\"createFlowCond\" class=\"tab-pane fade in active\">
        <p>";
        // line 50
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["createFlowCondForm"]) ? $context["createFlowCondForm"] : $this->getContext($context, "createFlowCondForm")), 'form_start');
        echo "
            ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["createFlowCondForm"]) ? $context["createFlowCondForm"] : $this->getContext($context, "createFlowCondForm")), 'widget');
        echo "
            ";
        // line 52
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["createFlowCondForm"]) ? $context["createFlowCondForm"] : $this->getContext($context, "createFlowCondForm")), 'form_end');
        echo "
            ";
        // line 54
        echo "        </p>
    </div>
    <div id=\"deleteFlowCond\" class=\"tab-pane fade\">
        <p>";
        // line 57
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deleteFlowCondForm"]) ? $context["deleteFlowCondForm"] : $this->getContext($context, "deleteFlowCondForm")), 'form_start');
        echo "
            ";
        // line 58
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["deleteFlowCondForm"]) ? $context["deleteFlowCondForm"] : $this->getContext($context, "deleteFlowCondForm")), 'widget');
        echo "
            ";
        // line 59
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deleteFlowCondForm"]) ? $context["deleteFlowCondForm"] : $this->getContext($context, "deleteFlowCondForm")), 'form_end');
        echo "
        </p>
    </div>
    <div id=\"getFlowFilters\" class=\"tab-pane fade\">
        <p>";
        // line 63
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["getFlowFiltersForm"]) ? $context["getFlowFiltersForm"] : $this->getContext($context, "getFlowFiltersForm")), 'form_start');
        echo "
            ";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["getFlowFiltersForm"]) ? $context["getFlowFiltersForm"] : $this->getContext($context, "getFlowFiltersForm")), 'widget');
        echo "
            ";
        // line 65
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["getFlowFiltersForm"]) ? $context["getFlowFiltersForm"] : $this->getContext($context, "getFlowFiltersForm")), 'form_end');
        echo "
        </p>
    </div>
    <div id=\"createFlowFilter\" class=\"tab-pane fade\">
        <p>";
        // line 69
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["putFlowFilterForm"]) ? $context["putFlowFilterForm"] : $this->getContext($context, "putFlowFilterForm")), 'form_start');
        echo "
            ";
        // line 70
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["putFlowFilterForm"]) ? $context["putFlowFilterForm"] : $this->getContext($context, "putFlowFilterForm")), 'widget');
        echo "
            ";
        // line 71
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["putFlowFilterForm"]) ? $context["putFlowFilterForm"] : $this->getContext($context, "putFlowFilterForm")), 'form_end');
        echo "
        </p>
    </div>
    <div id=\"deleteFlowFilter\" class=\"tab-pane fade\">
        <p>";
        // line 75
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deleteFlowFilterForm"]) ? $context["deleteFlowFilterForm"] : $this->getContext($context, "deleteFlowFilterForm")), 'form_start');
        echo "
            ";
        // line 76
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["deleteFlowFilterForm"]) ? $context["deleteFlowFilterForm"] : $this->getContext($context, "deleteFlowFilterForm")), 'widget');
        echo "
            ";
        // line 77
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["deleteFlowFilterForm"]) ? $context["deleteFlowFilterForm"] : $this->getContext($context, "deleteFlowFilterForm")), 'form_end');
        echo "
        </p>
    </div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle::logic.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 77,  169 => 76,  165 => 75,  158 => 71,  154 => 70,  150 => 69,  143 => 65,  139 => 64,  135 => 63,  128 => 59,  124 => 58,  120 => 57,  115 => 54,  111 => 52,  107 => 51,  103 => 50,  100 => 49,  97 => 48,  78 => 31,  75 => 30,  66 => 24,  51 => 12,  41 => 4,  38 => 3,  11 => 1,);
    }
}
