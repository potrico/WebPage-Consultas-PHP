$(function () {
    $("#form_cadastrar_paciente").submit(function(event) {
        event.preventDefault();

        //$(this).prop("disabled", true);
        // $(this).html(`
        //     <i class="fa fa-circle-o-notch fa-spin" style="margin-right: 10px; margin-left: -5px;"></i> Logando...
        // `);

        var codigo = $(this).attr("accesskey");
        var nome = $('#nameId').val();
        var cpf = $('#cpfId').val();
        var endereco = $('#enderecoId').val();
        var cep = $('#cepId').val();
        var email = $('#emailId').val();
        var telefone = $('#telefoneId').val();
        
        

        if (nome && cpf && endereco && cep && email && telefone) {
            var formData = new FormData();

            formData.append('codigo', codigo);
            formData.append('name', nome);
            formData.append('cpf', cpf);
            formData.append('endereco', endereco);
            formData.append('cep', cep);
            formData.append('email', email);
            formData.append('telefone', telefone);
            
            
            var route = `../controller/inserePaciente.php`;

            ajax_submit_form(formData, route).then((response) => {
                if (response.result) {
                    // $(this).prop("disabled", false);
                    // $(this).html(`
                    //     <i class="fa fa-sign-in" style="margin-right: 10px; margin-left: -5px;"></i> Logar!
                    // `);

                    Swal.fire({
                        title: 'Paciente cadastrado com sucesso!',
                        icon: 'success',
                        showCloseButton: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        }
                    }).then((result) => {
                                
                        location.href = "../view/ListaPacientes.php";
                    });
                } else {
                    Swal.fire({
                        title: `${response.msg}`,
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
                    title: 'Aconteceu algum erro ao cadastrar o paciente, contate o suporte!',
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
                title: 'Preencha todos os campos!',
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