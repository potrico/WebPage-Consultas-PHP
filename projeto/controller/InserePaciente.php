
<?php
    // include_once("../controller/PacienteController.php");
    // $obj = new PacienteController();
    // $obj->controlaInsercao();
    require_once("../model/FabricaConexao.php");
    require_once("../model/paciente.php");
    require_once("../model/PacienteDAO.php");

    $result = false;
    $msg = "";

    if(isset($_POST["name"]) && isset($_POST["cpf"]) && isset($_POST["endereco"]) && isset($_POST["cep"]) && isset($_POST["email"]) && isset($_POST["telefone"])) {
        $erros = array();
        $nome = $_POST["name"];
        $cpf = $_POST["cpf"];
        $endereco = $_POST["endereco"];
        $cep = $_POST["cep"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];

        
        if(count($erros) == 0) {
            $DAO  = new PacienteDAO();
            $objPaciente = new Paciente();
            $objPaciente->nome = $nome;
            $objPaciente->cpf = $cpf;
            $objPaciente->endereco = $endereco;
            $objPaciente->cep = $cep;
            $objPaciente->email = $email;
            $objPaciente->telefone = $telefone;

            if($DAO->Inserir($objPaciente)) {
                unset($objPaciente);
                $result = true;
                
            }

            else {
                unset($objPaciente);
                $result = false; 
            }   
        }
    }

    echo json_encode(array('result' => $result));
?>