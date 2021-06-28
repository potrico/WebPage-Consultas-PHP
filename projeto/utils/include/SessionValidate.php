<?php
    require_once("../model/FabricaConexao.php");
    require_once("../model/User.php");
    require_once("../model/UserDAO.php");
    
    /* Arquivo de autenticação:
        Verifica se o valor das variáveis de sessão realmente existem e se contém as informações corretas.
        Assim, evita-se o acesso a uma página diretamente pelo endereço URL, sem passar pelo login. */
        
    session_start();  /* restaurando os dados da sessão atual */
    
    if(isset($_SESSION["user_usuario"]))
        $nome_usuario = $_SESSION["user_usuario"];
        
    if(isset($_SESSION["senha_usuario"]))
        $senha_usuario = $_SESSION["senha_usuario"];
    
    if(!empty($nome_usuario) || !empty($senha))
    {
        $user = new User();
        $user->usuario = $nome_usuario;
        $user->senha = $senha_usuario;
    
        $DAO = new UserDAO();
        $result = $DAO->Consultar($user);

        if($result < 1) {  // Pode ter injetado um usuário existente, mas a senha não conferirá devido ao hash 
            unset($_SESSION["user_usuario"]);
            unset($_SESSION["senha_usuario"]);
            echo "<script>";
            echo "alert(\"Você não efetuou o LOGIN!\");";
            echo "</script>";
            echo "location = \"../index.php\";</script>";  /* Direciona para a página de login */
        }
        else {
            // echo "<script>";
            // echo "document.getElementById(\"usuario\") ? document.getElementById(\"usuario\").innerHTML = 'Logado como $nome_usuario' : ''";
            // echo "</script>";
        }
    }
    else {  // Se um dos campos for vazio
        echo "<script>";
        echo "alert(\"Você não efetuou o LOGIN!\");";
        echo "location = \"../index.php\";</script>";  /* Direciona para a página de login */
        echo "</script>";
    }
?>