<link rel="stylesheet" href="css/register-login.css">

<style>
    .error {
        box-shadow: #FF0000 0px 0px 10px !important;
    }

    .error:focus {
        box-shadow: #FF0000 1px 1px 10px !important;
    }
</style>

<div id="campo1" class="form2">
    <h1>Cadastre-se</h1>
    <p>Informações de login.</p>

    <div class="form">

            <div class="input-group">
                <input type="text" placeholder="Nome de usuário" class="col form-control" name="username" id="" maxlength="25" minlength="5" required>
            </div>

            <div class="input-group">
                <input type="email" placeholder="Email" class="col form-control" name="email" id="" minlength="10" required>
            </div>

            <div class="col-xs-6">
                <div class="input-group">
                    <input type="password" placeholder="Senha" class="form-control" name="password" id="pass" minlength="8" required>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-eye btn-default" id="Epass">
                            <i class="fa-solid fa-eye" id="icon"></i>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="input-group">
                    <input type="password" placeholder="Confirmar senha" class="form-control" name="confirmPass" id="confirmPass" minlength="8" required>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-eye btn-default" id="Cpass">
                            <i class="fa-solid fa-eye iconC" id="icon"></i>
                        </button>
                    </span>
                </div>
            </div>

            <div class="input-group mb-3">

            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="term" id="termos">
                <label class="form-check-label" for="termos" style="margin: 0 1% 0 0;">
                    Eu concordo com os
                </label>
                <a href="" style="font-weight: 700;">Termos de contrato SEARCH DEVS &#8482;</a>
            </div>
            <br>

            <button type="button" onclick="submitForm()" class="btn submit">Finalizar cadastro</button>
            <br>
            <button type="button" class="btn" onclick="back()" style="padding: 1% 3%;"><i class="fa-solid fa-arrow-left"></i></button>
        </form>
    </div>
</div>

<!-- Import JS Functions -->
<script src="js/validate.js"></script>

<script>
    let pass = document.querySelector('#Epass');

    pass.addEventListener('click', function() {
        let input = document.querySelector('#pass')

        if (input.getAttribute('type') == 'password') {
            input.setAttribute('type', 'text')
            $('#icon').removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            input.setAttribute('type', 'password')
            $('#icon').removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

    let confirm = document.querySelector('#Cpass');

    confirm.addEventListener('click', function() {
        let input = document.querySelector('#confirmPass')

        if (input.getAttribute('type') == 'password') {
            input.setAttribute('type', 'text')
            $('.iconC').removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            input.setAttribute('type', 'password')
            $('.iconC').removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
</script>

</body>

</html>