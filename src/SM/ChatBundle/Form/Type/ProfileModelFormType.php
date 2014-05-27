<?php
namespace SM\ChatBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

/**
 * Class ProfileModel
 * @package SM\ChatBundle\Form\Type
 */
class ProfileModelFormType extends BaseType
{
    public function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('age');
    }

    public function getName()
    {
        return 'acme_user_registration';
    }
}