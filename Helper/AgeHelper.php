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

        switch (true) {
            case $diff < 60:
                return '<span class="age-pass">' . t('less than a minute ago') . '</span>';
            case $diff < 3600:
            // <1h
                return '<span class="age-pass">' . t('around %d minutes ago', $diff / 60) . '</span>';
            case $diff < 86400:
            // <24h
                return '<span class="age-pass">' . t('around %d hours ago', $diff / 3600) . '</span>';
            case $diff < 604800:
            // <7D
                return '<span class="age-pass">' . t('around %d days ago', $diff / 86400) . '</span>';
            case $diff < 2592000:
            // <30D
                return '<span class="age-pass">' . t('around %d weeks ago', $diff / 604800) . '</span>';
            case $diff < 31104000:
            // <360D
                return '<span class="age-pass">' . t('around %d months ago', $diff / 2592000) . '</span>';
            case $diff < 62208000:
            // <360D*2
                return '<span class="age-warning">' . t('over a year ago') . '</span>';
            default:
                return '<span class="age-danger">' . t('over %d years ago', $diff / 31104000) . '</span>';
        }
    }
}
