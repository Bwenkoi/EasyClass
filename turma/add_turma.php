<?php include '../header.php'; ?>
<main>

    <div class="tituloPaginaEntidade col-md-5 col-sm-6">
        <h1 class="h3">Insira os Dados da Turma:</h1>
    </div>

    <form class="container-fluid" action="index.php" method="post">
        <input type="hidden" name="action" value="add_confirm">

        <div class="form-group row">
            <label for="campoAnoPeriodoTurma" class="col-md-1 col-form-label">Ano/Periodo:</label>
            <div class="col-md-4 col-sm-6">
                <input type="text" class="form-control" id="campoAnoPeriodoTurma" name="ano-periodo">
            </div>
        </div>

        <div class="form-group row">
            <label for="campoProfessorTurma" class="col-md-1 col-form-label">Professor:</label>
            <div class="col-md-4 col-sm-6">
                <select class="form-control" id="campoProfessorTurma" name="nomeProf">
                    <?php foreach ($listaProfessores as $prof){ ?>
                    <option>
                        <?php echo $prof['nome'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="campoDisciplinaTurma" class="col-md-1 col-form-label">Disciplina:</label>
            <div class="col-md-4 col-sm-6">
                <select class="form-control" id="campoDisciplinaTurma" name="disc">
                    <?php foreach ($listaDisciplinas as $disc){ ?>
                        <option>
                            <?php echo $disc['id'] ?>
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