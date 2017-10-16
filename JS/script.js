///*
$(document).ready(function(){
	var aberto = true;
	$("#menu").click(function(){
		if(aberto){
			$("body").css({"grid-template-columns": "0 auto"});
			aberto =false;
		} else{
			$("body").css({"grid-template-columns": "260px auto"});
			aberto=true;
		}		
	})

	$('.btnEditar').click(function(){
		document.getElementById('editPage').style.display = 'block';
	})

	$('.btnCancelar').click(function(){
		document.getElementById('editPage').style.display = 'none';
	})
})