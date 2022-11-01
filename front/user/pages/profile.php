<link rel="stylesheet" type="text/css" href="../css/perfil.css" />
<link rel="stylesheet" type="text/css" href="../css/level.css" />

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
                        <a href="#" class="btn"><i class="fa-solid fa-gear"></i></a>
                    </div>
                    <p>Título do Perfil/cargo</p>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="skills">
        <div class="row">
            <div class="evaluation">
                <h2 style="font-weight:700">Habilidades:</h2>
                <p style="margin: 1%;">Nível:</p>
                <label>
                    <input type="radio" name="lvl" id="1" value="1" checked />
                    <button class="btn-select btn-level level-1 selected" id="level-1" onclick="check(1)" type="button">1</button>
                </label>
                <label>
                    <input type="radio" name="lvl" id="2" value="2" />
                    <button class="btn-select btn-level level-2" id="level-2" onclick="check(2)" type="button">2</button>
                </label>

                <label>
                    <input type="radio" name="lvl" id="3" value="3" />
                    <button class="btn-select btn-level level-3" id="level-3" onclick="check(3)" type="button">3</button>
                </label>

                <label>
                    <input type="radio" name="lvl" id="4" value="4" />
                    <button class="btn-select btn-level level-4" id="level-4" onclick="check(4)" type="button">4</button>
                </label>
                <label>
                    <input type="radio" name="lvl" id="5" value="5" />
                    <button class="btn-select btn-level level-5" id="level-5" onclick="check(5)" type="button">5</button>
                </label>
            </div>
            <div class="show-skills"></div>
        </div>
    </div>

    <hr>

    <div></div>
</div>