<?php namespace App;

use App\IdeaApiQueryParams;
use App\Queries\IdeaFilterQuery;

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
