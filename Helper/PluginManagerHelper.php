<?php

namespace Kanboard\Plugin\PluginManager\Helper;

use Kanboard\Core\Base;

class PluginManagerHelper extends Base
{
    public function checkRootDomain($url)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        $domain = implode('.', array_slice(explode('.', parse_url($url, PHP_URL_HOST)), -2));
        if ($domain == 'github.com') {
            return '/blob/master/README.md';
        } elseif ($domain == 'gitlab.com') {
            return '/-/blob/master/README.md';
        } elseif ($domain == 'gitea.com') {
            return '/src/branch/main/README.md';
        } else {
            return false;
        }
    }
}
