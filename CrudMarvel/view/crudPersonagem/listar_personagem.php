<?php
require_once(__DIR__ . "/../../controller/PersonagemController.php");
require_once(__DIR__ . "/../include/header.php");

$personagemCont = new PersonagemController();
$personagens = $personagemCont->listar();

?>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Listagem de Personagens</h3>

        <div>
            <a class="btn btn-outline-danger me-2" href="../include/index.php">Menu</a>
            <a class="btn btn-outline-primary" href="inserir_personagem.php">Inserir Personagem</a>
        </div>
    </div>

    <div class="card shadow">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-striped align-middle text-center mb-0">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Poder</th>
                            <th>Tipo</th>
                            <th>Filme</th>
                            <th>Excluir</th>
                            <th>Alterar</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($personagens as $p) : ?>

                            <tr>

                                <td><?= $p->getId(); ?></td>

                                <td>
                                    <img
                                        src="<?= $p->getUrl() ?>"
                                        alt=""
                                        height="100px"
                                        width="100px"
                                        class="rounded">
                                </td>

                                <td class="fw-semibold">
                                    <?= $p->getNome(); ?>
                                </td>

                                <td><?= $p->getPoder(); ?></td>

                                <td><?= $p->getTipo()->getNome(); ?></td>

                                <td><?= $p->getFilme()->getTitulo(); ?></td>

                                <td>
                                    <a
                                        class="btn btn-outline-danger"
                                        href="excluir_personagem.php?id_excluir=<?= $p->getId(); ?>"
                                        onclick="return confirm('Tem certeza que deseja excluir? ID: <?= $p->getId() ?>')">
                                        <img
                                            src="../../img/btn_excluir.png"
                                            alt="Excluir">
                                    </a>
                                </td>

                                <td>
                                    <a
                                        class="btn btn-outline-primary"
                                        href="alterar_personagem.php?id_alterar=<?= $p->getId(); ?>">
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
