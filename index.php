<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerencimento de Tarefas</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f8ecd4;
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
        #tarefas1{
            margin: auto;
            display: flex;
            flex-direction: column;
            text-align: center;
            background-color: #d4cfa5;
            width: 500px;
            height: 400px;
            border-radius: 20px;
        }
        h3{
            font-size: 30px;
        }
        #nome1{
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
            margin-bottom: 20px;
        }
        #but2{
            border: 0;
            border-radius: 20px;
            height: 25px;
            background-color: #f8ecd4;
        }
        #but2:hover{
            background-color: #aabe9b;
            box-shadow: 5px 5px 20px #f8ecd4;
        }
        #mensg{
            text-align: center;
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
    <div id="mensg">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    </div>
    <div id="tarefas1">
        <h3>Criando novas tarefas</h3>
        <form action="processa.php" method="post">
            <input type="text" name="tarefa" placeholder="Digite o nome" id="nome1" required> <br>
            <input type="text" name="descricao" id="descricao" placeholder="Descreva a tarefa"> <br>
            <input type="submit" value="Salvar" id="but2">
        </form>
    </div>

</body>

</html>