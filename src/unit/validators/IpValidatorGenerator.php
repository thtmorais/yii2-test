<?php

namespace thtmorais\test\unit\validators;

use yii\validators\IpValidator;

/**
 * Class IpValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class IpValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, IpValidator $validator, string $attribute)
    {
        return [];
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, IpValidator $validator, string $attribute)
    {
        return [];
    }
}