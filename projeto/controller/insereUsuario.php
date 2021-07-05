
<?php
    // include_once("../controller/UsuarioController.php");
    // $obj = new UsuarioController();
    // $obj->controlaInsercao();

   
    require_once("../model/FabricaConexao.php");
    require_once("../model/usuario.php");
    require_once("../model/UsuarioDAO.php");

    $result = false;
    $msg = "";

    if(isset($_POST["name"]) && isset($_POST["nivel"]) && isset($_POST["user"]) && isset($_POST["pwd"])) {
        $erros = array();
        $nome = $_POST["name"];
        $nivel = $_POST["nivel"];
        $usuario = $_POST["user"];
        $senha = md5($_POST["pwd"]);


        // if(!PacienteValidate::testarNome($_POST["name"]))
        //     $erros[] = "Nome inválido";
        
        if(count($erros) == 0) {
            $DAO  = new UsuarioDAO();
            $objUsuario = new Usuario();
            $objUsuario->nome = $nome;
            $objUsuario->nivel = $nivel;
            $objUsuario->usuario = $usuario;
            $objUsuario->senha = $senha;
            
            if($DAO->Inserir($objUsuario)) {
                unset($objUsuario);
                $result = true;
                
            }

            else {
                unset($objUsuario);
                $result = false; 
            }   
        }
    }

    echo json_encode(array('result' => $result));

?>
