<?php

use Kanboard\Core\Tool;
use Kanboard\Plugin\PluginManager\Tests\DirectoryDataTest;
use Kanboard\Plugin\PluginManager\Tests\SecurityBoundaryTest;
use Kanboard\Plugin\PluginManager\Tests\TestAssertions;
use Kanboard\Plugin\PluginManager\Tests\TranslationCatalogTest;

/**
 * Boots the supported Kanboard release and runs PluginManager's focused regression tests.
 *
 * Related test files: tests/TestAssertions.php, tests/SecurityBoundaryTest.php,
 * tests/DirectoryDataTest.php and tests/TranslationCatalogTest.php.
 */

$kanboardPath = getenv('KANBOARD_PATH');
if (! is_string($kanboardPath) || $kanboardPath === '' || ! is_file($kanboardPath . '/app/common.php')) {
    fwrite(STDERR, "Set KANBOARD_PATH to a Kanboard 1.2.54 checkout.\n");
    exit(1);
}

$sandbox = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'pluginmanager-tests-' . bin2hex(random_bytes(8));
$pluginsDirectory = $sandbox . DIRECTORY_SEPARATOR . 'plugins';

if (! mkdir($pluginsDirectory, 0700, true)) {
    fwrite(STDERR, "Unable to create the PluginManager test sandbox.\n");
    exit(1);
}

define('PLUGINS_DIR', $pluginsDirectory);
define('PLUGIN_INSTALLER', true);
define('DB_FILENAME', $sandbox . DIRECTORY_SEPARATOR . 'test.sqlite');

try {
    require $kanboardPath . '/app/common.php';
    require dirname(__DIR__) . '/Core/ManualPluginInstaller.php';
    require dirname(__DIR__) . '/Controller/PluginManagerController.php';
    require dirname(__DIR__) . '/Helper/AgeHelper.php';
    require dirname(__DIR__) . '/Helper/PluginManagerHelper.php';
    require dirname(__DIR__) . '/Plugin.php';
    require __DIR__ . '/TestAssertions.php';
    require __DIR__ . '/SecurityBoundaryTest.php';
    require __DIR__ . '/DirectoryDataTest.php';
    require __DIR__ . '/TranslationCatalogTest.php';

    $assertions = new TestAssertions();
    (new SecurityBoundaryTest())->run($container, $sandbox, $assertions);
    (new DirectoryDataTest())->run($container, $assertions);
    (new TranslationCatalogTest())->run(dirname(__DIR__), $assertions);

    echo 'PluginManager focused regression suite: ' . $assertions->count() . " assertions passed.\n";
} catch (Throwable $exception) {
    fwrite(STDERR, $exception::class . ': ' . $exception->getMessage() . "\n");
    exit(1);
} finally {
    if (isset($container) && isset($container['db'])) {
        $container['db']->closeConnection();
    }

    if (class_exists(Tool::class) && is_dir($sandbox)) {
        Tool::removeAllFiles($sandbox);
    }
}
