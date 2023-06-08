<?php

/**
 *
 * Hero
 * @package Dashboard
 *
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $pagenow;

$screen = get_current_screen(); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
$user   = wp_get_current_user(); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound

?>
