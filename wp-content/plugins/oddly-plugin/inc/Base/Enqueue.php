<?php 
/**
 * @package  OddlyPlugin
 */
namespace Inc\Base;

use \Inc\Base\PathController;

/**
* 
*/
class Enqueue extends PathController
{
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}
	
	function enqueue() {
		// enqueue all css and scripts
		wp_enqueue_style( 'pluginstyle', $this->plugin_url . 'assets/mystyle.css' );
		wp_enqueue_script( 'pluginscript', $this->plugin_url . 'assets/myscript.js' );
	}
}