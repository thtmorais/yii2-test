<?php

namespace thtmorais\test\unit\validators;

use yii\validators\CompareValidator;

/**
 * Class CompareValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class CompareValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, CompareValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, CompareValidator $validator, string $attribute)
    {
        return [];
    }
}