<?php

namespace Kanboard\Plugin\PluginManager\Tests;

/**
 * Verifies every Locale translation catalogue and Locale/translations-starter-template.php.
 */
final class TranslationCatalogTest
{
    public function run(string $pluginRoot, TestAssertions $assertions): void
    {
        $english = require $pluginRoot . '/Locale/en_GB/translations.php';

        foreach (array('de_DE', 'es_ES', 'fr_FR') as $locale) {
            $catalog = require $pluginRoot . '/Locale/' . $locale . '/translations.php';
            $assertions->same(array_keys($english), array_keys($catalog), $locale . ' must contain the complete ordered key set');
            $assertions->true(
                count(array_filter($catalog, static fn ($translation): bool => $translation === '')) === 0,
                $locale . ' must not contain blank translations'
            );
        }

        $starter = require $pluginRoot . '/Locale/translations-starter-template.php';
        $assertions->same(array_keys($english), array_keys($starter), 'The translation starter must contain the complete ordered key set');
    }
}
