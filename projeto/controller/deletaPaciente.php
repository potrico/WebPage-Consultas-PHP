<?php
    require_once("../model/FabricaConexao.php");
    require_once("../model/paciente.php");
    require_once("../model/PacienteDAO.php");
    
    if(isset($_POST["paciente"]))
    {
        $DAO = new PacienteDAO();
        $paciente = new Paciente();
        $codigo = $_POST["paciente"];
        $paciente->codigo = $codigo;

        if($DAO->Excluir($paciente)) {
            unset($paciente);
            $result = true;
        }
        else
        {   
            unset($paciente);
            $result = false;        
        }
        
        
    }
    echo json_encode(array('result' => $result));  
?>