<?php

namespace spec\ReqPlus\v1;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use PhpSpec\Exception\Example\ErrorException;

class ManagerSpec extends ObjectBehavior
{
	function it_is_initializable()
	{
		$this->shouldHaveType('ReqPlus\v1\Manager');
	}

	// @todo: look into improved assertion possibilities
	// we can only test this due to the way that phpspec call functions
	function it_should_require_from_supplied_relative_path()
	{
		$path_rel = 'dummies/dummy-1.php';

		try {
			$this->_require($path_rel);
		} catch( ErrorException $ex ){
			// workaround for issue with path detection and phpspec
		}

		$this->getRequired()[0]->shouldEndWith($path_rel);
	}
}
