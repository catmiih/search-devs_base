function Mudarestado(el) {
    var display = document.getElementById(FormLog).style.display;
    if(display == "none")
        document.getElementById(FormLog).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';
}