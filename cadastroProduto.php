<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produtos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <style>
    #container {
      width: 500px;
    }
  </style>

</head>

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
      <div style="text-align: center;">
        <a href="#" role="button" class="btn btn-primary btn-sm">Voltar ao menu</a>
        <button type="submit" id="botao" class="btn btn-success btn-sm">Cadastrar</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

</body>

</html>