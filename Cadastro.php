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

                <div class="card-header bg-light text-center border" style="padding-bottom: 15px; padding-top: 15px;">
                    Cadastro de Cliente
                </div>
                <?php
                //envio dos dados para o BD
                if (isset($_POST['cadastrar'])) {
                    $nome = $_POST['nome'];
                    $dtNasc = $_POST['dtNasc'];
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $perfil = $_POST['perfil'];
                    $cpf = $_POST['cpf'];
                    $email = $_POST['email'];

                    $pc = new PessoaController();
                    include_once '/controller/PessoaController.php';
                    echo "<p>" . $pc->inserirPessoa(
                        $nome,
                        $dtNasc,
                        $login,
                        $senha,
                        $perfil,
                        $email,
                        $cpf
                    ) . "</p>";
                }
                ?>
                <div class="card-body border">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Código: </label> <br>
                                <label>Nome Completo</label>
                                <input class="form-control" type="text" name="nome">
                                <label>Data de Nascimento</label>
                                <input class="form-control" type="date" name="dtNasc">
                                <label>CPF</label>
                                <label id="valCpf" style="color: red; font-size: 11px;"></label>
                                <input class="form-control" type="text" id="cpf" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" onblur="return validaCpfCnpj();" name="cpf" required="required">
                            </div>
                            <div class="col-md-6">
                                <br>
                                <label>E-Mail</label>
                                <input class="form-control" type="email" name="email">
                                <label>Senha</label>
                                <input class="form-control" type="password" name="senha">
                                <label>Conf. Senha</label>
                                <input class="form-control" type="password" name="senha2">
                            </div>
                        </div>
                        <br>
                        <div style="text-align: center;">
                            <a href="#" role="button" class="btn btn-primary btn-sm">Enviar</a>
                            <button type="submit" id="botao" class="btn btn-success btn-sm">Limpar</button>
                        </div>
                    </form>
                </div>
                <div class="card-header bg-dark text-center text-white border" style="padding-bottom: 15px; padding-top: 15px;">
                                Endereço do cliente
                            </div>
                            <div class="col-12 ">
                                <div class="card-header bg-light text-center text-dark border">
                                    <div class="row">
                                        <label>Código: </label> <br>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6 ">
                                            <label>CEP</label><br>
                                            <input class="form-control" type="text" id="cep" onkeypress="mascara(this, '#####-###')" maxlength="9" value="" name="cep">
                                            <label>Logradouro</label>
                                            <input type="text" class="form-control" name="logradouro" id="rua" value="">
                                            <label>Complemento</label>
                                            <input type="text" class="form-control" name="complemento" id="complemento">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control" name="bairro" id="bairro" value="">
                                            <label>Cidade</label>
                                            <input type="text" class="form-control" name="cidade" id="cidade" value="">
                                            <label>UF</label>
                                            <input type="text" class="form-control" name="uf" id="uf" value="" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: center">
                                <input type="submit" name="cadastrar" class="btn btn-primary btn-sm" value="Enviar">
                                &nbsp;&nbsp;
                                <input type="reset" class="btn btn-light btn-sm" value="Limpar">
                                &nbsp;&nbsp;
                                <input type="submit" name="atualizar" class="btn btn-secondary btn-sm" value="Atualizar">
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