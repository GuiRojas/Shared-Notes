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
})
//*/
/*
$(document).ready(function(){
	var aberto = false;
		$("#menu").click(function(){
			$('#contentSide').animate({width: 'toggle'});		
		})
});
*/
