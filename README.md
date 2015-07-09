Bootstrap Tour Extension for Yii 2
=====================================

BETA, TEST WELL BEFORE USE!

This is a Bootstrap Tour extension for [Yii framework 2.0](http://www.yiiframework.com). It encapsulates the [Bootstrap Tour](https://github.com/sorich87/bootstrap-tour) component in terms of a Yii widget,
and thus makes using Bootstrap Tour component in Yii applications extremely easy.

For license information check the [LICENSE](LICENSE)-file.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require mycademy/yii2-bootstrap-tour
```

or add

```
"mycademy/yii2-bootstrap-tour": "dev-master"
```

to the require section of your `composer.json` file.

Usage
----

For example, the following lines of code in a view file would render a Bootstrap Tour:

```php
<?php Tour::widget([
    'clientOptions' => [
        'steps' => [
            [
                'element' => "#element1",
                'title' => "Step 1",
                'content' => "Content of my step 1",
            ],
            [
                'element' => "#element2",
                'title' => "Step 2",
                'content' => "Content of my step 2",
            ],
        ],
    ],
]); ?>
```
