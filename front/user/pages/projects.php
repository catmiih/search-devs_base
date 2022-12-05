<link rel="stylesheet" type="text/css" href="../css/projects.css" />


<div class="discover-propose">

    <center>

        <div class="row search">
            <h2 class="col-6">Meus Projetos</h2>
        </div>

        <div class="row justify-content-center">

            <hr>

            <?php

            global $pdo;
            $sql = $pdo->prepare("SELECT Proj_ID from project where Proj_dev = '" . $_SESSION['id_user'] . "'");
            $sql->execute();

            $idProj = $sql->fetch();

            require_once '../../back/class/company.php';

            $comp = new Company();
            $comp->conectar('search-devs_base', 'localhost', 'root', '');

            require_once '../../back/class/project.php';

            $proj = new Project();
            $proj->conectar('search-devs_base', 'localhost', 'root', '');

            foreach ($idProj as $id) {
                $project = $proj->readProj($id)[0];
                $time = 0;

                foreach ($project as $projects) {
                    $time++;

                    $proj_ID = $projects['Proj_ID'];
                    $proj_name = $projects['Proj_name'];
                    $proj_desc = $projects['Proj_desc'];
                    $proj_time = $projects['Proj_time'];
                    $proj_start = $projects['Proj_start'];
                    $proj_end = $projects['Proj_end'];
                    $proj_hourPay = $projects['Proj_hourPay'];
                    $proj_pay = $projects['Proj_ID'];
                    $proj_comp = $projects['Proj_comp'];

                    $projectCard = '<div class="propose-card">
                    <div id="profile" class="row">
                        <div class="profile_pic col-2">
                            <img src="../../assets/' . $comp->findImage('.$id.', "profile")[0] . '" />
                        </div>
                        <div id="containerperfil" class="col-2">
                            <div id="align">
                                <h4>' . $proj_name . ' <br> <b>' . $comp->getUser($id)[1] . '</b> </h4>
                            </div>
                            <p>' . $proj_desc . '</p>
                            <br>
                        </div>

                        <div class="description">
                            <p>' . $proj_desc . '</p>
                        </div>
    
                        <div class="btn-group col">
    
                            <form action="" method="post" style="width: 100%;">
                                <input type="hidden" name="details" value="' . $proj_ID . '" style="display: none;">
                                <input type="hidden" name="compid" value="' . $proj_comp . '" style="display: none;">
                                <button type="submit" name="6" class="btn-see">Detalhes</button>
                            </form>
                        </div>
                    </div>
                </div>';

                    echo $projectCard;
                }
            }

            if ($time == 0) {
                echo 'Nenhum projeto encontrado';
            }

            ?>

            <!-- Proposta ⬇️ -->

            <div class="propose-card">
                <div id="profile" class="row">

                    <div class="profile_pic col-2">
                        <img src="https://img.freepik.com/fotos-gratis/estilo-de-vida-beleza-e-moda-conceito-de-emocoes-de-pessoas-jovem-gerente-de-escritorio-feminino-asiatico-ceo-com-expressao-satisfeita-em-pe-sobre-um-fundo-branco-sorrindo-com-os-bracos-cruzados-sobre-o-peito_1258-59329.jpg" />
                    </div>
                    <div id="containerperfil" class="col-2">
                        <div id="align">
                            <h4>Projeto X <br> <b>Google Company</b> </h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <br>
                    </div>

                    <div class="description">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>

                    <div class="btn-group col">

                        <form action="" method="post" style="width: 100%;">
                            <input type="hidden" name="details" value="x" style="display: none;">
                            <button type="submit" name="6" class="btn-see">Detalhes</button>
                        </form>
                    </div>

                </div>

            </div>

    </center>
</div>