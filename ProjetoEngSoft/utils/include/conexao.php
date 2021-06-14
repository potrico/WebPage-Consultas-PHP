<?php
    /*
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "cadastropaciente";

    mysqli_connect($server, $user, $pass, $bd);
    */

?>

<?php
    $mysqli_connection = new MySQLi('localhost', 'root', '', 'cadastropaciente');
    if($mysqli_connection->connect_error){
        echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
    }else{
        //echo "Conectado!";
    }
?>