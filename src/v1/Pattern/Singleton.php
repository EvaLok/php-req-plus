<?php

namespace ReqPlus\v1\Pattern;

abstract class Singleton
{
	protected static $instance;

	static public function getInstance()
	{
		return static::$instance = (
		! is_null(static::$instance)
			? static::$instance
			: new static
		);
	}
}
