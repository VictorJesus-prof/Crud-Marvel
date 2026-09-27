<?php
require_once(__DIR__ . "/../../controller/FilmeController.php");
require_once(__DIR__ . "/../include/header.php");

$filmeCont = new FilmeController();
$filmes = $filmeCont->listar();

?>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="mb-0">Listagem de Filmes</h3>

        <div>
            <a class="btn btn-outline-danger me-2" href="../include/index.php">Menu</a>
            <a class="btn btn-outline-primary" href="inserir_filme.php">Inserir Filme</a>
        </div>

    </div>

    <div class="card shadow">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-striped align-middle text-center mb-0">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Capa</th>
                            <th>Título</th>
                            <th>Ano</th>
                            <th>Duração</th>
                            <th>Nota</th>
                            <th>Excluir</th>
                            <th>Alterar</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($filmes as $f) : ?>

                            <tr>

                                <td><?= $f->getId() ?></td>

                                <td>
                                    <img
                                        src="<?= $f->getUrl() ?>"
                                        alt=""
                                        height="100px"
                                        width="75px"
                                        class="rounded">
                                </td>

                                <td class="fw-semibold">
                                    <?= $f->getTitulo() ?>
                                </td>

                                <td><?= $f->getAnolancamento() ?></td>

                                <td>
                                    <?php
                                    $horas = intdiv($f->getDuracao(), 60);
                                    $minutos = $f->getDuracao() % 60;

                                    if ($horas != 0 && $minutos != 0) {
                                        echo $horas . "h" . $minutos . "m";
                                    } else if ($horas != 0 && $minutos == 0) {
                                        echo $horas . "h";
                                    } else if ($horas == 0 && $minutos != 0) {
                                        echo $minutos . "m";
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?= $f->getNota() ?>/10
                                </td>

                                <td>
                                    <a
                                        class="btn btn-outline-danger"
                                        href="excluir_filme.php?id_excluir=<?= $f->getId(); ?>"
                                        onclick="return confirm('Tem certeza que deseja excluir? ID: <?= $f->getId() ?>')">
                                        <img
                                            src="../../img/btn_excluir.png"
                                            alt="Excluir">
                                    </a>
                                </td>

                                <td>
                                    <a
                                        class="btn btn-outline-primary"
                                        href="alterar_filme.php?id_alterar=<?= $f->getId(); ?>">
                                        <img
                                            src="../../img/btn_editar.png"
                                            alt="Editar">
                                    </a>
                                </td>

                            </tr>

                        <?php endforeach ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php

require_once(__DIR__ . "/../include/footer.php");

?>
