<?php

use Mockery as m;

class IdeaControllerTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$this->mockQuery = m::mock('App\Queries\SearchBlockedIdeasBetweenDates');
		$this->ideaController = new App\IdeaController($this->mockQuery);
	}

	public function testCanBeInstantiated() {
		$this->assertInstanceOf('App\IdeaController', $this->ideaController);
	}

}
