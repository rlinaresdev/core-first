<?php
namespace Malla\Core\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


use Malla\Core\Providers\Accessor\CoreAccessor;

class CoreServiceProvider extends CoreAccessor {

  public function map( $core ) {

    /*
		*  INIT MAP
		*  Niveles de ejecución del registro
		* -----------------------------------------------------------------
		* [0] => CORE | [1] => LIBRARIES | [2] => PACKAGES | [3] => PLUGINS
		* -----------------------------------------------------------------
		*/

		/*
		* [0] => CORE */
		$this->app["malla"]->load("loader")->register("core");

		/*
		* [1] => LIBRARIES */
		$this->app["malla"]->load("loader")->register("library");

		/*
		* [2] => PACKAGES */
		$this->app["malla"]->load("loader")->register("package");

		/*
		* [3] => PLUGINS */
		$this->app["malla"]->load("loader")->register("plugin");

  }

  public function bootMap( $http, $lang ) {
		/*
		*  BOOT MAP
		*  Niveles de ejecución del boot
		* ---------------------------------
		* [4] => THEME | [1] => WIDGETS
		* ---------------------------------
		*/

		/*
		* [4] => THEME */
		//$this->load( "theme", $http, $lang );

		/*
		* [5] => WIDGETS */
		//$this->load( "widget", $http, $lang );
	}
}
