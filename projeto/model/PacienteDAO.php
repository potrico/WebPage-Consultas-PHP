<?php
    class PacienteDAO {
        // Recebe a conexão
        public $p = null;
        public $erro = null;
        
        // construtor
        public function __construct() {
            $this->p = new FabricaConexao();
            $this->p->exec("set names utf8");  /* Define todas as transações com charset UTF-8 */
        }
        
        // inserção
        public function Inserir($paciente){
            try {
            $stmt = $this->p->prepare("INSERT INTO paciente (nome, cpf, endereco, cep, email, telefone) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bindValue(1, $paciente->nome);
            $stmt->bindValue(2, $paciente->cpf);
            $stmt->bindValue(3, $paciente->endereco);
            $stmt->bindValue(4, $paciente->cep);
            $stmt->bindValue(5, $paciente->email);
            $stmt->bindValue(6, $paciente->telefone);
            
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
        
        /// alteração
            public function Alterar($paciente) {
                try {
                $stmt = $this->p->prepare("UPDATE paciente SET nome=?, cpf=?, endereco=?, cep=?, email=?, telefone=? WHERE id_Paciente=?");
                // Inicia a transação
                $this->p->beginTransaction();
                // Vincula um valor a um parâmetro da sentença SQL, na ordem
                $stmt->bindValue(1, $paciente->nome);
                $stmt->bindValue(2, $paciente->cpf);
                $stmt->bindValue(3, $paciente->endereco);
                $stmt->bindValue(4, $paciente->cep);
                $stmt->bindValue(5, $paciente->email);
                $stmt->bindValue(6, $paciente->telefone);
                $stmt->bindValue(7, $paciente->codigo);

                
                
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
            public function Excluir($paciente) {
                try {
                $stmt = $this->p->prepare("DELETE FROM paciente WHERE id_Paciente=?");
                // Inicia a transação
                $this->p->beginTransaction();
                // Vincula um valor a um parâmetro da sentença SQL, na ordem
                $stmt->bindValue(1, $paciente->codigo);
                
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
                $stmt = $this->p->query("SELECT id_Paciente, nome, cpf, email FROM paciente");
                
            $this->p = null;
            
            while($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
            {
                $p = new Paciente();
                
                // Sempre verifica se a query SQL retornou a respectiva coluna
                if(isset($registro["id_Paciente"]))
                    $p->codigo = $registro["id_Paciente"];
                if(isset($registro["nome"]))
                    $p->nome = $registro["nome"];
                if(isset($registro["cpf"]))
                    $p->cpf = $registro["cpf"];
                if(isset($registro["endereco"]))
                    $p->endereco = $registro["endereco"];
                if(isset($registro["cep"]))
                    $p->cep = $registro["cep"];
                if(isset($registro["email"]))
                    $p->email = $registro["email"];
                if(isset($registro["telefone"]))
                    $p->telefone = $registro["telefone"];

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