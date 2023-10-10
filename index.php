<?php
include_once("conexao.php");

$sql = "select * from aluno";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD - Persistência em banco de dados</title>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<body>
    <div class="container">
    <h1 class="mb-5">CRUD - Data base</h1>
    <p>CRUD é um acronimo para ações realizada em banco de dados, onde:</p>
    <ul>
        <li>C - Create, Criar Informações (dados/registros) | SQL - INSERT;</li>
        <li>R - Read, Ler Informações | SQL - SELECT;</li>
        <li>U - Update, Alterar Informações | SQL - UPDATE; </li>
        <li>D - Delete, Deletar Informações | SQL -  DELETE.</li>
    </ul>

    <div class="d-flex justify-content-end">
        <a href="form_novo.php" class="btn btn-primary">NOVO</a>
    </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Profissão</th>
      <th scope="col">Nascimento</th>
      <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>

    <?php
    while ($row = mysqli_fetch_assoc($query)){
    ?>
        <tr>
        <th scope="row"><?php echo $row['pk_pessoa']; ?></th>
        <td><?php echo $row['nome']; ?></td>
        <td><?php echo $row['profissao']; ?></td>
        <td><?php echo $row['nascimento']; ?></td>
        <td> <a href="form_alterar.php?id=<?php echo $row['pk_pessoa']; ?>">ALTERAR</a> 
        | 
        <a href="deletar.php?id=<?php echo $row['pk_pessoa']; ?>"> APAGAR </td>
        </tr>
    <?php
        }
    ?>

  </tbody>
</table>

    </div>    
</body>
</html>