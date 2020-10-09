<?php

namespace panix\ext\slick;

use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Json;

class SlickWidget extends Widget
{

    /**
     * @var string prefix for the autogenerated id
     */
    public static $autoIdPrefix = 'slick';

    /**
     * @var string the widget container element
     * Defaults to div
     */
    public $containerTag = 'div';

    /**
     * @var array the HTML attributes for the widget container
     * Defaults to an auto generated id and class => "slick-carousel"
     */
    public $containerOptions = [];

    /**
     * @var array options for the Slick plugin
     * @link https://kenwheeler.github.io/slick/ Available Options
     */
    public $options = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $view = $this->getView();
        $this->registerAssets($view);
        if (!isset($this->containerOptions['class'])) {
            $this->containerOptions['class'] = 'slick-carousel';
        }
        $this->initOptions();
        echo Html::beginTag($this->containerTag, $this->containerOptions) . "\n";
    }

    /**
     * Intialises the plugin options
     */
    protected function initOptions()
    {
        $this->containerOptions = array_merge([
            'id' => $this->getId()
        ], $this->containerOptions);
        Html::addCssClass($this->containerOptions, 'slick-carousel');
    }

    /**
     * Registers the needed assets.
     *
     * @param \yii\web\View $view The View object
     */
    public function registerAssets($view)
    {
        SlickAsset::register($view);
        $js = 'jQuery("#' . $this->getId() . '").slick(' . Json::encode($this->options) . ');';
        $view->registerJs($js, $view::POS_END);
    }

    /**
     * Executes the widget.
     * @return string the result of widget execution to be outputted.
     */
    public function run()
    {
        echo "\n" . Html::endTag($this->containerTag);
    }

}
