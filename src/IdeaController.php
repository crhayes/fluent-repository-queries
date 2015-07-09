<?php namespace App;

use App\Queries\IdeaFilterQuery;
use App\Queries\Params\IdeaApiQueryParams;

class IdeaController {

	protected $ideaTransformer;

	public function __construct(IdeaTransformer $ideaTransformer) {
		$this->ideaTransformer = $ideaTransformer;
	}

	/**
	 * Get a listing of ideas.
	 *
	 * @return Collection
	 */
	public function index(IdeaFilterQuery $query, IdeaApiQueryParams $queryParams) {
		$result = $query->execute($queryParams);

		$response = $this->transformCollection($result, $this->ideaTransformer, 'ideas');

		return self::response($response, 200);
	}

}
