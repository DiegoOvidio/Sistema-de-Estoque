<?php
session_start();
include 'conexao.php';
if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    $declaracao = "DELETE FROM salvarpedidos WHERE idpedidos = ?";
    $declaracao = $conexao->prepare($declaracao);
    $declaracao->bind_param("i", $id);
    $declaracao->execute();

    if ($declaracao->affected_rows > 0) {
        echo "<script>alert('Item deletado'); window.location.href = '../requisicao.php';</script>";
    } else {
        echo "<script>alert('Erro ao deletar item'); window.location.href = '../requisicao.php';</script>";
    }
}
if (isset($_POST['salvar'])) {

    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);

    $inserir = $conexao->prepare("INSERT INTO salvarpedidos (descricao, quantidade) VALUES (?, ?)");
    $inserir->bind_param("si", $descricao, $quantidade);
    $inserir->execute();

    if ($inserir->affected_rows > 0) {
        echo "<script>
            alert('Item salvo com sucesso!');
            window.location.href = '../requisicao.php';
            </script>";
    } else {
        echo "<script>
            alert('Erro ao salvar o item.');
            window.location.href = '../requisicao.php';
            </script>";
    }
}
if (isset($_POST['buscar'])) {

    $id = $_POST["id_pedido"]; 

    $declaracao = $conexao->prepare("SELECT descricao, quantidade FROM salvarpedidos WHERE idpedidos = ?");
    $declaracao->bind_param("i", $id); 
    $declaracao->execute();
    $declaracao->store_result();

    if ($declaracao->num_rows > 0) {
        $declaracao->bind_result($descricao, $quantidade);
        $declaracao->fetch();
        echo "<script>
        let descricao = '$descricao';
        let quantidade = '$quantidade';
        let id = '$id';
        if (confirm('Deseja deletar pedido: ' + descricao + '?')){

                window.location.href = 'processar_pedido.php?id='+ id
                }else{
                alert('Pedido Mantido')
                window.location.href = '../requisicao.php'
            }
        
              </script>";
    }else{
        echo "<script>
        
            alert('item não encontrado')
          </script>";
    }

    // Fechar a declaração e a conexão
    $declaracao->close();
    $conexao->close();
}

?>