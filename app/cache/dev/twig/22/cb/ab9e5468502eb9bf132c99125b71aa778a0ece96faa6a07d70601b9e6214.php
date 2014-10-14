<?php

/* campusysPedagogieBundle:Backend/University:list_universities.html.twig */
class __TwigTemplate_22cbab9e5468502eb9bf132c99125b71aa778a0ece96faa6a07d70601b9e6214 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::admin.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Universit&eacute;";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "       <div class=\"alert alert-info\">
       ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashBag"), "get", array(0 => "info"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 8
            echo "        <div class=\"mws-form-message success\">
          ";
            // line 9
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
          <i class=\"ui-icon ui-icon-closethick\" style=\"float: right;\" onclick=\"\$('.mws-form-message').slideUp();\"></i>
        </div>
       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </div>
      <form id=\"form_univ_table\" action=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("campusys_university_delete_selection");
        echo "\" method=\"post\">
         <div class=\"mws-panel grid_8\">
                \t<div class=\"mws-panel-header\">
                    \t<span><i class=\"icon-table\"></i> Liste des universit&eacute;s</span>
                    </div>
                    <div class=\"mws-panel-toolbar\">
                        <div class=\"btn-toolbar\">
                            <div class=\"btn-group\">
                                <a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campusys_university_edit", array("id" => (-1))), "html", null, true);
        echo "\" class=\"btn\"><i class=\"icol-add\"></i> Ajouter</a>
                                <a href=\"#\" class=\"btn checkAll\"><i class=\"icol-accept\"></i> Tout cocher</a>
                                <a href=\"#\" class=\"btn uncheckAll\"><i class=\"icol-delete\"></i> Tout d&eacute;cocher</a>
                                <button class=\"btn btn_delete_all\" type=\"submit\" onclick=\"if(!confirm('Vous êtes sure de vouloir supprimer la(les) lignes sélectionnées?')) { return false; }\"><i class=\"icol-cross\"></i> Supprimer</button>
                            </div>
                        </div>
                    </div>
                    <div class=\"mws-panel-body no-padding\">
                        <table class=\"mws-datatable mws-table\">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Date de cr&eacute;ation</th>
                                    <th>Nom de pr&eacute;sident</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id=\"frm_table\">
                            ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["universities"]) ? $context["universities"] : $this->getContext($context, "universities")));
        foreach ($context['_seq'] as $context["_key"] => $context["university"]) {
            // line 44
            echo "                                <tr>
                                    <td><input type=\"checkbox\" id=\"check_form\" class=\"check_frm_select\" value=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"), "html", null, true);
            echo "\"/></td>
                                    <td class=\"cell_edit texte_name_";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "name"), "html", null, true);
            echo "</td>
                                    <td class=\"cell_edit texte_address_";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "address"), "html", null, true);
            echo "</td>
                                    <td class=\"combo_created_";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "created"), "d/m/Y"), "html", null, true);
            echo "</td>
                                    <td class=\"cell_edit texte_presidentName_";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "presidentName"), "html", null, true);
            echo "</td>
                                    <td>
                                      <a id=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"), "html", null, true);
            echo "\" class=\"active_formation_link\" href=\"#\">
                                       ";
            // line 52
            if (($this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "active") == true)) {
                // line 53
                echo "                                          <span id =\"active_formation_";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"), "html", null, true);
                echo "\" class=\"badge badge-info\">Oui</span>
                                       ";
            } else {
                // line 55
                echo "                                          <span id =\"active_formation_";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"), "html", null, true);
                echo "\" class=\"badge badge-important\">Non</span>
                                       ";
            }
            // line 57
            echo "                                      </a>
                                    </td>
                                    <td>
                                        <span class=\"btn-group\">
                                            <a href=\"\" id=\"view_";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"), "html", null, true);
            echo "\" class=\"mws-jui-dialog-mdl-btn view_element btn btn-small\"><i class=\"icon-search\"></i></a>
                                            <a href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campusys_university_edit", array("id" => $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"))), "html", null, true);
            echo "\" class=\"btn btn-small\"><i class=\"icon-pencil\"></i></a>
                                            <a href=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("campusys_university_delete", array("id" => $this->getAttribute((isset($context["university"]) ? $context["university"] : $this->getContext($context, "university")), "id"))), "html", null, true);
            echo "\" class=\"btn btn-small confirm_delete\" onclick=\"if(!confirm('Vous êtes sure de vouloir supprimer cette ligne?')) { return false; }\"><i class=\"icon-trash\"></i></a>
                                        </span>
                                    </td>
                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['university'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "                 
                            </tbody>
                        </table>
                    </div>
                </div>
               <input type=\"hidden\" name=\"row_selected\" id=\"row_selected\" value=\"\"/>
            </form>
            <div id=\"mws-jui-dialog\">
  
            </div> 
";
    }

    public function getTemplateName()
    {
        return "campusysPedagogieBundle:Backend/University:list_universities.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 67,  165 => 63,  161 => 62,  157 => 61,  151 => 57,  145 => 55,  139 => 53,  137 => 52,  133 => 51,  126 => 49,  120 => 48,  114 => 47,  108 => 46,  104 => 45,  101 => 44,  97 => 43,  73 => 22,  62 => 14,  59 => 13,  49 => 9,  46 => 8,  42 => 7,  39 => 6,  36 => 5,  29 => 3,);
    }
}
