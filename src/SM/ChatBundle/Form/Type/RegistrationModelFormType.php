<?php
namespace SM\ChatBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

/**
 * Class RegistrationModelFormType
 * @package SM\ChatBundle\Form\Type
 */
class RegistrationModelFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('age');
        $builder->add('firstName');
        $builder->add('lastName');
        $builder->add('country');
    }

    public function getName()
    {
        return 'acme_user_registration';
    }
} 