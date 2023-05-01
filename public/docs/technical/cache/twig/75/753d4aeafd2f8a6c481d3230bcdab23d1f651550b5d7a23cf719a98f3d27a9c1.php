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

/* traits.twig */
class __TwigTemplate_7ba76cee8a3acfb6b0fdd82c25f564caff2062bca1ac18da4ad9f7e0dd8f6b00 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "traits.twig", 1);
        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body_class' => [$this, 'block_body_class'],
            'page_content' => [$this, 'block_page_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        $context["__internal_f1e8c5e9e40de9181ea9ca8918beeccde71446a7ee897712baaddb49a607f17f"] = $this->loadTemplate("macros.twig", "traits.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        echo "Traits | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = [])
    {
        echo "traits";
    }

    // line 6
    public function block_page_content($context, array $blocks = [])
    {
        // line 7
        echo "    <div class=\"page-header\">
        <h1>Traits</h1>
    </div>

    <div class=\"container-fluid underlined\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["classes"]) || array_key_exists("classes", $context) ? $context["classes"] : (function () { throw new RuntimeError('Variable "classes" does not exist.', 12, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 13
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, $context["class"], "trait", [])) {
                // line 14
                echo "                <div class=\"row\">
                    <div class=\"col-md-6\">
                        ";
                // line 16
                echo $context["__internal_f1e8c5e9e40de9181ea9ca8918beeccde71446a7ee897712baaddb49a607f17f"]->macro_class_link($context["class"], true);
                echo "
                    </div>
                    <div class=\"col-md-6\">
                        ";
                // line 19
                echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["class"], "shortdesc", []), $context["class"]);
                echo "
                    </div>
                </div>
            ";
            }
            // line 23
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "traits.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 24,  96 => 23,  89 => 19,  83 => 16,  79 => 14,  76 => 13,  72 => 12,  65 => 7,  62 => 6,  56 => 4,  49 => 3,  45 => 1,  43 => 2,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout/layout.twig\" %}
{% from \"macros.twig\" import class_link %}
{% block title %}Traits | {{ parent() }}{% endblock %}
{% block body_class 'traits' %}

{% block page_content %}
    <div class=\"page-header\">
        <h1>Traits</h1>
    </div>

    <div class=\"container-fluid underlined\">
        {% for class in classes %}
            {% if class.trait %}
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        {{ class_link(class, true) }}
                    </div>
                    <div class=\"col-md-6\">
                        {{ class.shortdesc|desc(class) }}
                    </div>
                </div>
            {% endif %}
        {% endfor %}
    </div>
{% endblock %}
", "traits.twig", "C:\\Users\\phillip.madsen\\repos\\cms\\configuration2\\vendor\\sami\\sami\\Sami\\Resources\\themes\\default\\traits.twig");
    }
}
