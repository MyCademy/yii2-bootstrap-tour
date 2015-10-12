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
<?php

use MyCademy\BootstrapTour\Tour;

Tour::widget([
    'clientOptions' => [ //Bootstrap Tour Options, see: http://bootstraptour.com/api/
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
]);
?>
```

If you want to manually start the tour:

```php
<?php

$tour = new Tour([
    'scope' => 'window', //Set scope to make the 'tour' variable global
    'startMode' => Tour::START_MODE_INIT_ONLY, //Only initialize the tour
    'clientOptions' => [ //Bootstrap Tour Options, see: http://bootstraptour.com/api/
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
]);

$tour->run();

echo Html::button('Start the tour', [
    'onclick' => $tour->getVarName().'.start(true);' //use $tour->getVarName() to get the reference to the 'tour' var name
]);
?>
```
