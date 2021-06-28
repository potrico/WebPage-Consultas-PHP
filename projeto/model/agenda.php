

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <link href='../utils/include/css/core/main.min.css' rel='stylesheet' />
        <link href='../utils/include/css/daygrid/main.min.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../utils/include/css/personalizado.css">

        
          <!-- Meta tags Obrigatórias -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="../utils/css/cadastro.css">

            
    </head>
    <body>
   
        <br>
        <br>
        <br>
        <br>
        <br>
        <header>
            <div class="container" id="nav-container">
                <nav class="navbar navbar-expand-lg fixed-top">

                    <a href="../view/principal.php" class="navbar-brand">
                        <img id="logo" src="../utils/img/logo2.png" alt="CM Cadastro"> XABLAU
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links"
                        aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                        <div class="navbar-nav">
                            <a class="av-item nav-link" id="home-menu" href="../view/principal.php">Home</a>
                            <a class="av-item nav-link" id="cadastro-menu" href="../view/ListaPacientes.php">Pacientes</a>
                            <a class="av-item nav-link" id="agenda-menu" href="../model/agenda.php">Consultas</a>
                            <a class="av-item nav-link" id="login-menu" href="../view/ListaUsuarios.php">Usuários</a>
                            <a class="av-item nav-link" id="sair" href="../view/logout.php">Sair</a>

                        </div>

                    </div>

                </nav>
            </div>

        </header>
            <?php
                include_once("../utils/include/SessionValidate.php");
            ?>
            <div id='calendar'></div>

            <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="visevent">
                                <dl class="row">
                                
                                    <dt class="col-sm-3">Título do evento</dt>
                                    <dd class="col-sm-9" id="title"></dd>

                                    <dt class="col-sm-3">Início do evento</dt>
                                    <dd class="col-sm-9" id="start"></dd>

                                    <dt class="col-sm-3">Fim do evento</dt>
                                    <dd class="col-sm-9" id="end"></dd>
                                </dl>
                                <button class="btn btn-warning btn-canc-vis">Editar</button>
                                <a href="" id="apagar_evento" class="btn btn-danger">Apagar</a>
                            </div>
                            <div class="formedit">
                                <span id="msg-edit"></span>
                                <form id="editevent" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id" >
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Título</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Color</label>
                                        <div class="col-sm-10">
                                            <select name="color" class="form-control" id="color">
                                                <option value="">Selecione</option>			
                                                <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                                <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                                <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                                <option style="color:#8B4513;" value="#8B4513">Marrom</option>	
                                                <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                                <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                                <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                                <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                                <option style="color:#228B22;" value="#228B22">Verde</option>
                                                <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Início do evento</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Final do evento</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="end" class="form-control" id="end"  onkeypress="DataHora(event, this)">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
                                            <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-warning">Salvar</button>                                    
                                        </div>
                                    </div>
                                </form>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Evento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="msg-cad"></span>
                            <form id="addevent" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Título</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Color</label>
                                    <div class="col-sm-10">
                                        <select name="color" class="form-control" id="color">
                                            <option value="">Selecione</option>			
                                            <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                            <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                            <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                            <option style="color:#8B4513;" value="#8B4513">Marrom</option>	
                                            <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                            <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                            <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                            <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                            <option style="color:#228B22;" value="#228B22">Verde</option>
                                            <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Início do evento</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Final do evento</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="end" class="form-control" id="end"  onkeypress="DataHora(event, this)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>                                    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src='../utils/include/js/core/main.min.js'></script>
            <script src='../utils/include/js/interaction/main.min.js'></script>
            <script src='../utils/include/js/daygrid/main.min.js'></script>
            <script src='../utils/include/js/core/locales/pt-br.js'></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="../utils/include/js/personalizado.js"></script>
        </body>
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
</html>
