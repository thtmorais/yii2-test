<?php

namespace thtmorais\test\unit\validators;

use yii\validators\BooleanValidator;

/**
 * Class BooleanValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class BooleanValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, BooleanValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, BooleanValidator $validator, string $attribute)
    {
        return [];
    }
}