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
		myAlertConfirm("Para postar um projeto você precisa estar logado no site. Deseja fazer o login?", "../Login/login.php") ;
	})

	$(".trapPerg").click(function(){
		myAlertConfirm("Para fazer uma pergunta você precisa estar logado no site. Deseja fazer o login?", "../Login/login.php") ;
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

	$("#postsFechados2").click(function(){
		var obj = document.getElementById("nomeProj2");
	    if ( obj.innerHTML == "▶")
	    {
	    	obj.innerHTML = "▼";
	    }else{
	    	obj.innerHTML = "▶"	;
	    }

		$('#projDesc2').slideToggle("300");
	})

	$("#commentTrap").click(function(){
		myAlertConfirm("Para fazer um comentário você precisa estar logado no site. Deseja fazer o login?", "../Login/login.php") ;
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
	div.style.position = "fixed";
	div.style.zIndex =  "15";
	div.style.borderRadius = "5px";
	div.style.margin = "20px 20%";
	div.innerHTML += "<span class='closebtn' onclick='displayNoneParent(this)'>×</span>";
	div.innerHTML += "<span style='margin-left : 30px; vertical-align:middle; line-height:60px' >" + texto + "</span>";

	document.getElementById("container").appendChild(div);
}

function myAlertLogin( texto ){
	var div = document.createElement("div");
	div.style.width = "50%";
	div.style.height = "60px";
	div.style.background = "rgba(0,0,0,0.8)";
	div.style.color = "white";
	div.style.transition = "opacity 0.6s";
	div.style.position = "fixed";
	div.style.zIndex =  "15";
	div.style.borderRadius = "5px";
	div.style.top = "50px";
	div.style.margin = "0 25%";
	div.innerHTML += "<span class='closebtn' onclick='displayNoneParent(this)'>×</span>";
	div.innerHTML += "<span style='margin-left : 30px; vertical-align:middle; line-height:60px' >" + texto + "</span>";

	document.body.appendChild(div);
}

function myAlertConfirm( texto, pagina ){
	var div = document.createElement("div");
	div.style.width = "70%";
	div.style.height = "60px";
	div.style.background = "rgba(0,0,0,0.8)";
	div.style.color = "white";
	div.style.transition = "opacity 0.6s";
	div.style.position = "fixed";
	div.style.zIndex =  "15";
	div.style.borderRadius = "5px";
	div.style.top = "50px";
	div.style.margin = "0 15%";
	div.innerHTML += "<span class='msgConfirm'><a class='msgConfirm' href='"+ pagina +"'>Confirmar</a></span>";
	div.innerHTML += "<span class='msgConfirm' onclick='displayNoneParent(this)'>Cancelar</span>";
	div.innerHTML += "<span style='margin-left : 30px; vertical-align:middle; line-height:60px' >" + texto + "</span>";

	document.body.appendChild(div);
}

function checarCamposProj(){
	var t = document.getElementById("tituloProj").value;
	var d = document.getElementById("descProj").value;
	var f = document.getElementById("arqProj").value;
	var listaExt = [".js",".zip",".rar",".txt",".php",".html"];

	if(!f){
		myAlert("Escolha um arquivo");
		return;
	}

	var a = 0;
	for(i=0; i<= listaExt.length-1; i++){
		if( f.indexOf(listaExt[i]) != -1 ){
			a++;
		}
	}
	if(a == 0){
		myAlert("Extensão inválida.");
		return;
	}

	var fields = [t, d];
	var l = fields.length;

	for (i = 0; i < l-1; i++) {
		if (fields[i] == "") {
		  myAlert("Preencha todos os campos obrigatórios.");
		  return;
		}
	}

	document.getElementById("env").click();
}

function checarCamposPerg(){
	var t = document.getElementById("tituloPerg").value;
	var d = document.getElementById("descPerg").value;
	var c = document.getElementById("cat").value;

	var fields = [t, d, c];
	var l = fields.length;

	for (i = 0; i < l-1; i++) {
		if (fields[i] == "") {
		  myAlert("Preencha todos os campos obrigatórios.");
		  return;
		}
	}

	document.getElementById("enviar").click();
}

function checarCamposLogin(){
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
}

function onloadPage(){
	document.getElementById('postsFechados1').click();
	document.getElementById('postsFechados2').click();
//	document.getElementById('postsFechados3').click();
}