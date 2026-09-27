<?php
require_once(__DIR__ . "/../include/header.php");
?>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row g-4 w-100" style="max-width: 900px;">

        <div class="col-12 col-md-6">
            <a href="../crudPersonagem/listar_personagem.php"
                class="btn btn-primary btn-lg w-100 h-100 rounded-4 d-flex flex-column justify-content-center align-items-center gap-3"
                style="aspect-ratio: 1 / 1;">

                <span class="fs-1">🦸</span>
                <span class="fs-2 fw-bold">Personagens</span>

            </a>
        </div>

        <div class="col-12 col-md-6">
            <a href="../crudFilme/listar_filme.php"
                class="btn btn-danger btn-lg w-100 h-100 rounded-4 d-flex flex-column justify-content-center align-items-center gap-3"
                style="aspect-ratio: 1 / 1;">

                <span class="fs-1">🎬</span>
                <span class="fs-2 fw-bold">Filmes</span>

            </a>
        </div>

    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
