<?php namespace App\Queries;

class IdeaFilterQuery {

	protected $repository;
	protected $soapboxService;

	public function __construct(IdeaRepository $repository, SoapboxService $soapboxService) {
		$this->repository = $repository;
		$this->soapboxService = $soapboxService;
	}

	public function execute(IdeaFilterQueryParams $filters) {
		$this->repository->filterBySoapbox($this->soapboxService->getId());

		if ($ids = $filter->getIds()) {
			$this->repository->filterByIds($ids);
		}

		if ($userId = $filters->getUserId()) {
			$this->repository->filterByUser($userId);
		}

		return $this->repository->get();
	}

}
