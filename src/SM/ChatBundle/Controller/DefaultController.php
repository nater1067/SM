<?php

namespace SM\ChatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $models = $this->getDoctrine()
            ->getRepository('SMChatBundle:Model')
            ->findAll();
        return $this->render('SMChatBundle:Default:index.html.twig', array('models' => $models));
    }
}
