<?php

namespace Kanboard\Plugin\PluginManager\Helper;

use DateTime;
use Kanboard\Core\Base;

class AgeHelper extends Base
{
    /**
     * Calculate Age in Time-Ago Format
     *
     * Time is calculated in seconds - https://www.calculateme.com/time/days/to-seconds/
     * 60s /min
     * 300s /5min
     * 600s /10min
     * 900s /15min
     * 1800s /30min
     * 2700s /45 min
     * 3600s /hour
     * 7200s /2hrs
     * 10800s /3hrs
     * 14400s /4hrs
     * 18000s /5hrs
     * 21600s /6hrs
     * 43200s /12hrs
     * 64800s /18hrs
     * 86400s /day
     *
     * @return  string
     * @author  creecros
     * @author  aljawaid
     */
    public function newAge($timestamp, $now = null)
    {
        if ($now === null) {
            $now = time();
        }

        $diff = $now - $timestamp;

        switch (true) {
            // < 1min
            case $diff < 60:
                return '<span class="age-pass">' . t('less than a minute ago') . '</span>';
            // < 5mins
            case $diff < 300:
                return '<span class="age-pass">' . t('less than 5 minutes ago') . '</span>';
            // < 55mins
            case $diff < 3300:
                return '<span class="age-pass">' . t('around %d minutes ago', $diff / 60) . '</span>';
            // < 1hr
            case $diff < 3600:
                return '<span class="age-pass">' . t('around an hour ago') . '</span>';
            // < 23hrs
            case $diff < 82800:
                return '<span class="age-pass">' . t('around %d hours ago', $diff / 3600) . '</span>';
            // 24hrs
            case $diff < 86400:
                return '<span class="age-pass">' . t('yesterday') . '</span>';
            // 1.5 days
            case $diff < 129600:
                return '<span class="age-pass">' . t('almost 2 days ago') . '</span>';
            // < 6 days
            case $diff < 518400:
                return '<span class="age-pass">' . t('around %d days ago', $diff / 86400) . '</span>';
            // 7 days
            case $diff < 604800:
                return '<span class="age-pass">' . t('about a week ago') . '</span>';
            // < 13 days
            case $diff < 1123200:
                return '<span class="age-pass">' . t('around %d days ago', $diff / 86400) . '</span>';
            // 14 days
            case $diff < 1209600:
                return '<span class="age-pass">' . t('around 2 weeks ago') . '</span>';
            // < 3 weeks
            case $diff < 1814400:
                return '<span class="age-pass">' . t('around %d weeks ago', $diff / 604800) . '</span>';
            // 1 month = an average month has exactly 30.436875 days
            case $diff < 2629746:
                return '<span class="age-pass">' . t('around a month ago') . '</span>';
            // 1-2 months (about 58 days)
            case $diff < 5011200:
                return '<span class="age-pass">' . t('over a month ago') . '</span>';
            // < 11 months
            case $diff < 28927206:
                return '<span class="age-pass">' . t('around %d months ago', $diff / 2629746) . '</span>';
            // 1yr
            case $diff < 31556952:
                return '<span class="age-pass">' . t('a year ago') . '</span>';
            // 1-2 yrs (23 months)
            case $diff < 60484158:
                return '<span class="age-warning">' . t('over a year ago') . '</span>';
            // 2yrs
            case $diff < 63113904:
                return '<span class="age-warning">' . t('around 2 years ago') . '</span>';
            // 2-3yrs (35 months)
            case $diff < 92041110:
                return '<span class="age-danger">' . t('over 2 years ago') . '</span>';
            // 3yrs
            case $diff < 94670856:
                return '<span class="age-danger">' . t('around 3 years ago') . '</span>';
            // 3-4 yrs (47 months)
            case $diff < 123598062:
                return '<span class="age-danger">' . t('over 3 years ago') . '</span>';
            // 4yrs
            case $diff < 126227808:
                return '<span class="age-danger">' . t('around 4 years ago') . '</span>';
            // 4-5yrs (59 months)
            case $diff < 155155014:
                return '<span class="age-danger">' . t('over 4 years ago') . '</span>';
            // 5yrs
            case $diff < 157784760:
                return '<span class="age-danger">' . t('around 5 years ago') . '</span>';
            // 5+ yrs
            case $diff > 157784760:
                return '<span class="age-danger">' . t('over 5 years ago') . '</span>';
            default:
                return '<span class="age-danger">' . t('over 5 years ago') . '</span>';
        }
    }
}
