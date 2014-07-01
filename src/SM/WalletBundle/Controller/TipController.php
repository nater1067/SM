<?php
namespace SM\WalletBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TipController
 * @package SM\WalletBundle\Controller
 */
class TipController extends Controller
{
    /**
     * @param $modelId
     * @param $amount
     * @return Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @throws \Exception
     */
    public function tipModelAction($modelId, $amount)
    {
        if ($user = $this->getUser()) {

            $model = $this
                ->getDoctrine()
                ->getRepository('SMChatBundle:Model')
                ->findOneById($modelId);

            if (!$model) {
                throw $this->createNotFoundException('This chat does not exist.');
            }

            /** @var \SM\WalletBundle\Token\TokenService $tokenService */
            $tokenService = $this->container->get('sm_wallet.token_service');

            $tokenService->userTipModel($this->getUser(), $model, $amount);

            $rendered = $this->renderView('SMWalletBundle:Tip:tipModel.ajax.twig');
            $response = new Response($rendered);
            $response->headers->set('Content-Type', 'application/json');

            return $response;
        } else {
            throw new \Exception('Must be logged in.');
        }
    }
} 