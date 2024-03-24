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

/* base.html.twig */
class __TwigTemplate_5fcefc3b4d009c034976fdb5dfc94118 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'menu' => [$this, 'block_menu'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>\">
        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "
        ";
        // line 15
        $this->displayBlock('javascripts', $context, $blocks);
        // line 33
        echo "    </head>
    <body>




        ";
        // line 39
        $this->displayBlock('menu', $context, $blocks);
        // line 64
        echo "        </br>
    </br>
        ";
        // line 66
        $this->displayBlock('body', $context, $blocks);
        // line 67
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Sistema productora";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/css/jquery.dataTables.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
            <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/css/buttons.dataTables.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
            <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
            <link rel='stylesheet' href=";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/css/jquery-ui.css"), "html", null, true);
        echo " />
            <link rel='stylesheet' href=";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/css/reserva.css"), "html", null, true);
        echo " />
        ";
    }

    // line 15
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        echo "
 
            <script type='text/javascript' src='";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/jquery-3.6.4.min.js"), "html", null, true);
        echo "'></script>
            <script type='text/javascript' src='";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/jquery-ui.js"), "html", null, true);
        echo "'></script> 
            <script type='text/javascript' src='";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/jquery.dataTables.min.js"), "html", null, true);
        echo "'></script>
            <script type='text/javascript' src='";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/table/dataTables.buttons.min.js"), "html", null, true);
        echo "'></script>
            <script type='text/javascript' src='";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/table/jszip.min.js"), "html", null, true);
        echo "'></script>
            <script type='text/javascript' src='";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/table/pdfmake.min.js"), "html", null, true);
        echo "'></script>
            <script type='text/javascript' src='";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/table/vfs_fonts.js"), "html", null, true);
        echo "'></script>
            <script type='text/javascript' src='";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/table/buttons.html5.min.js"), "html", null, true);
        echo "'></script>
            <script type='text/javascript' src='";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/table/buttons.print.min.js"), "html", null, true);
        echo "'></script>
            <script type='text/javascript' src='";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/table/buttons.colVis.min.js"), "html", null, true);
        echo "'></script>
            <script type='text/javascript' src='";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/js/bootstrap.min.js"), "html", null, true);
        echo "'></script>
  

            
        ";
    }

    // line 39
    public function block_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 40
        echo "        <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
            <div class=\"container-fluid\">
              <a class=\"navbar-brand\" href=\"#\">";
        // line 42
        echo twig_escape_filter($this->env, ($context["date"] ?? null), "html", null, true);
        echo "</a>
              <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
              </button>
              <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
                <ul class=\"navbar-nav\">
                  <li class=\"nav-item\">
                    <a class=\"nav-link active\" aria-current=\"page\" href=\"/reservas\">Reservas</a>
                  </li>
                  <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/stock\">Stock</a>
                  </li>

                  <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/presupuesto\">Presupuesto</a>
                  </li>

                </ul>
              </div>
            </div>
          </nav>
          ";
    }

    // line 66
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  207 => 66,  181 => 42,  177 => 40,  173 => 39,  164 => 28,  160 => 27,  156 => 26,  152 => 25,  148 => 24,  144 => 23,  140 => 22,  136 => 21,  132 => 20,  128 => 19,  124 => 18,  120 => 16,  116 => 15,  110 => 12,  106 => 11,  102 => 10,  98 => 9,  93 => 8,  89 => 7,  82 => 5,  76 => 67,  74 => 66,  70 => 64,  68 => 39,  60 => 33,  58 => 15,  55 => 14,  53 => 7,  48 => 5,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "/home/augusto/Escritorio/productoraProduccion/templates/base.html.twig");
    }
}
