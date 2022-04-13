<?php

namespace thtmorais\test\unit;

use Yii;
use yii\base\Model;
use yii\gii\CodeFile;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\db\BaseActiveRecord;
use yii\helpers\StringHelper;
use yii\validators\IpValidator;
use yii\validators\UrlValidator;
use yii\validators\SafeValidator;
use yii\validators\FileValidator;
use yii\validators\DateValidator;
use yii\validators\EachValidator;
use yii\validators\EmailValidator;
use yii\validators\ExistValidator;
use yii\validators\ImageValidator;
use yii\validators\RangeValidator;
use yii\validators\FilterValidator;
use yii\validators\InlineValidator;
use yii\validators\NumberValidator;
use yii\validators\StringValidator;
use yii\validators\UniqueValidator;
use yii\validators\BooleanValidator;
use yii\validators\CompareValidator;
use yii\validators\RequiredValidator;
use yii\validators\DefaultValueValidator;
use yii\validators\RegularExpressionValidator;
use thtmorais\test\unit\validators\IpValidatorGenerator;
use thtmorais\test\unit\validators\UrlValidatorGenerator;
use thtmorais\test\unit\validators\SafeValidatorGenerator;
use thtmorais\test\unit\validators\FileValidatorGenerator;
use thtmorais\test\unit\validators\DateValidatorGenerator;
use thtmorais\test\unit\validators\EachValidatorGenerator;
use thtmorais\test\unit\validators\EmailValidatorGenerator;
use thtmorais\test\unit\validators\ExistValidatorGenerator;
use thtmorais\test\unit\validators\ImageValidatorGenerator;
use thtmorais\test\unit\validators\RangeValidatorGenerator;
use thtmorais\test\unit\validators\FilterValidatorGenerator;
use thtmorais\test\unit\validators\InlineValidatorGenerator;
use thtmorais\test\unit\validators\NumberValidatorGenerator;
use thtmorais\test\unit\validators\StringValidatorGenerator;
use thtmorais\test\unit\validators\UniqueValidatorGenerator;
use thtmorais\test\unit\validators\BooleanValidatorGenerator;
use thtmorais\test\unit\validators\CompareValidatorGenerator;
use thtmorais\test\unit\validators\RequiredValidatorGenerator;
use thtmorais\test\unit\validators\DefaultValueValidatorGenerator;
use thtmorais\test\unit\validators\RegularExpressionValidatorGenerator;

/**
 * Class Generator
 * @package thtmorais\test\unit
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
     * @var string
     */
    public $locale = 'en_US';

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
        return ArrayHelper::merge(parent::stickyAttributes(), ['namespace', 'locale', 'testQty']);
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
            }, 'params' => ['extends' => BaseActiveRecord::className()]],
            [['locale'], 'string']
        ]);
    }

    /**
     * {@inheritDoc}
     */
    public function generate()
    {
        $files = [];

        $name = $this->name;
        $qty = $this->testQty;

        if (!StringHelper::endsWith($name,'Test',true)){
            $name = $name . 'Test';
        }

        /* @var $modelClass ActiveRecord|Model */
        $modelClass = new $this->modelClass();

        $tests = [];

        $validators = $modelClass->getValidators();

        foreach ($validators as $validator){
            switch (get_class($validator)) {
                case BooleanValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => BooleanValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => BooleanValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case CompareValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => CompareValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => CompareValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case DateValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => DateValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => DateValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case DefaultValueValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => DefaultValueValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => DefaultValueValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case EachValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => EachValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => EachValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case EmailValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => EmailValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => EmailValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case ExistValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => ExistValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => ExistValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case FileValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => FileValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => FileValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case FilterValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => FilterValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => FilterValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case ImageValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => ImageValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => ImageValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case InlineValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => InlineValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => InlineValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case IpValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => IpValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => IpValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case NumberValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => NumberValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => NumberValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case RangeValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => RangeValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => RangeValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case RegularExpressionValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => RegularExpressionValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => RegularExpressionValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case RequiredValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => RequiredValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => RequiredValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case SafeValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => SafeValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => SafeValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case StringValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => StringValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => StringValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case UniqueValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => UniqueValidatorGenerator::assertTrue($qty, $validator, $attribute),
                            'assertFalse' => UniqueValidatorGenerator::assertFalse($qty, $validator, $attribute)
                        ];
                    }

                    break;
                case UrlValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => UrlValidatorGenerator::assertTrue($qty, $validator, $attribute, $locale),
                            'assertFalse' => UrlValidatorGenerator::assertFalse($qty, $validator, $attribute)
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