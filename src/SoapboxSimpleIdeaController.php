<?php namespace App;

use App\Queries\IdeaFilterQuery;
use App\Queries\Params\SoapboxSimpleIdeaQueryParams;

class SoapboxSimpleIdeaController {

	/**
	 * Get a listing of ideas.
	 *
	 * @return Collection
	 */
	public function index(IdeaFilterQuery $query, SoapboxSimpleIdeaQueryParams $queryParams) {
		return $query->execute($queryParams);
	}

}
