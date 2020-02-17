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

/* @EasyAdmin/default/show.html.twig */
class __TwigTemplate_fa966c9efac0325943f9e6d42af683f1a24bbfb7e3fff2014100f700d720ffd6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body_id' => [$this, 'block_body_id'],
            'body_class' => [$this, 'block_body_class'],
            'content_title' => [$this, 'block_content_title'],
            'content_footer_wrapper' => [$this, 'block_content_footer_wrapper'],
            'main' => [$this, 'block_main'],
            'show_fields' => [$this, 'block_show_fields'],
            'show_field' => [$this, 'block_show_field'],
            'item_actions' => [$this, 'block_item_actions'],
            'delete_form' => [$this, 'block_delete_form'],
            'body_javascript' => [$this, 'block_body_javascript'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 7
        return $this->loadTemplate(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 7, $this->source); })()), "templates", [], "any", false, false, false, 7), "layout", [], "any", false, false, false, 7), "@EasyAdmin/default/show.html.twig", 7);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/default/show.html.twig"));

        // line 1
        $context["_entity_config"] = $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getEntityConfiguration(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1, $this->source); })()), "request", [], "any", false, false, false, 1), "query", [], "any", false, false, false, 1), "get", [0 => "entity"], "method", false, false, false, 1));
        // line 3
        $context["_entity_id"] = ("" . twig_get_attribute($this->env, $this->source, (isset($context["entity"]) || array_key_exists("entity", $context) ? $context["entity"] : (function () { throw new RuntimeError('Variable "entity" does not exist.', 3, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 3, $this->source); })()), "primary_key_field_name", [], "any", false, false, false, 3), [], "any", false, false, false, 3));
        // line 4
        $context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"] = twig_get_attribute($this->env, $this->source, (isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 4, $this->source); })()), "translation_domain", [], "any", false, false, false, 4);
        // line 5
        $context["_trans_parameters"] = ["%entity_name%" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 5, $this->source); })()), "name", [], "any", false, false, false, 5), [],         // line 4
(isset($context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"]) || array_key_exists("__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e", $context) ? $context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"] : (function () { throw new RuntimeError('Variable "__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e" does not exist.', 4, $this->source); })())), "%entity_label%" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source,         // line 5
(isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 5, $this->source); })()), "label", [], "any", false, false, false, 5), [],         // line 4
(isset($context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"]) || array_key_exists("__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e", $context) ? $context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"] : (function () { throw new RuntimeError('Variable "__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e" does not exist.', 4, $this->source); })())), "%entity_id%" =>         // line 5
(isset($context["_entity_id"]) || array_key_exists("_entity_id", $context) ? $context["_entity_id"] : (function () { throw new RuntimeError('Variable "_entity_id" does not exist.', 5, $this->source); })())];
        // line 7
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 9
    public function block_body_id($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_id"));

        echo twig_escape_filter($this->env, ((("easyadmin-show-" . twig_get_attribute($this->env, $this->source, (isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 9, $this->source); })()), "name", [], "any", false, false, false, 9)) . "-") . (isset($context["_entity_id"]) || array_key_exists("_entity_id", $context) ? $context["_entity_id"] : (function () { throw new RuntimeError('Variable "_entity_id" does not exist.', 9, $this->source); })())), "html", null, true);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 10
    public function block_body_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_class"));

        echo twig_escape_filter($this->env, ("show show-" . twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 10, $this->source); })()), "name", [], "any", false, false, false, 10))), "html", null, true);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 12
    public function block_content_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content_title"));

        // line 13
        echo "    ";
        ob_start();
        // line 14
        echo "        ";
        $context["_default_title"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("show.page_title", (isset($context["_trans_parameters"]) || array_key_exists("_trans_parameters", $context) ? $context["_trans_parameters"] : (function () { throw new RuntimeError('Variable "_trans_parameters" does not exist.', 14, $this->source); })()), "EasyAdminBundle");
        // line 15
        echo "        ";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["_entity_config"] ?? null), "show", [], "any", false, true, false, 15), "title", [], "any", true, true, false, 15)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 15, $this->source); })()), "show", [], "any", false, false, false, 15), "title", [], "any", false, false, false, 15), (isset($context["_trans_parameters"]) || array_key_exists("_trans_parameters", $context) ? $context["_trans_parameters"] : (function () { throw new RuntimeError('Variable "_trans_parameters" does not exist.', 15, $this->source); })()),         // line 4
(isset($context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"]) || array_key_exists("__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e", $context) ? $context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"] : (function () { throw new RuntimeError('Variable "__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e" does not exist.', 4, $this->source); })()))) : (        // line 15
(isset($context["_default_title"]) || array_key_exists("_default_title", $context) ? $context["_default_title"] : (function () { throw new RuntimeError('Variable "_default_title" does not exist.', 15, $this->source); })()))), "html", null, true);
        echo "
    ";
        $___internal_12a368bea60530d08d62004616f6812f8cb036d520ed4f94fd679eeca4d5225d_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 13
        echo twig_spaceless($___internal_12a368bea60530d08d62004616f6812f8cb036d520ed4f94fd679eeca4d5225d_);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 19
    public function block_content_footer_wrapper($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content_footer_wrapper"));

        echo "";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 21
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "main"));

        // line 22
        echo "    <div class=\"form-horizontal\">
        ";
        // line 23
        $this->displayBlock('show_fields', $context, $blocks);
        // line 44
        echo "    </div>

    <section class=\"content-footer\">
        <div class=\"form-actions\">
            ";
        // line 48
        $this->displayBlock('item_actions', $context, $blocks);
        // line 62
        echo "        </div>
    </section>

    ";
        // line 65
        $this->displayBlock('delete_form', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 23
    public function block_show_fields($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "show_fields"));

        // line 24
        echo "            ";
        $context["_fields_visible_by_user"] = twig_array_filter((isset($context["fields"]) || array_key_exists("fields", $context) ? $context["fields"] : (function () { throw new RuntimeError('Variable "fields" does not exist.', 24, $this->source); })()), function ($__metadata__, $__field__) use ($context, $macros) { $context["metadata"] = $__metadata__; $context["field"] = $__field__; return $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->isGranted(twig_get_attribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 24, $this->source); })()), "permission", [], "any", false, false, false, 24)); });
        // line 25
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["_fields_visible_by_user"]) || array_key_exists("_fields_visible_by_user", $context) ? $context["_fields_visible_by_user"] : (function () { throw new RuntimeError('Variable "_fields_visible_by_user" does not exist.', 25, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["field"] => $context["metadata"]) {
            // line 26
            echo "                ";
            $this->displayBlock('show_field', $context, $blocks);
            // line 42
            echo "            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['field'], $context['metadata'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 26
    public function block_show_field($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "show_field"));

        // line 27
        echo "                    <div class=\"form-group field-";
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "type", [], "any", true, true, false, 27)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "type", [], "any", false, false, false, 27), "default")) : ("default"))), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "css_class", [], "any", true, true, false, 27)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "css_class", [], "any", false, false, false, 27), "")) : ("")), "html", null, true);
        echo "\">
                        <label class=\"control-label\">
                            ";
        // line 29
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 29, $this->source); })()), "label", [], "any", false, false, false, 29), (isset($context["_trans_parameters"]) || array_key_exists("_trans_parameters", $context) ? $context["_trans_parameters"] : (function () { throw new RuntimeError('Variable "_trans_parameters" does not exist.', 29, $this->source); })()),         // line 4
(isset($context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"]) || array_key_exists("__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e", $context) ? $context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"] : (function () { throw new RuntimeError('Variable "__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e" does not exist.', 4, $this->source); })()));
        // line 29
        echo "
                        </label>
                        <div class=\"form-widget\">
                            <div class=\"form-control\">
                                ";
        // line 33
        echo $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->renderEntityField($this->env, "show", twig_get_attribute($this->env, $this->source, (isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 33, $this->source); })()), "name", [], "any", false, false, false, 33), (isset($context["entity"]) || array_key_exists("entity", $context) ? $context["entity"] : (function () { throw new RuntimeError('Variable "entity" does not exist.', 33, $this->source); })()), (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 33, $this->source); })()));
        echo "
                            </div>

                            ";
        // line 36
        if (0 !== twig_compare(((twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "help", [], "any", true, true, false, 36)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["metadata"] ?? null), "help", [], "any", false, false, false, 36), "")) : ("")), "")) {
            // line 37
            echo "                                <small class=\"form-help\"><i class=\"fa fa-fw fa-info-circle\"></i> ";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 37, $this->source); })()), "help", [], "any", false, false, false, 37), [],             // line 4
(isset($context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"]) || array_key_exists("__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e", $context) ? $context["__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e"] : (function () { throw new RuntimeError('Variable "__internal_9d70f57770b845a3ba114443a3c3668adacc71b1806a576e7def1493f866964e" does not exist.', 4, $this->source); })()));
            // line 37
            echo "</small>
                            ";
        }
        // line 39
        echo "                        </div>
                    </div>
                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 48
    public function block_item_actions($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "item_actions"));

        // line 49
        echo "                ";
        $context["_show_actions"] = $this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->getActionsForItem("show", twig_get_attribute($this->env, $this->source, (isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 49, $this->source); })()), "name", [], "any", false, false, false, 49));
        // line 50
        echo "                ";
        $context["_request_parameters"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 50, $this->source); })()), "request", [], "any", false, false, false, 50), "query", [], "any", false, false, false, 50), "all", [], "any", false, false, false, 50);
        // line 51
        echo "
                ";
        // line 52
        echo twig_include($this->env, $context, "@EasyAdmin/default/includes/_actions.html.twig", ["actions" =>         // line 53
(isset($context["_show_actions"]) || array_key_exists("_show_actions", $context) ? $context["_show_actions"] : (function () { throw new RuntimeError('Variable "_show_actions" does not exist.', 53, $this->source); })()), "entity_config" =>         // line 54
(isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 54, $this->source); })()), "request_parameters" =>         // line 55
(isset($context["_request_parameters"]) || array_key_exists("_request_parameters", $context) ? $context["_request_parameters"] : (function () { throw new RuntimeError('Variable "_request_parameters" does not exist.', 55, $this->source); })()), "translation_domain" => twig_get_attribute($this->env, $this->source,         // line 56
(isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 56, $this->source); })()), "translation_domain", [], "any", false, false, false, 56), "trans_parameters" =>         // line 57
(isset($context["_trans_parameters"]) || array_key_exists("_trans_parameters", $context) ? $context["_trans_parameters"] : (function () { throw new RuntimeError('Variable "_trans_parameters" does not exist.', 57, $this->source); })()), "item_id" =>         // line 58
(isset($context["_entity_id"]) || array_key_exists("_entity_id", $context) ? $context["_entity_id"] : (function () { throw new RuntimeError('Variable "_entity_id" does not exist.', 58, $this->source); })()), "item" =>         // line 59
(isset($context["entity"]) || array_key_exists("entity", $context) ? $context["entity"] : (function () { throw new RuntimeError('Variable "entity" does not exist.', 59, $this->source); })())], false);
        // line 60
        echo "
            ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 65
    public function block_delete_form($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "delete_form"));

        // line 66
        echo "        ";
        echo twig_include($this->env, $context, "@EasyAdmin/default/includes/_delete_form.html.twig", ["view" => "show", "referer" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 68
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 68, $this->source); })()), "request", [], "any", false, false, false, 68), "query", [], "any", false, false, false, 68), "get", [0 => "referer", 1 => ""], "method", false, false, false, 68), "delete_form" =>         // line 69
(isset($context["delete_form"]) || array_key_exists("delete_form", $context) ? $context["delete_form"] : (function () { throw new RuntimeError('Variable "delete_form" does not exist.', 69, $this->source); })()), "_translation_domain" => twig_get_attribute($this->env, $this->source,         // line 70
(isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 70, $this->source); })()), "translation_domain", [], "any", false, false, false, 70), "_trans_parameters" =>         // line 71
(isset($context["_trans_parameters"]) || array_key_exists("_trans_parameters", $context) ? $context["_trans_parameters"] : (function () { throw new RuntimeError('Variable "_trans_parameters" does not exist.', 71, $this->source); })()), "_entity_config" =>         // line 72
(isset($context["_entity_config"]) || array_key_exists("_entity_config", $context) ? $context["_entity_config"] : (function () { throw new RuntimeError('Variable "_entity_config" does not exist.', 72, $this->source); })())], false);
        // line 73
        echo "
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 77
    public function block_body_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body_javascript"));

        // line 78
        echo "    ";
        $this->displayParentBlock("body_javascript", $context, $blocks);
        echo "

    <script type=\"text/javascript\">
        \$(function() {
            \$('a.action-delete').on('click', function(e) {
                e.preventDefault();

                \$('#modal-delete').modal({ backdrop: true, keyboard: true })
                    .off('click', '#modal-delete-button')
                    .on('click', '#modal-delete-button', function () {
                        \$('#delete-form').trigger('submit');
                    });
            });
        });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@EasyAdmin/default/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  336 => 78,  329 => 77,  321 => 73,  319 => 72,  318 => 71,  317 => 70,  316 => 69,  315 => 68,  313 => 66,  306 => 65,  298 => 60,  296 => 59,  295 => 58,  294 => 57,  293 => 56,  292 => 55,  291 => 54,  290 => 53,  289 => 52,  286 => 51,  283 => 50,  280 => 49,  273 => 48,  264 => 39,  260 => 37,  258 => 4,  256 => 37,  254 => 36,  248 => 33,  242 => 29,  240 => 4,  239 => 29,  231 => 27,  224 => 26,  217 => 43,  203 => 42,  200 => 26,  182 => 25,  179 => 24,  172 => 23,  165 => 65,  160 => 62,  158 => 48,  152 => 44,  150 => 23,  147 => 22,  140 => 21,  127 => 19,  120 => 13,  115 => 15,  114 => 4,  112 => 15,  109 => 14,  106 => 13,  99 => 12,  86 => 10,  73 => 9,  66 => 7,  64 => 5,  63 => 4,  62 => 5,  61 => 4,  60 => 5,  58 => 4,  56 => 3,  54 => 1,  44 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("{% set _entity_config = easyadmin_entity(app.request.query.get('entity')) %}
{# the empty string concatenation is needed when the primary key is an object (e.g. an Uuid object) #}
{% set _entity_id = '' ~ attribute(entity, _entity_config.primary_key_field_name) %}
{% trans_default_domain _entity_config.translation_domain %}
{% set _trans_parameters = { '%entity_name%': _entity_config.name|trans, '%entity_label%': _entity_config.label|trans, '%entity_id%': _entity_id } %}

{% extends _entity_config.templates.layout %}

{% block body_id 'easyadmin-show-' ~ _entity_config.name ~ '-' ~ _entity_id %}
{% block body_class 'show show-' ~ _entity_config.name|lower %}

{% block content_title %}
    {% apply spaceless %}
        {% set _default_title = 'show.page_title'|trans(_trans_parameters, 'EasyAdminBundle') %}
        {{ _entity_config.show.title is defined ? _entity_config.show.title|trans(_trans_parameters) : _default_title }}
    {% endapply %}
{% endblock %}

{% block content_footer_wrapper '' %}

{% block main %}
    <div class=\"form-horizontal\">
        {% block show_fields %}
            {% set _fields_visible_by_user = fields|filter((metadata, field) => easyadmin_is_granted(metadata.permission)) %}
            {% for field, metadata in _fields_visible_by_user %}
                {% block show_field %}
                    <div class=\"form-group field-{{ metadata.type|default('default')|lower }} {{ metadata.css_class|default('') }}\">
                        <label class=\"control-label\">
                            {{ metadata.label|trans(_trans_parameters)|raw }}
                        </label>
                        <div class=\"form-widget\">
                            <div class=\"form-control\">
                                {{ easyadmin_render_field_for_show_view(_entity_config.name, entity, metadata) }}
                            </div>

                            {% if metadata.help|default('') != '' %}
                                <small class=\"form-help\"><i class=\"fa fa-fw fa-info-circle\"></i> {{ metadata.help|trans|raw }}</small>
                            {% endif %}
                        </div>
                    </div>
                {% endblock %}
            {% endfor %}
        {% endblock %}
    </div>

    <section class=\"content-footer\">
        <div class=\"form-actions\">
            {% block item_actions %}
                {% set _show_actions = easyadmin_get_actions_for_show_item(_entity_config.name) %}
                {% set _request_parameters = app.request.query.all %}

                {{ include('@EasyAdmin/default/includes/_actions.html.twig', {
                    actions: _show_actions,
                    entity_config: _entity_config,
                    request_parameters: _request_parameters,
                    translation_domain: _entity_config.translation_domain,
                    trans_parameters: _trans_parameters,
                    item_id: _entity_id,
                    item: entity
                }, with_context = false) }}
            {% endblock item_actions %}
        </div>
    </section>

    {% block delete_form %}
        {{ include('@EasyAdmin/default/includes/_delete_form.html.twig', {
            view: 'show',
            referer: app.request.query.get('referer', ''),
            delete_form: delete_form,
            _translation_domain: _entity_config.translation_domain,
            _trans_parameters: _trans_parameters,
            _entity_config: _entity_config,
        }, with_context = false) }}
    {% endblock delete_form %}
{% endblock %}

{% block body_javascript %}
    {{ parent() }}

    <script type=\"text/javascript\">
        \$(function() {
            \$('a.action-delete').on('click', function(e) {
                e.preventDefault();

                \$('#modal-delete').modal({ backdrop: true, keyboard: true })
                    .off('click', '#modal-delete-button')
                    .on('click', '#modal-delete-button', function () {
                        \$('#delete-form').trigger('submit');
                    });
            });
        });
    </script>
{% endblock %}
", "@EasyAdmin/default/show.html.twig", "/home/diakhate/creerPartenaireDepotRetrait/vendor/easycorp/easyadmin-bundle/src/Resources/views/default/show.html.twig");
    }
}
