<?php include '../header.php'; ?>
<main>

    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Lista de Turmas:</h1>
    </div>

    <form class="container-fluid" action="." method="post">
        <input type="hidden" name="action" value="lista_prof">
        <div class="form-group row">
            <label for="campoBuscaProfessorTurma" class="col-md-1 col-form-label">Professor:</label>
            <div class="col-md-4 col-sm-6">
                <select class="form-control" name="nomeProfessor" id="campoBuscaProfessorTurma">
                    <?php foreach ($professores as $professor) : ?>
                        <option value="<?php echo $professor['nome'] ?>">
                            <?php echo $professor['nome'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn col-md-2 mb-2" style="background-color: #218380; color: white">Buscar</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Professor</th>
                <th>Disciplina</th>
                <th>Periodo</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $turma) : ?>
                <tr>
                    <td><?php $prof = get_professor_by_id($turma['id_professor']);
                        echo $prof['nome']; ?></td>
                    <td><?php echo $turma['id_disciplina']; ?></td>
                    <td><?php echo $turma['ano_periodo']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="listar_alunos">
                            <input type="hidden" name="id_turma" value="<?php echo $turma['id']; ?>">
                            <input type="submit" class="btn btn-secondary btn-sm" value="Listar Alunos">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="adicionar_alunos">
                            <input type="hidden" name="id" value="<?php echo $turma['id']; ?>">
                            <input type="hidden" name="id_disc" value="<?php echo $turma['id_disciplina']; ?>">
                            <input type="submit" class="btn btn-secondary btn-sm" value="Adicionar Alunos">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="adicionar_avaliacoes">
                            <input type="hidden" name="id_turma" value="<?php echo $turma['id']; ?>">
                            <input type="hidden" name="id_disciplina" value="<?php echo $turma['id_disciplina']; ?>">
                            <input type="submit" class="btn btn-secondary btn-sm" value="Adicionar Avaliações">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="remover_turma">
                            <input type="hidden" name="id" value="<?php echo $turma['id']; ?>">
                            <input type="submit" class="btn btn-danger btn-sm" value="Remover">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include '../footer.php'; ?>