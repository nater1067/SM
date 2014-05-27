<?php
namespace SM\ChatBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

/**
 * Class RegistrationViewerFormType
 * @package SM\ChatBundle\Form\Type
 */
class RegistrationViewerFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('age');
        $builder->add('firstName');
        $builder->add('lastName');
        $builder->add('country');
        $builder->add('nickname');
    }

    public function getName()
    {
        return 'fos_viewer_registration_form';
    }
} 