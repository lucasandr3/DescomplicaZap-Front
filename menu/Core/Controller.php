<?php
namespace Core;

class Controller {

	public function getMethod() {
		return $_SERVER['REQUEST_METHOD'];
	}

	public function getRequestData() {

		switch($this->getMethod()) {
			case 'GET':
				return $_GET;
				break;
			case 'PUT':
			case 'DELETE':
				parse_str(file_get_contents('php://input'), $data);
				return (array) $data;
				break;
			case 'POST':
				$data = json_decode(file_get_contents('php://input'));

				if(is_null($data)) {
					$data = $_POST;
				}

				return (array) $data;
				break;
		}

	}

	public function returnJson($retorno) {
		header("Content-Type: application/json");
		echo json_encode($retorno, JSON_PRETTY_PRINT);
		exit;
	}

	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {
		require 'views/template/header.php';
		require 'views/template/sidebar.php';
		require 'views/template/footer.php';
	}

	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

}










