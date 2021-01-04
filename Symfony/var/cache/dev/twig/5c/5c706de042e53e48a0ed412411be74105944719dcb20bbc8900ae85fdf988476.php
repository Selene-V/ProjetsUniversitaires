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

/* store/store_show_product.html.twig */
class __TwigTemplate_ea9f877bc7433d3b2816e6ca4d59b4b4ee34df6bd537880245cf181c8bf95ac9 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "store/store_show_product.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "store/store_show_product.html.twig"));

        $this->parent = $this->loadTemplate("layout.html.twig", "store/store_show_product.html.twig", 1);
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

        echo " ";
        echo twig_escape_filter($this->env, (isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 3, $this->source); })()), "html", null, true);
        echo " - ";
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
        echo "    <div class=\"row\">
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
            <p class=\"lead\">
                Fiche descriptive \" ";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 20, $this->source); })()), "html", null, true);
        echo " \"
                <a href=\"";
        // line 21
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("store_list_products");
        echo "\" class=\"btn btn-default pull-right\">Retour aux produits</a>
            </p>
            <div class=\"row\">
                <div class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("img/products/shoe-" . (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 25, $this->source); })())) . ".jpg")), "html", null, true);
        echo "\" alt=\"\">
                    <div class=\"caption-full\">
                        <h4 class=\"pull-right\"><span class=\"badge\">120,00 €</span></h4>
                        <h3>";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["slug"]) || array_key_exists("slug", $context) ? $context["slug"] : (function () { throw new RuntimeError('Variable "slug" does not exist.', 28, $this->source); })()), "html", null, true);
        echo "</h3>
                        <p>Une description courte du produit sera affichée à cet endroit.</p>
                        <p>
                            Une description longue du produit sera affichée à cet endroit :
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                            qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>
                </div>

                <div class=\"well\">
                    <p class=\"pull-right label label-success\">Actuellement 3 avis</p>
                    ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 3));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 44
            echo "                        <div class=\"row\">
                            <div class=\"col-md-12\">
                                <span class=\"label label-info\">Prénom Nom</span>
                                <span class=\"label label-default pull-right\">28/01/2015</span>
                                <p>Un commentaire sur le produit, rédigé par un client, sera affiché à cet endroit.</p>
                            </div>
                        </div>

                        <hr/>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "
                    <div>
                        <form>
                            <div class=\"form-group\">
                                <label for=\"name\">Votre nom</label>
                                <input type=\"text\" class=\"form-control\" id=\"name\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"message\">Votre avis</label>
                                <textarea class=\"form-control\" name=\"comment\" rows=\"3\"></textarea>
                            </div>
                            <button type=\"submit\" class=\"btn btn-info\">Envoyer mon avis</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr/>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "store/store_show_product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 54,  146 => 44,  142 => 43,  124 => 28,  118 => 25,  111 => 21,  107 => 20,  91 => 6,  81 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.html.twig' %}

{% block title %} {{ slug }} - {{ parent() }}{% endblock %}

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
            <p class=\"lead\">
                Fiche descriptive \" {{ slug }} \"
                <a href=\"{{ path('store_list_products') }}\" class=\"btn btn-default pull-right\">Retour aux produits</a>
            </p>
            <div class=\"row\">
                <div class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"{{ asset('img/products/shoe-' ~ id ~'.jpg') }}\" alt=\"\">
                    <div class=\"caption-full\">
                        <h4 class=\"pull-right\"><span class=\"badge\">120,00 €</span></h4>
                        <h3>{{ slug }}</h3>
                        <p>Une description courte du produit sera affichée à cet endroit.</p>
                        <p>
                            Une description longue du produit sera affichée à cet endroit :
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                            qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>
                </div>

                <div class=\"well\">
                    <p class=\"pull-right label label-success\">Actuellement 3 avis</p>
                    {% for i in 1..3 %}
                        <div class=\"row\">
                            <div class=\"col-md-12\">
                                <span class=\"label label-info\">Prénom Nom</span>
                                <span class=\"label label-default pull-right\">28/01/2015</span>
                                <p>Un commentaire sur le produit, rédigé par un client, sera affiché à cet endroit.</p>
                            </div>
                        </div>

                        <hr/>
                    {% endfor %}

                    <div>
                        <form>
                            <div class=\"form-group\">
                                <label for=\"name\">Votre nom</label>
                                <input type=\"text\" class=\"form-control\" id=\"name\">
                            </div>
                            <div class=\"form-group\">
                                <label for=\"message\">Votre avis</label>
                                <textarea class=\"form-control\" name=\"comment\" rows=\"3\"></textarea>
                            </div>
                            <button type=\"submit\" class=\"btn btn-info\">Envoyer mon avis</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr/>

{% endblock %}


{#<div class=\"example-wrapper\">#}
{#    <h1>Hello {{ controller_name }}! ✅</h1>#}
{#    <h1>ID : {{ id }} ✅</h1>#}
{#    <h1>slug : {{ slug }} ✅</h1>#}
{#    <h1>url : {{ url }} ✅</h1>#}
{#    <h1>IP : {{ adresse_ip }} ✅</h1>#}
{#</div>#}", "store/store_show_product.html.twig", "C:\\xampp\\htdocs\\Symfony\\shoefony\\templates\\store\\store_show_product.html.twig");
    }
}
