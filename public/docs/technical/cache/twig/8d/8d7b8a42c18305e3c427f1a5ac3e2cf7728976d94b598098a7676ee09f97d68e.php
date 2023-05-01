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

/* doc-index.twig */
class __TwigTemplate_43a0c56875fad69b6fca8f36b3459e4c1b4994b931f441f9972da1b26dce56cc extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "doc-index.twig", 1);
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
        $context["__internal_181988ad1bb6bf3800caa6630780e99722c9017b50646a0a903a4ef5881baae6"] = $this->loadTemplate("macros.twig", "doc-index.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        echo "Index | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = [])
    {
        echo "doc-index";
    }

    // line 6
    public function block_page_content($context, array $blocks = [])
    {
        // line 7
        echo "
    <div class=\"page-header\">
        <h1>Index</h1>
    </div>

    <ul class=\"pagination\">
        ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range("A", "Z"));
        foreach ($context['_seq'] as $context["_key"] => $context["letter"]) {
            // line 14
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), $context["letter"], [], "array", true, true) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 14, $this->source); })()), $context["letter"], [], "array")) > 1))) {
                // line 15
                echo "                <li><a href=\"#letter";
                echo $context["letter"];
                echo "\">";
                echo $context["letter"];
                echo "</a></li>
            ";
            } else {
                // line 17
                echo "                <li class=\"disabled\"><a href=\"#letter";
                echo $context["letter"];
                echo "\">";
                echo $context["letter"];
                echo "</a></li>
            ";
            }
            // line 19
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['letter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "    </ul>

    ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) || array_key_exists("items", $context) ? $context["items"] : (function () { throw new RuntimeError('Variable "items" does not exist.', 22, $this->source); })()));
        foreach ($context['_seq'] as $context["letter"] => $context["elements"]) {
            // line 23
            echo "<h2 id=\"letter";
            echo $context["letter"];
            echo "\">";
            echo $context["letter"];
            echo "</h2>
        <dl id=\"index\">";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["elements"]);
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 26
                $context["type"] = twig_get_attribute($this->env, $this->source, $context["element"], 0, [], "array");
                // line 27
                $context["value"] = twig_get_attribute($this->env, $this->source, $context["element"], 1, [], "array");
                // line 28
                if (("class" == (isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 28, $this->source); })()))) {
                    // line 29
                    echo "<dt>";
                    echo $context["__internal_181988ad1bb6bf3800caa6630780e99722c9017b50646a0a903a4ef5881baae6"]->macro_class_link((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 29, $this->source); })()));
                    if ((isset($context["has_namespaces"]) || array_key_exists("has_namespaces", $context) ? $context["has_namespaces"] : (function () { throw new RuntimeError('Variable "has_namespaces" does not exist.', 29, $this->source); })())) {
                        echo " &mdash; <em>Class in namespace ";
                        echo $context["__internal_181988ad1bb6bf3800caa6630780e99722c9017b50646a0a903a4ef5881baae6"]->macro_namespace_link(twig_get_attribute($this->env, $this->source, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 29, $this->source); })()), "namespace", []));
                    }
                    echo "</em></dt>
                    <dd>";
                    // line 30
                    echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 30, $this->source); })()), "shortdesc", []), (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 30, $this->source); })()));
                    echo "</dd>";
                } elseif (("method" ==                 // line 31
(isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 31, $this->source); })()))) {
                    // line 32
                    echo "<dt>";
                    echo $context["__internal_181988ad1bb6bf3800caa6630780e99722c9017b50646a0a903a4ef5881baae6"]->macro_method_link((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 32, $this->source); })()));
                    echo "() &mdash; <em>Method in class ";
                    echo $context["__internal_181988ad1bb6bf3800caa6630780e99722c9017b50646a0a903a4ef5881baae6"]->macro_class_link(twig_get_attribute($this->env, $this->source, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 32, $this->source); })()), "class", []));
                    echo "</em></dt>
                    <dd>";
                    // line 33
                    echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 33, $this->source); })()), "shortdesc", []), twig_get_attribute($this->env, $this->source, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 33, $this->source); })()), "class", []));
                    echo "</dd>";
                } elseif (("property" ==                 // line 34
(isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 34, $this->source); })()))) {
                    // line 35
                    echo "<dt>\$";
                    echo $context["__internal_181988ad1bb6bf3800caa6630780e99722c9017b50646a0a903a4ef5881baae6"]->macro_property_link((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 35, $this->source); })()));
                    echo " &mdash; <em>Property in class ";
                    echo $context["__internal_181988ad1bb6bf3800caa6630780e99722c9017b50646a0a903a4ef5881baae6"]->macro_class_link(twig_get_attribute($this->env, $this->source, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 35, $this->source); })()), "class", []));
                    echo "</em></dt>
                    <dd>";
                    // line 36
                    echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 36, $this->source); })()), "shortdesc", []), twig_get_attribute($this->env, $this->source, (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 36, $this->source); })()), "class", []));
                    echo "</dd>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "        </dl>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['letter'], $context['elements'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "doc-index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 39,  160 => 36,  153 => 35,  151 => 34,  148 => 33,  141 => 32,  139 => 31,  136 => 30,  127 => 29,  125 => 28,  123 => 27,  121 => 26,  117 => 25,  110 => 23,  106 => 22,  102 => 20,  96 => 19,  88 => 17,  80 => 15,  77 => 14,  73 => 13,  65 => 7,  62 => 6,  56 => 4,  49 => 3,  45 => 1,  43 => 2,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout/layout.twig\" %}
{% from \"macros.twig\" import class_link, namespace_link, method_link, property_link %}
{% block title %}Index | {{ parent() }}{% endblock %}
{% block body_class 'doc-index' %}

{% block page_content %}

    <div class=\"page-header\">
        <h1>Index</h1>
    </div>

    <ul class=\"pagination\">
        {% for letter in 'A'..'Z' %}
            {% if items[letter] is defined and items[letter]|length > 1 %}
                <li><a href=\"#letter{{ letter|raw }}\">{{ letter|raw }}</a></li>
            {% else %}
                <li class=\"disabled\"><a href=\"#letter{{ letter|raw }}\">{{ letter|raw }}</a></li>
            {% endif %}
        {% endfor %}
    </ul>

    {% for letter, elements in items -%}
        <h2 id=\"letter{{ letter|raw }}\">{{ letter|raw }}</h2>
        <dl id=\"index\">
            {%- for element in elements %}
                {%- set type = element[0] %}
                {%- set value = element[1] %}
                {%- if 'class' == type -%}
                    <dt>{{ class_link(value) }}{% if has_namespaces %} &mdash; <em>Class in namespace {{ namespace_link(value.namespace) }}{% endif %}</em></dt>
                    <dd>{{ value.shortdesc|desc(value) }}</dd>
                {%- elseif 'method' == type -%}
                    <dt>{{ method_link(value) }}() &mdash; <em>Method in class {{ class_link(value.class) }}</em></dt>
                    <dd>{{ value.shortdesc|desc(value.class) }}</dd>
                {%- elseif 'property' == type -%}
                    <dt>\${{ property_link(value) }} &mdash; <em>Property in class {{ class_link(value.class) }}</em></dt>
                    <dd>{{ value.shortdesc|desc(value.class) }}</dd>
                {%- endif %}
            {%- endfor %}
        </dl>
    {%- endfor %}
{% endblock %}
", "doc-index.twig", "C:\\Users\\phillip.madsen\\repos\\cms\\configuration2\\vendor\\sami\\sami\\Sami\\Resources\\themes\\default\\doc-index.twig");
    }
}
