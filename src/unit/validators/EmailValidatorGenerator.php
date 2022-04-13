<?php

namespace thtmorais\test\unit\validators;

use yii\validators\EmailValidator;

/**
 * Class EmailValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class EmailValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, EmailValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, EmailValidator $validator, string $attribute)
    {
        return [];
    }
}