<!DOCTYPE html>
<html lang="en">

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

            <label>Nome do produto</label>
            <input type="text" class="form-control" name="nomeproduto" placeholder="Insira o nome do produto" autocomplete="off">
            <label>Cor</label>
            <input type="text" class="form-control" name="cor" placeholder="Insira a cor do produto" autocomplete="off">
            <label>Tamanho</label>
            <input type="number" class="form-control" name="tamanho" placeholder="Insira o tamanho do produto" autocomplete="off">
            <label>Quantidade</label>
            <input type="number" class="form-control" name="quantidade" placeholder="Insira a quantidade do produto" autocomplete="off">
          </div>
          <div class="col-md-6">
            <label>Valor da Compra</label>
            <input type="number" class="form-control" name="vlrcompra" placeholder="Insira o valor da compra" autocomplete="off">
            <label>Valor da Venda</label>
            <input type="number" class="form-control" name="vlrvenda" placeholder="Insira o valor da venda" autocomplete="off">
            <label>Lote</label>
            <input type="text" class="form-control" name="lote" placeholder="Insira o lote" autocomplete="off">
            <label>Data da Compra</label>
            <input type="date" class="form-control" name="dtcompra" placeholder="Insira a data da compra" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="form-group">
        </select>
      </div>
      <div class="form-group">
        <label>Marca</label>
        <select class="form-control" name="marca" placeholder="Escolha a marca" autocomplete="off">
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