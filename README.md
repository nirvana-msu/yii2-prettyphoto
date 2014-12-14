yii2-prettyphoto
================

Yii2 widget for prettyPhoto jQuery lightbox clone [scaron/prettyphoto](https://github.com/scaron/prettyphoto)

Yii2 [extension page](http://www.yiiframework.com/extension/yii2-prettyphoto)

## Installation

### Composer

First of all, add extension to your composer.json:

```js
{
    "require": {
        "nirvana-msu/yii2-prettyphoto": "1.0.*@dev"
    }
}
```
Unfortunately, [scaron/prettyphoto](https://github.com/scaron/prettyphoto) repository has not been updated in several years and does not contain `bower.json` which would allow composer to install it.

Instead of copying over the files manually or creating yet another fork just to add `bower.json`, this extension defines the required repository package inline.
Since composer does not inherit "repositories" section, you have to add the same section to your own composer.json:

```js
"repositories": [
        {
            "type": "package",
            "package": {
                "name": "bower-asset/jquery-prettyPhoto",
                "type": "bower-asset-library",
                "version": "3.1.4",
                "source": {
                    "url": "https://github.com/scaron/prettyphoto",
                    "type": "git",
                    "reference": "master"
                }
            }
        }
    ]
```

After this just update your dependencies as usual, e.g. by running `composer update`

##Widget Configuration

* `$target = "a[rel^='prettyPhoto']"` *string* jQuery target selector
* `$pluginOptions = []` *array* PrettyPhoto plugin options. For more information refer to [prettyPhoto documentation](http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/)

##Sample usage

Rendering widget will produce the necessary javascript code to register plugin.

Using default configuration:
``` php
PrettyPhoto::widget([]);
```

Customizing some plugin options:
``` php
PrettyPhoto::widget([
    'target' => "a[rel^='prettyPhoto']",
    'pluginOptions' => [
        'opacity' => 0.60,
        'theme' => PrettyPhoto::THEME_DARK_SQUARE,
        'social_tools' => false,
        'autoplay_slideshow' => true,
        'modal' => true
    ],
]);
```

To activate plugin, add `rel=”prettyPhoto”` attribute for single images and `rel="prettyPhoto[gallery-name]` for galleries.
These attributes must match target selector as configured by `$target` property.
Refer to [prettyPhoto documentation](http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/) for more examples.

##License

Released under GPL-2.0 license, same as underlying [prettyPhoto](http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/) plugin.