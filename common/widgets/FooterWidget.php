<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */

namespace common\widgets;

/**
 * Description of FooterWidget
 *
 * @author vistart <i@vistart.name>
 */
class FooterWidget extends \yii\base\Widget
{
    public $powered = [
        'label' => 'vistart',
        'link' => 'https://vistart.name'
    ];
    
    public $cnzzCode = <<<EOT
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1255444435'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1255444435' type='text/javascript'%3E%3C/script%3E"));</script>
EOT;

    public function run()
    {
        return $this->render('footer', ['powered' => $this->powered, 'cnzzCode' => $this->cnzzCode]);
    }
}
