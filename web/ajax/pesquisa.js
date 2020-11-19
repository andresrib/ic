var ids_codigo = "";
$(document).ready(function(){
	$('#formulario').on('submit', function(e){
		e.preventDefault();
		$(".apagar").remove();
		$.ajax({
			type: 'POST',
			url: 'ajax/pesquisando.php',
			data: {
				titulo: $("#titulo").val(),
				link: $("#link").val(),
				tema: $("#tema").val(),
				tipo: $("#tipo").val(),
				dificuldade: $("#dificuldade").val(),
				nome: $("#usuario").val(),
				descricao: $("#descricao").val()
			}

		}).done(function(resultado){
			resultado = resultado.substring(1);
			alert(resultado)
			var x = JSON.parse(resultado);
			for(var i=0; i<x[0][7]; i++){
				var add_controls = '<tr class="apagar">'
				add_controls += `<td class >${x[i][0]}</td>`
				add_controls += `<td>${x[i][1]}</td>`
				add_controls += `<td>${x[i][2]}</td>`
				add_controls += `<td>${x[i][3]}</td>`
				add_controls += `<td>${x[i][4]}</td>`
				add_controls += `<td>${x[i][5]}</td>`
				add_controls += `<td><a href=${x[i][6]}>Acessar</a></td>`
				add_controls += `<td>`
				add_controls += `<button class="cheque" id=${x[i][8]}>adicionar</button>`
				add_controls += `</td>`
				add_controls += "</tr>";
				$("#tabela").append(add_controls);
			}
		})
		.fail(function(){
			alert("error");
		});
	});
	$(".cheque").on('click', function(event){
		var identi = $(event.target).attr('id');
		var manda_id = parseInt(identi);
		//alert(manda_id);
		$.ajax({
			type: 'POST',
			url: 'ajax/preVisualizacao.php',
			data: {
				id: manda_id
			}

		}).done(function(resultado){
			//resultado = resultado.substring(1);
			//alert(resultado);
			// preserve newlines, etc - use valid JSON
			/*resultado = resultado.replace(/\\n/g, "\\n")  
			               .replace(/\\'/g, "\\'")
			               .replace(/\\"/g, '\\"')
			               .replace(/\\&/g, "\\&")
			               .replace(/\\r/g, "\\r")
			               .replace(/\\t/g, "\\t")
			               .replace(/\\b/g, "\\b")
			               .replace(/\\f/g, "\\f");
			// remove non-printable and other non-valid JSON chars
			resultado = resultado.replace(/[\u0000-\u0019]+/g,"");*/
			var x = JSON.parse(resultado);
	 		var verifica = "|" + String(x[7]);
			if (ids_codigo.includes(verifica)) {
				alert("link ja incluso no curso")
				//alert(verifica);
			}
			else{
				var adicina_controle = `<tr class="visualizado" id = ${x[7]}>`
					adicina_controle += `<td>${x[0]}</td>`
					adicina_controle += `<td>${x[1]}</td>`
					adicina_controle += `<td>${x[2]}</td>`
					adicina_controle += `<td>${x[3]}</td>`
					adicina_controle += `<td>${x[4]}</td>`
					adicina_controle += `<td>${x[5]}</td>`
					adicina_controle += `<td><a href=${x[6]}>Acessar</a></td>`
					adicina_controle += `<td><button class="remover" id=${x[7]}>remover</button></td>`
					adicina_controle += "</tr>";
					$("#aula").append(adicina_controle);
					ids_codigo += "|";
					ids_codigo += x[7];
					
					//alert(ids_codigo);
			}
		});
	});
	/*$('.remover').on('click', function(event){
		alert("batata");
		var identifica = $(event.target).attr('id');
		alert(identifica);
		removedor = String(identifica) + "|";
		ids_codigo = ids_codigo.replace(removedor, "");
		identifica = "#" + String(identifica);
		$(".visualizado").remove(identifica);
	});*/
	$('.remover').on('click', function(e){
		alert("função chamada");
	});
	$('#criaAula').on('click', function(e){
		var nome_curso = $("#nome_curso").val();
		var codigo_do_curso = nome_curso + ids_codigo;
		$("#codigo").text(codigo_do_curso);
	});
});
