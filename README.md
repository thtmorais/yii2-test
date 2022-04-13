Test Generator for Yii PHP Framework
=========
Test generator for Yii PHP Framework

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```shell
composer require --prefer-dist thtmorais/yii2-test "*"
```

or add

```json
"thtmorais/yii2-test": "*"
```

to the require section of your `composer.json` file.


Usage
-----

In your `config/web.php` and `config/console.php` set Gii modules:

```php
$config['modules']['gii'] = [
    'class' => \yii\gii\Module::class,
    'generators' => [
        'unit-test' => [
            'class' => \thtmorais\test\unit\Generator::class
        ]
    ],
];
```

Now you can access this modules in your Gii on new section: `Unit Test Generator`.
