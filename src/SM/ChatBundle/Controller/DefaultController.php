<?php

namespace SM\ChatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $chats = $this->getDoctrine()
            ->getRepository('SMChatBundle:Chat')
            ->findAll();
        return $this->render('SMChatBundle:Default:index.html.twig', array('chats' => $chats));
    }
}
