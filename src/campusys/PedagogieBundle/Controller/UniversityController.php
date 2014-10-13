<?php

namespace campusys\PedagogieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
}
