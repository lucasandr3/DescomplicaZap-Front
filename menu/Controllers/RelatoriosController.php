<?php
namespace Controllers;

use \Core\Controller;
use \Models\Relatorio;
use \Models\Usuarios;

class RelatoriosController extends Controller {

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

		$data['title'] = 'Relatório - Resumido';
		$data['menu']    = 'rel';

		$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
		$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

		$data['data_inicial'] = date('Y-m-d',$data1);
		$data['data_final']   = date('Y-m-d',$data2);

		$r = new Relatorio();
		$data['total_entrada'] = $r->getTotalEntrada($data['data_inicial'], $data['data_final']);
		$data['total_despesa'] = $r->getTotalDespesas($data['data_inicial'], $data['data_final']);
		$data['total_pedido'] = $r->getTotalPedido($data['data_inicial'], $data['data_final']);
		$data['valor_pedido'] = $r->getTotalValorPedidoDayBetween($data['data_inicial'], $data['data_final']);
	  
		$this->loadTemplate('relatorios/resumido', $data);
	}

	public function diario()
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Relatório - Diário';
		$data['menu']    = 'reld';

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
      
		$this->loadTemplate('relatorios/diario', $data);
	}

	public function semanal()
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Relatório - Semanal';
		$data['menu']    = 'res';

		$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
		$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

		$data['data_inicial'] = date('Y-m-d',$data1);
		$data['data_final']   = date('Y-m-d',$data2);

		$r = new Relatorio();
		$data['total_entrada'] = $r->getTotalEntrada($data['data_inicial'], $data['data_final']);
		$data['total_despesa'] = $r->getTotalDespesas($data['data_inicial'], $data['data_final']);
		$data['total_pedido'] = $r->getTotalPedido($data['data_inicial'], $data['data_final']);
		$data['valor_pedido'] = $r->getTotalValorPedidoDayBetween($data['data_inicial'], $data['data_final']);
	  
		$this->loadTemplate('relatorios/semanal', $data);
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

	public function maisvendidos()
	{
		$data = [];

		$data = array('user' => $this->user);

		$data['name'] = $this->user->getName();
		
		$data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
		$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

		$data['data_inicial'] = date('Y-m-d',$data1);
		$data['data_final']   = date('Y-m-d',$data2);

		$data['title'] = 'Relatório - Mais Vendidos';
		$data['subtitle'] = '5 produtos mais vendidos aparecem nesta listagem';
		$data['menu']    = 'resm';

		$r = new Relatorio();
		$data['maisvendidos'] = $r->getMaisVendidos();

		$this->loadTemplate('relatorios/maisvendidos', $data);
	}

}