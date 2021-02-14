<?php
/**
 * @package  OddlyPlugin
 */
namespace Inc;

include plugin_basename( dirname( __FILE__, 3 ) ) . "/oddly-plugin/custom-function.php" ;

final class Init
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function get_services() 
	{
		return [
			Pages\Dashboard::class,
			Base\Enqueue::class,
			Base\SettingsLink::class,
			Base\CustomPostTypeController::class,
			Base\CustomTaxonomyController::class,
			Base\TemplateController::class,
			Base\CustomTemplateController::class
		];
	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
	public static function register_services() 
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function instantiate( $class )
	{
		$service = new $class();

		return $service;
	}
}