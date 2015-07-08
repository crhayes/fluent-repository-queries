<?php namespace App;

class IdeaApiQueryParams implements IdeaFilterQueryParams {

	protected $params;

	public function __construct($params) {
		$this->params = $params;
	}

	public function getIds() {
		if ( ! array_key_exists($this->params, 'ids')) {
			return $this->params['ids'];
		}

		return null;
	}

	public function getUserId() {
		if ( ! array_key_exists($this->params, 'user_id')) {
			return $this->params['user_id'];
		}

		return null;
	}

}
