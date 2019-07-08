<?php include '../header.php'; ?>
<main>
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Lista de Professores</h1>
    </div>

    <form class="container-fluid" action="." method="post">
        <input type="hidden" name="action"  value="lista_nome">
        <div class="form-group row">
            <label for="campoBuscaPorNomeProfessor" class="col-md-1 col-form-label">Nome:</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" name="nome" class="form-control mb-2" id="campoBuscaPorNomeProfessor">
            </div>
            <button type="submit" class="btn col-md-2 mb-2"
                    style="background-color: #218380; color: white">Buscar</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Login</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $prof) : ?>
                <tr>
                    <td><?php echo $prof['nome']; ?></td>
                    <td><?php echo $prof['login']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action"
                                   value="altera_prof">
                            <input type="hidden" name="nome"
                                   value="<?php echo $prof['nome']; ?>">
                            <input type="hidden" name="login"
                                   value="<?php echo $prof['login']; ?>">
                            <input type="hidden" name="senha"
                                   value="<?php echo $prof['senha']; ?>">
                            <input type="hidden" name="id"
                                   value="<?php echo $prof['id']; ?>">
                            <input type="submit" class="btn btn-secondary btn-sm" value="Alterar">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action"
                                   value="remove_prof">
                            <input type="hidden" name="id"
                                   value="<?php echo $prof['id']; ?>">
                            <input type="submit" class="btn btn-danger btn-sm" value="Remover">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include '../footer.php'; ?>