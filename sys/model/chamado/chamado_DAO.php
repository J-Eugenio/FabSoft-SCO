<?php

    require_once 'chamado_class.php';
    class chamado_DAO extends chamado_class{
        protected $tabela = 'chamado';

        public function findUnic($id){
            try {
                $sql = "SELECT * FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindParam(':id', $id, PDO::PARAM_INT);
                $exec->execute();
                return $exec->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $erro) {
                echo 'Erro ao buscar informação: '.$erro->getMessage();
            }
        }

        public function findAll(){
            try {
                $sql = "SELECT * FROM $this->tabela";
                $exec = DB::prepare($sql);
                $exec->execute();
                return $exec->fetchAll();
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }

        public function findAllMsg($id_chamada){
            try {
                $sql = "SELECT * FROM msg_chamado where id_chamada = :id_chamada";
                $exec = DB::prepare($sql);
                $exec->bindParam(':id_chamada', $id_chamada);
                $exec->execute();
                return $exec->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $erro) {
                echo $erro->getMessage();
            }
        }


        public function insert(){
            try{
                $sql = "INSERT INTO $this->tabela(
                    assunto,
                    data, 
                    hora, 
                    situacao, 
                    id_paciente,
                    user_type
                    ) VALUES (
                        :assunto, 
                        :data, 
                        :hora, 
                        :situacao, 
                        :id_paciente,
                        :user_type
                    )";
                $exec = DB::prepare($sql);
                $exec->bindValue(':assunto', $this->getAssunto());

                $exec->bindValue(':data', $this->getData());
                $exec->bindValue(':hora', $this->getHora());
                $exec->bindValue(':situacao', $this->getSituacao());
                $exec->bindValue(':id_paciente', $this->getId_paciente());
                $exec->bindValue(':user_type', $this->getUser_type());
                $exec->execute();
                $sql = "INSERT INTO msg_chamado(msg, id_chamada, user_type ) VALUES(:textoDoChamado, LAST_INSERT_ID(), :user_type)";
                $exec= DB::prepare($sql);
                $exec->bindValue(':textoDoChamado', $this->getTextoDoChamado());
                $exec->bindValue(':user_type', $this->getUser_type());
                echo "<script>window.location ='../../view/chamados/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){

            }
        }

        public function insertMsg($msg, $id_chamada, $user_type){
            try {
                $sql = "INSERT INTO msg_chamado ( msg, id_chamada, user_type ) VALUES (:msg, :id_chamada, :user_type)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':msg',$msg);
                $exec->bindParam(':id_chamada',$id_chamada);
                $exec->bindParam(':user_type', $user_type);
                $this->update();
                echo "<script>window.location ='../../view/chamados/Cadastrar.php';</script>";
                return $exec->execute();
            } catch (PDOException $erro) {
                
            }
        }

        public function update(){
            try{
                $sql = "UPDATE $this->tabela SET situacao = :situacao WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                $exec->bindValue(':situacao',$this->getSituacao());
                echo $this->getId();
                echo "<script>window.location ='../../view/chamados/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo "Erro".$erro->getMessage();
            }

        }

        public function delete(){
            try{
                $sql = "DELETE FROM msg_chamado WHERE id_chamada = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                $exec->execute();
                $sql = "DELETE FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                echo "<script>window.location ='../../view/chamados/Cadastrar.php';</script>";
                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }

        function listarChamados(){
            $result = [];
            $resultado = "SELECT * FROM $this->tabela";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            while($dados = $resultado->fetch(PDO::FETCH_UNIQUE)){
                $result[] = array(
                    'id' => $dados['id'],
                    'assunto' => $dados['assunto'],
                    'data' => $dados['data'],
                    'hora' => $dados['hora'],
                    'situacao' => $dados['situacao'],
                    'id_paciente' => $dados['id_paciente'],
                    'user_type' => $dados['user_type']
                );
            }
            return $result;
        }
    }
?>