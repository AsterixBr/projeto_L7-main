<?php
include_once 'C:/xampp/htdocs/projetol7/DataBase/Conecta.php';
include_once 'C:/xampp/htdocs/projetol7/model/Produto.php';
include_once 'C:/xampp/htdocs/projetol7/model/Mensagem.php';
include_once 'C:/xampp/htdocs/projetol7/model/Fornecedor.php';
include_once 'C:/xampp/htdocs/projetol7/model/Marca.php';



class DaoProduto
{

    public function inserir(Produto $produto)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $nomeProduto = $produto->getNomeProduto();
            $categoria = $produto->getCategoria();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            $cor = $produto->getCor();
            $tamanho = $produto->getTamanho();
            $lote = $produto->getLote();
            $dtCompra = $produto->getDtCompra();
            $fornecedor = $produto->getFkFornecedor();
            $marca = $produto->getFkMarca();
            try {
                $stmt = $conecta->prepare("insert into produto values "
                    . "(null,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bindParam(1, $nomeProduto);
                $stmt->bindParam(2, $categoria);
                $stmt->bindParam(3, $cor);
                $stmt->bindParam(4, $tamanho);
                $stmt->bindParam(5, $vlrCompra);
                $stmt->bindParam(6, $vlrVenda);
                $stmt->bindParam(7, $qtdEstoque);
                $stmt->bindParam(8, $lote);
                $stmt->bindParam(9, $dtCompra);
                $stmt->bindParam(10, $fornecedor);
                $stmt->bindParam(11, $marca);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                    . "Dados Cadastrados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para atualizar dados da tabela produto
    public function atualizarProdutoDAO(Produto $produto)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            $id = $produto->getIdProduto();
            $nomeProduto = $produto->getNomeProduto();
            $categoria = $produto->getCategoria();
            $vlrCompra = $produto->getVlrCompra();
            $vlrVenda = $produto->getVlrVenda();
            $qtdEstoque = $produto->getQtdEstoque();
            $cor = $produto->getCor();
            $tamanho = $produto->getTamanho();
            $lote = $produto->getLote();
            $dtCompra = $produto->getDtCompra();
            $fornecedor = $produto->getFkFornecedor();
            $marca = $produto->getFkMarca();
            try {
                $stmt = $conecta->prepare("update produto set "
                    . "nomeProduto = ?,"
                    . "categoria = ?;"
                    . "cor = ?;"
                    . "tamanho = ?;"
                    . "vlrCompra = ?,"
                    . "vlrVenda = ?, "
                    . "qtdEstoque = ?, "
                    . "lote = ?;"
                    . "dtCompra = ?;"
                    . "FkFornecedor = ?; "
                    . "FkMarca = ?"
                    . "where idproduto = ?");
                $stmt->bindParam(1, $nomeProduto);
                $stmt->bindParam(2, $categoria);
                $stmt->bindParam(3, $cor);
                $stmt->bindParam(4, $tamanho);
                $stmt->bindParam(5, $vlrCompra);
                $stmt->bindParam(6, $vlrVenda);
                $stmt->bindParam(7, $qtdEstoque);
                $stmt->bindParam(8, $lote);
                $stmt->bindParam(9, $dtCompra);
                $stmt->bindParam(10, $fornecedor);
                $stmt->bindParam(11, $marca);
                $stmt->bindParam(12, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: blue;'>"
                    . "Dados atualizados com sucesso</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para carregar lista de produtos do banco de dados
    public function listarProdutosDAO()
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if ($conecta) {
            try {
                $rs = $conecta->query("SELECT * FROM produto inner join fornecedor 
                    . on produto.FkFornecedor = fornecedor.idFornecedor
                    . inner join marca on.produto.FkMarca = marca.idMarca
                    . order by produto.idproduto asc");
                $lista = array();
                $a = 0;
                $b = 0;
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $produto = new Produto();
                            $produto->setIdProduto($linha->idproduto);
                            $produto->setNomeProduto($linha->nomeProduto);
                            $produto->setCategoria($linha->categoria);
                            $produto->setCor($linha->cor);
                            $produto->setTamanho($linha->tamanho);
                            $produto->setVlrCompra($linha->vlrCompra);
                            $produto->setVlrVenda($linha->vlrVenda);
                            $produto->setQtdEstoque($linha->qtdEstoque);
                            $produto->setLote($linha->lote);
                            $produto->setDtCompra($linha->dtCompra);

                            $form = new Fornecedor();
                            $form->setIdfornecedor($linha->idFornecedor);
                            $form->setNomeFornecedor($linha->nomeFornecedor);
                            $form->setEmail($linha->email);
                            $form->setTellFixo($linha->tellfixo);
                            $form->setcell($linha->cell);
                            $form->setCep($linha->cep);
                            $form->setLogradouro($linha->logradouro);
                            $form->setUf($linha->UF);
                            $form->setBairro($linha->bairro);
                            $form->setCidade($linha->cidade);
                            $form->setComplemento($linha->complemento);
                            $form->setRepresentante($linha->representante);
                            $produto->setFkFornecedor($form);

                            $lista[$a] = $produto;
                            $a++;

                            $form1 = new Marca();
                            $form1->setIdMarca($linha->idMarca);
                            $form1->setNomeMarca($linha->nomeMarca);
                            $form1->setRepresentante($linha->representante);
                            $form1->setEmailRepresentante($linha->emailRepresetante);
                            $produto->setFkMarca($form1);

                            $lista2[$b] = $produto;
                            $b++;

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

    //método para excluir produto na tabela produto
    public function excluirProdutoDAO($id)
    {
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if ($conecta) {
            try {
                $stmt = $conecta->prepare("delete from produto "
                    . "where idproduto = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                    . "Dados excluídos com sucesso.</p>");
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
        } else {
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>");
        }
        $conn = null;
        return $msg;
    }

    //método para os dados de produto por id
    public function pesquisarProdutoIdDAO($id)
    {
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $produto = new Produto();
        if ($conecta) {
            try {
                $rs = $conecta->prepare("SELECT * FROM produto inner join fornecedor 
                . on produto.FkFornecedor = fornecedor.idFornecedor
                . inner join marca on.produto.FkMarca = marca.idMarca
                . order by produto.idproduto asc");
                $rs->bindParam(1, $id);
                if ($rs->execute()) {
                    if ($rs->rowCount() > 0) {
                        while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                            $produto->setIdProduto($linha->idproduto);
                            $produto->setNomeProduto($linha->nomeProduto);
                            $produto->setCategoria($linha->categoria);
                            $produto->setCor($linha->cor);
                            $produto->setTamanho($linha->tamanho);
                            $produto->setVlrCompra($linha->vlrCompra);
                            $produto->setVlrVenda($linha->vlrVenda);
                            $produto->setQtdEstoque($linha->qtdEstoque);
                            $produto->setLote($linha->lote);
                            $produto->setDtCompra($linha->dtCompra);

                            $form = new Fornecedor();
                            $form->setIdfornecedor($linha->idFornecedor);
                            $form->setNomeFornecedor($linha->nomeFornecedor);
                            $form->setEmail($linha->email);
                            $form->setTellFixo($linha->tellfixo);
                            $form->setcell($linha->cell);
                            $form->setCep($linha->cep);
                            $form->setLogradouro($linha->logradouro);
                            $form->setUf($linha->UF);
                            $form->setBairro($linha->bairro);
                            $form->setCidade($linha->cidade);
                            $form->setComplemento($linha->complemento);
                            $form->setRepresentante($linha->representante);
                            $produto->setFkFornecedor($form);

                            $form1 = new Marca();
                            $form1->setIdMarca($linha->idMarca);
                            $form1->setNomeMarca($linha->nomeMarca);
                            $form1->setRepresentante($linha->representante);
                            $form1->setEmailRepresentante($linha->emailRepresetante);
                            $produto->setFkMarca($form1);
                        }
                    }
                }
            } catch (Exception $ex) {
                $msg->setMsg($ex);
            }
            $conn = null;
        } else {
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../projetol7/cadastroProduto.php'\">";
        }
        return $produto;
    }
}
