<?php
    $server_name = "localhost";
    $data_base = "quintafeira";
    $user_name = "root";
    $password = "";

    //STRING de Conexão
    $conn = mysqli_connect($server_name, $user_name, $password, $data_base);

    //Validação de Conexão
    if(!$conn){
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // echo "Conexão realizada com Sucesso!";
    // mysqli_close($conn);

?>