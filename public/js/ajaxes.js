$(document).ready(function() {
    $.ajax({
        url: "http://localhost:8080/Students/public/info",
        type: "GET",
        success: function (data) {
            if (data['role_id']==3){
                $("#user_info").html("<input type=\"text\" name=\"login\" class=\"form-control tables_box\" value="+data['login']+">"+
                    ""+"<input type=\"text\" name=\"email\" class=\"form-control tables_box\" value="+data['email']+">"+
                    ""+"<input type=\"text\" name=\"password\" class=\"form-control tables_box\" placeholder='Пароль'>"+
                    ""+"<input type=\"text\" name=\"password_confirm\" class=\"form-control tables_box\" placeholder='Подтверждение пароля'>"+
                    ""+"<button type=\"button\" id=\"sendInfo\" class=\"btn btn-secondary btn_loginInputs\" style=\"margin-left: 75%\"onclick=\"changeUserInfo()\">Сохранить\n" +
                    "</button>");
                $('#fio_group').html(data['lastname']+" "+data['name']+" "+data['group_name']['group_name']);
                $('#visit_mark').html("<a class=\"nav-link\" href=\"{{route(\"journalStudent\")}}\" id=\"journalStud\">\n"+
                    "                </a>");
            }
            else{
                $("#user_info").html("<input type=\"text\" name=\"login\" class=\"form-control tables_box\" value="+data['login']+">"+
                    ""+"<input type=\"text\" name=\"email\" class=\"form-control tables_box\" value="+data['email']+">"+
                    ""+"<input type=\"text\" name=\"password\" class=\"form-control tables_box\" placeholder='Пароль'>"+
                    ""+"<input type=\"text\" name=\"password_confirm\" class=\"form-control tables_box\" placeholder='Подтверждение пароля'>"+
                    ""+"<button type=\"button\" id=\"sendInfo\" class=\"btn btn-secondary btn_loginInputs\" style=\"margin-left: 75%\"onclick=\"changeUserInfo()\">Сохранить\n" +
                    "</button>");
                $('#fio_group').html(data['lastname']+" "+data['name']);
                $('#visit_mark').html("<a class=\"nav-link\" href=\"{{route(\"journalTeacher\")}}\">\n" +
                    "                    <i class=\"fa fa-graduation-cap\"></i>\n" +
                    "                    <span class=\"nav-link-text\">Посещаемость и оценки</span>\n" +
                    "                </a>")
            }

        }
    });
});

function changeUserInfo() {
    $.ajax({
        url:"http://localhost:8080/Students/public/update",
        type:"GET",
        data:{
            "login": $("input[name='login']").val(),
            "email": $("input[name='email']").val(),
            "password": $("input[name='password']").val(),
        },
        success:function (data) {
            $("#user_info").html("<input type=\"text\" name=\"login\" class=\"form-control tables_box\" value="+data['login']+">"+
                ""+"<input type=\"text\" name=\"email\" class=\"form-control tables_box\" value="+data['email']+">"+
                ""+"<input type=\"text\" name=\"password\" class=\"form-control tables_box\" placeholder='Пароль'>"+
                ""+"<input type=\"text\" name=\"password_confirm\" class=\"form-control tables_box\" placeholder='Подтверждение пароля'>"+
                ""+"<button type=\"button\" id=\"sendInfo\" class=\"btn btn-secondary btn_loginInputs\" style=\"margin-left: 75%\"onclick=\"changeUserInfo()\">Сохранить\n" +
                "</button>");
            $('#fio_group').html(data['lastname']+" "+data['name']+" "+data['group_name']['group_name']);
        }
    })

}

$(document).ready(function() {
    $.ajax({
        url: "http://localhost:8080/Students/public/groups",
        type: "GET",
        success: function (data) {

            $("#number_group").html('');
            for (var i in data) {
                $("#number_group").append("<option value=" + data[i]["value"] + ">" + data[i]["group_name"] + "</option>");
            }
        }
    });
});




