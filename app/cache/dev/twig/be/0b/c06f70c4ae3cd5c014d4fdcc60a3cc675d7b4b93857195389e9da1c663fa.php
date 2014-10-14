<?php

/* campusysPedagogieBundle:Backend/Campus:info_campus.html.twig */
class __TwigTemplate_be0bc06f70c4ae3cd5c014d4fdcc60a3cc675d7b4b93857195389e9da1c663fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<center>
    <img src=\"../../../uploads/campuses/";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["campus"]) ? $context["campus"] : $this->getContext($context, "campus")), "logo"), "html", null, true);
        echo "\" alt=\"profil\" style=\"width: 300px; height: 200px;\"/>
</center>
<ul class=\"mws-summary clearfix\">
    <li>
        <span class=\"key\"><i class=\"icon-support\"></i> Nom</span>
        <span class=\"val\">
            <span class=\"text-nowrap\">";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["campus"]) ? $context["campus"] : $this->getContext($context, "campus")), "name"), "html", null, true);
        echo "</span>
        </span>
    </li>
    <li>
        <span class=\"key\"><i class=\"icon-certificate\"></i> Adresse</span>
        <span class=\"val\">
            <span class=\"text-nowrap\">";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["campus"]) ? $context["campus"] : $this->getContext($context, "campus")), "address"), "html", null, true);
        echo "</span>
        </span>
    </li>
    <li>
        <span class=\"key\"><i class=\"icon-certificate\"></i> Slogan</span>
        <span class=\"val\">
            <span class=\"text-nowrap\">";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["campus"]) ? $context["campus"] : $this->getContext($context, "campus")), "slogan"), "html", null, true);
        echo "</span>
        </span>
    </li>
    <li>
        <span class=\"key\"><i class=\"icon-certificate\"></i> Description</span>
        <span class=\"val\">
            <span class=\"text-nowrap\">";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["campus"]) ? $context["campus"] : $this->getContext($context, "campus")), "description"), "html", null, true);
        echo "</span>
        </span>
    </li>
    <li>
        <span class=\"key\"><i class=\"icon-certificate\"></i> Nom du doyen</span>
        <span class=\"val\">
            <span class=\"text-nowrap\">";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["campus"]) ? $context["campus"] : $this->getContext($context, "campus")), "deanName"), "html", null, true);
        echo "</span>
        </span>
    </li>
    <li>
        <span class=\"key\"><i class=\"icon-certificate\"></i> Date de cr&eacute;ation</span>
        <span class=\"val\">
            <span class=\"text-nowrap\">";
        // line 39
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["campus"]) ? $context["campus"] : $this->getContext($context, "campus")), "created"), "d/m/Y"), "html", null, true);
        echo "</span>
        </span>
    </li>
</ul>";
    }

    public function getTemplateName()
    {
        return "campusysPedagogieBundle:Backend/Campus:info_campus.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 39,  67 => 33,  58 => 27,  49 => 21,  40 => 15,  31 => 9,  22 => 3,  19 => 2,);
    }
}
