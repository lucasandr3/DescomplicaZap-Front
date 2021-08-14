<?php
namespace Controllers;

use \Core\Controller;
use \Models\Adicional;
use \Models\Usuarios;

class AdicionalController extends Controller {

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

		$data['title'] = 'Adicionais';
		$data['menu']    = 'adicional';

		$adicional = new Adicional();

        $data['adicionais'] = $adicional->getAll();
        $data['produtos'] = $adicional->getProducts();
      
		$this->loadTemplate('adicional/adicional', $data);
	}

	public function addAction()
    {
        $add = new Adicional();
        if(isset($_POST['id_product']) && !empty($_POST['id_product'])) {
            
            $produto    = addslashes(trim($_POST['id_product']));	
            $adicional  = addslashes(trim($_POST['category_name_option']));
            $status     = addslashes(trim($_POST['active']));

            $add->saveAdicional($produto, $adicional, $status);
            header('Location: '.BASE_URL.'adicional');
            exit;
        }
    }

	public function edit($id)
	{
		$data = [];

		$data = array('user' => $this->user);

        $data['name'] = $this->user->getName();

		$data['title'] = 'Edição de adicional';
		$data['menu']    = 'adicional';

		$adicional = new Adicional();

        $data['adicional'] = $adicional->getAdicionalId($id);
        $data['produtos'] = $adicional->getProducts();
      
		$this->loadTemplate('adicional/adicional_edit', $data);
	}

	public function editAction()
    {
        $adicional = new Adicional();
        if(isset($_POST['category_name_option']) && !empty($_POST['category_name_option'])) {
            
            $option     = addslashes(trim($_POST['category_name_option']));	
            $status     = addslashes(trim($_POST['active']));
            $id_product = addslashes(trim($_POST['id_product']));
            $id         = addslashes(trim($_POST['id_category_option']));
 
            $adicional->editAdicional($option, $status, $id_product, $id);
            header('Location: '.BASE_URL.'adicional/edit/'.$id);
            exit;
        }
    }

	public function del($id)
	{
		$adicional = new Adicional();
		$adicional->delAdicional($id);
		header('Location: '.BASE_URL.'adicional');
        exit;
	}

}