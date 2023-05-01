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

/* namespaces.twig */
class __TwigTemplate_0b875d369f666d5bf7e872002da552348257176b6ed20057876331a668a7e742 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body_class' => [$this, 'block_body_class'],
            'page_content' => [$this, 'block_page_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout/layout.twig", "namespaces.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Namespaces | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_body_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "namespaces";
    }

    // line 5
    public function block_page_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <div class=\"page-header\">
        <h1>Namespaces</h1>
    </div>

    ";
        // line 10
        if ((isset($context["namespaces"]) || array_key_exists("namespaces", $context) ? $context["namespaces"] : (function () { throw new RuntimeError('Variable "namespaces" does not exist.', 10, $this->source); })())) {
            // line 11
            echo "        <div class=\"namespaces clearfix\">
            ";
            // line 12
            $context["last_name"] = "";
            // line 13
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["namespaces"]) || array_key_exists("namespaces", $context) ? $context["namespaces"] : (function () { throw new RuntimeError('Variable "namespaces" does not exist.', 13, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["namespace"]) {
                // line 14
                echo "                ";
                $context["top_level"] = twig_first($this->env, twig_split_filter($this->env, $context["namespace"], "\\"));
                // line 15
                echo "                ";
                if (((isset($context["top_level"]) || array_key_exists("top_level", $context) ? $context["top_level"] : (function () { throw new RuntimeError('Variable "top_level" does not exist.', 15, $this->source); })()) != (isset($context["last_name"]) || array_key_exists("last_name", $context) ? $context["last_name"] : (function () { throw new RuntimeError('Variable "last_name" does not exist.', 15, $this->source); })()))) {
                    // line 16
                    echo "                    ";
                    if ((isset($context["last_name"]) || array_key_exists("last_name", $context) ? $context["last_name"] : (function () { throw new RuntimeError('Variable "last_name" does not exist.', 16, $this->source); })())) {
                        echo "</ul></div>";
                    }
                    // line 17
                    echo "                    <div class=\"namespace-container\">
                        <h2>";
                    // line 18
                    echo (isset($context["top_level"]) || array_key_exists("top_level", $context) ? $context["top_level"] : (function () { throw new RuntimeError('Variable "top_level" does not exist.', 18, $this->source); })());
                    echo "</h2>
                        <ul>
                    ";
                    // line 20
                    $context["last_name"] = (isset($context["top_level"]) || array_key_exists("top_level", $context) ? $context["top_level"] : (function () { throw new RuntimeError('Variable "top_level" does not exist.', 20, $this->source); })());
                    // line 21
                    echo "                ";
                }
                // line 22
                echo "                <li><a href=\"";
                echo $this->extensions['Sami\Renderer\TwigExtension']->pathForNamespace($context, $context["namespace"]);
                echo "\">";
                echo $context["namespace"];
                echo "</a></li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['namespace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "                </ul>
            </div>
        </div>
    ";
        }
        // line 28
        echo "
";
    }

    public function getTemplateName()
    {
        return "namespaces.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 28,  120 => 24,  109 => 22,  106 => 21,  104 => 20,  99 => 18,  96 => 17,  91 => 16,  88 => 15,  85 => 14,  80 => 13,  78 => 12,  75 => 11,  73 => 10,  67 => 6,  63 => 5,  56 => 3,  48 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout/layout.twig\" %}
{% block title %}Namespaces | {{ parent() }}{% endblock %}
{% block body_class 'namespaces' %}

{% block page_content %}
    <div class=\"page-header\">
        <h1>Namespaces</h1>
    </div>

    {% if namespaces %}
        <div class=\"namespaces clearfix\">
            {% set last_name = '' %}
            {% for namespace in namespaces %}
                {% set top_level = namespace|split('\\\\')|first %}
                {% if top_level != last_name %}
                    {% if last_name %}</ul></div>{% endif %}
                    <div class=\"namespace-container\">
                        <h2>{{ top_level|raw }}</h2>
                        <ul>
                    {% set last_name = top_level %}
                {% endif %}
                <li><a href=\"{{ namespace_path(namespace) }}\">{{ namespace|raw }}</a></li>
            {% endfor %}
                </ul>
            </div>
        </div>
    {% endif %}

{% endblock %}
", "namespaces.twig", "/home/vagrant/repos/cms/configuration2/vendor/sami/sami/Sami/Resources/themes/default/namespaces.twig");
    }
}
