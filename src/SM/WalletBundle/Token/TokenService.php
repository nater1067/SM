<?php
namespace SM\WalletBundle\Token;

use Doctrine\ORM\EntityManager;
use SM\ChatBundle\Entity\User;
use SM\ChatBundle\Entity\Model;
use SM\WalletBundle\Exception\InsufficientFundsException;

/**
 * Class TokenService
 * @package SM\WalletBundle\Token
 */
class TokenService
{
    /** @var \Doctrine\ORM\EntityManager */
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param User $user
     * @param $tokens
     */
    public function debitUserTokens(User $user, $tokens)
    {
        $user->setTokens($user->getTokens() - $tokens);
    }

    /**
     * @param User $user
     * @param $tokens
     */
    public function grantUserTokens(User $user, $tokens)
    {
        $user->setTokens($model->getTokens() + $tokens);
    }

    /**
     * @param User $user
     * @param Model $model
     * @param int $tokens
     * @return bool
     * @throws \SM\WalletBundle\Exception\InsufficientFundsException
     */
    public function userTipModel(User $user, Model $model, $tokens)
    {
        if ($user->getTokens() < $tokens) {
            throw new InsufficientFundsException('User does not have sufficient tokens for this transaction.');
        }
        $this->debitUserTokens($user, $tokens);
        $this->grantUserTokens($model, $tokens);

        return true;
    }
} 