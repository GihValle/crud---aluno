<?php
    include_once("conexao.php");

    if (!isset($_POST["id"]))
        header("location: index.php");

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $profissao = $_POST["profissao"];
    $nascimento = $_POST["nascimento"];
    $endereco = $_POST["endereco"];
    $sexo = $_POST["sexo"];
    $estado_civil = $_POST["estado_civil"];
    $cpf = $_POST["cpf"];
    $tel = $_POST["tel"];
    $nacionalidade = $_POST["nacionalidade"];
    $peso = str_replace(",", ".", $_POST["peso"]);
    $altura = str_replace(",", ".", $_POST["altura"]);

    $sql = "UPDATE aluno SET nome='$nome', profissao='$profissao', nascimento='$nascimento', endereco='$endereco', sexo='$sexo', estado_civil='$estado_civil', cpf='$cpf', tel='$tel', nacionalidade='$nacionalidade', peso='$peso', altura='$altura' WHERE pk_pessoa = $id";

    mysqli_query($conn, $sql);

    if(mysqli_error($conn)==""){
        $status = "ok";
        $msg = "Registo Alterado com Sucesso";
    }
    else {
        $status = "erro";
        $msg = "Erro:". mysqli_error($conn); 
    }
    header("location: index.php?status=$status&msg=$msg");
?>