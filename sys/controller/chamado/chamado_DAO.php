<?php

    require_once '../../model/chamado/chamado_class.php';
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

        public function insert(){
            try{
                $sql = "INSERT INTO $this->tabela(
                    assunto, 
                    textoDoChamado, 
                    data, 
                    hora, 
                    situacao, 
                    id_paciente,
                    user_type
                    ) VALUES (
                        :assunto, 
                        :textoDoChamado, 
                        :data, 
                        :hora, 
                        :situacao, 
                        :id_paciente,
                        :user_type
                    )";
                $exec = DB::prepare($sql);
                $exec->bindValue(':assunto', $this->getAssunto());
                $exec->bindValue(':textoDoChamado', $this->getTextoDoChamado());
                $exec->bindValue(':data', $this->getData());
                $exec->bindValue(':hora', $this->getHora());
                $exec->bindValue(':situacao', $this->getSituacao());
                $exec->bindValue(':id_paciente', $this->getId_paciente());
                $exec->bindValue(':user_type', $this->getUser_type());
                echo "<script>window.location ='../../view/chamados/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){

            }
        }

        public function update(){
            try{
                $sql = "UPDATE $this->tabela SET situacao = :situacao WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                $exec->bindValue(':situacao',$this->getSituacao());
                echo "<script>window.location ='../../view/chamados/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo "Erro".$erro->getMessage();
            }

        }

        public function delete(){
            try{
                $sql = "DELETE FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                echo "<script>window.location ='../../view/chamados/Cadastrar.php';</script>";
                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }

        function listarServices(){
            $result[] = null;
            $resultado = "SELECT * FROM $this->tabela ORDER BY id ASC";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                $result[] = array(
                    'id' => $dados['id'],
                    'assunto' => $dados['assunto'],
                    'textoDoChamado' => $dados['textoDoChamado'],
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