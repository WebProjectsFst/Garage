$('.menu-item').click(function(e){
    $(".selected").removeClass("selected");
    var SendButton = $(e.target).parent();
    SendButton.addClass("selected");

    loadPage(e);
    init();
});

var currentSeconds = 0;

function updateClock ( )
{
    var login_time=$('#login_time').text();
    var seconds = new Date().getTime() / 1000;
    
    currentSeconds=seconds-login_time;
    $("#timer").html(new Date(currentSeconds * 1000).toISOString().substr(11, 8));

}

$(document).ready(function()
{
    $(".hidden-content").hide();
    setInterval('updateClock()', 1000);
    
    loadPage(null);
});

function loadPage(event) {
    var x="";
    if(event) {
        x = $(event.target).parent().children()[1].innerHTML;
        ///////////////////////////////////////
    }else{
        x=$(".selected")[0].children[1].innerHTML;
    }
    var allText = "";
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", x, false);
    rawFile.onreadystatechange = function () {
        if (rawFile.readyState === 4) {
            if (rawFile.status === 200 || rawFile.status == 0) {
                allText = rawFile.responseText;
            }
        }
    }
    rawFile.send(null);
    $(".content")[0].innerHTML = allText;
    init();
}

$(".header").click(function(){
    var footer=$(".hidden-content");
    if(footer.is(':visible')) {
        footer.hide(500);
        $(".up").attr("class","down");
    }else {
        footer.show(500);
        $(".down").attr("class","up");
    }
});