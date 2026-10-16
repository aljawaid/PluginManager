<?php

namespace Kanboard\Plugin\PluginManager\Tests;

use Kanboard\Plugin\PluginManager\Helper\PluginManagerHelper;
use Pimple\Container;

/**
 * Verifies Helper/PluginManagerHelper.php directory identity and data handling.
 */
final class DirectoryDataTest
{
    public function run(Container $container, TestAssertions $assertions): void
    {
        $helper = new PluginManagerHelper($container);
        $plugins = array(
            'InternalBeta' => array('title' => 'Alpha display name', 'version' => '4.10.0'),
            'InternalAlpha' => array('title' => 'Zulu display name', 'version' => '1.0.0'),
        );
        $sorted = $helper->sortPluginsByTitle($plugins);

        $assertions->same(
            array('InternalBeta', 'InternalAlpha'),
            array_keys($sorted),
            'Sorting by display title must preserve directory plugin IDs'
        );
        $assertions->true(
            $helper->isPluginUpdateAvailable(array('InternalBeta' => '4.9.0'), 'InternalBeta', $plugins['InternalBeta']),
            'Version 4.10.0 must be newer than version 4.9.0'
        );
        $assertions->true(
            ! $helper->isPluginUpdateAvailable(array('Alpha display name' => '4.9.0'), 'InternalBeta', $plugins['InternalBeta']),
            'A display title must not be treated as the plugin identity'
        );
        $assertions->same(
            'https://example.test/plugin.zip',
            $helper->getExternalUrl('https://example.test/plugin.zip'),
            'Valid HTTPS directory links must be retained'
        );
        $assertions->same('', $helper->getExternalUrl('javascript:alert(1)'), 'Unsafe directory links must be rejected');
    }
}
