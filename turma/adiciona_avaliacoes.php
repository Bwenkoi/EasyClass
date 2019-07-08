<?php include '../header.php'; ?>
<main>

    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Escolha a avaliação:</h1>
    </div>

    <form class="container-fluid" action="index.php" method="post">
        <input type="hidden" name="action" value="avaliacao_confirm">
        <input type="hidden" name="id_turma" value="<?php echo $id_turma ?>">
        <input type="hidden" name="id_disc" value="<?php echo $id_disc; ?>">
        <div class="form-group row">
            <?php if (!empty($listaAvaliacoes)) : ?>
                <label for="campoAvaliacao" class="col-md-1 col-form-label">Avaliação:</label>
                <div class="col-md-4 col-sm-6">
                    <select class="form-control" id="campoAvaliacao" name="avaliacao">
                        <?php foreach ($listaAvaliacoes as $avaliacao) : ?>
                            <option value="<?php echo $avaliacao['id'] ?>">
                                <?php echo $avaliacao['disciplina'] . ' - ' . $avaliacao['titulo'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="text-right col-md-5 col-sm-6">
                    <button type="submit" class="btn col-md-4 col-sm-6" style="background-color: #218380; color: white">Confirmar</button>
                </div>
            <?php else : ?>
                <p class="offset-sm-1">Sem avaliações cadastradas para essa disciplina</p>
                <div class="text-right col-md-5 col-sm-6">
                    <a class="btn col-md-4 col-sm-6" href="../turma/index.php?action=lista_turma"
                    style="background-color: #218380; color: white">Voltar</a>
                </div>
            <?php endif; ?>
        </div>

    </form>
</main>
<?php include '../footer.php'; ?>