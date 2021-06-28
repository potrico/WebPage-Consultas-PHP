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

    <?php
        include_once("../utils/include/SessionValidate.php");
    ?>

    <!-- Início barra de navegação -->

    <header>
        <div class="container" id="nav-container">
            <nav class="navbar navbar-expand-lg fixed-top">

                <a href="principal.php" class="navbar-brand">
                    <img id="logo" src="../utils/img/logo2.png" alt="CM Cadastro"> XABLAU
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links"
                    aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                    <div class="navbar-nav">
                        <a class="av-item nav-link" id="home-menu" href="principal.php">Home</a>
                        <a class="av-item nav-link" id="cadastro-menu" href="ListaPacientes.php">Pacientes</a>
                        <a class="av-item nav-link" id="agenda-menu" href="../model/agenda.php">Consultas</a>
                        <a class="av-item nav-link" id="usuarios-menu" href="../view/ListaUsuarios.php">Usuários</a>
                        <a class="av-item nav-link" id="sair" href="../view/logout.php">Sair</a>

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
                <h3 class="main-title"><?php echo isset($_GET["codigo"]) && is_numeric($_GET["codigo"]) ? "Atualização de Paciente" : "Cadastro de Paciente";?></h3>
            </div>
        </div>
        <div class="content pt-5">
            <?php if(isset($_GET['codigo'])){
                require_once("../model/FabricaConexao.php");
                require_once("../model/paciente.php");
                require_once("../model/PacienteDAO.php");

                $DAO = new PacienteDAO();
                $paciente = array();
                
                $paciente = $DAO->Consultar("SELECT id_Paciente, nome, cpf, endereco, cep, email, telefone FROM paciente WHERE id_Paciente = ".$_GET['codigo']);
                }
            ?>
            <div class="container-form">
                <div class="col-4 m-auto form-box">
                    <form action='<?php echo isset($_GET["codigo"]) && is_numeric($_GET["codigo"]) ? "../controller/atualizaPaciente.php" : "../controller/inserePaciente.php";?>'
                        method="POST" id="<?php echo isset($_GET["codigo"]) && is_numeric($_GET["codigo"]) ? "form_atualizar_paciente" : "form_cadastrar_paciente";?>" 
                        accesskey="<?php echo isset($_GET["codigo"]) && is_numeric($_GET["codigo"]) ? $_GET["codigo"] : "";?>">
                        
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" id="nameId" name="nome" aria-describedby="name"
                                placeholder="Nome" value="<?php echo isset($paciente) ? $paciente[0]->nome : ""; ?>" required /><br>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpfId" name="cpf" placeholder="CPF" 
                            value="<?php echo isset($paciente) ? $paciente[0]->cpf : ""; ?>" /><br>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="enderecoId" name="endereco"
                                aria-describedby="endereco" placeholder="Endereço" 
                                value="<?php echo isset($paciente) ? $paciente[0]->endereco : ""; ?>"  /><br>
                        </div>
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" class="form-control" id="cepId" name="cep"
                                aria-describedby="cep" placeholder="CEP" 
                                value="<?php echo isset($paciente) ? $paciente[0]->cep : ""; ?>"  /><br>
                        </div>
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="emailId" name="email"
                                aria-describedby="emailHelp" placeholder="Email:" 
                                value="<?php echo isset($paciente) ? $paciente[0]->email : ""; ?>" /><br>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="tel" class="form-control" id="telefoneId" name="telefone"
                                aria-describedby="telefone" maxlength="11" placeholder="Telefone:" 
                                value="<?php echo isset($paciente) ? $paciente[0]->telefone : ""; ?>" required /><br>
                        </div>

                        <input type="submit" name="submit" class="btn btn-success" value="<?php echo isset($_GET["codigo"]) && is_numeric($_GET["codigo"]) ? "Atualizar" : "Cadastrar";?>">
                        <a href="ListaPacientes.php"><button type="button" class="btn btn-secondary">Voltar</button></a>

                       
                    </form>
                </div>
            </div>

    </main>

    <!-- Início Cabeçalho-->
    <footer>
        <div class="footer">
            <img src="../utils/img/rodape1.png" class="rdp_img" alt="rdp">
            <div class="row">
                <div class="col-md-6 upf-box">
                    <img src="../utils/img/logoupf.png" alt="upf logo" class="upfimg">
                </div>

                <div class="col-md-6 contato-box">
                    <div class="contato-titulo">
                        <h5>Desenvolvido por:</h5>
                    </div>
                    <div class="nomes col-md-6 m-auto" style="font-size: 10px;">
                        <p id="p1">Everton Rodrigo Pereira - 141282@upf.br</p>
                        <p id="p2">Bruno Potrich - @upf.br</p>
                        <p id="p3">Guilherme Albring - @upf.br</p> 
                    </div>
                </div>

                
            </div>
        </div>
    </footer>



    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script> -->
    <script src="../utils/js/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../utils/js/functions.js"></script>
    <script src="../utils/js/paciente/cadastraPaciente.js"></script>
    <script src="../utils/js/paciente/atualizaPaciente.js"></script>

</body>

</html>