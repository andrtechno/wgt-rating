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

    public function run()
    {
        $view = $this->getView();
        $this->registerAssets($view);

        $this->containerOptions = array_merge([
            'id' => $this->getId()
        ], $this->containerOptions);
        Html::addCssClass($this->containerOptions, 'raty');


        if (!isset($this->containerOptions['class'])) {
            $this->containerOptions['class'] = 'raty';
        }
        return Html::tag($this->containerTag,'',$this->containerOptions);
    }

    /**
     * Registers the needed assets.
     *
     * @param \yii\web\View $view The View object
     */
    public function registerAssets($view)
    {
        $asset = RatingAsset::register($view);
        if (!isset($this->options['starType'])) {
            $this->options['starType'] = 'img';
        }

        if (!isset($this->options['path'])) {
            $this->options['path'] = $asset->baseUrl . '/images/';
        }

        if (!isset($this->options['scoreName'])) {
            $this->options['scoreName'] = $this->hasModel() ? Html::getInputName($this->model, $this->attribute) : $this->name;
        }
        $this->options['score'] = $this->hasModel() ? Html::getAttributeValue($this->model, $this->attribute) : $this->value;
        $js = 'jQuery("#' . $this->getId() . '").raty(' . Json::encode($this->options) . ');';
        $view->registerJs($js, $view::POS_END);
    }


}
