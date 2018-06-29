$(document).ready(function() {
    $.ajax({
        url: "http://localhost:8080/Students/public/subject_visit_mark",
        type: "GET",
        success: function (data) {
            $("#subject").html('');
            for (var i in data) {
                $("#subject").append("<option value=" + data[i]["id_subjects"] +">" + data[i]["name_subject"] + "</option>");
            }
        }
    });

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
    $("#number_course").click(function () {
        $.ajax({
            url: "http://localhost:8080/Students/public/groups",
            type: "GET",

            success: function (data) {
                $("#number_group").html('');
                course_num = $("select[name='course_num']").val();
                for (i=0;i<data.length;i++){
                    if (course_num==data[i]['course_num']){
                        $("#number_group").append('<option id='+data[i]['id_group']+'value='+data[i]['group_name']+'>'+data[i]['group_name']+'</option>');
                    }
                }

            }
        });
    });


});

function getVisitMarkForTeacher() {
    var dataTable = $('#example').dataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            "url": "teacher_visit_mark",
            "type": "GET",
            "data": function (data) {
                data.name_subject = $("#subject").val();
                data.daterangepicker_start = $("input[name='daterangepicker_start']").val();
                data.daterangepicker_end = $("input[name='daterangepicker_end']").val();
            },
        },
        destroy: true,
        "aoColumns": [
            {mData: 'date'},
            {mData: 'id_time'},
            {mData: 'name_subject'},
            {mData: 'options'},
            {mData: 'mark'},
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
        }
    })

    //}



}




