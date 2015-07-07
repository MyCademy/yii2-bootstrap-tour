<?php
/**
 * Created by PhpStorm.
 * User: rutger
 * Date: 7/7/2015
 * Time: 16:50
 */

namespace MyCademy\BootstrapTour;


use yii\base\Widget;
use yii\helpers\Json;

class Tour extends Widget
{
    /**
     * @var string
     */
    public $name = 'tour';

    /**
     * @var string force the start of the tour
     */
    public $forceStart = false;

    /**
     * @var array the options for the underlying Bootstrap Tour JS plugin.
     * Please refer to the corresponding [Bootstrap Toor plugin API](http://bootstraptour.com/api/) for possible options.
     */
    public $clientOptions = [];

    /**
     * Renders the widget.
     */
    public function run()
    {
        $this->registerPlugin($this->name);
    }

    /**
     * Registers a specific Bootstrap plugin and the related events
     * @param string $name the name of the Bootstrap plugin
     */
    protected function registerPlugin($name)
    {
        $view = $this->getView();
        BootstrapTourPluginAsset::register($view);
        if ($this->clientOptions !== false) {
            $options = empty($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
            $js = "var $name = new Tour($options);\n";
            $js .= "tour.init();\n";
            $js .= "tour.start({$this->forceStart});\n";
            $view->registerJs($js);
        }
        $this->registerClientEvents();
    }
}