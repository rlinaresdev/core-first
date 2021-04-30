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

$this->app["malla"] = Malla::load();

Malla::load( "finder", new \Malla\Core\Support\Finder );
Malla::load( "loader", new \Malla\Core\Support\Loader($this->app) );
Malla::load( "coredb", new \Malla\Core\Support\StorDB( $this->app["db"] ) );
Malla::load( "urls", new \Malla\Core\Support\Urls($this->app) );

/*
* Module */
Malla::load( "theme", new \Malla\Core\Support\Theme( $this->app["malla"] ) );


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

require_once(__MALLA__."App/System/Common.php");

if( Malla::isAppStart("core", "core") ) {
	$this->map( $this->app["malla"] );
}

// if( !Malla::isAppStart("core", "malla") ) {

// 	Malla::load("loader")->run(\Malla\Package\Install\Kernel::class);
// }
