<?php
session_start();
include 'conexao.php';

if (isset($_POST['Cadastraritem'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
   
    if (empty($nome) || empty($codigo) || empty($quantidade)) {
        echo "<script> 
            alert('Preencha todos os campos !!');
            window.location.href = '../cadastraritem.php';
            </script>";
        exit;
    }

   if(empty($ID)){
     // Verificar se o item já está cadastrado
     $declaracao = $conexao->prepare("SELECT nome FROM cadferramenta WHERE nome = ?");
     $declaracao->bind_param("s", $nome);
     $declaracao->execute();
     $declaracao->store_result();
     
     if ($declaracao->num_rows > 0) {
         echo "<script>
             alert('O item já está cadastrado');
             window.location.href = '../cadastraritem.php';
             </script>";
     } else {
         // Inserir novo item
         $declaracao = $conexao->prepare("INSERT INTO cadferramenta (nome, codigo, quantidade) VALUES (?, ?, ?)");
         $declaracao->bind_param("ssi", $nome, $codigo, $quantidade);
         
         if ($declaracao->execute()) {
             echo "<script>
                 alert('Cadastrado com sucesso');
                 window.location.href = '../cadastraritem.php';
                 </script>";
         } else {
             echo "Erro ao cadastrar item: " . $declaracao->error;
         }
     }
   }else{
    //atualizar
   }
}
?>
