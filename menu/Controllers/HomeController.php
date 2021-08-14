<?php
namespace Controllers;

use \Core\Controller;
use \Models\Store;
use \Models\Usuarios;
use \Models\Relatorio;

class HomeController extends Controller {

    private $user;
    private $userSession;

    // public function __construct()
    // {
    //     $this->user = new Usuarios();
    //     $this->userSession = getUser();

    //     if (!$this->user->verifyLogin()) {
    //         redirect("login");
    //         exit;
	// 	}

	// 	// if (!$this->user->hasPermission('dashboard_view')) {
	// 	// 	$this->loadView('404/500');
    //     //     exit;
    //     // } 
    // }

    public function index($storeName)
    {
        $u = new Usuarios();
        if (!$u->verifyLogin($storeName)) {
            // redirect("login");
            // exit;
		}

        echo "<pre>";
        print_r(getStore());
        exit;

        $data = array('user' => $this->user);

        //$data['name'] = $this->user->getName();

        $store = new Store();

        $data['title'] = getUser()->company_name;
        $data['menu'] = 'home';

        $data['data_store'] = $store->getData();
        $data['platforms'] = $store->getPlatforms();
        $data['total_pratos'] = $store->qtPratos();
    
        $data1 = mktime(0, 0, 0, date('m') , 1 , date('Y'));
		$data2 = mktime(23, 59, 59, date('m'), date("t"), date('Y'));

		$data['data_inicial'] = date('Y-m-d',$data1);
		$data['data_final']   = date('Y-m-d',$data2);

		$r = new Relatorio();
		$data['total_entrada'] = $r->getTotalEntrada($data['data_inicial'], $data['data_final']);
		$data['total_despesa'] = $r->getTotalDespesas($data['data_inicial'], $data['data_final']);
		$data['total_pedido'] = $r->getTotalPedido($data['data_inicial'], $data['data_final']);

        $this->loadTemplate('home/home', $data);
    }

    public function teste($id)
    {
        echo "<pre>";
        print_r($id);
    }
}