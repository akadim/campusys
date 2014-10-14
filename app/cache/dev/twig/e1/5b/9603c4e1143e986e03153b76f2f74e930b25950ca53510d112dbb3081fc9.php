<?php

/* ::admin.html.twig */
class __TwigTemplate_e15b9603c4e1143e986e03153b76f2f74e930b25950ca53510d112dbb3081fc9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
<!DOCTYPE html>
<!--[if lt IE 7]> <html class=\"lt-ie9 lt-ie8 lt-ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 7]>    <html class=\"lt-ie9 lt-ie8\" lang=\"en\"> <![endif]-->
<!--[if IE 8]>    <html class=\"lt-ie9\" lang=\"en\"> <![endif]-->

<!--[if gt IE 8]><!--><html lang=\"en\"><!--<![endif]-->
    <head>
        <meta charset=\"utf-8\">

        <!-- Viewport Metatag -->
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1.0\">

        <!-- Plugin Stylesheets first to ease overrides -->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/colorpicker/colorpicker.css"), "html", null, true);
        echo "\" media=\"screen\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/custom-plugins/picklist/picklist.css"), "html", null, true);
        echo "\" media=\"screen\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/select2/select2.css"), "html", null, true);
        echo "\" media=\"screen\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/ibutton/jquery.ibutton.css"), "html", null, true);
        echo "\" media=\"screen\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/cleditor/jquery.cleditor.css"), "html", null, true);
        echo "\" media=\"screen\">

        <!-- Required Stylesheets -->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" media=\"screen\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/css/fonts/ptsans/stylesheet.css"), "html", null, true);
        echo "\" media=\"screen\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/css/fonts/icomoon/style.css"), "html", null, true);
        echo "\" media=\"screen\">

        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/css/mws-style.css"), "html", null, true);
        echo "\" media=\"screen\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/css/icons/icol16.css"), "html", null, true);
        echo "\" media=\"screen\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/css/icons/icol32.css"), "html", null, true);
        echo "\" media=\"screen\">

        <!-- Demo Stylesheet -->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/css/demo.css"), "html", null, true);
        echo "\" media=\"screen\">

        <!-- jQuery-UI Stylesheet -->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/jui/css/jquery.ui.all.css"), "html", null, true);
        echo "\" media=\"screen\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/jui/jquery-ui.custom.css"), "html", null, true);
        echo "\" media=\"screen\">

        <!-- Theme Stylesheet -->
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/css/mws-theme.css"), "html", null, true);
        echo "\" media=\"screen\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/css/themer.css"), "html", null, true);
        echo "\" media=\"screen\">

        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/css/itcertif.css"), "html", null, true);
        echo "\" media=\"screen\">

        <title>";
        // line 44
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    </head>

    <body>


        <!-- Header -->
        <div id=\"mws-header\" class=\"clearfix\">

            <!-- Logo Container -->
            <div id=\"mws-logo-container\">

                <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
                <div id=\"mws-logo-wrap\">
                    <img src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/images/campusys-logo.png"), "html", null, true);
        echo "\" alt=\"mws admin\">
                </div>
            </div>

            <!-- User Tools (notifications, logout, profile, change password) -->
            <div id=\"mws-user-tools\" class=\"clearfix\">

                <!-- Notifications -->
                <div id=\"mws-user-notif\" class=\"mws-dropdown-menu\">
                    <a href=\"#\" data-toggle=\"dropdown\" class=\"mws-dropdown-trigger\"><i class=\"icon-exclamation-sign\"></i></a>

                    <!-- Unread notification count -->
                    <span class=\"mws-dropdown-notif\">35</span>

                    <!-- Notifications dropdown -->
                    <div class=\"mws-dropdown-box\">
                        <div class=\"mws-dropdown-content\">
                            <ul class=\"mws-notifications\">
                                <li class=\"read\">
                                    <a href=\"#\">
                                        <span class=\"message\">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                        <span class=\"time\">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class=\"read\">
                                    <a href=\"#\">
                                        <span class=\"message\">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class=\"time\">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class=\"unread\">
                                    <a href=\"#\">
                                        <span class=\"message\">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class=\"time\">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class=\"unread\">
                                    <a href=\"#\">
                                        <span class=\"message\">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class=\"time\">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class=\"mws-dropdown-viewall\">
                                <a href=\"#\">View All Notifications</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Messages -->
                <div id=\"mws-user-message\" class=\"mws-dropdown-menu\">
                    <a href=\"#\" data-toggle=\"dropdown\" class=\"mws-dropdown-trigger\"><i class=\"icon-envelope\"></i></a>

                    <!-- Unred messages count -->
                    <span class=\"mws-dropdown-notif\">35</span>

                    <!-- Messages dropdown -->
                    <div class=\"mws-dropdown-box\">
                        <div class=\"mws-dropdown-content\">
                            <ul class=\"mws-messages\">
                                <li class=\"read\">
                                    <a href=\"#\">
                                        <span class=\"sender\">John Doe</span>
                                        <span class=\"message\">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                        <span class=\"time\">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class=\"read\">
                                    <a href=\"#\">
                                        <span class=\"sender\">John Doe</span>
                                        <span class=\"message\">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class=\"time\">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class=\"unread\">
                                    <a href=\"#\">
                                        <span class=\"sender\">John Doe</span>
                                        <span class=\"message\">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class=\"time\">
                                            January 21, 2012
                                        </span>
                                    </a>
                                </li>
                                <li class=\"unread\">
                                    <a href=\"#\">
                                        <span class=\"sender\">John Doe</span>
                                        <span class=\"message\">
                                            Lorem ipsum dolor sit amet
                                        </span>
                                        <span class=\"time\">
                                        ";
        // line 176
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y"), "html", null, true);
        echo "
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class=\"mws-dropdown-viewall\">
                                <a href=\"#\">View All Messages</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Information and functions section -->
                <div id=\"mws-user-info\" class=\"mws-inset\">

                    <!-- User Photo -->
                    <div id=\"mws-user-photo\">
                        <img src=\"example/profile.jpg\" alt=\"User Photo\">
                    </div>

                    <!-- Username and Functions -->
                    <div id=\"mws-user-functions\">
                        <div id=\"mws-username\">
                            Bonjour, John Doe
                        </div>
                        <ul>
                            <li><a href=\"#\">Profile</a></li>
                            <li><a href=\"#\">Changer le mot de passe</a></li>
                            <li><a href=\"#\">D&eacute;connexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Main Wrapper -->
        <div id=\"mws-wrapper\">

            <!-- Necessary markup, do not remove -->
            <div id=\"mws-sidebar-stitch\"></div>
            <div id=\"mws-sidebar-bg\"></div>

            <!-- Sidebar Wrapper -->
            <div id=\"mws-sidebar\">

                <!-- Hidden Nav Collapse Button -->
                <div id=\"mws-nav-collapse\">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <!-- Searchbox -->
                <div id=\"mws-searchbox\" class=\"mws-inset\">
                    <form action=\"typography.html\">
                        <input type=\"text\" class=\"mws-search-input\" placeholder=\"Search...\">
                        <button type=\"submit\" class=\"mws-search-submit\"><i class=\"icon-search\"></i></button>
                    </form>
                </div>

                <!-- Main Navigation -->
                <div id=\"mws-navigation\">
                    <ul>
                        <li>
                            <a href=\"#\"><i class=\"icon-home\"></i> Universit&eacute;</a>
                            <ul>
                                <li><a href=\"";
        // line 242
        echo $this->env->getExtension('routing')->getPath("campusys_universities_list");
        echo "\">Universit&eacute;s</a></li>
                                <li><a href=\"";
        // line 243
        echo $this->env->getExtension('routing')->getPath("campusys_campuses_list");
        echo "\">&Eacute;coles/Facult&eacute;</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"icon-home\"></i> P&eacute;dagogique</a>
                            <ul>
                                <li><a href=\"#\">Fili&egrave;res</a></li>
                                <li><a href=\"#\">Modules</a></li>
                                <li><a href=\"#\">Cours</a></li>
                                <li><a href=\"#\">Programmes</a></li>
                                <li><a href=\"#\">Absences</a></li>
                                <li><a href=\"#\">Salles</a></li>
                                <li><a href=\"#\">Groupes</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href=\"files.html\"><i class=\"icon-folder-closed\"></i> Ressource Humaine</a>
                            <ul>
                                <li><a href=\"#\">Personnel Administratifs</a></li>
                                <li><a href=\"#\">&Eacute;tudiants</a></li>
                                <li><a href=\"#\">Professeurs</a></li>
                                <li><a href=\"#\">Comptables</a></li>
                                <li></li>
                            </ul>
                        </li>
                        <li>
                            <a href=\"files.html\"><i class=\"icon-folder-closed\"></i> Examens</a>
                            <ul>
                                <li><a href=\"#\">Tests</a></li>
                                <li><a href=\"#\">Questions</a></li>
                                <li><a href=\"#\">R&eacute;sultats</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href=\"files.html\"><i class=\"icon-folder-closed\"></i> Statistiques</a>
                            <ul>
                                <li><a href=\"#\">Stats des notes</a></li>
                                <li><a href=\"#\">Stats des inscriptions</a></li>
                                <li><a href=\"#\">Statistique p&eacute;dagogique</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href=\"#\"><i class=\"icon-pictures\"></i> Gallery</a>
                        </li>

                        <li>
                            <a href=\"widgets.html\"><i class=\"icon-cogs\"></i> Configuration</a>
                            <ul>
                                <li><a href=\"#\">Emploi du temps</a></li>
                                <li><a href=\"#\">Param&egrave;tres globales</a></li>
                                <li><a href=\"#\">Ville</a></li>
                                <li><a href=\"#\">&Eacute;venement</a></li>
                                <li><a href=\"form_layouts.html\">Journal</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>         
            </div>

            <!-- Main Container Start -->
            <div id=\"mws-container\" class=\"clearfix\">

                <!-- Inner Container Start -->
                <div class=\"container\">


                    <!-- Panels Start -->



                  ";
        // line 314
        $this->displayBlock('body', $context, $blocks);
        // line 316
        echo "

                    <!-- Panels End -->
                </div>
                <!-- Inner Container End -->

                <!-- Footer -->
                <div id=\"mws-footer\">
                    Copyright Campusys ";
        // line 324
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo ". All Rights Reserved.
                </div>

            </div>
            <!-- Main Container End -->

        </div>
        <!-- JavaScript Plugins -->
        <script src=\"";
        // line 332
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/js/libs/jquery-1.8.3.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 333
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/js/libs/jquery.mousewheel.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 334
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/js/libs/jquery.placeholder.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 335
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/custom-plugins/fileinput.js"), "html", null, true);
        echo "\"></script>

        <!-- jQuery-UI Dependent Scripts -->
        <script src=\"";
        // line 338
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/jui/js/jquery-ui-1.9.2.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 339
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/jui/jquery-ui.custom.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 340
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/jui/js/jquery.ui.touch-punch.js"), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 342
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/jui/js/globalize/globalize.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 343
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/jui/js/globalize/cultures/globalize.culture.en-US.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 344
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/jui/js/timepicker/jquery-ui-timepicker.min.js"), "html", null, true);
        echo "\"></script>

        <!-- Plugin Scripts -->
        <script src=\"";
        // line 347
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/custom-plugins/picklist/picklist.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 348
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/autosize/jquery.autosize.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 349
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/select2/select2.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 350
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/colorpicker/colorpicker-min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 351
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/validate/jquery.validate-min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 352
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/ibutton/jquery.ibutton.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 353
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/cleditor/jquery.cleditor.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 354
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/cleditor/jquery.cleditor.table.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 355
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/cleditor/jquery.cleditor.xhtml.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 356
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/cleditor/jquery.cleditor.icon.min.js"), "html", null, true);
        echo "\"></script>
        <script type=\"text/javascript\" src=\"";
        // line 357
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/plugins/datatables/jquery.dataTables.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 358
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/js/demo/demo.table.js"), "html", null, true);
        echo "\"></script>

        <!-- Core Script -->
        <script src=\"";
        // line 361
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 362
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/js/core/mws.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 363
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/js/campusys.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 364
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/js/contextmenu/taphold.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 365
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("backend/js/contextmenu/jquery.ui-contextmenu.min.js"), "html", null, true);
        echo "\"></script>  
        <script>
            function viewElement(id) {
                id = id.substring(5);
                \$.get(\"view/\" + id, function(response) {
                    \$('#mws-jui-dialog').html(response);
                    \$('#mws-jui-dialog').attr(\"title\", \"Information\");
                    \$(\"#mws-jui-dialog\").dialog({
                        modal: true,
                        width: \"640\",
                        dialogClass: 'dlgfixed',
                        position: \"center\"

                    }).dialog(\"open\");

                });

                return false;
            }


            function cellEdit(id) {
                var classes = \$(\".\" + id).attr('class').trim().split(\" \");
                var currentVal = \$(\".\" + id).text();


                /* décomposition de la classe en 3 variables (type de champs, column, identifiant) */
                var variableCompose = classes[1];
                var type_champs = variableCompose.substring(0, 5);
                variableCompose = classes[1].substring(6);
                var column = variableCompose.substring(0, variableCompose.indexOf(\"_\"));
                var identifiant = variableCompose.substring(variableCompose.indexOf(\"_\") + 1, variableCompose.length);
                /*-------------------------------------------------------------*/

                var contenu_td = \"\";
                if (type_champs === \"texte\")
                {
                    contenu_td = \"<input type='text' id ='txtEditing' value='\" + currentVal + \"'>\";
                }
                else
                {

                    \$.ajax({
                        url: 'combo_categories',
                        success: function(response) {
                            contenu_td = response;
                        },
                        async: false
                    });
                }
                \$(\".\" + id).html(contenu_td);

                \$(\".\" + id).children().first().focus();


                \$(\".\" + id).children().first().keypress(function(e) {
                    if (e.which === 13)
                    {
                        validate_cell_edit(currentVal, type_champs, column, identifiant);
                    }
                });

                \$(\".\" + id).children().first().blur(function(e) {
                    validate_cell_edit(currentVal, type_champs, column, identifiant);
                });
            }

            function activeChange(form_id)
            {
                \$.get(\"active/\" + form_id, function(response) {
                    response = parseInt(response);
                    if (response == \"0\")
                    {
                        \$(\"#active_formation_\" + form_id).attr('class', 'badge badge-important');
                        \$(\"#active_formation_\" + form_id).html('Non');
                    }
                    else
                    {
                        \$(\"#active_formation_\" + form_id).attr('class', 'badge badge-info');
                        \$(\"#active_formation_\" + form_id).html('Oui');
                    }
                });

                return false;
            }

            function deleteVille(ville_id)
            {
                var url = \"delete/\" + ville_id;
                \$.get(url, function(response) {
                    \$('#ville_listing').html(response);
                });
                return false;
            }

            function deleteImage(image_id)
            {
                var url = \"gallery/delete/\" + image_id;
                \$.get(url, function(response) {
                    \$('#picture_elements').html(response);
                });
                return false;
            }


        </script>
    </body>
</html>";
    }

    // line 44
    public function block_title($context, array $blocks = array())
    {
        echo "Campusys Admin";
    }

    // line 314
    public function block_body($context, array $blocks = array())
    {
        // line 315
        echo "                  ";
    }

    public function getTemplateName()
    {
        return "::admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  656 => 315,  653 => 314,  647 => 44,  535 => 365,  531 => 364,  527 => 363,  523 => 362,  519 => 361,  513 => 358,  509 => 357,  505 => 356,  501 => 355,  497 => 354,  493 => 353,  489 => 352,  485 => 351,  481 => 350,  477 => 349,  473 => 348,  469 => 347,  463 => 344,  459 => 343,  455 => 342,  450 => 340,  446 => 339,  442 => 338,  436 => 335,  432 => 334,  428 => 333,  424 => 332,  413 => 324,  403 => 316,  401 => 314,  327 => 243,  323 => 242,  254 => 176,  116 => 44,  111 => 42,  106 => 40,  96 => 36,  92 => 35,  86 => 32,  80 => 29,  76 => 28,  72 => 27,  67 => 25,  63 => 24,  53 => 20,  45 => 18,  41 => 17,  37 => 16,  21 => 2,  177 => 68,  166 => 64,  162 => 63,  158 => 62,  152 => 58,  146 => 56,  140 => 54,  138 => 53,  134 => 59,  127 => 50,  121 => 49,  115 => 48,  109 => 47,  105 => 46,  102 => 39,  98 => 44,  73 => 22,  62 => 14,  59 => 23,  49 => 19,  46 => 8,  42 => 7,  39 => 6,  36 => 5,  29 => 3,);
    }
}
