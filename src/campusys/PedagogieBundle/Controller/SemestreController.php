<?php

namespace campusys\PedagogieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use campusys\PedagogieBundle\Form\SemestreType;
use campusys\PedagogieBundle\Entity\Semestre;

class SemestreController extends Controller
{
    public function admin_indexAction()
    {
    	// Get all the semestres using doctrine
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->createQuery("SELECT u FROM campusysPedagogieBundle:Semestre u");
    	$semestres = $query->getResult();
        return $this->render('campusysPedagogieBundle:Backend/Semestre:list_semestres.html.twig', array('semestres' => $semestres));
    }

    public function admin_activeAction($id=null)
    {
        
        $em = $this->getDoctrine()->getManager();
        // Get the university by it's ID
        $semestre = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Semestre")->find($id);
        // get the active attribute of the university
        $active = $semestre->getActive();

        if($this->get('request')->isXmlHttpRequest()){
            // if active equal to 0 set it to 1 and vise versa
           $active = ($active == 0) ? 1 : 0;
        
           // set the new value of active in the Database
           $semestre->setActive($active);
           $em->persist($semestre);
           $em->flush();
           return new Response(json_encode($active));
        }
        
        return new Response(json_encode($active));
    }
    
    public function admin_editAction($id = null){
        
           $semestre = new Semestre();
           $errors_frm = array();
           $em = $this->getDoctrine()->getManager();
           
           if($id != -1)
              $semestre = $this->getDoctrine()->getRepository('campusysPedagogieBundle:Semestre')->find($id);
           
           
           $form = $this->createForm(new SemestreType(),$semestre);
           $request = $this->getRequest();
           if($request->getMethod() == 'POST'){
               $form->bind($request);
               $validator = $this->get('validator');
               $errors_frm = $validator->validate($semestre);
               if($form->isValid()){
                   $em->persist($semestre);
                   $em->flush();
                   
                   if($id != -1)
                       $this->get('session')->getFlashBag()->add('info', 'Semestre modifié avec succès');
                   else
                       $this->get('session')->getFlashBag()->add('info', 'Semestre ajouté avec succès');
                   
                   return $this->redirect($this->generateUrl('campusys_semestres_list'));
               }
           }
           return $this->render("campusysPedagogieBundle:Backend/Semestre:edit_semestre.html.twig", array("form" => $form->createView(), "errors" => $errors_frm));
    }
    
    public function admin_edit_columnAction($column = null, $value = null, $id = null) {
        $em = $this->getDoctrine()->getManager();
        
        $response = "";
        
        $semestre = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Semestre")->find($id);
        
        if($semestre == null)
            return $this->createNotFoundException("La semestre avec l'id "+$id+" est inexistant");
        
        
        $semestre->set($column, $value);
        $em->persist($semestre);
        $em->flush();
        $response = $value;
        
        return new Response($response);
    }
    
    public function admin_viewAction($id = null){
        $semestre = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Semestre")->find($id);
        
        return $this->render("campusysPedagogieBundle:Backend/Semestre:info_semestre.html.twig", array("semestre" => $semestre));
    }
    
    public function admin_deleteAction($id = null) {
        $em = $this->getDoctrine()->getManager();
        $semestre = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Semestre")->find($id);
        
        if($semestre == null){
            return $this->createNotFoundException("La semestre avec l'id "+$id+" est inexistant");
        }
        if($this->get('request')->getMethod() == 'GET'){
            $em->remove($semestre);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', "La semestre est supprimé avec succès");
        }
        
        
        return $this->redirect($this->generateUrl('campusys_semestres_list'));
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
                $rubrique = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Semestre")->find($id);
                $em->remove($rubrique);
                $em->flush();
                
            }
        }
        return $this->redirect($this->generateUrl('campusys_semestres_list'));
    }
    
}
