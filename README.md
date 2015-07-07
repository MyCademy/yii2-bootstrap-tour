Bootstrap Tour Extension for Yii 2
=====================================

WORK IN PROGRESS, DO NOT YET USE!

This is a Bootstrap Tour extension for [Yii framework 2.0](http://www.yiiframework.com). It encapsulates [Bootstrap](https://github.com/sorich87/bootstrap-tour) component in terms of a Yii widget,
and thus makes using Bootstrap Tour component in Yii applications extremely easy.

For license information check the [LICENSE](LICENSE.md)-file.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist mycademy/yii2-bootstrap-tour
```

or add

```
"mycademy/yii2-bootstrap-tour": "dev-master"
```

to the require section of your `composer.json` file.

Usage
----

For example, the following
single line of code in a view file would render a Bootstrap Progress plugin:

```php
<?= mycademy\bootstraptour\Tour::widget([]) ?>
```
