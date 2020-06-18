<?php

    require_once '../../model/auth/auth_class.php';

    class auth_DAO extends auth_class{
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
                        echo "<script>alert('Erro ao logar');window.location ='../../view/TelaLogin.php';</script>";
                    }else{
                        echo "<script>alert('Logado com sucesso!');window.location ='../../view/menu.php';</script>";
                    }
                }else{
                    $user = $users[0];
                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nome'];  
                    echo "<script>alert('Logado com sucesso!');window.location ='../../view/menu.php';</script>";
                    
                }
           }catch(PDOException $erro){
               echo $erro->getMessage();
               echo "ERRO NO LOGIN ";
           }
        }
    }
?>