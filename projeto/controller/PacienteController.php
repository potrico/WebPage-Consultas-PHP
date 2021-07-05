<?php
    require_once("../model/FabricaConexao.php");
    require_once("../model/paciente.php");
    require_once("../model/PacienteDAO.php");
    require_once("../utils/include/PacienteValidate.php");
    
    

    class PacienteController {

        //Controla a Consulta
        public function controlaConsulta() {
            $DAO = new PacienteDAO();
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

        //Controla Alteração
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
        }

    
        //Controla Exclusão
        public function controlaExclusao()
        {
            if(isset($_POST["paciente"]))
            {
                $DAO = new PacienteDAO();
                $paciente = new Paciente();
                $codigo = $_POST["paciente"];
                $paciente->codigo = $codigo;

                if($DAO->Excluir($paciente)) {
                    unset($paciente);
                    return true;
                }
                else
                {   
                    unset($paciente);
                    return false;        
                }
    
            }
        }
        
        public function controlaInsercao() {
            if(isset($_POST["nome"]) && isset($_POST["cpf"]) && isset($_POST["endereco"]) && isset($_POST["cep"]) && isset($_POST["email"]) && isset($_POST["telefone"])) {
            $erros = array();
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $endereco = $_POST["endereco"];
            $cep = $_POST["cep"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            
            
            if(count($erros) == 0) {
                $DAO  = new PacienteDAO();
                $paciente = new Paciente();
                $paciente->nome = $nome;
                $paciente->cpf = $cpf;
                $paciente->endereco = $endereco;
                $paciente->cep = $cep;
                $paciente->email = $email;
                $paciente->telefone = $telefone;
                
                if($DAO->Inserir($paciente)) {
                    echo "<script>";
                    echo "alert(\"Usuário cadastrado com sucesso!\");";
                    echo "</script>";
                
                    header("Location: ../view/ListaPacientes.php");
                }
            
                else {
                    $erros[] = "ERRO NO BANCO DE DADOS: $DAO->erro";
                    $err = serialize($erros);
                    header("Location: ../view/cadastroPaciente.php?error=$err&nome=$nome&fone=$cpf");
                }
                
                unset($paciente);
            }
            else {
                $err = serialize($erros);
                header("Location: ../view/cadastroPaciente.php?error=$err&nome=$nome");
            }
            }
        }
    }
    
?>