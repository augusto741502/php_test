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

/* reservas/index.html.twig */
class __TwigTemplate_6a2466d3032517a8fb1cfdf57056132a extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "reservas/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "reservas";
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<div class=\"container-fluid\">
<div class=\"card border-primary mb-3\" >
    <div class=\"card-header\">Clientes</div>
    <div class=\"card-body\">
      <h5 class=\"card-title\">Listado de clientes</h5>

        <div class=\"conteiner\">
            <div class=\"my-2 text-left\">
                <button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\" onClick=\"modalIngreso()\" type=\"button\">Nueva Reserva</button>
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
    }

    // line 50
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
";
        // line 51
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script type='text/javascript' src='";
        // line 52
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/reservas.js"), "html", null, true);
        echo "'></script>
";
    }

    public function getTemplateName()
    {
        return "reservas/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 52,  111 => 51,  105 => 50,  59 => 6,  55 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "reservas/index.html.twig", "/home/augusto/Escritorio/productoraProduccion/templates/reservas/index.html.twig");
    }
}
