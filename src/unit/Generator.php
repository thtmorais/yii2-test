<?php

namespace thtmorais\test\unit;

use Yii;
use Faker\Factory;
use yii\base\Model;
use yii\gii\CodeFile;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\db\BaseActiveRecord;
use yii\helpers\StringHelper;
use yii\validators\BooleanValidator;
use yii\validators\CompareValidator;
use yii\validators\DateValidator;
use yii\validators\DefaultValueValidator;
use yii\validators\EachValidator;
use yii\validators\EmailValidator;
use yii\validators\ExistValidator;
use yii\validators\FileValidator;
use yii\validators\FilterValidator;
use yii\validators\ImageValidator;
use yii\validators\InlineValidator;
use yii\validators\IpValidator;
use yii\validators\NumberValidator;
use yii\validators\RangeValidator;
use yii\validators\RegularExpressionValidator;
use yii\validators\RequiredValidator;
use yii\validators\SafeValidator;
use yii\validators\StringValidator;
use yii\validators\UniqueValidator;
use yii\validators\UrlValidator;

/**
 *
 */
class Generator extends \yii\gii\Generator
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $modelClass;

    /**
     * @var string
     */
    public $namespace = 'app\tests\unit';

    /**
     * @var integer
     */
    public $testQty = 1;

    /**
     * @return string
     */
    public function getName() {
        return 'Unit Test Generator';
    }

    /**
     * @return string
     */
    public function getDescription() {
        return 'Unit Test Generator for Yii PHP Framework';
    }

    /**
     * {@inheritDoc}
     */
    public function stickyAttributes()
    {
        return ArrayHelper::merge(parent::stickyAttributes(), ['namespace', 'testQty']);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'name' => 'Name of test',
            'testQty' => 'Quantity of tests per attribute'
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function requiredTemplates()
    {
        return ArrayHelper::merge(parent::requiredTemplates(), ['unit.php']);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['name', 'modelClass', 'namespace', 'testQty'], 'required'],
            [['testQty'], 'integer'],
            [['modelClass'], function ($attribute, $param, $validator){
                $modelClass = $this->$attribute;
                try {
                    if (class_exists($modelClass)) {
                        if (isset($params['extends'])) {
                            if (ltrim($modelClass, '\\') !== ltrim($params['extends'], '\\') && !is_subclass_of($modelClass, $params['extends'])) {
                                $this->addError($attribute, "'$modelClass' must extend from {$params['extends']} or its child class.");
                            }
                        }
                    } else {
                        $this->addError($attribute, "Class '$modelClass' does not exist or has syntax error.");
                    }
                } catch (\Exception $e) {
                    $this->addError($attribute, "Class '$modelClass' does not exist or has syntax error.");
                }
            }, 'params' => ['extends' => BaseActiveRecord::className()]]
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function generate()
    {
        $files = [];

        $name = $this->name;

        if (!StringHelper::endsWith($name,'Test',true)){
            $name = $name . 'Test';
        }

        $faker = Factory::create();

        /* @var $modelClass ActiveRecord|Model */
        $modelClass = new $this->modelClass();

        $tests = [];

        $validators = $modelClass->getValidators();

        foreach ($validators as $validator){
            switch (get_class($validator)) {
                case BooleanValidator::class:
                    $assertTrue = [];
                    $assertFalse = [];

                    for ($i = 0; $i < $this->testQty; $i++) {
                        $assertTrue[] = $faker->boolean();
                        $assertFalse[] = $faker->text();
                    }

                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => $assertTrue,
                            'assertFalse' => $assertFalse
                        ];
                    }

                    break;
                case CompareValidator::class:
                    break;
                case DateValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $assertTrue = [];
                        $assertFalse = [];

                        for ($i = 0; $i < $this->testQty; $i++) {
                            $assertTrue[] = $faker->date();
                            $assertFalse[] = $faker->text();
                        }

                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => $assertTrue,
                            'assertFalse' => $assertFalse
                        ];
                    }
                    break;
                case DefaultValueValidator::class:
                    break;
                case EachValidator::class:
                    break;
                case EmailValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $assertTrue = [];
                        $assertFalse = [];

                        for ($i = 0; $i < $this->testQty; $i++) {
                            $assertTrue[] = $faker->email();
                            $assertFalse[] = $faker->text();
                        }

                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => $assertTrue,
                            'assertFalse' => $assertFalse
                        ];
                    }

                    break;
                case ExistValidator::class:
                    break;
                case FileValidator::class:
                    break;
                case FilterValidator::class:
                    break;
                case ImageValidator::class:
                    break;
                case InlineValidator::class:
                    break;
                case IpValidator::class:
                    break;
                case NumberValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $assertTrue = [];
                        $assertFalse = [];

                        for ($i = 0; $i < $this->testQty; $i++) {
                            $assertTrue[] = $faker->randomNumber();
                            $assertFalse[] = $faker->text();
                        }

                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => $assertTrue,
                            'assertFalse' => $assertFalse
                        ];
                    }

                    break;
                case RangeValidator::class:
                    break;
                case RegularExpressionValidator::class:
                    break;
                case RequiredValidator::class:
                    foreach ($validators->attributes as $attribute){
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertFalse' => [
                               null
                            ]
                        ];
                    }
                    break;
                case SafeValidator::class:
                    break;
                case StringValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $assertTrue = [];
                        $assertFalse = [];

                        for ($i = 0; $i < $this->testQty; $i++) {
                            $assertTrue[] = $faker->text();
                            $assertFalse[] = $faker->numberBetween();
                        }

                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => $assertTrue,
                            'assertFalse' => $assertFalse
                        ];
                    }

                    break;
                case UniqueValidator::class:
                    break;
                case UrlValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $assertTrue = [];
                        $assertFalse = [];

                        for ($i = 0; $i < $this->testQty; $i++) {
                            $assertTrue[] = $faker->url();
                            $assertFalse[] = $faker->text();
                        }

                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => $assertTrue,
                            'assertFalse' => $assertFalse
                        ];
                    }

                    break;
                default:
                    break;
            }
        }

        $files[] = new CodeFile(Yii::getAlias('@' . str_replace('\\', '/', $this->namespace)) . '/' . $name . '.php',$this->render('unit.php', [
            'name' => $name,
            'tests' => $tests
        ]));

        return $files;
    }
}