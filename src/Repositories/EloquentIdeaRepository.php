<?php namespace App\Repositories;

use Idea;
use App\Contracts\IdeaRepository;

class EloquentIdeaRepository extends EloquentRepository implements IdeaRepository {

	protected $model;

	public function __construct(Idea $model) {
		$this->model = $model;
	}

	public function filterByIds(array $ids) {
		$this->model = $this->model->byIds($ids);

		return $this;
	}

	public function filterByUser($userId) {
		$this->model = $this->model->byUser($userId);

		return $this;
	}

	public function filterByModerationStatus($status) {
		$this->model = $this->model->moderationStatus($status);

		return $this;
	}

}
