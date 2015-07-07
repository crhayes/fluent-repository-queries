<?php namespace App\Filters;

use App\Contracts\ModeratableInterface;

class ModerationFilter {

	protected $moderationStatus;

	public function __construct($moderationStatus) {
		$this->moderationStatus = $moderationStatus;
	}

	public function apply(ModeratableInterface $repository) {
		return $repository->filterByModerationStatus($this->moderationStatus);
	}

}
