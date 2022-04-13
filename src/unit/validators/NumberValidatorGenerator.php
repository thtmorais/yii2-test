<?php

namespace thtmorais\test\unit\validators;

use yii\validators\NumberValidator;

/**
 * Class NumberValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class NumberValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, NumberValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, NumberValidator $validator, string $attribute)
    {
        return [];
    }
}