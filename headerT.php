<!DOCTYPE html>
<html>
<!-- the head section -->

<head>
    <title>Gerenciamento de Turmas</title>
    <!--<div align="center"><img src="imagens/lv.png"/></div>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<!-- the body section -->

<body>
    <header>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

            header("Location: login.php");
        }
        ?>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="index.php" class="navbar-brand">
                EasyClass
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <!-- Professores -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Professores
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownFuncionarios">
                            <a class="dropdown-item" href="professor/index.php?action=abre_form">Cadastrar Professores</a>
                            <a class="dropdown-item" href="professor/index.php?action=lista_prof">Listar Professores</a>
                        </div>
                    </div>
                    <!-- Alunos -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Alunos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownFuncionarios">
                            <a class="dropdown-item" href="aluno/index.php?action=abre_form">Cadastrar Alunos</a>
                            <a class="dropdown-item" href="aluno/index.php?action=lista_aluno">Listar Alunos</a>
                        </div>
                    </div>
                    <!-- Disciplinas -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Disciplinas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownFuncionarios">
                            <a class="dropdown-item" href="disciplina/index.php?action=abre_form">Cadastrar Disciplinas</a>
                            <a class="dropdown-item" href="disciplina/index.php?action=lista_disc">Listar Disciplinas</a>
                        </div>
                    </div>
                    <!-- Turmas -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Turmas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownFuncionarios">
                            <a class="dropdown-item" href="turma/index.php?action=abre_form">Cadastrar Turmas</a>
                            <a class="dropdown-item" href="turma/index.php?action=lista_turma">Listar Turmas</a>
                        </div>
                    </div>
                    <!-- Avaliações -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownAvaliacoes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Avaliações
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownAvaliacoes">
                            <a class="dropdown-item" href="avaliacoes/index.php?action=abrir_adicionar_avaliacao">Cadastrar Avaliação</a>
                            <a class="dropdown-item" href="avaliacoes/index.php?action=listar_avaliacao">Listar Avaliações</a>
                        </div>
                    </div>
                    <!-- Questões -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownQuestoes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Questões
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownQuestoes">
                            <a class="dropdown-item" href="questoes/index.php?action=abrir_adicionar_questao">Cadastrar Questão</a>
                            <a class="dropdown-item" href="questoes/index.php?action=listar_questao">Listar Questões</a>
                        </div>
                    </div>
                    <!-- Login -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['login'].'&nbsp' ?> <i style="color: rgba(255,255,255,.5);" class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLogin">
                            <a class="dropdown-item" href="logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>