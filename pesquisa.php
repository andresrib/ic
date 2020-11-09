<<?php 
include_once('connect/connect.php');
$query = "select * from links";
$result = mysqli_query($conn, $query);
 ?>

<!DOCTYPE html>
<html lang = "pt-br">
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
			<table align="center" border="1px" style="width:1000px; line-height:40px;" id="tabela" name="tabela">
				<tr>
					<th>titulo</th>
					<th>tema</th>
					<th>tipo</th>
					<th>dificuldade</th>
					<th>usuario</th>
					<th>descrição</th>
					<th>link</th>
					<th>selecionar</th>
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
			<br><br>
			<input id="nome_curso" type="text" name="nome_curso" placeholder="nome do curso">
			<br><br>
			<h4>Vizualização do curso</h4>
			<table align="center" border="1px" style="width:1000px; line-height:40px;" id="aula" name="aula">
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
			<button id="criaAula" name="criaAula" class="w3-btn" style="text-align: center;">Criar aula</button>
			<h3 style="text-align: center;">codigo:</h3>
			<h2 id = "codigo" name = "codigo" style="text-align: center;"></h2>

		</div>
	</body>
	<footer>
	
	
	</footer>
</html>;