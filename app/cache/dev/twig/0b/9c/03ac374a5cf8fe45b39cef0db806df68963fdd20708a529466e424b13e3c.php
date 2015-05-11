<?php

/* AppBundle::login.html.twig */
class __TwigTemplate_0b9c03ac374a5cf8fe45b39cef0db806df68963fdd20708a529466e424b13e3c extends Twig_Template
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
    ";
        // line 16
        echo "    
    <div class=\"container-fluid\">
        <div class=\"col-lg-4 col-md-4 col-sm-6\">
            ";
        // line 19
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 20
            echo "                <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array())), "html", null, true);
            echo "</div>
            ";
        }
        // line 22
        echo "
            <form name=\"form\" action=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\" role=\"form\">
                <div class=\"form-group\">
                    <label class=\"control-label required\" for=\"username\">Username</label>
                    <input type=\"text\" id=\"username\" name=\"_username\" required=\"required\" class=\"form-control\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" />
                </div>
                <div class=\"form-group\">
                    <label class=\"control-label required\" for=\"password\">Password:</label>
                    <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" class=\"form-control\"/>
                </div>
                ";
        // line 37
        echo "                <div class=\"form-group\">
                    <button type=\"submit\" id=\"login\" name=\"_login\" class=\"btn btn-primary\">login</button>
                </div>
            </form>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "AppBundle::login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 37,  64 => 26,  58 => 23,  55 => 22,  49 => 20,  47 => 19,  42 => 16,  39 => 4,  36 => 3,  11 => 1,);
    }
}
