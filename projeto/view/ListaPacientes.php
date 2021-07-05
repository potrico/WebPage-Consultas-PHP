<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../utils/css/ListaUsuarios.css">

    <!-- Font  Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css">

    <title>Cadastro Paciente</title>
</head>

<body>

    <!-- Valida Sessão do usuário -->
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
                <h3 class="main-title">Pacientes</h3>
            </div>
        </div>
        <div class="content pt-5">
            <?php
                include_once("../controller/PacienteController.php");
                $obj = new PacienteController();
                $lista_pacientes = $obj->controlaConsulta();
            ?>

            <?php if($lista_pacientes != -1){ ?>
            <div class="container-form">
                <div class="col-6 m-auto list-box">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th widht="300" scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Email</th>
                                <th class="text-center" scope="col">Editar/Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lista_pacientes as $paciente){?>
                                <tr>    
                                    <td><?php echo $paciente->codigo;?></td>
                                    <td><?php echo $paciente->nome;?></td>
                                    <td><?php echo $paciente->cpf;?></td>
                                    <td><?php echo $paciente->email;?></td>
                                    <td class="text-center">
                                        <button type="button"  value="alterar" accesskey="<?php echo $paciente->codigo; ?>" class="alterar_paciente btn btn-info"><i class="fas fa-pen"></i></button>
                                        <button type="button"  value="excluir" accesskey="<?php echo $paciente->codigo; ?>" class="excluir_paciente btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                        </td>    
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="create-button col-6">
                    <a href="../view/cadastroPaciente.php"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i>  Cadastrar novo paciente</button></a>
                </div>
            </div>
            <?php }else{ ?>
                <div class="alert alert-warning" role="alert">
                    Nenhum registro encontrado!
                </div>
            <?php } ?>

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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../utils/js/functions.js"></script>
    <script src="../utils/js/paciente/listaPacientes.js"></script>
</body>

</html> 
        