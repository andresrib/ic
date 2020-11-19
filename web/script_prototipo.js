/*$(function(){
	$('#envio').click(function(){
		var titulo = $('input#titulo').val();
		var link_insert = $('input#link').val();
		var tema = $('input#tema').val();
		var dificuldade = $('select#dificuldade').val();
		var usuario = $('input#usuario').val();
		//alert(titulo);
		//if( $.trim(titulo) != '' && $.trim(link) != '' && $.trim(tema) != '' && $.trim(dificuldade) != '' && $.trim(usuario) != ''){
			$.load('ajax/inserts.php', {titulo: titulo, link_insert: link_insert, tema: tema, dificuldade: dificuldade, usuario: usuario}, function(data){
					alert(data);
				});

		}
	});
});

*/