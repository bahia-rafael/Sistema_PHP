<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistema Produtos</title>
    <link rel="stylesheet" href="../css/arquivoCss.css" />
</head>

<body >

    <div id="mySite">

        <div>
            <button type="button" onclick="window.location.href='./formulario_select.php'" style="background-color: red;border-radius: 10px;float: right;">
                <img src="../img/lupa.png">
            </button>

        </div>

        <br><br><br><br>

        <button disabled id="insert" class= "submit" type="button">
            <img src="../img/ico_insert.png">
            <div id="text">Inserir Produto</div>
        </button>

        <button id="update" class= "submit" type="button" onclick="window.location.href='./formulario_update.php'">
            <img src="../img/ico_change.png">
            <div id="text">Alterar Produto</div>
        </button>

        <button id="delete" class= "submit" type="button" onclick="window.location.href='./formulario_delete.php'">
            <img src="../img/ico_delete.png">
            <div id="text">Deletar Produto</div>
        </button>

        <hr />
        <form method="POST" id="formulario" action="<?php echo filter_input(INPUT_SERVER, "PHP_SELF"); ?>">

            <input type="hidden" name="method" value="inserirProduto">

            <div class="nome">
                <label>Nome</label> <br>
                <input id="nome" type="search" name="nome"> <br>  
            </div>

            <div class="descricao">
                <label>Descricao</label> <br>
                <textarea rows="2" name="descricao" cols="30"></textarea>
            </div>

            <div class="preco">
                <label>Preco</label> <br>
                <input type="number" id="ano" name="preco"> <br>
            </div>
            
            <div class="botao">
                <input type="submit" value="Incluir Produto" name="incluir" style="float: right;"></p>
            </div>

            <button id="voltar" type="button" onclick="window.location.href='../Main.php'" value="Voltar" onclick="form_product('delete')" style="border-radius: 10px;background-color: red;color: white;font-family: 'Bebas Neue', Arial;font-size: 35px;width: 316px;height: 43px;float: left;margin-top: 50px;">Voltar
            </button>

        </form>

    </div>

    <?php

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) {

        $method = $_POST['method'];

        require_once '../model/bean/ProductBEAN.php';

        if(method_exists('Produto', $method)) {


            $product = new Produto('../util/Connection.php');
            $product->$method($_POST);

        }

        else {
            echo 'Metodo incorreto';
        }
    }

    ?>

</body>
</html>