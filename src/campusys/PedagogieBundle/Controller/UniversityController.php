<?php

namespace campusys\PedagogieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use campusys\PedagogieBundle\Form\UniversityType;
use campusys\PedagogieBundle\Entity\University;

class UniversityController extends Controller
{
    public function admin_indexAction()
    {
    	// Get all the universities using doctrine
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->createQuery("SELECT u FROM campusysPedagogieBundle:University u");
    	$universities = $query->getResult();
        return $this->render('campusysPedagogieBundle:Backend/University:list_universities.html.twig', array('universities' => $universities));
    }

    public function admin_activeAction($id=null)
    {
        
        $em = $this->getDoctrine()->getManager();
        // Get the university by it's ID
        $university = $this->getDoctrine()->getRepository("campusysPedagogieBundle:University")->find($id);
        // get the active attribute of the university
        $active = $university->getActive();

        if($this->get('request')->isXmlHttpRequest()){
            // if active equal to 0 set it to 1 and vise versa
           $active = ($active == 0) ? 1 : 0;
        
           // set the new value of active in the Database
           $university->setActive($active);
           $em->persist($university);
           $em->flush();
           return new Response(json_encode($active));
        }
        
        return new Response(json_encode($active));
    }
    
    public function admin_editAction($id = null){
        
           $university = new University();
           $errors_frm = array();
           $em = $this->getDoctrine()->getManager();
           
           if($id != -1)
              $university = $this->getDoctrine()->getRepository('campusysPedagogieBundle:University')->find($id);
           
           
           $form = $this->createForm(new UniversityType(),$university);
           $request = $this->getRequest();
           if($request->getMethod() == 'POST'){
               $form->bind($request);
               $validator = $this->get('validator');
               $errors_frm = $validator->validate($university);
               if($form->isValid()){
                   $em->persist($university);
                   $em->flush();
                   
                   if($id != -1)
                       $this->get('session')->getFlashBag()->add('info', 'Université modifiée avec succès');
                   else
                       $this->get('session')->getFlashBag()->add('info', 'Université ajoutée avec succès');
                   
                   return $this->redirect($this->generateUrl('campusys_universities_list'));
               }
           }
           return $this->render("campusysPedagogieBundle:Backend/University:edit_university.html.twig", array("form" => $form->createView(), "errors" => $errors_frm));
    }
    
    public function admin_edit_columnAction($column = null, $value = null, $id = null) {
        $em = $this->getDoctrine()->getManager();
        
        $response = "";
        
        $university = $this->getDoctrine()->getRepository("campusysPedagogieBundle:University")->find($id);
        
        if($university == null)
            return $this->createNotFoundException("L'université avec l'id "+$id+" est inexistant");
        
        
        $university->set($column, $value);
        $em->persist($university);
        $em->flush();
        $response = $value;
        
        return new Response($response);
    }
    
    public function admin_viewAction($id = null){
        $university = $this->getDoctrine()->getRepository("campusysPedagogieBundle:University")->find($id);
        
        return $this->render("campusysPedagogieBundle:Backend/University:info_university.html.twig", array("university" => $university));
    }
    
    public function admin_deleteAction($id = null) {
        $em = $this->getDoctrine()->getManager();
        $university = $this->getDoctrine()->getRepository("campusysPedagogieBundle:University")->find($id);
        
        if($university == null){
            return $this->createNotFoundException("L'université avec l'id "+$id+" est inexistant");
        }
        if($this->get('request')->getMethod() == 'GET'){
            $em->remove($university);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', "L'université est supprimé avec succès");
        }
        
        
        return $this->redirect($this->generateUrl('campusys_universities_list'));
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
                $rubrique = $this->getDoctrine()->getRepository("campusysPedagogieBundle:University")->find($id);
                $em->remove($rubrique);
                $em->flush();
                
            }
        }
        return $this->redirect($this->generateUrl('campusys_universities_list'));
    }
    
}
