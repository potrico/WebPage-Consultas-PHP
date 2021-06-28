<!DOCTYPE html>
<html lang="pt-br">


<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font  Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css">

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="../utils/css/principal.css">
    

    <title>Pagina Principal</title>
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
                        <a class="av-item nav-link" id="home-menu" href="../view/principal.php">Home</a>
                        <a class="av-item nav-link" id="cadastro-menu" href="ListaPacientes.php">Pacientes</a>
                        <a class="av-item nav-link" id="agenda-menu" href="../model/agenda.php">Consultas</a>
                        <a class="av-item nav-link" id="login-menu" href="../view/ListaUsuarios.php">Usuários</a>
                        <a class="av-item nav-link" id="sair" href="../view/logout.php">Sair</a>

                    </div>
                </div>
            </nav>
        </div>

    </header>
    <!--Fim da barra de navegação-->

    <!--Início da parte principal-->

    <main>
        <div class="container-fluid">
            <div id="mainSlider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#mainSlider" data-slide-to="0" class="active"></li>
                    <li data-target="#mainSlider" data-slide-to="1" class="active"></li>
                    <li data-target="#mainSlider" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="../utils/img/imgCadastro.jpg" class="d-block w-100 h-90" alt="imgCadastro">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Realize o cadastro completo dos seus pacientes.</h2>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="../utils/img/imgAgendamento.jpg" class="d-block w-100 h-90" alt="imgCadastro">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Controle sua agenda de consultas com mais facilidade.</h2>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="../utils/img/imgCadastrese.jpg" class="d-block w-100 h-90" alt="imgCadastro">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>Cadastre-se e utilize nossas ferramentas.</h2>
                        </div>
                    </div>

                </div>
                <a href="#mainSlider" class="carousel-control-prev" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a href="#mainSlider" class="carousel-control-next" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
            </div>

            <!-- Sobre a empresa -->

            <div id="about-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="main-title">Sobre a XABLAU</h3>
                        </div>
                        <div class="col-md-6">
                            <img class="img-fluid" src="../utils/img/about5.jpg" alt="about img">

                        </div>
                        <div class="col-md-6">

                            <h3 class="about-title">AGILIDADE E ORGANIZAÇÃO</h3>
                            <p>XABLAU oferece softwares para clínicas e consultórios médicos que visam otimizar seu
                                tempo, melhorar sua organização, e gerenciar os seus dados com mais facilidade.</p>
                            <p>O acesso ao sistema é simples, e permite aos médicos obterem maior controle sobre seus
                                horários e agendamentos diários.</p>
                            <p>Veja suas vantagens:</p>
                            <ul class="about-list">
                                <li><i class="fas fa-check" style="color: cornflowerblue;"></i> Facilidade em cadastrar
                                    seus pacientes.</li>
                                <li><i class="fas fa-check" style="color: cornflowerblue;"></i> Controle total de seus
                                    agendamentos.</li>
                                <li><i class="fas fa-check" style="color: cornflowerblue;"></i> Login seguro para
                                    administrador e usuários.</li>
                                <li><i class="fas fa-check" style="color: cornflowerblue;"></i> Segurança dos dados
                                    registrados.</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Área de Serviços -->

            <div class="services-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="main-title">Ferramentas</h3>
                        </div>
                        <div class="col-md-4 service-box" id="service-box">
                            <i class="fa fa-book" aria-hidden="true" style="font-size: 50px; margin-bottom: 20px;"></i>
                            <h4>Cadastro de pacientes</h4>
                            <p>Cadastre, atualize e liste seus pacientes cadastrados.</p>
                        </div>
                        <div class="col-md-4 service-box" id="service-box2">
                            <i class="fa fa-calendar" aria-hidden="true"
                                style="font-size: 50px; margin-bottom: 20px;"></i>
                            <h4>Agendamento de Consultas</h4>
                            <p>Agende os horários de consultas com mais facilidade.</p>
                        </div>
                        <div class="col-md-4 service-box" id="service-box3">
                            <i class="fas fa-user" style="font-size: 50px; margin-bottom: 20px;"></i>
                            <h4>Login Seguro</h4>
                            <p>Cadastre-se, e tenha acesso a todas as ferramentas.</p>
                        </div>
                    </div>
                </div>
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
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS, depois fa last version -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>