<?php

namespace campusys\PedagogieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use campusys\PedagogieBundle\Form\ModuleType;
use campusys\PedagogieBundle\Entity\Module;

class ModuleController extends Controller
{
    public function admin_indexAction()
    {
    	// Get all the modules using doctrine
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->createQuery("SELECT u FROM campusysPedagogieBundle:Module u");
    	$modules = $query->getResult();
        return $this->render('campusysPedagogieBundle:Backend/Module:list_modules.html.twig', array('modules' => $modules));
    }

    public function admin_activeAction($id=null)
    {
        
        $em = $this->getDoctrine()->getManager();
        // Get the university by it's ID
        $module = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Module")->find($id);
        // get the active attribute of the university
        $active = $module->getActive();

        if($this->get('request')->isXmlHttpRequest()){
            // if active equal to 0 set it to 1 and vise versa
           $active = ($active == 0) ? 1 : 0;
        
           // set the new value of active in the Database
           $module->setActive($active);
           $em->persist($module);
           $em->flush();
           return new Response(json_encode($active));
        }
        
        return new Response(json_encode($active));
    }
    
    public function admin_editAction($id = null){
        
           $module = new Module();
           $errors_frm = array();
           $em = $this->getDoctrine()->getManager();
           
           if($id != -1)
              $module = $this->getDoctrine()->getRepository('campusysPedagogieBundle:Module')->find($id);
           
           
           $form = $this->createForm(new ModuleType(),$module);
           $request = $this->getRequest();
           if($request->getMethod() == 'POST'){
               $form->bind($request);
               $validator = $this->get('validator');
               $errors_frm = $validator->validate($module);
               if($form->isValid()){
                   $em->persist($module);
                   $em->flush();
                   
                   if($id != -1)
                       $this->get('session')->getFlashBag()->add('info', 'Module modifié avec succès');
                   else
                       $this->get('session')->getFlashBag()->add('info', 'Module ajouté avec succès');
                   
                   return $this->redirect($this->generateUrl('campusys_modules_list'));
               }
           }
           return $this->render("campusysPedagogieBundle:Backend/Module:edit_module.html.twig", array("form" => $form->createView(), "errors" => $errors_frm));
    }
    
    public function admin_edit_columnAction($column = null, $value = null, $id = null) {
        $em = $this->getDoctrine()->getManager();
        
        $response = "";
        
        $module = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Module")->find($id);
        
        if($module == null)
            return $this->createNotFoundException("Le module avec l'id "+$id+" est inexistant");
        
        
        $module->set($column, $value);
        $em->persist($module);
        $em->flush();
        $response = $value;
        
        return new Response($response);
    }
    
    public function admin_viewAction($id = null){
        $module = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Module")->find($id);
        
        return $this->render("campusysPedagogieBundle:Backend/Module:info_module.html.twig", array("filiere" => $module));
    }
    
    public function admin_deleteAction($id = null) {
        $em = $this->getDoctrine()->getManager();
        $module = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Module")->find($id);
        
        if($module == null){
            return $this->createNotFoundException("Le module avec l'id "+$id+" est inexistant");
        }
        if($this->get('request')->getMethod() == 'GET'){
            $em->remove($module);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', "Le module est supprimé avec succès");
        }
        
        
        return $this->redirect($this->generateUrl('campusys_modules_list'));
    }
    
    public function admin_delete_selectionAction(){
        $request = $this->get('request');
        $em = $this->getDoctrine()->getManager();
        if($request->getMethod() == 'POST')
        {
            $ids = $this->getRequest()->request->get('row_selected');
            $ids = explode("-", $ids);
            unset($ids[0]);
            foreach($ids as $id)
            {
                $rubrique = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Module")->find($id);
                $em->remove($rubrique);
                $em->flush();
                
            }
        }
        return $this->redirect($this->generateUrl('campusys_modules_list'));
    }
    
}
