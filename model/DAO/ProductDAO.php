<?php

class ProductDAO{


    private static $mysqli;

    function __construct($caminho){

        require_once ($caminho);

        ProductDAO::$mysqli =  Conexao::getInstance();

    }

    public function insert_product($nome_produto, $descricao_produto, $preco){ 

        $sql = "INSERT INTO produtos(nome_produto, descricao_produto, preco) VALUES ('$nome_produto','$descricao_produto',$preco)";

        $execute_query = mysqli_query(ProductDAO::$mysqli, $sql);

        if ($execute_query) { 
            echo "
            <script language='javascript' type='text/javascript'>
            alert('Produto cadastrado com sucesso!');
            </script>";

        } else {

            printf("Errormessage: %s\n", ProductDAO::$mysqli->error);
        } 

        mysqli_close(ProductDAO::$mysqli);
    }

    public function delete_product($codigo_produto) {

        $codigo = (int) $codigo_produto['cod'];

        $sql = "DELETE FROM produtos WHERE codigo_produto=".$codigo;

        $execute_query = mysqli_query(ProductDAO::$mysqli, $sql);

        if ($execute_query) { 
            echo " <script language='javascript' type='text/javascript'>alert('Produto excluido com sucesso!');</script>";
        } else {

            printf("Errormessage: %s\n", ProductDAO::$mysqli->error);
        } 

        mysqli_close(ProductDAO::$mysqli);

        header("Location: ../view/formulario_delete .php");
    }

    public function update_product($dados){

        $codigo = $dados['cod']; 
        $nome = $dados['nome']; 
        $descricao = $dados['descricao']; 
        $preco = (int) $dados['preco']; 

        $sql = "UPDATE produtos SET nome_produto='$nome',descricao_produto='$descricao',preco='$preco' WHERE codigo_produto=$codigo";

        $execute_query = mysqli_query(ProductDAO::$mysqli, $sql);

        if ($execute_query) { 
            echo " <script language='javascript' type='text/javascript'>alert('Produto alterado com sucesso!');</script>";
        } else {

            printf("Errormessage: %s\n", ProductDAO::$mysqli->error);
        } 

        mysqli_close(ProductDAO::$mysqli);

        header("Location: ../view/formulario_update.php");
    }

    public function find_product ($codigo_produto) {

        $codigo = $codigo_produto;

        $sql = "SELECT * FROM produtos WHERE codigo_produto= $codigo";

        $execute_query = mysqli_query(ProductDAO::$mysqli, $sql);

        /* Pecorrer a lista SQL*/
        for($i = 0; $array[$i] = mysqli_fetch_assoc($execute_query); $i++);

            $dados = $array[0];

                // tira o resultado da busca da memória
        mysqli_free_result($execute_query);

        if (!isset($dados['nome_produto'])){

            echo "
            <script language='javascript' type='text/javascript'>
            alert('Produto Nao Encontrado');
            </script>";

            return null;

        } else {

           return $dados;

       }


   }

   public function find_all_product () {

    $sql = "SELECT * FROM produtos ORDER by codigo_produto ASC";

    $execute_query = mysqli_query(ProductDAO::$mysqli, $sql);

    /* Pecorrer a lista SQL*/
    for($i = 0; $array[$i] = mysqli_fetch_assoc($execute_query); $i++);

            // Delete last empty one
        array_pop($array);

        // tira o resultado da busca da memória
    mysqli_free_result($execute_query);

    /* numeric array */
    mysqli_close(ProductDAO::$mysqli);

    return $array;

}
}

?>