$(document).on("click mousemove","body",function(e){ 
    var x = e.clientX / 10;
    var y = e.clientY / 10;
    var newposX = x / 50;
    var newposY = y / 50; 

    console.log(x, y);

    if(x >= 100 && y >= 100) {
        
    }

    $("body *").not('.filter').css("transform","translate3d("+newposX+"px,"+newposY+"px,0px)");
});