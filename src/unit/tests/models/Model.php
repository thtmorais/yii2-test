<?php

namespace thtmorais\test\unit\tests\models;

use yii\helpers\ArrayHelper;

/**
 * Class Model
 * @package thtmorais\test\unit\tests\models
 */
class Model extends \yii\base\Model
{
    public $boolean;

    public $compare;

    public $date;

    public $default;

    public $double;

    public $each;

    public $email;

    public $exist;

    public $file;

    public $filter;

    public $image;

    public $ip;

    public $in;

    public $integer;

    public $match;

    public $number;

    public $required;

    public $safe;

    public $string;

    public $trim;

    public $unique;

    public $url, $url2, $url3, $url4;

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['url'], 'url'],
            [['url2'], 'url', 'validSchemes' => ['http', 'https', 'ftp']],
            [['url3'], 'url', 'defaultScheme' => 'https'],
            [['url4'], 'url', 'enableIDN' => true],
        ]);
    }
}