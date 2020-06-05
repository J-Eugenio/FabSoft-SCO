<?php

    require_once '../../model/usuario/usuario_class.php';

    class usuario_DAO extends usuario_class{
        protected $tabela = 'usuario';
        
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
        public function insert($login,$senha,$nome,$cpf,$email,$nivel,$acesso){
            try{
                $sql = "INSERT INTO $this->tabela(login, senha, nome, cpf, email, nivel)
             VALUES (:login, :senha, :nome, :cpf, :email, :nivel)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':login',$login);
                $exec->bindParam(':senha',$senha);
                $exec->bindParam(':nome',$nome);
                $exec->bindParam(':cpf',$cpf);
                $exec->bindParam(':email',$email);
                $exec->bindParam(':nivel',$nivel);
                echo "<script>alert('Usuario cadastrado com sucesso!!');window.location ='../../view/usuario/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET login = :login, senha = :senha, nome = :nome,
                cpf = :cpf, email = :email, nivel = :nivel WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->bindValue(':login', $this->getLogin());
                $exec->bindValue(':senha', $this->getSenha());
                $exec->bindValue(':nome',$this->getNome());
                $exec->bindValue(':cpf', $this->getCPF());
                $exec->bindValue(':email', $this->getEmail());
                $exec->bindValue(':nivel', $this->getNivel());
                echo "<script>alert('Usuario atualizado com sucesso!!');window.location ='../../view/usuario/Cadastrar.php';</script>";
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
                echo "<script>alert('Usuario deletado com sucesso!!');window.location ='../../view/usuario/Listar.php';</script>";

                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        public function autenticar($email,$senha){
           try{
                $sql = "SELECT id,nome,email,senha FROM $this->tabela 
                WHERE email = :email AND senha = :senha";
                $exec = DB::prepare($sql);
                $exec->bindParam(':email', $email);
                $exec->bindParam(':senha', $senha);
                $exec->execute();
                $users = $exec->fetchAll(PDO::FETCH_ASSOC);
                if(count($users) <= 0){
                echo "<script>alert('Erro ao logar');</script>";
                }else{
                    $user = $users[0];
                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nome'];  
                    echo "<script>alert('Logado com sucesso!');window.location ='../../view/usuario/Cadastrar.php';</script>";
                    
                }
           }catch(PDOException $erro){
               echo $erro->getMessage();
               echo "ERRO NO LOGIN ";
           }
        }
        function listarUsuarios(){
            $resultado = "SELECT * FROM usuario ORDER BY id ASC";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                $result[] = array(
                    'id' => $dados['id'],
                    'nome' => $dados['nome'],
                    'email' => $dados['email'],
                    'login' => $dados['login']
                );
            }

            return $result;
        }
    }
?>