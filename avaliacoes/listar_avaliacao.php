<?php include '../header.php'; ?>

<main>
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Lista de Avaliações:</h1>
    </div>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Disciplina</th>
                <th>Título</th>
                <th>Questões</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($avaliacoes as $avaliacao) : ?>
                <tr>
                    <td><?php echo $avaliacao['id']; ?></td>
                    <td><?php echo $avaliacao['disciplina']; ?></td>
                    <td><?php echo $avaliacao['titulo']; ?></td>
                    <td>
                        <?php
                            $questoes = buscar_questoes_avaliacao($avaliacao['id']);
                        ?>

                        <table>
                            <tbody>
                                <?php foreach ($questoes as $indice=>$questao) : ?>
                                    <tr>
                                        <td><?php echo $questao['id_questao']; ?></td>
                                        <td style="width: 100%"><?php echo buscar_enunciado_questao($questao['id_questao']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action"
                                   value="alterar_avaliacao">
                            <input type="hidden" name="id_avaliacao"
                                   value="<?php echo $avaliacao['id']; ?>">
                            <input type="hidden" name="disciplina"
                                   value="<?php echo $avaliacao['disciplina']; ?>">
                            <input type="hidden" name="titulo"
                                   value="<?php echo $avaliacao['titulo']; ?>">
                            <input type="submit" class="btn btn-secondary btn-sm" value="Alterar">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action"
                                   value="remover_avaliacao">
                            <input type="hidden" name="id"
                                   value="<?php echo $avaliacao['id']; ?>">
                            <input type="submit" class="btn btn-danger btn-sm" value="Remover">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php include '../footer.php'; ?>