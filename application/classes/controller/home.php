<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Base {

	public function action_index()
	{
		$this->template->title = 'Kohana3 Examples';
		$this->template->content = View::factory('page/home');
	}
}
