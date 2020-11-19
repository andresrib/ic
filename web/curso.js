$(document).ready(function(){
	$('#fcodigo').on('submit', function(e){
		e.preventDefault();
		var codigo = $('#icod').val();
		var cods = codigo.split("|");
		$("#titulo_curso").text(cods[0]);
		var query = "SELECT titulo, tema, tipo, link, descricao FROM links WHERE id IN (";
		for (var i = 1; i < cods.length; i++) {
			query += cods[i];
			if (i+1<cods.length) {
				query += ", ";
			}
		}
		query += ")";
		$.ajax({
			type: 'POST',
			url: 'ajax/curso.php',
			data: {
				q: query	
			}
		}).done(function(resultado){
			//resultado = resultado.substring(1);
			$(".apagar").remove();
			var x = JSON.parse(resultado);
			for(var i=0; i<x[0][5]; i++){
				var add_controls = '<tr class="apagar">'
				add_controls += `<td>${x[i][0]}</td>`
				add_controls += `<td>${x[i][1]}</td>`
				add_controls += `<td>${x[i][2]}</td>`
				add_controls += `<td>${x[i][3]}</td>`
				add_controls += `<td>`
				add_controls +=	`<a href=${x[i][4]}><input type="button" value="Acesso" /></a>`
				add_controls += `</td>`
				add_controls += `</tr>`;
				$("#tabela").append(add_controls);
			}
			//for(var i=0; i<x[0][4]){
				//add_controls="<h1>" + x[i][0] + "</h1>";
				//$("#principal")
		//	}
			
		});

	});

});