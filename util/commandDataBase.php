<?php

$method = $_POST['method'];

require_once '../model/DAO/ProductDAO.php';

if(method_exists('ProductDAO', $method)) {

$product =  new ProductDAO('./Connection.php');
$product->$method($_POST);

} else {
echo 'Metodo incorreto';
}

?>