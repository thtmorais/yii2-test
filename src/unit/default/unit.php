<?php

use yii\helpers\ArrayHelper;

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

    public function TestValidate<?= $name ?>()
    {
        $<?= strtolower($name) ?> = new <?= $generator->modelClass ?>();

        <?php foreach ($tests as $test) : ?>
            /* <?= ArrayHelper::getValue($test, 'attribute') ?> */
            <?php foreach (ArrayHelper::getValue($test,'assertTrue') as $assertTrue) : ?>
                $<?= strtolower($name) ?>->setAttribute('<?= ArrayHelper::getValue($test, 'attribute') ?>', '<?= $assertTrue ?>');
                $this->assertTrue($<?= strtolower($name) ?>->validate(['<?= ArrayHelper::getValue($test, 'attribute') ?>']));
            <?php endforeach; ?>

            <?php foreach (ArrayHelper::getValue($test,'assertFalse') as $assertFalse) : ?>
                $<?= strtolower($name) ?>->setAttribute('<?= ArrayHelper::getValue($test, 'attribute') ?>', '<?= $assertFalse ?>');
                $this->assertFalse($<?= strtolower($name) ?>->validate(['<?= ArrayHelper::getValue($test, 'attribute') ?>']));
            <?php endforeach; ?>
            /* <?= ArrayHelper::getValue($test, 'attribute') ?> */
        <?php endforeach; ?>
    }
}

