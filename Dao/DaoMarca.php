<?php

class DaoMarca{
    public function inserir(Marca $marca){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $nomeMarca = $marca->getNomeMarca();
            $representante = $marca->getRepresentante();
            $emailRepresentante = $marca->getEmailRepresentante();
            try {
                $stmt = $conecta->prepare("insert into marca values "
                        . "(null,?,?,?)");
                $stmt->bindParam(1, $nomeMarca);
                $stmt->bindParam(2, $representante);
                $stmt->bindParam(3, $emailRepresentante);
               
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    public function atualizarMarcaDAO(Marca $marca){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $idmarca = $marca->getIdMarca();
            $nomeMarca = $marca->getNomeMarca();
            $representante = $marca->getRepresentante();
            $emailRepresentante = $marca->getEmailRepresentante();
         
            try{
                $stmt = $conecta->prepare("update marca set "
                        . "nomeMarca = ?,"
                        . "representante = ?,"
                        . "emailRepresentante = ? "
                        . "where idMarca = ?");
                        $stmt->bindParam(1, $nomeMarca);
                        $stmt->bindParam(2, $representante);
                        $stmt->bindParam(3, $emailRepresentante);
                        $stmt->bindParam(4, $idmarca);
                $stmt->execute();
                $msg->setMsg("<p style='color: blue;'>"
                        . "Dados atualizados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    public function listarMarcasDAO(){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            try {
                $rs = $conecta->query("select * from marca");
                $lista = array();
                $a = 0;
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $marca = new Marca();
                            $marca->setIdMarca($linha->idMarca);
                            $marca->setNomeMarca($linha->nomeMarca);
                            $marca->setRepresentante($linha->representante);
                            $marca->setEmailRepresentante($linha->emailRepresentante);
                            $lista[$a] = $marca;
                            $a++;
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }  
            $conn = null;           
            return $lista;
        }
    }

    public function excluirMarcaDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if($conecta){
             try {
                $stmt = $conecta->prepare("delete from marca "
                        . "where idMarca = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                        . "Dados excluídos com sucesso.</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        }else{
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>"); 
        }
        $conn = null;
        return $msg;
    }

    public function pesquisarMarcaIdDAO($id){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $marca = new Marca();
        if($conecta){
            try {
                $rs = $conecta->prepare("select * from marca where "
                        . "idMarca = ?");
                $rs->bindParam(1, $id);
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $marca->setIdMarca($linha->idMarca);
                            $marca->setNomeMarca($linha->nomeMarca);
                            $marca->setRepresentante($linha->representante);   
                            $marca->setEmailRepresentante($linha->emailRepresentante);
                       
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }  
            $conn = null;
        }else{
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../PHPMatutinoPDO/Marca.php'\">"; 
        }
        return $marca;
    }
}