<?php
require('../model/database.php');
require('../model/disciplina_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'lista_disc';
    }
}

if ($action == 'abre_form') {
    include('add_disciplina.php');
}

if ($action == 'add_confirm') {
    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $cargaHoraria = filter_input(INPUT_POST, 'cargaHoraria');

    if($nome == null || $id == null || $cargaHoraria == null){
        $error = 'Os Campos devem ser Preenchidos!';
        include("../errors/error.php");
    }else{
        cadastra_disciplina($id, $nome, $cargaHoraria);
        header("location: ../disciplina/index.php?action=lista_disc");
    }
}

if($action == 'lista_disc'){
    $lista = lista_disciplina();
    include('lista_disciplina.php');
}

if($action == 'lista_id'){
    $id = filter_input(INPUT_POST, 'id');
    $lista = lista_id_disciplina($id);
    include('lista_disciplina.php');
}

if ($action == 'altera_disc') {
    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $cargaHoraria = filter_input(INPUT_POST, 'cargaHoraria');
    include('altera_disciplina.php');
}

if($action == 'confirma_altera'){
    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $cargaHoraria = filter_input(INPUT_POST, 'cargaHoraria');
    
    if($nome == null || $cargaHoraria == null){
        $error = 'Os Campos devem ser Preenchidos!';
        include("../errors/error.php");
    }else{
        altera_disciplina($id, $nome, $cargaHoraria);
        header("location: ../disciplina/index.php?action=lista_disc");
    }
}

if($action == 'remove_disc'){
    $id = filter_input(INPUT_POST, 'id');
    remover_disciplina($id);
    header("location: ../disciplina/index.php?action=lista_disc");
}