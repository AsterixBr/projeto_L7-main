<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Marca</title>
</head>
<body>
    <div class="container" style="margin-top: 40px; width:500px;">
        <center>
            <h3>Marca do Produto</h3>
        </center>
        <form action="_inserir_fornecedor.php" method="post" style="margin-top: 20px">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="name" placeholder="Insira o nome da marca" autocomplete="off">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Insira o email" autocomplete="off">
                <label>Representante</label>
                <input type="text" class="form-control" name="representante" placeholder="Insira o representante" autocomplete="off">
            </div>
            <div style="text-align: center;">
                <a href="#" role="button" class="btn btn-primary btn-sm">Voltar ao menu</a>
                <button type="submit" id="botao" class="btn btn-success btn-sm">Adicionar</button>
            </div>
        </form>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive" style="border-radius: 3px; overflow:hidden;">
                        <thead class="table-dark">
                            <tr>
                                <th>Código</th>
                                <th>Marca</th>
                                <th>Representante</th>
                                <th>E-Mail</th>
                                <th colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fcTable = new MarcaController();
                            $listaMarcas = $fcTable->listarMarcas();
                            $a = 0;
                            if ($listaMarcas != null) {
                                foreach ($listaMarcas as $lf) {
                                    $a++;
                            ?>
                                    <tr>
                                        <td><?php print_r($lf->getIdMarca()); ?></td>
                                        <td><?php print_r($lf->getNomeMarca()); ?></td>
                                        <td><?php print_r($lf->getRepresentante()); ?></td>
                                        <td><?php print_r($lf->getEmailRepresentante()); ?></td>
                                     
                                        <td><a href="marca.php?id=<?php echo $lf->getIdMarca(); ?>" class="btn btn-light">
                                                atualizar</a>
                                            </form>
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a; ?>">
                                                excluir</button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $a; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="">
                                                        <label><strong>Deseja excluir o marca
                                                                <?php echo $lf->getNomeMarca(); ?>?</strong></label>
                                                        <input type="hidden" name="ide" value="<?php echo $lf->getIdMarca(); ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="excluir" class="btn btn-primary">Sim</button>
                                                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>
</html>