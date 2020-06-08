<?php

    require_once '../../model/usuario/usuario_class.php';

    class usuario_DAO extends usuario_class{
        protected $funcionario = 'funcionario';
        protected $paciente = 'paciente';
        
        public function autenticar($cpf,$senha){
           try{
                $sqlFunc = "SELECT id,nome,cpf,senha FROM $this->funcionario 
                WHERE cpf = :cpf AND senha = :senha";
                $sqlPac = "SELECT id,nome,cpf,senha FROM $this->paciente 
                WHERE cpf = :cpf AND senha = :senha";
                $exec = DB::prepare($sqlFunc);
                $exec->bindParam(':cpf', $cpf);
                $exec->bindParam(':senha', $senha);
                $exec->execute();
                $users = $exec->fetchAll(PDO::FETCH_ASSOC);
                if(count($users) <= 0){
                    $exec = DB::prepare($sqlPac);
                    $exec->bindParam(':cpf', $cpf);
                    $exec->bindParam(':senha', $senha);
                    $exec->execute();
                    $users = $exec->fetchAll(PDO::FETCH_ASSOC);

                    if(count($users) <= 0){
                        echo "<script>alert('Erro ao logar');</script>";
                    }else{
                        echo "<script>alert('Logado com sucesso!');window.location ='../../view/funcionario/Cadastrar.php';</script>";
                    }
                }else{
                    $user = $users[0];
                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nome'];  
                    echo "<script>alert('Logado com sucesso!');window.location ='../../view/funcionario/Cadastrar.php';</script>";
                    
                }
           }catch(PDOException $erro){
               echo $erro->getMessage();
               echo "ERRO NO LOGIN ";
           }
        }
    }
?>