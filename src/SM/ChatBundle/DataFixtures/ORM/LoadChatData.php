<?php

namespace SM\ChatBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SM\ChatBundle\Entity\Chat;

class LoadChatData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 20; $i++) {
            $chat = new Chat();
            $chat->setDescription('I am a chat room. Come check me out :).');
            $chat->setName("Chat room $i");
            $chat->setPicture('mountains.jpg');

            $manager->persist($chat);
            $manager->flush();
        }
    }
}