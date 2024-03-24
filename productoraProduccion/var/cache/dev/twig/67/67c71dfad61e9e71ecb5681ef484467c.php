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

/* pdf/index.html.twig */
class __TwigTemplate_cc774f6b35cc8e797dd56edfec5601b9 extends Template
{
    private $source;
    private $macros = [];

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
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/index.html.twig"));

        // line 1
        echo "<table width=\"550\">
    <tr>
    <td><img src=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["imageSrc"]) || array_key_exists("imageSrc", $context) ? $context["imageSrc"] : (function () { throw new RuntimeError('Variable "imageSrc" does not exist.', 3, $this->source); })()), "html", null, true);
        echo "\" width=\"200\"></td>
    <td>
    <p align=\"center\">Productora Dream Spa, Rut: 76.531.101-2
                                        Av. Almirante Latorre #752 Los Angeles, Giro: Producción de Eventos
                                        Telefono: 432-540810 Cel- 77757976, productoradream@gmail.com</p>
    </td>
    </tr>

    <tr>
    <td colspan=\"2\" align=\"center\">
    <H3>PRESUPUESTO</H3>
    </td>
    </tr>
    <tr>
    <td>FECHA:</td>
    <td>";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["fecha"]) || array_key_exists("fecha", $context) ? $context["fecha"] : (function () { throw new RuntimeError('Variable "fecha" does not exist.', 18, $this->source); })()), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td>PRESUPUESTO N°:</td>
    <td>";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["n_presupuesto"]) || array_key_exists("n_presupuesto", $context) ? $context["n_presupuesto"] : (function () { throw new RuntimeError('Variable "n_presupuesto" does not exist.', 23, $this->source); })()), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td>Para:</td>
    <td>";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["cliente"]) || array_key_exists("cliente", $context) ? $context["cliente"] : (function () { throw new RuntimeError('Variable "cliente" does not exist.', 28, $this->source); })()), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td>Correo:</td>
    <td>";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["correo"]) || array_key_exists("correo", $context) ? $context["correo"] : (function () { throw new RuntimeError('Variable "correo" does not exist.', 33, $this->source); })()), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td>Fono:</td>
    <td>";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["telefono"]) || array_key_exists("telefono", $context) ? $context["telefono"] : (function () { throw new RuntimeError('Variable "telefono" does not exist.', 38, $this->source); })()), "html", null, true);
        echo "</td>
    </tr>
    </table>
    </br>

    <table width=\"550\"> 
    <thead style=\"background:#7BCFF3\">
    <tr>
    <th style=\"font-size:12px;\">Servicio</th>
    <th style=\"font-size:12px;\">Valor</th>
    <th style=\"font-size:12px;\">Cant</th>
    <th style=\"font-size:12px;\">SubTotal</th>
    </tr>
    </thead>

    <tbody>
        ";
        // line 54
        $context["valor1"] = 0;
        // line 55
        echo "        ";
        $context["valor2"] = 0;
        // line 56
        echo "        ";
        $context["valor3"] = 0;
        // line 57
        echo "        
        ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lista"]) || array_key_exists("lista", $context) ? $context["lista"] : (function () { throw new RuntimeError('Variable "lista" does not exist.', 58, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["listas"]) {
            // line 59
            echo "
            <tr>
                <td>";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["listas"], "servicio", [], "any", false, false, false, 61), "html", null, true);
            echo "</td>
                <td align=\"right\">\$";
            // line 62
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["listas"], "valor", [], "any", false, false, false, 62), 0, ",", "."), "html", null, true);
            echo "</td>
                <td align=\"right\">";
            // line 63
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["listas"], "cantidad", [], "any", false, false, false, 63), 0, ",", "."), "html", null, true);
            echo "</td>
                <td align=\"right\">\$";
            // line 64
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["listas"], "subtotal", [], "any", false, false, false, 64), 0, ",", "."), "html", null, true);
            echo "</td>
            </tr> 
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listas'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "    
    <tr>
        <td>Produccion de evento general</td>
        <td align=\"right\" >\$";
        // line 70
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["valor1_"]) || array_key_exists("valor1_", $context) ? $context["valor1_"] : (function () { throw new RuntimeError('Variable "valor1_" does not exist.', 70, $this->source); })()), 0, ",", "."), "html", null, true);
        echo "</td>
        <td align=\"right\" >";
        // line 71
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["valor2_"]) || array_key_exists("valor2_", $context) ? $context["valor2_"] : (function () { throw new RuntimeError('Variable "valor2_" does not exist.', 71, $this->source); })()), 0, ",", "."), "html", null, true);
        echo "</td>
        <td align=\"right\">\$";
        // line 72
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["valor3_"]) || array_key_exists("valor3_", $context) ? $context["valor3_"] : (function () { throw new RuntimeError('Variable "valor3_" does not exist.', 72, $this->source); })()), 0, ",", "."), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td  colspan=\"4\" align=\"right\">NETO= \$";
        // line 76
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["valor3_"]) || array_key_exists("valor3_", $context) ? $context["valor3_"] : (function () { throw new RuntimeError('Variable "valor3_" does not exist.', 76, $this->source); })()), 0, ",", "."), "html", null, true);
        echo "</td>
    </tr>
    <tr>
    <td colspan=\"4\" align=\"right\">IVA=\$";
        // line 79
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["iva"]) || array_key_exists("iva", $context) ? $context["iva"] : (function () { throw new RuntimeError('Variable "iva" does not exist.', 79, $this->source); })()), 0, ",", "."), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td colspan=\"4\" align=\"right\">TOTAL= \$";
        // line 83
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["valoriva"]) || array_key_exists("valoriva", $context) ? $context["valoriva"] : (function () { throw new RuntimeError('Variable "valoriva" does not exist.', 83, $this->source); })()), 0, ",", "."), "html", null, true);
        echo "</td>
    </tr>

    </tbody>
    </table>

    <table>
    <tr>
    <td><p>Esperando contar con una buena acogida de su parte. Saluda Atte.</p></td>
    </tr>
    </table> 

    <table> 
    <tr>
    <td><p>Productora Dream Spa, Rut: 76.531.101-2</p></td>
    </tr>
    </table>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "pdf/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 83,  182 => 79,  176 => 76,  169 => 72,  165 => 71,  161 => 70,  156 => 67,  147 => 64,  143 => 63,  139 => 62,  135 => 61,  131 => 59,  127 => 58,  124 => 57,  121 => 56,  118 => 55,  116 => 54,  97 => 38,  89 => 33,  81 => 28,  73 => 23,  65 => 18,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<table width=\"550\">
    <tr>
    <td><img src=\"{{imageSrc}}\" width=\"200\"></td>
    <td>
    <p align=\"center\">Productora Dream Spa, Rut: 76.531.101-2
                                        Av. Almirante Latorre #752 Los Angeles, Giro: Producción de Eventos
                                        Telefono: 432-540810 Cel- 77757976, productoradream@gmail.com</p>
    </td>
    </tr>

    <tr>
    <td colspan=\"2\" align=\"center\">
    <H3>PRESUPUESTO</H3>
    </td>
    </tr>
    <tr>
    <td>FECHA:</td>
    <td>{{ fecha }}</td>
    </tr>

    <tr>
    <td>PRESUPUESTO N°:</td>
    <td>{{ n_presupuesto }}</td>
    </tr>

    <tr>
    <td>Para:</td>
    <td>{{cliente}}</td>
    </tr>

    <tr>
    <td>Correo:</td>
    <td>{{correo}}</td>
    </tr>

    <tr>
    <td>Fono:</td>
    <td>{{telefono}}</td>
    </tr>
    </table>
    </br>

    <table width=\"550\"> 
    <thead style=\"background:#7BCFF3\">
    <tr>
    <th style=\"font-size:12px;\">Servicio</th>
    <th style=\"font-size:12px;\">Valor</th>
    <th style=\"font-size:12px;\">Cant</th>
    <th style=\"font-size:12px;\">SubTotal</th>
    </tr>
    </thead>

    <tbody>
        {% set valor1 = 0 %}
        {% set valor2 = 0 %}
        {% set valor3 = 0 %}
        
        {% for listas in lista %}

            <tr>
                <td>{{ listas.servicio }}</td>
                <td align=\"right\">\${{ listas.valor|number_format(0, ',', '.') }}</td>
                <td align=\"right\">{{ listas.cantidad|number_format(0, ',', '.') }}</td>
                <td align=\"right\">\${{ listas.subtotal|number_format(0, ',', '.') }}</td>
            </tr> 
        {% endfor %}
    
    <tr>
        <td>Produccion de evento general</td>
        <td align=\"right\" >\${{valor1_|number_format(0, ',', '.')}}</td>
        <td align=\"right\" >{{valor2_|number_format(0, ',', '.')}}</td>
        <td align=\"right\">\${{valor3_|number_format(0, ',', '.')}}</td>
    </tr>

    <tr>
    <td  colspan=\"4\" align=\"right\">NETO= \${{valor3_|number_format(0, ',', '.')}}</td>
    </tr>
    <tr>
    <td colspan=\"4\" align=\"right\">IVA=\${{iva|number_format(0, ',', '.')}}</td>
    </tr>

    <tr>
    <td colspan=\"4\" align=\"right\">TOTAL= \${{valoriva|number_format(0, ',', '.')}}</td>
    </tr>

    </tbody>
    </table>

    <table>
    <tr>
    <td><p>Esperando contar con una buena acogida de su parte. Saluda Atte.</p></td>
    </tr>
    </table> 

    <table> 
    <tr>
    <td><p>Productora Dream Spa, Rut: 76.531.101-2</p></td>
    </tr>
    </table>
", "pdf/index.html.twig", "/home/augusto/Escritorio/productora-app/templates/pdf/index.html.twig");
    }
}
