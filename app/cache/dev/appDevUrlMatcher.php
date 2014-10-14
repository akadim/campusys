<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // campusys_pedagogie_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_pedagogie_homepage')), array (  '_controller' => 'campusysPedagogieBundle:Default:index',));
        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/universit')) {
                // campusys_universities_list
                if (rtrim($pathinfo, '/') === '/admin/universities') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'campusys_universities_list');
                    }

                    return array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\UniversityController::admin_indexAction',  '_route' => 'campusys_universities_list',);
                }

                // campusys_university_edit
                if (0 === strpos($pathinfo, '/admin/university/edit') && preg_match('#^/admin/university/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_university_edit')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\UniversityController::admin_editAction',));
                }

                if (0 === strpos($pathinfo, '/admin/universities')) {
                    // campusys_university_edit_column
                    if (0 === strpos($pathinfo, '/admin/universities/editColumn') && preg_match('#^/admin/universities/editColumn/(?P<column>[^/]++)/(?P<value>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_university_edit_column')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\UniversityController::admin_edit_columnAction',));
                    }

                    // campusys_university_view
                    if (0 === strpos($pathinfo, '/admin/universities/view') && preg_match('#^/admin/universities/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_university_view')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\UniversityController::admin_viewAction',));
                    }

                }

                // campusys_university_delete
                if (0 === strpos($pathinfo, '/admin/university/delete') && preg_match('#^/admin/university/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_university_delete')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\UniversityController::admin_deleteAction',));
                }

                // campusys_university_active
                if (0 === strpos($pathinfo, '/admin/universities/active') && preg_match('#^/admin/universities/active/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_university_active')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\UniversityController::admin_activeAction',));
                }

                // campusys_university_delete_selection
                if ($pathinfo === '/admin/university/deleteSelection') {
                    return array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\UniversityController::admin_delete_selectionAction',  '_route' => 'campusys_university_delete_selection',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/campus')) {
                // campusys_campuses_list
                if (rtrim($pathinfo, '/') === '/admin/campus') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'campusys_campuses_list');
                    }

                    return array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\CampusController::admin_indexAction',  '_route' => 'campusys_campuses_list',);
                }

                if (0 === strpos($pathinfo, '/admin/campus/edit')) {
                    // campusys_campus_edit
                    if (preg_match('#^/admin/campus/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_campus_edit')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\CampusController::admin_editAction',));
                    }

                    // campusys_campus_edit_column
                    if (0 === strpos($pathinfo, '/admin/campus/editColumn') && preg_match('#^/admin/campus/editColumn/(?P<column>[^/]++)/(?P<value>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_campus_edit_column')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\CampusController::admin_edit_columnAction',));
                    }

                }

                // campusys_campus_view
                if (0 === strpos($pathinfo, '/admin/campus/view') && preg_match('#^/admin/campus/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_campus_view')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\CampusController::admin_viewAction',));
                }

                // campusys_campus_delete
                if (0 === strpos($pathinfo, '/admin/campus/delete') && preg_match('#^/admin/campus/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_campus_delete')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\CampusController::admin_deleteAction',));
                }

                // campusys_campus_active
                if (0 === strpos($pathinfo, '/admin/campus/active') && preg_match('#^/admin/campus/active/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_campus_active')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\CampusController::admin_activeAction',));
                }

                // campusys_campus_delete_selection
                if ($pathinfo === '/admin/campus/deleteSelection') {
                    return array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\CampusController::admin_delete_selectionAction',  '_route' => 'campusys_campus_delete_selection',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/filiere')) {
                // campusys_filieres_list
                if (rtrim($pathinfo, '/') === '/admin/filiere') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'campusys_filieres_list');
                    }

                    return array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\FiliereController::admin_indexAction',  '_route' => 'campusys_filieres_list',);
                }

                if (0 === strpos($pathinfo, '/admin/filiere/edit')) {
                    // campusys_filiere_edit
                    if (preg_match('#^/admin/filiere/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_filiere_edit')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\FiliereController::admin_editAction',));
                    }

                    // campusys_filiere_edit_column
                    if (0 === strpos($pathinfo, '/admin/filiere/editColumn') && preg_match('#^/admin/filiere/editColumn/(?P<column>[^/]++)/(?P<value>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_filiere_edit_column')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\FiliereController::admin_edit_columnAction',));
                    }

                }

                // campusys_filiere_view
                if (0 === strpos($pathinfo, '/admin/filiere/view') && preg_match('#^/admin/filiere/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_filiere_view')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\FiliereController::admin_viewAction',));
                }

                // campusys_filiere_delete
                if (0 === strpos($pathinfo, '/admin/filiere/delete') && preg_match('#^/admin/filiere/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_filiere_delete')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\FiliereController::admin_deleteAction',));
                }

                // campusys_filiere_active
                if (0 === strpos($pathinfo, '/admin/filiere/active') && preg_match('#^/admin/filiere/active/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'campusys_filiere_active')), array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\FiliereController::admin_activeAction',));
                }

                // campusys_filiere_delete_selection
                if ($pathinfo === '/admin/filiere/deleteSelection') {
                    return array (  '_controller' => 'campusys\\PedagogieBundle\\Controller\\FiliereController::admin_delete_selectionAction',  '_route' => 'campusys_filiere_delete_selection',);
                }

            }

        }

        // campusys_home_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'campusys_home_homepage');
            }

            return array (  '_controller' => 'campusys\\HomeBundle\\Controller\\HomeController::indexAction',  '_route' => 'campusys_home_homepage',);
        }

        // campusys_home_admin_homepage
        if ($pathinfo === '/admin') {
            return array (  '_controller' => 'campusys\\HomeBundle\\Controller\\HomeController::admin_indexAction',  '_route' => 'campusys_home_admin_homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
