<?php

/* AppBundle::layout.html.twig */
class __TwigTemplate_f3cdc9c5d8083d320b3a128931681c6e76f33e2380a5a31b0e4b2fc19484dbb5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- src/AppBundle/Resources/views/layout.html.twig -->

<!DOCTYPE html>
<html>
<head>

    <title>VTN Webapp</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <!-- Bootstrap -->
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">

    <!-- HTML5 Shim and Respond.js add IE8 support of HTML5 elements and media queries -->
    ";
        // line 13
        $this->env->loadTemplate("BraincraftedBootstrapBundle::ie8-support.html.twig")->display($context);
        // line 14
        echo "
</head>

<body>
    <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
    <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
    <!-- Include all JavaScripts, compiled by Assetic -->
    <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
    
    ";
        // line 23
        $this->displayBlock('content', $context, $blocks);
        // line 25
        echo "    
</body>
</html>";
    }

    // line 23
    public function block_content($context, array $blocks = array())
    {
        // line 24
        echo "    ";
    }

    public function getTemplateName()
    {
        return "AppBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 24,  64 => 23,  58 => 25,  56 => 23,  51 => 21,  46 => 19,  39 => 14,  37 => 13,  31 => 10,  20 => 1,);
    }
}
