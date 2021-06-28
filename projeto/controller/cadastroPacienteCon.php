<?php

    require_once '../include/conexao.php';
    
    if(isset($_POST['operacao'])){

        switch($_POST['operacao']){
            case 'criar':

                $paciente = array(
                    "nome" => (isset($_POST['nome']) ? $_POST['nome'] : ""),
                    "cpf" => (isset($_POST['cpf']) ? ($_POST['cpf']) : ""),
                    "endereco" => (isset($_POST['endereco']) ? $_POST['endereco'] : ""),
                    "email" => (isset($_POST['email']) ? $_POST['email'] : ""),
                    "telefone" => (isset($_POST['telefone']) ? $_POST['telefone'] : "")
                );

                $query = '
                    INSERT INTO paciente
                        (
                            nome,
                            cpf,
                            endereco,
                            email,
                            telefone
                        )
                    VALUES
                        (
                            "' . $paciente['nome'] . '",
                            "' . $paciente['cpf'] . '",
                            "' . $paciente['endereco'] . '",
                            "' . $paciente['email'] . '",
                            "' . $paciente['telefone'] . '"
                        )
                ';
                
                

                echo '</div>
                <div class="alert alert-warning" role="alert">
                Paciente cadastrado com sucesso!
                </div>';
                break;
        }

        try {
            $result_query = $mysqli_connection->query($query);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
?>