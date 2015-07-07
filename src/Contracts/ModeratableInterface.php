<?php namespace App\Contracts;

interface ModeratableInterface {

	public function filterByModerationStatus($moderationStatus);

}
