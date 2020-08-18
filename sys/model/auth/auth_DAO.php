<?php

    require_once 'auth_class.php';

    class auth_DAO extends auth_class{
        protected $funcionario = 'funcionario';
        protected $paciente = 'paciente';
        
        public function autenticar(){
           try{
                $sqlFunc = "SELECT id,nome,cpf,senha,user_type FROM $this->funcionario 
                WHERE cpf = :cpf AND senha = :senha";

                $sqlPac = "SELECT id,nome,cpf,senha,user_type FROM $this->paciente 
                WHERE cpf = :cpf AND senha = :senha";
                
                $exec = DB::prepare($sqlFunc);
                $exec->bindValue(':cpf', $this->getCPF());
                $exec->bindValue(':senha', $this->getSenha());
                $exec->execute();
                $users = $exec->fetchAll(PDO::FETCH_ASSOC);
                if(count($users) <= 0){
                    $exec = DB::prepare($sqlPac);
                    $exec->bindValue(':cpf', $this->getCPF());
                    $exec->bindValue(':senha', $this->getSenha());
                    $exec->execute();
                    $users = $exec->fetchAll(PDO::FETCH_ASSOC);

                    if(count($users) <= 0){
                        echo "<script>window.location ='../../view/TelaLogin.php';</script>";
                    }else{
                        $user = $users[0];
                        session_start();
                        $_SESSION['logado'] = true;
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_name'] = $user['nome'];  
                        $_SESSION['user_type'] = $user['user_type'];  
                        echo "<script>window.location ='../../view/menu.php';</script>";
                    }
                }else{
                    $user = $users[0];
                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nome'];  
                    $_SESSION['user_type'] = $user['user_type'];  

                    echo "<script>window.location ='../../view/menu.php';</script>";
                    
                }
           }catch(PDOException $erro){
               echo $erro->getMessage();
           }
        }
    }
?>