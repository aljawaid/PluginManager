<?php

namespace Kanboard\Plugin\PluginManager\Tests;

use RuntimeException;

/**
 * Provides dependency-free assertions for PluginManager's focused regression tests.
 *
 * Related test files: tests/SecurityBoundaryTest.php and tests/run.php.
 */
final class TestAssertions
{
    private int $assertions = 0;

    public function same($expected, $actual, string $message): void
    {
        $this->assertions++;

        if ($expected !== $actual) {
            throw new RuntimeException($message . sprintf(
                ' (expected %s, received %s)',
                var_export($expected, true),
                var_export($actual, true)
            ));
        }
    }

    public function true(bool $condition, string $message): void
    {
        $this->assertions++;

        if (! $condition) {
            throw new RuntimeException($message);
        }
    }

    public function count(): int
    {
        return $this->assertions;
    }
}
