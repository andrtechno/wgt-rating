<?php

namespace panix\ext\rating;

use yii\web\AssetBundle;


class RatingAsset extends AssetBundle
{

    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
    /**
     * @var string the directory that contains the source asset files for this asset bundle.
     */
    public $sourcePath = '@bower/jquery-raty/lib';

    /**
     * @var array list of CSS files that this bundle contains.
     */
    public $css = [
        'jquery.raty.css',
    ];

    /**
     * @var array list of JavaScript files that this bundle contains.
     */
    public $js = [
        'jquery.raty.js',
    ];

    /**
     * @var array list of depends assets that this bundle contains.
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
