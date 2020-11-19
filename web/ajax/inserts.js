$(document).ready(function(){
	$('#envio').on('click', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'ajax/inserts.php',
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
			alert("sucesso")
		}).fail(function(){
			alert(resultado);
		});

	});
});