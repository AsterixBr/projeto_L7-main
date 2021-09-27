<?php
include_once 'controller/ProdutoController.php';
include_once './model/Produto.php';
include_once './model/Fornecedor.php';
include_once './model/Mensagem.php';
include_once 'controller/FornecedorController.php';
$fcc = new FornecedorController();
$msg = new Mensagem();
$pr = new Produto();
$fornecedor = new Fornecedor();
$pr->setFkFornecedor($fornecedor);
$btEnviar = FALSE;
$btAtualizar = FALSE;
$btExcluir = FALSE;
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produtos</title>
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

  <style>
    #container {
      width: 500px;
    }
  </style>

</head>
<header style="color: white;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ml-5">
    <div class="container-fluid">
      <a href="#" class="navbar-brand">L7 Grifes</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse show" id="navbarCollapse" style>
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a href="#" class="nav-link">Produtos</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Carrinho</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"></a>
          </li>
        </ul>
        <div>
          <a href="Login.html" class="animated-button1">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            LOGIN/CADASTRO
          </a>
        </div>
      </div>
    </div>
  </nav>
</header>

<body>
  <div class="container" style="margin-top: 40px" id="container">

    <h3>Cadastro de produto</h3>

    <form action="_inserir_produto.php" method="post" style="margin-top: 20px">
      <div class="form-group">
        <div class="row">
          <div class="col-md-6">
          <?php
                        //envio dos dados para o BD
                        if (isset($_POST['cadastrarProduto
                        '])) {
                            $nomeProduto = trim($_POST['nomeProduto']);
                            if ($nomeProduto != "") {
                                $categoria = $_POST['categoria'];
                                $cor = $_POST['cor'];
                                $tamanho = $_POST['tamanho'];
                                $vlrCompra = $_POST['vlrcompra'];
                                $vlrVenda = $_POST['vlrvenda'];   
                                $qtdEstoque = $_POST['quantidade'];   
                                $lote = $_POST['lote'];   
                                $dtCompra = $_POST['dtcompra'];   
                                $FkFornecedor = $_POST['fornecedor'];   
                                $FkMarca = $_POST['marca'];          
                                if(isset($_FILES['imagem']) && basename($_FILES["imagem"]["name"]) != ""){
                                    $target_dir = "img/";
                                    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
                                    $imagem = $target_file;
                                    $uploadOk = 1;
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                    // Check if image file is a actual image or fake image
                                    $check = getimagesize($_FILES["imagem"]["tmp_name"]);
                                    if($check !== false) {
                                            $uploadOk = 1;
                                    } else {
                                            $msg->setMsg("File is not an image.");
                                            $uploadOk = 0;
                                    }

                                    // Check if file already exists
                                    if (file_exists($target_file)) {
                                        $imagem = $target_file;
                                        $uploadOk = 0;
                                    }

                                    // Check file size
                                    if ($_FILES["imagem"]["size"] > 500000) {
                                            $msg->setMsg("O arquivo excedeu o limite do tamanho permitido (500KB).");
                                            $uploadOk = 0;
                                    }

                                    // Allow certain file formats
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                       && $imageFileType != "jfif" && $imageFileType != "gif" ) {
                                            $msg->setMsg("A extensão da imagem deve ser JPG, JPEG, PNG & "
                                                    . "GIF.");
                                            $uploadOk = 0;
                                    }

                                    // Check if $uploadOk is set to 0 by an error
                                    if ($uploadOk == 0) {
                                            $msg->setMsg("A imagem não foi gravada.");
                                    // if everything is ok, try to upload file
                                    } else {
                                        move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
                                    }
                                }else{
                                   
                                   $imagem = "img/semImagem.jpg";
                                }
                                $pc = new ProdutoController();
                                unset($_POST['cadastrarProduto']);
                                $msg = $pc->inserirProduto($categoria, $nomeProduto, 
                                $cor, $tamanho, $vlrCompra, $vlrVenda, $qtdEstoque, $lote, $dtCompra, $FkFornecedor, $FkMarca);
                                
                                echo $msg->getMsg();
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroProduto.php'\">";
                            }
                        }
                        
                        //método para atualizar dados do produto no BD
                        if (isset($_POST['atualizarProduto'])) {
                            $nomeProduto = trim($_POST['nomeProduto']);
                            if ($nomeProduto != "") {
                                $idProduto = $_POST['idproduto'];
                                $categoria = $_POST['categoria'];
                                $cor = $_POST['cor'];
                                $tamanho = $_POST['tamanho'];
                                $vlrCompra = $_POST['vlrcompra'];
                                $vlrVenda = $_POST['vlrvenda'];   
                                $qtdEstoque = $_POST['quantidade'];   
                                $lote = $_POST['lote'];   
                                $dtCompra = $_POST['dtcompra'];   
                                $FkFornecedor = $_POST['fornecedor'];   
                                $FkMarca = $_POST['marca'];        
                                $img =  $_POST['img'];
                                if(isset($_FILES['imagem']) && basename($_FILES["imagem"]["name"]) != ""){
                                    $target_dir = "img/";
                                    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
                                    $imagem = $target_file;
                                    $uploadOk = 1;
                                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                    // Check if image file is a actual image or fake image
                                    $check = getimagesize($_FILES["imagem"]["tmp_name"]);
                                    if($check !== false) {
                                            $uploadOk = 1;
                                    } else {
                                            $msg->setMsg("File is not an image.");
                                            $uploadOk = 0;
                                    }

                                    // Check if file already exists
                                    if (file_exists($target_file)) {
                                        $imagem = $target_file;
                                        $uploadOk = 0;
                                    }

                                    // Check file size
                                    if ($_FILES["imagem"]["size"] > 500000) {
                                            $msg->setMsg("O arquivo excedeu o limite do tamanho permitido (500KB).");
                                            $uploadOk = 0;
                                    }

                                    // Allow certain file formats
                                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                       && $imageFileType != "jfif" && $imageFileType != "gif" ) {
                                            $msg->setMsg("A extensão da imagem deve ser JPG, JPEG, PNG & "
                                                    . "GIF.");
                                            $uploadOk = 0;
                                    }

                                    // Check if $uploadOk is set to 0 by an error
                                    if ($uploadOk == 0) {
                                        $imagem = "img/semImagem.jpg";
                                    // if everything is ok, try to upload file
                                    } else {
                                        move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file);
                                    }
                                }else{
                                   if($img != "img/semImagem.jpg"){
                                       $imagem = $img;
                                   }else{
                                        $imagem = "img/semImagem.jpg";
                                   }
                                }
                                $pc = new ProdutoController();
                                unset($_POST['atualizarProduto']);
                                $msg = $pc->atualizarProduto($idProduto, $categoria, $nomeProduto, 
                                $cor, $tamanho, $vlrCompra, $vlrVenda, $qtdEstoque, $lote, $dtCompra, $FkFornecedor, $FkMarca);
                                echo $msg->getMsg();
                                $pr = null;
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroProduto.php'\">";
                            }
                        }
                        
                        if (isset($_POST['excluir'])) {
                            if ($pr != null) {
                                $id = $_POST['ide'];
                                
                                $pc = new ProdutoController();
                                unset($_POST['excluir']);
                                $msg = $pc->excluirProduto($id);
                                echo $msg->getMsg();
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroProduto.php'\">";
                            }
                        }
                        
                        if (isset($_POST['excluirProduto'])) {
                            if ($pr != null) {
                                $id = $_POST['idproduto'];
                                unset($_POST['excluirProduto']);
                                $pc = new ProdutoController();
                                $msg = $pc->excluirProduto($id);
                                echo $msg->getMsg();
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastroProduto.php'\">";
                            }
                        }

                        if (isset($_POST['limpar'])) {
                            $pr = null;
                            unset($_GET['id']);
                            header("Location: cadastroProduto.php");
                        }
                        if (isset($_GET['id'])) {
                            $btEnviar = TRUE;
                            $btAtualizar = TRUE;
                            $btExcluir = TRUE;
                            $id = $_GET['id'];
                            $pc = new ProdutoController();
                            $pr = $pc->pesquisarProdutoId($id);
                        }
                        ?>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Código: <label style="color:red;">
                                            <?php
                                            if ($pr != null) {
                                                echo $pr->getIdProduto();
                                                ?>
                                            </label></strong>
                                        <input type="hidden" name="idproduto" 
                                               value="<?php echo $pr->getIdProduto(); ?>">
                                        <input type="hidden" name="img" 
                                               value="<?php echo $pr->getImagem(); ?>">
                                        <br>
                                        
                                               <?php
                                           }
                                           ?>  

            <label>Nome do produto</label>
            <input type="text" class="form-control" name="nomeproduto" placeholder="Insira o nome do produto" autocomplete="off"value="<?php echo $pr->getNomeProduto(); ?>">
            <label>Cor</label>
            <input type="text" class="form-control" value="<?php echo $pr->getCor(); ?>name="cor" placeholder="Insira a cor do produto" autocomplete="off">
            <label>Tamanho</label>
            <input type="number" class="form-control"value="<?php echo $pr->getTamanho(); ?> name="tamanho" placeholder="Insira o tamanho do produto" autocomplete="off">
            <label>Quantidade</label>
            <input type="number" class="form-control" value="<?php echo $pr->getQtdEstoque(); ?> name="quantidade" placeholder="Insira a quantidade do produto" autocomplete="off">
          </div>
          <div class="col-md-6">
            <label>Valor da Compra</label>
            <input type="number" class="form-control"  value="<?php echo $pr->getVlrCompra(); ?> name="vlrcompra" placeholder="Insira o valor da compra" autocomplete="off">
            <label>Valor da Venda</label>
            <input type="number" class="form-control"  value="<?php echo $pr->getVlrVenda(); ?> name="vlrvenda" placeholder="Insira o valor da venda" autocomplete="off">
            <label>Lote</label>
            <input type="text" class="form-control" value="<?php echo $pr->getLote(); ?> name="lote" placeholder="Insira o lote" autocomplete="off">
            <label>Data da Compra</label>
            <input type="date" class="form-control" value="<?php echo $pr->getDtCompra(); ?> name="dtcompra" placeholder="Insira a data da compra" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="form-group">
        </select>
      </div>
      <div class="form-group">
        <label>Marca</label>
        <select class="form-control" name="marca" placeholder="Escolha a marca" autocomplete="off"value="<?php echo $pr->getFkMarca(); ?>>
        </select>
        <div class="form-group">
          <label>Fornecedor</label>
          <select class="form-control" name="fornecedor">

          </select>
        </div>
        <br>
        <div style="text-align: center;">
          <a href="#" role="button" class="btn btn-primary btn-sm">Voltar ao menu</a>
          <button type="submit" id="botao" class="btn btn-success btn-sm">Cadastrar</button>
        </div>
    </form>
  </div>

  <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>