<?php

namespace SM\WalletBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SMWalletBundle:Default:index.html.twig', array('name' => $name));
    }
}
