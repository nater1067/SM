<?php
namespace SM\ChatBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use SM\ChatBundle\Entity\Model;

/**
 * Class LoadModelData
 * @package SM\ChatBundle\DataFixtures\ORM
 */
class LoadModelData implements FixtureInterface
{

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 7; $i++) {
            $model = new Model();
            $model->setAge(18);
            $model->setEmail("blah$i@gmail.com");
            $model->setUsername("Sweetie$i");
            $model->setFirstName("Sweet");
            $model->setLastName("Tits");
            $model->setCountry("USA");
            $model->setPassword("asdfasdf");

            $manager->persist($model);
            $manager->flush();
        }
    }
}