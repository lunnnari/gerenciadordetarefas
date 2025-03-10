<?php
session_start();
include_once("conexao.php");

// Recebe o status do filtro
$status = filter_input(INPUT_GET, "status", FILTER_SANITIZE_STRING);

// Prepara a cláusula WHERE com base no filtro de status
$where_clause = '';
if (!empty($status)) {
    $where_clause = "WHERE status = '$status'";
}

$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

$qnt_result_pg = 100;
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

// Consulta para obter as tarefas filtradas com paginação
$result_tarefas = "SELECT * FROM tarefas $where_clause LIMIT $inicio, $qnt_result_pg";
$resultado_tarefas = mysqli_query($conn, $result_tarefas);

// Total de tarefas com o filtro
// ALTERADO: Consulta agora inclui o filtro de status
$result_t = "SELECT COUNT(id) AS num_result FROM tarefas $where_clause";
$resultado_t = mysqli_query($conn, $result_t);
$row_t = mysqli_fetch_assoc($resultado_t);
$quantidade_t = ceil($row_t['num_result'] / $qnt_result_pg);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <style>
        body {
            background-color: #f8ecd4;
            text-align: center;
        }

        header {
            background-color: #d4cfa5;
            display: flex;
            justify-content: center;
            padding: 5px;
            margin-bottom: 20px;
            border-radius: 20px;
        }
        img {
            width: 60px;
        }
        #botoes {
            display: flex;
            justify-content: right;
            text-align: center;
            color: black;

        }
        #logo {
            display: flex;
            width: 80%;
            justify-content: center;
            padding-left: 20px;
        }
        a {
            padding: 5px;
            text-decoration: none;
            color: black;
        }
        #form1{
            padding-top: 23px;
        }
        h4:hover{
            border-radius: 10px;
            box-shadow: 5px 5px 20px #f8ecd4;
        }
        select{
            border: 0;
            border-radius: 10px;
            text-decoration: none;
            background-color: #f8ecd4;
        }
        #bot1{
            border: 0;
            border-radius: 10px;
            background-color: #f8ecd4;
        }
        #bot1:hover{
            border-radius: 10px;
            box-shadow: 5px 5px 20px #f8ecd4;
            background-color: #aabe9b;
        }
        #conteudo{
            margin: auto;
            display: flex;
            flex-direction: column;
            text-align: center;
            background-color: #d4cfa5;
            width: 500px;
            border-radius: 20px;
            font-size: 17px;
            padding: 10px
        }
    </style>
</head>
<body>
<header>
        <div id="logo">
            <h2>Gerencimento de Tarefas</h2>
            <img src="tarefas2.png" alt="">
        </div>
        <div id="botoes">
            <tr>
                <th><a href="tarefas.php">
                        <h4>Tarefas</h4>
                    </a></th>
                <th><a href="index.php">
                        <h4>Criar</h4>
                    </a></th>
                <form action="filtro_tarefas.php" method="GET" id="form1">
                    <select name="status" required>
                        <option value="">Status</option>
                        <option value="Pendentes">Pendentes</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Concluidas">Concluidas</option>
                    </select>
                    <input type="submit" value="Filtrar" id="bot1">
                </form>
            </tr>
        </div>
    </header>
    <h3>Suas Tarefas <?php echo $status ? "$status" : ""; ?></h3>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <div id="conteudo">
    <?php
    while ($row_tarefa = mysqli_fetch_assoc($resultado_tarefas)) {
        echo "Tarefa: " . $row_tarefa['task_name'] . " - " . $row_tarefa['id'] . "<br>";
        echo "Descrição: " . $row_tarefa['description'] . "<br>";
        echo "Status: " . $row_tarefa['status'] . "<br>";
        echo "<a href='edit_tarefas.php?id=" . $row_tarefa['id'] . "'><button style='border: 0; border-radius: 10px; background-color: #f8ecd4;'>Editar</button></a><hr style='width: 80%;'>";
    } 
     ?>
    </div>
  
</body>
</html>


