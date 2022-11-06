$('.form2').css('display', 'none');

function nextDev() {

    var name = $("input[name='name']").val();
    var cell = $("input[name='cell']").val();
    const cpf = document.querySelector('#cpf');
    const cep = document.querySelector('#cep');
    const data = document.querySelector('#data');

    if (!!name) {
        $("input[name='name']").removeClass("error")
    }else {
        $("input[name='name']").addClass("error")
    }

    if (validateDate(data.value)) {
        $("input[name='born']").removeClass("error")

    } else {
        $("input[name='born']").addClass("error")
    }

    if (!!cell) {
        $("input[name='cell']").removeClass("error")
    }else {
        $("input[name='cell']").addClass("error")
    }

    if (validateCEP(cep.value) == 200) {
        $("input[name='cep']").removeClass("error")
    } else {
        $("input[name='cep']").addClass("error")
    }

    if (validateCPF(cpf.value)) {
        $("input[name='cpf']").removeClass("error")
    } else {
        $("input[name='cpf']").addClass("error")
    }


    /* If not empty */

    if (validateDate(data.value) && validateCPF(cpf.value) && validateCEP(cep.value) && !!cell && !!name) {
        $('#campo1').fadeOut(1000).css('display', 'none');
        $('.form2').fadeIn(1000).css('display', 'inline');
    }
}

function nextComp() {
    
    var name = $("input[name='name']").val();
    var responsible = $("input[name='responsible']").val();
    const data = document.querySelector('#data');
    var cell = $("input[name='cell']").val();
    const cnpj = document.querySelector('#CNPJ');
    const cpf = document.querySelector('#cpf');

    if (!!name) {
        $("input[name='name']").removeClass("error")
    }else {
        $("input[name='name']").addClass("error")
    }

    if (!!responsible) {
        $("input[name='responsible']").removeClass("error")
    }else {
        $("input[name='responsible']").addClass("error")
    }

    if (validateDate(data.value)) {
        $("input[name='data']").removeClass("error")

    } else {
        $("input[name='data']").addClass("error")
    }

    if (!!cell) {
        $("input[name='cell']").removeClass("error")
    }else {
        $("input[name='cell']").addClass("error")
    }

    if (validateCNPJ(cnpj.value)) {
        $("input[name='CNPJ']").removeClass("error")
    } else {
        $("input[name='CNPJ']").addClass("error")
    }

    if (validateCPF(cpf.value)) {
        $("input[name='cpf']").removeClass("error")
    } else {
        $("input[name='cpf']").addClass("error")
    }


    /* If not empty */

    if (validateDate(data.value) && validateCPF(cpf.value) && validateCNPJ(cnpj.value) && !!responsible && !!cell && !!name) {
        $('#campo1').fadeOut(1000).css('display', 'none');
        $('.form2').fadeIn(1000).css('display', 'inline');
    }

}

function back() {
    $('#campo1').fadeIn(1000).css('display', 'inline');
    $('.form2').fadeOut(1000).css('display', 'none');
}
