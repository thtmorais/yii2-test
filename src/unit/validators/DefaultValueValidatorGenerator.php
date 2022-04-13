<?php

namespace thtmorais\test\unit\validators;

use yii\validators\DefaultValueValidator;

/**
 * Class DefaultValueValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class DefaultValueValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, DefaultValueValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, DefaultValueValidator $validator, string $attribute)
    {
        return [];
    }
}