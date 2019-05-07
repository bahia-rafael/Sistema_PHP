<?php

class Conexao{

	private static $mysqli;

	private function __construct(){

    	$servidor = "localhost"; //NOME DO SERVIDOR
    	$bd = "loja"; //NOME DO BANCO DE DADOS
    	$usuario = "root"; //USUÁRIO 
    	$senha = ""; //SENHA

    	Conexao::$mysqli = new mysqli($servidor, $usuario , $senha, $bd);

    	/* check connection */
    	if (Conexao::$mysqli->connect_errno) {
    		printf("Connect failed: %s\n", Conexao::$mysqli->connect_error);
    		exit();
    	}
    }

    public static function getInstance() {

    	if (!isset(self::$mysqli)) {

    		new Conexao();      
    	}

    	return Conexao::$mysqli;
    }
}
?>

