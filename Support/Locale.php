<?php namespace Malla\Core\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Locale {	

	protected $app;

	protected $file;

	protected $lang;

	public function __construct( $file, $lang ) {
		$this->file = $file;
		$this->lang = $lang;
	}

	public function loadGrammarsFromArray( $grammars=null ) {

		if( !empty($grammars) && is_array($grammars) ) {
			$this->lang->addLines( $grammars, app()->getLocale() );
		}
	}

	public function loadGrammars( $file=NULL ) { 

		if( $this->file->exists($file) ) {
			$this->lang->addLines( $this->file->getRequire($file), app()->getLocale() );
		}

		return NULL;
	}
}
