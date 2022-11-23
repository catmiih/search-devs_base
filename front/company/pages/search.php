<link rel="stylesheet" type="text/css" href="../css/search.css" />

<script type="text/javascript">
    function showDev() {
        $.ajax({
            method: "post",
            url: "../functions/search.php",
            data: $("#form").serialize(),
            success: function(data) {
                list = document.getElementById("result-list");
                if (data == 0) {
                    nothing = "<h5 style='text-align: center;'>Nenhum resultado</h5>";
                    list.innerHTML = nothing;
                } else {
                    list.innerHTML = (data);
                }
            }
        });
    }
</script>

<div class="discover-pro">
    <div class="row search align-self-center justify-content-between">
        <h2 class="col-4">Descobrir profissionais</h2>
        <div class="col-7 barra">
            <form class="d-flex" action="" id="form" onsubmit="showDev(); return false;" method="post">
                <input class="form-control me-2" name="search" type="text" placeholder="Procurar">
                <button class="btn btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <hr>
    </div>

    <div class="row show-result" id="result-list">
        <h5 style="text-align: center;">Nenhum resultado</h5>
    </div>
</div>