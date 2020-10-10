<?php

namespace panix\ext\rating;

use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class RatingInput extends InputWidget
{

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
    public $imagePath;

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

    public function run()
    {
        echo "\n" . Html::endTag($this->containerTag);
    }

    public function run2()
    {
        /* if ($this->hasModel()) {
             return Html::activeTextInput($this->model, $this->attribute, $this->options);
         } else {
             return Html::textInput($this->name, $this->value, $this->options);
         }*/


        $view = $this->getView();
        $this->registerAssets($view);
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
        if (!$this->imagePath) {
            $this->imagePath = $asset->baseUrl . '/images/';
        }
        if (!isset($this->options['starType'])) {
            $this->options['starType'] = 'img';
        }
        if (!isset($this->options['cancelOff'])) {
            $this->options['cancelOff'] = $this->imagePath . 'cancel-off.png';
        }
        if (!isset($this->options['cancelOn'])) {
            $this->options['cancelOn'] = $this->imagePath . 'cancel-on.png';
        }
        if (!isset($this->options['starHalf'])) {
            $this->options['starHalf'] = $this->imagePath . 'star-half.png';
        }
        if (!isset($this->options['starOff'])) {
            $this->options['starOff'] = $this->imagePath . 'star-off.png';
        }
        if (!isset($this->options['starOn'])) {
            $this->options['starOn'] = $this->imagePath . 'star-on.png';
        }

        // $name = isset($options['name']) ? $options['name'] : Html::getInputName($this->model, $this->attribute);
        if (!isset($this->options['scoreName'])) {
            $this->options['score'] = $this->hasModel() ? Html::getAttributeValue($this->model, $this->attribute) : $this->value;


            //  $this->options['scoreName'] = $name;
        }
        $js = 'jQuery("#' . $this->getId() . '").raty(' . Json::encode($this->options) . ');';
        $view->registerJs($js, $view::POS_END);
    }


}
