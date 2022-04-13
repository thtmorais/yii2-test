<?php

namespace thtmorais\test\unit\validators;

use yii\validators\InlineValidator;

/**
 * Class InlineValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class InlineValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, InlineValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, InlineValidator $validator, string $attribute)
    {
        return [];
    }
}