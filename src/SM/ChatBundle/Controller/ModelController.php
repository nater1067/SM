<?php
namespace SM\ChatBundle\Controller;

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
        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register('SM\ChatBundle\Entity\Model');
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
}