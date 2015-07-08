<?php

use Mockery as m;
use App\Queries\IdeaFilterQuery;

class IdeaFilterQueryTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$this->mockIdeaRepository = m::mock('App\Contracts\IdeaRepository');
		$this->mockSoapboxService = m::mock('SoapboxService');
		$this->mockQueryParams = m::mock('App\Contracts\IdeaFilterQueryParams');
		$this->query = new IdeaFilterQuery($this->mockIdeaRepository, $this->mockSoapboxService);
	}

	public function tearDown() {
		m::close();
	}

	public function testCanBeInstantiated() {
		$this->assertInstanceOf('App\Queries\IdeaFilterQuery', $this->query);
	}

	public function testItAppliesSoapboxFilterByDefault() {
		$this->mockSoapboxService
			->shouldReceive('getId')->once()->andReturn(1);

		$this->mockQueryParams
			->shouldReceive('getIds')->once()->andReturn(null)
			->shouldReceive('getUserId')->once()->andReturn(null);

		$this->mockIdeaRepository
			->shouldReceive('filterBySoapbox')->once()->with(1)
			->shouldReceive('get')->once()->with(['*']);

		$this->query->execute($this->mockQueryParams);
	}

	public function testItAppiesFilterByIds() {
		$this->mockSoapboxService
			->shouldReceive('getId')->once()->andReturn(1);

		$this->mockQueryParams
			->shouldReceive('getIds')->once()->andReturn([1, 2, 3])
			->shouldReceive('getUserId')->once()->andReturn(null);

		$this->mockIdeaRepository
			->shouldReceive('filterBySoapbox')->once()->with(1)
			->shouldReceive('filterByIds')->once()->with([1, 2, 3])
			->shouldReceive('get')->once()->with(['*']);

		$this->query->execute($this->mockQueryParams);
	}

	public function testItAppiesFilterByUserId() {
		$this->mockSoapboxService
			->shouldReceive('getId')->once()->andReturn(1);

		$this->mockQueryParams
			->shouldReceive('getIds')->once()->andReturn(null)
			->shouldReceive('getUserId')->once()->andReturn(1);

		$this->mockIdeaRepository
			->shouldReceive('filterBySoapbox')->once()->with(1)
			->shouldReceive('filterByUser')->once()->with(1)
			->shouldReceive('get')->once()->with(['*']);

		$this->query->execute($this->mockQueryParams);
	}

	public function testItAppliesAllFilters() {
		$this->mockSoapboxService
			->shouldReceive('getId')->once()->andReturn(1);

		$this->mockQueryParams
			->shouldReceive('getIds')->once()->andReturn([1, 2, 3])
			->shouldReceive('getUserId')->once()->andReturn(1);

		$this->mockIdeaRepository
			->shouldReceive('filterBySoapbox')->once()->with(1)
			->shouldReceive('filterByIds')->once()->with([1, 2, 3])
			->shouldReceive('filterByUser')->once()->with(1)
			->shouldReceive('get')->once()->with(['*']);

		$this->query->execute($this->mockQueryParams);
	}

}
