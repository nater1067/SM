<?php
namespace SM\ChatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ChatController
 * @package SM\ChatBundle\Controller
 */
class ChatController extends Controller
{
    /**
     * @param $chatId
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($chatId)
    {
        $chat = $this
            ->getDoctrine()
            ->getRepository('SMChatBundle:Chat')
            ->findOneById($chatId);

        if (!$chat) {
            throw $this->createNotFoundException('This chat does not exist.');
        }

        return $this->render('SMChatBundle:Chat:index.html.twig', array('chat' => $chat));
    }
} 