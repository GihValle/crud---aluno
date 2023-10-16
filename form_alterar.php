<?php
    include_once("conexao.php"); //Inclui o arquivo de conexão com o banco de dados

    //TRATAMENTO DE ERROS
    if(!isset($_GET["id"])) //Verifica se existe a chave "id" no array $_GET
        header("location: index.php"); //caso não existe, redireciona para index.php

    if($_GET["id"]=="") //Verifica se "id" é vazio
        header("location: index.php"); //caso seja vazio, redireciona para index.php

    //FIM - TRATAMENTO DE ERROS

    $id = $_GET["id"]; //Chave primariária do registro procurado (pessoa)
    
    $sql = "SELECT pk_pessoa, nome, profissao, nascimento, endereco, fk_genero, estado_civil, cpf, tel, nacionalidade, peso, altura FROM aluno WHERE pk_pessoa=".$id;
    $query = mysqli_query($conn, $sql); //Busca consulta no banco
    $row = mysqli_fetch_assoc($query); //Converte em array associativo

    $sql = "SELECT pk_genero, genero FROM genero";
    $queryGenero = mysqli_query($conn, $sql); //Busca no banco de dados

    // echo "<pre>";
    // var_dump($row);
    // echo "</pre>";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CRUD - Update</title>
</head>
<body>
    <div class="container">
        <h1>Veja os dados abaixo e, altere o que desejar: </h1>

        <form action="alterar.php" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" aria-describedby="Nome" name="nome" value="<?php echo $row["nome"]; ?>">
                <input type="hidden" name="id" value="<?php echo $row["pk_pessoa"]; ?>">
            </div>

            <div class="mb-3">
                <label for="profissao" class="form-label">Profissão</label>
                <input type="text" class="form-control" id="profissao" name="profissao" value="<?php echo $row["profissao"]; ?>">
            </div>

            <div class="mb-3">
                <label for="nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?php echo $row["nascimento"]; ?>">
            </div>

            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $row["endereco"]; ?>">
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Sexo</label>
                <select name="genero" id="genero" class="form-select">
                    <option value="">Escolha uma opção</option>
                    <?php while ($rowGenero = mysqli_fetch_assoc($queryGenero)){ ?>
                        <option value="<?php echo $rowGenero['pk_genero']?>"
                        <?php echo $row['fk_genero'] == $rowGenero["pk_genero"] ? "selected" : "" ?>>
                            <?php echo $rowGenero['genero']?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="estado_civil" class="form-label">Estado Civil</label>
                <select name="estado_civil" id="estado_civil" class="form-select">
                    <option value="Solteiro" <?php echo $row["estado_civil"]=="Solteiro" ? "selected" : ""; ?>>Solteiro</option>
                    <option value="Casado" <?php echo $row["estado_civil"]=="Casado" ? "selected" : ""; ?>>Casado</option>
                    <option value="Separado" <?php echo $row["estado_civil"]=="Separado" ? "selected" : ""; ?>>Separado</option>
                    <option value="Divorciado" <?php echo $row["estado_civil"]=="Divorciado" ? "selected" : ""; ?>>Divorciado</option>
                    <option value="Viuvo" <?php echo $row["estado_civil"]=="Viuvo" ? "selected" : ""; ?>>Viúvo</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $row["cpf"]; ?>">
            </div>

            <div class="mb-3">
                <label for="tel" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $row["tel"]; ?>">
            </div>

            <div class="mb-3">
                <label for="nacionalidade" class="form-label">Nacionalidade</label>
                <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="<?php echo $row["nacionalidade"]; ?>">
            </div>

            <div class="mb-3">
                <label for="peso" class="form-label">Peso</label>
                <input type="text" class="form-control" id="peso" name="peso" value="<?php echo $row["peso"]; ?>">
            </div>

            <div class="mb-3">
                <label for="altura" class="form-label">Altura</label>
                <input type="text" class="form-control" id="altura" name="altura" value="<?php echo $row["altura"]; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    
</body>
</html>