<?php
namespace SM\ChatBundle\Cam;

/**
 * Class Cam
 * @package SM\ChatBundle\Cam
 */
class Cam
{
    /** @var \OpenTokSDK */
    protected $openTok;

    /**
     * @param $apiKey
     * @param $apiSecret
     */
    public function __construct($apiKey, $apiSecret)
    {
        $this->openTok = new \OpenTokSDK($apiKey, $apiSecret);
    }

    /**
     * @return \OpenTokSession
     */
    public function createSession()
    {
        return $session = $this->getOpenTok()->createSession();
    }

    /**
     * @param $sessionId
     * @return string
     */
    public function generateToken($sessionId)
    {
        return $this->getOpenTok()->generateToken($sessionId);
    }

    /**
     * @return \OpenTokSDK
     */
    public function getOpenTok()
    {
        return $this->openTok;
    }
}