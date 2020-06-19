<?php

    require_once '../../model/funcionario/funcionario_class.php';

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
        public function findAll($id){
            try{
                $sql = "SELECT * FROM $this->tabela ";
                $exec = DB::prepare($sql);
                $exec->execute();
                return $exec->fetchAll();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function insert($cpf, $senha, $nome, $idade, $genero, $funcao, $tipoDeFunc){
            try{
                $sql = "INSERT INTO $this->tabela(cpf, senha, nome, idade, genero, funcao, tipoDeFunc, user_type)
             VALUES (:cpf, :senha, :nome, :idade, :genero, :funcao, :tipoDeFunc, :user_type)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':cpf',$cpf);
                $exec->bindParam(':senha',$senha);
                $exec->bindParam(':nome',$nome);
                $exec->bindParam(':idade',$idade);
                $exec->bindParam(':genero',$genero);
                $exec->bindParam(':funcao',$funcao);
                $exec->bindParam(':tipoDeFunc',$tipoDeFunc);
                $exec->bindValue(':user_type',1);
				echo "<script>alert('Funcionario cadastrado com sucesso!!');window.location ='../../view/funcionario/Cadastrar.php';</script>";
                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET cpf = :cpf, senha = :senha, nome = :nome,
                idade = :idade, genero = :genero, funcao = :funcao, tipoDeFunc = :tipoDeFunc WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->bindValue(':cpf', $this->getCpf());
                $exec->bindValue(':senha', $this->getSenha());
                $exec->bindValue(':nome',$this->getNome());
                $exec->bindValue(':idade', $this->getIdade());
                $exec->bindValue(':genero', $this->getGenero());
                $exec->bindValue(':funcao', $this->getFuncao());
                $exec->bindValue(':tipoDeFunc', $this->getTipoDeFunc());
                echo "<script>alert('Funcionario atualizado com sucesso!!');window.location ='../../view/funcionario/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo "Erro".$erro->getMessage();
            }

        }
        public function delete($id){
            try{
                $sql = "DELETE FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                echo "<script>alert('Funcionario deletado com sucesso!!');window.location ='../../view/funcionario/Listar.php';</script>";

                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        function listarFuncionarios(){
            $resultado = "SELECT * FROM funcionario ORDER BY id ASC";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                $result[] = array(
                    'id' => $dados['id'],
                    'nome' => $dados['nome'],
                    'cpf' => $dados['cpf'],
                    'idade' => $dados['idade']
                );
            }

            return $result;
        }
    }
?>