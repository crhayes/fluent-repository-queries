<?php namespace App\Queries\Params;

use Illuminate\Http\Request;
use App\Contracts\IdeaFilterQueryParams;

class SoapboxSimpleIdeaQueryParams extends Request implements IdeaFilterQueryParams {

	public function getIds() {
		if ($this->has('idea_ids')) {
			return $this->input('idea_ids');
		}

		return null;
	}

	public function getUserId() {
		if ($this->has('user_id')) {
			return $this->input('user_id');
		}

		return null;
	}

}
