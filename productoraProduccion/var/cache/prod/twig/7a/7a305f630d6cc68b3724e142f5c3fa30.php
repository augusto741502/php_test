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

/* stock/index.html.twig */
class __TwigTemplate_0eb88242feca3ff2ec2df965b224e316 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "stock/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Stock";
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "<div class=\"container-fluid\">
<div class=\"card border-primary mb-3\" >
    <div class=\"card-header\">Clientes</div>
    <div class=\"card-body\">
      <h5 class=\"card-title\">Listado de Servicios</h5>

        <div class=\"conteiner\">
            <div class=\"my-2 text-left\">
                <button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\" onClick=\"modalIngreso()\" type=\"button\">Nueva Servicio</button>
            </div>               
              <div id='tablaReservas'></div>
        </div>
    </div>
</div>


<div id=\"modalIngreso\"></div>

</div>
";
    }

    // line 29
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " 
";
        // line 30
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script type='text/javascript' src='";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/stock.js"), "html", null, true);
        echo "'></script>
";
    }

    public function getTemplateName()
    {
        return "stock/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 31,  88 => 30,  82 => 29,  59 => 7,  55 => 6,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "stock/index.html.twig", "/home/augusto/Escritorio/productoraProduccion/templates/stock/index.html.twig");
    }
}
