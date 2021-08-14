<?php
namespace Controllers;

use \Core\Controller;
use \Models\Store;
use \Models\Menu;
use \Models\Adicional;
use \Models\Item;
use \Models\Usuarios;

class ItensController extends Controller {

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

        $data['title']    = 'Item adicional';
        $data['menu'] = 'item';

		$item     = new Item();
        $product   = new Menu();
        $adicional = new Adicional();

        //$data['loja']       = $store->getInfo();
        $data['itens']      = $item->getItens();
        $data['produtos']   = $product->getAll();
        $data['adicionais'] = $adicional->getAll();

		$this->loadTemplate('itens/item', $data);
    }

    public function addAction()
    {
        $item = new Item();
        if (isset($_POST['name_option']) && !empty($_POST['name_option'])) {
            
            $nome         = filter_input(INPUT_POST, trim('name_option'), FILTER_SANITIZE_SPECIAL_CHARS);
            $id_category  = filter_input(INPUT_POST, trim('id_category_option'), FILTER_SANITIZE_SPECIAL_CHARS);
            $id_product   = filter_input(INPUT_POST, trim('id_product'), FILTER_SANITIZE_SPECIAL_CHARS);
            $price_option = filter_input(INPUT_POST, trim('price_option'), FILTER_SANITIZE_SPECIAL_CHARS);
            $available    = filter_input(INPUT_POST, trim('available'), FILTER_SANITIZE_SPECIAL_CHARS);

            $item->saveItem($nome, $id_category, $id_product, $price_option, $available);
            header("Location: ".BASE_URL."itens");
            exit;
        }
    }

    public function edit($id)
	{
        $data = [];
        
        $data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

        $data['title']    = 'Edição de Item adicional';
        $data['menu'] = 'item';

		$item     = new Item();
        $product   = new Menu();
        $adicional = new Adicional();

        //$data['loja']       = $store->getInfo();
        $data['item'] = $item->getItemId($id);
        // $data['produtos']   = $product->getAll();
        // $data['adicionais'] = $adicional->getAdicionais();

		$this->loadTemplate('itens/item_edit', $data);
    }

    public function editAction()
    {
        $item = new Item();
        if (isset($_POST['name_option']) && !empty($_POST['name_option'])) {
            
            $nome         = filter_input(INPUT_POST, trim('name_option'), FILTER_SANITIZE_SPECIAL_CHARS);
            $id_category  = filter_input(INPUT_POST, trim('id_category_option'), FILTER_SANITIZE_SPECIAL_CHARS);
            $id_product   = filter_input(INPUT_POST, trim('id_product'), FILTER_SANITIZE_SPECIAL_CHARS);
            $price_option = filter_input(INPUT_POST, trim('price_option'), FILTER_SANITIZE_SPECIAL_CHARS);
            $id_option    = filter_input(INPUT_POST, trim('id_option'), FILTER_SANITIZE_SPECIAL_CHARS);
            $status       = filter_input(INPUT_POST, trim('available'), FILTER_SANITIZE_SPECIAL_CHARS);

            $item->editItem($nome, $id_category, $id_product, $price_option, $id_option, $status);
            header("Location: ".BASE_URL."itens/edit/".$id_option);
            exit;
        }
    }

    public function del($id)
	{
		$item = new Item();
		$item->delItem($id);
		header('Location: '.BASE_URL.'itens');
        exit;
	}

    public function active($id_option)
    {
        $item = new Item();
        if ($item->active($id_option) == true) {
            $reposta = 'alterado com sucesso';
            echo json_encode($resposta);
            exit;
        } else {
            $reposta = 'alterado com sucesso';
            echo json_encode($resposta);
            exit;
        }
    }

    public function inactive($id_option)
    {
        $item = new Item();
        if ($item->inactive($id_option) == true) {
            $reposta = 'alterado com sucesso';
            echo json_encode($resposta);
            exit;
        } else {
            $reposta = 'alterado com sucesso';
            echo json_encode($resposta);
            exit;
        }
    }
}