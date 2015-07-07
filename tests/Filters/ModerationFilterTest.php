<?php

use Mockery as m;

class ModerationFilterTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$this->mockRepository = m::mock('App\Repositories\IdeaRepository');
		$this->filter = new App\Filters\ModerationFilter('active');
	}

	public function tearDown() {
		m::close();
	}

	public function testCanBeInstantiated() {
		$this->assertInstanceOf('App\Filters\ModerationFilter', $this->filter);
	}

	public function testAppliesFilterCorrectly() {
		$this->mockRepository
			->shouldReceive('filterByModerationStatus')->once()->with('active')->andReturn($this->mockRepository);

		$result = $this->filter->apply($this->mockRepository);

		$this->assertSame($result, $this->mockRepository);
	}

}
