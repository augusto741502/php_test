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
class __TwigTemplate_6d735226509f2cbc4f179b31b5907891 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

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
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Sistema productora";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 15
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 39
    public function block_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 40
        echo "        <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
            <div class=\"container-fluid\">
              <a class=\"navbar-brand\" href=\"#\">";
        // line 42
        echo twig_escape_filter($this->env, (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 42, $this->source); })()), "html", null, true);
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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 66
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  267 => 66,  235 => 42,  231 => 40,  221 => 39,  206 => 28,  202 => 27,  198 => 26,  194 => 25,  190 => 24,  186 => 23,  182 => 22,  178 => 21,  174 => 20,  170 => 19,  166 => 18,  162 => 16,  152 => 15,  140 => 12,  136 => 11,  132 => 10,  128 => 9,  123 => 8,  113 => 7,  94 => 5,  82 => 67,  80 => 66,  76 => 64,  74 => 39,  66 => 33,  64 => 15,  61 => 14,  59 => 7,  54 => 5,  48 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Sistema productora{% endblock %}</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>\">
        {% block stylesheets %}
            <link href=\"{{ asset('/css/jquery.dataTables.min.css')}}\" rel=\"stylesheet\">
            <link href=\"{{ asset('/css/buttons.dataTables.min.css')}}\" rel=\"stylesheet\">
            <link href=\"{{ asset('/css/bootstrap.min.css')}}\" rel=\"stylesheet\">
            <link rel='stylesheet' href={{ asset('/css/jquery-ui.css') }} />
            <link rel='stylesheet' href={{ asset('/css/reserva.css') }} />
        {% endblock %}

        {% block javascripts %}

 
            <script type='text/javascript' src='{{ asset('/js/jquery-3.6.4.min.js')}}'></script>
            <script type='text/javascript' src='{{ asset('/js/jquery-ui.js')}}'></script> 
            <script type='text/javascript' src='{{ asset('/js/jquery.dataTables.min.js')}}'></script>
            <script type='text/javascript' src='{{ asset('/js/table/dataTables.buttons.min.js')}}'></script>
            <script type='text/javascript' src='{{ asset('/js/table/jszip.min.js')}}'></script>
            <script type='text/javascript' src='{{ asset('/js/table/pdfmake.min.js')}}'></script>
            <script type='text/javascript' src='{{ asset('/js/table/vfs_fonts.js')}}'></script>
            <script type='text/javascript' src='{{ asset('/js/table/buttons.html5.min.js')}}'></script>
            <script type='text/javascript' src='{{ asset('/js/table/buttons.print.min.js')}}'></script>
            <script type='text/javascript' src='{{ asset('/js/table/buttons.colVis.min.js')}}'></script>
            <script type='text/javascript' src='{{ asset('/js/bootstrap.min.js')}}'></script>
  

            
        {% endblock %}
    </head>
    <body>




        {% block menu %}
        <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
            <div class=\"container-fluid\">
              <a class=\"navbar-brand\" href=\"#\">{{ date }}</a>
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
          {% endblock %}
        </br>
    </br>
        {% block body %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/home/augusto/Escritorio/productora-app/templates/base.html.twig");
    }
}
