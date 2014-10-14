<?php

namespace campusys\PedagogieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use campusys\PedagogieBundle\Form\CampusType;
use campusys\PedagogieBundle\Entity\Campus;

class CampusController extends Controller
{
    public function admin_indexAction()
    {
    	// Get all the campuses using doctrine
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->createQuery("SELECT u FROM campusysPedagogieBundle:Campus u");
    	$campuses = $query->getResult();
        return $this->render('campusysPedagogieBundle:Backend/Campus:list_campuses.html.twig', array('campuses' => $campuses));
    }

    public function admin_activeAction($id=null)
    {
        
        $em = $this->getDoctrine()->getManager();
        // Get the university by it's ID
        $campus = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Campus")->find($id);
        // get the active attribute of the university
        $active = $campus->getActive();

        if($this->get('request')->isXmlHttpRequest()){
            // if active equal to 0 set it to 1 and vise versa
           $active = ($active == 0) ? 1 : 0;
        
           // set the new value of active in the Database
           $campus->setActive($active);
           $em->persist($campus);
           $em->flush();
           return new Response(json_encode($active));
        }
        
        return new Response(json_encode($active));
    }
    
    public function admin_editAction($id = null){
        
           $campus = new Campus();
           $errors_frm = array();
           $em = $this->getDoctrine()->getManager();
           
           if($id != -1)
              $campus = $this->getDoctrine()->getRepository('campusysPedagogieBundle:Campus')->find($id);
           
           
           $form = $this->createForm(new CampusType(),$campus);
           $request = $this->getRequest();
           if($request->getMethod() == 'POST'){
               $form->bind($request);
               $validator = $this->get('validator');
               $errors_frm = $validator->validate($campus);
               if($form->isValid()){
                   $em->persist($campus);
                   $em->flush();
                   
                   if($id != -1)
                       $this->get('session')->getFlashBag()->add('info', 'Campus modifiée avec succès');
                   else
                       $this->get('session')->getFlashBag()->add('info', 'Campus ajoutée avec succès');
                   
                   return $this->redirect($this->generateUrl('campusys_campuses_list'));
               }
           }
           return $this->render("campusysPedagogieBundle:Backend/Campus:edit_campus.html.twig", array("form" => $form->createView(), "errors" => $errors_frm));
    }
    
    public function admin_edit_columnAction($column = null, $value = null, $id = null) {
        $em = $this->getDoctrine()->getManager();
        
        $response = "";
        
        $campus = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Campus")->find($id);
        
        if($campus == null)
            return $this->createNotFoundException("Le campus avec l'id "+$id+" est inexistant");
        
        
        $campus->set($column, $value);
        $em->persist($campus);
        $em->flush();
        $response = $value;
        
        return new Response($response);
    }
    
    public function admin_viewAction($id = null){
        $campus = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Campus")->find($id);
        
        return $this->render("campusysPedagogieBundle:Backend/Campus:info_campus.html.twig", array("campus" => $campus));
    }
    
    public function admin_deleteAction($id = null) {
        $em = $this->getDoctrine()->getManager();
        $campus = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Campus")->find($id);
        
        if($campus == null){
            return $this->createNotFoundException("Le campus avec l'id "+$id+" est inexistant");
        }
        if($this->get('request')->getMethod() == 'GET'){
            $em->remove($campus);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', "Le campus est supprimé avec succès");
        }
        
        
        return $this->redirect($this->generateUrl('campusys_campuses_list'));
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
                $rubrique = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Campus")->find($id);
                $em->remove($rubrique);
                $em->flush();
                
            }
        }
        return $this->redirect($this->generateUrl('campusys_campuses_list'));
    }
    
}
