<?php
namespace Controllers;

use \Core\Controller;
use \Models\Pedido;
use \Models\Relatorio;
use \Models\Entrada;
use \Models\Saida;
use \Models\Usuarios;

class AjaxController extends Controller {

	// private $user;

    // public function __construct()
    // {
    //     $this->user = new Usuarios();

    //     if (!$this->user->verifyLogin()) {
    //         header("Location: ".BASE_URL."login");
    //         exit;
	// 	}

	// 	// if (!$this->user->hasPermission('dashboard_view')) {
	// 	// 	$this->loadView('404/500');
    //     //     exit;
    //     // } 
    // }

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

	public function diario()
	{
		if(isset($_POST['data']) && !empty($_POST['data'])) {
			
			$data = $_POST['data'];
	
			$r = new Relatorio();
			$resposta = $r->getTotalEDPV($data);
			echo json_encode($resposta);
			exit;
			
		} else {

			$data['data_atual'] = date('Y-m-d');
		
			$r = new Relatorio();
			$data['total_entrada'] = $r->getTotalEntradaDay($data['data_atual']);
			$data['total_despesa'] = $r->getTotalDespesasDay($data['data_atual']);
			$data['total_pedido'] = $r->getTotalPedidoDay($data['data_atual']);
			$data['valor_pedido'] = $r->getTotalValorPedidoDay($data['data_atual']);
		}
	}

	// função faz um requisiçao ajax para retornar registros
	public function datas()
	{
		if(isset($_POST['data1']) && !empty($_POST['data1'])) {
			
			$data_inicial = $_POST['data1'];
			$data_final   = $_POST['data2'];

			$r = new Relatorio();
			$datapost['entradas'] = $r->getTotalEntrada($data_inicial, $data_final);
			$datapost['despesas'] = $r->getTotalDespesas($data_inicial, $data_final);
			$datapost['tpedido']  = $r->getTotalPedido($data_inicial, $data_final);
			$datapost['vpedido'] = $r->getTotalValorPedidoDayBetween($data_inicial, $data_final);


			// $d = new Saida();
			// $datapost = $d->getAll($data_inicial, $data_final);
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

	public function datasEntrada()
	{
		if(isset($_POST['data1']) && !empty($_POST['data1'])) {
			
			$data_inicial = $_POST['data1'];
			$data_final   = $_POST['data2'];

			$e = new Entrada();
			$datapost = $e->getAll($data_inicial, $data_final);
			echo json_encode($datapost);
			
		} else {

			$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
			$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

			$data_inicial = date('Y-m-d',$data1);
			$data_final   = date('Y-m-d',$data2);

			$e = new Entrada();
			$datafixa = $e->getAll($data_inicial, $data_final);
			echo json_encode($datafixa);
		}
	}

	public function datasSaida()
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

	public function app_pedido()
	{
		$p = new Pedido();
		if (isset($_POST['data']) && !empty($_POST['data'])) {
			
			$pedido = $_POST['data'];
			$data = $_POST['datapedido'];
			$hora = $_POST['horapedido'];
			$total = $_POST['totalpedido'];
			$subtotal = $_POST['subtotal'];
			$endereco = $_POST['endereco'];
			$entrega = $_POST['entrega'];
			$pagamento = $_POST['pagamento'];
			$troco = $_POST['troco'];
			$ids = $_POST['ids'];

			if ($p->newPedido($pedido, $data, $hora, $total, $subtotal, $endereco, $entrega, $pagamento, $troco, $ids)) {
			
				$resposta['code'] = 0;
				$resposta['msg'] = 'Pedido recebido com sucesso.';
				echo json_encode($resposta);

			} else {
				
				$resposta['code'] = 1;
				$resposta['msg'] = 'OOps.. erro ao enviar pedido.';
				echo json_encode($resposta);
			}
			
		}
	}

	public function pedidos()
	{
		$p = new Pedido();
		$pedidos = $p->getAllPedidos(getUser()->id_company);
		echo json_encode($pedidos);
		exit;
	}

}