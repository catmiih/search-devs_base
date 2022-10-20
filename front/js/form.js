$('.form2').css('display', 'none');

function next() {
    $('#campo1').fadeOut(1000).css('display', 'none');
    $('.form2').fadeIn(1000).css('display', 'inline');
}

function back() {
    $('#campo1').fadeIn(1000).css('display', 'inline');
    $('.form2').fadeOut(1000).css('display', 'none');
}