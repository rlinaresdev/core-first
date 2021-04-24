<?php
namespace Malla\Core\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Malla\Core\Model\CoreInfo;
use Malla\Core\Model\CoreMeta;
use Malla\Core\Model\CoreConfig;
use Illuminate\Database\Eloquent\Model;

class Core extends Model {

  protected $table = "apps";

  protected $fillable = [
    "type",
		"slug",
		"kernel",
		"info",
		"token",
		"activated",
		"created_at",
		"updated_at"
  ];

/*
* Modificadores */
  public function setTokenAttribute($value) {
		if(is_null($value)) {
      $value = \Str::random( mt_rand(15, 25) );
    }
		return $this->attributes['token'] 	= $value;
	}

  /*
  * RELATIONS */
  public function info() {
		return $this->hasOne(CoreInfo::class, "app_id");
	}

  public function configs() {
		return $this->hasOne(CoreConfig::class, "app_id");
	}

  public function meta() {
		return $this->hasOne(CoreMeta::class, "app_id");
	}

	/* PARAMTERS */
	public function config($key=NULL, $default=NULL) {

		if( ($data = $this->configs()->where("key", $key) )->count() > 0 ) {
			return $data->first()->value;
		}

		return $default;
	}

  public function skin($slug) {
		return $this->where("type", "theme")->where("slug", $slug)->first() ?? abort( 500, __("exception.500")."::".__("exception.exists", [
			"subject"	=> "La plantilla",
			"argument" 	=> $slug
		]) );
	}

  /*
  * METHODS */

  /*
  * INFO METHODS */
  public function addInfo($data) {
    $this->info()->create($data); return $this;
  }

}
