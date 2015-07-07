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
     * @var array
     */
    public $options = [];

    /**
     * @var array the options for the underlying Bootstrap Tour JS plugin.
     * Please refer to the corresponding [Bootstrap Toor plugin API](http://bootstraptour.com/api/) for possible options.
     */
    public $clientOptions = [];


    /**
     * @var array the event handlers for the underlying Bootstrap Tour JS plugin.
     * Please refer to the corresponding [Bootstrap Toor plugin API](http://bootstraptour.com/api/) for possible options.
     */
    public $clientEvents = [];

    /**
     * Initializes the widget.
     * This method will register the bootstrap tour asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        $this->registerPlugin('tour');
    }

    /**
     * Registers a specific Bootstrap plugin and the related events
     * @param string $name the name of the Bootstrap plugin
     */
    protected function registerPlugin($name)
    {
        $view = $this->getView();
        BootstrapTourPluginAsset::register($view);
        $id = $this->options['id'];
        if ($this->clientOptions !== false) {
            $options = empty($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
            $js = "jQuery('#$id').$name($options);";
            $view->registerJs($js);
        }
        $this->registerClientEvents();
    }

    /**
     * Registers JS event handlers that are listed in [[clientEvents]].
     * @since 2.0.2
     */
    protected function registerClientEvents()
    {
        if (!empty($this->clientEvents)) {
            $id = $this->options['id'];
            $js = [];
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('#$id').on('$event', $handler);";
            }
            $this->getView()->registerJs(implode("\n", $js));
        }
    }

}