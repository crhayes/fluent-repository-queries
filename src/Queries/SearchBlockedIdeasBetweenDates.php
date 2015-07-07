<?php namespace App\Queries;

class SearchBlockedIdeasBetweenDates {

	protected $repository;

	public function __construct(IdeaRepositoryInterface $repository) {
		$this->repository = $repository;
	}

	public function execute($keywords, $start, $end) {
		return $this->repository
			->filterByModerationStatus(IdeaRepositoryInterface::STATUS_BLOCKED)
			->filterByKeywords($keywords)
			->filterBetweenDates($start, $end);
	}

}
