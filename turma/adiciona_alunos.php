<?php include '../header.php'; ?>
<main>

    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Escolha o aluno:</h1>
    </div>

    <form class="container-fluid" action="index.php" method="post">
        <input type="hidden" name="action" value="aluno_confirm">
        <input type="hidden" name="id"  value="<?php echo $id ?>">
        <input type="hidden" name="id_disc" value="<?php echo $id_disc; ?>">
        <div class="form-group row">
            <label for="campoAlunoTurma" class="col-md-1 col-form-label">Aluno:</label>
            <div class="col-md-4 col-sm-6">
                <select class="form-control" id="campoAlunoTurma" name="aluno">
                    <?php foreach ($listaAlunos as $aluno){ ?>
                        <option>
                            <?php echo $aluno['nome'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="text-right col-md-5 col-sm-6">
            <button type="submit" class="btn col-md-4 col-sm-6"
                    style="background-color: #218380; color: white">Confirmar</button>
        </div>
    </form>
</main>
<?php include '../footer.php'; ?>