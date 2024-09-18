<?php
session_start();
include_once("conexao.php");

$nome_tarefa = filter_input(INPUT_POST, 'tarefa', FILTER_SANITIZE_STRING);
$desc_tarefa = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

if(empty($nome_tarefa)){
    $_SESSION['msg']= "É necessário nomear a Tarefa.";
    header("Location: index.php");
    exit;
}

$criar_tarefa = "INSERT INTO tarefas (task_name, description, created_at) VALUES ('$nome_tarefa','$desc_tarefa', NOW())";
$tarefa_criada = mysqli_query($conn, $criar_tarefa);

if(mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "<p style='color:green;'>Tarefa criada com sucesso.</p>";
    header("Location: index.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'>A Tarefa não foi criada.</p>";
    header("Location: index.php");
}