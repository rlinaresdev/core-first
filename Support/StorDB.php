<?php namespace Malla\Core\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\Facades\Schema;

class StorDB {

	protected $db;

	protected $table = "apps";

	public $store;

	public function __construct( $db ) {
		$this->db = $db;
		$this->store = $db->table($this->table);
	}

	public function has($type=NULL, $slug=NULL)	{

		if(empty($type) OR empty($slug)) return FALSE;

		if(Schema::hasTable($this->table)) {
			return ( $this->db->table($this->table)
												->where("type", $type)->where("slug", $slug)->count() > 0 );
		}

		return FALSE;
	}

	public function hasType( $type=NULL ) {

		if( !empty($type) ) {
			return  ($this->store()->where( "type", $type )->count() > 0);
		}

		return FALSE;
	}

	public function isInstalled($type=NULL, $slug=NULL) {

		if($this->has($type, $slug)) {
			if( !empty( ($query = $this->get($type, $slug)) ) ) {
				return $query->activated;
			}
		}

		return FALSE;
	}

	public function count($table=NULL)	{
		return $this->db->table($table)->count();
	}

	public function get($type=NULL, $slug=NULL) {

		if( empty($type) OR empty($slug) ) return NULL;

		if( ($query = $this->db->table($this->table)->where("type", $type)->where("slug", $slug))->count() > 0 ) {
			return $query->first();
		}

		return NULL;
	}

	public function getType($type=NULL)	{

		if( ($data = $this->db->table($this->table)->where("type", $type))->count() > 0 )	{
			return  $data->get();
		}

		return NULL;
	}

	public function getParam($type=NULL, $ID=NULL) {

		if( ($data = $this->db->table($this->table."_params")->where($this->table."_id", $ID)->where("type", $type))->count() > 0 ) {
			return $data->get(["type", "key", "value"]);
		}

		return NULL;
	}

	public function getLocale($ID=NULL) {

		if( ($data = $this->db->table($this->table."_params")->where("type", "lang")->where($this->table."_id", $ID))->count() > 0 ) {
			return $data->get(["type", "key", "value"]);
		}

		return NULL;
	}
}
