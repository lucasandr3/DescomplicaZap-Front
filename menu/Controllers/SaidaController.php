<?php
namespace Controllers;

use \Core\Controller;
use \Models\Saida;
use \Models\Usuarios;

class SaidaController extends Controller {

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

		$data['title'] = 'Saída - (contas a pagar)';
		$data['menu']    = 'saida';

		$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
		$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

		$data['data_inicial'] = date('Y-m-d',$data1);
		$data['data_final']   = date('Y-m-d',$data2);

		$d = new Saida();
		$data['cat_des'] = $d->getCat();
		$data['despesas'] = $d->getAllDespesas($data['data_inicial'], $data['data_final']);
		
		// $delivery = new Delivery();

		// $data['bairros'] = $delivery->getAll();
      
		$this->loadTemplate('saida/saida', $data);
	}

	public function add()
	{
		$d = new Saida();
		if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
			
			$descricao = addslashes(trim($_POST['descricao']));
			$valor 	   = addslashes(trim($_POST['valor']));
			$data_d    = addslashes(trim($_POST['data_d']));
			$conta     = addslashes(trim($_POST['conta']));
			$id_cat    = addslashes(trim($_POST['id_cat']));
	
			$d->addDespesa($descricao, $valor, $data_d, $conta, $id_cat);
			header("Location: ".BASE_URL."saida");
			exit;
		}
	}

	public function recorrente()
	{
		$data = array('user' => $this->user);

		$data['name'] = $this->user->getName();

		$data['title'] = 'Saída - (contas a pagar)';
		$data['menu']    = 'saida_recorrente';

        $d = new Saida();
        $data['cat_des'] = $d->getCat();
        $data['list_reco'] = $d->getAllReco();

		$this->loadTemplate('saida/saida_recorrente', $data);
	}

	public function addReco()
	{
		$d = new Saida();
		if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
			
			$descricao = addslashes(trim($_POST['descricao']));
			$valor     = addslashes(trim($_POST['valor']));
			$ventrada  = addslashes(trim($_POST['ventrada']));
			$juro      = addslashes(trim($_POST['juro']));
			$qtd_parc  = addslashes(trim($_POST['qtd_parc']));
			$data_parc = addslashes(trim($_POST['data_parc']));
			$conta     = addslashes(trim($_POST['conta']));
			$id_cat    = addslashes(trim($_POST['id_cat']));

			$d->addDesRecorrente($descricao, $valor, $ventrada, $juro, $qtd_parc, $data_parc, $conta, $id_cat);
			header("Location: ".BASE_URL."saida/recorrente");
			exit;
		}
	}

	// função faz um requisiçao ajax para retornar registros
	public function datas()
	{
		if(isset($_POST['data1']) && !empty($_POST['data1'])) {
			
			$data_inicial = $_POST['data1'];
			$data_final   = $_POST['data2'];

			$d = new Saida();
			$datapost = $d->getAll($data_inicial, $data_final);
			echo json_encode($datapost);
			
		} else {

			$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
			$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

			$data_inicial = date('Y-m-d',$data1);
			$data_final   = date('Y-m-d',$data2);

			$d = new Saida();
			$datafixa = $d->getAll($data_inicial, $data_final);
			echo json_encode($datafixa);
		}
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