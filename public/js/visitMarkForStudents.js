$(document).ready(function() {
    $.ajax({
        url: "http://localhost:8080/Students/public/subject_visit_mark",
        type: "GET",
        success: function (data) {
            $("#subject").html('');
            for (var i in data) {
                $("#subject").append("<option value=" + data[i]["id_subjects"] + ">" + data[i]["name_subject"] + "</option>");
            }
        }
    });
});




