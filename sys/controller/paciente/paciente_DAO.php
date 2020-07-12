<?php

    require_once '../../model/paciente/paciene_class.php';
    require '../../config/connect.php';

    class paciente_DAO extends paciente_class{
        protected $tabela = 'paciente';
        
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
        public function insert(){
            try{
                $sql = "INSERT INTO $this->tabela(cpf, senha, nome, dataNasc, sobrenome, sexo, escolaridade, email, telefone, numeroCardSUS, UnidadeDeSaude, dataDiagnostico, bairro, logradouro, pontoDeReferencia, zona, hospitalDeTratamento, user_type)
                VALUES (:cpf, :senha, :nome, :dataNasc, :sobrenome,:sexo, :escolaridade, :email, :telefone, :numeroCardSUS, :unidadeDeSaude, :dataDiagnostico, :bairro, :logradouro, :pontoDeReferencia, :zona, :hospitalDeTratamento, :user_type)";
                $exec = DB::prepare($sql);
                $exec->bindValue(':cpf',getCpf());
                $exec->bindValue(':senha',getSenha());
                $exec->bindValue(':nome',getNome());
                $exec->bindValue(':dataNasc',getDataNasc());
                $exec->bindValue(':sobrenome',getSobrenome());
                $exec->bindValue(':sexo',getSexo());
                $exec->bindValue(':escolaridade',getEscolaridade());
                $exec->bindValue(':email',getEmail());
                $exec->bindValue(':telefone',getTelefone());
                $exec->bindValue(':numeroCardSUS',getNumeroCardSus());
                $exec->bindValue(':unidadeDeSaude',getUnidadeDeSaude());
                $exec->bindValue(':dataDiagnostico',getDataDiagnostico());
                $exec->bindValue(':bairro',getBairro());
                $exec->bindValue(':logradouro',getLogradouro());
                $exec->bindValue(':pontoDeReferencia',getPontoDeReferencia());
                $exec->bindValue(':zona',getZona());
                $exec->bindValue(':hospitalDeTratamento',getHospitalDeTratamento());
                $exec->bindValue(':user_type',2);
                echo "<script>window.location ='../../view/paciente/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
               echo "Erro: ".$erro->getMessage();
            }
        }
        public function update(){
            try{
                $sql = "UPDATE $this->tabela SET 
                cpf = :cpf, 
                senha = :senha, 
                nome = :nome,
                dataNasc = :dataNasc,
                sobrenome = :sobrenome, 
                sexo = :sexo, 
                escolaridade = :escolaridade,
		        email = :email, 
                telefone= :telefone, 
                numeroCardSUS= :numeroCardSUS,
		        unidadeDeSaude= :unidadeDeSaude,
                dataDiagnostico= :dataDiagnostico,
		        bairro= :bairro, 
                logradouro= :logradouro, 
                pontoDeReferencia= :pontoDeReferencia,
		        zona= :zona, 
                hospitalDeTratamento= :hospitalDeTratamento
                WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                $exec->bindValue(':cpf', $this->getCpf());
                $exec->bindValue(':senha', $this->getSenha());
                $exec->bindValue(':nome',$this->getNome());
                $exec->bindValue(':dataNasc', $this->getDataNasc());
                $exec->bindValue(':sobrenome', $this->getSobrenome());
                $exec->bindValue(':sexo', $this->getSexo());
                $exec->bindValue(':escolaridade', $this->getEscolaridade());
                $exec->bindValue(':email', $this->getEmail());
                $exec->bindValue(':telefone', $this->getTelefone());
                $exec->bindValue(':numeroCardSUS', $this->getNumeroCardSUS());
                $exec->bindValue(':unidadeDeSaude', $this->getUnidadeDeSaude());
                $exec->bindValue(':dataDiagnostico', $this->getDataDiagnostico());
                $exec->bindValue(':bairro', $this->getBairro());
                $exec->bindValue(':logradouro', $this->getNumeroCardSUS());
                $exec->bindValue(':pontoDeReferencia', $this->getPontoDeReferencia());
                $exec->bindValue(':zona', $this->getZona());
                $exec->bindValue(':hospitalDeTratamento', $this->getHospitalDeTratamento());
                echo "<script>window.location ='../../view/paciente/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
                echo "Erro ".$erro->getMessage();
            }

        }
        public function delete(){
            try{
                $sql = "DELETE FROM $this->tabela WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $this->getId(), PDO::PARAM_INT);
                echo "<script>window.location ='../../view/paciente/Listar.php';</script>";

                return $exec->execute();
                
            }catch(PDOException $erro){
                echo $erro->getMessage();
            }
        }
        function listarFuncionarios(){
            $result[] = null;
            $resultado = "SELECT * FROM $this->tabela ORDER BY id ASC";
            $resultado = DB::prepare($resultado);
            $resultado->execute();
            while($dados = $resultado->fetch(PDO::FETCH_ASSOC)){
                $result[] = array(
                    'id' => $dados['id'],
                    'nome' => $dados['nome'],
                    'cpf' => $dados['cpf'],
                    'dataNasc' => $dados['dataNasc']
                );
            }

            return $result;
        }
    }
?>