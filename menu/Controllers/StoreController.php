<?php
namespace Controllers;

use \Core\Controller;
use \Models\Store;
use \Models\Usuarios;

class StoreController extends Controller {

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
        $data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

        $store = new Store();

        $data['title'] = 'Informações da Loja';
        $data['menu'] = 'store';

        $data['data_store'] = $store->getData();
    
        $this->loadTemplate('store/store', $data);
    }

    public function editLojaAction()
    {
        $store = new Store();
        if(isset($_POST['nome']) && !empty($_POST['nome'])) {
            
            $nome     = trim($_POST['nome']);
            $rua      = addslashes(trim($_POST['rua']));	
            $bairro   = addslashes(trim($_POST['bairro']));
            $cidade   = addslashes(trim($_POST['cidade']));
            $numero   = addslashes(trim($_POST['numero']));
            $telefone = addslashes(trim($_POST['telefone']));
 
            if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {

                $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

                if (in_array($_FILES['arquivo']['type'], $permitidos)) {
                    
                    $img = 'assets/img/logo/'.md5(time().rand(0,999)).'.png';
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $img);

                }
            }

            $store->editStore($nome, $rua, $bairro, $cidade, $numero, $telefone, $img);
            header('Location: '.BASE_URL.'store');
            exit;
        }
    }
}