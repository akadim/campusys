<?php

/* campusysPedagogieBundle:Backend/Filiere:edit_filiere.html.twig */
class __TwigTemplate_8528e791741e86f8df2ff710db68348649e107f4fac40971302c3e5180eae4e7 extends Twig_Template
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Fili&egrave;re";
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "
    <div class=\"mws-panel grid_8\">
        <div class=\"mws-panel-header\">
            <span><i class=\"icon-ok\"> Ajout/Modification d'une filière</i></span>
        </div>
        <div class=\"mws-panel-body no-padding\">
            <form id=\"mws-validate\" class=\"mws-form\" ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo " method=\"post\">
                ";
        // line 14
        if ((twig_length_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors"))) > 0)) {
            // line 15
            echo "                    <div id=\"mws-validate-error\" class=\"mws-form-message error\" style=\"";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "}\">
                        Votre saisie n'est pas valide: 
                        <ul>
                            ";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 19
                echo "                                <li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message"), "html", null, true);
                echo "</li>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "                        </ul>
                    </div>
                ";
        }
        // line 24
        echo "                <div class=\"mws-form-inline\">
                    <div class=\"mws-form-row\">
                        ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'label', array("label_attr" => array("class" => "mws-form-label"), "label" => "Nom"));
        echo "
                        <div class=\"mws-form-item\">
                            ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'widget', array("attr" => array("class" => "required large")));
        echo "
                        </div>
                    </div>
                    <div class=\"mws-form-row\">
                        ";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'label', array("label_attr" => array("class" => "mws-form-label"), "label" => "Description"));
        echo "
                        <div class=\"mws-form-item\">
                            ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description"), 'widget', array("attr" => array("class" => "large cleditor")));
        echo "
                        </div>
                    </div>
                    <div class=\"mws-form-row\">
                        ";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "campus"), 'label', array("label_attr" => array("class" => "mws-form-label"), "label" => "Campus"));
        echo "
                        <div class=\"mws-form-item\">
                            ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "campus"), 'widget', array("attr" => array("class" => "required large")));
        echo "
                        </div>
                    </div>    
                    <div class=\"mws-form-row\">
                        ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "active"), 'label', array("label_attr" => array("class" => "mws-form-label"), "label" => "Active ?"));
        echo "
                        <div class=\"mws-form-item\">
                            ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "active"), 'widget');
        echo "
                        </div>
                    </div>
                    ";
        // line 49
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                    <div class=\"mws-button-row\">
                        <input type=\"submit\" value=\"Valider\" class=\"btn btn-danger\">
                    </div>
                </div>
            </form>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "campusysPedagogieBundle:Backend/Filiere:edit_filiere.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 49,  123 => 46,  118 => 44,  111 => 40,  106 => 38,  99 => 34,  94 => 32,  87 => 28,  82 => 26,  78 => 24,  73 => 21,  64 => 19,  60 => 18,  53 => 15,  51 => 14,  47 => 13,  39 => 7,  36 => 6,  29 => 4,);
    }
}
