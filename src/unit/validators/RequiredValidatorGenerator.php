<?php

namespace thtmorais\test\unit\validators;

use yii\validators\RequiredValidator;

/**
 * Class RequiredValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class RequiredValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, RequiredValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, RequiredValidator $validator, string $attribute)
    {
        return [];
    }
}