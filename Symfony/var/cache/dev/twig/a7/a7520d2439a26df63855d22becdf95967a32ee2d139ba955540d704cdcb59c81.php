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

/* main/main_homepage.html.twig */
class __TwigTemplate_20e3ef99d966edb203f914054865249b47217e83dce64c19523b16740ec16cee extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main/main_homepage.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main/main_homepage.html.twig"));

        $this->parent = $this->loadTemplate("layout.html.twig", "main/main_homepage.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    <div id=\"carousel-example-generic\" class=\"carousel slide\" data-ride=\"carousel\">
        <ol class=\"carousel-indicators\">
            <li data-target=\"#carousel-example-generic\" data-slide-to=\"0\" class=\"active\"></li>
            <li data-target=\"#carousel-example-generic\" data-slide-to=\"1\"></li>
        </ol>

        <div class=\"carousel-inner\" role=\"listbox\">
            ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 12
            echo "            <div class=\"item ";
            echo ((($context["i"] === 1)) ? ("active") : (""));
            echo "\">
                <img src=\"img/slides/slide-";
            // line 13
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo ".jpg\" alt=\"Slide ";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\">
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "        </div>

        <a class=\"left carousel-control\" href=\"#carousel-example-generic\" role=\"button\" data-slide=\"prev\">
            <span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>
            <span class=\"sr-only\">Précédent</span>
        </a>
        <a class=\"right carousel-control\" href=\"#carousel-example-generic\" role=\"button\" data-slide=\"next\">
            <span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>
            <span class=\"sr-only\">Suivant</span>
        </a>
    </div>
    <hr/>

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <h3>Les nouveautés</h3>
        </div>
    </div>

    <div class=\"row text-center\">
        ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 37
            echo "            <div class=\"col-md-3 col-sm-6 hero-feature\">
                <div class=\"thumbnail\">
                    <img src=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("img/products/shoe-" . $context["i"]) . ".jpg")), "html", null, true);
            echo "\" alt=\"Nom du produit\">
                    <div class=\"caption\">
                        <h3>Nom du produit</h3>
                        <p>Une description courte du produit sera affichée à cet endroit.</p>
                        <p>
                            <span class=\"badge\">120,00 €</span>
";
            // line 46
            echo "                            <a href=\"#\" class=\"btn btn-default\">Voir la fiche</a>
                        </p>
                    </div>
                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "main/main_homepage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 52,  136 => 46,  127 => 39,  123 => 37,  119 => 36,  97 => 16,  86 => 13,  81 => 12,  77 => 11,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html.twig' %}

{% block content %}
    <div id=\"carousel-example-generic\" class=\"carousel slide\" data-ride=\"carousel\">
        <ol class=\"carousel-indicators\">
            <li data-target=\"#carousel-example-generic\" data-slide-to=\"0\" class=\"active\"></li>
            <li data-target=\"#carousel-example-generic\" data-slide-to=\"1\"></li>
        </ol>

        <div class=\"carousel-inner\" role=\"listbox\">
            {% for i in 1..2 %}
            <div class=\"item {{ i is same as(1) ? 'active' }}\">
                <img src=\"img/slides/slide-{{ i }}.jpg\" alt=\"Slide {{ i }}\">
            </div>
            {% endfor %}
        </div>

        <a class=\"left carousel-control\" href=\"#carousel-example-generic\" role=\"button\" data-slide=\"prev\">
            <span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>
            <span class=\"sr-only\">Précédent</span>
        </a>
        <a class=\"right carousel-control\" href=\"#carousel-example-generic\" role=\"button\" data-slide=\"next\">
            <span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>
            <span class=\"sr-only\">Suivant</span>
        </a>
    </div>
    <hr/>

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <h3>Les nouveautés</h3>
        </div>
    </div>

    <div class=\"row text-center\">
        {% for i in 1..2 %}
            <div class=\"col-md-3 col-sm-6 hero-feature\">
                <div class=\"thumbnail\">
                    <img src=\"{{ asset('img/products/shoe-' ~ i ~'.jpg') }}\" alt=\"Nom du produit\">
                    <div class=\"caption\">
                        <h3>Nom du produit</h3>
                        <p>Une description courte du produit sera affichée à cet endroit.</p>
                        <p>
                            <span class=\"badge\">120,00 €</span>
{#                            <a href=\"{{ path('store_show_product', {'id': i, 'slug': 'shoe-' ~ 1 }) }}\" class=\"btn btn-default\">Voir la fiche</a>#}
                            <a href=\"#\" class=\"btn btn-default\">Voir la fiche</a>
                        </p>
                    </div>
                </div>
            </div>
        {% endfor %}
    </div>

{% endblock %}", "main/main_homepage.html.twig", "C:\\xampp\\htdocs\\Symfony\\shoefony\\templates\\main\\main_homepage.html.twig");
    }
}
