<?php
namespace SM\ChatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class RegistrationModel
 * @package SM\ChatBundle\Controller
 */
class RegistrationModelController extends Controller
{
    /**
     * @return mixed
     */
    public function registerAction()
    {
        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register('SM\ChatBundle\Entity\Model');
    }
} 