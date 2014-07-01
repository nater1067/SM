<?php
namespace SM\ChatBundle\Controller;

use SM\ChatBundle\Cam\Cam;
use SM\ChatBundle\Entity\ChatSession;
use SM\ChatBundle\Entity\Model;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Class ModelController
 * @package SM\ChatBundle\Controller
 */
class ModelController extends Controller
{
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('AcmeMainBundle:Security:login.html.twig', array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            ));
    }

    /**
     * @return mixed
     */
    public function profileAction()
    {

        /** @var Model $model */
        $model = $this->getUser();
        return $this->render('SMChatBundle:Model:profile.html.twig', array('model' => $model));
    }

    /**
     * The model's user-facing page
     *
     * @param $modelId
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function viewAction($modelId)
    {
        $model = $this
            ->getDoctrine()
            ->getRepository('SMChatBundle:Model')
            ->findOneById($modelId);

        if (!$model) {
            throw $this->createNotFoundException('This chat does not exist.');
        }

        /** @var SM\WalletBundle\TipJar\TipJar $tipJar */
        $tipJar = $this->container->get('sm_wallet.tip_jar');
        $tipJar->getTipOptions();
//
//        $user = $this->getUser();
//        if (get_class($user) == 'SM\ChatBundle\Entity\Viewer') {
//            $chatSession = new ChatSession();
//            $chatSession->setModelId($model->getId());
//            $chatSession->setViewerId($user->getId());
//            $this->getDoctrine()->getManager()->persist($chatSession);
//            $this->getDoctrine()->getManager()->flush();
//        } else {
//            die(get_class($user));
//        }
//
        return $this->render('SMChatBundle:Model:view.html.twig', array(
                'model' => $model,
                'tip_jar_options' => $tipJar->getTipOptions()
            ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function myCamAction()
    {
        /** @var Cam $cam */
        $cam = $this->get('sm_chat.cam');
        $session = $cam->createSession();
        $token = $cam->generateToken($session->getSessionId());
        /** @var Model $model */
        $model = $this->getUser();
        $model->setActiveStreamSessionId($session->getSessionId());
        $model->setActiveStreamToken($token);
        $this->getDoctrine()->getManager()->persist($model);
        $this->getDoctrine()->getManager()->flush();
        $activeChatSessions = $this
            ->getDoctrine()
            ->getRepository('SMChatBundle:ChatSession')
            ->findByModelId($this->getUser()->getId());
        return $this->render('SMChatBundle:Model:myCam.html.twig',
            [
                'apiKey' => $this->container->getParameter('sm_chat.tokbox.api_key'),
                'sessionId' => $session->getSessionId(),
                'token' => $token,
                'active_chat_sessions' => $activeChatSessions
            ]
        );
    }
}