<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @EasyAdmin/default/field_url.html.twig */
class __TwigTemplate_290aa693f5fd3e6a3aaaef5b649289725a54937c730886c2152918f207f50977 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/default/field_url.html.twig"));

        // line 1
        if (0 === twig_compare((isset($context["view"]) || array_key_exists("view", $context) ? $context["view"] : (function () { throw new RuntimeError('Variable "view" does not exist.', 1, $this->source); })()), "show")) {
            // line 2
            echo "    <a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 2, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 2, $this->source); })()), "html", null, true);
            echo "</a>
";
        } else {
            // line 4
            echo "    <a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 4, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->truncateText($this->env, twig_replace_filter((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 4, $this->source); })()), ["https://" => "", "http://" => ""])), "html", null, true);
            echo "</a>
";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@EasyAdmin/default/field_url.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if view == 'show' %}
    <a target=\"_blank\" href=\"{{ value }}\">{{ value }}</a>
{% else %}
    <a target=\"_blank\" href=\"{{ value }}\">{{ value|replace({ 'https://': '', 'http://': '' })|easyadmin_truncate }}</a>
{% endif %}
", "@EasyAdmin/default/field_url.html.twig", "/home/diakhate/creerPartenaireDepotRetrait/vendor/easycorp/easyadmin-bundle/src/Resources/views/default/field_url.html.twig");
    }
}
