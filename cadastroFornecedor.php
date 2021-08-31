<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container" style="margin-top: 40px; width:500px;">

        <center>
            <h3>Cadastro de fornecedor</h3>
        </center>

        <form action="_inserir_fornecedor.php" method="post" style="margin-top: 20px">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="fornecedor" placeholder="Insira o nome do fornecedor" autocomplete="off">
                        <label>Email</label>
                        <input type="email" class="form-control" name="fornecedor" placeholder="Insira o email" autocomplete="off">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="fornecedor" placeholder="Insira o telefone fixo" autocomplete="off">
                        <label>Celular</label>
                        <input type="text" class="form-control" name="fornecedor" placeholder="Insira o celular" autocomplete="off">
                        <label>Representante</label>
                        <input type="text" class="form-control" name="fornecedor" placeholder="Insira o representante" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label>CEP</label>
                        <input type="text" class="form-control" name="fornecedor" placeholder="Insira o CEP" autocomplete="off">
                        <label>Logradouro</label>
                        <input type="text" class="form-control" name="fornecedor" placeholder="Insira o logradouro" autocomplete="off">
                        <label>UF</label>
                        <input type="text" class="form-control" name="fornecedor" placeholder="Insira a UF" autocomplete="off">
                        <label>Bairro</label>
                        <input type="text" class="form-control" name="fornecedor" placeholder="Insira o  bairro" autocomplete="off">
                        <label>Cidade</label>
                        <input type="text" class="form-control" name="fornecedor" placeholder="Insira a cidade" autocomplete="off">
                        <label>Complemento</label>
                        <input type="text" class="form-control" name="fornecedor" placeholder="Insira o complemento" autocomplete="off">
                    </div>
                </div>
            </div>
            <div style="text-align: center;">
                <a href="#" role="button" class="btn btn-primary btn-sm">Voltar ao menu</a>
                <button type="submit" id="botao" class="btn btn-success btn-sm">Adicionar</button>
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