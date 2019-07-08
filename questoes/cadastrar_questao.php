<?php include '../header.php'; ?>
<main>
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Insira os Dados da Questão:</h1>
    </div>
    <form class="container-fluid" action="index.php" method="post">
        <input type="hidden" name="action" value="adicionar_questao">

        <div class="form-group row">
            <label for="campoEnunciado" class="col-md-2 col-form-label">Enunciado</label>
            <div class="col-md-4 col-sm-6">
                <textarea class="form-control" id="campoEnunciado" name="enunciado" rows="6"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="campoAlternativa1" class="col-md-2 col-form-label">Alternativa 1</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" id="campoAlternativa1" name="alternativa1">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" id="radio1" name="correta">
                <label class="form-check-label" for="radio1">
                    Alternativa correta?
                </label>
            </div>
        </div>

        <div class="form-group row">
            <label for="campoAlternativa2" class="col-md-2 col-form-label">Alternativa 2</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" id="campoAlternativa2" name="alternativa2">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="1" id="radio2" name="correta">
                <label class="form-check-label" for="radio2">
                    Alternativa correta?
                </label>
            </div>
        </div>

        <div class="form-group row">
            <label for="campoAlternativa3" class="col-md-2 col-form-label">Alternativa 3</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" id="campoAlternativa3" name="alternativa3">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="2" id="radio3" name="correta">
                <label class="form-check-label" for="radio3">
                    Alternativa correta?
                </label>
            </div>
        </div>

        <div class="form-group row">
            <label for="campoAlternativa4" class="col-md-2 col-form-label">Alternativa 4</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" id="campoAlternativa4" name="alternativa4">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="3" id="radio4" name="correta">
                <label class="form-check-label" for="radio4">
                    Alternativa correta?
                </label>
            </div>
        </div>

        <div class="text-right col-md-6 col-sm-6">
            <button type="submit" class="btn btn-dark col-md-4 col-sm-6">Confirmar</button>
        </div>
        <br>
    </form>
</main>
<?php include '../footer.php'; ?>