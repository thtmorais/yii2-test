<?php

namespace thtmorais\test\tests\models;

use yii\helpers\ArrayHelper;

/**
 * Class Model
 * @package thtmorais\test\tests\models
 */
class Model extends \yii\base\Model
{
    /**
     * @var boolean
     */
    public $boolean, $boolean2, $boolean3, $boolean4, $boolean5, $boolean6;

    public $compare;

    public $date;

    /**
     * @var mixed
     */
    public $default, $default2, $default3;

    /**
     * @var double
     */
    public $double, $double2, $double3, $double4;

    public $each;

    public $email, $email2, $email3, $email4;

    public $exist;

    public $file;

    public $filter;

    public $image;

    public $ip;

    public $in;

    /**
     * @var integer
     */
    public $integer, $integer2, $integer3, $integer4;

    public $match;

    /**
     * @var numeric
     */
    public $number, $number2, $number3, $number4;

    public $required;

    /**
     * @var mixed
     */
    public $safe;

    /**
     * @var string
     */
    public $string, $string2, $string3, $string4, $string5, $string6;

    public $trim;

    public $unique;

    public $url;

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['boolean'], 'boolean'],
            [['boolean1'], 'boolean', 'trueValue' => true],
            [['boolean2'], 'boolean', 'falseValue' => false],
            [['boolean3'], 'boolean', 'strict' => true],
            [['boolean4'], 'boolean', 'trueValue' => true, 'falseValue' => false],
            [['boolean5'], 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true],
            [['boolean6'], 'boolean', 'trueValue' => 0, 'falseValue' => 1],

//            [['compare'], 'compare'],

//            [['date'], 'date'],

            [['default'], 'default', 'value' => null],
            [['default2'], 'default', 'value' => 'USA'],
            [['defalut3'], 'default', 'value' => function ($model, $attribute) {
                return date('Y-m-d', strtotime($attribute === 'to' ? '+3 days' : '+6 days'));
            }],

            [['double'], 'double'],
            [['double2'], 'double', 'min' => 3.01],
            [['double3'], 'double', 'max' => 500.15],
            [['double4'], 'double', 'min' => -5, 'max' => 999.89],

//            [['each'], 'each'],

            [['email'], 'email'],
            [['email2'], 'email', 'allowName' => true],
            [['email3'], 'email', 'checkDNS' => true],
            [['email4'], 'email', 'enableIDN' => true],

//            [['exist'], 'exist'],

//            [['file'], 'file'],

//            [['filter'], 'filter'],

//            [['image'], 'image'],

//            [['ip'], 'ip'],

//            [['in'], 'in'],

            [['integer'], 'integer'],
            [['integer2'], 'integer', 'min' => 3],
            [['integer3'], 'integer', 'max' => 500],
            [['integer4'], 'integer', 'min' => -5, 'max' => 999897],

//            [['match'], 'match'],

            [['number'], 'number'],
            [['number2'], 'number', 'min' => 15.01],
            [['number3'], 'number', 'max' => 258.98],
            [['number4'], 'number', 'min' => -20.1598, 'max' => 256874],

//            [['required'], 'required'],

            [['safe'], 'safe'],

            [['string'], 'string'],
            [['string2'], 'string', 'min' => 10],
            [['string3'], 'string', 'max' => 50],
            [['string4'], 'string', 'min' => 5, 'max' => 20],
            [['string5'], 'string', 'length' => 2],
            [['string6'], 'string', 'length' => [2, 10]],

//            [['trim'], 'trim'],

//            [['unique'], 'unique'],

//            [['url'], 'url']
        ]);
    }
}