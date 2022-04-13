<?php

namespace thtmorais\test\unit\validators;

use yii\validators\UniqueValidator;

/**
 * Class UniqueValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class UniqueValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, UniqueValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, UniqueValidator $validator, string $attribute)
    {
        return [];
    }
}