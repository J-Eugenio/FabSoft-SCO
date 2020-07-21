<?php
    require_once '../../model/transporte/transporte_class.php';

    class transporte_DAO extends transporte_class{
        protected $tabela = 'transporte';

        public function findUnic($id){
            try {
                $sql = "SELECT * FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindParam(':id', $id, PDO::PARAM_INT);
                $exec->execute();
                return $exec->fecth(PDO::FETCH_ASSOC);
            } catch (PDOException $erro) {
                echo 'Erro ao buscar informação!!';
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

        public function insert(){
            try {
                $sql = "INSERT INTO $this->tabela(lugarSolicitado, motivoSolicitacao, dataConsulta, horarioConsulta, situacao, id_paciente, user_type) 
                        VALUES(:lugarSolicitado, :motivoSolicitacao, :dataConsulta, :horarioConsulta, :situacao, :id_paciente, :user_type)";
                $exec = DB::prepare($sql);
                $exec->bindValue(':lugarSolicitado', $this->getLugarSolicitado());
                $exec->bindValue(':motivoSolicitacao', $this->getMotivoSolicitacao());
                $exec->bindValue(':dataConsulta', $this->getDataConsulta());
                $exec->bindValue(':horarioConsulta', $this->getHorarioConsulta());
                $exec->bindValue(':situacao', $this->getSituacao());
                $exec->bindValue(':id_paciente', $this->getId_paciente());
                $exec->bindValue(':user_type', $this->getUser_type());
                echo "<script>window.location ='../../view/transporte/Cadastrar.php';</script>";
                return $exec->execute();

            } catch (PDOException $erro) {
                
            }
        }
        public function update(){
            try{
                $sql = "UPDATE $this->tabela SET situacao = :situacao WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                $exec->bindValue(':situacao', $this->getSituacao());

                echo "<script>window.location ='../../view/transporte/Cadastrar.php';</script>";
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
               echo "<script>window.location ='../../view/transporte/Cadastrar.php';</script>";

                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        function listarTransportes(){
            $result[] = null;
            $resultado = "SELECT * FROM $this->tabela ORDER BY id ASC";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                $result[] = array(
                    'id' => $dados['id'],
                    'lugarSolicitado' => $dados['lugarSolicitado'],
                    'motivoSolicitacao' => $dados['motivoSolicitacao'],
                    'dataConsulta' => $dados['dataConsulta'],
                    'horarioConsulta' => $dados['horarioConsulta'],
                    'situacao' => $dados['situacao'],
                    'user_type' => $dados['user_type'],
                    'id_paciente' => $dados['id_paciente']

                );
            }

            return $result;
        }
    }
?>