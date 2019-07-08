<?php
require('../model/database.php');
require('../model/questoes_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'listar_questao';
    }
}

if ($action == 'abrir_adicionar_questao') {
    header('Location: cadastrar_questao.php');
}

if ($action == 'adicionar_questao') {
    $enunciado = filter_input(INPUT_POST, 'enunciado');
    $alternativas = array(
        filter_input(INPUT_POST, 'alternativa1'),
        filter_input(INPUT_POST, 'alternativa2'),
        filter_input(INPUT_POST, 'alternativa3'),
        filter_input(INPUT_POST, 'alternativa4'));
    $correta = filter_input(INPUT_POST, 'correta');

    if($enunciado == null || $alternativas[0] == null || $alternativas[1] == null || 
            $alternativas[2] == null || $alternativas[3] == null || $correta == null){
        $error = 'Os Campos devem ser Preenchidos!';
        include("../errors/error.php");
    }else{
        cadastra_questao($enunciado, $alternativas, $correta);
        $questoes = listar_questao();
        include('listar_questao.php');
    }

}

if ($action == 'listar_questao') {
    $questoes = listar_questao();
    include('listar_questao.php');
}

if ($action == 'alterar_questao') {
    $id_questao = filter_input(INPUT_POST, 'id_questao');
    $enunciado = filter_input(INPUT_POST, 'enunciado');
    $alternativas = array(
        filter_input(INPUT_POST, 'alternativa1'),
        filter_input(INPUT_POST, 'alternativa2'),
        filter_input(INPUT_POST, 'alternativa3'),
        filter_input(INPUT_POST, 'alternativa4'));
    $correta = filter_input(INPUT_POST, 'correta');

    $aval = true;
    $questoesUsadas = listar_questoes_utilizadas();
    foreach ($questoesUsadas as $qUt){
        if($qUt['id_questao'] == $id_questao){
            $aval = false;
        }
    }

    if($aval == true){
        include('alterar_questao.php');
    }else {
        $error = 'Essa questão está cadastrada em uma avaliação!';
        include("../errors/error.php");
    }
}

if ($action == 'confirmar_alterar_questao') {
    $id_questao = filter_input(INPUT_POST, 'id_questao');
    $enunciado = filter_input(INPUT_POST, 'enunciado');
    $alternativas = array(
        filter_input(INPUT_POST, 'alternativa1'),
        filter_input(INPUT_POST, 'alternativa2'),
        filter_input(INPUT_POST, 'alternativa3'),
        filter_input(INPUT_POST, 'alternativa4'));
    $correta = filter_input(INPUT_POST, 'correta');
    alterar_questao($id_questao, $enunciado, $alternativas, $correta);
    $questoes = listar_questao();
    include('listar_questao.php');
}

if ($action == 'remover_questao') {
    $id = filter_input(INPUT_POST, 'id');

    $aval = true;
    $questoesUsadas = listar_questoes_utilizadas();
    foreach ($questoesUsadas as $qUt){
        if($qUt['id_questao'] == $id){
            $aval = false;
        }
    }
    if($aval == true){
        remover_questao($id);
        header("Refresh: 0");
    }else{
        $error = 'Essa questão está cadastrada em uma avaliação!';
        include("../errors/error.php");
    }
}

// $("#mydiv").load(location.href + " #mydiv");