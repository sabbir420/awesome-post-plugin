<?php 
/**
 * @package  OddlyPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\PathController;

class AdminCallbacks extends PathController
{

	public function adminPublication()
	{
		return require_once( "$this->plugin_path/templates/settings.php" );
		//return require_once( "$this->dir"."wp-admin/edit.php?post_type=publication" );
	}

	public function adminCustom()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function adminCategories()
	{
		return require_once( "$this->plugin_path/templates/categories.php" );
	}

	public function adminTag()
	{
		return require_once( "$this->plugin_path/templates/tag.php" );
	}

	public function adminInsert()
	{
		return require_once( "$this->plugin_path/templates/insert-post.php" );
	}

	public function adminHistory()
	{
		return require_once( "$this->plugin_path/templates/history.php" );
	}

	/*public function adminTaxonomy()
	{
		return require_once( "$this->plugin_path/templates/taxonomy.php" );
	}

	public function adminWidget()
	{
		return require_once( "$this->plugin_path/templates/widget.php" );
	}*/

	public function oddlyOptionsGroup( $input )
	{
		return $input;
	}

	public function oddlyAdminSection()
	{
		echo 'Add Custom Taxonomy';
	}

	public function addCustomTaxonomy()
	{
		$value = esc_attr( get_option( 'add_taxonomy' ) );
		echo '<input type="text" class="regular-text" name="add_taxonomy" value="' . $value . '" placeholder="Add Taxonomy">';
	}

	/*public function alecadddFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}*/
}