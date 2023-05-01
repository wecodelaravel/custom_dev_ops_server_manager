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

/* layout/layout.twig */
class __TwigTemplate_c4da45101aa6bdc30db13628b74a9ac3d767c2c49d7471517896ab93ab1b4d75 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'below_menu' => [$this, 'block_below_menu'],
            'page_content' => [$this, 'block_page_content'],
            'menu' => [$this, 'block_menu'],
            'leftnav' => [$this, 'block_leftnav'],
            'control_panel' => [$this, 'block_control_panel'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout/base.twig", "layout/layout.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div id=\"content\">
        <div id=\"left-column\">
            ";
        // line 6
        $this->displayBlock("control_panel", $context, $blocks);
        echo "
            ";
        // line 7
        $this->displayBlock("leftnav", $context, $blocks);
        echo "
        </div>
        <div id=\"right-column\">
            ";
        // line 10
        $this->displayBlock("menu", $context, $blocks);
        echo "
            ";
        // line 11
        $this->displayBlock('below_menu', $context, $blocks);
        // line 12
        echo "            <div id=\"page-content\">
                ";
        // line 13
        $this->displayBlock('page_content', $context, $blocks);
        // line 14
        echo "            </div>
            ";
        // line 15
        $this->displayBlock("footer", $context, $blocks);
        echo "
        </div>
    </div>
";
    }

    // line 11
    public function block_below_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "";
    }

    // line 13
    public function block_page_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "";
    }

    // line 20
    public function block_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        echo "    <nav id=\"site-nav\" class=\"navbar navbar-default\" role=\"navigation\">
        <div class=\"container-fluid\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-elements\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Sami\Renderer\TwigExtension']->pathForStaticFile($context, "index.html"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 30, $this->source); })()), "config", [0 => "title"], "method", false, false, false, 30), "html", null, true);
        echo "</a>
            </div>
            <div class=\"collapse navbar-collapse\" id=\"navbar-elements\">
                <ul class=\"nav navbar-nav\">
                    <li><a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Sami\Renderer\TwigExtension']->pathForStaticFile($context, "classes.html"), "html", null, true);
        echo "\">Classes</a></li>
                    ";
        // line 35
        if ((isset($context["has_namespaces"]) || array_key_exists("has_namespaces", $context) ? $context["has_namespaces"] : (function () { throw new RuntimeError('Variable "has_namespaces" does not exist.', 35, $this->source); })())) {
            // line 36
            echo "                        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Sami\Renderer\TwigExtension']->pathForStaticFile($context, "namespaces.html"), "html", null, true);
            echo "\">Namespaces</a></li>
                    ";
        }
        // line 38
        echo "                    <li><a href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Sami\Renderer\TwigExtension']->pathForStaticFile($context, "interfaces.html"), "html", null, true);
        echo "\">Interfaces</a></li>
                    <li><a href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Sami\Renderer\TwigExtension']->pathForStaticFile($context, "traits.html"), "html", null, true);
        echo "\">Traits</a></li>
                    <li><a href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Sami\Renderer\TwigExtension']->pathForStaticFile($context, "doc-index.html"), "html", null, true);
        echo "\">Index</a></li>
                    <li><a href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->extensions['Sami\Renderer\TwigExtension']->pathForStaticFile($context, "search.html"), "html", null, true);
        echo "\">Search</a></li>
                </ul>
            </div>
        </div>
    </nav>
";
    }

    // line 48
    public function block_leftnav($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        echo "    <div id=\"api-tree\"></div>
";
    }

    // line 52
    public function block_control_panel($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 53
        echo "    <div id=\"control-panel\">
        ";
        // line 54
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 54, $this->source); })()), "versions", [], "any", false, false, false, 54)) > 1)) {
            // line 55
            echo "            <form action=\"#\" method=\"GET\">
                <select id=\"version-switcher\" name=\"version\">
                    ";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 57, $this->source); })()), "versions", [], "any", false, false, false, 57));
            foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
                // line 58
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $this->extensions['Sami\Renderer\TwigExtension']->pathForStaticFile($context, (("../" . $context["version"]) . "/index.html")), "html", null, true);
                echo "\" data-version=\"";
                echo twig_escape_filter($this->env, $context["version"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["version"], "longname", [], "any", false, false, false, 58), "html", null, true);
                echo "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['version'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "                </select>
            </form>
        ";
        }
        // line 63
        echo "        <script>
            \$('option[data-version=\"'+window.projectVersion+'\"]').prop('selected', true);
        </script>
        <form id=\"search-form\" action=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->extensions['Sami\Renderer\TwigExtension']->pathForStaticFile($context, "search.html"), "html", null, true);
        echo "\" method=\"GET\">
            <span class=\"glyphicon glyphicon-search\"></span>
            <input name=\"search\"
                   class=\"typeahead form-control\"
                   type=\"search\"
                   placeholder=\"Search\">
        </form>
    </div>
";
    }

    // line 76
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 77
        echo "    <div id=\"footer\">
        Generated by <a href=\"http://sami.sensiolabs.org/\">Sami, the API Documentation Generator</a>.
    </div>
";
    }

    public function getTemplateName()
    {
        return "layout/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 77,  227 => 76,  214 => 66,  209 => 63,  204 => 60,  191 => 58,  187 => 57,  183 => 55,  181 => 54,  178 => 53,  174 => 52,  169 => 49,  165 => 48,  155 => 41,  151 => 40,  147 => 39,  142 => 38,  136 => 36,  134 => 35,  130 => 34,  121 => 30,  110 => 21,  106 => 20,  99 => 13,  92 => 11,  84 => 15,  81 => 14,  79 => 13,  76 => 12,  74 => 11,  70 => 10,  64 => 7,  60 => 6,  56 => 4,  52 => 3,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout/base.twig\" %}

{% block content %}
    <div id=\"content\">
        <div id=\"left-column\">
            {{ block('control_panel') }}
            {{ block('leftnav') }}
        </div>
        <div id=\"right-column\">
            {{ block('menu') }}
            {% block below_menu '' %}
            <div id=\"page-content\">
                {% block page_content '' %}
            </div>
            {{ block('footer') }}
        </div>
    </div>
{% endblock %}

{% block menu %}
    <nav id=\"site-nav\" class=\"navbar navbar-default\" role=\"navigation\">
        <div class=\"container-fluid\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-elements\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"{{ path('index.html') }}\">{{ project.config('title') }}</a>
            </div>
            <div class=\"collapse navbar-collapse\" id=\"navbar-elements\">
                <ul class=\"nav navbar-nav\">
                    <li><a href=\"{{ path('classes.html') }}\">Classes</a></li>
                    {% if has_namespaces %}
                        <li><a href=\"{{ path('namespaces.html') }}\">Namespaces</a></li>
                    {% endif %}
                    <li><a href=\"{{ path('interfaces.html') }}\">Interfaces</a></li>
                    <li><a href=\"{{ path('traits.html') }}\">Traits</a></li>
                    <li><a href=\"{{ path('doc-index.html') }}\">Index</a></li>
                    <li><a href=\"{{ path('search.html') }}\">Search</a></li>
                </ul>
            </div>
        </div>
    </nav>
{% endblock %}

{% block leftnav %}
    <div id=\"api-tree\"></div>
{% endblock %}

{% block control_panel %}
    <div id=\"control-panel\">
        {% if project.versions|length > 1 %}
            <form action=\"#\" method=\"GET\">
                <select id=\"version-switcher\" name=\"version\">
                    {% for version in project.versions %}
                        <option value=\"{{ path('../' ~ version ~ '/index.html') }}\" data-version=\"{{ version }}\">{{ version.longname }}</option>
                    {% endfor %}
                </select>
            </form>
        {% endif %}
        <script>
            \$('option[data-version=\"'+window.projectVersion+'\"]').prop('selected', true);
        </script>
        <form id=\"search-form\" action=\"{{ path('search.html') }}\" method=\"GET\">
            <span class=\"glyphicon glyphicon-search\"></span>
            <input name=\"search\"
                   class=\"typeahead form-control\"
                   type=\"search\"
                   placeholder=\"Search\">
        </form>
    </div>
{% endblock %}

{% block footer %}
    <div id=\"footer\">
        Generated by <a href=\"http://sami.sensiolabs.org/\">Sami, the API Documentation Generator</a>.
    </div>
{% endblock %}
", "layout/layout.twig", "/home/vagrant/repos/cms/configuration2/vendor/sami/sami/Sami/Resources/themes/default/layout/layout.twig");
    }
}
