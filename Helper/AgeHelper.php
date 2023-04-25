<?php

namespace Kanboard\Plugin\PluginManager\Helper;

use DateTime;
use Kanboard\Core\Base;

class AgeHelper extends Base
{
    public function newAge($timestamp, $now = null)
    {
        if ($now === null) {
            $now = time();
        }

        $diff = $now - $timestamp;

        // Time is in seconds
        // 60s /min
        // 300s /5min
        // 600s /10min
        // 900s /15min
        // 1800s /30min
        // 2700s /45 min
        // 3600s /hour
        // 7200s /2hrs
        // 10800s /3hrs
        // 14400s /4hrs
        // 18000s /5hrs
        // 21600s /6hrs
        // 43200s /12hrs
        // 64800s /18hrs
        // 86400s /day

        switch ($diff) {
            case $diff < 60 :       return '<span class="age-pass">'. t('less than a minute ago') .'</span>';
            case $diff < 3600 :     return '<span class="age-pass">'. t('around %d minutes ago', $diff / 60)  .'</span>';   // <1h
            case $diff < 86400 :    return '<span class="age-pass">'. t('around %d hours ago', $diff / 3600)    .'</span>';   // <24h
            case $diff < 604800 :   return '<span class="age-pass">'. t('around %d days ago', $diff / 86400)     .'</span>';   // <7D
            case $diff < 2592000 :  return '<span class="age-pass">'. t('around %d weeks ago', $diff / 604800)    .'</span>';   // <30D 
            case $diff < 31104000 : return '<span class="age-pass">'. t('around %d months ago', $diff / 2592000)   .'</span>';   // <360D
            case $diff < 62208000 : return '<span class="age-warning">'. t('over a year ago')     .'</span>';   // <360D*2
            default:
                return '<span class="age-danger">'. t('over %d years ago' , $diff / 31104000) .'</span>'; 
        }
    }
}
