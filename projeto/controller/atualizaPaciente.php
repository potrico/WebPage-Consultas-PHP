<?php
    require_once("../model/FabricaConexao.php");
    require_once("../model/paciente.php");
    require_once("../model/PacienteDAO.php");


    
    $result = false;
    $msg = "";

    if(isset($_POST["codigo"]) && isset($_POST["name"]) && isset($_POST["cpf"]) && isset($_POST["endereco"]) && isset($_POST["cep"]) && isset($_POST["email"]) && isset($_POST["telefone"])) {
        $erros = array();
        $codigo = $_POST["codigo"];
        $nome = $_POST["name"];
        $cpf = $_POST["cpf"];
        $endereco = $_POST["endereco"];
        $cep = $_POST["cep"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        
        
        
        try {
            $DAO = new PacienteDAO();
            $objPaciente = new Paciente();
            $objPaciente->codigo = $codigo;
            $objPaciente->nome = $nome;
            $objPaciente->cpf  = $cpf;
            $objPaciente->endereco = $endereco;
            $objPaciente->cep = $cep;
            $objPaciente->email = $email;
            $objPaciente->telefone = $telefone;

                   
            if($DAO->Alterar($objPaciente)) {
                $result = true;
                
            }
            else
            {
                $result = false;       
            }
        
            unset($objPaciente);
            
            
            
        } catch (\Throwable $th) {
            $result = false;        
        }   
    }

    echo json_encode(array('result' => $result, 'msg' => $msg));
    

?>