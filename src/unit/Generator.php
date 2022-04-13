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
use thtmorais\test\unit\validators\IpValidator as IpValidatorGenerator;
use thtmorais\test\unit\validators\UrlValidator as UrlValidatorGenerator;
use thtmorais\test\unit\validators\SafeValidator as SafeValidatorGenerator;
use thtmorais\test\unit\validators\FileValidator as FileValidatorGenerator;
use thtmorais\test\unit\validators\DateValidator as DateValidatorGenerator;
use thtmorais\test\unit\validators\EachValidator as EachValidatorGenerator;
use thtmorais\test\unit\validators\EmailValidator as EmailValidatorGenerator;
use thtmorais\test\unit\validators\ExistValidator as ExistValidatorGenerator;
use thtmorais\test\unit\validators\ImageValidator as ImageValidatorGenerator;
use thtmorais\test\unit\validators\RangeValidator as RangeValidatorGenerator;
use thtmorais\test\unit\validators\FilterValidator as FilterValidatorGenerator;
use thtmorais\test\unit\validators\InlineValidator as InlineValidatorGenerator;
use thtmorais\test\unit\validators\NumberValidator as NumberValidatorGenerator;
use thtmorais\test\unit\validators\StringValidator as StringValidatorGenerator;
use thtmorais\test\unit\validators\UniqueValidator as UniqueValidatorGenerator;
use thtmorais\test\unit\validators\BooleanValidator as BooleanValidatorGenerator;
use thtmorais\test\unit\validators\CompareValidator as CompareValidatorGenerator;
use thtmorais\test\unit\validators\RequiredValidator as RequiredValidatorGenerator;
use thtmorais\test\unit\validators\DefaultValueValidator as DefaultValueValidatorGenerator;
use thtmorais\test\unit\validators\RegularExpressionValidator as RegularExpressionValidatorGenerator;

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
                            'assertTrue' => BooleanValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => BooleanValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case CompareValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => CompareValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => CompareValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case DateValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => DateValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => DateValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case DefaultValueValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => DefaultValueValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => DefaultValueValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case EachValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => EachValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => EachValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case EmailValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => EmailValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => EmailValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case ExistValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => ExistValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => ExistValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case FileValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => FileValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => FileValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case FilterValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => FilterValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => FilterValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case ImageValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => ImageValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => ImageValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case InlineValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => InlineValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => InlineValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case IpValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => IpValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => IpValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case NumberValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => NumberValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => NumberValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case RangeValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => RangeValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => RangeValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case RegularExpressionValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => RegularExpressionValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => RegularExpressionValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case RequiredValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => RequiredValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => RequiredValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case SafeValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => SafeValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => SafeValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case StringValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => StringValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => StringValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case UniqueValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => UniqueValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => UniqueValidatorGenerator::assertFalse($this->testQty)
                        ];
                    }

                    break;
                case UrlValidator::class:
                    foreach ($validator->attributes as $attribute) {
                        $tests[] = [
                            'attribute' => $attribute,
                            'assertTrue' => UrlValidatorGenerator::assertTrue($this->testQty),
                            'assertFalse' => UrlValidatorGenerator::assertFalse($this->testQty)
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