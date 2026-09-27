<?php

require_once(__DIR__ . "/../../controller/TipoController.php");
require_once(__DIR__ . "/../../controller/FilmeController.php");
require_once(__DIR__ . "/../../controller/PersonagemController.php");
require_once(__DIR__ . "/../include/header.php");

$tipoCont = new TipoController();
$tipos = $tipoCont->listar();

$filmeCont = new FilmeController();
$filmes = $filmeCont->listar();

$personagemCont = new PersonagemController();
$personagens = $personagemCont->listar();

?>


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-12 col-md-8 col-lg-6">

            <div class="card shadow">

                <div class="card-body p-4">

                    <form action="" method="POST">

                        <h3 class="text-center mb-4">Formulário de Personagens</h3>

                        <div class="mb-3">
                            <label class="form-label" for="url">Imagem: </label>
                            <input class="form-control" type="text" id="url" placeholder="Informe a URL..." name="urlPersonagem" value="<?= $personagem != null ? $personagem->getUrl() : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="nome">Nome: </label>
                            <input class="form-control" type="text" id="nome" placeholder="Informe o nome..." name="nomePersonagem" value="<?= $personagem != null ? $personagem->getNome() : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="poder">Poder: </label>
                            <input class="form-control" type="text" id="poder" placeholder="Informe o poder..." name="poderPersonagem" value="<?= $personagem != null ? $personagem->getPoder() : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="selTipo">Tipo: </label>
                            <select class="form-select" id="selTipo" name="tipoPersonagem">
                                <option value="">=== Selecione ===</option>
                                <?php foreach ($tipos as $t) : ?>
                                    <option value="<?= $t->getId() ?>"
                                        <?php if ($personagem && $personagem->getTipo()->getId() == $t->getId()) {
                                            print 'selected';
                                        }
                                        ?>><?= $t->getNome() ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="selFilme">Filme: </label>
                            <select class="form-select" id="selFilme" name="filmePersonagem">
                                <option value="">=== Selecione ===</option>
                                <?php foreach ($filmes as $f) : ?>
                                    <option value="<?= $f->getId() ?>"
                                        <?php if ($personagem && $personagem->getFilme()->getId() == $f->getId()) {
                                            print 'selected';
                                        }
                                        ?>><?= $f->getTitulo() ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div>
                            <input type="hidden" name="id" value="<?= $personagem ? $personagem->getId() : 0 ?>">
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-outline-success" type="submit">Enviar</button>
                        </div>

                    </form>

                    <div class="d-grid mt-3">
                        <a class="btn btn-outline-primary" href="listar_personagem.php">Voltar</a>
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
