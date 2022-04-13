<?php

namespace thtmorais\test\unit\validators;

use yii\validators\EachValidator;

/**
 * Class EachValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class EachValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, EachValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, EachValidator $validator, string $attribute)
    {
        return [];
    }
}