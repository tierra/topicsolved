<?php
/**
 * This file is part of the phpBB Topic Solved extension package.
 *
 * @copyright (c) Bryan Petty
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * @package tierra/topicsolved/travis
 */

const MINIMUM_COVERAGE = 75.0;

$coverage = simplexml_load_file(dirname(__DIR__) . '/clover.xml');

if ($coverage === false)
{
	echo "Error: Failed to load clover coverage report.\n";
	exit(1);
}

$elements = (float) $coverage->project->metrics['elements'];
$covered_elements = (float) $coverage->project->metrics['coveredelements'];
$percent = 100 * ($covered_elements / $elements);

echo sprintf("Total Test Coverage: %d%%\n", $percent);

if ($percent < MINIMUM_COVERAGE)
{
	echo "Error: Test coverage does not meet minimum requirements.\n";
	exit(1);
}

echo sprintf("Test coverage meets minimum requirement: %d%%\n", MINIMUM_COVERAGE);
