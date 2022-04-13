<?php

use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;

/* @var $generator \thtmorais\test\unit\Generator */
/* @var $name string */
/* @var $tests array */

?>
<?= '<?php' ?>


namespace <?= $generator->namespace ?>;

use UnitTester;

class <?= $name ?> extends \Codeception\Test\Unit
{
    /**
    * @var UnitTester
    */
    protected UnitTester $tester;

    public function testValidate<?= $name ?>()
    {
        <?php if (!StringHelper::startsWith($generator->modelClass,'\\', true)) : ?>
            $<?= strtolower($name) ?> = new \<?= $generator->modelClass ?>();
        <?php else : ?>
            $<?= strtolower($name) ?> = new <?= $generator->modelClass ?>();
        <?php endif; ?>

        <?php foreach ($tests as $test) : ?>
            /* <?= ArrayHelper::getValue($test, 'attribute') ?> */
            <?php foreach (ArrayHelper::getValue($test,'assertTrue') as $assertTrue) : ?>
                $<?= strtolower($name) ?>->setAttributes(['<?= ArrayHelper::getValue($test, 'attribute') ?>' => '<?= $assertTrue ?>']);
                $this->assertTrue($<?= strtolower($name) ?>->validate(['<?= ArrayHelper::getValue($test, 'attribute') ?>']));
            <?php endforeach; ?>
            <?php foreach (ArrayHelper::getValue($test,'assertFalse') as $assertFalse) : ?>
                $<?= strtolower($name) ?>->setAttributes(['<?= ArrayHelper::getValue($test, 'attribute') ?>' => '<?= $assertFalse ?>']);
                $this->assertFalse($<?= strtolower($name) ?>->validate(['<?= ArrayHelper::getValue($test, 'attribute') ?>']));
            <?php endforeach; ?>
            /* <?= ArrayHelper::getValue($test, 'attribute') ?> */
        <?php endforeach; ?>
    }
}

