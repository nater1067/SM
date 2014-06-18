<?php
namespace SM\ChatBundle\Entity;

/**
 * Class PrivateChat
 * @package SM\ChatBundle\Entity
 */
class PrivateChat extends Chat
{
    protected $viewers = [];

    protected $costPerMinute;


} 