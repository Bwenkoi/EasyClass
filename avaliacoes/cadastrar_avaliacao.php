<?php include '../header.php'; ?>
<main>
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Insira os Dados da Avaliação:</h1>
    </div>
    <form class="container-fluid" action="index.php" method="post">
        <input type="hidden" name="action" value="adicionar_avaliacao">

        <div class="form-group row">
            <label for="campoDisciplina" class="col-md-2 col-form-label">Disciplina</label>
            <div class="col-md-4 col-sm-6">
                <select class="form-control" id="campoDisciplina" name="disciplina">
                    <?php foreach ($disciplinas as $disciplina) : ?>
                        <option>
                            <?php echo $disciplina['id']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="campoTitulo" class="col-md-2 col-form-label">Título</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" id="campoTitulo" name="titulo">
            </div>
        </div>

        <?php foreach ($questoes as $indice=>$questao) : ?>
            <div class="form-group row">
                <label for="campoQuestao<?php echo $indice; ?>" class="col-md-2 col-form-label">Questão <?php echo $indice; ?></label>
                <div class="col-md-5 col-sm-6">
                    <textarea style="resize: none;" readonly rows="4" class="form-control" id="campoQuestao<?php echo $indice; ?>"><?php echo $questao['enunciado']; ?></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="<?php echo $questao['id']; ?>" id="check<?php echo $indice; ?>" name="questao<?php echo $indice; ?>">
                    <label class="form-check-label" for="check<?php echo $indice; ?>">
                        Adicionar?
                    </label>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="text-right col-md-7 col-sm-6">
            <button type="submit" class="btn btn-dark col-md-4 col-sm-6">Confirmar</button>
        </div>
        <br>
    </form>
</main>
<?php include '../footer.php'; ?>