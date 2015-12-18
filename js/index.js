$(document).ready(function(){
	$("#inletter").hide();
    $("#anim_1").mouseover(function(){
        $("#inletter").fadeIn(3000);
    });
	
	$("#anim_1").mouseout(function(){
        $("#inletter").fadeOut(1000);
    });
});

$(document).ready(function(){
	$("#outletter").hide();
    $("#anim_2").mouseover(function(){
        $("#outletter").fadeIn(3000);
    });
	
	$("#anim_2").mouseout(function(){
        $("#outletter").fadeOut(1000);
    });
});