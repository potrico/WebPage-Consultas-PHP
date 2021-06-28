$(function () {
    $("#login-form").submit(function(event) {
        event.preventDefault();

        //$(this).prop("disabled", true);
        // $(this).html(`
        //     <i class="fa fa-circle-o-notch fa-spin" style="margin-right: 10px; margin-left: -5px;"></i> Logando...
        // `);

        var user_login = $('#usuario').val();
        var password_login = $('#password').val();
        
        

        if (user_login && password_login) {
            var formData = new FormData();

            formData.append('user', user_login);
            formData.append('pwd', password_login);

            
            var route = `../controller/login.php`;

            ajax_submit_form(formData, route).then((response) => {
                if (response.result) {
                    // $(this).prop("disabled", false);
                    // $(this).html(`
                    //     <i class="fa fa-sign-in" style="margin-right: 10px; margin-left: -5px;"></i> Logar!
                    // `);

                    Swal.fire({
                        title: 'Login efetuado com sucesso!',
                        icon: 'info',
                        showCloseButton: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        }
                    }).then((result) => {
                                
                        location.href = "../view/principal.php";
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
                    title: 'Aconteceu algum erro ao realizar o login, contate o suporte!',
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
                title: 'Preencha os campos de login e senha para logar!',
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