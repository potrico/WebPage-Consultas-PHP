<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../utils/css/cadastroUsuario.css">

    <title>Cadastro Paciente</title>
</head>

<body>

    

    <?php
        /* Validação de sessão */ 
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
        <div class="titulo col-12">
            <div class="container">
                <h3 class="main-title"><?php echo isset($_GET["codigo"]) && is_numeric($_GET["codigo"]) ? "Edição de Usuário" : "Cadastro de Usuários";?></h3>
            </div>
        </div>
        <div class="content pt-5">
            <?php if(isset($_GET['codigo'])){
                require_once("../model/FabricaConexao.php");
                require_once("../model/usuario.php");
                require_once("../model/UsuarioDAO.php");

                $DAO = new UsuarioDAO();
                $usuario = array();
                
                $usuario = $DAO->Consultar("SELECT id_usuario, nome, nivel, usuario FROM usuario WHERE id_usuario = ".$_GET['codigo']);
            }
            
            ?> 
            <div class="container-form">
                <div class="col-4 m-auto form-box">
                    <form action='<?php echo isset($_GET["codigo"]) && is_numeric($_GET["codigo"]) ? "../controller/atualizaUsuario.php" : "../controller/insereUsuario.php";?>' 
                        method='POST' id="<?php echo isset($_GET["codigo"]) && is_numeric($_GET["codigo"]) ? "form_atualizar_usuario" : "form_cadastrar_usuario";?>" 
                        accesskey="<?php echo isset($_GET["codigo"]) && is_numeric($_GET["codigo"]) ? $_GET["codigo"] : "";?>">

                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" id="nameID" name="name" aria-describedby="name"
                                placeholder="Nome:" value="<?php echo isset($usuario) ? $usuario[0]->nome : ""; ?>" /><br>
                        </div>
                        <div class="form-group">
                            <label for="nivel">Nível:</label>
                            <input type="text" class="form-control" id="nivelID" name="nivel" placeholder="Nível:" 
                                value="<?php echo isset($usuario) ? $usuario[0]->nivel : ""; ?>" /><br>
                        </div>
                        <div class="form-group">
                            <label for="user">Usuário:</label>
                            <input type="text" class="form-control" id="userID" name="user"
                                aria-describedby="user" placeholder="Usuário:" size="30" minlenght="3" pattern="[a-z0-9._%+-]+" 
                                value="<?php echo isset($usuario) ? $usuario[0]->usuario : ""; ?>" /><br>
                        </div>
                        
                        <?php if(!isset($usuario)){?> 
                            <div>
                                <label for="senha">Senha:</label>
                                <input type="password" class="form-control" id="senhaID" name="pwd"
                                    aria-describedby="senha" placeholder="Senha:" /><br>
                            </div>
                        <?php } ?>
                        

                        <input type="submit" id="submit_button" name="submit" class="btn btn-success" value="<?php echo isset($_GET["codigo"]) && is_numeric($_GET["codigo"]) ? "Atualizar" : "Cadastrar";?>">
                        <a href="ListaUsuarios.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
                                                     
                        
                        
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
    <script src="../utils/js/usuario/cadastraUsuario.js"></script>
    <script src="../utils/js/usuario/atualizaUsuario.js"></script>

    
</body>

</html>