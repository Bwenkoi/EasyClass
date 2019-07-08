<?php
require_once('../model/database.php');
require_once('../model/avaliacao_db.php');
require_once('../model/questoes_db.php');
require_once('../model/disciplina_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'listar_avaliacao';
    }
}

if ($action == 'abrir_adicionar_avaliacao') {
    $disciplinas = lista_disciplina();
    $questoes = listar_questao();
    include('cadastrar_avaliacao.php');
}

if ($action == 'adicionar_avaliacao') {
    $disciplina = filter_input(INPUT_POST, 'disciplina');
    $titulo = filter_input(INPUT_POST, 'titulo');
    $numero_questoes = contar_questoes();
    $questoes = array();
    for($i = 0; $i < $numero_questoes; $i++){
        if(!(filter_input(INPUT_POST, 'questao'.$i) == false)){
            array_push($questoes, filter_input(INPUT_POST, 'questao'.$i));
        }
    }

    if($disciplina == null || $titulo == null){
        $error = 'Os Campos devem ser Preenchidos!';
        include("../errors/error.php");
    }else{
        cadastra_avaliacao($disciplina, $titulo, $questoes);
        $avaliacoes = listar_avaliacao();
        include('listar_avaliacao.php');
    }

}

if ($action == 'listar_avaliacao') {
    $avaliacoes = listar_avaliacao();
    include('listar_avaliacao.php');
}

if ($action == 'alterar_avaliacao') {
    $id = filter_input(INPUT_POST, 'id_avaliacao');
    $disciplinas = lista_disciplina();
    $disciplina = filter_input(INPUT_POST, 'disciplina');
    $titulo = filter_input(INPUT_POST, 'titulo');
    $questoes = listar_questao();
    $aux = buscar_questoes_avaliacao($id);
    $questoes_avaliacao = array();

    foreach($aux as $a){
        array_push($questoes_avaliacao, $a['id_questao']);
    }

    $avaliacoes = lista_avaliacoes_feitas();
    $aval = true;
    foreach ($avaliacoes as $ava){
        $turma = get_turma_avaliacao_by_id($ava['id_turma_avaliacao']);
        if($turma['id_avaliacao'] == $id){
            $aval = false;
        }
    }
    if($aval == true){
        include('alterar_avaliacao.php');
    }else {
        $error = 'Já existem cadastros dessa avaliação feita!';
        include("../errors/error.php");
    }
}

if ($action == 'confirmar_alterar_avaliacao') {
    $id = filter_input(INPUT_POST, 'id');
    $disciplina = filter_input(INPUT_POST, 'disciplina');
    $titulo = filter_input(INPUT_POST, 'titulo');

    $numero_questoes = contar_questoes();
    $questoes = array();
    for($i = 0; $i < $numero_questoes; $i++){
        if(!(filter_input(INPUT_POST, 'questao'.$i) == false)){
            array_push($questoes, filter_input(INPUT_POST, 'questao'.$i));
        }
    }

    if($disciplina == null || $titulo == null){
        $error = 'Os Campos devem ser Preenchidos!';
        include("../errors/error.php");
    }else{
        alterar_avaliacao($id, $disciplina, $titulo, $questoes);
        $avaliacoes = listar_avaliacao();
        include('listar_avaliacao.php');
    }

}

if ($action == 'remover_avaliacao') {
    $id_avaliacao = filter_input(INPUT_POST, 'id');
    $avaliacoes = lista_avaliacoes_feitas();
    $aval = true;
    foreach ($avaliacoes as $ava){
        $turma = get_turma_avaliacao_by_id($ava['id_turma_avaliacao']);
        if($turma['id_avaliacao'] == $id_avaliacao){
            $aval = false;
        }
    }
    if($aval == true){
        remover_avaliacao($id_avaliacao);
        header("Refresh: 0");
    }else {
        $error = 'Já existem cadastros dessa avaliação feita!';
        include("../errors/error.php");
    }
}