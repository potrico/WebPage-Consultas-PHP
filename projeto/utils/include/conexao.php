<?php
    /*$mysqli_connection = new MySQLi('localhost', 'root', '', 'cadastropaciente');
    if($mysqli_connection->connect_error){
        echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
    }else{
        //echo "Conectado!";
    }*/
?>

<?php
    define('HOST','127.0.0.1');
    define('USUARIO','root');
    define('SENHA', '');
    define('DB', 'desweb');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar!');

    if($conexao){
        echo 'conectado!';

    }else{
        echo 'erro';
    }

    /*if($mysqli_connection->connect_error){
        echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
    }else{
        echo "Conectado!";
    }*/

?>