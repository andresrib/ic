<<?php 
include_once('connect/connect.php');
$query = "select * from links";
$result = mysqli_query($conn, $query);
 ?>

<!DOCTYPE html>
<html lang = "pt-br">
	<style type="text/css">
		body{
		background-image: url('imagens/fundo_secundario_menor.png');
		background-position: top !important;
	  	background-repeat: no-repeat;
	 	background-size: cover;
	 	max-width: 100%;
		}
		table{
			text-align: center;
			font-weight: bold;
			border-collapse: collapse;
		}
		tbody tr:nth-child(odd) {
 			background-color: yellow;
		}

		tbody tr:nth-child(even) {
			background-color: lightgrey;
		}		
		.table-wrapper{
			max-height: 40%;
    		overflow-y: auto;
		}
		.cheque {
			box-shadow:inset 0px 1px 0px 0px #97c4fe;
			background:linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
			background-color:#3d94f6;
			border-radius:6px;
			border:3px solid #03080f;
			display:inline-block;
			cursor:pointer;
			color:#ffffff;
			font-family:Arial;
			font-size:15px;
			font-weight:bold;
			padding:6px 24px;
			text-decoration:none;
					text-shadow:0px 1px 0px #1570cd;
		}
		.cheque:hover {
			background:linear-gradient(to bottom, #1e62d0 5%, #3d94f6 100%);
			background-color:#1e62d0;
		}
		.cheque:active {
			position:relative;
			top:1px;
		}

		.remover {
			box-shadow: 3px 4px 0px 0px #8a2a21;
			background:linear-gradient(to bottom, #c62d1f 5%, #f24437 100%);
			background-color:#c62d1f;
			border-radius:18px;
			border:2px solid #0a0a0a;
			display:inline-block;
			cursor:pointer;
			color:#ffffff;
			font-family:Arial;
			font-size:17px;
			padding:7px 25px;
			text-decoration:none;
			text-shadow:0px 1px 0px #810e05;
		}
		.remover:hover {
			background:linear-gradient(to bottom, #f24437 5%, #c62d1f 100%);
			background-color:#f24437;
		}
		.remover:active {
			position:relative;
			top:1px;
		}
		input[type=text]{
			border: 2px solid red;
  			border-radius: 4px;
  			background-color: white;
  			height: 4%;
		}
		#pesquisar{
			width: 60%;
			height: 8%;
			font-size: 30px;
			background-color: transparent;
			color: white;
			border-color: red;
			border-radius: 20px;
			border-width: 5px;
			font-weight: bold;
			text-shadow: 3px 3px black;
		}
		#criaAula{
			width: 60%;
			height: 8%;
			font-size: 30px;
			background-color: transparent;
			color: black;
			border-color: red;
			border-radius: 20px;
			border-width: 5px;
			font-weight: bold;
			margin-top: 3%;
			margin-bottom: 2%;
			/*text-shadow: 3px 3px black;*/
		}
		.container{
			text-align: center;
		}
		select{
			width: 100%; /* Tamanho do select, maior que o tamanho da div "div-select" */   
			height:4%; /* Altura do select, importante para que tenha a mesma altura em todo os navegadores */   
			border:2px solid red;
		}
		#nome_curso{
			width: 40%;
		}
		#voltar{
			width: 100%;
			font-size: 30px;
			background-color: transparent;
			color: black;
			border-color: red;
			border-radius: 20px;
			border-width: 5px;
			font-weight: bold;
		}
		#codigo{
			color: green;

		}
	</style>
	<head>
		<script src="public/js/jquery.js"></script>
		<script src="ajax/pesquisa.js"></script>	
		<meta charset="utf-8">
		<title>prototipo</title>
		<!--<link rel= "stylesheet" type="text/css" href="style.css">-->
		<link href="public/css/bootstrap.min.css" rel="stylesheet">

</head>
	<body>

		<div class="container">
			<form id="formulario" name="formulario">
				<h1>Preencha os campos para pesquisar por um link</h1>
				<br><br>
				<input id="titulo" name="titulo" type="text" class="form-control" placeholder="digite o titulo">
				<br><br>
				<input id="link" name="link" type="text" class="form-control" placeholder="digite um link">
				<br><br>
				<input id="tema" name="tema" type="text" class="form-control" placeholder="digite o tema">
				<br><br>
				<select id="tipo" name="tipo">
					<option value="">Todos</option>
		 			<option value="Texto">Texto</option>
					<option value="Video">Video</option>
					<option value="exercico">Exercício</option>
					<option value="Audio">Áudio</option>
					<option value="Variados">Variados</option>
				</select>
				<br><br>
				<select id="dificuldade" name="dificuldade">
					<option value="">Todos</option>
		 			<option value="basico">Basico</option>
					<option value="Intermediario">Intermediário</option>
					<option value="Avancado">Avançado</option>
				</select>
				<br><br>
				<input id="usuario" name="usuario" type="text" class="form-control" placeholder="digite o seu nome">
				<br><br>
				<input id="descricao" name="descricao" type="text" class="form-control" maxlength="150" placeholder="digite a descrição(maximo de 150 caracteres)">
				<br><br>
				<button id="pesquisar" name="pesquisar" class="w3-btn">Pesquisar</button>
			</form>
			<div class="table-wrapper">
				<table align="center" border="1px" style="width:100%; line-height:40px;" id="tabela" name="tabela">
					<tr>
						<th>titulo</th>
						<th>tema</th>
						<th>tipo</th>
						<th>dificuldade</th>
						<th>usuario</th>
						<th>descrição</th>
						<th>link</th>
						<th>adicionar ao curso</th>
					</tr>
					<?php 
						while ($rows=mysqli_fetch_assoc($result)) {
							$titulo = $rows["titulo"];
							$tema = $rows["tema"];
							$tipo = $rows["tipo"];
							$dificuldade = $rows["dificuldade"];
							$nome = $rows["nome"];
							$descricao = $rows["descricao"];
							$link = $rows["link"];
					?>
							<tr class="apagar">
								<td><?php echo $rows["titulo"];?></td>
								<td><?php echo $rows["tema"];?></td>
								<td><?php echo $rows["tipo"];?></td>
								<td><?php echo $rows['dificuldade']; ?></td>
								<td><?php echo $rows['nome']; ?></td>
								<td><?php echo $rows['descricao']; ?></td>
								<td><a href=<?php echo $rows["link"]; ?>>Acessar</a></td>
								<td><button class="cheque" id=<?php echo $rows["id"];?>>adicionar</button></td>
							</tr>
					<?php
						}
					?>
					
				</table>
			</div>
			<br><br>
			<h2>Nomeie o curso</h2>
			<input id="nome_curso" type="text" name="nome_curso" placeholder="nome do curso">
			<br><br>
			<h4>Vizualização do curso</h4>
			<div class="table-wrapper">
				<table align="center" border="1px" style="width:100%; line-height:40px;" id="aula" name="aula">
					<tr>
						<th>titulo</th>
						<th>tema</th>
						<th>tipo</th>
						<th>dificuldade</th>
						<th>usuario</th>
						<th>descrição</th>
						<th>link</th>
						<th>remover</th>
					</tr>
				</table>
			</div>
			<button id="criaAula" name="criaAula" class="w3-btn" style="text-align: center;">Criar aula</button>
			<h3 style="text-align: center;">codigo:</h3>
			<h2 id = "codigo" name = "codigo" style="text-align: center;">-</h2>
			<h4>Mande o código para os alunos para que o curso possa ser acessado por eles</h4>
			<a href="http://localhost/web/"><button id="voltar">voltar a pagina inicial</button></a>


		</div>
	</body>
	<footer>
	
	
	</footer>
</html>;