<?php
namespace SM\ChatBundle\Controller;

use \SM\ChatBundle\Entity\Viewer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SM\ChatBundle\PaymentMethod\StripePaymentMethod;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Class ViewerController
 * @package SM\ChatBundle\Controller
 */
class ViewerController extends Controller
{
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContextInterface::AUTHENTICATION_ERROR
            );
        } elseif (null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        return $this->render(
            'SMChatBundle:Viewer:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerAction()
    {
        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register('SM\ChatBundle\Entity\Viewer');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerCreditCardAction()
    {
        return $this->render('SMChatBundle:Viewer:registerCreditCard.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createStripeCustomerAction()
    {
        /** @var Request $request */
        $request = $this->get('request');
        /** @var StripePaymentMethod $stripe */
        $stripe = $this->get('sm_chat.stripe');
        $stripe->setViewer($this->getUser());
        $stripe->registerUser($this->getRequest()->request->get('stripeToken'));
        return $this->render('SMChatBundle:Viewer:registrationComplete.html.twig');
    }

    public function balanceAction()
    {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        /** @var Viewer $user */
        $user = $this->getUser();
        $response->setContent($this->renderView('SMChatBundle:Viewer:balance.json.twig', [
            'tokens' => $user->getTokens()
        ]));
        return $response;
    }
} 