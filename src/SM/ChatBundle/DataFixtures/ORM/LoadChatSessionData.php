<?php
namespace SM\ChatBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SM\ChatBundle\Entity\ChatSession;
use SM\ChatBundle\Entity\Model;
use SM\ChatBundle\Entity\Viewer;

/**
 * Class LoadChatSessionData
 * @package SM\ChatBundle\DataFixtures\ORM
 */
class LoadChatSessionData extends AbstractFixture implements FixtureInterface
{

    function load(ObjectManager $manager)
    {
        $this->loadModels($manager);
        $this->loadViewers($manager);
        $chatSession = new ChatSession();
        $chatSession->setModelId($this->getReference('model_tester_id'));
        $chatSession->setViewerId($this->getReference('viewer_test_id'));
    }

    function loadModels(ObjectManager $manager)
    {
        $model = new Model();
        $model->setAge(18);
        $model->setEmail('cassie123@gmail.com');
        $model->setUsername("cassie1");
        $model->setFirstName("Sweet");
        $model->setLastName("Tits");
        $model->setCountry("USA");
        $model->setPlainPassword("foobar");
        $model->setEnabled(true);

        $manager->persist($model);
        $manager->flush();

        $this->addReference('model_tester_id', $model);
    }

    function loadViewers(ObjectManager $manager)
    {
        $user = new Viewer();
        $user->setAge(18);
        $user->setEmail("rich123123@gmail.com");
        $user->setUsername("viewing user");
        $user->setFirstName("Rich");
        $user->setFirstName("Sweet");
        $user->setLastName("Tits");
        $user->setCountry("USA");
        $user->setTokens(10000);
        $user->setEnabled(true);
        $user->setNickname("Richie Rich");
        $user->setPlainPassword('password');

        $manager->persist($user);
        $manager->flush();

        $this->addReference('viewer_test_id', $user);
    }
}