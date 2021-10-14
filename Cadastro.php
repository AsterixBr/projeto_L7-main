<?php
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .btInput {
            padding: 10px 20px 10px 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
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
                            <a href="#" class="nav-link">Contato</a>
                        </li>
                    </ul>
                    <div>
                        <a href="#" class="animated-button1">
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

    <div class="container-fluid">
        <div class="row" style="margin-top: 30px;">
            <div class="col-8 offset-2">
            
                <div class="card-header bg-dark text-center text-white border" style="padding-bottom: 15px; padding-top: 15px;" >
                    Cadastro de Cliente
                </div>
                <div class="card-body border">
                        <?php
                        //envio dos dados para o BD
                        if (isset($_POST['cadastrarPessoa'])) {
                            $nome = trim($_POST['nome']);
                            if ($nome != "") {
                                $dtNascimento = $_POST['dtNascimento'];
                                $email = $_POST['email'];
                                $senha = $_POST['senha'];
                                $perfil = $_POST['perfil'];
                                $cpf = $_POST['cpf'];
                                $FkEndereco = $_POST['FkEndereco'];
                                $cep = $_POST['cep'];
                                $logradouro = $_POST['logradouro'];
                                $numero = $_POST['numero'];
                                $complemento = $_POST['complemento'];
                                $bairro = $_POST['bairro'];
                                $cidade = $_POST['cidade'];
                                $uf = $_POST['uf'];

                                $fc = new PessoaController();
                                unset($_POST['cadastrarPessoa']);
                                $msg = $fc->inserirPessoa($nome, $dtNascimento, 
                                    $email, $senha, $perfil, $cpf, $FkEndereco,
                                    $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $uf);
                                echo $msg->getMsg();
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";
                            }
                        }
                        
                        //método para atualizar dados do produto no BD
                        if (isset($_POST['atualizarPessoa'])) {
                            $nome = trim($_POST['nome']);
                            if ($nome != "") {
                                $idpessoa = $_POST['idPessoa'];
                                $dtNascimento = $_POST['dtNascimento'];
                                $email = $_POST['email'];
                                $senha = $_POST['senha'];
                                $perfil = $_POST['perfil'];
                                $cpf = $_POST['cpf'];
                                $FkEndereco = $_POST['FkEndereco'];
                                $cep = $_POST['cep'];
                                $logradouro = $_POST['logradouro'];
                                $numero = $_POST['numero'];
                                $complemento = $_POST['complemento'];
                                $bairro = $_POST['bairro'];
                                $cidade = $_POST['cidade'];
                                $uf = $_POST['uf'];

                                $fc = new PessoaController();
                                unset($_POST['atualizarPessoa']);
                                $msg = $fc->atualizarPessoa($idpessoa, $nome, $dtNascimento, 
                                $email, $senha, $perfil, $cpf, $FkEndereco,
                                $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $uf);
                                echo $msg->getMsg();
                                /*echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";*/
                            }
                        }
                        
                        if (isset($_POST['excluir'])) {
                            if ($pe != null) {
                                $id = $_POST['ide'];
                                
                                $fc = new PessoaController();
                                unset($_POST['excluir']);
                                $msg = $fc->excluirPessoa($id);
                                echo $msg->getMsg();
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";
                            }
                        }
                        
                        if (isset($_POST['excluirPessoa'])) {
                            if ($pe != null) {
                                $id = $_POST['idpessoa'];
                                unset($_POST['excluirPessoa']);
                                $fc = new PessoaController();
                                $msg = $fc->excluirPessoa($id);
                                echo $msg->getMsg();
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"2;
                                    URL='cadastro.php'\">";
                            }
                        }

                        if (isset($_POST['limpar'])) {
                            $pe = null;
                            unset($_GET['id']);
                            header("Location: cadastro.php");
                        }
                        if (isset($_GET['id'])) {
                            $btEnviar = TRUE;
                            $btAtualizar = TRUE;
                            $btExcluir = TRUE;
                            $id = $_GET['id'];
                            $fc = new PessoaController();
                            $pe = $fc->pesquisarPessoaId($id);
                        }
                        ?>
                <div class="card-header bg-light  border" style="padding-bottom: 15px; padding-top: 15px;" >
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Código: </label> <br>
                                <label>Nome Completo</label>
                                <input class="form-control" type="text" name="nome">
                                <label>Data de Nascimento</label>
                                <input class="form-control" type="date" name="dtNasc">
                                <label>CPF</label>
                                <label id="valCpf" style="color: red; font-size: 11px;"></label>
                                <input class="form-control" type="text" id="cpf" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" onblur="return validaCpfCnpj();" name="cpf" required="required">
                                <br>
                                <label>E-Mail</label>
                                <input class="form-control" type="email" name="email">
                                <label>Senha</label>
                                <input class="form-control" type="password" name="senha">
                                <label>Conf. Senha</label>
                                <input class="form-control" type="password" name="senha2">
                                <label>CEP</label><br>
                                <input class="form-control" type="text" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" value="" name="cep">
                                <label>Logradouro</label>
                                <input type="text" class="form-control" name="logradouro" id="rua" value="">
                                <label>Complemento</label>
                                <input type="text" class="form-control" name="complemento" id="complemento">
                                <label>Bairro</label>
                                <input type="text" class="form-control" name="bairro" id="bairro" value="">
                                <label>Cidade</label>
                                <input type="text" class="form-control" name="cidade" id="cidade" value="">
                                <label>UF</label>
                                <input type="text" class="form-control" name="uf" id="uf" value="" maxlength="100">
                                <label>Perfil</label> 
                                    <label id="valCep" style="color: red; font-size: 11px;"></label>
                                    <select class="form-select" name="perfil">
                                        <option>[--Selecione--]</option>
                                        <option
                                            <?php
                                            if($pe->getPerfil() == "Administrador"){
                                                echo "selected = 'selected'";
                                            }
                                            ?>
                                            >Cliente</option>
                                        <option
                                            <?php
                                            if($pe->getPerfil() == "Funcionário"){
                                                echo "selected = 'selected'";
                                            }
                                            ?>
                                            >Funcionário</option>
                                    </select>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: center">
                                <input type="submit" name="cadastrar" class="btn btn-success btInput" value="Enviar">
                                &nbsp;&nbsp;
                                <input type="reset" class="btn btn-light btInput" value="Limpar">
                                &nbsp;&nbsp;
                                <input type="submit" name="atualizar" class="btn btn-secondary btInput" value="Atualizar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function apenasNumeros(string) {
            var numsStr = string.replace(/[^0-9]/g, '');
            return parseInt(numsStr);
        }

        function mascara(t, mask) {
            var i = t.value.length;
            var saida = mask.substring(1, 0);
            var texto = mask.substring(i);
            var n = texto.substring(0, 1);
            var n = n.replace(/[a-zA-z]/, '');
            n = parseInt(n);
            if (isNaN(n)) {
                if (texto.substring(0, 1) !== saida) {
                    t.value += texto.substring(0, 1);
                }
            } else {
                t.value = "";
                document.getElementById("cpf").value = "";
            }
        }
    </script>
    <script>
        function validaCpfCnpj() {
            var val = document.getElementById("cpf").value;
            if (val.length == 14) {
                var cpf = val.trim();

                cpf = cpf.replace(/\./g, '');
                cpf = cpf.replace('-', '');
                cpf = cpf.split('');

                var v1 = 0;
                var v2 = 0;
                var aux = false;

                for (var i = 1; cpf.length > i; i++) {
                    if (cpf[i - 1] != cpf[i]) {
                        aux = true;
                    }
                }

                if (aux == false) {
                    document.getElementById("valCpf").innerHTML = "* CPF inválido";
                    return false;
                }

                for (var i = 0, p = 10;
                    (cpf.length - 2) > i; i++, p--) {
                    v1 += cpf[i] * p;
                }

                v1 = ((v1 * 10) % 11);

                if (v1 == 10) {
                    v1 = 0;
                }

                if (v1 != cpf[9]) {
                    document.getElementById("valCpf").innerHTML = "* CPF inválido";
                    return false;
                }

                for (var i = 0, p = 11;
                    (cpf.length - 1) > i; i++, p--) {
                    v2 += cpf[i] * p;
                }

                v2 = ((v2 * 10) % 11);

                if (v2 == 10) {
                    v2 = 0;
                }

                if (v2 != cpf[10]) {
                    document.getElementById("valCpf").innerHTML = "* CPF inválido";
                    return false;
                } else {
                    document.getElementById("valCpf").innerHTML = "";
                    return true;
                }
            } else if (val.length == 18) {
                var cnpj = val.trim();

                cnpj = cnpj.replace(/\./g, '');
                cnpj = cnpj.replace('-', '');
                cnpj = cnpj.replace('/', '');
                cnpj = cnpj.split('');

                var v1 = 0;
                var v2 = 0;
                var aux = false;

                for (var i = 1; cnpj.length > i; i++) {
                    if (cnpj[i - 1] != cnpj[i]) {
                        aux = true;
                    }
                }

                if (aux == false) {
                    document.getElementById("valCpf").innerHTML = "* CPF inválido";
                    return false;
                }

                for (var i = 0, p1 = 5, p2 = 13;
                    (cnpj.length - 2) > i; i++, p1--, p2--) {
                    if (p1 >= 2) {
                        v1 += cnpj[i] * p1;
                    } else {
                        v1 += cnpj[i] * p2;
                    }
                }

                v1 = (v1 % 11);

                if (v1 < 2) {
                    v1 = 0;
                } else {
                    v1 = (11 - v1);
                }

                if (v1 != cnpj[12]) {
                    document.getElementById("valCpf").innerHTML = "* CPF inválido";
                    return false;
                }

                for (var i = 0, p1 = 6, p2 = 14;
                    (cnpj.length - 1) > i; i++, p1--, p2--) {
                    if (p1 >= 2) {
                        v2 += cnpj[i] * p1;
                    } else {
                        v2 += cnpj[i] * p2;
                    }
                }

                v2 = (v2 % 11);

                if (v2 < 2) {
                    v2 = 0;
                } else {
                    v2 = (11 - v2);
                }

                if (v2 != cnpj[13]) {
                    document.getElementById("valCpf").innerHTML = "* CPF inválido";
                    return false;
                } else {
                    document.getElementById("valCpf").innerHTML = "";
                    return true;
                }
            } else {
                document.getElementById("valCpf").innerHTML = "* CPF inválido";
                return false;
            }
        }
    </script>
</body>

</html>