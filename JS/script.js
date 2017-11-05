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

	$("#postsFechados1").click(function(){
		var obj = document.getElementById("nomeProj1");
	    if ( obj.innerHTML == "▶")
	    {
	    	obj.innerHTML = "▼";
	    }else{
	    	obj.innerHTML = "▶"	;
	    }

		$('#projDesc1').slideToggle("300", function() {

		});
	})
})

function displayNoneParent( param){
	param.parentElement.style.display='none';
}

function myAlert( texto ){
	var div = document.createElement("div");
	div.style.width = "50%";
	div.style.height = "60px";
	div.style.background = "rgba(0,0,0,0.8)";
	div.style.color = "white";
	div.style.transition = "opacity 0.6s";
	div.style.position = "absolute";
	div.style.zIndex =  "15";
	div.style.borderRadius = "5px";
	div.style.margin = "20px 20%";
	div.innerHTML += "<span class='closebtn' onclick='displayNoneParent(this)'>×</span>";
	div.innerHTML += "<span style='margin-left : 30px; vertical-align:middle; line-height:60px' >" + texto + "</span>";

	document.getElementById("container").appendChild(div);
}

function checarCamposProj(){
	var t = document.getElementById("tituloProj").value;
	var d = document.getElementById("descProj").value;
	var f = document.getElementById("arqProj").value;

	var fields = [t, d, f];
	var l = fields.length;

	for (i = 0; i < l-1; i++) {
		if (fields[i] == "") {
		  myAlert("Preencha todos os campos obrigatórios.");
		  return;
		}
	}

	document.getElementById("env").click();
}

function onloadPage(){
	document.getElementById('postsFechados1').click();
//	document.getElementById('postsFechados2').click();
//	document.getElementById('postsFechados3').click();
}