<?php namespace App;

use App\Queries\SearchBlockedIdeasBetweenDates;

class IdeaController {

	/**
	 * @var SearchBlockedIdeasBetweenDates
	 */
	protected $query;

	/**
	 * Instantiate our dependencies.
	 *
	 * @param SearchBlockedIdeasBetweenDates $query
	 */
	public function __construct(SearchBlockedIdeasBetweenDates $query) {
		$this->query = $query;
	}

	/**
	 * Get a listing of ideas.
	 *
	 * @return Collection
	 */
	public function index() {
		compact(Input::only('keywords', 'start', 'end'));

		return $this->query->execute($keywords, $start, $end);
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
