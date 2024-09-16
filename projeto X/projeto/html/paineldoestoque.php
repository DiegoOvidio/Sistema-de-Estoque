<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estoque</title>
    <style>
  body {
            background-image: url('../Img/img_home.jpg');
            background-size: 100%;
            background-blend-mode: lighten;
            background-color: rgba(255, 255, 255, 0.5);
            min-height: auto;
            font-family: Arial, sans-serif;
            margin: 20px;
           
        }
    .container {
        width: 80%;
        margin-top: 50px;
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    .search-form {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .search-form input[type="text"] {
        width: 48%;
        padding: 10px;
        font-size: 16px;
    }
    .search-form button {
        padding: 10px 20px;
        font-size: 16px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 50px;
    }
    th, td {
        padding: 12px;
        border: 1px solid #ccc;
        text-align: left;
        background-color: white;

    }
    th {
        background-color: white;
    }
    .all-classes-button {
        display: flex;
        justify-content: flex-end;
    }
    .all-classes-button button {
        padding: 10px 20px;
        font-size: 16px;
    }
    </style>
</head>

<body>
    <header>
        <div class="form-text">
            <h1>Estoque</h1>

            
            <div class="container">
                
                <form class="search-form" method="POST" action="php/consultarestoque.php">
                    <input type="text" name="codigo" placeholder="Digite o Código do Item">
                    <input type="text" name="nome" placeholder="Digite o Nome do Item">
                    <button type="submit">Pesquisar</button>
                </form>
            
            <table id="classes-table">
                <thead>
                    <tr>
                        <th>Nome:</th>
                        <th>Código:</th>
                        <th>Quantidade:</th>
                        <th>Status:</th>
                    </tr>
                </thead>
             
                    <!-- Adicione mais linhas conforme necessário -->
                    <tbody>
                        <!-- os itens serão inseridas aqui -->
                        <?php
                            if(isset($_SESSION['results'])){
                                echo $_SESSION['results'];
                                unset ($_SESSION['results']);//limpa ou destroi a variavel 
                            }

                        ?>
                    </tbody>
                </table>
                <div class="all-classes-button">
                    <form method="POST" action="php/consultarestoque.php">
                        <button type="submit" name="all_classes">Consultar Estoque:</button>
                        <button type="button" class="home" onclick="window.location.href='home.php';">Voltar para Home</button>

                    </form>
                </div>
            </div>
    </header>        
        
</body>
</html>
        