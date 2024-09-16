<?php
session_start();
include 'conexao.php';

if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];
    $declaracao = "DELETE FROM `cadferramenta`WHERE iditem =?";
    $declaracao = $conexao->prepare($declaracao);
    $declaracao->bind_param("i",$id);
    if($declaracao->execute()){
        $_SESSION['msg'] = "Item Deletado com sucesso";
    }else{
        $_SESSION['msg'] = "Falha ao Deletar item";

    }
   
    $declaracao->close();
    $conexao->close();
    header("Location: ../editaritem.php");
    exit();
}
if (isset($_POST['editar_id'])) {
    $id = $_POST['editar_id'];
    echo "<script>
    if (confirm('Você realmente quer editar esse item?')) {
        window.location.href = '../editaritem.php?id=$id';
    } else {
        window.location.href = '../editaritem.php';
    }
  </script>";
exit();
}
//procurar tabela começa aqui
$sql = "SELECT * FROM cadferramenta";
$results = '';

if(isset($_POST['nome'])||isset($_POST['codigo'])){
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];

    $sql .=" WHERE 1=1";
    if (!empty($nome)){
        $sql .= " AND nome like '%$nome%'";
    }
    if(!empty($codigo)){
        $sql .=" AND codigo like '%$codigo%'";
    }    
}
    $resultado = $conexao->query($sql);
    if($resultado->num_rows>0){
        while($linha =$resultado->fetch_assoc()){
            $results .= "<tr>
                            
                            <td>{$linha['nome']}</td>
                            <td>{$linha['codigo']}</td>
                            <td>{$linha['quantidade']}</td>
                            <td>                                          
                            <form action='php/editaritem.php' method='post' style='display:inline;'>
                                <input type='hidden' name='delete_id' value='{$linha['iditem']}'>
                                <button type='submit' name='delete'>Deletar</button>
                            </form>
                            <form action='php/editaritem.php' method='post' style='display:inline'>
                                <input type='hidden' name='editar_id' value='{$linha['iditem']}'>
                                <button type='submit' name='editar'>Editar</button>
                            </form>
                        </td>
                        </tr>
            ";
        }
        }else{
            $results ="<tr>
                        <td colspan='3'>Nenhuma aula encontrada</td>
                    </tr>
            ";
            }
           $_SESSION['results'] = $results;            
           $conexao->close();
            header ("Location:../paineldoestoque.php");
            exit(); 
?>



