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

/* store/store_list_products.html.twig */
class __TwigTemplate_cddc5247cfb6b1f5854969ebdcdfd7e8a12f2814c57e135182866c2fc98df2f1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "store/store_list_products.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "store/store_list_products.html.twig"));

        $this->parent = $this->loadTemplate("layout.html.twig", "store/store_list_products.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Nos produits - ";
        $this->displayParentBlock("title", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "<div class=\"row\">
    <div class=\"col-md-3\">
        <p class=\"lead\">Nos marques</p>
        <div class=\"list-group\">
            <a href=\"#\" class=\"list-group-item active\">Toutes les marques</a>
            <a href=\"#\" class=\"list-group-item\">Adidas</a>
            <a href=\"#\" class=\"list-group-item\">Asics</a>
            <a href=\"#\" class=\"list-group-item\">Nike</a>
            <a href=\"#\" class=\"list-group-item\">Puma</a>
        </div>
    </div>

    <div class=\"col-md-9\">
        <p class=\"lead\">Nos produits \" Toutes les marques \"</p>
        <div class=\"row text-center\">
            ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 9));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 22
            echo "                <div class=\"col-md-4 col-sm-6 hero-feature\">
                    <div class=\"thumbnail\">
                        <img src=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("img/products/shoe-" . $context["i"]) . ".jpg")), "html", null, true);
            echo "\" alt=\"Nom du produit\">                        <div class=\"caption\">
                            <h3>Nom du produit</h3>
                            <p>Une description courte du produit sera affichée à cet endroit.</p>
                            <p>
                                <span class=\"badge\">120,00 €</span>
                                <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("store_show_product", ["id" => $context["i"], "slug" => ("shoe-" . $context["i"])]), "html", null, true);
            echo "\" class=\"btn btn-default\">Voir la fiche</a>
";
            // line 31
            echo "                            </p>
                        </div>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "        </div>
    </div>

    <div class=\"row text-center\">
        <nav>
            <ul class=\"pagination pagination-lg\">
                <li>
                    <a href=\"#\" aria-label=\"Précédent\">
                        <span aria-hidden=\"true\">&laquo;</span>
                    </a>
                </li>
                ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 48
            echo "                    <li class=\"";
            echo ((($context["i"] === 1)) ? ("active") : (""));
            echo "\">
                        <a href=\"#\">";
            // line 49
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "</a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "                <li>
                    <a href=\"#\" aria-label=\"Suivant\">
                        <span aria-hidden=\"true\">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<hr/>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "store/store_list_products.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 52,  158 => 49,  153 => 48,  149 => 47,  136 => 36,  126 => 31,  122 => 29,  114 => 24,  110 => 22,  106 => 21,  89 => 6,  79 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html.twig' %}

{% block title %}Nos produits - {{ parent() }}{% endblock %}

{% block content %}
<div class=\"row\">
    <div class=\"col-md-3\">
        <p class=\"lead\">Nos marques</p>
        <div class=\"list-group\">
            <a href=\"#\" class=\"list-group-item active\">Toutes les marques</a>
            <a href=\"#\" class=\"list-group-item\">Adidas</a>
            <a href=\"#\" class=\"list-group-item\">Asics</a>
            <a href=\"#\" class=\"list-group-item\">Nike</a>
            <a href=\"#\" class=\"list-group-item\">Puma</a>
        </div>
    </div>

    <div class=\"col-md-9\">
        <p class=\"lead\">Nos produits \" Toutes les marques \"</p>
        <div class=\"row text-center\">
            {% for i in 1..9 %}
                <div class=\"col-md-4 col-sm-6 hero-feature\">
                    <div class=\"thumbnail\">
                        <img src=\"{{ asset('img/products/shoe-' ~ i ~'.jpg') }}\" alt=\"Nom du produit\">                        <div class=\"caption\">
                            <h3>Nom du produit</h3>
                            <p>Une description courte du produit sera affichée à cet endroit.</p>
                            <p>
                                <span class=\"badge\">120,00 €</span>
                                <a href=\"{{ path('store_show_product', {'id': i, 'slug': 'shoe-' ~ i }) }}\" class=\"btn btn-default\">Voir la fiche</a>
{#                                <a href=\"#\" class=\"btn btn-default\">Voir la fiche</a>#}
                            </p>
                        </div>
                    </div>
                </div>
            {% endfor %}
        </div>
    </div>

    <div class=\"row text-center\">
        <nav>
            <ul class=\"pagination pagination-lg\">
                <li>
                    <a href=\"#\" aria-label=\"Précédent\">
                        <span aria-hidden=\"true\">&laquo;</span>
                    </a>
                </li>
                {% for i in 1..2 %}
                    <li class=\"{{ i is same as(1) ? 'active' }}\">
                        <a href=\"#\">{{ i }}</a>
                    </li>
                {% endfor %}
                <li>
                    <a href=\"#\" aria-label=\"Suivant\">
                        <span aria-hidden=\"true\">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<hr/>

{% endblock %}", "store/store_list_products.html.twig", "C:\\xampp\\htdocs\\Symfony\\shoefony\\templates\\store\\store_list_products.html.twig");
    }
}
