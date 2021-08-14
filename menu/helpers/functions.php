<?php 

function moeda($valor) {

    echo "R$ ".number_format($valor,2,',','.');
}

function url($param)
{
    return BASE_URL.$param;
}

function setStore($store)
{
    $_SESSION['storeFocus'] = $store;
}

function getStore()
{
    $object = new stdClass();
    foreach ($_SESSION['storeFocus'] as $key => $value) {
        $object->$key = $value;
    }
    return $object;
}

function redirect($route)
{
    return header("Location: ".BASE_URL.$route);
}