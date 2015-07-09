<?php namespace App;

use App\Queries\IdeaFilterQuery;
use App\Queries\Params\SoapboxSimpleIdeaQueryParams;

class SoapboxSimpleIdeaController {

	protected $ideaTransformer;

	public function __construct(IdeaTransformer $ideaTransformer) {
		$this->ideaTransformer = $ideaTransformer;
	}

	/**
	 * Get a listing of ideas.
	 *
	 * @return Collection
	 */
	public function index(IdeaFilterQuery $query, SoapboxSimpleIdeaQueryParams $queryParams) {
		$result = $query->execute($queryParams);

		$response = $this->transformCollection($result, $this->ideaTransformer, 'ideas');

		return self::response($response, 200);
	}

}
