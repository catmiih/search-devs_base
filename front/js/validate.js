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

function validateCNPJ(cnpj) {
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
}


function validateCEP(cep) {

    var json = $.ajax({
        url: "https://cdn.apicep.com/file/apicep/" + cep + ".json",
        async: false,
        type: "GET",
        success: function (response) {
            return(response);
        }
    })

    return json.status
}

function validateDate(date) {
    var dateTime = new Date()
    var year = dateTime.getFullYear()

    if (parseInt(date.toString().substring(1, 2)) <= 31) {
        if (parseInt(date.toString().substring(3, 5)) <= 12) {
            if (parseInt(date.toString().substring(6)) <= year - 16) {
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

function cnpj(cnpj) {
    onlynumber();
    if (cnpj.value.length == 2)
        cnpj.value = cnpj.value + '.';

    if (cnpj.value.length == 6)
        cnpj.value = cnpj.value + '.';

    if (cnpj.value.length == 10)
        cnpj.value = cnpj.value + '/';

    if (cnpj.value.length == 15)
        cnpj.value = cnpj.value + '-';
}