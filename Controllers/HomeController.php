<?php
namespace Controllers;

use \Core\Controller;
use \Models\Usuarios;
use \Models\Home;

class HomeController extends Controller {

	private $user;

    public function __construct()
    {
        // $this->user = new Usuarios();

        // if (!$this->user->verifyLogin()) {
        //     header("Location: ".BASE_URL."login");
        //     exit;
		// }

		// if (!$this->user->hasPermission('dashboard_view')) {
		// $this->loadView('404/500');
        // exit;
        // } 
    }

	public function index()
	{
		$data = array('user' => $this->user);

		//$data['name'] = $this->user->getName();

		$data['titulo'] = 'Descomplica Zap';
		$data['menu'] = 'home';

		// $usuarios = new Usuarios();
		// $data['lista'] = $usuarios->getAll();
		
		// $home = new Home();
		// $data['travels'] = $home->getAll();
		// $data['stepini'] = $home->stepini();
		// $data['stepone'] = $home->stepone();
		// $data['steptwo'] = $home->steptwo();
		// $data['stepthree'] = $home->stepthree();
		// $data['stepfour'] = $home->stepfour();
		// $data['stepfive'] = $home->stepfive();
		// $data['waiting'] = $home->getWaiting();
	
		$this->loadTemplate('home/home', $data);
	}

	public function traveldata()
	{
		$home = new Home();
		if (isset($_POST['data']) && !empty($_POST['data'])) {
			
			$data = $_POST['data'];

			if ($travel = $home->getAll($data)) {
				$resposta['code'] = 0;
				$resposta['travels'] = $travel;
				echo json_encode($resposta);
				exit;
			} else {
				$resposta['code'] = 1;
				$resposta['travels'] = 'Não existe viagens para este dia.';
				echo json_encode($resposta);
				exit;
			}

		}	
	}
	
}