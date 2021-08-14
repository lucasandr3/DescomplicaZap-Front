<?php
global $routes;
$routes = array();

/*
*   Rotas do APP 
*/

// rota home
$routes['/'] = '/home/index/:id';
$routes['/'] = '/home/teste/:id';

// rota sobre
$routes['/sobre'] = '/about';

// rota serviços
$routes['/servicos'] = '/services';

// rota soluções
$routes['/solucoes'] = '/works';

// rota contato
$routes['/contato'] = '/contact';


/*
*  Fim das rotas do app
*/


