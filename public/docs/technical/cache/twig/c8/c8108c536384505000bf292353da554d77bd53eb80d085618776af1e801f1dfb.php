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

/* macros.twig */
class __TwigTemplate_74b4a80e8751c392910d89746cde9e0d1e3c965b0eddcaa3b9c98e8285313a03 extends \Twig\Template
{
    private $source;

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
        // line 4
        echo "
";
        // line 14
        echo "
";
        // line 20
        echo "
";
        // line 26
        echo "
";
        // line 42
        echo "
";
        // line 48
        echo "
";
        // line 56
        echo "
";
        // line 60
        echo "
";
        // line 72
        echo "
";
        // line 94
        echo "
";
        // line 106
        echo "
";
        // line 110
        echo "
";
        // line 126
        echo "
";
        // line 130
        echo "
";
    }

    // line 1
    public function macro_namespace_link($__namespace__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "namespace" => $__namespace__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 2
            echo "<a href=\"";
            echo $this->extensions['Sami\Renderer\TwigExtension']->pathForNamespace($context, (isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 2, $this->source); })()));
            echo "\">";
            echo (isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 2, $this->source); })());
            echo "</a>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 5
    public function macro_class_link($__class__ = null, $__absolute__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "class" => $__class__,
            "absolute" => $__absolute__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 6
            if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 6, $this->source); })()), "projectclass", [])) {
                // line 7
                echo "<a href=\"";
                echo $this->extensions['Sami\Renderer\TwigExtension']->pathForClass($context, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 7, $this->source); })()));
                echo "\">";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 8
(isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 8, $this->source); })()), "phpclass", [])) {
                // line 9
                echo "<a target=\"_blank\" href=\"http://php.net/";
                echo (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 9, $this->source); })());
                echo "\">";
            }
            // line 11
            echo $this->extensions['Sami\Renderer\TwigExtension']->abbrClass((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 11, $this->source); })()), (((isset($context["absolute"]) || array_key_exists("absolute", $context))) ? (_twig_default_filter((isset($context["absolute"]) || array_key_exists("absolute", $context) ? $context["absolute"] : (function () { throw new RuntimeError('Variable "absolute" does not exist.', 11, $this->source); })()), false)) : (false)));
            // line 12
            if ((twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 12, $this->source); })()), "projectclass", []) || twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 12, $this->source); })()), "phpclass", []))) {
                echo "</a>";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 15
    public function macro_method_link($__method__ = null, $__absolute__ = null, $__classonly__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "method" => $__method__,
            "absolute" => $__absolute__,
            "classonly" => $__classonly__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 16
            echo "<a href=\"";
            echo $this->extensions['Sami\Renderer\TwigExtension']->pathForMethod($context, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 16, $this->source); })()));
            echo "\">";
            // line 17
            echo $this->extensions['Sami\Renderer\TwigExtension']->abbrClass(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 17, $this->source); })()), "class", []));
            if ( !(((isset($context["classonly"]) || array_key_exists("classonly", $context))) ? (_twig_default_filter((isset($context["classonly"]) || array_key_exists("classonly", $context) ? $context["classonly"] : (function () { throw new RuntimeError('Variable "classonly" does not exist.', 17, $this->source); })()), false)) : (false))) {
                echo "::";
                echo twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 17, $this->source); })()), "name", []);
            }
            // line 18
            echo "</a>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 21
    public function macro_property_link($__property__ = null, $__absolute__ = null, $__classonly__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "property" => $__property__,
            "absolute" => $__absolute__,
            "classonly" => $__classonly__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 22
            echo "<a href=\"";
            echo $this->extensions['Sami\Renderer\TwigExtension']->pathForProperty($context, (isset($context["property"]) || array_key_exists("property", $context) ? $context["property"] : (function () { throw new RuntimeError('Variable "property" does not exist.', 22, $this->source); })()));
            echo "\">";
            // line 23
            echo $this->extensions['Sami\Renderer\TwigExtension']->abbrClass(twig_get_attribute($this->env, $this->source, (isset($context["property"]) || array_key_exists("property", $context) ? $context["property"] : (function () { throw new RuntimeError('Variable "property" does not exist.', 23, $this->source); })()), "class", []));
            if ( !(((isset($context["classonly"]) || array_key_exists("classonly", $context))) ? (_twig_default_filter((isset($context["classonly"]) || array_key_exists("classonly", $context) ? $context["classonly"] : (function () { throw new RuntimeError('Variable "classonly" does not exist.', 23, $this->source); })()), false)) : (false))) {
                echo "#";
                echo twig_get_attribute($this->env, $this->source, (isset($context["property"]) || array_key_exists("property", $context) ? $context["property"] : (function () { throw new RuntimeError('Variable "property" does not exist.', 23, $this->source); })()), "name", []);
            }
            // line 24
            echo "</a>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 27
    public function macro_hint_link($__hints__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "hints" => $__hints__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 28
            $context["__internal_07c39da85293cfdc9636622e5fae012cc8f63f7db323aaf64932361b7c452a5f"] = $this;
            // line 30
            if ((isset($context["hints"]) || array_key_exists("hints", $context) ? $context["hints"] : (function () { throw new RuntimeError('Variable "hints" does not exist.', 30, $this->source); })())) {
                // line 31
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["hints"]) || array_key_exists("hints", $context) ? $context["hints"] : (function () { throw new RuntimeError('Variable "hints" does not exist.', 31, $this->source); })()));
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
                foreach ($context['_seq'] as $context["_key"] => $context["hint"]) {
                    // line 32
                    if (twig_get_attribute($this->env, $this->source, $context["hint"], "class", [])) {
                        // line 33
                        echo $context["__internal_07c39da85293cfdc9636622e5fae012cc8f63f7db323aaf64932361b7c452a5f"]->macro_class_link(twig_get_attribute($this->env, $this->source, $context["hint"], "name", []));
                    } elseif (twig_get_attribute($this->env, $this->source,                     // line 34
$context["hint"], "name", [])) {
                        // line 35
                        echo $this->extensions['Sami\Renderer\TwigExtension']->abbrClass(twig_get_attribute($this->env, $this->source, $context["hint"], "name", []));
                    }
                    // line 37
                    if (twig_get_attribute($this->env, $this->source, $context["hint"], "array", [])) {
                        echo "[]";
                    }
                    // line 38
                    if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [])) {
                        echo "|";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hint'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 43
    public function macro_source_link($__project__ = null, $__class__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "project" => $__project__,
            "class" => $__class__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 44
            if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 44, $this->source); })()), "sourcepath", [])) {
                // line 45
                echo "        (<a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 45, $this->source); })()), "sourcepath", []), "html", null, true);
                echo "\">View source</a>)";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 49
    public function macro_method_source_link($__method__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "method" => $__method__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 50
            if (twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 50, $this->source); })()), "sourcepath", [])) {
                // line 51
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 51, $this->source); })()), "sourcepath", []), "html", null, true);
                echo "\">line ";
                echo twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 51, $this->source); })()), "line", []);
                echo "</a>";
            } else {
                // line 53
                echo "        line ";
                echo twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 53, $this->source); })()), "line", []);
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 57
    public function macro_abbr_class($__class__ = null, $__absolute__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "class" => $__class__,
            "absolute" => $__absolute__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 58
            echo "<abbr title=\"";
            echo twig_escape_filter($this->env, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 58, $this->source); })()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (((((isset($context["absolute"]) || array_key_exists("absolute", $context))) ? (_twig_default_filter((isset($context["absolute"]) || array_key_exists("absolute", $context) ? $context["absolute"] : (function () { throw new RuntimeError('Variable "absolute" does not exist.', 58, $this->source); })()), false)) : (false))) ? ((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 58, $this->source); })())) : (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 58, $this->source); })()), "shortname", []))), "html", null, true);
            echo "</abbr>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 61
    public function macro_method_parameters_signature($__method__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "method" => $__method__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 62
            $context["__internal_1152ce279136d4174dfc6a79539a7ac416d51c01d1254ab086e290a8247044da"] = $this->loadTemplate("macros.twig", "macros.twig", 62);
            // line 63
            echo "(";
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 64, $this->source); })()), "parameters", []));
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
            foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
                // line 65
                if (twig_get_attribute($this->env, $this->source, $context["parameter"], "hashint", [])) {
                    echo $context["__internal_1152ce279136d4174dfc6a79539a7ac416d51c01d1254ab086e290a8247044da"]->macro_hint_link(twig_get_attribute($this->env, $this->source, $context["parameter"], "hint", []));
                    echo " ";
                }
                // line 66
                if (twig_get_attribute($this->env, $this->source, $context["parameter"], "variadic", [])) {
                    echo "...";
                }
                echo "\$";
                echo twig_get_attribute($this->env, $this->source, $context["parameter"], "name", []);
                // line 67
                if ( !(null === twig_get_attribute($this->env, $this->source, $context["parameter"], "default", []))) {
                    echo " = ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["parameter"], "default", []), "html", null, true);
                }
                // line 68
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parameter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo ")";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 73
    public function macro_render_classes($__classes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "classes" => $__classes__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 74
            $context["__internal_9d372a3fc6b0727a3f716fbe6c0fecddbad9d59afe75a2d40e5adb316bd209a8"] = $this;
            // line 75
            echo "
    <div class=\"container-fluid underlined\">
        ";
            // line 77
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["classes"]) || array_key_exists("classes", $context) ? $context["classes"] : (function () { throw new RuntimeError('Variable "classes" does not exist.', 77, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
                // line 78
                echo "            <div class=\"row\">
                <div class=\"col-md-6\">
                    ";
                // line 80
                if (twig_get_attribute($this->env, $this->source, $context["class"], "isInterface", [])) {
                    // line 81
                    echo "                        <em>";
                    echo $context["__internal_9d372a3fc6b0727a3f716fbe6c0fecddbad9d59afe75a2d40e5adb316bd209a8"]->macro_class_link($context["class"], true);
                    echo "</em>
                    ";
                } else {
                    // line 83
                    echo "                        ";
                    echo $context["__internal_9d372a3fc6b0727a3f716fbe6c0fecddbad9d59afe75a2d40e5adb316bd209a8"]->macro_class_link($context["class"], true);
                    echo "
                    ";
                }
                // line 85
                echo "                    ";
                echo $context["__internal_9d372a3fc6b0727a3f716fbe6c0fecddbad9d59afe75a2d40e5adb316bd209a8"]->macro_deprecated($context["class"]);
                echo "
                </div>
                <div class=\"col-md-6\">
                    ";
                // line 88
                echo $this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["class"], "shortdesc", []), $context["class"]);
                echo "
                </div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "    </div>";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 95
    public function macro_breadcrumbs($__namespace__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "namespace" => $__namespace__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 96
            echo "    ";
            $context["current_ns"] = "";
            // line 97
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->env, (isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 97, $this->source); })()), "\\"));
            foreach ($context['_seq'] as $context["_key"] => $context["ns"]) {
                // line 98
                if ((isset($context["current_ns"]) || array_key_exists("current_ns", $context) ? $context["current_ns"] : (function () { throw new RuntimeError('Variable "current_ns" does not exist.', 98, $this->source); })())) {
                    // line 99
                    $context["current_ns"] = (((isset($context["current_ns"]) || array_key_exists("current_ns", $context) ? $context["current_ns"] : (function () { throw new RuntimeError('Variable "current_ns" does not exist.', 99, $this->source); })()) . "\\") . $context["ns"]);
                } else {
                    // line 101
                    $context["current_ns"] = $context["ns"];
                }
                // line 103
                echo "<li><a href=\"";
                echo $this->extensions['Sami\Renderer\TwigExtension']->pathForNamespace($context, (isset($context["current_ns"]) || array_key_exists("current_ns", $context) ? $context["current_ns"] : (function () { throw new RuntimeError('Variable "current_ns" does not exist.', 103, $this->source); })()));
                echo "\">";
                echo $context["ns"];
                echo "</a></li><li class=\"backslash\">\\</li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ns'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 107
    public function macro_deprecated($__reflection__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "reflection" => $__reflection__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 108
            echo "    ";
            if (twig_get_attribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 108, $this->source); })()), "deprecated", [])) {
                echo "<small><sup><span class=\"label label-danger\">deprecated</span></sup></small>";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 111
    public function macro_deprecations($__reflection__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "reflection" => $__reflection__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 112
            echo "    ";
            $context["__internal_55089018bd3fd3c67a21a36b893cb779b340b01893c58b02262a6f17f042bbb6"] = $this;
            // line 113
            echo "
    ";
            // line 114
            if (twig_get_attribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 114, $this->source); })()), "deprecated", [])) {
                // line 115
                echo "        <p>
            ";
                // line 116
                echo $context["__internal_55089018bd3fd3c67a21a36b893cb779b340b01893c58b02262a6f17f042bbb6"]->macro_deprecated((isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 116, $this->source); })()));
                echo "
            ";
                // line 117
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 117, $this->source); })()), "deprecated", []));
                foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                    // line 118
                    echo "                <tr>
                    <td>";
                    // line 119
                    echo twig_get_attribute($this->env, $this->source, $context["tag"], 0, [], "array");
                    echo "</td>
                    <td>";
                    // line 120
                    echo twig_join_filter(twig_slice($this->env, $context["tag"], 1, null), " ");
                    echo "</td>
                </tr>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 123
                echo "        </p>
    ";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 127
    public function macro_todo($__reflection__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "reflection" => $__reflection__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 128
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 128, $this->source); })()), "todo", [])) {
                echo "<small><sup><span class=\"label label-info\">todo</span></sup></small>";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 131
    public function macro_todos($__reflection__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "reflection" => $__reflection__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 132
            echo "        ";
            $context["__internal_2ba11bc88b4becc4bfe625f5dcfe13ef269f87c99a4c8ea174efcc8ba79bf92c"] = $this;
            // line 133
            echo "
        ";
            // line 134
            if (twig_get_attribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 134, $this->source); })()), "todo", [])) {
                // line 135
                echo "            <p>
                ";
                // line 136
                echo $context["__internal_2ba11bc88b4becc4bfe625f5dcfe13ef269f87c99a4c8ea174efcc8ba79bf92c"]->macro_todo((isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 136, $this->source); })()));
                echo "
                ";
                // line 137
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 137, $this->source); })()), "todo", []));
                foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                    // line 138
                    echo "                    <tr>
                        <td>";
                    // line 139
                    echo twig_get_attribute($this->env, $this->source, $context["tag"], 0, [], "array");
                    echo "</td>
                        <td>";
                    // line 140
                    echo twig_join_filter(twig_slice($this->env, $context["tag"], 1, null), " ");
                    echo "</td>
                        </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 143
                echo "            </p>
        ";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "macros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  702 => 143,  693 => 140,  689 => 139,  686 => 138,  682 => 137,  678 => 136,  675 => 135,  673 => 134,  670 => 133,  667 => 132,  655 => 131,  643 => 128,  631 => 127,  620 => 123,  611 => 120,  607 => 119,  604 => 118,  600 => 117,  596 => 116,  593 => 115,  591 => 114,  588 => 113,  585 => 112,  573 => 111,  561 => 108,  549 => 107,  532 => 103,  529 => 101,  526 => 99,  524 => 98,  519 => 97,  516 => 96,  504 => 95,  495 => 92,  485 => 88,  478 => 85,  472 => 83,  466 => 81,  464 => 80,  460 => 78,  456 => 77,  452 => 75,  450 => 74,  438 => 73,  429 => 70,  413 => 68,  408 => 67,  402 => 66,  397 => 65,  380 => 64,  378 => 63,  376 => 62,  364 => 61,  351 => 58,  338 => 57,  327 => 53,  320 => 51,  318 => 50,  306 => 49,  294 => 45,  292 => 44,  279 => 43,  255 => 38,  251 => 37,  248 => 35,  246 => 34,  244 => 33,  242 => 32,  225 => 31,  223 => 30,  221 => 28,  209 => 27,  200 => 24,  194 => 23,  190 => 22,  176 => 21,  167 => 18,  161 => 17,  157 => 16,  143 => 15,  132 => 12,  130 => 11,  125 => 9,  123 => 8,  119 => 7,  117 => 6,  104 => 5,  91 => 2,  79 => 1,  74 => 130,  71 => 126,  68 => 110,  65 => 106,  62 => 94,  59 => 72,  56 => 60,  53 => 56,  50 => 48,  47 => 42,  44 => 26,  41 => 20,  38 => 14,  35 => 4,);
    }

    public function getSourceContext()
    {
        return new Source("{% macro namespace_link(namespace) -%}
    <a href=\"{{ namespace_path(namespace) }}\">{{ namespace|raw }}</a>
{%- endmacro %}

{% macro class_link(class, absolute) -%}
    {%- if class.projectclass -%}
        <a href=\"{{ class_path(class) }}\">
    {%- elseif class.phpclass -%}
        <a target=\"_blank\" href=\"http://php.net/{{ class|raw }}\">
    {%- endif %}
    {{- abbr_class(class, absolute|default(false)) }}
    {%- if class.projectclass or class.phpclass %}</a>{% endif %}
{%- endmacro %}

{% macro method_link(method, absolute, classonly) -%}
    <a href=\"{{ method_path(method) }}\">
        {{- abbr_class(method.class) }}{% if not classonly|default(false) %}::{{ method.name|raw }}{% endif -%}
    </a>
{%- endmacro %}

{% macro property_link(property, absolute, classonly) -%}
    <a href=\"{{ property_path(property) }}\">
        {{- abbr_class(property.class) }}{% if not classonly|default(false) %}#{{ property.name|raw }}{% endif -%}
    </a>
{%- endmacro %}

{% macro hint_link(hints) -%}
    {%- from _self import class_link %}

    {%- if hints %}
        {%- for hint in hints %}
            {%- if hint.class %}
                {{- class_link(hint.name) }}
            {%- elseif hint.name %}
                {{- abbr_class(hint.name) }}
            {%- endif %}
            {%- if hint.array %}[]{% endif %}
            {%- if not loop.last %}|{% endif %}
        {%- endfor %}
    {%- endif %}
{%- endmacro %}

{% macro source_link(project, class) -%}
    {% if class.sourcepath %}
        (<a href=\"{{ class.sourcepath }}\">View source</a>)
    {%- endif %}
{%- endmacro %}

{% macro method_source_link(method) -%}
    {% if method.sourcepath %}
        <a href=\"{{ method.sourcepath }}\">line {{ method.line|raw }}</a>
    {%- else %}
        line {{ method.line|raw }}
    {%- endif %}
{%- endmacro %}

{% macro abbr_class(class, absolute) -%}
    <abbr title=\"{{ class }}\">{{ absolute|default(false) ? class : class.shortname }}</abbr>
{%- endmacro %}

{% macro method_parameters_signature(method) -%}
    {%- from \"macros.twig\" import hint_link -%}
    (
        {%- for parameter in method.parameters %}
            {%- if parameter.hashint %}{{ hint_link(parameter.hint) }} {% endif -%}
            {%- if parameter.variadic %}...{% endif %}\${{ parameter.name|raw }}
            {%- if parameter.default is not null %} = {{ parameter.default }}{% endif %}
            {%- if not loop.last %}, {% endif %}
        {%- endfor -%}
    )
{%- endmacro %}

{% macro render_classes(classes) -%}
    {% from _self import class_link, deprecated %}

    <div class=\"container-fluid underlined\">
        {% for class in classes %}
            <div class=\"row\">
                <div class=\"col-md-6\">
                    {% if class.isInterface %}
                        <em>{{ class_link(class, true) }}</em>
                    {% else %}
                        {{ class_link(class, true) }}
                    {% endif %}
                    {{ deprecated(class) }}
                </div>
                <div class=\"col-md-6\">
                    {{ class.shortdesc|desc(class) }}
                </div>
            </div>
        {% endfor %}
    </div>
{%- endmacro %}

{% macro breadcrumbs(namespace) %}
    {% set current_ns = '' %}
    {% for ns in namespace|split('\\\\') %}
        {%- if current_ns -%}
            {% set current_ns = current_ns ~ '\\\\' ~ ns %}
        {%- else -%}
            {% set current_ns = ns %}
        {%- endif -%}
        <li><a href=\"{{ namespace_path(current_ns) }}\">{{ ns|raw }}</a></li><li class=\"backslash\">\\</li>
    {%- endfor %}
{% endmacro %}

{% macro deprecated(reflection) %}
    {% if reflection.deprecated %}<small><sup><span class=\"label label-danger\">deprecated</span></sup></small>{% endif %}
{% endmacro %}

{% macro deprecations(reflection) %}
    {% from _self import deprecated %}

    {% if reflection.deprecated %}
        <p>
            {{ deprecated(reflection )}}
            {% for tag in reflection.deprecated %}
                <tr>
                    <td>{{ tag[0]|raw }}</td>
                    <td>{{ tag[1:]|join(' ')|raw }}</td>
                </tr>
            {% endfor %}
        </p>
    {% endif %}
{% endmacro %}

{% macro todo(reflection) %}
        {% if reflection.todo %}<small><sup><span class=\"label label-info\">todo</span></sup></small>{% endif %}
{% endmacro %}

{% macro todos(reflection) %}
        {% from _self import todo %}

        {% if reflection.todo %}
            <p>
                {{ todo(reflection )}}
                {% for tag in reflection.todo %}
                    <tr>
                        <td>{{ tag[0]|raw }}</td>
                        <td>{{ tag[1:]|join(' ')|raw }}</td>
                        </tr>
                {% endfor %}
            </p>
        {% endif %}
{% endmacro %}
", "macros.twig", "C:\\Users\\phillip.madsen\\repos\\cms\\configuration2\\vendor\\sami\\sami\\Sami\\Resources\\themes\\default\\macros.twig");
    }
}
