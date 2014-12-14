<?php
/**
 * @link https://github.com/nirvana-msu/yii2-prettyphoto
 * @copyright Copyright (c) 2014 Alexander Stepanov
 * @license GPL-2.0
 */

namespace nirvana\prettyphoto;

use Yii;
use yii\base\Widget;
use yii\helpers\Json;
use yii\web\View;

/**
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class PrettyPhoto extends Widget
{
    const THEME_DEFAULT = 'pp_default';
    const THEME_DARK_ROUNDED = 'dark_rounded';
    const THEME_DARK_SQUARE = 'dark_square';
    const THEME_FACEBOOK = 'facebook';
    const THEME_LIGHT_ROUNDED = 'light_rounded';
    const THEME_LIGHT_SQUARE = 'light_square';

    /**
     * @property string $target jQuery target selector
     */
    public $target = "a[rel^='prettyPhoto']";

    /**
     * @property array $pluginOptions PrettyPhoto plugin options
     */
    public $pluginOptions = [];

    public function init()
    {
        parent::init();

        PrettyPhotoAsset::register($this->view);

        $this->view->registerJs("jQuery(\"" . $this->target . "\").prettyPhoto(" . Json::encode($this->pluginOptions) . ');',
            View::POS_END, 'prettyphoto-init');
    }
}
