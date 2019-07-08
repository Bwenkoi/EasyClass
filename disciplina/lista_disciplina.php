<?php include '../header.php'; ?>
<main>

    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Lista de Disciplinas</h1>
    </div>

    <form class="container-fluid" action="." method="post">
        <input type="hidden" name="action"  value="lista_id">
        <div class="form-group row">
            <label for="campoBuscaPorIdDisciplina" class="col-md-1 col-form-label">ID:</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" name="id" class="form-control mb-2" id="campoBuscaPorIdDisciplina">
            </div>
            <button type="submit" class="btn col-md-2 mb-2"
                    style="background-color: #218380; color: white">Buscar</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Carga Horária</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $disc) : ?>
                <tr>
                    <td><?php echo $disc['id']; ?></td>
                    <td><?php echo $disc['nome']; ?></td>
                    <td><?php echo $disc['cargaHoraria']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="altera_disc">
                            <input type="hidden" name="id"  value="<?php echo $disc['id']; ?>">
                            <input type="hidden" name="nome" value="<?php echo $disc['nome']; ?>">
                            <input type="hidden" name="cargaHoraria" value="<?php echo $disc['cargaHoraria']; ?>">
                            <input type="submit" class="btn btn-secondary btn-sm" value="Alterar">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="remove_disc">
                            <input type="hidden" name="id" value="<?php echo $disc['id']; ?>">
                            <input type="submit" class="btn btn-danger btn-sm" value="Remover">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include '../footer.php'; ?>