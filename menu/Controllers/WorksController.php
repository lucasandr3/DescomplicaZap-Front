<?php
namespace Controllers;

use \Core\Controller;
use \Models\Product;

class WorksController extends Controller {

    public function index()
    {
        $data = [];

        $data['title'] = 'TJ - Soluções';

        $this->loadTemplate('works/works', $data);
    }
}