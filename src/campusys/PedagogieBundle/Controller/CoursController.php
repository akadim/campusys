<?php

namespace campusys\PedagogieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use campusys\PedagogieBundle\Form\CoursType;
use campusys\PedagogieBundle\Entity\Cours;

class CoursController extends Controller
{
    public function admin_indexAction()
    {
    	// Get all the courses using doctrine
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->createQuery("SELECT u FROM campusysPedagogieBundle:Cours u");
    	$courses = $query->getResult();
        return $this->render('campusysPedagogieBundle:Backend/Cours:list_courses.html.twig', array('courses' => $courses));
    }

    public function admin_activeAction($id=null)
    {
        
        $em = $this->getDoctrine()->getManager();
        // Get the university by it's ID
        $cours = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Cours")->find($id);
        // get the active attribute of the university
        $active = $cours->getActive();

        if($this->get('request')->isXmlHttpRequest()){
            // if active equal to 0 set it to 1 and vise versa
           $active = ($active == 0) ? 1 : 0;
        
           // set the new value of active in the Database
           $cours->setActive($active);
           $em->persist($cours);
           $em->flush();
           return new Response(json_encode($active));
        }
        
        return new Response(json_encode($active));
    }
    
    public function admin_editAction($id = null){
        
           $cours = new Cours();
           $errors_frm = array();
           $em = $this->getDoctrine()->getManager();
           
           if($id != -1)
              $cours = $this->getDoctrine()->getRepository('campusysPedagogieBundle:Cours')->find($id);
           
           
           $form = $this->createForm(new CoursType(),$cours);
           $request = $this->getRequest();
           if($request->getMethod() == 'POST'){
               $form->bind($request);
               $validator = $this->get('validator');
               $errors_frm = $validator->validate($cours);
               if($form->isValid()){
                   $em->persist($cours);
                   $em->flush();
                   
                   if($id != -1)
                       $this->get('session')->getFlashBag()->add('info', 'Cours modifié avec succès');
                   else
                       $this->get('session')->getFlashBag()->add('info', 'Cours ajouté avec succès');
                   
                   return $this->redirect($this->generateUrl('campusys_courses_list'));
               }
           }
           return $this->render("campusysPedagogieBundle:Backend/Cours:edit_cours.html.twig", array("form" => $form->createView(), "errors" => $errors_frm));
    }
    
    public function admin_edit_columnAction($column = null, $value = null, $id = null) {
        $em = $this->getDoctrine()->getManager();
        
        $response = "";
        
        $cours = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Cours")->find($id);
        
        if($cours == null)
            return $this->createNotFoundException("Le cours avec l'id "+$id+" est inexistant");
        
        
        $cours->set($column, $value);
        $em->persist($cours);
        $em->flush();
        $response = $value;
        
        return new Response($response);
    }
    
    public function admin_viewAction($id = null){
        $cours = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Cours")->find($id);
        
        return $this->render("campusysPedagogieBundle:Backend/Cours:info_cours.html.twig", array("cours" => $cours));
    }
    
    public function admin_deleteAction($id = null) {
        $em = $this->getDoctrine()->getManager();
        $cours = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Cours")->find($id);
        
        if($cours == null){
            return $this->createNotFoundException("Le cours avec l'id "+$id+" est inexistant");
        }
        if($this->get('request')->getMethod() == 'GET'){
            $em->remove($cours);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', "Le cours est supprimé avec succès");
        }
        
        
        return $this->redirect($this->generateUrl('campusys_courses_list'));
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
                $rubrique = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Cours")->find($id);
                $em->remove($rubrique);
                $em->flush();
                
            }
        }
        return $this->redirect($this->generateUrl('campusys_courses_list'));
    }
    
}
