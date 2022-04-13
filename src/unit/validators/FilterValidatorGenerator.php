<?php

namespace thtmorais\test\unit\validators;

use yii\validators\FilterValidator;

/**
 * Class FilterValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class FilterValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, FilterValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, FilterValidator $validator, string $attribute)
    {
        return [];
    }
}