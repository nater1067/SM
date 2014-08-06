<?php
namespace SM\ChatBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use SM\ChatBundle\Entity\Model;

/**
 * Class LoadModelData
 * @package SM\ChatBundle\DataFixtures\ORM
 */
class LoadModelData extends AbstractFixture implements FixtureInterface
{

    const TEST_MODEL_EMAIL = 'cassie@gmail.com';

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
            $model->setEnabled(true);

            $manager->persist($model);
            $manager->flush();
        }

        $model = new Model();
        $model->setAge(18);
        $model->setEmail(self::TEST_MODEL_EMAIL);
        $model->setUsername("cassie");
        $model->setFirstName("Sweet");
        $model->setLastName("Tits");
        $model->setCountry("USA");
        $model->setPlainPassword("foobar");
        $model->setEnabled(true);

        $manager->persist($model);
        $manager->flush();
    }
}