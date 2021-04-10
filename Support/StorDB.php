<?php namespace Malla\Core\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class StorDB {

	protected $app;

	protected $table = "malla";

	public function __construct( $db ) {
		$this->app = $db;	
	}

	
}
