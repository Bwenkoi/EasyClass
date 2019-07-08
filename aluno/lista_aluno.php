<?php include '../header.php'; ?>
<main>
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Lista de Alunos</h1>
    </div>

    <form class="container-fluid" action="." method="post">
        <input type="hidden" name="action"  value="lista_nome">
        <div class="form-group row">
            <label for="campoBuscaPorNomeAluno" class="col-md-1 col-form-label">Nome:</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" name="nome" class="form-control mb-2" id="campoBuscaPorNomeAluno">
            </div>
            <button type="submit" class="btn col-md-2 mb-2"
                    style="background-color: #218380; color: white">Buscar</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Nome</th>
                <th>Login</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $aluno) : ?>
                <tr>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['login']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="altera_aluno">
                            <input type="hidden" name="nome" value="<?php echo $aluno['nome']; ?>">
                            <input type="hidden" name="login" value="<?php echo $aluno['login']; ?>">
                            <input type="hidden" name="senha" value="<?php echo $aluno['senha']; ?>">
                            <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
                            <input type="submit" class="btn btn-secondary btn-sm" value="Alterar">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="lista_matriculas">
                            <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
                            <input type="submit" class="btn btn-secondary btn-sm" value="Listar Matrículas">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="remove_aluno">
                            <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
                            <input type="submit" class="btn btn-danger btn-sm" value="Remover">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include '../footer.php'; ?>