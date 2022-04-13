<?php

namespace thtmorais\test\unit\validators;

use yii\validators\SafeValidator;

/**
 * Class SafeValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class SafeValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, SafeValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, SafeValidator $validator, string $attribute)
    {
        return [];
    }
}