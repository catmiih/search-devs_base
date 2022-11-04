const cpf = document.querySelector('#cpf');
const cep = document.querySelector('#cep');
const data = document.querySelector('#data');

/* Form Validation */


/* Only Numbers in required Input*/
function onlynumber(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    //var regex = /^[0-9.,]+$/;
    var regex = /^[0-9.]+$/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

/* Only Letter */
function onlyLetter(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    //var regex = /^[0-9.,]+$/;
    var regex = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

/* Validations */
function validateCPF(cpf_n) {
    var sum;
    var rest;
    var num = 11;

    sum = 0;

    for (i = 1; i <= 11; i++) {

        var numb = cpf_n.substring(i - 1, i)

        if (numb.includes('.')) { num++ }
        else {
            sum = sum + (parseInt(cpf_n.substring(i - 1, i)) * (num - i));
        }
    }

    rest = (sum * 10) % 11;

    if (rest >= 10)
        rest = 0

    if (rest != parseInt(cpf_n.substring(12, 13)))
        return false;

    sum = 0;
    num = 12;

    for (i = 1; i <= 13; i++) {

        var numb = cpf_n.substring(i - 1, i)

        if (!numb.includes('.') && !numb.includes('-')) {
            sum = sum + (parseInt(cpf_n.substring(i - 1, i)) * (num - i));
        }
        else {
            num++
        }
    }

    rest = (sum * 10) % 11;

    if (rest >= 10)
        rest = 0

    if (rest != parseInt(cpf_n.substring(13, 14))) {
        return false
    }
    else {
        return true
    }
}

/* FAZER O VALIDADE CNPJ (18 DÍGITOS) */

function validateCEP(cep) {
    $.ajax({
        url: "https://cdn.apicep.com/file/apicep/" + cep + ".json",
        type: "GET",
        success: function (response) {
            console.log(response);

            if (response.code != "not_found") {
                return true
            }
            else {
                return false
            }
        }
    })
}

function validateDate(date) {
    var dateTime = new Date()
    var year = dateTime.getFullYear()

    if (parseInt(date.substring(0, 2)) <= 31) {
        if (parseInt(date.substring(3, 5)) <= 12) {
            if (parseInt(date.substring(6)) <= year - 16) {
                return true
            } else
                return false
        } else
            return false
    } else
        return false
}


/* ============ Convert Inputs ============ */
function cellphone(cellphone) {
    onlynumber();

    if (cellphone.value.length == 0)
        cellphone.value = '(' + cellphone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
    if (cellphone.value.length == 3)
        cellphone.value = cellphone.value + ') ';

    if (cellphone.value.length == 10)
        cellphone.value = cellphone.value + '-';
}

function ReadCpf(cpf) {
    onlynumber();

    if (cpf.value.length == 3)
        cpf.value = cpf.value + '.';

    if (cpf.value.length == 7)
        cpf.value = cpf.value + '.';

    if (cpf.value.length == 11)
        cpf.value = cpf.value + '-';

}

function date(date) {
    onlynumber();
    if (date.value.length == 2)
        date.value = date.value + '/'; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
    if (date.value.length == 5)
        date.value = date.value + '/';
}

function CEP(cep) {
    onlynumber();
    if (cep.value.length == 5)
        cep.value = cep.value + '-';
}