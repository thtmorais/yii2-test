<?php

namespace thtmorais\test\unit\validators;

use yii\validators\ExistValidator;

/**
 * Class ExistValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class ExistValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, ExistValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, ExistValidator $validator, string $attribute)
    {
        return [];
    }
}