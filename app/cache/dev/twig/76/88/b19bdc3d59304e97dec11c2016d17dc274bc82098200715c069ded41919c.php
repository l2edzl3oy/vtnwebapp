<?php

/* AppBundle::statistics.html.twig */
class __TwigTemplate_7688b19bdc3d59304e97dec11c2016d17dc274bc82098200715c069ded41919c extends Twig_Template
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
                <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseOne\">1. Flow Statistics</a>
            </h4>
        </div>
        <div id=\"collapseOne\" class=\"panel-collapse collapse in\">
            <div class=\"panel-body\">
                <h4>";
        // line 12
        echo $this->env->getExtension('dump')->dump($this->env, $context, (isset($context["statisticsFlow"]) ? $context["statisticsFlow"] : $this->getContext($context, "statisticsFlow")));
        echo "</h4>
            </div>
        </div>
    </div>
    <div class=\"panel panel-default\">
        <div class=\"panel-heading\">
            <h4 class=\"panel-title\">
                <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseTwo\">2. Port Statistics</a>
            </h4>
        </div>
        <div id=\"collapseTwo\" class=\"panel-collapse collapse\">
            <div class=\"panel-body\">
                <h4>";
        // line 24
        echo $this->env->getExtension('dump')->dump($this->env, $context, (isset($context["statisticsPort"]) ? $context["statisticsPort"] : $this->getContext($context, "statisticsPort")));
        echo "</h4>
            </div>
        </div>
    </div>
    <div class=\"panel panel-default\">
        <div class=\"panel-heading\">
            <h4 class=\"panel-title\">
                <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapseThree\">3. Table Statistics</a>
            </h4>
        </div>
        <div id=\"collapseThree\" class=\"panel-collapse collapse\">
            <div class=\"panel-body\">
                <h4>";
        // line 36
        echo $this->env->getExtension('dump')->dump($this->env, $context, (isset($context["statisticsTable"]) ? $context["statisticsTable"] : $this->getContext($context, "statisticsTable")));
        echo "</h4>
            </div>
        </div>
    </div>
";
    }

    // line 42
    public function block_tabs($context, array $blocks = array())
    {
        // line 43
        echo "    <li class=\"dropdown\">
        <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">Statistics<b class=\"caret\"></b></a>
        <ul class=\"dropdown-menu\">
            <li><a data-toggle=\"tab\" href=\"#getStatistics\">Get</a></li>
        </ul>
    </li>
";
    }

    // line 51
    public function block_tabscontent($context, array $blocks = array())
    {
        // line 52
        echo "    <div id=\"getStatistics\" class=\"tab-pane fade in active\">
        <p>";
        // line 53
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["getStatisticsForm"]) ? $context["getStatisticsForm"] : $this->getContext($context, "getStatisticsForm")), 'form_start');
        echo "
            ";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["getStatisticsForm"]) ? $context["getStatisticsForm"] : $this->getContext($context, "getStatisticsForm")), 'widget');
        echo "
            ";
        // line 55
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["getStatisticsForm"]) ? $context["getStatisticsForm"] : $this->getContext($context, "getStatisticsForm")), 'form_end');
        echo "
        </p>
    </div>
";
    }

    public function getTemplateName()
    {
        return "AppBundle::statistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 55,  113 => 54,  109 => 53,  106 => 52,  103 => 51,  93 => 43,  90 => 42,  81 => 36,  66 => 24,  51 => 12,  41 => 4,  38 => 3,  11 => 1,);
    }
}
