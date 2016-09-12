<?php

namespace ReqPlus\v1;

use ReqPlus\v1\Pattern\Singleton;

class Manager extends Singleton
{
	protected $required = [];

	public function _require( $path_rel )
	{
		$bt = debug_backtrace();

		$file = false;
		foreach( $bt as $element ){
			if( array_key_exists('file', $element) ){
				$file = $element['file'];
				break;
			}
		}

		if( ! $file ){
			// throw exception?
		} else {
			$path_source = dirname($file);
			$path_module = $path_source . DIRECTORY_SEPARATOR . $path_rel;

			if( ! file_exists( $path_module ) ){
				// throw exception?
			} else {
				if( ! in_array($path_module, $this->required) ){
					$this->required[] = $path_module;

					include_once($path_module);
				}
			}
		}


	}

	public function getRequired()
	{
		return $this->required;
	}
}
