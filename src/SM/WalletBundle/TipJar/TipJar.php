<?php
namespace SM\WalletBundle\TipJar;

use Doctrine\ORM\EntityManager;

/**
 * Class TipJar
 * @package SM\WalletBundle
 */
class TipJar
{
    /** @var EntityManager */
    protected $em;
    /** @var array  */
    protected $config;

    /**s
     * @param array $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param EntityManager $em
     * @param array $config
     */
    public function __construct(EntityManager $em, array $config)
    {
        $this->em = $em;
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getTipOptions()
    {
        return $this->getConfig()['tip_jar_options'];
    }
}