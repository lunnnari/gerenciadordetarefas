<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_tarefas = "DELETE FROM tarefas WHERE id = $id";
    $resultado_tarefas = mysqli_query($conn, $result_tarefas);
    if (mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:red;'>Tarefa apagada com sucesso!</p> <br>";
        header("Location: tarefas.php");
    } else {
        $_SESSION['msg'] = "Tarefa não foi apagada. <br>";
        header("Location: tarefas.php");
    } 
}else {
    $_SESSION['msg'] = "É necessário escolher uma Tarefa. <br>";
        header("Location: tarefas.php");
}