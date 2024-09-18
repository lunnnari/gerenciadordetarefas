<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_GET, 'task_name', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING);
$result_tarefas = "SELECT * FROM tarefas WHERE id = '$id'";
$resultado_tarefas = mysqli_query($conn, $result_tarefas);
$row_tarefas = mysqli_fetch_assoc($resultado_tarefas);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
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
            background-color:#aabe9b;
            border-radius: 10px;
            box-shadow: 5px 5px 20px #f8ecd4;
        }
        
        #tarefa{
            padding-top: 20px;
            margin: auto;
            text-align: center;
            background-color: #d4cfa5;
            width: 500px;
            height: 400px;
            border-radius: 20px;

        }
        #nome{
            text-align: center;
            height: 30px;
            width: 400px;
            border-radius: 20px;
            border: 0;
            background-color: #f8ecd4;
            margin-bottom: 20px;
        }
        #descricao{
            text-align: center;
            height: 180px;
            width: 400px;
            border-radius: 20px;
            border: 0;
            background-color: #f8ecd4;
            margin-bottom: 15px;
        }
        #select2{
            width: 300px;
        }
        #but2{
            margin-top: 10px;
            width: 50px;
            border: 0;
            border-radius: 20px;
            height: 25px;
            background-color: #f8ecd4;
        }
        #but2:hover{
            background-color: #aabe9b;
            box-shadow: 5px 5px 20px #f8ecd4;
        }
        p{
            font-size: 17px;
            margin-top: 20px;
        }
        #but3{
            margin-top: 10px;
            width: 100px;
            border: 1px solid;
            border-radius: 20px;
            height: 25px;
            background-color: #d4cfa5;
        }
        #but3:hover{
            background-color: red;
            box-shadow: 5px 5px 20px #f8ecd4;
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

    
    
    <?php 
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }    
    ?>

    <form action="proc_edit_tarefas.php" method="post" id="tarefa">
        <p>Editando a tarefa: <b><?php echo $row_tarefas['task_name'];?></b> </p>
        <input type="hidden" name="id" id="id1" value="<?php echo $row_tarefas['id'];?>">
        <input type="text" name="nome" id="nome" required value="<?php echo $row_tarefas['task_name'];?>" > <br>
        <input type="text" name="descricao" id="descricao" value="<?php echo $row_tarefas['description'];?>"> <br>
        <select type="text" name="status" id="select2" value="<?php echo $row_tarefas['status'];?>">
        <option>Pendentes</option>
        <option>Em andamento</option>
        <option>Concluidas</option>
        </select> <br>
        <input type="submit" value="Editar" id="but2">
    </form>
    <form action="apagar_tarefas.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row_tarefas['id']; ?>"> 
        <input type="submit" value="Apagar" id="but3">
    </form>
    
</body>
</html>