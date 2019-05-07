<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
</head>
<body>

	<form method="POST" action="<?php echo filter_input(INPUT_SERVER, "PHP_SELF"); ?>">
		<input type="hidden" name="method" value="inserirProduto">

		Nome:
		<input type="text" name="nome">
		<br>

		Descrição:
		<br>
		<textarea rows="2" name="descricao" cols="30"></textarea>
		<br>

		Preço:
		<input type="text" name="preco" >
		<br>

		<input type ="hidden" name="enviar" value="S">
		<br>
		<input type="submit" value="Incluir Produto" name="incluir"></p>

	</form>

	<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) {

		$method = $_POST['method'];

		require_once '../model/bean/ProductBEAN.php';

		if(method_exists('Produto', $method)) {


			$product = new Produto;
			$product->$method($_POST);

		}

		else {
			echo 'Metodo incorreto';
		}
	}

	?>



</body>
</html>