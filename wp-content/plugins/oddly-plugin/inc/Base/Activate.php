<?php
/**
 * @package  OddlyPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		$default = array();

		if ( ! get_option( 'oddly_plugin_tax' ) ) {
			update_option( 'oddly_plugin_tax', $default );
		}
	}
}