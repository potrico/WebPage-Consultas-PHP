<?php
    class UsuarioDAO {
        // Recebe a conexão
        public $p = null;
        public $erro = null;
        
        // construtor
        public function __construct() {
            $this->p = new FabricaConexao();
            $this->p->exec("set names utf8");  /* Define todas as transações com charset UTF-8 */
        }
        
        // inserção
        public function Inserir($usuario){
            try {
            $stmt = $this->p->prepare("INSERT INTO usuario (nome, nivel, usuario, senha) VALUES (?, ?, ?, ?)");
            $stmt->bindValue(1, $usuario->nome);
            $stmt->bindValue(2, $usuario->nivel);
            $stmt->bindValue(3, $usuario->usuario);
            $stmt->bindValue(4, $usuario->senha);
            
            // Executa a query
            $stmt->execute();
            
            // Fecha a conexão
            $this->p = null;
            return true;
            }
            // Em caso de erro, retorna a mensagem:
            catch(PDOException $e) {
            $this->erro = "Erro: " . $e->getMessage();
            return false;
            }
        }
        
        // alteração
        public function Alterar($usuario) {
            try {
            $stmt = $this->p->prepare("UPDATE usuario SET nome=?, nivel=?, usuario=? WHERE id_usuario=?");
            // Inicia a transação
            $this->p->beginTransaction();
            // Vincula um valor a um parâmetro da sentença SQL, na ordem
            $stmt->bindValue(1, $usuario->nome);
            $stmt->bindValue(2, $usuario->nivel);
            $stmt->bindValue(3, $usuario->usuario);
            $stmt->bindValue(4, $usuario->codigo);
            
            
            // Executa a query
            $stmt->execute();
        
            // Grava a transação
            $this->p->commit();
            
            // Fecha a conexão
            unset($this->p);

            return true;
            }
            // Em caso de erro, retorna a mensagem:
            catch(PDOException $e) {
            $this->erro = "Erro: " . $e->getMessage();
            return false;
            }
        }

        // exclusão
        public function Excluir($usuario) {
            try {
            $stmt = $this->p->prepare("DELETE FROM usuario WHERE id_usuario=?");
            // Inicia a transação
            $this->p->beginTransaction();
            // Vincula um valor a um parâmetro da sentença SQL, na ordem
            $stmt->bindValue(1, $usuario->codigo);
            
            // Executa a query
            $stmt->execute();
            
            // Grava a transação
            $this->p->commit();
            
            // Fecha a conexão
            unset($this->p);

            return true;
            }
            // Em caso de erro, retorna a mensagem:
            catch(PDOException $e) {
            $this->erro = "Erro: " . $e->getMessage();
            return false;
            }
        }
        
        // consulta
        public function Consultar($query=null) {
            try {
                $items = array();
                
                if($query != null)
                    $stmt = $this->p->query($query);
                else
                    $stmt = $this->p->query("SELECT id_usuario, nome, nivel, usuario FROM usuario");
                    
                $this->p = null;
                
                while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
                {
                    $p = new Usuario();
                    
                    // Sempre verifica se a query SQL retornou a respectiva coluna
                    if(isset($registro["id_usuario"]))
                        $p->codigo = $registro["id_usuario"];
                    if(isset($registro["nome"]))
                        $p->nome = $registro["nome"];
                    if(isset($registro["nivel"]))
                        $p->nivel = $registro["nivel"];
                    if(isset($registro["usuario"]))
                        $p->usuario = $registro["usuario"];

                    // Ao final, adiciona o registro como um item do array de retorno
                    $items[] = $p;
                }
                
                return $items;
            }
            // Em caso de erro, retorna a mensagem:
            catch(PDOException $e) {
                echo "Erro: ".$e->getMessage();
            }
        }
    }
?>