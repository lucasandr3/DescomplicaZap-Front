<?php
namespace Controllers;

use \Core\Controller;
use \Models\Store;
use \Models\Menu;
use \Models\Category;
use \Models\Usuarios;

class MenuController extends Controller {

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

        $data['title'] = 'Cardápio';
        $data['active']    = 'menu';
        $data['subactive'] = 'cardapio';

        $data['name'] = $this->user->getName();

		$store = new Store();
        $product = new Menu();

        $data['loja']     = $store->getInfo();
        $data['produtos'] = $product->getAll();
    
		$this->loadTemplate('menu/menu', $data);
    }
    
    public function new_category()
	{
		$data = [];

		$data['active'] = 'menu';

		$store = new Store();
		$data['loja'] = $store->getInfo();

		$this->loadTemplate('menu/category', $data);
    }

    public function novo_prato()
    {
        $data = [];

        $data['title'] = 'Novo Prato';
        $data['active']    = 'menu';
        $data['subactive'] = 'novoprato';

        $data['name'] = $this->user->getName();

        $store = new Store();
        $product = new Menu();
        $data['loja'] = $store->getInfo();
        $data['categories'] = $product->getCategories();

        $this->loadTemplate('menu/prato', $data);
    }

    public function novo_prato_action()
    {
        $product = new Menu();
        if(isset($_POST['category']) && !empty($_POST['category'])) {
            
            $category   = addslashes(trim($_POST['category']));	
            $nome       = addslashes(trim($_POST['name_product']));
            $descricao  = addslashes(trim($_POST['description']));
            $price      = addslashes(trim($_POST['actual_price']));
            $status     = addslashes(trim($_POST['status']));
 
            if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {

                $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

                if (in_array($_FILES['arquivo']['type'], $permitidos)) {
                    
                    $img = 'assets/img/produtos/'.md5(time().rand(0,999)).'.png';
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $img);
                }
            }

            $product->saveProduct($nome, $category, $descricao, $price, $img, $status);
            header('Location: '.BASE_URL.'menu/novo_prato');
            exit;
        }
    }

    public function editPrato()
    {
        $data = [];

        $data['title'] = 'Edição de Prato';
        $data['active']    = 'edit_prato';
        $data['subactive'] = 'novopratoedit';

        $data['name'] = $this->user->getName();

        $store = new Store();
        $product = new Menu();
        $data['loja'] = $store->getInfo();
        $data['categories'] = $product->getCategories();
        $data['produtos'] = $product->getAll();

        $this->loadTemplate('menu/prato_edit', $data);
    }

    public function edit_prato_action()
    {
        $product = new Menu();
        if(isset($_POST['category']) && !empty($_POST['category'])) {
            
            $category   = addslashes(trim($_POST['category']));	
            $nome       = addslashes(trim($_POST['name_product']));
            $descricao  = addslashes(trim($_POST['description']));
            $price      = addslashes(trim($_POST['actual_price']));
            $promo      = addslashes(trim($_POST['sale_price']));
            $status     = addslashes(trim($_POST['status']));
            $id         = addslashes(trim($_POST['id_product']));
 
            if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {

                $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

                if (in_array($_FILES['arquivo']['type'], $permitidos)) {
                    
                    $img = 'assets/img/produtos/'.md5(time().rand(0,999)).'.png';
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $img);
                }
            }

            $product->editProduct($nome, $category, $descricao, $price, $promo, $img, $status, $id);
            header('Location: '.BASE_URL.'menu/editPrato');
            exit;
        }
    }

    public function productid($id)
    {
        
        $product = new Menu();
        
        if ($produto = $product->getProdutoId($id)) {
            
            $resposta['code'] = 0;
            $resposta['produto'] = $produto;

        } else {
            
            $resposta['code'] = 1;
            $resposta['produto'] = 'Algo deu errado, tente novamente.';
        }
        
        echo json_encode($resposta);
        exit;

       
    }

    public function categories()
    {
        $data = [];

        $data['active']    = 'menu';
        $data['subactive'] = 'category';

        $store = new Store();
        $product = new Menu();
        $data['loja'] = $store->getInfo();
        $data['categories'] = $product->getCategories();

        $this->loadTemplate('menu/categories', $data);
    }

    public function categoryAction()
    {
        $category = new Category();
        if(isset($_POST['name']) && !empty($_POST['name'])) {
            
            $name    = addslashes(trim($_POST['name']));
            $waiting = addslashes(trim($_POST['waiting']));	
            $obs     = addslashes(trim($_POST['obs']));
            $status  = addslashes(trim($_POST['status']));
 
            if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {

                $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

                if (in_array($_FILES['arquivo']['type'], $permitidos)) {
                    
                    $img = 'assets/img/categories/'.md5(time().rand(0,999)).'.png';
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $img);

                    $category->saveCategory($name, $waiting, $obs, $img, $status);
                    header('Location: '.BASE_URL.'menu/categories');
                    exit;
                }
            }
        }
    }

    public function categoryEditAction()
    {
        $category = new Category();
        if(isset($_POST['name']) && !empty($_POST['name'])) {
            
            $name    = addslashes(trim($_POST['name']));
            $waiting = addslashes(trim($_POST['waiting']));	
            $obs     = addslashes(trim($_POST['obs']));
            $status  = addslashes(trim($_POST['status']));
            $cover   = addslashes(trim($_POST['cover']));
            $id      = addslashes(trim($_POST['id_cat']));
 
            if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {

                $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

                if (in_array($_FILES['arquivo']['type'], $permitidos)) {
                    
                    $img = 'assets/img/categories/'.md5(time().rand(0,999)).'.png';
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $img);

                    // $category->editCategory($name, $waiting, $obs, $img, $status);
                    // header('Location: '.BASE_URL.'menu/categories');
                    // exit;
                }
            }

            $category->editCategory($name, $waiting, $obs, $img, $status, $cover, $id);
            header('Location: '.BASE_URL.'menu/categories');
            exit;
        }
    }

    public function options($id_product)
    {
        $product = new Menu();
        $options = $product->getOptions($id_product);
        echo json_encode($options);
        exit;
    }
    
    public function active($id_product)
    {
        $product = new Menu();
        if ($product->active($id_product) == true) {
            $reposta = 'alterado com sucesso';
            echo json_encode($resposta);
            exit;
        } else {
            $reposta = 'alterado com sucesso';
            echo json_encode($resposta);
            exit;
        }
    }

    public function inactive($id_product)
    {
        $product = new Menu();
        if ($product->inactive($id_product) == true) {
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