<?php

namespace thtmorais\test\unit\validators;

use yii\validators\RegularExpressionValidator;

/**
 * Class RegularExpressionValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class RegularExpressionValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, RegularExpressionValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, RegularExpressionValidator $validator, string $attribute)
    {
        return [];
    }
}