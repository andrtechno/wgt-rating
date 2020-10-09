<?php

namespace panix\ext\rating;

use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Json;

class RatingWidget extends Widget
{

    /**
     * @var string prefix for the autogenerated id
     */
    public static $autoIdPrefix = 'raty';

    /**
     * @var string the widget container element
     * Defaults to div
     */
    public $containerTag = 'div';

    /**
     * @var array the HTML attributes for the widget container
     * Defaults to an auto generated id and class => "raty"
     */
    public $containerOptions = [];

    /**
     * @var array options for the Slick plugin
     * https://github.com/wbotelhos/raty#options
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
            $this->containerOptions['class'] = 'raty';
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
        Html::addCssClass($this->containerOptions, 'raty');
    }

    /**
     * Registers the needed assets.
     *
     * @param \yii\web\View $view The View object
     */
    public function registerAssets($view)
    {
        $asset = RatingAsset::register($view);

        if(!isset($this->options['starType'])){
            $this->options['starType'] = 'i';
        }
        if(!isset($this->options['cancelOff'])){
            $this->options['cancelOff']=$asset->baseUrl.'/images/cancel-off.png';
        }
        if(!isset($this->options['cancelOn'])){
            $this->options['cancelOn']=$asset->baseUrl.'/images/cancel-on.png';
        }
        if(!isset($this->options['starHalf'])){
            $this->options['starHalf']=$asset->baseUrl.'/images/star-half.png';
        }
        if(!isset($this->options['starOff'])){
            $this->options['starOff']=$asset->baseUrl.'/images/star-off.png';
        }
        if(!isset($this->options['starOn'])){
            $this->options['starOn']=$asset->baseUrl.'/images/star-on.png';
        }





        $js = 'jQuery("#' . $this->getId() . '").raty(' . Json::encode($this->options) . ');';
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
