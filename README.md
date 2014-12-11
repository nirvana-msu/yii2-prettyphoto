yii2-prettyphoto
================

Yii2 widget for prettyPhoto jQuery lightbox clone [scaron/prettyphoto](https://github.com/scaron/prettyphoto)

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
Unfortunately, [scaron/prettyphoto](https://github.com/scaron/prettyphoto) repository has not been updated in several years and does not contain bower.json which would allow composer to install it.
Instead of copying over the files manually or creating yet another fork just to add bower.json, this extension defines the required repository package inline.
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

You can pass any configuration to plugin using `options` setting. For more information refer to [prettyPhoto documentation](http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/)

Additionally, widget allows to configure the following options:

```php
    $htmlOptions;                   // array HTML options for the enclosing tag
    $gallery = true;                // boolean Whether PrettyPhoto is in gallery (many items) mode
    $tag = 'div';                   // string The enclosing tag
    $theme = self::THEME_DEFAULT;   // string The PrettyPhoto theme to use
```
##Sample usage

``` php
PrettyPhoto::begin([
    'id' => 'pretty_photo',
    'options' => [
        'opacity' => 0.60,
        'theme' => PrettyPhoto::THEME_DARK_SQUARE,
    ],
]);

echo your image links;

PrettyPhoto::end();
```

##License and Attribution

Released under GPL-2.0 license, same as underlying [prettyPhoto](http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/) plugin.
Inspired by [Yii 1.1: prettyphoto](http://www.yiiframework.com/extension/prettyphoto/) extension.