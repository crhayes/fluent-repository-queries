<?php namespace App;

use App\Queries\SearchBlockedIdeasBetweenDates;

class IdeaController {

	/**
	 * @var IdeaFilterQuery
	 */
	protected $query;

	/**
	 * Instantiate our dependencies.
	 *
	 * @param IdeaFilterQuery $query
	 */
	public function __construct(IdeaFilterQuery $query) {
		$this->query = $query;
	}

	/**
	 * Get a listing of ideas.
	 *
	 * @return Collection
	 */
	public function index() {
		$filters = Input::only('keywords', 'start', 'end');

		return $this->query->execute(new IdeaApiQueryParams($filters));
	}

	/**
	 * Delete an idea.
	 *
	 * @param  int $id
	 * @return bool
	 */
	public function delete($id) {

	}

}
