var moveForce = 15; // max popup movement in pixels
var rotateForce = 5; // max popup rotation in deg

$(document).mousemove(function(e) {
    var docX = $(document).width();
    var docY = $(document).height();
    
    var moveX = (e.pageX - docX/2) / (docX/2) * -moveForce;
    var moveY = (e.pageY - docY/2) / (docY/2) * -moveForce;
    
    var rotateY = (e.pageX / docX * rotateForce*2) - rotateForce;
    var rotateX = -((e.pageY / docY * rotateForce*2) - rotateForce);
    
    $('.popup')
        .css('left', moveX+'px')
        .css('top', moveY+'px')
        .css('transform', 'rotateX('+rotateX+'deg) rotateY('+rotateY+'deg)');
	$('.popup2')
        .css('left', moveX+'px')
        .css('top', moveY+'px')
        .css('transform', 'rotateX('+rotateX+'deg) rotateY('+rotateY+'deg)');
	$('.popup3')
        .css('left', moveX+'px')
        .css('top', moveY+'px')
        .css('transform', 'rotateX('+rotateX+'deg) rotateY('+rotateY+'deg)');
});
$(document).ready(function(){
	$(".text").hide();
    $(".popup").mouseover(function(){
        $(".text").show();
    });
	$(".popup2").mouseover(function(){
        $(".text").show();
    });
	$(".popup3").mouseover(function(){
        $(".text").show();
    });
    $(".popup").mouseout(function(){
        $(".text").hide();
    });
	$(".popup2").mouseout(function(){
        $(".text").hide();
    });
	$(".popup3").mouseout(function(){
        $(".text").hide();
    });
});