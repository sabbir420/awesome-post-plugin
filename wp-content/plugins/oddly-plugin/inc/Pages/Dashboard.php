<?php 

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\PathController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\TaxonomyCallbacks;
use Inc\Api\Callbacks\TemplateCallbacks;

/**
* 
*/
class Dashboard extends PathController
{
	public $settings;

	public $callbacks;

	public $tax_callbacks;

	public $pages = array();

	public $subpages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->tem_callbacks = new TemplateCallbacks();

		$this->setPages();

		$this->setSubpages();
		//->addSubPages( $this->subpages )

		//$this->setSettings();
		//$this->setSections();
		//$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Settings' )->addSubPages( $this->subpages )->register();
	}

	public function setPages()
	{
		$this->pages = array(
			array(
				'page_title' => 'Oddly Plugin', 
				'menu_title' => 'Settings Oddly Plugin', 
				'capability' => 'manage_options', 
				'menu_slug' => 'oddly_plugin', 
				'callback' => array( $this->callbacks, 'adminInsert' ), 
				'icon_url' => 'dashicons-admin-tools', 
				'position' => 110
			)
		);
	}

	public function setSubPages()
	{
		$this->subpages = array(
			/*array(
				'parent_slug' => 'oddly_plugin', 
				'page_title' => 'Settings', 
				'menu_title' => 'Settings', 
				'capability' => 'manage_options', 
				'menu_slug' => 'oddly_plugin', 
				'callback' => array( $this->callbacks, 'adminPublication' )
			),*/
			/*array(
				'parent_slug' => 'oddly_plugin', 
				'page_title' => 'Custom Template', 
				'menu_title' => 'Custom Template', 
				'capability' => 'manage_options', 
				'menu_slug' => 'oddly_admin', 
				'callback' => array( $this->callbacks, 'adminCustom' ) 
			),*/
			/*array(
				'parent_slug' => 'oddly_plugin', 
				'page_title' => 'Insert', 
				'menu_title' => 'Insert', 
				'capability' => 'manage_options', 
				'menu_slug' => 'oddly_insert_post', 
				'callback' => array( $this->callbacks, 'adminInsert' )
			),*/
			array(
				'parent_slug' => 'oddly_plugin', 
				'page_title' => 'History', 
				'menu_title' => 'History', 
				'capability' => 'manage_options', 
				'menu_slug' => 'oddly_history', 
				'callback' => array( $this->callbacks, 'adminHistory' )
			),
		);
	}

	/*public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'oddly_plugin_tem_settings',
				'option_name' => 'oddly_plugin_tem',
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
				'page' => 'oddly_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'left',
				'title' => 'Left',
				'callback' => array( $this->tem_callbacks, 'checkboxField' ),
				'page' => 'oddly_plugin',
				'section' => 'oddly_tem_index',
				'args' => array(
					'label_for' => 'left',
					'class' => 'ui-toggle',
				)
			),
			array(
				'id' => 'right',
				'title' => 'Right',
				'callback' => array( $this->tem_callbacks, 'checkboxField' ),
				'page' => 'oddly_plugin',
				'section' => 'oddly_tem_index',
				'args' => array(
					'label_for' => 'right',
					'class' => 'ui-toggle',
				)
			)
		);

		$this->settings->setFields( $args );
	}*/
}