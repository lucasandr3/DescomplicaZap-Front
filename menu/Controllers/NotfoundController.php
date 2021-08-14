<?php
namespace Controllers;

use \Core\Controller;

class NotfoundController extends Controller {

	public function index() {
		
		$data = [];

		$data['title'] = 'TJ - 404';

		$this->loadView('notfound/notfound', $data);
	}

}