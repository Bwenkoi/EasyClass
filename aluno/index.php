<?php
require('../model/database.php');
require('../model/aluno_db.php');
require('../model/turma_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'lista_aluno';
    }
}

if ($action == 'abre_form') {
    include('add_aluno.php');
}

if ($action == 'add_confirm') {
    $nome = filter_input(INPUT_POST, 'nome');
    $login = filter_input(INPUT_POST, 'login');
    $senha = filter_input(INPUT_POST, 'senha');
    
    if($nome == null || $login == null ||  $senha == null){
        $error = 'Os Campos devem ser Preenchidos!';
        include("../errors/error.php");
    }else{
        cadastra_aluno($nome, $login, $senha);
        header("location: ../aluno/index.php?action=lista_aluno");
    }
}

if($action == 'lista_aluno'){
    $lista = lista_aluno();
    include('lista_aluno.php');
}

if($action == 'lista_nome'){
    $nome = filter_input(INPUT_POST, 'nome');
    $lista = lista_nome($nome);
    include('lista_aluno.php');
}

if($action == 'lista_matriculas'){
    $id_aluno = filter_input(INPUT_POST, 'id');
    $listaMatriculas = lista_matriculas_aluno($id_aluno);
    if($listaMatriculas == null){
        $error = 'O Aluno Não Está Matriculado em Nenhuma Turma!';
        include("../errors/error.php");
    }
    else {
        include('lista_turmas.php');
    }
}

if ($action == 'altera_aluno') {
    $nome = filter_input(INPUT_POST, 'nome');
    $login = filter_input(INPUT_POST, 'login');
    $senha = filter_input(INPUT_POST, 'senha');
    $id = filter_input(INPUT_POST, 'id');
    include('altera_aluno.php');
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
    }else if($senhaN != $senhaV){
        $error = 'Senha incorreta!';
        include("../errors/error.php");
    }else{
        altera_aluno($nome, $login, $id);
        header("location: ../aluno/index.php?action=lista_aluno");
    }
}

if($action == 'remove_aluno'){
    $id = filter_input(INPUT_POST, 'id');
    remover_aluno($id);
    header("location: ../aluno/index.php?action=lista_aluno");
}