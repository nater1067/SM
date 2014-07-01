<?php
namespace SM\ChatBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SM\ChatBundle\Entity\Viewer;

/**
 * Class LoadViewerData
 * @package SM\ChatBundle\DataFixtures\ORM
 */
class LoadViewerData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\DataFixtures\Doctrine\Common\Persistence\ObjectManager|\Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $model = new Viewer();
        $model->setAge(18);
        $model->setEmail("rich@gmail.com");
        $model->setUsername("richguy");
        $model->setFirstName("Rich");
        $model->setFirstName("Sweet");
        $model->setLastName("Tits");
        $model->setCountry("USA");
        $model->setPlainPassword("password");
        $model->setEnabled(true);
        $model->setNickname("Richie Rich");

        $manager->persist($model);
        $manager->flush();
    }
}