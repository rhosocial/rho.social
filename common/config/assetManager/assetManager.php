<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link http://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license http://vistart.name/license/
 * 
 * 该文件列出所有需要单独配置的资产包和其它选项。
 * 这里列出的资产包须遵循以下规则：
 * 1. 能用CDN代替的，尽量用CDN代替，而不是从本地下载，但必须保留本地版本；
 * 2. 开发环境时用带有缩进和注释的版本，其它环境时用不包含注释、无意义空白符的版本；
 * 3. 尽量能不加修改地用于所有 Web 应用程序；
 * 4. 对应类名必须已存在，且能够正常引用。
 */

return [
    'bundles' => [
        'yii\web\JqueryAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/jquery/2.2.0/jquery.js' : 'https://cdn.bootcss.com/jquery/2.2.0/jquery.min.js',
            ],
            'jsOptions' => [
                'position' => \yii\web\View::POS_HEAD,
            ],
        ],
        'yii\bootstrap\BootstrapAsset' => [
            'sourcePath' => null,
            'css' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.css' : 'https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css',
            ],
        ],
        'yii\bootstrap\BootstrapPluginAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.js' : 'https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js',
            ],
            'jsOptions' => [
                'position' => \yii\web\View::POS_HEAD,
            ],
        ],
        'yii\gii\TypeAheadAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/typeahead.js/0.11.1/typeahead.bundle.js' : 'https://cdn.bootcss.com/typeahead.js/0.11.1/typeahead.bundle.min.js',
            ],
        ],
        'common\assets\ChartAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/Chart.js/1.0.2/Chart.js' : 'https://cdn.bootcss.com/Chart.js/1.0.2/Chart.min.js',
            ],
        ],
        'common\assets\FastClickAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/fastclick/1.0.6/fastclick.js' : 'https://cdn.bootcss.com/fastclick/1.0.6/fastclick.min.js',
            ],
        ],
        'common\assets\FontAwesomeAsset' => [
            'sourcePath' => null,
            'css' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.css' : 'https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css',
            ],
        ],
        'common\assets\FullCalenderAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/fullcalendar/2.6.0/fullcalendar.js' : 'https://cdn.bootcss.com/fullcalendar/2.6.0/fullcalendar.min.js',
                'https://cdn.bootcss.com/fullcalendar/2.6.0/lang-all.js',
            ],
            'css' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/fullcalendar/2.6.0/fullcalendar.css' : 'https://cdn.bootcss.com/fullcalendar/2.6.0/fullcalendar.min.css',
                'https://cdn.bootcss.com/fullcalendar/2.6.0/fullcalendar.print.css',
            ],
        ],
        'common\assets\HolderAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/holder/2.9.1/holder.js' : 'https://cdn.bootcss.com/holder/2.9.1/holder.min.js',
            ],
        ],
        'common\assets\IcheckAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/iCheck/1.0.2/icheck.js' : 'https://cdn.bootcss.com/iCheck/1.0.2/icheck.min.js',
            ],
            'css' => [
                'https://cdn.bootcss.com/iCheck/1.0.2/skins/all.css',
            ],
        ],
        'common\assets\IoniconsAsset' => [
            'sourcePath' => null,
            'css' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.css' : 'https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css',
            ],
        ],
        'common\assets\JqueryKnobAsset' => [
            'sourcePath' => null,
            'js' => [
                'https://cdn.bootcss.com/jQuery-Knob/1.2.13/jquery.knob.min.js',
            ],
        ],
        'common\assets\MochaAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/mocha/1.21.5/mocha.js' : 'https://cdn.bootcss.com/mocha/1.21.5/mocha.min.js',
            ],
            'css' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/mocha/1.21.5/mocha.css' : 'https://cdn.bootcss.com/mocha/1.21.5/mocha.min.css',
            ],
        ],
        'common\assets\Moment' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/moment.js/2.11.2/moment.js' : 'https://cdn.bootcss.com/moment.js/2.11.2/moment.min.js',
            ],
        ],
        'common\assets\MorrisAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/morris.js/0.5.1/morris.js' : 'https://cdn.bootcss.com/morris.js/0.5.1/morris.min.js',
            ],
            'css' => [
                'https://cdn.bootcss.com/morris.js/0.5.1/morris.css',
            ],
        ],
        'common\assets\PaceAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/pace/1.0.2/pace.js' : 'https://cdn.bootcss.com/pace/1.0.2/pace.min.js',
            ],
        ],
        'common\assets\RaphaelAsset' => [
            'sourcePath' => null,
            'js' => [
                'https://cdn.bootcss.com/raphael/2.1.4/raphael-min.js',
            ],
        ],
        'common\assets\SlimScrollAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/jQuery-slimScroll/1.3.7/jquery.slimscroll.js' : 'https://cdn.bootcss.com/jQuery-slimScroll/1.3.7/jquery.slimscroll.min.js',
            ],
        ],
        'common\assets\SparklinesAsset' => [
            'sourcePath' => null,
            'js' => [
                YII_ENV_DEV ? 'https://cdn.bootcss.com/jquery-sparklines/2.1.2/jquery.sparkline.js' : 'https://cdn.bootcss.com/jquery-sparklines/2.1.2/jquery.sparkline.min.js',
            ],
        ],
        'common\assets\Wysihtml5Asset' => [
            'sourcePath' => null,
            'js' => [
                'https://cdn.bootcss.com/wysihtml5/0.3.0/wysihtml5.min.js',
            ],
        ],
    ],
    'linkAssets' => true,
    'appendTimestamp' => true,
];