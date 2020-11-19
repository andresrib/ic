<<?php
	include_once('../connect/connect.php');
	$titulo = $_POST['titulo'];
	$link_insert = $_POST['link'];
	$tema = $_POST['tema'];
	$dificuldade = $_POST['dificuldade'];
	$usuario = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$tipo = $_POST['tipo'];
	$query = 'SELECT * FROM links WHERE titulo LIKE "%'.$titulo.'%" AND link LIKE "%'.$link_insert.'%" AND tema LIKE "%'.$tema.'%" AND tipo LIKE "%'.$tipo.'%" AND dificuldade LIKE "%'.$dificuldade.'%" AND nome LIKE "%'.$usuario.'%" AND descricao LIKE "%'.$descricao.'%"';
	//$query = 'SELECT * FROM links WHERE tituo LIKE %'.$titulo.'% AND link LIKE %'.$link_insert.'% AND tema LIKE %'.$tema.'% AND dificuldade LIKE %'.$dificuldade.'% AND nome LIKE %'.$usuario.'% AND descricao LIKE %'.$descricao.'%';
	$resultado = mysqli_query($conn, $query);
	$number_of_rows = $resultado->num_rows;
	if($number_of_rows > 0){
		for($i = 0 ; $i < $number_of_rows; $i++){
			$row = mysqli_fetch_assoc($resultado);
			//$dados[0][0] = $number_of_rows;
			$dados[$i] = array(
				0 => $row["titulo"],
				1 => $row["tema"],
				2 => $row["tipo"],
				3 => $row["dificuldade"],
				4 => $row["nome"],
				5 => $row["descricao"],
				6 => $row["link"],
				7 => $number_of_rows,
				8 => $row["id"]
			);
		}
		echo json_encode($dados);
				
	}
	else{
		echo "Nenhum resultado encontrado";
	}

	//$qr = $conn->query("SELECT * FROM links WHERE titulo LIKE '%".$titulo."%' AND link LIKE '%".$link_insert."%' AND tema LIKE '%".$tema."%' AND dificuldade LIKE '%".$dificuldade."%' AND nome LIKE '%".$usuario."%' AND descricao LIKE '%".$descricao."%'");
	//while ($row = $qr->fetch_assoc()){
		//echo sprintf('<p>%s</p>', $row);
		//$row = $qr->fetch_assoc();
		//echo json_encode($row);
	//}
?>