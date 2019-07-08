<?php include '../header.php'; ?>
<main>
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Insira os Novos Dados:</h1>
    </div>
    <form class="container-fluid" action="index.php" method="post">
        <input type="hidden" name="action" value="confirma_altera">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="hidden" name="senhaV" value="<?php echo $senha ?>">
        <div class="form-group row">
            <label for="campoNomeProfessor" class="col-md-1 col-form-label">Nome:</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" id="campoNomeProfessor" name="nome" value="<?php echo $nome ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="campoLoginProfessor" class="col-md-1 col-form-label">login:</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" id="campoLoginProfessor" name="login" value="<?php echo $login ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="campoLoginProfessor" class="col-md-1 col-form-label">Senha:</label>
            <div class="col-md-4 col-sm-6">
                <input type="password" class="form-control" id="campoSenhaProfessor" name="senhaN">
            </div>
        </div>
        <div class="text-right col-md-5 col-sm-6">
            <button type="submit" class="btn col-md-4 col-sm-6"
                    style="background-color: #218380; color: white">Confirma</button>
        </div>

    </form>
</main>
<?php include '../footer.php'; ?>
