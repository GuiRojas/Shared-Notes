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

	$(".trapProj").click(function(){
		if (confirm("Para postar um projeto voce precisa estar logado no site. Deseja fazer o login?")) {
		    window.location.replace("../Login/login.php");
		} else {
		    
		}
	})

	$(".trapPerg").click(function(){
		if (confirm("Para fazer uma pergunta voce precisa estar logado no site. Deseja fazer o login?")) {
		    window.location.replace("../Login/login.php");
		} else {
		    
		}
	})

	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('#preview').attr('src', e.target.result);
	    }

	    reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#mudarFoto").change(function(){
		readURL(this);
	})

})