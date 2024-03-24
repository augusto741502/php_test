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
class __TwigTemplate_fce7d0be18d398c644a422bc5c8010cd extends Template
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
        // line 1
        echo "<table width=\"550\">
    <tr>
    <td><img src=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["imageSrc"] ?? null), "html", null, true);
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
        echo twig_escape_filter($this->env, ($context["fecha"] ?? null), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td>PRESUPUESTO N°:</td>
    <td>";
        // line 23
        echo twig_escape_filter($this->env, ($context["n_presupuesto"] ?? null), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td>Para:</td>
    <td>";
        // line 28
        echo twig_escape_filter($this->env, ($context["cliente"] ?? null), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td>Correo:</td>
    <td>";
        // line 33
        echo twig_escape_filter($this->env, ($context["correo"] ?? null), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td>Fono:</td>
    <td>";
        // line 38
        echo twig_escape_filter($this->env, ($context["telefono"] ?? null), "html", null, true);
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
        $context['_seq'] = twig_ensure_traversable(($context["lista"] ?? null));
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
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["valor1_"] ?? null), 0, ",", "."), "html", null, true);
        echo "</td>
        <td align=\"right\" >";
        // line 71
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["valor2_"] ?? null), 0, ",", "."), "html", null, true);
        echo "</td>
        <td align=\"right\">\$";
        // line 72
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["valor3_"] ?? null), 0, ",", "."), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td  colspan=\"4\" align=\"right\">NETO= \$";
        // line 76
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["valor3_"] ?? null), 0, ",", "."), "html", null, true);
        echo "</td>
    </tr>
    <tr>
    <td colspan=\"4\" align=\"right\">IVA=\$";
        // line 79
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["iva"] ?? null), 0, ",", "."), "html", null, true);
        echo "</td>
    </tr>

    <tr>
    <td colspan=\"4\" align=\"right\">TOTAL= \$";
        // line 83
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["valoriva"] ?? null), 0, ",", "."), "html", null, true);
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
        return array (  183 => 83,  176 => 79,  170 => 76,  163 => 72,  159 => 71,  155 => 70,  150 => 67,  141 => 64,  137 => 63,  133 => 62,  129 => 61,  125 => 59,  121 => 58,  118 => 57,  115 => 56,  112 => 55,  110 => 54,  91 => 38,  83 => 33,  75 => 28,  67 => 23,  59 => 18,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pdf/index.html.twig", "/home/augusto/Escritorio/productoraProduccion/templates/pdf/index.html.twig");
    }
}
