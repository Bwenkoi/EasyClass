<?php
require('../model/database.php');
require('../model/professor_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'lista_prof';
    }
}

if ($action == 'abre_form') {
    include('add_professor.php');
}

if ($action == 'add_confirm') {
    $nome = filter_input(INPUT_POST, 'nome');
    $login = filter_input(INPUT_POST, 'login');
    $senha = filter_input(INPUT_POST, 'senha');
    if($nome == null || $login == null || $senha == null){
        $error = 'Os Campos devem ser Preenchidos!';
        include("../errors/error.php");
    }else{
        cadastra_professor($nome, $login, $senha);
        header("location: ../professor/index.php?action=lista_prof");
    }
}

if($action == 'lista_prof'){
    $lista = lista_professor();
    include('lista_professores.php');
}

if($action == 'lista_nome'){
    $nome = filter_input(INPUT_POST, 'nome');
    $lista = lista_nome_professor($nome);
    include('lista_professores.php');
}

if ($action == 'altera_prof') {
    $nome = filter_input(INPUT_POST, 'nome');
    $login = filter_input(INPUT_POST, 'login');
    $senha = filter_input(INPUT_POST, 'senha');
    $id = filter_input(INPUT_POST, 'id');
    include('altera_professor.php');
}

if($action == 'confirma_altera'){
    $nome = filter_input(INPUT_POST, 'nome');
    $login = filter_input(INPUT_POST, 'login');
    $senhaV = filter_input(INPUT_POST, 'senhaV');
    $senhaN = filter_input(INPUT_POST, 'senhaN');
    $id = filter_input(INPUT_POST, 'id');

    if($nome == null || $login == null || $senhaN == null){
        $error = 'Os Campos devem ser Preenchidos!';
        include("../errors/error.php");
    }else if($senhaV != $senhaN){
        $error = 'Senha Incorreta!';
        include("../errors/error.php");
    }else{
        altera_professor($id, $nome, $login);
        header("location: ../professor/index.php?action=lista_prof");
    }
}

if($action == 'remove_prof'){
    $id = filter_input(INPUT_POST, 'id');
    remover_professor($id);
    header("Refresh: 0");
}