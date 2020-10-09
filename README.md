Rating Widget
============================

The Rating is a Yii2 wrapper for the [jQuery raty] (https://github.com/wbotelhos/raty)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer require --prefer-dist panix/wgt-rating "*"
```

or add

```
"panix/wgt-rating": "*"
```

to the require section of your `composer.json` file.

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php
use panix\ext\rating\RatingWidget;

echo RatingWidget::widget([
    'containerTag' => 'div',
    'containerOptions' => [
        'class' => 'container-class'
    ],
    'options' => [
           // https://github.com/wbotelhos/raty#options
    ]
]);
?>