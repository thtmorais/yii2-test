<?php

namespace thtmorais\test\unit\validators;

use Faker\Factory;
use Faker\Generator;
use yii\helpers\StringHelper;
use yii\validators\UrlValidator;

/**
 * Class UrlValidatorGenerator
 * @package thtmorais\test\unit\validators
 */
class UrlValidatorGenerator
{
    /**
     * @return array
     */
    public static function assertTrue(int $qty = 1, UrlValidator $validator, string $attribute, $locale = 'en_US')
    {
        $urls = [];

        $faker = Factory::create($locale);

        for ($i = 0; $i < $qty; $i++) {
            $url = $faker->url();

            if ($validator->enableIDN){

            }

            if ($validator->validSchemes) {

            }

            if ($validator->defaultScheme){

            }

            $urls = $url;
        }

        return $urls;
    }

    /**
     * @return array
     */
    public static function assertFalse(int $qty = 1, UrlValidator $validator, string $attribute)
    {
        return [];
    }
}