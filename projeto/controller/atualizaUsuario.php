<?php
    require_once("../model/FabricaConexao.php");
    require_once("../model/usuario.php");
    require_once("../model/UsuarioDAO.php");


    
    $result = false;
    $msg = "";

    if(isset($_POST["codigo"]) && isset($_POST["name"]) && isset($_POST["nivel"]) && isset($_POST["user"])) {
        $erros = array();
        $codigo = $_POST["codigo"];
        $nome = $_POST["name"];
        $nivel = $_POST["nivel"];
        $usuario = $_POST["user"];
        
        
        try {
            
            $DAO = new UsuarioDAO();
            $objUsuario = new Usuario();
            $objUsuario->codigo = $codigo;
            $objUsuario->nome = $nome;
            $objUsuario->nivel  = $nivel;
            $objUsuario->usuario = $usuario;
                   
            if($DAO->Alterar($objUsuario)) {
                $result = true;
                
            }
            else
            {
                $result = false;       
            }
        
            unset($objUsuario);
            
            
            
        } catch (\Throwable $th) {
            $result = false;        
        }   
    }

    echo json_encode(array('result' => $result, 'msg' => $msg));
    

?>