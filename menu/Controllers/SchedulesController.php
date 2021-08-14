<?php
namespace Controllers;

use \Core\Controller;
use \Models\Schedules;
use \Models\Usuarios;
use \Models\Store;

class SchedulesController extends Controller {

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

        $data['title'] = 'Horários';
        $data['menu']    = 'schedules';
        //$data['subactive'] = 'cardapio';

        $data['name'] = $this->user->getName();

        $store = new Store();
        $data['data']     = $store->getInfo();

        $this->loadTemplate('schedules/schedules', $data);
    }

    public function atualizaHorario()
    {
        $store = new Store();
        if(isset($_POST['horario']) && !empty($_POST['horario'])) {

            $novaHora = trim($_POST['horario']);
            $campo    = trim($_POST['name']);
        }
        
        if ($store->updateHora($novaHora, $campo)) {
            
            $resposta['code'] = 0;
            $resposta['msg'] = 'Horário atualizado com sucesso.';
            echo json_encode($resposta);

        } else {
            
            $resposta['code'] = 1;
            $resposta['msg'] = 'Erro ao atualizar Horário.';
            echo json_encode($resposta);
        }
        
    }
}