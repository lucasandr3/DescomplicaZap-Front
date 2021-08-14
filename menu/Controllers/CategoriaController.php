<?php
namespace Controllers;

use \Core\Controller;
use \Models\Categoria;
use \Models\Usuarios;

class CategoriaController extends Controller {

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

		$data['title'] = 'Categorias';
		$data['menu']    = 'categoria';

		$categoria = new Categoria();

		$data['categorias'] = $categoria->getAll();
      
		$this->loadTemplate('categoria/categorias', $data);
	}

	public function addAction()
    {
        $categoria = new Categoria();
        if(isset($_POST['name_category']) && !empty($_POST['name_category'])) {
            
            $category   = addslashes(trim($_POST['name_category']));	
            $waiting    = addslashes(trim($_POST['waiting']));
            $observacao = addslashes(trim($_POST['obs_waiting']));
            $status     = addslashes(trim($_POST['status']));
            $dia        = addslashes(trim($_POST['dia']));
 
            if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {

                $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

                if (in_array($_FILES['arquivo']['type'], $permitidos)) {
                    
                    $img = 'assets/img/categories/'.md5(time().rand(0,999)).'.png';
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $img);
                }
            }

            $categoria->saveCategoria($category, $waiting, $observacao, $status, $dia, $img);
            header('Location: '.BASE_URL.'categoria');
            exit;
        }
    }

	public function edit($id)
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Edição de categoria';
		$data['menu']    = 'categoria';

		$categoria = new Categoria();

		$data['categoria'] = $categoria->getCategoriaId($id);
      
		$this->loadTemplate('categoria/categoria_edit', $data);
	}

	public function editAction()
    {
        $categoria = new Categoria();
        if(isset($_POST['name_category']) && !empty($_POST['name_category'])) {
            
            $category   = addslashes(trim($_POST['name_category']));	
            $waiting    = addslashes(trim($_POST['waiting']));
            $observacao = addslashes(trim($_POST['obs_waiting']));
            $status     = addslashes(trim($_POST['status']));
            $dia        = addslashes(trim($_POST['dia']));
            $id         = addslashes(trim($_POST['id']));
 
            if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {

                $permitidos = array('image/jpeg', 'image/jpg', 'image/png');

                if (in_array($_FILES['arquivo']['type'], $permitidos)) {
                    
                    $img = 'assets/img/categories/'.md5(time().rand(0,999)).'.png';
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $img);
                }
            }

            $categoria->editCategoria($category, $waiting, $observacao, $status, $dia, $id, $img);
            header('Location: '.BASE_URL.'categoria/edit/'.$id);
            exit;
        }
    }

	public function del($id)
	{
		$categoria = new Categoria();
		$categoria->delBairro($id);
		header('Location: '.BASE_URL.'delivery');
        exit;
	}

}