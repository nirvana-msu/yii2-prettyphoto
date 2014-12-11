<?php
/**
 * @link https://github.com/nirvana-msu/yii2-prettyphoto
 * @copyright Copyright (c) 2014 Alexander Stepanov
 * @license GPL-2.0
 */

namespace nirvana\prettyphoto;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
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
     * @property array HTML options for the enclosing tag
     */
    public $htmlOptions;

    /**
     * @property boolean Whether PrettyPhoto is in gallery (many items) mode
     */
    public $gallery = true;

    /**
     * @property array Additional options for PrettyPhoto
     */
    public $options = array();

    /**
     * @property string The enclosing tag
     */
    public $tag = 'div';

    /**
     * @property string The PrettyPhoto theme to use
     */
    public $theme = self::THEME_DEFAULT;

    public function init()
    {
        parent::init();

        PrettyPhotoAsset::register($this->view);

        $id = $this->getId();
        if (isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;

        echo Html::beginTag($this->tag, $this->htmlOptions) . "\n";

        if (empty($this->options['theme']))
            $this->options['theme'] = $this->theme;
        $options = empty($this->options) ? '' : Json::encode($this->options);

        $this->view->registerJs("
			jQuery('#$id a').attr('rel','prettyPhoto" . ($this->gallery ? '[]' : '') . "');
			jQuery('a[rel^=\"prettyPhoto\"]').prettyPhoto(" . $options . ');
		', View::POS_END, 'prettyphoto-options');
    }

    public function run()
    {
        echo Html::endTag($this->tag);
    }
}
