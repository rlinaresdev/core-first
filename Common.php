<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

define("__MALLA__", realpath(__DIR__."/../../../")."/");


$this->app->bind( "Malla", function($app) {
	return new \Malla\Core\Support\Malla(
		new \Malla\Core\Support\Bootstrap($app)
	);
});

Malla::load( "finder", new \Malla\Core\Support\Finder );
Malla::load( "loader", new \Malla\Core\Support\Loader($this->app) );
Malla::load( "urls", new \Malla\Core\Support\Urls($this->app) );

$this->app["malla"] = Malla::load();

/*
* HELPERS
* Helper Malla */
if( !function_exists("malla") ) {

	function malla( $key=null, $args=[], $merge=[] ) {
		return app("malla")->load($key, $args, $merge);
	}
}


if( !function_exists("__url") ) {

	function __url($path = null, $parameters = [], $secure = null) {
		return malla("urls")->url($path, $parameters, $secure);
	}
}

// if( !Malla::isAppStart("core", "malla") ) {

// 	Malla::load("loader")->run(\Malla\Package\Install\Kernel::class);
// }