<?php

namespace campusys\PedagogieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use campusys\PedagogieBundle\Form\FiliereType;
use campusys\PedagogieBundle\Entity\Filiere;

class FiliereController extends Controller
{
    public function admin_indexAction()
    {
    	// Get all the filieres using doctrine
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->createQuery("SELECT u FROM campusysPedagogieBundle:Filiere u");
    	$filieres = $query->getResult();
        return $this->render('campusysPedagogieBundle:Backend/Filiere:list_filieres.html.twig', array('filieres' => $filieres));
    }

    public function admin_activeAction($id=null)
    {
        
        $em = $this->getDoctrine()->getManager();
        // Get the university by it's ID
        $filiere = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Filiere")->find($id);
        // get the active attribute of the university
        $active = $filiere->getActive();

        if($this->get('request')->isXmlHttpRequest()){
            // if active equal to 0 set it to 1 and vise versa
           $active = ($active == 0) ? 1 : 0;
        
           // set the new value of active in the Database
           $filiere->setActive($active);
           $em->persist($filiere);
           $em->flush();
           return new Response(json_encode($active));
        }
        
        return new Response(json_encode($active));
    }
    
    public function admin_editAction($id = null){
        
           $filiere = new Filiere();
           $errors_frm = array();
           $em = $this->getDoctrine()->getManager();
           
           if($id != -1)
              $filiere = $this->getDoctrine()->getRepository('campusysPedagogieBundle:Filiere')->find($id);
           
           
           $form = $this->createForm(new FiliereType(),$filiere);
           $request = $this->getRequest();
           if($request->getMethod() == 'POST'){
               $form->bind($request);
               $validator = $this->get('validator');
               $errors_frm = $validator->validate($filiere);
               if($form->isValid()){
                   $em->persist($filiere);
                   $em->flush();
                   
                   if($id != -1)
                       $this->get('session')->getFlashBag()->add('info', 'Filiere modifiée avec succès');
                   else
                       $this->get('session')->getFlashBag()->add('info', 'Filiere ajoutée avec succès');
                   
                   return $this->redirect($this->generateUrl('campusys_filieres_list'));
               }
           }
           return $this->render("campusysPedagogieBundle:Backend/Filiere:edit_campus.html.twig", array("form" => $form->createView(), "errors" => $errors_frm));
    }
    
    public function admin_edit_columnAction($column = null, $value = null, $id = null) {
        $em = $this->getDoctrine()->getManager();
        
        $response = "";
        
        $filiere = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Filiere")->find($id);
        
        if($filiere == null)
            return $this->createNotFoundException("Le campus avec l'id "+$id+" est inexistant");
        
        
        $filiere->set($column, $value);
        $em->persist($filiere);
        $em->flush();
        $response = $value;
        
        return new Response($response);
    }
    
    public function admin_viewAction($id = null){
        $filiere = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Filiere")->find($id);
        
        return $this->render("campusysPedagogieBundle:Backend/Filiere:info_campus.html.twig", array("filiere" => $filiere));
    }
    
    public function admin_deleteAction($id = null) {
        $em = $this->getDoctrine()->getManager();
        $filiere = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Filiere")->find($id);
        
        if($filiere == null){
            return $this->createNotFoundException("Le campus avec l'id "+$id+" est inexistant");
        }
        if($this->get('request')->getMethod() == 'GET'){
            $em->remove($filiere);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', "Le campus est supprimé avec succès");
        }
        
        
        return $this->redirect($this->generateUrl('campusys_filieres_list'));
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
                $rubrique = $this->getDoctrine()->getRepository("campusysPedagogieBundle:Filiere")->find($id);
                $em->remove($rubrique);
                $em->flush();
                
            }
        }
        return $this->redirect($this->generateUrl('campusys_filieres_list'));
    }
    
}
