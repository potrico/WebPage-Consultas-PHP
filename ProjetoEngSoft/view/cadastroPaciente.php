<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="../utils/css/cadastro.css">

    <title>Cadastro Paciente</title>
</head>

<body>

    <!-- Início barra de navegação -->

    <header>
        <div class="container" id="nav-container">
            <nav class="navbar navbar-expand-lg fixed-top">

                <a href="principal.html" class="navbar-brand">
                    <img id="logo" src="../utils/img/logo2.png" alt="CM Cadastro"> XABLAU
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links"
                    aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                    <div class="navbar-nav">
                        <a class="av-item nav-link" id="home-menu" href="principal.html">Home</a>
                        <a class="av-item nav-link" id="cadastro-menu" href="cadastroPaciente.php">Cadastro de
                            Pacientes</a>
                        <a class="av-item nav-link" id="agenda-menu" href="#">Agendamento de Consultas</a>
                        <a class="av-item nav-link" id="login-menu" href="login.html">Cadastre-se</a>

                    </div>

                </div>

            </nav>
        </div>

    </header>
    <!--Fim da barra de navegação-->

    <!--Início da parte principal-->

    <main>
        <div class="titulo col-12">
            <div class="container">
                <h3 class="main-title">Cadastro de Pacientes</h3>
            </div>
        </div>
        <div class="content pt-5">
            <div class="container-form">
                <div class="col-4 m-auto form-box">
                    <form action='cadastroPacienteCon.php' method='POST'>

                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" id="nameId" name="nome" aria-describedby="name"
                                placeholder="Nome" /><br>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpfId" name="cpf" placeholder="CPF" /><br>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="enderecoId" name="endereco"
                                aria-describedby="endereco" placeholder="Endereço" /><br>
                        </div>
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="emailId" name="email"
                                aria-describedby="emailHelp" placeholder="Email:" /><br>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="tel" class="form-control" id="telefoneId" name="telefone"
                                aria-describedby="telefone" maxlength="11" placeholder="Telefone:" /><br>
                        </div>

                        <input type="hidden" id="operacao" name="operacao" value="criar" />

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>

    </main>

    <!-- Início Cabeçalho-->

    <footer>
        <div class="footer-box">
            <div class="row">
                <div class="col-md-6 contato-box">
                    <div class="contato-titulo">
                        <h5>Desenvolvido por:</h5>
                    </div>
                    <div class="col-md-4 name-box">
                        <p>Everton Rodrigo Pereira</p>
                        <p>141282@upf.br</p>
                    </div>
                    <div class="col-md-4 name-box">
                        <p>Bruno Potrich</p>
                    </div>
                    <div class="col-md-4 name-box">
                        <p>Guilherme Albring</p>
                    </div>
                </div>
            
                <div class="col-md-6 upf-box">
                    <img src="../utils/img/logoupf.png" alt="upf logo" class="upfimg">
                </div>
            </div>
        </div>
    </footer>



    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>
</body>

</html>