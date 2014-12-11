<?php
/**
 * @link https://github.com/nirvana-msu/yii2-prettyphoto
 * @copyright Copyright (c) 2014 Alexander Stepanov
 * @license GPL-2.0
 */

namespace nirvana\prettyphoto;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class PrettyPhotoAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-prettyPhoto';
    public $css = [
        'css/prettyPhoto.css',
    ];
    public $js = [
        'js/jquery.prettyPhoto.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public function init()
    {
        parent::init();
        $this->publishOptions['beforeCopy'] = function ($from) {
            $dirName = str_replace(realpath(Yii::getAlias('@bower') . '\jquery-prettyPhoto'), '', $from);
            return
                (0 === strpos($dirName, DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'prettyPhoto'))
                || (0 === strpos($dirName, DIRECTORY_SEPARATOR.'css'))
                || (0 === strpos($dirName, DIRECTORY_SEPARATOR.'js'));
        };
    }
}
