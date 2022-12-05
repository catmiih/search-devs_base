$(document).ready(function() {

    $("#username,#start,#vHour,#hour,#end").on('keyup', function() {

        var pHour = parseFloat($('#vHour').val()) || 0;
        var hDay = parseFloat($('#hour').val()) || 0;

        var d1 = $('#start').val();
        var d2 = $('#end').val();

        var calcDay = new Date(d2) - new Date(d1);
        if (calcDay == null) {
            calcDay = 0
        }
        var days = calcDay / (1000 * 60 * 60 * 24);

        var endValue = (pHour * hDay) * days;

        /* Verify Checkbox */

        if (document.getElementById('Artificial Intelligence').checked) {
            endValue += 59.99;
        }

        if (document.getElementById('Blockchain').checked) {
            endValue += 79.99;
        }

        if (document.getElementById('cybersecurity').checked) {
            endValue += 20;
        }

        if (document.getElementById('Database Analytics').checked) {
            endValue += 69.99;
        }

        if (document.getElementById('Data Science').checked) {
            endValue += 179.99;
        }

        if (document.getElementById('Design').checked) {
            endValue += 79.99;
        }

        if (document.getElementById('Desktop Development').checked) {
            endValue += 99.99;
        }

        if (document.getElementById('DevOps').checked) {
            endValue += 14.99;
        }

        if (document.getElementById('Mobile Development').checked) {
            endValue += 14.99;
        }

        if (document.getElementById('Web - Back End').checked) {
            endValue += 14.99;
        }

        if (document.getElementById('Web - Front End').checked) {
            endValue += 14.99;
        }

        if (document.getElementById('Outros').checked) {
            endValue += 14.99;
        }

        if (!!pHour && !!hDay && !!d1 && !!d2) {
            $('#eValue').val('R$ ' + endValue.toFixed(2));
        }
    });

    $(".form-check-input, form-check-label").on('click', function() {

        var pHour = parseFloat($('#vHour').val()) || 0;
        var hDay = parseFloat($('#hour').val()) || 0;

        var d1 = $('#start').val();
        var d2 = $('#end').val();

        var calcDay = new Date(d2) - new Date(d1);
        if (calcDay == null) {
            calcDay = 0
        }
        var days = calcDay / (1000 * 60 * 60 * 24);

        var endValue = (pHour * hDay) * days;

        /* Verify Checkbox */

        if (document.getElementById('Artificial Intelligence').checked) {
            endValue += 59.99;
        }

        if (document.getElementById('Blockchain').checked) {
            endValue += 79.99;
        }

        if (document.getElementById('cybersecurity').checked) {
            endValue += 20;
        }

        if (document.getElementById('Database Analytics').checked) {
            endValue += 69.99;
        }

        if (document.getElementById('Data Science').checked) {
            endValue += 179.99;
        }

        if (document.getElementById('Design').checked) {
            endValue += 79.99;
        }

        if (document.getElementById('Desktop Development').checked) {
            endValue += 99.99;
        }

        if (document.getElementById('DevOps').checked) {
            endValue += 14.99;
        }

        if (document.getElementById('Mobile Development').checked) {
            endValue += 14.99;
        }

        if (document.getElementById('Web - Back End').checked) {
            endValue += 14.99;
        }

        if (document.getElementById('Web - Front End').checked) {
            endValue += 14.99;
        }

        if (document.getElementById('Outros').checked) {
            endValue += 14.99;
        }

        if (!!pHour && !!hDay && !!d1 && !!d2) {
            $('#eValue').val(endValue.toFixed(2));
        }
    });
});