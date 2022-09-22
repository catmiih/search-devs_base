
//FUNÇÃO DE DESEMPENHO
debounce = function (func, wait, immediate) {
  var timeout;
  return function () {
    var context = this,
      args = arguments;
    var later = function () {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};

//OUTROS ELEMENTOS
function animateScroll() {
  var $target = $(".tag"),
    animationClass = "tag-visible",
    offset = $(window).height() - 150;

  var documentTop = $(document).scrollTop();
  $target.each(function () {
    var itemTop = $(this).offset().top;
    if (documentTop > itemTop - offset) {
      $(this).addClass(animationClass);
    }
  });
}

//EFEITO MENU
function menuScroll() {
  var $target = $(".bg-dark-menu");

  var documentTop = $(document).scrollTop();
  $target.each(function () {
    if (documentTop > 50) {
      $(this).addClass("bg-dark-menu-later");
      $(this).addClass("transition-before");
    } else {
      $(this).removeClass("bg-dark-menu-later");
      $(this).removeClass("transition-before");
    }
  });
}

//JQUERY
$(document).ready(function(){

  //INICIAL
    $("body").hide();
    $("body").fadeIn(1000);
    
	
    //INICIALIZANDO ELEMENTOS
  menuScroll();
  animateScroll();

  $(document).scroll(
    debounce(function () {
      animateScroll();
      menuScroll();
    }, 10)
  );
  
});