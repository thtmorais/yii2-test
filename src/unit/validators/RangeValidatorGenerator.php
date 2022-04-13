<?php

namespace thtmorais\test\unit\validators;

use yii\validators\RangeValidator;

/**
 * Class RangeValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class RangeValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, RangeValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, RangeValidator $validator, string $attribute)
    {
        return [];
    }
}