<?php
namespace Controllers;

use \Core\Controller;
use \Models\Delivery;
use \Models\Usuarios;

class DeliveryController extends Controller {

	private $user;

    public function __construct()
    {
        $this->user = new Usuarios();

        if (!$this->user->verifyLogin()) {
            header("Location: ".BASE_URL."login");
            exit;
		}

		// if (!$this->user->hasPermission('dashboard_view')) {
		// 	$this->loadView('404/500');
        //     exit;
        // } 
    }

	public function index()
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Bairros - (Taxa de entrega)';
		$data['menu']    = 'bairros';

		$delivery = new Delivery();

		$data['bairros'] = $delivery->getAll();
      
		$this->loadTemplate('delivery/bairros', $data);
	}

	public function addAction()
	{
		$delivery = new Delivery();
		if (isset($_POST['nome_bairro']) && !empty($_POST['nome_bairro'])) {
			
			$bairro    = addslashes(trim($_POST['nome_bairro']));
			$taxa      = addslashes(trim($_POST['taxa_entrega']));
			$retirada  = addslashes(trim($_POST['retirada']));
		}

		$delivery->saveBairro($bairro, $taxa, $retirada);
		header('Location: '.BASE_URL.'delivery');
        exit;

	}

	public function edit($id)
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Editar - (Taxa de entrega)';
		$data['menu']    = 'bairros';

		$delivery = new Delivery();

		$data['bairro'] = $delivery->getBairroId($id);
      
		$this->loadTemplate('delivery/bairro_edit', $data);
	}

	public function editAction()
	{
		$delivery = new Delivery();
		if (isset($_POST['nome_bairro']) && !empty($_POST['nome_bairro'])) {
			
			$bairro    = addslashes(trim($_POST['nome_bairro']));
			$taxa      = addslashes(trim($_POST['taxa_entrega']));
			$retirada  = addslashes(trim($_POST['retirada']));
			$id_bairro = addslashes(trim($_POST['id']));
		}

		$delivery->editBairro($bairro, $taxa, $retirada, $id_bairro);
		header('Location: '.BASE_URL.'delivery/edit/'.$id_bairro);
        exit;

	}

	public function del($id)
	{
		$delivery = new Delivery();
		$delivery->delBairro($id);
		header('Location: '.BASE_URL.'delivery');
        exit;
	}

}