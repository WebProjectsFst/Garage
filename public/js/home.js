var lastScrollTop = 0;
var scale=1.0;
function test(){
  var st=$(document).scrollTop();
  if(st<=100 && st<lastScrollTop){
    $("#navigationBar").css("opacity", 1);
  }else if(st>=100 && st>lastScrollTop){
    $("#navigationBar").css("opacity", 0.7);
  }
  if(st<=600 && st<lastScrollTop){
    $("#navigationBar").css("filter", "invert(0%)");
  }else if(st>=600 && st>lastScrollTop){
    $("#navigationBar").css("filter", "invert(100%)");
  }
  if(st<=50){
    if(st<lastScrollTop){
      var s=scale+(scale-(st/100));
      if(s<=1.0){
        $("#logo").css("transform", "scale("+s+")");
      }else{
        $("#logo").css("transform", "scale(1)");
      }
      $(".navbar-brand").css("padding-top", 20-($(document).scrollTop()/2.5));
      $(".navbar-brand").css("margin-top", -5+(5-$(document).scrollTop()/10));
      $(".menu-ul").css("padding-top", 25-($(document).scrollTop()/2));
    }else{
      scale=(1.0-(st/100));
      $("#logo").css("transform", "scale("+scale+")");
      $("#navigationBar").css("height", $("#navigationBar").height()-$(document).scrollTop());
      $(".navbar-brand").css("padding-top", 20-($(document).scrollTop()/2.5));
      $(".navbar-brand").css("margin-top", -($(document).scrollTop()/10));
      $(".menu-ul").css("padding-top", 25-($(document).scrollTop()/2));
    }
  }else{
    $("#logo").css("transform", "scale(0.5)");
    $("#navigationBar").css("height", 50);
    $(".navbar-brand").css("padding-top", 0);
    $(".navbar-brand").css("margin-top", -5);
    $(".menu-ul").css("padding-top", 0);
  }
  lastScrollTop=st;
}

function resetAndRefresh() {
  document.getElementById('login_form').reset();
  if(document.getElementsByClassName('help-block').length > 0) {
    location.reload();
  }
}
