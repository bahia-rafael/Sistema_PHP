<!DOCTYPE html>
<html>
<head>
	<title>Deletar Produto</title>
	<link rel="stylesheet" href="../css/arquivoCss.css" />
</head>

<body>

	<div id="mySite">

		<div>
			<button type="button" onclick="window.location.href='./formulario_select.php'" style="background-color: red;border-radius: 10px;float: right;">
				<img src="../img/lupa.png">
			</button>

		</div>

		<br><br><br><br>

		<button id="insert" class= "submit" type="button" onclick="window.location.href='./formulario_insert.php'">
			<img src="../img/ico_insert.png">
			<div id="text">Inserir Produto</div>
		</button>

		<button id="update" class= "submit" type="button"  onclick="window.location.href='./formulario_update.php'">
			<img src="../img/ico_change.png">
			<div id="text">Alterar Produto</div>
		</button>

		<button disabled id="delete" class= "submit" type="button">
			<img src="../img/ico_delete.png">
			<div id="text">Deletar Produto</div>
		</button>

		<hr />

		<form method="POST" id="formulario" action="<?php echo filter_input(INPUT_SERVER, "PHP_SELF"); ?>"
			style="margin-left: 0px;">
			<input type="hidden" name="method" value="deleteProduto">

			
			<div class="preco">
				<label>Codigo do Produto</label> <br>
				<input type="number" class="preco" name="cod"> <br>
			</div>

			<input type="submit" value="Deletar Produto" name="alterar" style="border-radius: 10px;background-color: red;color: white;font-family: 'Bebas Neue', Arial;font-size: 35px;width: 316px;height: 43px;float: right;margin-top: 50px;margin-right: 50px;">


			<button id="voltar" type="button" onclick="window.location.href='../Main.php'" value="Voltar" onclick="form_product('delete')" style="border-radius: 10px;background-color: red;color: white;font-family: 'Bebas Neue', Arial;font-size: 35px;width: 316px;height: 43px;float: left;margin-top: 50px;margin-left:50px;">Voltar
			</button>
		</form>



		<?php

		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) {

		$method = $_POST['method'];

		require_once '../model/bean/ProductBEAN.php';

		if(method_exists('Produto', $method)) {


		$product = new Produto('../util/Connection.php');
		$product->$method($_POST);

	}

}

?>

</div>

</body>
</html>