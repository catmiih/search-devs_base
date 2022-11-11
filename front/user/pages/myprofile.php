<link rel="stylesheet" type="text/css" href="../css/level.css" />
<link rel="stylesheet" type="text/css" href="../css/perfil.css" />
<link rel="stylesheet" type="text/css" href="../css/edit-profile.css" />


<div class="perfil">
    <div id="feedperfil">
        <div id="profile_banner">
            <img class="banner" src="https://images.pexels.com/photos/60597/dahlia-red-blossom-bloom-60597.jpeg?cs=srgb&dl=pexels-pixabay-60597.jpg&fm=jpg" alt="">
            <div id="profile">
                <div class="profile_pic">
                    <img src="https://img.freepik.com/fotos-gratis/estilo-de-vida-beleza-e-moda-conceito-de-emocoes-de-pessoas-jovem-gerente-de-escritorio-feminino-asiatico-ceo-com-expressao-satisfeita-em-pe-sobre-um-fundo-branco-sorrindo-com-os-bracos-cruzados-sobre-o-peito_1258-59329.jpg" />
                </div>
                <div id="containerperfil">
                    <div id="align">
                        <h4>Fulano de Tal </h4>

                        <form action="" method="post">
                            <button href="#" class="btn" name="edit"><i class="fa-solid fa-gear"></i></button>
                        </form>
                    </div>
                    <p>Título do Perfil/cargo</p>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="skills">
        <div class="row evaluation justify-content-between">

            <h2 style="font-weight:700" class="col">Habilidades:</h2>

            <div class="level-options col">
                <p style="margin: 1%;">Nível:</p>
                <label>
                    <button class="btn-select btn-level level-1 selected show" id="level-1" type="button">1</button>
                </label>
                <label>
                    <button class="show btn-select btn-level level-2 selected" id="level-2" type="button">2</button>
                </label>

                <label>
                    <button class="show btn-select btn-level level-3 selected" id="level-3" type="button">3</button>
                </label>

                <label>
                    <button class="show btn-select btn-level level-4 selected" id="level-4" type="button">4</button>
                </label>
                <label>
                    <button class="show btn-select btn-level level-5 selected" id="level-5" type="button">5</button>
                </label>
            </div>
            <br>
            <div class="show-skills">

            </div>
        </div>
    </div>

    <hr>

    <div class="row feed">
        <div class="col info">
            <h2>Informações:</h2>

            <div class="row input">
                <p class="col label">Nome:</p>
                <input type="text" placeholder="Fulano de Tal Junior" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

            <div class="row input">
                <p class="col label"> Telefone:</p>
                <input type="text" placeholder="(11) 99999-9999" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>

            </div>
            <div class="row input">
                <p class="col label">Email:</p>
                <input type="text" placeholder="usuario@exemplo.com.br" class="col form-control" name="" id="" maxlength="25" minlength="5" disabled>
            </div>

        </div>
        <div class="col description">
            <h2>Descrição do perfil:</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since
                the 1500s, when an unknown printer took a galley of type and scrambled
                it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop</p>
        </div>
    </div>
</div>