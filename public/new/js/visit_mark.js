//var temp_url = "new/js/data.txt";
//var temp_url = "http://localhost:8080/Students/public/table_visitmark";

/*function getDataForTeacherTable() {
    $.ajax({
        url: "http://localhost:8080/Students/public/teacher_visit_mark",
        type: "GET",
        data:  {
            "daterangepicker_start": $("input[name='daterangepicker_start']").val(),
            "daterangepicker_end": $("input[name='daterangepicker_end']").val(),
            "number_course": $("#number_course").val(),
            "number_group": $("#number_group").val(),
            "subject": $("#subject").val()
        },
        success: function (data) {
            console.log(data);
        }
    });

}*/

// /*

$(function () {
    // $('#basic').multiselect({
    //     templates: {
    //         li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>'
    //     },
    //     numberDisplayed: 1,
    //     nonSelectedText: 'Не выбрано',
    //     nSelectedText: 'выбрано',
    //     allSelectedText: 'Всего выбрано'
    //
    // });

    $(".btn-group").css('width', '100%');
       var getTableAttr = function () {
        return temp;
    };

    var myTable = $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "data": function (d) {
                d.period = $("#daterange").val();
                d.course = $("#number_course").val();
                d.group = $("#number_group").val();
                // d.subject = $("#daterange").val();
                // d.custom = $('#myInput').val();
                // etc
            },
            // "type":"POST",
            "dataSrc": function (json) {
                var data = json["data"];
                for (var i = 0; i < data.length; i++) {
                    data[i][4] = data[i][4] + "<button class='btn btn-secondary edit_visit' value='1'><i class='fa fa-edit'></i></button>";
                    data[i][5] = data[i][5] + "<button class='btn btn-secondary edit_mark' value='1'><i class='fa fa-edit'></i></button>";
                }
                return data;
            },
            "url": "http://localhost:8080/Students/public/teacher_visit_mark"
        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
        }
    });

    $("#btn_visit_mark").click(function () {
        myTable.draw();
    });

    myTable.on('draw', function () {
        $('.edit_visit').click(function () {
            var id_visit = $(this).attr("value");
            console.log("Нажали кнопку" + id_visit);
            $("#modal_redaction_visit").modal('show');
            $("#close_modal_redaction_visit").click(function () {
                $("#modal_redaction_visit").modal('hide');
            });
        });
        $('.edit_mark').click(function () {
            var id_mark = $(this).attr("value");
            console.log("Нажали кнопку" + id_mark);
            $("#modal_redaction_mark").modal('show');
            $("#close_modal_redaction_mark").click(function () {
                $("#modal_redaction_mark").modal('hide');
            });

        });
    });


    // $("#btn_visit_mark").click(function () {
    //     $.ajax({
    //         url: "",
    //         type: "GET",
    //         data: {
    //             "daterangepicker_start": $("input[name='daterangepicker_start']").val(),
    //             "daterangepicker_end": $("input[name='daterangepicker_end']").val(),
    //             "number_course": $("#number_course").val(),
    //             "number_group": $("#number_group").val(),
    //             //"basic":$("#basic").val()
    //         },
    //         success: function (data) {
    //
    //             $("#btn_visit_mark").click(function () {
    //                 $("#example").html('');
    //             });
    //
    //             var myTable = $('#example').DataTable({
    //                 "processing": true,
    //                 "serverSide": true,
    //                 "language": {
    //                     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
    //                 }
    //                 // "ajax": "new/js/data.txt"
    //
    //             });
    //             myTable.on('draw', function () {
    //                 $('.edit_visit').click(function () {
    //                     var id_visit = $(this).attr("value");
    //                     console.log("Нажали кнопку"+id_visit);
    //                     $("#modal_redaction_visit").modal('show');
    //                 });
    //                 $('.edit_mark').click(function () {
    //                     var id_mark = $(this).attr("value");
    //                     console.log("Нажали кнопку"+id_mark);
    //                     $("#modal_redaction_mark").modal('show');
    //                 });
    //             });
    //         }
    //     });
    // });


}); // End of use strict



