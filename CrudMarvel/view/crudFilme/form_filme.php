<?php
require_once(__DIR__ . "/../../controller/FilmeController.php");
require_once(__DIR__ . "/../include/header.php");

?>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-12 col-md-8 col-lg-6">

            <div class="card shadow">

                <div class="card-body p-4">

                    <form action="" method="POST">

                        <h3 class="text-center mb-4">Formulário de Filmes</h3>

                        <div class="mb-3">
                            <label class="form-label" for="url">Capa do Filme: </label>
                            <input class="form-control" type="text" id="url" placeholder="Informe a URL..." name="urlFilme" value="<?= $filme != null ? $filme->getUrl() : "" ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="titulo">Título: </label>
                            <input class="form-control" type="text" id="titulo" placeholder="Informe o título..." name="tituloFilme" value="<?= $filme != null ? $filme->getTitulo() : "" ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="anoLancamento">Ano de lançamento: </label>
                            <input class="form-control" type="number" id="anoLancamento" placeholder="Ex: 2009" name="anoFilme" value="<?= $filme != null ? $filme->getAnoLancamento() : "" ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="duracao">Duração do filme (em minutos): </label>
                            <input class="form-control" type="number" id="duracao" placeholder="Ex: 120" name="duracaoFilme" value="<?= $filme != null ? $filme->getDuracao() : "" ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="nota">Nota do filme: </label>
                            <input class="form-control" type="step" id="nota" placeholder="Ex: 7.2" name="notaFilme" value="<?= $filme != null ? $filme->getNota() : "" ?>">
                        </div>

                        <div>
                            <input type="hidden" name="id" value="<?= $filme ? $filme->getId() : 0 ?>">
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-outline-success" type="submit">Enviar</button>
                        </div>

                    </form>

                    <div class="d-grid mt-3">
                        <a class="btn btn-outline-primary" href="listar_filme.php">Voltar</a>
                    </div>

                    <?php if ($msgErro): ?>
                        <div class="alert alert-danger mt-3 mb-0">
                            <?= $msgErro ?>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?php

require_once(__DIR__ . "/../include/footer.php");

?>
