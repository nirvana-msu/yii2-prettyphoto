<?php
/**
 * @link https://github.com/nirvana-msu/yii2-prettyphoto
 * @copyright Copyright (c) 2014 Alexander Stepanov
 * @license GPL-2.0
 */

namespace nirvana\prettyphoto;

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
            $dirName = dirname($from);
            return $dirName === '/images/prettyPhoto' || $dirName === '/css' || $dirName === '/js';
        };
    }
}
