$(function () {
    $("#form_atualizar_usuario").submit(function(event) {
        console.log("teste");
        event.preventDefault();

        $("#submit_button").prop("disabled", true);
        $("#submit_button").html(`
            <i class="fa fa-circle-o-notch fa-spin" style="margin-right: 10px; margin-left: -5px;"></i> Enviando...
        `);

        var codigo = $(this).attr("accesskey");
        var nome = $('#nameID').val();
        var nivel = $('#nivelID').val();
        var usuario = $('#userID').val();
        
        

        if (codigo && nome && nivel && usuario) {
            var formData = new FormData();
            formData.append('codigo', codigo);
            formData.append('name', nome);
            formData.append('nivel', nivel);
            formData.append('user', usuario);


            
            var route = `../controller/atualizaUsuario.php`;

            ajax_submit_form(formData, route).then((response) => {
                console.log(response);
                if (response.result) {
                    $("#submit_button").prop("disabled", false);
                    $("#submit_button").html(`
                        <i class="fa fa-sign-in" style="margin-right: 10px; margin-left: -5px;"></i> Atualizar
                    `);

                    Swal.fire({
                        title: 'Usuário atualizado com sucesso!',
                        icon: 'success',
                        showCloseButton: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        }
                    }).then((result) => {
                                
                        location.href = "../view/ListaUsuarios.php";
                    });
                } else {
                    Swal.fire({
                        title: `Aconteceu algum erro ao atualizar o usuário, contate o suporte!`,
                        icon: 'info',
                        timer: 3000,
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                        Swal.showLoading()
                        }
                    }).then((result) => {

                        // if (response.campo && response.campo != '') {
                        //     setTimeout(function () {
                        //         $(`#${response.campo}`).focus();
                        //     }, 300);
                        // }
                    });
                }
            }).catch((error) => {
                console.log(error);
                Swal.fire({
                    title: 'Aconteceu algum erro ao atualizar o usuário, contate o suporte!',
                    icon: 'error',
                    timer: 3000,
                    timerProgressBar: true,
                    onBeforeOpen: () => {
                    Swal.showLoading()
                    }
                }).then((result) => {
                });
            });
        } else {
            Swal.fire({
                title: 'Preencha todos os campos para atualizar!',
                icon: 'info',
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                }
            });
        }
    });

});