<?php

namespace campusys\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('campusysHomeBundle:Frontend:index.html.twig');
    }
    
    public function admin_indexAction()
    {
    	return $this->render('campusysHomeBundle:Backend:dashboard.html.twig');
    }
}
