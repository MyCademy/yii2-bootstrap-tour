<?php
/**
 * Created by PhpStorm.
 * User: rutger
 * Date: 7/7/2015
 * Time: 17:03
 */

namespace MyCademy\BootstrapTour;


use yii\web\AssetBundle;

class BootstrapTourPluginAsset extends AssetBundle{
    public $sourcePath = '@vendor/sorich87/bootstrap-tour/build';
    public $js = [
        'js/bootstrap-tour.min.js',
    ];

    public $css = [
        'css/bootstrap-tour.min.css',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}