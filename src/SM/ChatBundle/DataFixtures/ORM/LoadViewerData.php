<?php
namespace SM\ChatBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SM\ChatBundle\Entity\Viewer;

/**
 * Class LoadViewerData
 * @package SM\ChatBundle\DataFixtures\ORM
 */
class LoadViewerData extends AbstractFixture implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\DataFixtures\Doctrine\Common\Persistence\ObjectManager|\Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $user = new Viewer();
        $user->setAge(18);
        $user->setEmail("rich@gmail.com");
        $user->setUsername("richguy");
        $user->setFirstName("Rich");
        $user->setFirstName("Sweet");
        $user->setLastName("Tits");
        $user->setCountry("USA");
        $user->setTokens(10000);
        $user->setPlainPassword("password");
        $user->setEnabled(true);
        $user->setNickname("Richie Rich");

        $manager->persist($user);
        $manager->flush();
    }
}