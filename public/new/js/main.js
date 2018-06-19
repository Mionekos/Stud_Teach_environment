$(document).ready(function () {

    $("#confirm_recovery").click(function () {
        var isValid = $("#form_recovery").valid();
        if (!isValid)
            return;
        $.ajax({
            url: "http://localhost:8080/Students/public/start_page/recovery",
            type: "POST",
            data: {"email_send": $("input[name='email_recovery']").val()},
            success: function (data) {
                if (data==="Такой почты не существует") {
                    $("#email_recovery-error").css("display","")
                    $("#email_recovery-error").html("Такой почты не существует");
                }
                else {
                    $("#modal_password").modal('hide');
                    $("#modal_password2").modal("show");



                }

                // $("#modal_password").modal('hide');
                // // alert('hhhhhhh');
                // $("#modal_password2").modal("show");
            }
        });

    });

    $("#confirm_code_recovery").click(function () {
        var isValid2 = $("#form_code_recovery").valid();
        if (!isValid2)
            return;
        $.ajax({
            url: "http://localhost:8080/Students/public/start_page/reset_password",
            type: "POST",
            data: {
                "code_recovery": $("input[name='code_recovery']").val(),
                "password_new": $("input[name='password_new']").val(),
                "password_confirm_new": $("input[name='password_confirm_new']").val()
            },
            success: function (data) {
                if (data["error"]===null) {
                    $("#email_recovery-error").css("display","")
                    $("#email_recovery-error").html("Неверный код!");
                }
                else {
                    $("#modal_password2").modal('hide');
                }
                // $("#modal_password2").modal('hide');
                // alert('Вы успешно сменили пароль');

            }
        });

    });

    $("#close_modal1").click(function () {
        $("#modal_password").modal('hide');
    });

    $("#close_modal2").click(function () {
        $("#modal_confirm").modal('hide');
    });
    $("#close_modal3").click(function () {
        $("#modal_register").modal('hide');
    });
    $("#close_modal4").click(function () {
        $("#modal_password2").modal('hide');
    });
    $("#btn_register").click(function () {
        $("#modal_register").modal('show');
    });

    $("#btn_auth").click(function () {
        $("#login_form").valid();
    });
    $("#registration_send").click(function () {
        $("#form_register").valid();
    });
    $("#save_confirm").click(function () {
        $("#form_new_password").valid();
    })

    $("#login_form").validate({
        rules: {
            // simple rule, converted to {required:true}
            login_auth: "required",
            // compound rule
            password_auth: {
                required: true,
                minlength: 6
            }
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("input-group");

            error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("red-border");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("red-border");
        }
    });

    $("#form_register").validate({
        rules: {
            lastname: "required",
            birthday: "required",
            name: "required",
            patronymic: "required",
            login_reg: "required",
            email_reg: {
                required: true,
                email: true
            },
            password_reg: {
                required: true,
                minlength: 6
            },
            password_confirm_reg: {
                required: true,
                minlength: 6
            }
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("input-group");

            error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("red-border");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("red-border");
        }

    });

    $("#form_recovery").validate({
        rules: {
            email_recovery: {
                required: true,
                email: true
            }
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("input-group");

            error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("red-border");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("red-border");
        }

    });

    $("#form_code_recovery").validate({
        rules: {
            code_recovery: {
                required: true
            },
            password_confirm_new: {
                required: true,
                minlength: 6
            },
            password_new: {
                required: true,
                minlength: 6
            }

        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("input-group");

            error.insertAfter(element);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("red-border");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("red-border");
        }

    });


});

