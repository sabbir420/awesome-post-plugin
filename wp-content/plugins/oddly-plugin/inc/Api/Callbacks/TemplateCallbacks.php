<?php 
/**
 * @package  OddlyPlugin
 */
namespace Inc\Api\Callbacks;
use Inc\Base\PathController;

class TemplateCallbacks extends PathController
{
    public function checkboxSanitize( $input )
	{
		// return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
		return ( isset($input) ? true : false );
	}

	public function templateSectionManager()
	{
		echo 'Choose your custom template style';
	}

	public function checkboxField( $args )
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$checkbox = get_option( $option_name );
		$checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;
		//$checked = ($checkbox == 'true' ? ' checked="checked"' : '');
		//$checked = true;
		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="'. $checkbox . '" class="" ' . ( $checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
	}

	public function checkboxFieldLeft()
	{
		$value = esc_attr( get_option( 'oddly_plugin_tem_left' ) );
		echo '<input type="checkbox" class="regular-text" name="oddly_plugin_tem_left" value="' . $value . '">';
	}

	public function checkboxFieldRight()
	{
		$value = esc_attr( get_option( 'oddly_plugin_tem_right' ) );
		echo '<input type="checkbox" class="regular-text" name="oddly_plugin_tem_right" value="' . $value . '">';
	}

	function radioField() {
		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$options = get_option($option_name);
		$items = array("Left", "Right");
		foreach($items as $item) {
			$checked = ($options[$name]==$item) ? ' checked="checked" ' : '';
			echo '<label><input type="radio" id="' . $name . '" name="' . $option_name . '[' . $name . ']" class="" ' . $checked . '/>'. $item .'</label><br />';
		}
	}
}