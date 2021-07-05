<?php
    require_once("../model/FabricaConexao.php");
    require_once("../model/User.php");
    require_once("../model/UserDAO.php");
    
    class UserController {
    
      public function controlaConsulta() {
        if (!empty($_POST['user']) && !empty($_POST['pwd'])) {
          $user = new User();
          $user->usuario = $_POST['user'];
          $user->senha = md5($_POST['pwd']);
      
          $DAO = new UserDAO();
          $result = $DAO->Consultar($user);
          
          print_r($result);

          if($result) { /* Testa se a consulta retornou algum registro */
            if($result == -2) {
              echo "<p>USUÁRIO NÃO ENCONTRADO!</p>";
              echo "<a href=\"../view/login.php\"><button>Voltar</button></a>";  
              
              
            }
            else if($result == -1) {
              echo "<p>SENHA INVÁLIDA!</p>";
              echo "<a href=\"../view/login.php\"><button>Voltar</button></a>";
             
            }
            else {  /* Tudo certo - registrando as variáveis de sessão */
              session_start();
              $_SESSION["user_usuario"] = $user->usuario;
              $_SESSION["senha_usuario"] = $user->senha;
              header("location: ../view/principal.php");  /* Direciona para a página inicial */
            }
          }
        }
      }
    
      // public function controlaInsercao() {
      //   if(isset($_POST["name"]) && isset($_POST["nivel"]) && isset($_POST["user"]) && isset($_POST["pwd"])){
      //     $erros = array();
      //     $user = new User();
      //     $user->nome = $_POST['name'];
      //     $user->nivel = $_POST['nivel'];
      //     $user->usuario = $_POST['user'];
      //     $user->senha = md5($_POST['pwd']);

      //    var_dump($user);

          
      
      //     $DAO = new UserDAO();
      //     $result = $DAO->Inserir($user);
      //     if($result == 1) {
      //       $res = "USUÁRIO CADASTRADO COM SUCESSO!";
      //       echo $res;
      //       header("Location: ../view/ListaUsuarios.php");
            

      //     }
      //     else if($result == -1) {
      //       $erros[] = "USUÁRIO JÁ EXISTENTE! TENTE NOVAMENTE!";
      //       $err = serialize($erros);
      //       header("Location: ../view/ListaUsuarios.php?error=$err");
            
      //     }
      //     else {
      //       $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
      //       $err = serialize($erros);
      //       header("Location: ../view/ListaUsuarios.php?error=$err");
      
      //     }
          
      //     unset($user);
       //}
      //}
    }
?>