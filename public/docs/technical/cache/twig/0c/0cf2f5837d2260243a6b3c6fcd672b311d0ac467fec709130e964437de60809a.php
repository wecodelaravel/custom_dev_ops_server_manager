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

/* class.twig */
class __TwigTemplate_61cb9f3ccfc81d379c2858b6a90cbc2476b2dd91201c9deecd6f2711e4c2e9b0 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "class.twig", 1);
        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body_class' => [$this, 'block_body_class'],
            'page_id' => [$this, 'block_page_id'],
            'below_menu' => [$this, 'block_below_menu'],
            'page_content' => [$this, 'block_page_content'],
            'class_signature' => [$this, 'block_class_signature'],
            'method_signature' => [$this, 'block_method_signature'],
            'method_parameters_signature' => [$this, 'block_method_parameters_signature'],
            'parameters' => [$this, 'block_parameters'],
            'return' => [$this, 'block_return'],
            'exceptions' => [$this, 'block_exceptions'],
            'see' => [$this, 'block_see'],
            'constants' => [$this, 'block_constants'],
            'properties' => [$this, 'block_properties'],
            'methods' => [$this, 'block_methods'],
            'methods_details' => [$this, 'block_methods_details'],
            'method' => [$this, 'block_method'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"] = $this->loadTemplate("macros.twig", "class.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        echo (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 3, $this->source); })());
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = [])
    {
        echo "class";
    }

    // line 5
    public function block_page_id($context, array $blocks = [])
    {
        echo twig_escape_filter($this->env, ("class:" . twig_replace_filter(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 5, $this->source); })()), "name", []), ["\\" => "_"])), "html", null, true);
    }

    // line 7
    public function block_below_menu($context, array $blocks = [])
    {
        // line 8
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 8, $this->source); })()), "namespace", [])) {
            // line 9
            echo "        <div class=\"namespace-breadcrumbs\">
            <ol class=\"breadcrumb\">
                <li><span class=\"label label-default\">";
            // line 11
            echo twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 11, $this->source); })()), "categoryName", []);
            echo "</span></li>
                ";
            // line 12
            echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_breadcrumbs(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 12, $this->source); })()), "namespace", []));
            // line 13
            echo "<li>";
            echo twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 13, $this->source); })()), "shortname", []);
            echo "</li>
            </ol>
        </div>
    ";
        }
    }

    // line 19
    public function block_page_content($context, array $blocks = [])
    {
        // line 20
        echo "
    <div class=\"page-header\">
        <h1>
            ";
        // line 23
        echo twig_last($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 23, $this->source); })()), "name", []), "\\"));
        echo "
            ";
        // line 24
        echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_deprecated((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 24, $this->source); })()));
        echo "
        </h1>
    </div>

    <p>";
        // line 28
        $this->displayBlock("class_signature", $context, $blocks);
        echo "</p>

    ";
        // line 30
        echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_deprecations((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 30, $this->source); })()));
        echo "

    ";
        // line 32
        if ((twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 32, $this->source); })()), "shortdesc", []) || twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 32, $this->source); })()), "longdesc", []))) {
            // line 33
            echo "        <div class=\"description\">
            ";
            // line 34
            if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 34, $this->source); })()), "shortdesc", [])) {
                // line 35
                echo "<p>";
                echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 35, $this->source); })()), "shortdesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 35, $this->source); })()));
                echo "</p>";
            }
            // line 37
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 37, $this->source); })()), "longdesc", [])) {
                // line 38
                echo "<p>";
                echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 38, $this->source); })()), "longdesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 38, $this->source); })()));
                echo "</p>";
            }
            // line 40
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 40, $this->source); })()), "config", [0 => "insert_todos"], "method") == true)) {
                // line 41
                echo "                ";
                echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_todos((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 41, $this->source); })()));
                echo "
            ";
            }
            // line 43
            echo "        </div>
    ";
        }
        // line 45
        echo "
    ";
        // line 46
        if ((isset($context["traits"]) || array_key_exists("traits", $context) ? $context["traits"] : (function () { throw new RuntimeError('Variable "traits" does not exist.', 46, $this->source); })())) {
            // line 47
            echo "        <h2>Traits</h2>

        ";
            // line 49
            echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_render_classes((isset($context["traits"]) || array_key_exists("traits", $context) ? $context["traits"] : (function () { throw new RuntimeError('Variable "traits" does not exist.', 49, $this->source); })()));
            echo "
    ";
        }
        // line 51
        echo "
    ";
        // line 52
        if ((isset($context["constants"]) || array_key_exists("constants", $context) ? $context["constants"] : (function () { throw new RuntimeError('Variable "constants" does not exist.', 52, $this->source); })())) {
            // line 53
            echo "        <h2>Constants</h2>

        ";
            // line 55
            $this->displayBlock("constants", $context, $blocks);
            echo "
    ";
        }
        // line 57
        echo "
    ";
        // line 58
        if ((isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 58, $this->source); })())) {
            // line 59
            echo "        <h2>Properties</h2>

        ";
            // line 61
            $this->displayBlock("properties", $context, $blocks);
            echo "
    ";
        }
        // line 63
        echo "
    ";
        // line 64
        if ((isset($context["methods"]) || array_key_exists("methods", $context) ? $context["methods"] : (function () { throw new RuntimeError('Variable "methods" does not exist.', 64, $this->source); })())) {
            // line 65
            echo "        <h2>Methods</h2>

        ";
            // line 67
            $this->displayBlock("methods", $context, $blocks);
            echo "

        <h2>Details</h2>

        ";
            // line 71
            $this->displayBlock("methods_details", $context, $blocks);
            echo "
    ";
        }
        // line 73
        echo "
";
    }

    // line 76
    public function block_class_signature($context, array $blocks = [])
    {
        // line 77
        if (( !twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 77, $this->source); })()), "interface", []) && twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 77, $this->source); })()), "abstract", []))) {
            echo "abstract ";
        }
        // line 78
        echo "    ";
        echo twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 78, $this->source); })()), "categoryName", []);
        echo "
    <strong>";
        // line 79
        echo twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 79, $this->source); })()), "shortname", []);
        echo "</strong>";
        // line 80
        if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 80, $this->source); })()), "parent", [])) {
            // line 81
            echo "        extends ";
            echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_class_link(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 81, $this->source); })()), "parent", []));
        }
        // line 83
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 83, $this->source); })()), "interfaces", [])) > 0)) {
            // line 84
            echo "        implements
        ";
            // line 85
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 85, $this->source); })()), "interfaces", []));
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
            foreach ($context['_seq'] as $context["_key"] => $context["interface"]) {
                // line 86
                echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_class_link($context["interface"]);
                // line 87
                if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [])) {
                    echo ", ";
                }
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['interface'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 90
        echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_source_link((isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 90, $this->source); })()), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 90, $this->source); })()));
        echo "
";
    }

    // line 93
    public function block_method_signature($context, array $blocks = [])
    {
        // line 94
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 94, $this->source); })()), "final", [])) {
            echo "final";
        }
        // line 95
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 95, $this->source); })()), "abstract", [])) {
            echo "abstract";
        }
        // line 96
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 96, $this->source); })()), "static", [])) {
            echo "static";
        }
        // line 97
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 97, $this->source); })()), "protected", [])) {
            echo "protected";
        }
        // line 98
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 98, $this->source); })()), "private", [])) {
            echo "private";
        }
        // line 99
        echo "    ";
        echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_hint_link(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 99, $this->source); })()), "hint", []));
        echo "
    <strong>";
        // line 100
        echo twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 100, $this->source); })()), "name", []);
        echo "</strong>";
        $this->displayBlock("method_parameters_signature", $context, $blocks);
    }

    // line 103
    public function block_method_parameters_signature($context, array $blocks = [])
    {
        // line 104
        $context["__internal_efc6bc7429e4fe8b09c5461c9472ed21ea0a688b0939eb65201c5bc56be7985a"] = $this->loadTemplate("macros.twig", "class.twig", 104);
        // line 105
        echo $context["__internal_efc6bc7429e4fe8b09c5461c9472ed21ea0a688b0939eb65201c5bc56be7985a"]->macro_method_parameters_signature((isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 105, $this->source); })()));
        echo "
    ";
        // line 106
        echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_deprecated((isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 106, $this->source); })()));
    }

    // line 109
    public function block_parameters($context, array $blocks = [])
    {
        // line 110
        echo "    <table class=\"table table-condensed\">
        ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 111, $this->source); })()), "parameters", []));
        foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
            // line 112
            echo "            <tr>
                <td>";
            // line 113
            if (twig_get_attribute($this->env, $this->source, $context["parameter"], "hint", [])) {
                echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_hint_link(twig_get_attribute($this->env, $this->source, $context["parameter"], "hint", []));
            }
            echo "</td>
                <td>";
            // line 114
            if (twig_get_attribute($this->env, $this->source, $context["parameter"], "variadic", [])) {
                echo "...";
            }
            echo "\$";
            echo twig_get_attribute($this->env, $this->source, $context["parameter"], "name", []);
            echo "</td>
                <td>";
            // line 115
            echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["parameter"], "shortdesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 115, $this->source); })()));
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parameter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        echo "    </table>
";
    }

    // line 121
    public function block_return($context, array $blocks = [])
    {
        // line 122
        echo "    <table class=\"table table-condensed\">
        <tr>
            <td>";
        // line 124
        echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_hint_link(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 124, $this->source); })()), "hint", []));
        echo "</td>
            <td>";
        // line 125
        echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 125, $this->source); })()), "hintDesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 125, $this->source); })()));
        echo "</td>
        </tr>
    </table>
";
    }

    // line 130
    public function block_exceptions($context, array $blocks = [])
    {
        // line 131
        echo "    <table class=\"table table-condensed\">
        ";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 132, $this->source); })()), "exceptions", []));
        foreach ($context['_seq'] as $context["_key"] => $context["exception"]) {
            // line 133
            echo "            <tr>
                <td>";
            // line 134
            echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_class_link(twig_get_attribute($this->env, $this->source, $context["exception"], 0, [], "array"));
            echo "</td>
                <td>";
            // line 135
            echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["exception"], 1, [], "array"), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 135, $this->source); })()));
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['exception'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 138
        echo "    </table>
";
    }

    // line 141
    public function block_see($context, array $blocks = [])
    {
        // line 142
        echo "    <table class=\"table table-condensed\">
        ";
        // line 143
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 143, $this->source); })()), "see", []));
        foreach ($context['_seq'] as $context["_key"] => $context["see"]) {
            // line 144
            echo "            <tr>
                <td>
                    ";
            // line 146
            if (twig_get_attribute($this->env, $this->source, $context["see"], 4, [], "array")) {
                // line 147
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["see"], 4, [], "array"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["see"], 4, [], "array"), "html", null, true);
                echo "</a>
                    ";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 148
$context["see"], 3, [], "array")) {
                // line 149
                echo "                        ";
                echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_method_link(twig_get_attribute($this->env, $this->source, $context["see"], 3, [], "array"), false, false);
                echo "
                    ";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 150
$context["see"], 2, [], "array")) {
                // line 151
                echo "                        ";
                echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_class_link(twig_get_attribute($this->env, $this->source, $context["see"], 2, [], "array"));
                echo "
                    ";
            } else {
                // line 153
                echo "                        ";
                echo twig_get_attribute($this->env, $this->source, $context["see"], 0, [], "array");
                echo "
                    ";
            }
            // line 155
            echo "                </td>
                <td>";
            // line 156
            echo twig_get_attribute($this->env, $this->source, $context["see"], 1, [], "array");
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['see'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 159
        echo "    </table>
";
    }

    // line 162
    public function block_constants($context, array $blocks = [])
    {
        // line 163
        echo "    <table class=\"table table-condensed\">
        ";
        // line 164
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["constants"]) || array_key_exists("constants", $context) ? $context["constants"] : (function () { throw new RuntimeError('Variable "constants" does not exist.', 164, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["constant"]) {
            // line 165
            echo "            <tr>
                <td>";
            // line 166
            echo twig_get_attribute($this->env, $this->source, $context["constant"], "name", []);
            echo "</td>
                <td class=\"last\">
                    <p><em>";
            // line 168
            echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["constant"], "shortdesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 168, $this->source); })()));
            echo "</em></p>
                    <p>";
            // line 169
            echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["constant"], "longdesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 169, $this->source); })()));
            echo "</p>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['constant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 173
        echo "    </table>
";
    }

    // line 176
    public function block_properties($context, array $blocks = [])
    {
        // line 177
        echo "    <table class=\"table table-condensed\">
        ";
        // line 178
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 178, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
            // line 179
            echo "            <tr>
                <td class=\"type\" id=\"property_";
            // line 180
            echo twig_get_attribute($this->env, $this->source, $context["property"], "name", []);
            echo "\">
                    ";
            // line 181
            if (twig_get_attribute($this->env, $this->source, $context["property"], "static", [])) {
                echo "static";
            }
            // line 182
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["property"], "protected", [])) {
                echo "protected";
            }
            // line 183
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["property"], "private", [])) {
                echo "private";
            }
            // line 184
            echo "                    ";
            echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_hint_link(twig_get_attribute($this->env, $this->source, $context["property"], "hint", []));
            echo "
                </td>
                <td>\$";
            // line 186
            echo twig_get_attribute($this->env, $this->source, $context["property"], "name", []);
            echo "</td>
                <td class=\"last\">";
            // line 187
            echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["property"], "shortdesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 187, $this->source); })()));
            echo "</td>
                <td>";
            // line 189
            if ( !(twig_get_attribute($this->env, $this->source, $context["property"], "class", []) === (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 189, $this->source); })()))) {
                // line 190
                echo "<small>from&nbsp;";
                echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_property_link($context["property"], false, true);
                echo "</small>";
            }
            // line 192
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 195
        echo "    </table>
";
    }

    // line 198
    public function block_methods($context, array $blocks = [])
    {
        // line 199
        echo "    <div class=\"container-fluid underlined\">
        ";
        // line 200
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) || array_key_exists("methods", $context) ? $context["methods"] : (function () { throw new RuntimeError('Variable "methods" does not exist.', 200, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 201
            echo "            <div class=\"row\">
                <div class=\"col-md-2 type\">
                    ";
            // line 203
            if (twig_get_attribute($this->env, $this->source, $context["method"], "static", [])) {
                echo "static&nbsp;";
            }
            echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_hint_link(twig_get_attribute($this->env, $this->source, $context["method"], "hint", []));
            echo "
                </div>
                <div class=\"col-md-8 type\">
                    <a href=\"#method_";
            // line 206
            echo twig_get_attribute($this->env, $this->source, $context["method"], "name", []);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["method"], "name", []);
            echo "</a>";
            $this->displayBlock("method_parameters_signature", $context, $blocks);
            echo "
                    ";
            // line 207
            if ( !twig_get_attribute($this->env, $this->source, $context["method"], "shortdesc", [])) {
                // line 208
                echo "                        <p class=\"no-description\">No description</p>
                    ";
            } else {
                // line 210
                echo "                        <p>";
                echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["method"], "shortdesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 210, $this->source); })()));
                echo "</p>";
            }
            // line 212
            echo "                </div>
                <div class=\"col-md-2\">";
            // line 214
            if ( !(twig_get_attribute($this->env, $this->source, $context["method"], "class", []) === (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 214, $this->source); })()))) {
                // line 215
                echo "<small>from&nbsp;";
                echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_method_link($context["method"], false, true);
                echo "</small>";
            }
            // line 217
            echo "</div>
            </div>
        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 220
        echo "    </div>
";
    }

    // line 223
    public function block_methods_details($context, array $blocks = [])
    {
        // line 224
        echo "    <div id=\"method-details\">
        ";
        // line 225
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) || array_key_exists("methods", $context) ? $context["methods"] : (function () { throw new RuntimeError('Variable "methods" does not exist.', 225, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 226
            echo "            <div class=\"method-item\">
                ";
            // line 227
            $this->displayBlock("method", $context, $blocks);
            echo "
            </div>
        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 230
        echo "    </div>
";
    }

    // line 233
    public function block_method($context, array $blocks = [])
    {
        // line 234
        echo "    <h3 id=\"method_";
        echo twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 234, $this->source); })()), "name", []);
        echo "\">
        <div class=\"location\">";
        // line 235
        if ( !(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 235, $this->source); })()), "class", []) === (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 235, $this->source); })()))) {
            echo "in ";
            echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_method_link((isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 235, $this->source); })()), false, true);
            echo " ";
        }
        echo "at ";
        echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_method_source_link((isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 235, $this->source); })()));
        echo "</div>
        <code>";
        // line 236
        $this->displayBlock("method_signature", $context, $blocks);
        echo "</code>
    </h3>
    <div class=\"details\">
        ";
        // line 239
        echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_deprecations((isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 239, $this->source); })()));
        echo "

        ";
        // line 241
        if ((twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 241, $this->source); })()), "shortdesc", []) || twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 241, $this->source); })()), "longdesc", []))) {
            // line 242
            echo "            <div class=\"method-description\">
                ";
            // line 243
            if (( !twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 243, $this->source); })()), "shortdesc", []) &&  !twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 243, $this->source); })()), "longdesc", []))) {
                // line 244
                echo "                    <p class=\"no-description\">No description</p>
                ";
            } else {
                // line 246
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 246, $this->source); })()), "shortdesc", [])) {
                    // line 247
                    echo "<p>";
                    echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 247, $this->source); })()), "shortdesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 247, $this->source); })()));
                    echo "</p>";
                }
                // line 249
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 249, $this->source); })()), "longdesc", [])) {
                    // line 250
                    echo "<p>";
                    echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 250, $this->source); })()), "longdesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 250, $this->source); })()));
                    echo "</p>";
                }
            }
            // line 253
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 253, $this->source); })()), "config", [0 => "insert_todos"], "method") == true)) {
                // line 254
                echo "                    ";
                echo $context["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"]->macro_todos((isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 254, $this->source); })()));
                echo "
                ";
            }
            // line 256
            echo "            </div>
        ";
        }
        // line 258
        echo "        <div class=\"tags\">
            ";
        // line 259
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 259, $this->source); })()), "parameters", [])) {
            // line 260
            echo "                <h4>Parameters</h4>

                ";
            // line 262
            $this->displayBlock("parameters", $context, $blocks);
            echo "
            ";
        }
        // line 264
        echo "
            ";
        // line 265
        if ((twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 265, $this->source); })()), "hintDesc", []) || twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 265, $this->source); })()), "hint", []))) {
            // line 266
            echo "                <h4>Return Value</h4>

                ";
            // line 268
            $this->displayBlock("return", $context, $blocks);
            echo "
            ";
        }
        // line 270
        echo "
            ";
        // line 271
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 271, $this->source); })()), "exceptions", [])) {
            // line 272
            echo "                <h4>Exceptions</h4>

                ";
            // line 274
            $this->displayBlock("exceptions", $context, $blocks);
            echo "
            ";
        }
        // line 276
        echo "
            ";
        // line 277
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 277, $this->source); })()), "tags", [0 => "see"], "method")) {
            // line 278
            echo "                <h4>See also</h4>

                ";
            // line 280
            $this->displayBlock("see", $context, $blocks);
            echo "
            ";
        }
        // line 282
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "class.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  872 => 282,  867 => 280,  863 => 278,  861 => 277,  858 => 276,  853 => 274,  849 => 272,  847 => 271,  844 => 270,  839 => 268,  835 => 266,  833 => 265,  830 => 264,  825 => 262,  821 => 260,  819 => 259,  816 => 258,  812 => 256,  806 => 254,  803 => 253,  797 => 250,  794 => 249,  789 => 247,  786 => 246,  782 => 244,  780 => 243,  777 => 242,  775 => 241,  770 => 239,  764 => 236,  754 => 235,  749 => 234,  746 => 233,  741 => 230,  724 => 227,  721 => 226,  704 => 225,  701 => 224,  698 => 223,  693 => 220,  677 => 217,  672 => 215,  670 => 214,  667 => 212,  662 => 210,  658 => 208,  656 => 207,  648 => 206,  639 => 203,  635 => 201,  618 => 200,  615 => 199,  612 => 198,  607 => 195,  599 => 192,  594 => 190,  592 => 189,  588 => 187,  584 => 186,  578 => 184,  573 => 183,  568 => 182,  564 => 181,  560 => 180,  557 => 179,  553 => 178,  550 => 177,  547 => 176,  542 => 173,  532 => 169,  528 => 168,  523 => 166,  520 => 165,  516 => 164,  513 => 163,  510 => 162,  505 => 159,  496 => 156,  493 => 155,  487 => 153,  481 => 151,  479 => 150,  474 => 149,  472 => 148,  465 => 147,  463 => 146,  459 => 144,  455 => 143,  452 => 142,  449 => 141,  444 => 138,  435 => 135,  431 => 134,  428 => 133,  424 => 132,  421 => 131,  418 => 130,  410 => 125,  406 => 124,  402 => 122,  399 => 121,  394 => 118,  385 => 115,  377 => 114,  371 => 113,  368 => 112,  364 => 111,  361 => 110,  358 => 109,  354 => 106,  350 => 105,  348 => 104,  345 => 103,  339 => 100,  334 => 99,  329 => 98,  324 => 97,  319 => 96,  314 => 95,  310 => 94,  307 => 93,  301 => 90,  284 => 87,  282 => 86,  265 => 85,  262 => 84,  260 => 83,  256 => 81,  254 => 80,  251 => 79,  246 => 78,  242 => 77,  239 => 76,  234 => 73,  229 => 71,  222 => 67,  218 => 65,  216 => 64,  213 => 63,  208 => 61,  204 => 59,  202 => 58,  199 => 57,  194 => 55,  190 => 53,  188 => 52,  185 => 51,  180 => 49,  176 => 47,  174 => 46,  171 => 45,  167 => 43,  161 => 41,  158 => 40,  153 => 38,  150 => 37,  145 => 35,  143 => 34,  140 => 33,  138 => 32,  133 => 30,  128 => 28,  121 => 24,  117 => 23,  112 => 20,  109 => 19,  99 => 13,  97 => 12,  93 => 11,  89 => 9,  86 => 8,  83 => 7,  77 => 5,  71 => 4,  63 => 3,  59 => 1,  57 => 2,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"layout/layout.twig\" %}
{% from \"macros.twig\" import render_classes, breadcrumbs, namespace_link, class_link, property_link, method_link, hint_link, source_link, method_source_link, deprecated, deprecations, todo, todos %}
{% block title %}{{ class|raw }} | {{ parent() }}{% endblock %}
{% block body_class 'class' %}
{% block page_id 'class:' ~ (class.name|replace({'\\\\': '_'})) %}

{% block below_menu %}
    {% if class.namespace %}
        <div class=\"namespace-breadcrumbs\">
            <ol class=\"breadcrumb\">
                <li><span class=\"label label-default\">{{ class.categoryName|raw }}</span></li>
                {{ breadcrumbs(class.namespace) -}}
                <li>{{ class.shortname|raw }}</li>
            </ol>
        </div>
    {% endif %}
{% endblock %}

{% block page_content %}

    <div class=\"page-header\">
        <h1>
            {{ class.name|split('\\\\')|last|raw }}
            {{ deprecated(class) }}
        </h1>
    </div>

    <p>{{ block('class_signature') }}</p>

    {{ deprecations(class) }}

    {% if class.shortdesc or class.longdesc %}
        <div class=\"description\">
            {% if class.shortdesc -%}
                <p>{{ class.shortdesc|desc(class) }}</p>
            {%- endif %}
            {% if class.longdesc -%}
                <p>{{ class.longdesc|desc(class) }}</p>
            {%- endif %}
            {% if project.config('insert_todos') == true %}
                {{ todos(class) }}
            {% endif %}
        </div>
    {% endif %}

    {% if traits %}
        <h2>Traits</h2>

        {{ render_classes(traits) }}
    {% endif %}

    {% if constants %}
        <h2>Constants</h2>

        {{ block('constants') }}
    {% endif %}

    {% if properties %}
        <h2>Properties</h2>

        {{ block('properties') }}
    {% endif %}

    {% if methods %}
        <h2>Methods</h2>

        {{ block('methods') }}

        <h2>Details</h2>

        {{ block('methods_details') }}
    {% endif %}

{% endblock %}

{% block class_signature -%}
    {% if not class.interface and class.abstract %}abstract {% endif %}
    {{ class.categoryName|raw }}
    <strong>{{ class.shortname|raw }}</strong>
    {%- if class.parent %}
        extends {{ class_link(class.parent) }}
    {%- endif %}
    {%- if class.interfaces|length > 0 %}
        implements
        {% for interface in class.interfaces %}
            {{- class_link(interface) }}
            {%- if not loop.last %}, {% endif %}
        {%- endfor %}
    {%- endif %}
    {{- source_link(project, class) }}
{% endblock %}

{% block method_signature -%}
    {% if method.final %}final{% endif %}
    {% if method.abstract %}abstract{% endif %}
    {% if method.static %}static{% endif %}
    {% if method.protected %}protected{% endif %}
    {% if method.private %}private{% endif %}
    {{ hint_link(method.hint) }}
    <strong>{{ method.name|raw }}</strong>{{ block('method_parameters_signature') }}
{%- endblock %}

{% block method_parameters_signature -%}
    {%- from \"macros.twig\" import method_parameters_signature -%}
    {{ method_parameters_signature(method) }}
    {{ deprecated(method) }}
{%- endblock %}

{% block parameters %}
    <table class=\"table table-condensed\">
        {% for parameter in method.parameters %}
            <tr>
                <td>{% if parameter.hint %}{{ hint_link(parameter.hint) }}{% endif %}</td>
                <td>{%- if parameter.variadic %}...{% endif %}\${{ parameter.name|raw }}</td>
                <td>{{ parameter.shortdesc|desc(class) }}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block return %}
    <table class=\"table table-condensed\">
        <tr>
            <td>{{ hint_link(method.hint) }}</td>
            <td>{{ method.hintDesc|desc(class) }}</td>
        </tr>
    </table>
{% endblock %}

{% block exceptions %}
    <table class=\"table table-condensed\">
        {% for exception in method.exceptions %}
            <tr>
                <td>{{ class_link(exception[0]) }}</td>
                <td>{{ exception[1]|desc(class) }}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block see %}
    <table class=\"table table-condensed\">
        {% for see in method.see %}
            <tr>
                <td>
                    {% if see[4] %}
                        <a href=\"{{see[4]}}\">{{see[4]}}</a>
                    {% elseif see[3] %}
                        {{ method_link(see[3], false, false) }}
                    {% elseif see[2] %}
                        {{ class_link(see[2]) }}
                    {% else %}
                        {{ see[0]|raw }}
                    {% endif %}
                </td>
                <td>{{ see[1]|raw }}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block constants %}
    <table class=\"table table-condensed\">
        {% for constant in constants %}
            <tr>
                <td>{{ constant.name|raw }}</td>
                <td class=\"last\">
                    <p><em>{{ constant.shortdesc|desc(class) }}</em></p>
                    <p>{{ constant.longdesc|desc(class) }}</p>
                </td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block properties %}
    <table class=\"table table-condensed\">
        {% for property in properties %}
            <tr>
                <td class=\"type\" id=\"property_{{ property.name|raw }}\">
                    {% if property.static %}static{% endif %}
                    {% if property.protected %}protected{% endif %}
                    {% if property.private %}private{% endif %}
                    {{ hint_link(property.hint) }}
                </td>
                <td>\${{ property.name|raw }}</td>
                <td class=\"last\">{{ property.shortdesc|desc(class) }}</td>
                <td>
                    {%- if property.class is not same as(class) -%}
                        <small>from&nbsp;{{ property_link(property, false, true) }}</small>
                    {%- endif -%}
                </td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block methods %}
    <div class=\"container-fluid underlined\">
        {% for method in methods %}
            <div class=\"row\">
                <div class=\"col-md-2 type\">
                    {% if method.static %}static&nbsp;{% endif %}{{ hint_link(method.hint) }}
                </div>
                <div class=\"col-md-8 type\">
                    <a href=\"#method_{{ method.name|raw }}\">{{ method.name|raw }}</a>{{ block('method_parameters_signature') }}
                    {% if not method.shortdesc %}
                        <p class=\"no-description\">No description</p>
                    {% else %}
                        <p>{{ method.shortdesc|desc(class) }}</p>
                    {%- endif %}
                </div>
                <div class=\"col-md-2\">
                    {%- if method.class is not same as(class) -%}
                        <small>from&nbsp;{{ method_link(method, false, true) }}</small>
                    {%- endif -%}
                </div>
            </div>
        {% endfor %}
    </div>
{% endblock %}

{% block methods_details %}
    <div id=\"method-details\">
        {% for method in methods %}
            <div class=\"method-item\">
                {{ block('method') }}
            </div>
        {% endfor %}
    </div>
{% endblock %}

{% block method %}
    <h3 id=\"method_{{ method.name|raw }}\">
        <div class=\"location\">{% if method.class is not same as(class) %}in {{ method_link(method, false, true) }} {% endif %}at {{ method_source_link(method) }}</div>
        <code>{{ block('method_signature') }}</code>
    </h3>
    <div class=\"details\">
        {{ deprecations(method) }}

        {% if method.shortdesc or method.longdesc %}
            <div class=\"method-description\">
                {% if not method.shortdesc and not method.longdesc %}
                    <p class=\"no-description\">No description</p>
                {% else %}
                    {% if method.shortdesc -%}
                    <p>{{ method.shortdesc|desc(class) }}</p>
                    {%- endif %}
                    {% if method.longdesc -%}
                    <p>{{ method.longdesc|desc(class) }}</p>
                    {%- endif %}
                {%- endif %}
                {% if project.config('insert_todos') == true %}
                    {{ todos(method) }}
                {% endif %}
            </div>
        {% endif %}
        <div class=\"tags\">
            {% if method.parameters %}
                <h4>Parameters</h4>

                {{ block('parameters') }}
            {% endif %}

            {% if method.hintDesc or method.hint %}
                <h4>Return Value</h4>

                {{ block('return') }}
            {% endif %}

            {% if method.exceptions %}
                <h4>Exceptions</h4>

                {{ block('exceptions') }}
            {% endif %}

            {% if method.tags('see') %}
                <h4>See also</h4>

                {{ block('see') }}
            {% endif %}
        </div>
    </div>
{% endblock %}
", "class.twig", "C:\\Users\\phillip.madsen\\repos\\cms\\configuration2\\vendor\\sami\\sami\\Sami\\Resources\\themes\\default\\class.twig");
    }
}
