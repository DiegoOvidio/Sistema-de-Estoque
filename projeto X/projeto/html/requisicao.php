<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
       

    <title>Faça seu pedido!</title>
</head>
<body>

<div class="form-text">
            <h1>Controle de Estoque - Requisição de Item.</h1>
          
 
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
            
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 70px;
            font-size: 20px;
        }
        .form-group {            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
            margin-bottom: 15px;{
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"] {
            width: 100%;

        }
        .button-group {
            text-align: center;
        }
        .button-group button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .button-group .save {
            background-color: #28a745;
            color: #fff;
        }
        .button-group .cancel {
            background-color: #dc3545;
            color: #fff;
        }
        .button-group .home {
            background-color: #007bff;
            color: #fff;
        }
    
            .return-section {
                 margin-top: 30px;
                 padding: 20px;
                 background-color: #f1f1f1;
                 border-radius: 8px;
                 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
             }
             .return-section h2 {
                 margin-bottom: 20px;
                 text-align: center;
             }
             .return-section .form-group {
                 display: flex;
                 align-items: center;
                 margin-bottom: 15px;
             }
             .return-section .form-group label {
                 width: 200px;
             }
             .return-section .form-group input[type="text"] {
                 flex: 1;
                 margin-right: 10px;
             }
             .return-section .form-group input[type="button"] {
                 width: 120px;
                 background-color: #007bff;
                 color: #fff;
                 border: none;
             }
             .return-section .button-group {
                 text-align: center;
                 margin-top: 80px;
             }
             .return-section .button-group input[type="button"] {
                 width: auto;
                 background-color: #007bff;
                 color: #fff;
             }
             .return-section .button-group input[type="button"].name {
                 background-color: #28a745;
             }
             .return-section .button-group input[type="button"].quantity {
                 background-color: #ffc107;
             }
             .return-section .button-group input[type="button"].delete {
                 background-color: #dc3545;
             }
     
    </style>
</head>
<body>
    <div class="container">
        <h1>Fazer Pedido</h1>
        <form action="php/processar_pedido.php" method="post">
            <div class="form-group">
                <label for="pedido">Descrição do Pedido:</label>
                <input type="text" id="pedido" name="descricao" required>
            </div>
            <div class="form-group">
                <label for="quantidade">quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" min="1" value="1" required>
            </div>


            <div class="button-group">
                <button type="submit" class="save" name="salvar">Salvar Pedido</button>
                <button type="reset" class="cancel"name="cancelar">Cancelar</button>
                <button type="button" class="home" onclick="window.location.href='home.php';">Voltar para Home</button>
            </div>
        </form>
       
    <!-- Seção de Devolução -->
    <div class="return-section">
            <h2>Cancelamento de pedido</h2>
            <form action="php/processar_pedido.php" method="post">
                <div class="form-group">
                    <label for="id_pedido">ID do Pedido:</label>
                    <input type="number" id="id_pedido" name="id_pedido"  min="1" required>
                    <button value="Buscar" name="buscar">buscar</button>
                </div>
                
            </form>
        </div>
    

   

</body>

</html>
