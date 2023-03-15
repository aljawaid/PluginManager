<?php

namespace Kanboard\Plugin\PluginManager\Helper;

use Kanboard\Core\Base;
use Kanboard\Core\Http\Client;
use Kanboard\Core\Plugin\Directory;

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

    public function countTypes($available_plugins)
    {
        $types = array();
        foreach ($available_plugins as $plugin) {
            if (isset($plugin['is_type'])) {
                if ($plugin['is_type'] == 'plugin') { array_push($types, 'plugin'); }
                elseif ($plugin['is_type'] == 'action') { array_push($types, 'action'); }
                elseif ($plugin['is_type'] == 'theme') { array_push($types, 'theme'); }
                elseif ($plugin['is_type'] == 'multi') { array_push($types, 'multi'); }
                elseif ($plugin['is_type'] == 'connector') { array_push($types, 'connector'); }
            }
        }
        $count_types = array_count_values($types);
        return $count_types;
    }

    public function getAllPlugins($url = PLUGIN_API_URL)
    {
        $manual_plugins = $this->httpClient->getJson($url);
        $manual_plugins = array_filter($manual_plugins, array($this, 'isNotInstallable'));
        return $manual_plugins;

    }

    public function isNotInstallable(array $plugin)
    {
        return $plugin['remote_install'] == false;
    }

    public function lastUpdatedDirectory()
    {
        // https://www.appsloveworld.com/php/12/get-the-last-modified-date-of-a-remote-file
        $curl = curl_init(PLUGIN_API_URL);

        //don't fetch the actual page, you only want headers
        curl_setopt($curl, CURLOPT_NOBODY, true);

        //stop it from outputting stuff to stdout
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // attempt to retrieve the modification date
        curl_setopt($curl, CURLOPT_FILETIME, true);

        $result = curl_exec($curl);

        if ($result === false) {
            die (curl_error($curl));
        }

        $timestamp = curl_getinfo($curl, CURLINFO_FILETIME);

        if ($timestamp != -1) { //otherwise unknown
            return date("d F Y H:i", $timestamp); //etc
        }
    }
}
