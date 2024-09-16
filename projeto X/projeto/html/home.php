<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../css/stylehome.css">

  <title>Home</title>
</head>

<body>

  <header>

    <h1>Home Logfer.</h1>

    <nav>
      <ul>
        <li><a href="requisicao.php">Requisição e   Devolução</a></li>
        <li><a href="paineldoestoque.php">Painel do Estoque</a></li>
        <li>
          <a href="#" onclick="toggleDropdown()">Cadastro</a>
          <div class="dropdown-content" id="myDropdown">
            <a href="cadastrofuncionario.php">Cadastrar Usuário</a>
            <a href="cadastraritem.php">Cadastrar Item</a>
          </div>
        </li>
        <li><a href="index.html">Sair</a></li>
      </ul>
    </nav>

    <script>
      function toggleDropdown() {
        var dropdown = document.getElementById("myDropdown");
        if (dropdown.style.display === "block") {
          dropdown.style.display = "none";

        } else {
          dropdown.style.display = "block";

        }
      }
    </script>


  </header>

  <footer>
    <p>&#174; 2024 Ferlog - Todos os direitos reservados.</p>
    <ul>
      <li><a href="#">Instagram.</a></li>
      <li><a href="#">X.</a></li>
    </ul>
    <p>Desenvolvedor WEB Senac.</p>
  </footer>

</body>

</html>