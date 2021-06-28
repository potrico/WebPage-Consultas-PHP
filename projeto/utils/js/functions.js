

function ajax_submit_form(formData, link) {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: link,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response) {
                    console.log(response);
                    var responseJSON = $.parseJSON(response);
    
                    if (responseJSON.result) {
                        resolve(responseJSON);
                    } else {
                        resolve(responseJSON);
                    }
                }
            },
            error: function (request, status, error) {
                var responseJSON = {
                    result: false, 
                    msg: "Acesso indevido, contate o suporte!", 
                    campo: ""
                };

                reject(responseJSON);
            }
        });
    });
}

function instance_swal_fire(icon, title, html, field, redirectLink, button, textButton) {
    if (icon == 'success') {
        Swal.fire({
            icon: `${icon}`,
            title: `${title}`,
            html: `${html}`,
            showConfirmButton: true
        }).then(() => {
            if (redirectLink != '') {
                location.href = url_base + redirectLink;
            }
            if (button != '') {
                button.prop("disabled", false);
                button.html(
                    `<span class="btn-label">
                        <i class="fa fa-check"></i>
                    </span>
                    ${textButton}`
                );
            }
        });
    } else {
        Swal.fire({
            icon: `${icon}`,
            title: `${title}`,
            html: `${html}`,
            showConfirmButton: true
        }).then(() => {
            if (field != '') {
                var animate_campo = $('#' + field);
            
                $('html, body').animate({
                    scrollTop: animate_campo.offset().top - 220
                }, 'slow', function() { 
                    animate_campo.focus();
                });    
            }

            if (button != '') {
                button.prop("disabled", false);
                button.html(
                    `<span class="btn-label">
                        <i class="fa fa-check"></i>
                    </span>
                    ${textButton}`
                );
            }
        });        
    }
}
