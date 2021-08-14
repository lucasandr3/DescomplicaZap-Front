<?php
namespace Controllers;

use \Core\Controller;

class ContactController extends Controller {

    public function index()
    {
        $data = [];

        $data['title'] = 'TJ - Contato';

        $this->loadTemplate('contact/contact', $data);
    }
}