<?php
    require_once("../model/FabricaConexao.php");
    require_once("../model/User.php");
    require_once("../model/UserDAO.php");

    $msg = '';
    $result = true;

    if (!empty($_POST['user']) && !empty($_POST['pwd'])) {
        $user = new User();
        $user->usuario = $_POST['user'];
        $user->senha = md5($_POST['pwd']);

        
    
        $DAO = new UserDAO();
        $result = $DAO->Consultar($user);
        

        if($result) { /* Testa se a consulta retornou algum registro */
            if($result == -2) {
                $msg = "Usuário não encontrado!";
                $result = false;
                
                
            }
            else if($result == -1) {
                $msg = "Senha inválida!";
                $result = false;
            
            }
            else {  /* Tudo certo - registrando as variáveis de sessão */
                session_start();
                $_SESSION["user_usuario"] = $user->usuario;
                $_SESSION["senha_usuario"] = $user->senha;
                $msg = "Usuário logado com sucesso!";
            }
        }
    }else{
        $msg = "Preencha os campos de login e senha para acessar!";
        $result = false;
    }

    echo json_encode(array('result' => $result, 'msg' => $msg));


?>