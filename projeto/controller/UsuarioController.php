<?php
    require_once("../model/FabricaConexao.php");
    require_once("../model/usuario.php");
    require_once("../model/UsuarioDAO.php");
    //require_once("../utils/include/PacienteValidate.php");

    class UsuarioController {

        public function controlaConsulta() {
            $DAO = new UsuarioDAO();
            $lista = array();
            $numCol = 4;
            
            $lista = $DAO->Consultar();
                
            

            if(count($lista) > 0){

                return $lista; 
            }
            else{
                return -1;
            }
        }


        public function controlaAlteracao()
        {
            if(isset($_POST["name"]) && isset($_POST["nivel"]) && isset($_POST["user"]) && isset($_POST["pwd"])) {
            $erros = array();
            $nome = $_POST["name"];
            $nivel = $_POST["nivel"];
            $usuario = $_POST["user"];
            $senha = $_POST["pwd"];     
            
            
            if(count($erros) == 0) {
                $DAO = new UsuarioDAO();
                $objUsuario = new Usuario();
                $objUsuario->nome = $nome;
                $objUsuario->nivel  = $nivel;
                $objUsuario->usuario = $usuario;
                $objUsuario->senha = $senha;        

                if($DAO->Alterar($objUsuario)) {
                $res = "CARRO ALTERADO COM SUCESSO!";
                header("Location: ../view/alteracarro.php?resultMode=$res");
                }
                else
                {
                $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
                $err = serialize($erros);
                header("Location: ../view/ListaUsuarios.php");          
                }
            
                unset($objUsuario);
            }
            else {
                $err = serialize($erros);  // Caso tenha erro no preenchimento do formulário
                header("Location: ../view/ListaUsuarios.php");
            }
            }
            // else if(isset($_POST["buscaCod"]))
            // {
            // $codigo = $_POST["buscaCod"];
            // $this->buscaDados($codigo, 0);  // chamaFormAlterar
            // }
        }

        

    

        public function controlaExclusao()
        {
            if(isset($_POST["usuario"]))
            {
                $DAO = new UsuarioDAO();
                $usuario = new Usuario();
                $codigo = $_POST["usuario"];
                $usuario->codigo = $codigo;

                if($DAO->Excluir($usuario)) {
                    unset($usuario);
                    return true;
                }
                else
                {   
                    unset($usuario);
                    return false;        
                }
                
                
            }
            // else if(isset($_POST["buscaCod"]))
            // {
            // $codigo = $_POST["buscaCod"];
            // $this->buscaDados($codigo, 1);  // chamaFormExcluir
            // }
        }
        
        public function controlaInsercao() {
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
                    echo "<script>";
                    echo "alert(\"Usuário cadastrado com sucesso!\");";
                    echo "</script>";
                
                    header("Location: ../view/ListaUsuarios.php");
                }

                else {
                $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
                $err = serialize($erros);
                echo "alert(\"Erro ao cadastrar Usuario!\");";
                //header("Location: ../view/inserepessoa.php?error=$err&nome=$nome");
                }
                
                unset($objUsuario);
            }
            else {
                $err = serialize($erros);
                echo "alert(\"Erro ao cadastrar Usuario!2\");";
                //header("Location: ../view/inserepessoa.php?error=$err&nome=$nome");
            }
            }
        }
    
    }
?>