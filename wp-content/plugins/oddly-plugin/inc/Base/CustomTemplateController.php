<?php 
/**
 * @package  OddlyPlugin
 */
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\PathController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\TemplateCallbacks;

/**
* 
*/
class CustomTemplateController extends PathController
{
	public $settings;

	public $callbacks;

	public $tax_callbacks;

	public $subpages = array();

	public $taxonomies = array();

	public function register()
	{

		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->tem_callbacks = new TemplateCallbacks();

		$this->setSubpages();

		$this->setSettings();

		$this->setSections();

		$this->setFields();

		$this->settings->addSubPages( $this->subpages )->register();

	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'oddly_plugin', 
				'page_title' => 'Custom Template', 
				'menu_title' => 'Custom Template Manager', 
				'capability' => 'manage_options', 
				'menu_slug' => 'oddly_admin', 
				'callback' => array( $this->callbacks, 'adminCustom' )
			)
		);
	}

	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'oddly_plugin_tem_settings',
				'option_name' => 'oddly_plugin_tem_left',
				'callback' => array($this->tem_callbacks, 'checkboxSanitize')
			),
			array(
				'option_group' => 'oddly_plugin_tem_settings',
				'option_name' => 'oddly_plugin_tem_right',
				'callback' => array($this->tem_callbacks, 'checkboxSanitize')
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'oddly_tem_index',
				'title' => 'Custom Template Manager',
				'callback' => array($this->tem_callbacks, 'templateSectionManager'),
				'page' => 'oddly_admin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'oddly_plugin_tem_left',
				'title' => 'Left',
				'callback' => array( $this->tem_callbacks, 'checkboxFieldLeft' ),
				'page' => 'oddly_admin',
				'section' => 'oddly_tem_index',
				'args' => array(
					//'option_name' => 'oddly_plugin_tem',
					'label_for' => 'oddly_plugin_tem_left',
					'class' => 'ui-toggle',
				)
			),
			array(
				'id' => 'oddly_plugin_tem_right',
				'title' => 'Right',
				'callback' => array( $this->tem_callbacks, 'checkboxFieldRight' ),
				'page' => 'oddly_admin',
				'section' => 'oddly_tem_index',
				'args' => array(
					//'option_name' => 'oddly_plugin_tem',
					'label_for' => 'oddly_plugin_tem_right',
					'class' => 'ui-toggle',
				)
			)
		);

		$this->settings->setFields( $args );
	}
}