<?php namespace App;

use App\Queries\IdeaFilterQuery;
use App\Queries\Params\IdeaApiQueryParams;

class IdeaController {

	/**
	 * Get a listing of ideas.
	 *
	 * @return Collection
	 */
	public function index(IdeaFilterQuery $query, IdeaApiQueryParams $queryParams) {
		return $query->execute($queryParams);
	}

}
