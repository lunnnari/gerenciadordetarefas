<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

if(empty($nome)){
    $_SESSION['msg']= "É necessário nomear a tarefa.";
    header("Location: edit_tarefas.php");
}

$criar_tarefa = "UPDATE tarefas SET task_name = '$nome', description = '$descricao', status = '$status' WHERE id=$id";
$tarefa_criada = mysqli_query($conn, $criar_tarefa);

if($tarefa_criada) {
    $_SESSION['msg'] = "<p style='color:green;'> Tarefa atualizada com sucesso.</p>";
    header("Location: tarefas.php");
} else {
    $_SESSION['msg'] = "<p style='color:red;'> Tarefa não atualizadas.</p>";
    header("Location: tarefas.php");
}