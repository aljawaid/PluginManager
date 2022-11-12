<?php

namespace Kanboard\Plugin\KanboardPluginsUX\Helper;

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
            return t('less than a minute ago');
        } elseif ($diff < 300) {
            return t('less than 5 minutes ago');
        } elseif ($diff < 600) {
            return t('less than 10 minutes ago');
        } elseif ($diff < 900) {
            return t('around 15 minutes ago');
        } elseif ($diff < 1800) {
            return t('around half an hour ago');
        } elseif ($diff < 2700) {
            return t('around 45 minutes ago');
        } elseif ($diff < 3600) {
            return t('around an hour ago');
        } elseif ($diff < 7200) {
            return t('around 2 hours ago');
        } elseif ($diff < 10800) {
            return t('around 3 hours ago');
        } elseif ($diff < 14400) {
            return t('around 4 hours ago');
        } elseif ($diff < 18000) {
            return t('around 5 hours ago');
        } elseif ($diff < 21600) {
            return t('around 6 hours ago');
        } elseif ($diff < 43200) {
            return t('around 12 hours ago');
        } elseif ($diff < 64800) {
            return t('earlier today');
        } elseif ($diff < 86400) {
            return t('yesterday');
        } elseif ($diff < (86400 * 3)) {
            return 'a few days ago';
        } elseif ($diff < (86400 * 5)) {
            return 'less than a week ago';
        } elseif ($diff < (86400 * 7)) {
            return 'about a week ago';
        } elseif ($diff < (86400 * 9)) {
            return 'over a week ago';
        } elseif ($diff < (86400 * 10)) {
            return 'about 10 days ago';
        } elseif ($diff < (86400 * 14)) {
            return 'about 2 weeks ago';
        } elseif ($diff < (86400 * 16)) {
            return 'just over 2 weeks ago';
        } elseif ($diff < (86400 * 19)) {
            return 'nearly 3 weeks ago';
        } elseif ($diff < (86400 * 21)) {
            return 'about 3 weeks ago';
        } elseif ($diff < (86400 * 27)) {
            return 'over 3 weeks ago';
        } elseif ($diff < (86400 * 31)) {
            return 'about a month ago';
        } elseif ($diff < (86400 * 35)) {
            return 'just over a month ago';
        } elseif ($diff < (86400 * 59)) {
            return 'over a month ago';
        } elseif ($diff < (86400 * 61)) {
            return 'about 2 months ago';
        } elseif ($diff < (86400 * 88)) {
            return 'over 2 months ago';
        } elseif ($diff < (86400 * 91)) {
            return 'about 3 months ago';
        } elseif ($diff < (86400 * 97)) {
            return 'just over 3 months ago';
        } elseif ($diff < (86400 * 118)) {
            return 'over 3 months ago';
        } elseif ($diff < (86400 * 120)) {
            return 'about 4 months ago';
        } elseif ($diff < (86400 * 149)) {
            return 'over 4 months ago';
        } elseif ($diff < (86400 * 150)) {
            return 'about 5 months ago';
        } elseif ($diff < (86400 * 159)) {
            return 'just over 5 months ago';
        } elseif ($diff < (86400 * 180)) {
            return 'about 6 months ago';
        } elseif ($diff < (86400 * 200)) {
            return 'just over 6 months ago';
        } elseif ($diff < (86400 * 363)) {
            return 'over 6 months ago';
        } elseif ($diff < (86400 * 365)) {
            return 'a year ago';
        } elseif ($diff < (86400 * 385)) {
            return 'just over a year ago';
        } elseif ($diff < (86400 * 729)) {
            return 'over a year ago';
        } elseif ($diff < (86400 * 740)) {
            return 'about 2 years ago';
        } elseif ($diff < (86400 * 1094)) {
            return 'over 2 years ago';
        } elseif ($diff < (86400 * 1105)) {
            return 'about 3 years ago';
        } elseif ($diff < (86400 * 1400)) {
            return 'over 3 years ago';
        } elseif ($diff < (86400 * 1470)) {
            return 'about 4 years ago';
        } elseif ($diff < (86400 * 1800)) {
            return 'over 4 years ago';
        } elseif ($diff <= (86400 * 1828)) {
            return 'about 5 years ago';
        } elseif ($diff > (86400 * 1828)) {
            return 'over 5 years ago';
        }
        return 'If you see this return, I have made a mistake';;
    }
}
