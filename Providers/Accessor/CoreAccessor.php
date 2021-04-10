<?php 
namespace Malla\Core\Providers\Accessor;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\ServiceProvider;

class CoreAccessor extends ServiceProvider {

	public function boot() {

	}

	public function register() {
		require_once(__DIR__."/../../Common.php");
	}
}
