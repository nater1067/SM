<?php
namespace SM\ChatBundle\PaymentMethod;

/**
 * Class AbstractPaymentMethod
 * @package SM\ChatBundle\PaymentMethod
 */
abstract class AbstractPaymentMethod
{
    abstract public function debit();
} 