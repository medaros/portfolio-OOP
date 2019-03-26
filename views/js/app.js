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

// QUERY SELECT

function querySelect(element){
    return document.querySelector(element);
}
function querySelectAll(element){
    return document.querySelectorAll(element);
}

// END QUERY SELECT

// MENU SWITCHER

// function menuSwitchOff(){
//     this.classList.toggle("h4");
// }

// function menuSwitchPrn(){
//     return this.classList.toggle("h1");
// }

// END MENU SWITCHER

for(let ele = 0; ele < querySelectAll(".menu p").length; ele++) {
    querySelectAll(".menu p")[ele].classList.toggle("h4");
}

