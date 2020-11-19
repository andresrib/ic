<?php
//if (isset($_post['titulo']) == true && empty($_post['titulo']) == false && isset($_post['link_insert']) == true && empty($_post['link_insert']) == false && $_post['tema']) == true && empty($_post['tema']) === false && $_post['dificuldade']) == true && empty($_post['dificuldade']) === false && $_post['usuario']) == true && empty($_post['usuario']) == false){
	//require '../connect/connect.php';
	include '../connect/connect.php';
	if($conn){
		$titulo = $_POST['titulo'];
		$link_insert = $_POST['link'];
		$tema = $_POST['tema'];
		$dificuldade = $_POST['dificuldade'];
		$usuario = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$tipo = $_POST['tipo'];

		$inserindo = 'INSERT INTO links(titulo, link, tema, dificuldade, nome, descricao, tipo) VALUES("'.$titulo.'", "'.$link_insert.'", "'.$tema.'", "'.$dificuldade.'", "'.$usuario.'", "'.$descricao.'", "'.$tipo.'")';
		mysqli_query($conn, $inserindo);
	}
	else{
		echo "connection failed";
	}
//};
?>