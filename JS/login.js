$("#form_login").submit(function (event) {
    event.preventDefault();
    var $form = $(this);

    var data_form = {
        usuario: $("#inputUser", $form).val(),
        password: $("#inputPassword", $form).val(),
    }
    if (data_form.usuario.length < 3) {
        $("#msg_error").text("Necesitamos un usuario valido.").show();
        return false;
    } else if (data_form.password.length < 3) {
        $("#msg_error").text("Tu password debe ser minimo de 3 caracteres.").show();
        return false;
    }
    $("#msg_error").hide();


    $.ajax({
            type: 'POST',
            url: "../PHP/procesar_login.php",
            data: data_form,
            dataType: 'json',
            async: true,
        })
        .done(function ajaxDone(res) {
            console.log(res);
            if (res.error !== undefined) {
                $("#msg_error").text(res.error).show();
                return false;
            }

            if (res.redirect !== undefined) {
                window.location = res.redirect;
            }
        })
        .fail(function ajaxError(e) {
            console.log(e);
        })
        .always(function ajaxSiempre() {
            console.log('Final de la llamada ajax.');
        })
    return false;
});

