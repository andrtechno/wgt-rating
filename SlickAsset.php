<?php

namespace panix\ext\slick;

use yii\web\AssetBundle;


class SlickAsset extends AssetBundle
{

    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
    /**
     * @var string the directory that contains the source asset files for this asset bundle.
     */
    public $sourcePath = '@bower/slick-carousel';

    /**
     * @var array list of CSS files that this bundle contains.
     */
    public $css = [
        'slick/slick.css',
        'slick/slick-theme.css',
    ];

    /**
     * @var array list of JavaScript files that this bundle contains.
     */
    public $js = [
        'slick/slick.min.js',
    ];

    /**
     * @var array list of depends assets that this bundle contains.
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
