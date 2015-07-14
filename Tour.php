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

/**
 * Class Tour
 * @package MyCademy\BootstrapTour
 *
 * @property array $clientOptions the options for the underlying Bootstrap Tour JS plugin.
 * Please refer to the corresponding [Bootstrap Tour plugin API](http://bootstraptour.com/api/) for possible options
 */

class Tour extends Widget
{
    const START_MODE_NONE = 0; //Don't initialize or start the tour
    const START_MODE_INIT_ONLY = 1; //Only initialize the tour
    const START_MODE_DEFAULT = 2; //Initialize and start the tour
    const START_MODE_FORCE_START = 3; //Initialize and force start the tour

    /**
     * @var string $name The javascript variable name used for the tour
     */
    public $name = 'tour';

    /**
     * @var string $scope The scope used for the javascript variable, e.g. 'window'. Leave blank for local scope.
     */
    public $scope;

    /**
     * @var int Start of the tour
     */
    public $startMode = self::START_MODE_DEFAULT;

    /**
     * @var array the options for the underlying Bootstrap Tour JS plugin.
     * Please refer to the corresponding [Bootstrap Tour plugin API](http://bootstraptour.com/api/) for possible options.
     */
    protected $_clientOptions = [];

    /**
     * Renders the widget.
     */
    public function run()
    {
        $view = $this->getView();
        BootstrapTourPluginAsset::register($view);
        if ($this->clientOptions !== false) {

            $varName = $this->getVarName();

            $options = empty($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
            $js = "$varName = new Tour($options);\n";

            if ($this->startMode >= self::START_MODE_INIT_ONLY)
                $js .= "$varName.init();\n";

            if ($this->startMode >= self::START_MODE_DEFAULT) {
                $forced = $this->startMode >= self::START_MODE_FORCE_START ? 'true' : '';
                $js .= "$varName.start($forced);\n";
            }

            $view->registerJs($js);
        }
    }

    public function getVarName(){
        return $this->scope ? $this->scope . '.' . $this->name : $this->name;
    }

    /**
     * @return array
     */
    public function getClientOptions()
    {
        return $this->_clientOptions;
    }

    /**
     * @param array $clientOptions
     */
    public function setClientOptions($clientOptions)
    {
        $this->_clientOptions = $clientOptions;
    }
}