<?php
namespace SM\ChatBundle\Controller;

use SM\ChatBundle\Cam\Cam;
use SM\ChatBundle\Entity\Model;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Class ModelController
 * @package SM\ChatBundle\Controller
 */
class ModelController extends Controller
{
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

        return $this->render('SMChatBundle:Model:view.html.twig', array('model' => $model));
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
        return $this->render('SMChatBundle:Model:myCam.html.twig',
            [
                'apiKey' => $this->container->getParameter('sm_chat.tokbox.api_key'),
                'sessionId' => $session->getSessionId(),
                'token' => $token
            ]
        );
    }
}