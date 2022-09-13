(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})();

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

function cellphone(cellphone) {
    onlynumber();

    if (cellphone.value.length == 0)
        cellphone.value = '(' + cellphone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
    if (cellphone.value.length == 3)
        cellphone.value = cellphone.value + ') ';

    if (cellphone.value.length == 10)
        cellphone.value = cellphone.value + '-';
}

function date(date) {
    onlynumber();
    if (date.value.length == 2)
        date.value = date.value + '/'; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
    if (date.value.length == 5)
        date.value = date.value + '/';
}


function cpf(cpf) {
    onlynumber();
    if (cpf.value.length == 3)
        cpf.value = cpf.value + '.'; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
    if (cpf.value.length == 7)
        cpf.value = cpf.value + '.';

    if (cpf.value.length == 11)
        cpf.value = cpf.value + '-';
}