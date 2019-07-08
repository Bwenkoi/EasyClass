<?php
require('../model/database.php');
require('../model/turma_db.php');
require('../model/professor_db.php');
require('../model/aluno_db.php');
require('../model/avaliacao_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'lista_turma';
    }
}  

if ($action == 'abre_form') {
    $listaProfessores = lista_professor();
    $listaDisciplinas = lista_disciplina();
    include('add_turma.php');
}

if ($action == 'add_confirm') {
    $ano_periodo = filter_input(INPUT_POST, 'ano-periodo');
    $nomeProf = filter_input(INPUT_POST, 'nomeProf');
    $id_disciplina = filter_input(INPUT_POST, 'disc');

    if($ano_periodo == null || $nomeProf == null || $id_disciplina == null){
        $error = 'Os Campos devem ser Preenchidos!';
        include("../errors/error.php");
    }else{
        $professor = lista_nome_professor($nomeProf);
        foreach ($professor as $prof){
            cadastra_turma($prof['id'], $id_disciplina, $ano_periodo);
        }
        header("location: ../turma/index.php?action=lista_turma");
    }
}

if($action == 'lista_turma'){
    $lista = lista_turmas();
    $professores = lista_professor();
    include('lista_turma.php');
}

if($action == 'lista_prof'){
    $nomeProf = filter_input(INPUT_POST, 'nomeProfessor');
    $professor = lista_nome_professor($nomeProf);
    foreach ($professor as $prof) {
        $lista = lista_turmas_prof($prof['id']);
    }
    $professores = lista_professor();
    include('lista_turma.php');
}

if($action == 'listar_alunos'){
    $id = filter_input(INPUT_POST, 'id_turma');
    $listaTurmas = lista_alunos_turma($id);

    if($listaTurmas == null){
        $error = 'Não há alunos cadastrados nessa turma!';
        include("../errors/error.php");
    }else {
        include('lista_alunos.php');
    }
}

if($action == 'adicionar_alunos'){
    $id = filter_input(INPUT_POST, 'id');
    $id_disc = filter_input(INPUT_POST, 'id_disc');
    $listaAlunos = lista_aluno();
    include('adiciona_alunos.php');
}

if($action == 'adicionar_avaliacoes'){
    $id_turma = filter_input(INPUT_POST, 'id_turma');
    $id_disciplina = filter_input(INPUT_POST, 'id_disciplina');
    $listaAvaliacoes = lista_avaliacoes_disciplina($id_disciplina);
    include('adiciona_avaliacoes.php');
}

if ($action == 'aluno_confirm'){
    $id_turma = filter_input(INPUT_POST, 'id');
    $id_disc = filter_input(INPUT_POST, 'id_disc');
    $nome_aluno = filter_input(INPUT_POST, 'aluno');
    $alunos = lista_nome_aluno($nome_aluno);

    $aval = true;
    foreach ($alunos as $aluno){
        $matriculas_aluno = lista_matriculas_aluno($aluno['id']);
    }

    foreach ($matriculas_aluno as $mat_al){
        $turmas = get_turma_by_id($mat_al['id_turma']);
        foreach ($turmas as $turma){
            $disciplinas = get_disciplina_by_id($turma['id_disciplina']);
            foreach ($disciplinas as $disc){
                $novaDisc = get_disciplina_by_id($id_disc);
                foreach ($novaDisc as $od){
                    if($disc['nome'] == $od['nome']){
                        $aval = false;
                    }
                }
            }

        }
    }

    if($aval == true){
        foreach ($alunos as $aluno){
            matricula($id_turma, $aluno['id']);
        }
        header("location: ../turma/index.php?action=lista_turma");
    }else{
        $error = 'Aluno já faz essa disciplina!';
        include("../errors/error.php");
    }
}

if ($action == 'avaliacao_confirm'){
    $id_turma = filter_input(INPUT_POST, 'id_turma');
    $id_disc = filter_input(INPUT_POST, 'id_disc');
    $id_avaliacao = filter_input(INPUT_POST, 'avaliacao');
    adicionar_avaliacao_turma($id_turma, $id_avaliacao);
    header("location: ../turma/index.php?action=lista_turma");
}

if($action == 'remover_turma'){
    $id = filter_input(INPUT_POST, 'id');
    remover_turma($id);
    header("location: ../turma/index.php?action=lista_turma");
}