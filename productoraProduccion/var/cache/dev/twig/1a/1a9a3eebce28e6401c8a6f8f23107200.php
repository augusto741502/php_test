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

/* presupuesto/index.html.twig */
class __TwigTemplate_a24fed8f8463aac8bbe4b9eecaa5ee3c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "presupuesto/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "presupuesto/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "presupuesto/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Presupuestos";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<div class=\"container-fluid\">
<div class=\"card border-primary mb-3\" >
    <div class=\"card-header\">Presupuesto</div>
    <div class=\"card-body\">
      <h5 class=\"card-title\">Listado de Presupuestos</h5>

        <div class=\"conteiner\">
            <div class=\"my-2 text-left\">
                <button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\" onClick=\"modalIngreso()\" type=\"button\">Nueva Presupuesto</button>
            </div>

                <div class=\"row\">
                    <div class=\"col-2\">
                      
                            <label>Fecha Desde</label>

                            <input type=\"date\" class=\"form-control\" name=\"fechaInicio\" id=\"fechaInicio\"/>
                        
                    </div>
                    <div class=\"col-2\">
                       
                            <label>Fecha Hasta</label>
                            <input type=\"date\" class=\"form-control\" name=\"fechaFin\" id=\"fechaFin\"/>
                       
                    </div>
                    <div class=\"col-2\" >
                        <div>&nbsp;</div>
                        <button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\" type=\"button\" onClick=\"tabla()\">Buscar</button>
                    </div>
                </div>
                
              <div id='tablaReservas'></div>
        </div>
    </div>
</div>


<div id=\"modalIngreso\"></div>

<div id=\"modalReserva\"></div>

</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 50
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        echo " 
";
        // line 51
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script type='text/javascript' src='";
        // line 52
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/presupuestos.js"), "html", null, true);
        echo "'></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "presupuesto/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 52,  153 => 51,  141 => 50,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Presupuestos{% endblock %}

{% block body %}
<div class=\"container-fluid\">
<div class=\"card border-primary mb-3\" >
    <div class=\"card-header\">Presupuesto</div>
    <div class=\"card-body\">
      <h5 class=\"card-title\">Listado de Presupuestos</h5>

        <div class=\"conteiner\">
            <div class=\"my-2 text-left\">
                <button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\" onClick=\"modalIngreso()\" type=\"button\">Nueva Presupuesto</button>
            </div>

                <div class=\"row\">
                    <div class=\"col-2\">
                      
                            <label>Fecha Desde</label>

                            <input type=\"date\" class=\"form-control\" name=\"fechaInicio\" id=\"fechaInicio\"/>
                        
                    </div>
                    <div class=\"col-2\">
                       
                            <label>Fecha Hasta</label>
                            <input type=\"date\" class=\"form-control\" name=\"fechaFin\" id=\"fechaFin\"/>
                       
                    </div>
                    <div class=\"col-2\" >
                        <div>&nbsp;</div>
                        <button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\" type=\"button\" onClick=\"tabla()\">Buscar</button>
                    </div>
                </div>
                
              <div id='tablaReservas'></div>
        </div>
    </div>
</div>


<div id=\"modalIngreso\"></div>

<div id=\"modalReserva\"></div>

</div>
{% endblock %}

{% block javascripts %} 
{{ parent() }}
  <script type='text/javascript' src='{{ asset('/js/presupuestos.js')}}'></script>
{% endblock%}
", "presupuesto/index.html.twig", "/home/augusto/Escritorio/productora-app/templates/presupuesto/index.html.twig");
    }
}
