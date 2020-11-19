<?php
	include_once('../connect/connect.php');
	$id = $_POST['id'];
	$query = 'SELECT * FROM links WHERE id = '.$id;
	$resultado = mysqli_query($conn, $query);
	//$number_of_rows = $resultado->num_rows;
	//if($number_of_rows > 0){
		$row = mysqli_fetch_assoc($resultado);
		$dados = array(
				0 => $row["titulo"],
				1 => $row["tema"],
				2 => $row["tipo"],
				3 => $row["dificuldade"],
				4 => $row["nome"],
				5 => $row["descricao"],
				6 => $row["link"],
				7 => $row["id"]
			);
		echo json_encode($dados);
	//	}
	//else{
	//	echo "nenhum resultado encontrado";
	//}		
?>