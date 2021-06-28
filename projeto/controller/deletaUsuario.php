<?php
    require_once("../model/FabricaConexao.php");
    require_once("../model/usuario.php");
    require_once("../model/UsuarioDAO.php");
    
    if(isset($_POST["usuario"]))
    {
        $DAO = new UsuarioDAO();
        $usuario = new Usuario();
        $codigo = $_POST["usuario"];
        $usuario->codigo = $codigo;

        if($DAO->Excluir($usuario)) {
            unset($usuario);
            $result = true;
        }
        else
        {   
            unset($usuario);
            $result = false;        
        }
        
        
    }
    echo json_encode(array('result' => $result));  
?>