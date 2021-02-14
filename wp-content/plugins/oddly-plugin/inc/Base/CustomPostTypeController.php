<?php 
/**
 * @package  OddlyPlugin
 */
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\PathController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
* 
*/
class CustomPostTypeController extends PathController
{
	public $callbacks;

	public $subpages = array();

	public $custom_post_types = array();

	public $custom_taxonomy = array();

	public function register()
	{

		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		//$this->setSubpages();

		//$this->settings->addSubPages( $this->subpages )->register();

		$this->storeCustomPostTypes();

		if ( ! empty( $this->custom_post_types)) {
			add_action( 'init', array( $this, 'registerCustomPostTypes' ) );

			//add_action( 'init', array( $this, 'registerTaxonomy' ) );
		}
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'oddly_plugin', 
				'page_title' => 'Custom Post Types', 
				'menu_title' => 'CPT Manager', 
				'capability' => 'manage_options', 
				'menu_slug' => 'oddly_cpt', 
				'callback' => array( $this->callbacks, 'adminPublication' )
			)
		);
	}

	public function storeCustomPostTypes()
	{
		$this->custom_post_types[] = array(
			'post_type'             => 'publication',
			'name'                  => 'Publications',
			'singular_name'         => 'Publication',
			'menu_name'             => 'Awesome Post',
			//'name_admin_bar'        => '',
			//'archives'              => '',
			//'attributes'            => '',
			'parent_item_colon'     => 'Pareny Item: ',
			'all_items'             => 'All Items',
			'add_new_item'          => 'Add New',
			'add_new'               => 'Add New',
			'new_item'              => 'New Items',
			'edit_item'             => 'Edit',
			'update_item'           => 'Update',
			'view_item'             => 'View Item',
			'view_items'            => 'View Items',
			'search_items'          => 'Search Publications',
			'not_found'             => 'Not Found',
			'not_found_in_trash'    => 'Not Found in Trash',
			//'featured_image'        => '',
			//'set_featured_image'    => '',
			//'remove_featured_image' => '',
			//'use_featured_image'    => '',
			//'insert_into_item'      => '',
			//'uploaded_to_this_item' => '',
			//'items_list'            => '',
			//'items_list_navigation' => '',
			//'filter_items_list'     => '',
			'label'                 => array(
				'name' => __('Publication')
			),
			//'description'           => '',
			'supports'              => array('title', 'editor', 'thumbnail', 'author', 'excerpt'),
			//'taxonomies'            => array('categories', 'post_tags'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			//'show_in_admin_bar'     => true,
			//'show_in_nav_menus'     => true,
			//'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'query_var' 			=> true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post'
		);

		/*$this->custom_taxonomy = array(
			array(
				'type'					=> 'category',
				'name'                  => 'Categories',
				'singular_name'         => 'Category',
				'parent_item'			=> 'Parent Category',
				'parent_item_colon'     => 'Parent Category:',
				'all_items'             => 'All Categories',
				'add_new_item'          => 'Add New Category',
				'add_new'               => 'Add New',
				'new_item'              => 'New Category',
				'edit_item'             => 'Edit Category',
				'update_item'           => 'Update Category',
				'search_items'          => 'Search Category',
				'hierarchical'          => true,
				'show_ui'               => true,
				'show_admin_column'		=> true,
				'rewrite'				=> array('slug' => 'category')
			),
			array(
				'type'					=> 'tag',
				'name'                  => 'Tags',
				'singular_name'         => 'Tag',
				'parent_item'			=> 'Parent Tag',
				'parent_item_colon'     => 'Parent Tag:',
				'all_items'             => 'All Tags',
				'add_new_item'          => 'Add New Tag',
				'add_new'               => 'Add New',
				'new_item'              => 'New Tag',
				'edit_item'             => 'Edit Tag',
				'update_item'           => 'Update Tag',
				'search_items'          => 'Search Tag',
				'hierarchical'          => false,
				'show_ui'               => true,
				'show_admin_column'		=> true,
				'rewrite'				=> array('slug' => 'tag')
			),
			array(
				'type'					=> 'add_year',
				'name'                  => 'Add Year',
				'singular_name'         => 'Year',
				'parent_item'			=> 'Parent Year',
				'parent_item_colon'     => 'Parent Year:',
				'all_items'             => 'All Years',
				'add_new_item'          => 'Add Year',
				'add_new'               => 'Add Year',
				'new_item'              => 'New Year',
				'edit_item'             => 'Edit Year',
				'update_item'           => 'Update Year',
				'search_items'          => 'Search Year',
				'hierarchical'          => true,
				'show_ui'               => true,				
				'rewrite'				=> array('slug' => 'add_year')
			),
			array(
				'type'					=> 'type',
				'name'                  => 'Types',
				'singular_name'         => 'Type',
				'parent_item'			=> 'Parent Type',
				'parent_item_colon'     => 'Parent Type:',
				'all_items'             => 'All Type',
				'add_new_item'          => 'Add Type',
				'add_new'               => 'Add Type',
				'new_item'              => 'New Type',
				'edit_item'             => 'Edit Type',
				'update_item'           => 'Update Type',
				'search_items'          => 'Search Type',
				'hierarchical'          => true,
				'show_ui'               => true,
				'rewrite'				=> array('slug' => 'type')
			),
			array(
				'type'					=> 'language',
				'name'                  => 'Languages',
				'singular_name'         => 'Language',
				'parent_item'			=> 'Parent Language',
				'parent_item_colon'     => 'Parent Language:',
				'all_items'             => 'All Language',
				'add_new_item'          => 'Add Language',
				'add_new'               => 'Add Language',
				'new_item'              => 'New Language',
				'edit_item'             => 'Edit Language',
				'update_item'           => 'Update Language',
				'search_items'          => 'Search Language',
				'hierarchical'          => true,
				'show_ui'               => true,
				'rewrite'				=> array('slug' => 'language')
			),
			array(
				'type'					=> 'topic',
				'name'                  => 'Topics',
				'singular_name'         => 'Topic',
				'parent_item'			=> 'Parent Topic',
				'parent_item_colon'     => 'Parent Topic:',
				'all_items'             => 'All Topic',
				'add_new_item'          => 'Add Topic',
				'add_new'               => 'Add Topic',
				'new_item'              => 'New Topic',
				'edit_item'             => 'Edit Topic',
				'update_item'           => 'Update Topic',
				'search_items'          => 'Search Topic',
				'hierarchical'          => true,
				'show_ui'               => true,
				'rewrite'				=> array('slug' => 'topic')
			),
			array(
				'type'					=> 'region',
				'name'                  => 'Regions',
				'singular_name'         => 'Region',
				'parent_item'			=> 'Parent Region',
				'parent_item_colon'     => 'Parent Region:',
				'all_items'             => 'All Region',
				'add_new_item'          => 'Add Region',
				'add_new'               => 'Add Region',
				'new_item'              => 'New Region',
				'edit_item'             => 'Edit Region',
				'update_item'           => 'Update Region',
				'search_items'          => 'Search Region',
				'hierarchical'          => true,
				'show_ui'               => true,
				'rewrite'				=> array('slug' => 'region')
			),
			array(
				'type'					=> 'topic_related',
				'name'                  => 'Topic Related',
				'singular_name'         => 'Topic Related',
				'parent_item'			=> 'Parent Topic Related',
				'parent_item_colon'     => 'Parent Topic Related:',
				'all_items'             => 'All Topic Related',
				'add_new_item'          => 'Add Topic Related',
				'add_new'               => 'Add Topic Related',
				'new_item'              => 'New Topic Related',
				'edit_item'             => 'Edit Topic Related',
				'update_item'           => 'Update Topic Related',
				'search_items'          => 'Search Topic Related',
				'hierarchical'          => true,
				'show_ui'               => true,
				'rewrite'				=> array('slug' => 'topic_related')
			),
			array(
				'type'					=> 'related_people',
				'name'                  => 'Related People',
				'singular_name'         => 'Related People',
				'parent_item'			=> 'Parent Related People',
				'parent_item_colon'     => 'Parent Related People:',
				'all_items'             => 'All Related People',
				'add_new_item'          => 'Add Related People',
				'add_new'               => 'Add Related People',
				'new_item'              => 'New Related People',
				'edit_item'             => 'Edit Related People',
				'update_item'           => 'Update Related People',
				'search_items'          => 'Search Related People',
				'hierarchical'          => true,
				'show_ui'               => true,
				'rewrite'				=> array('slug' => 'related_people')
			)
		);*/
	}

	public function registerCustomPostTypes()
	{
		foreach ($this->custom_post_types as $post_type) {
			register_post_type( $post_type['post_type'],
				array(
					'labels' => array(
						'name'                  => $post_type['name'],
						'singular_name'         => $post_type['singular_name'],
						'menu_name'             => $post_type['menu_name'],
						//'name_admin_bar'        => $post_type['name_admin_bar'],
						//'archives'              => $post_type['archives'],
						//'attributes'            => $post_type['attributes'],
						'parent_item_colon'     => $post_type['parent_item_colon'],
						'all_items'             => $post_type['all_items'],
						'add_new_item'          => $post_type['add_new_item'],
						'add_new'               => $post_type['add_new'],
						'new_item'              => $post_type['new_item'],
						'edit_item'             => $post_type['edit_item'],
						'update_item'           => $post_type['update_item'],
						'view_item'             => $post_type['view_item'],
						'view_items'            => $post_type['view_items'],
						'search_items'          => $post_type['search_items'],
						'not_found'             => $post_type['not_found'],
						'not_found_in_trash'    => $post_type['not_found_in_trash'],
						//'featured_image'        => $post_type['featured_image'],
						//'set_featured_image'    => $post_type['set_featured_image'],
						//'remove_featured_image' => $post_type['remove_featured_image'],
						//'use_featured_image'    => $post_type['use_featured_image'],
						//'insert_into_item'      => $post_type['insert_into_item'],
						//'uploaded_to_this_item' => $post_type['uploaded_to_this_item'],
						//'items_list'            => $post_type['items_list'],
						//'items_list_navigation' => $post_type['items_list_navigation'],
						//'filter_items_list'     => $post_type['filter_items_list']
					),
					'label'                     => $post_type['label'],
					//'description'               => $post_type['description'],
					'supports'                  => $post_type['supports'],
					//'taxonomies'                => $post_type['taxonomies'],
					'hierarchical'              => $post_type['hierarchical'],
					'public'                    => $post_type['public'],
					'show_ui'                   => $post_type['show_ui'],
					'show_in_menu'              => $post_type['show_in_menu'],
					'menu_position'             => $post_type['menu_position'],
					//'show_in_admin_bar'         => $post_type['show_in_admin_bar'],
					//'show_in_nav_menus'         => $post_type['show_in_nav_menus'],
					//'can_export'                => $post_type['can_export'],
					'has_archive'               => $post_type['has_archive'],
					'exclude_from_search'       => $post_type['exclude_from_search'],
					'query_var'					=> $post_type['query_var'],
					'publicly_queryable'        => $post_type['publicly_queryable'],
					'capability_type'           => $post_type['capability_type']
				)
			);
		}		
	}

	/*public function registerTaxonomy()
	{
		foreach ($this->custom_taxonomy as $taxonomy) {
			register_taxonomy( $taxonomy['type'], 'publication',
				array(
					'labels' => array(
						'name'                  => $taxonomy['name'],
						'singular_name'         => $taxonomy['singular_name'],
						'parent_item'           => $taxonomy['parent_item'],
						'parent_item_colon'     => $taxonomy['parent_item_colon'],
						'all_items'             => $taxonomy['all_items'],
						'add_new_item'          => $taxonomy['add_new_item'],
						'add_new'               => $taxonomy['add_new'],
						'new_item'              => $taxonomy['new_item'],
						'edit_item'             => $taxonomy['edit_item'],
						'update_item'           => $taxonomy['update_item'],
						'search_items'          => $taxonomy['search_items'],
					),
					'hierarchical'              => $taxonomy['hierarchical'],
					'show_ui'                   => $taxonomy['show_ui'],
					'show_admin_column'			=> $taxonomy['show_admin_column'],
					'rewrite'					=> $taxonomy['rewrite']
				)
			);
		}
	}*/
}