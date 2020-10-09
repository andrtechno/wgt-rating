Slick Widget
============================

The Slick is a Yii2 wrapper for the [Slick] (https://kenwheeler.github.io/slick/)

[![Latest Stable Version](https://poser.pugx.org/anix/wgt-owlcarousel/v/stable.svg)](https://packagist.org/packages/anix/wgt-owlcarousel)
[![Total Downloads](https://poser.pugx.org/anix/wgt-owlcarousel/downloads.svg)](https://packagist.org/packages/anix/wgt-owlcarousel)


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer require --prefer-dist panix/wgt-slick "*"
```

or add

```
"panix/wgt-slick": "*"
```

to the require section of your `composer.json` file.

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php
use panix\ext\slick\SlickWidget;

SlickWidget::begin([
    'containerTag' => 'div',
    'containerOptions' => [
        'class' => 'container-class'
    ],
    'options' => [
        'dots' => true,
        'infinite' => false,
        'slidesToShow' => 4,
        'slidesToScroll' => 4,
        'responsive' => [
            [
                'breakpoint' => 1024,
                'settings' => [
                    'slidesToShow' => 3,
                    'slidesToScroll' => 3,
                    'infinite' => true,
                    'dots' => true
                ]
            ],
            [
                'breakpoint' => 600,
                'settings' => [
                    'slidesToShow' => 2,
                    'slidesToScroll' => 2
                ]
            ],
            [
                'breakpoint' => 480,
                'settings' => [
                    'slidesToShow' => 1,
                    'slidesToScroll' => 1
                ]
            ]
        ]
    ]
]);
?>

<div class="item-class"><img src="/img/1.jpg" alt="Image 1"></div>
<div class="item-class"><img src="/img/2.jpg" alt="Image 2"></div>
<div class="item-class"><img src="/img/3.jpg" alt="Image 3"></div>
<div class="item-class"><img src="/img/4.jpg" alt="Image 4"></div>


<?php SlickWidget::end(); ?>
