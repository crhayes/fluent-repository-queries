<?php namespace App\Queries;

use SoapboxService;
use App\Contracts\IdeaRepository;
use App\Contracts\IdeaFilterQueryParams;

class IdeaFilterQuery {

	protected $repository;
	protected $soapboxService;

	public function __construct(IdeaRepository $repository, SoapboxService $soapboxService) {
		$this->repository = $repository;
		$this->soapboxService = $soapboxService;
	}

	public function execute(IdeaFilterQueryParams $filters) {
		$this->repository->filterBySoapbox($this->soapboxService->getId());

		if ($ids = $filters->getIds()) {
			$this->repository->filterByIds($ids);
		}

		if ($userId = $filters->getUserId()) {
			$this->repository->filterByUser($userId);
		}

		return $this->repository->get(['*']);
	}

}
