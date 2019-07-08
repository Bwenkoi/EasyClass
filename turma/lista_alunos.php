<?php include '../header.php'; ?>
<main>
    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Lista de Alunos Matriculados</h1>
    </div>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Nome</th>
                <th>Login</th>
                <th>Avaliações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaTurmas as $turma) : ?>
                <tr>
                    <td><?php $aluno = get_aluno_by_id($turma['id_aluno']);
                        echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['login']; ?></td>
                    <?php
                    $id_aluno_turma = get_id_aluno_turma($turma['id_aluno'], $turma['id_turma']);
                    $avaliacoes_feitas = historico_aluno_turma($id_aluno_turma);
                    ?>
                    <td>
                        <?php $media = 0;
                        $qtd_avaliacoes = 0; ?>
                        <?php if (!empty($avaliacoes_feitas)) : ?>
                            <?php foreach ($avaliacoes_feitas as $av) : ?>
                                <?php
                                $avaliacao = get_avaliacao_by_id(get_avaliacao_by_turma_avaliacao(get_turma_avaliacao_by_aluno_avaliacao($av['id'])));
                                $media += $av['nota'];
                                $qtd_avaliacoes++;
                                ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Avaliação</th>
                                            <th>Nota</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $avaliacao['titulo'] ?></td>
                                            <td><?php echo $av['nota'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php endforeach; ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nota Final</th>
                                        <th>Situação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $nota_final = $media / $qtd_avaliacoes ?></td>
                                        <td><?php echo $nota_final >= 6 ? 'APR' : 'REP' ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <?php else : ?>
                                <?php echo 'Ainda fez nenhuma avaliação' ?>
                            <?php endif; ?>

                        </td>
                    </tr>      
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php include '../footer.php'; ?>