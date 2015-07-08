<?php

use Mockery as m;
use App\Queries\Params\IdeaApiQueryParams;

class IdeaApiQueryParamsTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$this->mockRequest = m::mock('Illuminate\Http\Request');
		$this->queryParams = new IdeaApiQueryParams();
	}

	public function tearDown() {
		m::close();
	}

	public function testCanBeInstantiated() {
		$this->assertInstanceOf('App\Contracts\IdeaFilterQueryParams', $this->queryParams);
		$this->assertInstanceOf('App\Queries\Params\IdeaApiQueryParams', $this->queryParams);
	}

}
