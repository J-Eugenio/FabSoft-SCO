<?php

    require_once 'funcionario_class.php';

    class funcionario_DAO extends funcionario_class{
        protected $tabela = 'funcionario';
        
        public function findUnic($id){
            try{
                $sql = "SELECT * FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindParam(':id', $id, PDO::PARAM_INT);
                $exec->execute();
                return $exec->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $erro){
                echo 'Erro ao buscar informação';
            }
        }
        public function findAll(){
            try{
                $sql = "SELECT * FROM $this->tabela ";
                $exec = DB::prepare($sql);
                $exec->execute();
                return $exec->fetchAll();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function insert(){
            try{
                $sql = "INSERT INTO $this->tabela(cpf, senha, nome, sobrenome, genero, funcao, tipoDeFunc, user_type)
             VALUES (:cpf, :senha, :nome, :sobrenome, :genero, :funcao, :tipoDeFunc, :user_type)";
                $exec = DB::prepare($sql);
                $exec->bindValue(':cpf', $this->getCpf());
                $exec->bindValue(':senha', $this->getSenha());
                $exec->bindValue(':nome', $this->getNome());
                $exec->bindValue(':sobrenome', $this->getSobrenome());
                $exec->bindValue(':genero', $this->getGenero());
                $exec->bindValue(':funcao', $this->getFuncao());
                $exec->bindValue(':tipoDeFunc', $this->getTipoDeFunc());
                $exec->bindValue(':user_type',1);
                $exec->execute();
				echo "<script>window.location ='../../view/funcionario/Cadastrar.php';</script>";
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update(){
            try{
                $sql = "UPDATE $this->tabela SET cpf = :cpf, senha = :senha, nome = :nome, sobrenome = :sobrenome
                , genero = :genero, funcao = :funcao, tipoDeFunc = :tipoDeFunc WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                $exec->bindValue(':cpf', $this->getCpf());
                $exec->bindValue(':senha', $this->getSenha());
                $exec->bindValue(':nome',$this->getNome());
                $exec->bindValue(':sobrenome',$this->getSobrenome());
                $exec->bindValue(':genero', $this->getGenero());
                $exec->bindValue(':funcao', $this->getFuncao());
                $exec->bindValue(':tipoDeFunc', $this->getTipoDeFunc());
                $exec->execute();
                echo "<script>window.location ='../../view/funcionario/Cadastrar.php';</script>";
            }catch(PDOException $erro){
                echo "Erro".$erro->getMessage();
            }

        }
        public function delete(){
            try{
                $sql = "DELETE FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                $exec->execute();
                echo "<script>window.location ='../../view/funcionario/Listar.php';</script>";
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        function listarFuncionarios(){
            $result = [];
            $resultado = "SELECT * FROM $this->tabela ORDER BY id ASC";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                $result[] = array(
                    'id' => $dados['id'],
                    'nome' => $dados['nome'],
                    'cpf' => $dados['cpf'],
                    'tipoDeFunc' => $dados['tipoDeFunc']
                );
            }

            return $result;
        }
    }
?>