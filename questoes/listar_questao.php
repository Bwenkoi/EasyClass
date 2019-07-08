<?php include '../header.php'; ?>

<main>
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Lista de Questões:</h1>
    </div>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th style="width: 50%">Enunciado</th>
                <th>Alternativas</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questoes as $questao) : ?>
                <tr>
                    <td><?php echo $questao['id']; ?></td>
                    <td><?php echo $questao['enunciado']; ?></td>
                    <td>
                        <?php
                            $alternativas = buscar_alternativas_questao($questao['id']);
                            $correta;
                        ?>

                        <table>
                            <tbody>
                                <?php foreach ($alternativas as $indice=>$alternativa) : ?>
                                    <tr>
                                        <td><img src="<?php
                                        if ($alternativa['correta'] == 0) {
                                            echo '../imagens/errado.png';
                                        } else {
                                            echo '../imagens/certo.png';
                                            $correta = $indice;
                                        } ?>" alt=""></td>
                                        <td style="width: 100%"><?php echo $alternativa['texto']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action"
                                   value="alterar_questao">
                            <input type="hidden" name="id_questao"
                                   value="<?php echo $questao['id']; ?>">
                            <input type="hidden" name="enunciado"
                                   value="<?php echo $questao['enunciado']; ?>">
                            <input type="hidden" name="alternativa1"
                                   value="<?php echo $alternativas[0]['texto']; ?>">
                            <input type="hidden" name="alternativa2"
                                   value="<?php echo $alternativas[1]['texto']; ?>">
                            <input type="hidden" name="alternativa3"
                                   value="<?php echo $alternativas[2]['texto']; ?>">
                            <input type="hidden" name="alternativa4"
                                   value="<?php echo $alternativas[3]['texto']; ?>">
                            <input type="hidden" name="correta"
                                   value="<?php echo $correta; ?>">
                            <input type="submit" class="btn btn-secondary btn-sm" value="Alterar">
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action"
                                   value="remover_questao">
                            <input type="hidden" name="id"
                                   value="<?php echo $questao['id']; ?>">
                            <input type="submit" class="btn btn-danger btn-sm" value="Remover">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include '../footer.php'; ?>