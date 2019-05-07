<?php

class Produto{

  public $codigo_produto;
  public $nome_produto;
  public $descricao_produto;
  public $preco;
  private static $caminho;

  function __construct($caminho){

    Produto::$caminho = $caminho;

  }


  public function inserirProduto($dados){

    $nome = $dados['nome']; 
    $descricao = $dados['descricao']; 
    $preco = (int) $dados['preco']; 

    require_once '../model/DAO/ProductDAO.php';

    $dao = new ProductDAO(Produto::$caminho);

    $dao->insert_product($nome, $descricao, $preco);

  }

  public function searchProduto($codigo) {


   $codigo_produto = (int) $codigo['cod']; 

   unset($_POST);
   unset($dados);

   require_once '../model/DAO/ProductDAO.php';

   $dao = new ProductDAO(Produto::$caminho);


   $dados = $dao->find_product($codigo_produto);

   if (isset($dados['nome_produto'])){


     $codigo = $dados['codigo_produto'];
     $nome=$dados['nome_produto'];
     $descricao=$dados['descricao_produto'];
     $preco=$dados['preco'];


     ?>

     <hr />

     <form method="POST" id= 'formulario' action="../util/commandDataBase.php">

      <input type="hidden" name="method" value="update_product">
      <input type="hidden" name="cod" value="<?php echo $codigo;?>">

      <div class="nome">
        <label>Nome</label> <br>
        <input id="nome" type="search" name="nome" value="<?php echo $nome;?>"> <br>  
      </div>

      <div class="descricao">
        <label>Descricao</label> <br>
        <textarea rows="2" name="descricao" cols="30"><?php echo $descricao;?></textarea>
      </div>

      <div class="preco">
        <label>Preco</label> <br>
        <input type="number" id="ano" name="preco" value="<?php echo $preco;?>"> <br>
      </div>

      <div class="botao">
        <input type="submit" value="Tem Certeza ?" name="incluir" style="float: center;"></p>
      </div>

    </form>

    <?php
  }

}

public function deleteProduto($codigo) {

 $codigo_produto = (int) $codigo['cod']; 

 unset($_POST);
 unset($dados);

 require_once '../model/DAO/ProductDAO.php';

 $dao = new ProductDAO(Produto::$caminho);


 $dados = $dao->find_product($codigo_produto);

 if (isset($dados['nome_produto'])){


   $codigo = $dados['codigo_produto'];
   $nome=$dados['nome_produto'];
   $descricao=$dados['descricao_produto'];
   $preco=$dados['preco'];


   ?>

   <hr />

   <form method="POST" id= 'formulario' action="../util/commandDataBase.php">

    <input type="hidden" name="method" value="delete_product">
    <input type="hidden" name="cod" value="<?php echo $codigo;?>">

    <div class="nome">
      <label>Nome</label> <br>
      <input id="nome" type="search" name="nome" value="<?php echo $nome;?>"> <br>  
    </div>

    <div class="descricao">
      <label>Descricao</label> <br>
      <textarea rows="2" name="descricao" cols="30"><?php echo $descricao;?></textarea>
    </div>

    <div class="preco">
      <label>Preco</label> <br>
      <input type="number" id="ano" name="preco" value="<?php echo $preco;?>"> <br>
    </div>

    <div class="botao">
      <input type="submit" value="Tem Certeza ?" name="incluir" style="float: center;"></p>
    </div>

  </form>

  <?php
}
}

public function selectProduct($codigo) {

 $codigo_produto = (int) $codigo['cod']; 

 unset($_POST);
 unset($dados);

 require_once '../model/DAO/ProductDAO.php';

 $dao = new ProductDAO(Produto::$caminho);


 $dados = $dao->find_product($codigo_produto);

 if (isset($dados['nome_produto'])){


   $codigo = $dados['codigo_produto'];
   $nome=$dados['nome_produto'];
   $descricao=$dados['descricao_produto'];
   $preco=$dados['preco'];


   ?>

   <hr />

   <table class="tg">
    <tr>
      <th class="tg-baqh" colspan="5">Produto</th>
    </tr>

    <tbody>
      <tr>
        <td class="tg-hmp3">Codigo</td>
        <td class="tg-hmp3">Nome</td>
        <td class="tg-hmp3">Descricao</td>
        <td class="tg-hmp3">Preco</td>
      </tr>
      <tr>
        <td class='tg-0lax'><?php echo $codigo;?></td>
        <td class='tg-0lax'><?php echo $nome;?></td>
        <td class='tg-lqy6'><?php echo $descricao;?></td>
        <td class='tg-lqy6'><?php echo $preco;?></td>
      </tr>
    </tbody>
  </table>

  <?php
}
}

public function getCodigo(){
  return $this->codigo_produto;
}

public function getNome(){
  return $this->nome_produto;
}

function getDescricao(){
  return $this->descricao_produto;
}

function getPreco(){
  return $this->preco;
}

function setNome($nome_produto){
  $this->nome_produto = $nome_produto;
}

function setDescricao($descricao_produto){
  $this->descricao_produto = $descricao_produto;
}

function setPreco($preco){
  $this->preco = $preco;
}

}

?>