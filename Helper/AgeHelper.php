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

        if ($diff < 60) {
            return '<span class="age-pass">'. t('less than a minute ago') .'</span>';
        } elseif ($diff < 300) {
            return '<span class="age-pass">'. t('less than 5 minutes ago') .'</span>';
        } elseif ($diff < 600) {
            return '<span class="age-pass">'. t('less than 10 minutes ago') .'</span>';
        } elseif ($diff < 900) {
            return '<span class="age-pass">'. t('around 15 minutes ago') .'</span>';
        } elseif ($diff < 1800) {
            return '<span class="age-pass">'. t('around half an hour ago') .'</span>';
        } elseif ($diff < 2700) {
            return '<span class="age-pass">'. t('around 45 minutes ago') .'</span>';
        } elseif ($diff < 3600) {
            return '<span class="age-pass">'. t('around an hour ago') .'</span>';
        } elseif ($diff < 7200) {
            return '<span class="age-pass">'. t('around 2 hours ago') .'</span>';
        } elseif ($diff < 10800) {
            return '<span class="age-pass">'. t('around 3 hours ago') .'</span>';
        } elseif ($diff < 14400) {
            return '<span class="age-pass">'. t('around 4 hours ago') .'</span>';
        } elseif ($diff < 18000) {
            return '<span class="age-pass">'. t('around 5 hours ago') .'</span>';
        } elseif ($diff < 21600) {
            return '<span class="age-pass">'. t('around 6 hours ago') .'</span>';
        } elseif ($diff < 43200) {
            return '<span class="age-pass">'. t('around 12 hours ago') .'</span>';
        } elseif ($diff < 64800) {
            return '<span class="age-pass">'. t('earlier today') .'</span>';
        } elseif ($diff < 86400) {
            return '<span class="age-pass">'. t('yesterday') .'</span>';
        } elseif ($diff < (86400 * 3)) {
            return '<span class="age-pass">'. t('a few days ago') .'</span>';
        } elseif ($diff < (86400 * 5)) {
            return '<span class="age-pass">'. t('less than a week ago') .'</span>';
        } elseif ($diff < (86400 * 7)) {
            return '<span class="age-pass">'. t('about a week ago') .'</span>';
        } elseif ($diff < (86400 * 9)) {
            return '<span class="age-pass">'. t('over a week ago') .'</span>';
        } elseif ($diff < (86400 * 10)) {
            return '<span class="age-pass">'. t('about 10 days ago') .'</span>';
        } elseif ($diff < (86400 * 14)) {
            return '<span class="age-pass">'. t('about 2 weeks ago') .'</span>';
        } elseif ($diff < (86400 * 16)) {
            return '<span class="age-pass">'. t('just over 2 weeks ago') .'</span>';
        } elseif ($diff < (86400 * 19)) {
            return '<span class="age-pass">'. t('nearly 3 weeks ago') .'</span>';
        } elseif ($diff < (86400 * 21)) {
            return '<span class="age-pass">'. t('about 3 weeks ago') .'</span>';
        } elseif ($diff < (86400 * 27)) {
            return '<span class="age-pass">'. t('over 3 weeks ago') .'</span>';
        } elseif ($diff < (86400 * 31)) {
            return '<span class="age-pass">'. t('about a month ago') .'</span>';
        } elseif ($diff < (86400 * 35)) {
            return '<span class="age-pass">'. t('just over a month ago') .'</span>';
        } elseif ($diff < (86400 * 59)) {
            return '<span class="age-pass">'. t('over a month ago') .'</span>';
        } elseif ($diff < (86400 * 61)) {
            return '<span class="age-pass">'. t('about 2 months ago') .'</span>';
        } elseif ($diff < (86400 * 88)) {
            return '<span class="age-pass">'. t('over 2 months ago') .'</span>';
        } elseif ($diff < (86400 * 91)) {
            return '<span class="age-pass">'. t('about 3 months ago') .'</span>';
        } elseif ($diff < (86400 * 97)) {
            return '<span class="age-pass">'. t('just over 3 months ago') .'</span>';
        } elseif ($diff < (86400 * 118)) {
            return '<span class="age-pass">'. t('over 3 months ago') .'</span>';
        } elseif ($diff < (86400 * 120)) {
            return '<span class="age-pass">'. t('about 4 months ago') .'</span>';
        } elseif ($diff < (86400 * 149)) {
            return '<span class="age-pass">'. t('over 4 months ago') .'</span>';
        } elseif ($diff < (86400 * 150)) {
            return '<span class="age-pass">'. t('about 5 months ago') .'</span>';
        } elseif ($diff < (86400 * 159)) {
            return '<span class="age-pass">'. t('just over 5 months ago') .'</span>';
        } elseif ($diff < (86400 * 180)) {
            return '<span class="age-pass">'. t('about 6 months ago') .'</span>';
        } elseif ($diff < (86400 * 200)) {
            return '<span class="age-pass">'. t('just over 6 months ago') .'</span>';
        } elseif ($diff < (86400 * 363)) {
            return '<span class="age-pass">'. t('over 6 months ago') .'</span>';
        } elseif ($diff < (86400 * 365)) {
            return '<span class="age-pass">'. t('a year ago') .'</span>';
        } elseif ($diff < (86400 * 385)) {
            return '<span class="age-warning">'. t('just over a year ago') .'</span>';
        } elseif ($diff < (86400 * 729)) {
            return '<span class="age-warning">'. t('over a year ago') .'</span>';
        } elseif ($diff < (86400 * 740)) {
            return '<span class="age-warning">'. t('about 2 years ago') .'</span>';
        } elseif ($diff < (86400 * 1094)) {
            return '<span class="age-danger">'. t('over 2 years ago') .'</span>';
        } elseif ($diff < (86400 * 1105)) {
            return '<span class="age-danger">'. t('about 3 years ago') .'</span>';
        } elseif ($diff < (86400 * 1400)) {
            return '<span class="age-danger">'. t('over 3 years ago') .'</span>';
        } elseif ($diff < (86400 * 1470)) {
            return '<span class="age-danger">'. t('about 4 years ago') .'</span>';
        } elseif ($diff < (86400 * 1800)) {
            return '<span class="age-danger">'. t('over 4 years ago') .'</span>';
        } elseif ($diff <= (86400 * 1828)) {
            return '<span class="age-danger">'. t('about 5 years ago') .'</span>';
        } elseif ($diff > (86400 * 1828)) {
            return '<span class="age-danger">'. t('over 5 years ago') .'</span>';
        }
        return 'If you see this return, I have made a mistake';;
    }
}
