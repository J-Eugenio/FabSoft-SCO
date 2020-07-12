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
                $sql = "INSERT INTO $this->tabela VALUES('')";
                $exec = DB::prepare($sql);
                $exec->bindValue('');
                return $exec->execute();

            } catch (PDOException $erro) {
                
            }
        }
    }
?>