<?php namespace App\Contracts;

interface IdeaRepository extends Repository {

	public function filterByIds(array $ids);

	public function filterByUser($id);

	public function filterByModerationStatus($status);

}
