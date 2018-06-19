function roleAdd() {
    $.ajax({
        url: "http://localhost:8080/Students/public/add_role",
        type: "GET",
        data:{
                "add_role": $("input[name='add_role']").val(),
        },
        success: function (data) {
            console.log(data);
            if (data==1){
                alert("Данные сохранены");
            }
            else{
                alert("Такая роль уже существует!");
            }
        }
    });
}
function subjectAdd() {
    $.ajax({
        url: "http://localhost:8080/Students/public/add_subject",
        type: "GET",
        data:{
            "add_subject": $("input[name='add_subject']").val(),
        },
        success: function (data) {
            console.log(data);
            if (data==1){
                alert("Данные сохранены");
            }
            else{
                alert("Такой предмет уже существует!");
            }
        }
    });
}
function postAdd() {
    $.ajax({
        url: "http://localhost:8080/Students/public/add_post",
        type: "GET",
        data:{
            "add_post": $("input[name='add_post']").val(),
        },
        success: function (data) {
            console.log(data);
            if (data==1){
                alert("Данные сохранены");
            }
            else{
                alert("Такая должность уже существует!");
            }
        }
    });
}
function lectPractAdd() {
    $.ajax({
        url: "http://localhost:8080/Students/public/add_lectpract",
        type: "GET",
        data:{
            "add_lectpract": $("input[name='add_lectpract']").val(),
        },
        success: function (data) {
            console.log(data);
            if (data==1){
                alert("Данные сохранены");
            }
            else{
                alert("Такой вид пары уже существует!");
            }
        }
    });
}
function groupAdd() {
    $.ajax({
        url: "http://localhost:8080/Students/public/add_group",
        type: "GET",
        data:{
            "add_group": $("input[name='add_group']").val(),
            "add_course": $("input[name='add_course']").val(),
        },
        success: function (data) {
            console.log(data);
            if (data==1){
                alert("Данные сохранены");
            }
            else{
                alert("Такая группа уже существует!");
            }
        }
    });
}
function cabinetAdd() {
    $.ajax({
        url: "http://localhost:8080/Students/public/add_cabinets",
        type: "GET",
        data:{
            "add_cabinets": $("input[name='add_cabinets']").val(),
        },
        success: function (data) {
            console.log(data);
            if (data==1){
                alert("Данные сохранены");
            }
            else{
                alert("Такой кабинет уже существует!");
            }
        }
    });
}
function timeAdd() {
    $.ajax({
        url: "http://localhost:8080/Students/public/add_time",
        type: "GET",
        data:{
            "add_time_begin": $("input[name='add_time_begin']").val(),
            "add_time_finish": $("input[name='add_time_finish']").val(),
        },
        success: function (data) {
            console.log(data);
            if (data==1){
                alert("Данные сохранены");
            }
            else{
                alert("Такое время уже существует!");
            }
        }
    });
}
$(document).ready(function () {
    $.ajax({
        url: "http://localhost:8080/Students/public/subject",
        type: "GET",
        success: function (data) {
            for (var i in data) {
                $("#pairs_subject").append("<option value=" + data[i]["id_subject"] + ">" + data[i]["name_subject"] + "</option>");
            }
        }
    });
    $.ajax({
        url: "http://localhost:8080/Students/public/teachers",
        type: "GET",
        success: function (data) {
            for (var i in data) {
                if (data[i]["post_id"]){
                    $("#pairs_teacher").append("<option value=" + data[i]["id_user"] + ">" + data[i]["lastname"] +
                        " "+ data[i]["name"]+" "+ data[i]["name"]+"</option>");
                }

            }
        }
    });
    $.ajax({
        url: "http://localhost:8080/Students/public/groups",
        type: "GET",
        success: function (data) {
            for (var i in data) {
                $("#pairs_group").append("<option value=" + data[i]["id_group"] + ">" + data[i]["group_name"]+"</option>")
            }
        }
    });
});
function addPairs() {
    $.ajax({
        url: "http://localhost:8080/Students/public/add_pairs",
        type: "GET",
        data:{
            "pairs_subject": $("#pairs_subject").val(),
            "pairs_subject": $("#pairs_subject").val(),
            "pairs_group": $("#pairs_group").val(),
        },
        success: function (data) {
            console.log(data);
            if (data==1){
                alert("Данные сохранены");
            }
            else{
                alert("Такое время уже существует!");
            }
        }
    });
}

