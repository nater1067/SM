<?php
namespace SM\ChatBundle\Controller;

use SM\ChatBundle\PaymentMethod\StripePaymentMethod;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ViewerController
 * @package SM\ChatBundle\Controller
 */
class ViewerController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerAction()
    {
        return $this->render('SMChatBundle:Viewer:register.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerCreditCardAction()
    {
        return $this->render('SMChatBundle:Viewer:registerCreditCard.html.twig');
    }

    public function createStripeCustomerAction()
    {
        /** @var Request $request */
        $request = $this->get('request');
        /** @var StripePaymentMethod $stripe */
        $stripe = $this->get('sm_chat.stripe');
        $stripe->setViewer($this->getUser());
        $stripe->registerUser($this->getRequest()->request->get('stripeToken'));
    }
} 