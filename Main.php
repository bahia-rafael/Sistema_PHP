<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistema Produtos</title>
    <link rel="stylesheet" href="css/arquivoCss.css" />
</head>

<body >



    <div id="mySite">

        <div>
            <button type="button" onclick="window.location.href='view/formulario_select.php''" style="background-color: red;border-radius: 10px;float: right;">
                <img src="img/lupa.png">
            </button>

        </div>

        <br><br><br><br>
        <button id="insert" class= "submit" type="button" onclick="window.location.href='view/formulario_insert.php'">
            <img src="img/ico_insert.png">
            <div id="text">Inserir Produto</div>
        </button>

        <button id="update" class= "submit" type="button" onclick="window.location.href='view/formulario_update.php'">
            <img src="img/ico_change.png">
            <div id="text">Alterar Produto</div>
        </button>

        <button id="delete" class= "submit" type="button" onclick="window.location.href='view/formulario_delete.php'">
            <img src="img/ico_delete.png">
            <div id="text">Deletar Produto</div>
        </button>

        <hr />

        <table class="tg">
          <tr>
            <th class="tg-baqh" colspan="5">Produtos</th>
        </tr>

        <tbody>
            <tr>
                <td class="tg-hmp3">Codigo</td>
                <td class="tg-hmp3">Nome</td>
                <td class="tg-hmp3">Descricao</td>
                <td class="tg-hmp3">Preco</td>
            </tr>

            <?php

            require_once 'model/DAO/ProductDAO.php';

            $dao = new ProductDAO('./util/Connection.php');

            $dados_totais = $dao->find_all_product();

            for ($i = 0; $i < count($dados_totais); $i++) {

            $dados = $dados_totais[$i];

            $codigo_produto = $dados['codigo_produto'];
            $nome_produto = $dados['nome_produto'];
            $descricao_produto = $dados['descricao_produto'];
            $preco = $dados['preco'];

            echo "<tr>
                <td class='tg-0lax'>$codigo_produto</td>
                <td class='tg-0lax'>$nome_produto</td>
                <td class='tg-lqy6'>$descricao_produto</td>
                <td class='tg-lqy6'>$preco</td>
            </tr>";
        }

        ?>

    </tbody>
</table>


</div>


</body>
</html>