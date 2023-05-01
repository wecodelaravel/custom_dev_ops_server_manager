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
class __TwigTemplate_e3e423c9266149f92ee4cd8edf618d4f0b723af641d882454aac9615d124c1e3 extends \Twig\Template
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
        // line 1
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"] = $this->macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"] = $this->loadTemplate("macros.twig", "class.twig", 2)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "class.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 3, $this->source); })());
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "class";
    }

    // line 5
    public function block_page_id($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, ("class:" . twig_replace_filter(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 5, $this->source); })()), "name", [], "any", false, false, false, 5), ["\\" => "_"])), "html", null, true);
    }

    // line 7
    public function block_below_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 8, $this->source); })()), "namespace", [], "any", false, false, false, 8)) {
            // line 9
            echo "        <div class=\"namespace-breadcrumbs\">
            <ol class=\"breadcrumb\">
                <li><span class=\"label label-default\">";
            // line 11
            echo twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 11, $this->source); })()), "categoryName", [], "any", false, false, false, 11);
            echo "</span></li>
                ";
            // line 12
            echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_breadcrumbs", [twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 12, $this->source); })()), "namespace", [], "any", false, false, false, 12)], 12, $context, $this->getSourceContext());
            // line 13
            echo "<li>";
            echo twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 13, $this->source); })()), "shortname", [], "any", false, false, false, 13);
            echo "</li>
            </ol>
        </div>
    ";
        }
    }

    // line 19
    public function block_page_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        echo "
    <div class=\"page-header\">
        <h1>
            ";
        // line 23
        echo twig_last($this->env, twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 23, $this->source); })()), "name", [], "any", false, false, false, 23), "\\"));
        echo "
            ";
        // line 24
        echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_deprecated", [(isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 24, $this->source); })())], 24, $context, $this->getSourceContext());
        echo "
        </h1>
    </div>

    <p>";
        // line 28
        $this->displayBlock("class_signature", $context, $blocks);
        echo "</p>

    ";
        // line 30
        echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_deprecations", [(isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 30, $this->source); })())], 30, $context, $this->getSourceContext());
        echo "

    ";
        // line 32
        if ((twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 32, $this->source); })()), "shortdesc", [], "any", false, false, false, 32) || twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 32, $this->source); })()), "longdesc", [], "any", false, false, false, 32))) {
            // line 33
            echo "        <div class=\"description\">
            ";
            // line 34
            if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 34, $this->source); })()), "shortdesc", [], "any", false, false, false, 34)) {
                // line 35
                echo "<p>";
                echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 35, $this->source); })()), "shortdesc", [], "any", false, false, false, 35), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 35, $this->source); })()));
                echo "</p>";
            }
            // line 37
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 37, $this->source); })()), "longdesc", [], "any", false, false, false, 37)) {
                // line 38
                echo "<p>";
                echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 38, $this->source); })()), "longdesc", [], "any", false, false, false, 38), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 38, $this->source); })()));
                echo "</p>";
            }
            // line 40
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 40, $this->source); })()), "config", [0 => "insert_todos"], "method", false, false, false, 40) == true)) {
                // line 41
                echo "                ";
                echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_todos", [(isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 41, $this->source); })())], 41, $context, $this->getSourceContext());
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
            echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_render_classes", [(isset($context["traits"]) || array_key_exists("traits", $context) ? $context["traits"] : (function () { throw new RuntimeError('Variable "traits" does not exist.', 49, $this->source); })())], 49, $context, $this->getSourceContext());
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
        $macros = $this->macros;
        // line 77
        if (( !twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 77, $this->source); })()), "interface", [], "any", false, false, false, 77) && twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 77, $this->source); })()), "abstract", [], "any", false, false, false, 77))) {
            echo "abstract ";
        }
        // line 78
        echo "    ";
        echo twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 78, $this->source); })()), "categoryName", [], "any", false, false, false, 78);
        echo "
    <strong>";
        // line 79
        echo twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 79, $this->source); })()), "shortname", [], "any", false, false, false, 79);
        echo "</strong>";
        // line 80
        if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 80, $this->source); })()), "parent", [], "any", false, false, false, 80)) {
            // line 81
            echo "        extends ";
            echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_class_link", [twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 81, $this->source); })()), "parent", [], "any", false, false, false, 81)], 81, $context, $this->getSourceContext());
        }
        // line 83
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 83, $this->source); })()), "interfaces", [], "any", false, false, false, 83)) > 0)) {
            // line 84
            echo "        implements
        ";
            // line 85
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 85, $this->source); })()), "interfaces", [], "any", false, false, false, 85));
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
                echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_class_link", [$context["interface"]], 86, $context, $this->getSourceContext());
                // line 87
                if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 87)) {
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
        echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_source_link", [(isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 90, $this->source); })()), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 90, $this->source); })())], 90, $context, $this->getSourceContext());
        echo "
";
    }

    // line 93
    public function block_method_signature($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 94
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 94, $this->source); })()), "final", [], "any", false, false, false, 94)) {
            echo "final";
        }
        // line 95
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 95, $this->source); })()), "abstract", [], "any", false, false, false, 95)) {
            echo "abstract";
        }
        // line 96
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 96, $this->source); })()), "static", [], "any", false, false, false, 96)) {
            echo "static";
        }
        // line 97
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 97, $this->source); })()), "protected", [], "any", false, false, false, 97)) {
            echo "protected";
        }
        // line 98
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 98, $this->source); })()), "private", [], "any", false, false, false, 98)) {
            echo "private";
        }
        // line 99
        echo "    ";
        echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 99, $this->source); })()), "hint", [], "any", false, false, false, 99)], 99, $context, $this->getSourceContext());
        echo "
    <strong>";
        // line 100
        echo twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 100, $this->source); })()), "name", [], "any", false, false, false, 100);
        echo "</strong>";
        $this->displayBlock("method_parameters_signature", $context, $blocks);
    }

    // line 103
    public function block_method_parameters_signature($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 104
        $macros["__internal_efc6bc7429e4fe8b09c5461c9472ed21ea0a688b0939eb65201c5bc56be7985a"] = $this->loadTemplate("macros.twig", "class.twig", 104)->unwrap();
        // line 105
        echo twig_call_macro($macros["__internal_efc6bc7429e4fe8b09c5461c9472ed21ea0a688b0939eb65201c5bc56be7985a"], "macro_method_parameters_signature", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 105, $this->source); })())], 105, $context, $this->getSourceContext());
        echo "
    ";
        // line 106
        echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_deprecated", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 106, $this->source); })())], 106, $context, $this->getSourceContext());
    }

    // line 109
    public function block_parameters($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 110
        echo "    <table class=\"table table-condensed\">
        ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 111, $this->source); })()), "parameters", [], "any", false, false, false, 111));
        foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
            // line 112
            echo "            <tr>
                <td>";
            // line 113
            if (twig_get_attribute($this->env, $this->source, $context["parameter"], "hint", [], "any", false, false, false, 113)) {
                echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, $context["parameter"], "hint", [], "any", false, false, false, 113)], 113, $context, $this->getSourceContext());
            }
            echo "</td>
                <td>";
            // line 114
            if (twig_get_attribute($this->env, $this->source, $context["parameter"], "variadic", [], "any", false, false, false, 114)) {
                echo "...";
            }
            echo "\$";
            echo twig_get_attribute($this->env, $this->source, $context["parameter"], "name", [], "any", false, false, false, 114);
            echo "</td>
                <td>";
            // line 115
            echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["parameter"], "shortdesc", [], "any", false, false, false, 115), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 115, $this->source); })()));
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
        $macros = $this->macros;
        // line 122
        echo "    <table class=\"table table-condensed\">
        <tr>
            <td>";
        // line 124
        echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 124, $this->source); })()), "hint", [], "any", false, false, false, 124)], 124, $context, $this->getSourceContext());
        echo "</td>
            <td>";
        // line 125
        echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 125, $this->source); })()), "hintDesc", [], "any", false, false, false, 125), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 125, $this->source); })()));
        echo "</td>
        </tr>
    </table>
";
    }

    // line 130
    public function block_exceptions($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 131
        echo "    <table class=\"table table-condensed\">
        ";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 132, $this->source); })()), "exceptions", [], "any", false, false, false, 132));
        foreach ($context['_seq'] as $context["_key"] => $context["exception"]) {
            // line 133
            echo "            <tr>
                <td>";
            // line 134
            echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_class_link", [twig_get_attribute($this->env, $this->source, $context["exception"], 0, [], "array", false, false, false, 134)], 134, $context, $this->getSourceContext());
            echo "</td>
                <td>";
            // line 135
            echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["exception"], 1, [], "array", false, false, false, 135), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 135, $this->source); })()));
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
        $macros = $this->macros;
        // line 142
        echo "    <table class=\"table table-condensed\">
        ";
        // line 143
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 143, $this->source); })()), "see", [], "any", false, false, false, 143));
        foreach ($context['_seq'] as $context["_key"] => $context["see"]) {
            // line 144
            echo "            <tr>
                <td>
                    ";
            // line 146
            if (twig_get_attribute($this->env, $this->source, $context["see"], 4, [], "array", false, false, false, 146)) {
                // line 147
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["see"], 4, [], "array", false, false, false, 147), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["see"], 4, [], "array", false, false, false, 147), "html", null, true);
                echo "</a>
                    ";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 148
$context["see"], 3, [], "array", false, false, false, 148)) {
                // line 149
                echo "                        ";
                echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_method_link", [twig_get_attribute($this->env, $this->source, $context["see"], 3, [], "array", false, false, false, 149), false, false], 149, $context, $this->getSourceContext());
                echo "
                    ";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 150
$context["see"], 2, [], "array", false, false, false, 150)) {
                // line 151
                echo "                        ";
                echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_class_link", [twig_get_attribute($this->env, $this->source, $context["see"], 2, [], "array", false, false, false, 151)], 151, $context, $this->getSourceContext());
                echo "
                    ";
            } else {
                // line 153
                echo "                        ";
                echo twig_get_attribute($this->env, $this->source, $context["see"], 0, [], "array", false, false, false, 153);
                echo "
                    ";
            }
            // line 155
            echo "                </td>
                <td>";
            // line 156
            echo twig_get_attribute($this->env, $this->source, $context["see"], 1, [], "array", false, false, false, 156);
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
        $macros = $this->macros;
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
            echo twig_get_attribute($this->env, $this->source, $context["constant"], "name", [], "any", false, false, false, 166);
            echo "</td>
                <td class=\"last\">
                    <p><em>";
            // line 168
            echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["constant"], "shortdesc", [], "any", false, false, false, 168), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 168, $this->source); })()));
            echo "</em></p>
                    <p>";
            // line 169
            echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["constant"], "longdesc", [], "any", false, false, false, 169), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 169, $this->source); })()));
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
        $macros = $this->macros;
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
            echo twig_get_attribute($this->env, $this->source, $context["property"], "name", [], "any", false, false, false, 180);
            echo "\">
                    ";
            // line 181
            if (twig_get_attribute($this->env, $this->source, $context["property"], "static", [], "any", false, false, false, 181)) {
                echo "static";
            }
            // line 182
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["property"], "protected", [], "any", false, false, false, 182)) {
                echo "protected";
            }
            // line 183
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, $context["property"], "private", [], "any", false, false, false, 183)) {
                echo "private";
            }
            // line 184
            echo "                    ";
            echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, $context["property"], "hint", [], "any", false, false, false, 184)], 184, $context, $this->getSourceContext());
            echo "
                </td>
                <td>\$";
            // line 186
            echo twig_get_attribute($this->env, $this->source, $context["property"], "name", [], "any", false, false, false, 186);
            echo "</td>
                <td class=\"last\">";
            // line 187
            echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["property"], "shortdesc", [], "any", false, false, false, 187), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 187, $this->source); })()));
            echo "</td>
                <td>";
            // line 189
            if ( !(twig_get_attribute($this->env, $this->source, $context["property"], "class", [], "any", false, false, false, 189) === (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 189, $this->source); })()))) {
                // line 190
                echo "<small>from&nbsp;";
                echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_property_link", [$context["property"], false, true], 190, $context, $this->getSourceContext());
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
        $macros = $this->macros;
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
            if (twig_get_attribute($this->env, $this->source, $context["method"], "static", [], "any", false, false, false, 203)) {
                echo "static&nbsp;";
            }
            echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_hint_link", [twig_get_attribute($this->env, $this->source, $context["method"], "hint", [], "any", false, false, false, 203)], 203, $context, $this->getSourceContext());
            echo "
                </div>
                <div class=\"col-md-8 type\">
                    <a href=\"#method_";
            // line 206
            echo twig_get_attribute($this->env, $this->source, $context["method"], "name", [], "any", false, false, false, 206);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["method"], "name", [], "any", false, false, false, 206);
            echo "</a>";
            $this->displayBlock("method_parameters_signature", $context, $blocks);
            echo "
                    ";
            // line 207
            if ( !twig_get_attribute($this->env, $this->source, $context["method"], "shortdesc", [], "any", false, false, false, 207)) {
                // line 208
                echo "                        <p class=\"no-description\">No description</p>
                    ";
            } else {
                // line 210
                echo "                        <p>";
                echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["method"], "shortdesc", [], "any", false, false, false, 210), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 210, $this->source); })()));
                echo "</p>";
            }
            // line 212
            echo "                </div>
                <div class=\"col-md-2\">";
            // line 214
            if ( !(twig_get_attribute($this->env, $this->source, $context["method"], "class", [], "any", false, false, false, 214) === (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 214, $this->source); })()))) {
                // line 215
                echo "<small>from&nbsp;";
                echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_method_link", [$context["method"], false, true], 215, $context, $this->getSourceContext());
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
        $macros = $this->macros;
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
        $macros = $this->macros;
        // line 234
        echo "    <h3 id=\"method_";
        echo twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 234, $this->source); })()), "name", [], "any", false, false, false, 234);
        echo "\">
        <div class=\"location\">";
        // line 235
        if ( !(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 235, $this->source); })()), "class", [], "any", false, false, false, 235) === (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 235, $this->source); })()))) {
            echo "in ";
            echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_method_link", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 235, $this->source); })()), false, true], 235, $context, $this->getSourceContext());
            echo " ";
        }
        echo "at ";
        echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_method_source_link", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 235, $this->source); })())], 235, $context, $this->getSourceContext());
        echo "</div>
        <code>";
        // line 236
        $this->displayBlock("method_signature", $context, $blocks);
        echo "</code>
    </h3>
    <div class=\"details\">
        ";
        // line 239
        echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_deprecations", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 239, $this->source); })())], 239, $context, $this->getSourceContext());
        echo "

        ";
        // line 241
        if ((twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 241, $this->source); })()), "shortdesc", [], "any", false, false, false, 241) || twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 241, $this->source); })()), "longdesc", [], "any", false, false, false, 241))) {
            // line 242
            echo "            <div class=\"method-description\">
                ";
            // line 243
            if (( !twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 243, $this->source); })()), "shortdesc", [], "any", false, false, false, 243) &&  !twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 243, $this->source); })()), "longdesc", [], "any", false, false, false, 243))) {
                // line 244
                echo "                    <p class=\"no-description\">No description</p>
                ";
            } else {
                // line 246
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 246, $this->source); })()), "shortdesc", [], "any", false, false, false, 246)) {
                    // line 247
                    echo "<p>";
                    echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 247, $this->source); })()), "shortdesc", [], "any", false, false, false, 247), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 247, $this->source); })()));
                    echo "</p>";
                }
                // line 249
                echo "                    ";
                if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 249, $this->source); })()), "longdesc", [], "any", false, false, false, 249)) {
                    // line 250
                    echo "<p>";
                    echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 250, $this->source); })()), "longdesc", [], "any", false, false, false, 250), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 250, $this->source); })()));
                    echo "</p>";
                }
            }
            // line 253
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 253, $this->source); })()), "config", [0 => "insert_todos"], "method", false, false, false, 253) == true)) {
                // line 254
                echo "                    ";
                echo twig_call_macro($macros["__internal_67128e03153fd16b7a554d44b83f571d373d1ce100c435a80bc63d005ba3df3c"], "macro_todos", [(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 254, $this->source); })())], 254, $context, $this->getSourceContext());
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
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 259, $this->source); })()), "parameters", [], "any", false, false, false, 259)) {
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
        if ((twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 265, $this->source); })()), "hintDesc", [], "any", false, false, false, 265) || twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 265, $this->source); })()), "hint", [], "any", false, false, false, 265))) {
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
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 271, $this->source); })()), "exceptions", [], "any", false, false, false, 271)) {
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
        if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 277, $this->source); })()), "tags", [0 => "see"], "method", false, false, false, 277)) {
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
        return array (  891 => 282,  886 => 280,  882 => 278,  880 => 277,  877 => 276,  872 => 274,  868 => 272,  866 => 271,  863 => 270,  858 => 268,  854 => 266,  852 => 265,  849 => 264,  844 => 262,  840 => 260,  838 => 259,  835 => 258,  831 => 256,  825 => 254,  822 => 253,  816 => 250,  813 => 249,  808 => 247,  805 => 246,  801 => 244,  799 => 243,  796 => 242,  794 => 241,  789 => 239,  783 => 236,  773 => 235,  768 => 234,  764 => 233,  759 => 230,  742 => 227,  739 => 226,  722 => 225,  719 => 224,  715 => 223,  710 => 220,  694 => 217,  689 => 215,  687 => 214,  684 => 212,  679 => 210,  675 => 208,  673 => 207,  665 => 206,  656 => 203,  652 => 201,  635 => 200,  632 => 199,  628 => 198,  623 => 195,  615 => 192,  610 => 190,  608 => 189,  604 => 187,  600 => 186,  594 => 184,  589 => 183,  584 => 182,  580 => 181,  576 => 180,  573 => 179,  569 => 178,  566 => 177,  562 => 176,  557 => 173,  547 => 169,  543 => 168,  538 => 166,  535 => 165,  531 => 164,  528 => 163,  524 => 162,  519 => 159,  510 => 156,  507 => 155,  501 => 153,  495 => 151,  493 => 150,  488 => 149,  486 => 148,  479 => 147,  477 => 146,  473 => 144,  469 => 143,  466 => 142,  462 => 141,  457 => 138,  448 => 135,  444 => 134,  441 => 133,  437 => 132,  434 => 131,  430 => 130,  422 => 125,  418 => 124,  414 => 122,  410 => 121,  405 => 118,  396 => 115,  388 => 114,  382 => 113,  379 => 112,  375 => 111,  372 => 110,  368 => 109,  364 => 106,  360 => 105,  358 => 104,  354 => 103,  348 => 100,  343 => 99,  338 => 98,  333 => 97,  328 => 96,  323 => 95,  319 => 94,  315 => 93,  309 => 90,  292 => 87,  290 => 86,  273 => 85,  270 => 84,  268 => 83,  264 => 81,  262 => 80,  259 => 79,  254 => 78,  250 => 77,  246 => 76,  241 => 73,  236 => 71,  229 => 67,  225 => 65,  223 => 64,  220 => 63,  215 => 61,  211 => 59,  209 => 58,  206 => 57,  201 => 55,  197 => 53,  195 => 52,  192 => 51,  187 => 49,  183 => 47,  181 => 46,  178 => 45,  174 => 43,  168 => 41,  165 => 40,  160 => 38,  157 => 37,  152 => 35,  150 => 34,  147 => 33,  145 => 32,  140 => 30,  135 => 28,  128 => 24,  124 => 23,  119 => 20,  115 => 19,  105 => 13,  103 => 12,  99 => 11,  95 => 9,  92 => 8,  88 => 7,  81 => 5,  74 => 4,  65 => 3,  60 => 1,  58 => 2,  51 => 1,);
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
", "class.twig", "/home/vagrant/repos/cms/configuration2/vendor/sami/sami/Sami/Resources/themes/default/class.twig");
    }
}
