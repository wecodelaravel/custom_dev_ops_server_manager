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

/* sami.js.twig */
class __TwigTemplate_db7dd3ea256e5eae44f84c410e321e0edee4421b5d28eeab43e81d764ca141b1 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'search_index' => [$this, 'block_search_index'],
            'search_index_extra' => [$this, 'block_search_index_extra'],
            'treejs' => [$this, 'block_treejs'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context["__internal_e1ab08a6bc8edee48c887f0a1995f9c1f8567b15591f4fe7731abfe3d3ad6329"] = $this;
        // line 2
        echo "
window.projectVersion = '";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 3, $this->source); })()), "version", []), "html", null, true);
        echo "';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '";
        // line 9
        echo twig_replace_filter($context["__internal_e1ab08a6bc8edee48c887f0a1995f9c1f8567b15591f4fe7731abfe3d3ad6329"]->macro_element((isset($context["tree"]) || array_key_exists("tree", $context) ? $context["tree"] : (function () { throw new RuntimeError('Variable "tree" does not exist.', 9, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 9, $this->source); })()), "config", [0 => "default_opened_level"], "method"), 0), ["'" => "\\'", "
" => ""]);
        echo "';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
        ";
        // line 21
        $this->displayBlock('search_index', $context, $blocks);
        // line 41
        echo "        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if \"::\" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\\\') > -1) {
            tokens = tokens.concat(term.split('\\\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string \"search\" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp(\"[\\\\?&]\" + name + \"=([^&#]*)\");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\\+/g, \" \"));
            }

            return term.replace(/<(?:.|\\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return \$.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    \$(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = \$('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href=\"/g, 'href=\"' + rootPath);
        Sami.injectApiTree(\$('#api-tree'));
    });

    return root.Sami;
})(window);

\$(function() {

    // Enable the version switcher
    \$('#version-switcher').change(function() {
        window.location = \$(this).val()
    });

    ";
        // line 158
        $this->displayBlock('treejs', $context, $blocks);
        // line 184
        echo "
    ";
        // line 212
        echo "
        var form = \$('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                \$('#search-form').submit();
                return true;
            }
        });

    ";
        echo "
});

";
        // line 224
        echo "
";
    }

    // line 21
    public function block_search_index($context, array $blocks = [])
    {
        // line 22
        echo "            ";
        $context["__internal_7b2c8d0334101de99bd6e81f6c80ccb28392a483bd386751b1ced46e71f8438b"] = $this;
        // line 23
        echo "
            ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["namespaces"]) || array_key_exists("namespaces", $context) ? $context["namespaces"] : (function () { throw new RuntimeError('Variable "namespaces" does not exist.', 24, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["ns"]) {
            // line 25
            echo "{\"type\": \"Namespace\", \"link\": \"";
            echo $this->extensions['Sami\Renderer\TwigExtension']->pathForNamespace($context, $context["ns"]);
            echo "\", \"name\": \"";
            echo twig_replace_filter($context["ns"], ["\\" => "\\\\"]);
            echo "\", \"doc\": \"Namespace ";
            echo twig_replace_filter($context["ns"], ["\\" => "\\\\"]);
            echo "\"},";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ns'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "
            ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["interfaces"]) || array_key_exists("interfaces", $context) ? $context["interfaces"] : (function () { throw new RuntimeError('Variable "interfaces" does not exist.', 28, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 29
            echo "{\"type\": \"Interface\", ";
            if (twig_get_attribute($this->env, $this->source, $context["class"], "namespace", [])) {
                echo "\"fromName\": \"";
                echo twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["class"], "namespace", []), ["\\" => "\\\\"]);
                echo "\", \"fromLink\": \"";
                echo $this->extensions['Sami\Renderer\TwigExtension']->pathForNamespace($context, twig_get_attribute($this->env, $this->source, $context["class"], "namespace", []));
                echo "\",";
            }
            echo " \"link\": \"";
            echo $this->extensions['Sami\Renderer\TwigExtension']->pathForClass($context, $context["class"]);
            echo "\", \"name\": \"";
            echo twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["class"], "name", []), ["\\" => "\\\\"]);
            echo "\", \"doc\": \"";
            echo twig_escape_filter($this->env, json_encode($this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["class"], "shortdesc", []), $context["class"])), "html", null, true);
            echo "\"},
                ";
            // line 30
            echo $context["__internal_7b2c8d0334101de99bd6e81f6c80ccb28392a483bd386751b1ced46e71f8438b"]->macro_add_class_methods_index($context["class"]);
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "
            ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["classes"]) || array_key_exists("classes", $context) ? $context["classes"] : (function () { throw new RuntimeError('Variable "classes" does not exist.', 33, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 34
            echo "{\"type\": ";
            if (twig_get_attribute($this->env, $this->source, $context["class"], "isTrait", [])) {
                echo "\"Trait\"";
            } else {
                echo "\"Class\"";
            }
            echo ", ";
            if (twig_get_attribute($this->env, $this->source, $context["class"], "namespace", [])) {
                echo "\"fromName\": \"";
                echo twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["class"], "namespace", []), ["\\" => "\\\\"]);
                echo "\", \"fromLink\": \"";
                echo $this->extensions['Sami\Renderer\TwigExtension']->pathForNamespace($context, twig_get_attribute($this->env, $this->source, $context["class"], "namespace", []));
                echo "\",";
            }
            echo " \"link\": \"";
            echo $this->extensions['Sami\Renderer\TwigExtension']->pathForClass($context, $context["class"]);
            echo "\", \"name\": \"";
            echo twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["class"], "name", []), ["\\" => "\\\\"]);
            echo "\", \"doc\": \"";
            echo twig_escape_filter($this->env, json_encode($this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["class"], "shortdesc", []), $context["class"])), "html", null, true);
            echo "\"},
                ";
            // line 35
            echo $context["__internal_7b2c8d0334101de99bd6e81f6c80ccb28392a483bd386751b1ced46e71f8438b"]->macro_add_class_methods_index($context["class"]);
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "
            ";
        // line 39
        echo "            ";
        $this->displayBlock('search_index_extra', $context, $blocks);
        // line 40
        echo "        ";
    }

    // line 39
    public function block_search_index_extra($context, array $blocks = [])
    {
        echo "";
    }

    // line 158
    public function block_treejs($context, array $blocks = [])
    {
        // line 159
        echo "
        // Toggle left-nav divs on click
        \$('#api-tree .hd span').click(function() {
            \$(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = \$('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = \$('#api-tree');
            var node = \$('#api-tree li[data-name=\"' + expected + '\"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    ";
    }

    // line 215
    public function macro_add_class_methods_index($__class__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "class" => $__class__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 216
            echo "    ";
            if (twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 216, $this->source); })()), "methods", [])) {
                // line 217
                echo "        ";
                $context["from_name"] = twig_replace_filter(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 217, $this->source); })()), "name", []), ["\\" => "\\\\"]);
                // line 218
                echo "        ";
                $context["from_link"] = $this->extensions['Sami\Renderer\TwigExtension']->pathForClass($context, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 218, $this->source); })()));
                // line 219
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 219, $this->source); })()), "methods", []));
                foreach ($context['_seq'] as $context["_key"] => $context["meth"]) {
                    // line 220
                    echo "            {\"type\": \"Method\", \"fromName\": \"";
                    echo (isset($context["from_name"]) || array_key_exists("from_name", $context) ? $context["from_name"] : (function () { throw new RuntimeError('Variable "from_name" does not exist.', 220, $this->source); })());
                    echo "\", \"fromLink\": \"";
                    echo (isset($context["from_link"]) || array_key_exists("from_link", $context) ? $context["from_link"] : (function () { throw new RuntimeError('Variable "from_link" does not exist.', 220, $this->source); })());
                    echo "\", \"link\": \"";
                    echo $this->extensions['Sami\Renderer\TwigExtension']->pathForMethod($context, $context["meth"]);
                    echo "\", \"name\": \"";
                    echo twig_replace_filter($context["meth"], ["\\" => "\\\\"]);
                    echo "\", \"doc\": \"";
                    echo twig_escape_filter($this->env, json_encode($this->extensions['Sami\Renderer\TwigExtension']->parseDesc($context, twig_get_attribute($this->env, $this->source, $context["meth"], "shortdesc", []), (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 220, $this->source); })()))), "html", null, true);
                    echo "\"},
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meth'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 222
                echo "    ";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 225
    public function macro_element($__tree__ = null, $__opened__ = null, $__depth__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "tree" => $__tree__,
            "opened" => $__opened__,
            "depth" => $__depth__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 226
            echo "    ";
            $context["__internal_2641e0b285009214706ff25cf8bbeb225c663fd7eee37514f2443793fa33f00e"] = $this;
            // line 227
            echo "
    <ul>";
            // line 229
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tree"]) || array_key_exists("tree", $context) ? $context["tree"] : (function () { throw new RuntimeError('Variable "tree" does not exist.', 229, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 230
                if (twig_get_attribute($this->env, $this->source, $context["element"], 2, [], "array")) {
                    // line 231
                    echo "                <li data-name=\"namespace:";
                    echo twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["element"], 1, [], "array"), ["\\" => "_"]);
                    echo "\" ";
                    if (((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new RuntimeError('Variable "depth" does not exist.', 231, $this->source); })()) < (isset($context["opened"]) || array_key_exists("opened", $context) ? $context["opened"] : (function () { throw new RuntimeError('Variable "opened" does not exist.', 231, $this->source); })()))) {
                        echo "class=\"opened\"";
                    }
                    echo ">
                    <div style=\"padding-left:";
                    // line 232
                    echo ((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new RuntimeError('Variable "depth" does not exist.', 232, $this->source); })()) * 18);
                    echo "px\" class=\"hd\">
                        <span class=\"glyphicon glyphicon-play\"></span>";
                    // line 233
                    if ( !twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 233, $this->source); })()), "config", [0 => "simulate_namespaces"], "method")) {
                        echo "<a href=\"";
                        echo $this->extensions['Sami\Renderer\TwigExtension']->pathForNamespace($context, twig_get_attribute($this->env, $this->source, $context["element"], 1, [], "array"));
                        echo "\">";
                    }
                    echo twig_get_attribute($this->env, $this->source, $context["element"], 0, [], "array");
                    if ( !twig_get_attribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 233, $this->source); })()), "config", [0 => "simulate_namespaces"], "method")) {
                        echo "</a>";
                    }
                    // line 234
                    echo "                    </div>
                    <div class=\"bd\">
                        ";
                    // line 236
                    echo $context["__internal_2641e0b285009214706ff25cf8bbeb225c663fd7eee37514f2443793fa33f00e"]->macro_element(twig_get_attribute($this->env, $this->source, $context["element"], 2, [], "array"), (isset($context["opened"]) || array_key_exists("opened", $context) ? $context["opened"] : (function () { throw new RuntimeError('Variable "opened" does not exist.', 236, $this->source); })()), ((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new RuntimeError('Variable "depth" does not exist.', 236, $this->source); })()) + 1));
                    // line 237
                    echo "</div>
                </li>
            ";
                } else {
                    // line 240
                    echo "                <li data-name=\"class:";
                    echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["element"], 1, [], "array"), "name", []), ["\\" => "_"]), "html", null, true);
                    echo "\" ";
                    if (((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new RuntimeError('Variable "depth" does not exist.', 240, $this->source); })()) < (isset($context["opened"]) || array_key_exists("opened", $context) ? $context["opened"] : (function () { throw new RuntimeError('Variable "opened" does not exist.', 240, $this->source); })()))) {
                        echo "class=\"opened\"";
                    }
                    echo ">
                    <div style=\"padding-left:";
                    // line 241
                    echo twig_escape_filter($this->env, (8 + ((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new RuntimeError('Variable "depth" does not exist.', 241, $this->source); })()) * 18)), "html", null, true);
                    echo "px\" class=\"hd leaf\">
                        <a href=\"";
                    // line 242
                    echo $this->extensions['Sami\Renderer\TwigExtension']->pathForClass($context, twig_get_attribute($this->env, $this->source, $context["element"], 1, [], "array"));
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["element"], 0, [], "array"), "html", null, true);
                    echo "</a>
                    </div>
                </li>
            ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 247
            echo "    </ul>
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "sami.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  513 => 247,  500 => 242,  496 => 241,  487 => 240,  482 => 237,  480 => 236,  476 => 234,  466 => 233,  462 => 232,  453 => 231,  451 => 230,  447 => 229,  444 => 227,  441 => 226,  427 => 225,  417 => 222,  400 => 220,  395 => 219,  392 => 218,  389 => 217,  386 => 216,  374 => 215,  346 => 159,  343 => 158,  337 => 39,  333 => 40,  330 => 39,  327 => 37,  319 => 35,  296 => 34,  292 => 33,  289 => 32,  281 => 30,  264 => 29,  260 => 28,  257 => 27,  245 => 25,  241 => 24,  238 => 23,  235 => 22,  232 => 21,  227 => 224,  194 => 212,  191 => 184,  189 => 158,  70 => 41,  68 => 21,  52 => 9,  43 => 3,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% from _self import element %}

window.projectVersion = '{{ project.version }}';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '{{ element(tree, project.config('default_opened_level'), 0)|replace({\"'\": \"\\\\'\", \"\\n\": ''})|raw }}';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
        {% block search_index %}
            {% from _self import add_class_methods_index %}

            {% for ns in namespaces -%}
                {\"type\": \"Namespace\", \"link\": \"{{ namespace_path(ns) }}\", \"name\": \"{{ ns|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"doc\": \"Namespace {{ ns|replace({'\\\\': '\\\\\\\\'})|raw }}\"},
            {%- endfor %}

            {% for class in interfaces -%}
                {\"type\": \"Interface\", {% if class.namespace %}\"fromName\": \"{{ class.namespace|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"fromLink\": \"{{ namespace_path(class.namespace)|raw }}\",{% endif %} \"link\": \"{{ class_path(class) }}\", \"name\": \"{{ class.name|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"doc\": \"{{ class.shortdesc|desc(class)|json_encode }}\"},
                {{ add_class_methods_index(class) }}
            {% endfor %}

            {% for class in classes -%}
                {\"type\": {% if class.isTrait %}\"Trait\"{% else %}\"Class\"{% endif %}, {% if class.namespace %}\"fromName\": \"{{ class.namespace|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"fromLink\": \"{{ namespace_path(class.namespace) }}\",{% endif %} \"link\": \"{{ class_path(class) }}\", \"name\": \"{{ class.name|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"doc\": \"{{ class.shortdesc|desc(class)|json_encode }}\"},
                {{ add_class_methods_index(class) }}
            {% endfor %}

            {# Override this block, search_index_extra, to add custom search entries! #}
            {% block search_index_extra '' %}
        {% endblock %}
        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if \"::\" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\\\') > -1) {
            tokens = tokens.concat(term.split('\\\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string \"search\" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp(\"[\\\\?&]\" + name + \"=([^&#]*)\");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\\+/g, \" \"));
            }

            return term.replace(/<(?:.|\\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return \$.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    \$(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = \$('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href=\"/g, 'href=\"' + rootPath);
        Sami.injectApiTree(\$('#api-tree'));
    });

    return root.Sami;
})(window);

\$(function() {

    // Enable the version switcher
    \$('#version-switcher').change(function() {
        window.location = \$(this).val()
    });

    {% block treejs %}

        // Toggle left-nav divs on click
        \$('#api-tree .hd span').click(function() {
            \$(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = \$('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = \$('#api-tree');
            var node = \$('#api-tree li[data-name=\"' + expected + '\"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    {% endblock %}

    {% verbatim %}
        var form = \$('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                \$('#search-form').submit();
                return true;
            }
        });

    {% endverbatim %}
});

{% macro add_class_methods_index(class) %}
    {% if class.methods %}
        {% set from_name = class.name|replace({'\\\\': '\\\\\\\\'}) %}
        {% set from_link = class_path(class) %}
        {% for meth in class.methods %}
            {\"type\": \"Method\", \"fromName\": \"{{ from_name|raw }}\", \"fromLink\": \"{{ from_link|raw }}\", \"link\": \"{{ method_path(meth) }}\", \"name\": \"{{ meth|replace({'\\\\': '\\\\\\\\'})|raw }}\", \"doc\": \"{{ meth.shortdesc|desc(class)|json_encode }}\"},
        {% endfor %}
    {% endif %}
{% endmacro %}

{% macro element(tree, opened, depth) %}
    {% from _self import element %}

    <ul>
        {%- for element in tree -%}
            {% if element[2] %}
                <li data-name=\"namespace:{{ element[1]|replace({'\\\\': '_'})|raw }}\" {% if depth < opened %}class=\"opened\"{% endif %}>
                    <div style=\"padding-left:{{ (depth * 18)|raw }}px\" class=\"hd\">
                        <span class=\"glyphicon glyphicon-play\"></span>{% if not project.config('simulate_namespaces') %}<a href=\"{{ namespace_path(element[1]) }}\">{% endif %}{{ element[0]|raw }}{% if not project.config('simulate_namespaces') %}</a>{% endif %}
                    </div>
                    <div class=\"bd\">
                        {{ element(element[2], opened, depth + 1) -}}
                    </div>
                </li>
            {% else %}
                <li data-name=\"class:{{ (element[1].name)|replace({'\\\\': '_'}) }}\" {% if depth < opened %}class=\"opened\"{% endif %}>
                    <div style=\"padding-left:{{ 8 + (depth * 18) }}px\" class=\"hd leaf\">
                        <a href=\"{{ class_path(element[1]) }}\">{{ element[0] }}</a>
                    </div>
                </li>
            {% endif %}
        {%- endfor %}
    </ul>
{% endmacro %}
", "sami.js.twig", "C:\\Users\\phillip.madsen\\repos\\cms\\configuration2\\vendor\\sami\\sami\\Sami\\Resources\\themes\\default\\sami.js.twig");
    }
}
