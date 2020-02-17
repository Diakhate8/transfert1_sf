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

/* @EasyAdmin/default/field_file.html.twig */
class __TwigTemplate_80a59f37dee1f5331fb1b757cb8f089f9f224efef2e6c024b48c8491ff55001f extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/default/field_file.html.twig"));

        // line 1
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 1, $this->source); })())), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, (isset($context["filename"]) || array_key_exists("filename", $context) ? $context["filename"] : (function () { throw new RuntimeError('Variable "filename" does not exist.', 1, $this->source); })()), "html", null, true);
        echo "\" target=\"_blank\">
    ";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->truncateText($this->env, (isset($context["filename"]) || array_key_exists("filename", $context) ? $context["filename"] : (function () { throw new RuntimeError('Variable "filename" does not exist.', 2, $this->source); })())), "html", null, true);
        echo "
</a>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@EasyAdmin/default/field_file.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<a href=\"{{ asset(value) }}\" title=\"{{ filename }}\" target=\"_blank\">
    {{ filename|easyadmin_truncate }}
</a>
", "@EasyAdmin/default/field_file.html.twig", "/home/diakhate/creerPartenaireDepotRetrait/vendor/easycorp/easyadmin-bundle/src/Resources/views/default/field_file.html.twig");
    }
}
