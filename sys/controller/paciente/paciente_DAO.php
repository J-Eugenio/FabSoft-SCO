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
        public function insert($cpf, $senha, $nome, $DataNasc, $idade, $sexo, $escolaridade, $email,$telefone,$numeroCardSUS,$unidadeDeSaude,$dataDiagnostico,$bairro,$logradouro,$pontoDeReferencia,$zona,$hospitalDeTratamento){
            try{
                $sql = "INSERT INTO $this->tabela(cpf, senha, nome, dataNasc,idade, sexo, escolaridade, email, telefone, numeroCardSUS, UnidadeDeSaude, dataDiagnostico, bairro, logradouro, pontoDeReferencia, zona, hospitalDeTratamento, user_type)
                VALUES (:cpf, :senha, :nome, :dataNasc,:idade, :sexo, :escolaridade, :email, :telefone, :numeroCardSUS, :unidadeDeSaude, :dataDiagnostico, :bairro, :logradouro, :pontoDeReferencia, :zona, :hospitalDeTratamento, :user_type)";
                $exec = DB::prepare($sql);
                $exec->bindParam(':cpf',$cpf);
                $exec->bindParam(':senha',$senha);
                $exec->bindParam(':nome',$nome);
                $exec->bindParam(':dataNasc',$DataNasc);
                $exec->bindParam(':idade',$idade);
                $exec->bindParam(':sexo',$sexo);
                $exec->bindParam(':escolaridade',$escolaridade);
                $exec->bindParam(':email',$email);
                $exec->bindParam(':telefone',$telefone);
                $exec->bindParam(':numeroCardSUS',$numeroCardSUS);
                $exec->bindParam(':unidadeDeSaude',$unidadeDeSaude);
                $exec->bindParam(':dataDiagnostico',$dataDiagnostico);
                $exec->bindParam(':bairro',$bairro);
                $exec->bindParam(':logradouro',$logradouro);
                $exec->bindParam(':pontoDeReferencia',$pontoDeReferencia);
                $exec->bindParam(':zona',$zona);
                $exec->bindParam(':hospitalDeTratamento',$hospitalDeTratamento);
                $exec->bindValue(':user_type',2);
                echo "<script>alert('Paciente cadastrado com sucesso!!');window.location ='../../view/paciente/Cadastrar.php';</script>";
                return $exec->execute();
            }catch(PDOException $erro){
               echo "Erro: ".$erro->getMessage();
            }
        }
        public function update($id){
            try{
                $sql = "UPDATE $this->tabela SET cpf = :cpf, senha = :senha, nome = :nome,
                dataNasc = :dataNasc, idade = :idade, sexo = :sexo, escolaridade = :escolaridade,
		        email = :email, telefone= :telefone, numeroCardSus= :numeroCardsus,
		        unidadeDeSaude= :unidadeDeSaude, dataDiagnostico= :dataDiagnostico,
		        bairro= :bairro, logradouro= :logradouro, pontoDeReferencia= :pontoDeReferencia
		        zona= :zona, hospitalDeTratamento= :hospitalDeTratamento WHERE id = :id";
                $exec = DB::prepare($sql);
                $exec->bindValue(':id', $id, PDO::PARAM_INT);
                $exec->bindValue(':cpf', $this->getCpf());
                $exec->bindValue(':senha', $this->getSenha());
                $exec->bindValue(':nome',$this->getNome());
                $exec->bindValue(':dataNasc', $this->getDataNasc());
                $exec->bindValue(':idade', $this->getIdade());
                $exec->bindValue(':sexo', $this->getSexo());
                $exec->bindValue(':$escolaridade;', $this->getEscolaridade());
                $exec->bindValue(':email', $this->getEmail());
                $exec->bindValue(':telefone', $this->getTelefone());
                $exec->bindValue(':numeroCardSUS', $this->getNumeroCardSUS());
                $exec->bindValue(':unidadeDeSaude', $this->getUnidadeDeSaude());
                $exec->bindValue(':dataDiagnostico', $this->getDataDiagnostico());
                $exec->bindValue(':bairro', $this->getBairro());
                $exec->bindValue(':logradouro', $this->getNumeroCardSUS());
                $exec->bindValue(':pontoDeReferecia', $this->getPontoDeReferencia());
                $exec->bindValue(':zona', $this->getZona());
                $exec->bindValue(':hospitalDeTratamento', $this->getHospitalDeTratamento());
                echo "<script>alert('Funcionario atualizado com sucesso!!');window.location ='../../view/paciente/Cadastrar.php';</script>";
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
                echo "<script>alert('Paciente deletado com sucesso!!');window.location ='../../view/paciente/Listar.php';</script>";

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