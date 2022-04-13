<?php

namespace thtmorais\test\tests\models;

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

    public $url;

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), []);
    }
}