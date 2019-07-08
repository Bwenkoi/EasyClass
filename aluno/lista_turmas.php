<?php include '../header.php'; ?>
    <main>
        <div class="tituloPaginaEntidade col-md-5 col-sm-6">
            <h1 class="h3">Lista de Turmas Matriculadas</h1>
        </div>

        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Disciplina</th>
                <th>Ano/Periodo</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($listaMatriculas as $mat) : ?>
                <tr>
                    <td><?php $turma = get_turma_by_id($mat['id_turma']); echo $turma['id_disciplina']; ?></td>
                    <td><?php echo $turma['ano_periodo']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>
<?php include '../footer.php'; ?>