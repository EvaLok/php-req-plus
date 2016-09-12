<?php

namespace ReqPlus\v1;

use ReqPlus\v1\Pattern\Singleton;

class Manager extends Singleton
{
	public function _require( $path_rel )
	{
		$path_source = debug_backtrace()[0]['file'];

		echo $path_source;
	}
}
