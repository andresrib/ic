<?php
	include_once('../connect/connect.php');

	/*$codigo = $_POST['ids'];
	$ids = explode('|', $codigo);
	print_r($ids);
	$query = "SELECT titulo, tema, tipo, link, descricao FROM links WHERE id IN (";
	for($i=1; $i<sizeof($ids); $i++) { 
		$query += $ids[$i];
		if ($i+1!=sizeof($ids)) {
			$query += ", ";
		}
	}
	$query += ") GROUP BY tema";
	$resultado = mysqli_query($conn, $query);
	$number_of_rows = $resultado->num_rows;
	$query2 = "SELECT count(DISTINCT(tema)) FROM links where id IN(";
	for($i=1; $i<sizeof($ids); $i++) { 
		$query2 = $query2 + $ids[$i];
		if ($i+1!=sizeof($ids)) {
			$query2 = $query2 + ", ";
		}
	}
	$query2 = ")";
	$num_of_temas = mysqli_query($conn, $query2);*/
	$query = $_POST['q'];
	$resultado = mysqli_query($conn, $query);
	$number_of_rows = $resultado->num_rows;
	if($number_of_rows > 0){
		for($i = 0 ; $i < $number_of_rows; $i++){
			$row = mysqli_fetch_assoc($resultado);
			$dados[$i] = array(
				0 => $row["titulo"],
				1 => $row["tema"],
				2 => $row["tipo"],
				3 => $row["descricao"],
				4 => $row["link"],
				5 => $number_of_rows
				//6 => $num_of_temas
			);
		}
	}
	echo json_encode($dados, $number_of_rows);
?>