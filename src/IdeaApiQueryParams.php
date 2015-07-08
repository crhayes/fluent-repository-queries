<?php namespace App;

use Illuminate\Http\Request;

class IdeaApiQueryParams extends Request implements IdeaFilterQueryParams {

	public function getIds() {
		if ($this->has('ids')) {
			return $this->input('ids');
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
