<?php
    include_once("conexao.php");

    if (!isset($_POST["nome"]))
        header("location: index.php");

    $nome = $_POST["nome"];
    $profissao = $_POST["profissao"];
    $nascimento = $_POST["nascimento"];
    $endereco = $_POST["endereco"];
    $genero = $_POST["genero"];
    $estado_civil = $_POST["estado_civil"];
    $cpf = $_POST["cpf"];
    $tel = $_POST["tel"];
    $nacionalidade = $_POST["nacionalidade"];
    $peso = str_replace(",", ".", $_POST["peso"]);
    $altura = str_replace(",", ".", $_POST["altura"]);

    $sql = "INSERT INTO aluno(nome, profissao, nascimento, endereco, fk_genero, estado_civil, cpf, tel, nacionalidade, peso, altura)
    VALUES('$nome', '$profissao', '$nascimento', '$endereco', '$genero', '$estado_civil', '$cpf', '$tel', '$nacionalidade', $peso, $altura)";
    mysqli_query($conn, $sql);

    if(mysqli_error($conn)==""){
        $status = "ok";
        $msg = "Registo Incluido com Sucesso";
    }
    else {
        $status = "erro";
        $msg = "Erro:". mysqli_error($conn); 
    }
    header("location: index.php?status=$status&msg=$msg");
?>