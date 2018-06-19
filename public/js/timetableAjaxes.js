$(document).ready(function() {
    function getGroup() {
        $.ajax({
            url: "http://localhost:8080/Students/public/groups",
            type: "GET",
            success: function (data) {
                var select = document.getElementById('number_group');
                select.parentNode.removeChild(select);
                $("#number_group").html('');
                for (var i in data) {
                    $("#number_group").append("<option value=" + data[i]["value"] + ">" + data[i]["group_name"] + "</option>");
                }
            }
        });

    }
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
    $("#search_teacher").autocomplete({
        source: function(request,response) {
            $.ajax({
                url:"teachers",
                data:{"term":$("input[id='search_teacher']").val()},
                type: "GET",
                success: function (data){
                    response($.map(data, function(item){
                        return{
                            label: item.label,
                        }
                    }));
                }
            });
        },
        select: function (event, ui) {
            event.preventDefault()
            $("#search_teacher").val(ui.item.label);
        }
    });
    $("#search_group").autocomplete({
        source: function( request, response ) {
            $.ajax( {
                url: "group_timetable",
                data: {"term": $("input[id='search_group']").val()},
                type: "GET",
                success: function (data) {
                    response($.map(data, function(item){
                        return {
                            label: item.label, // ссылка на страницу товара
                            value: item.value,
                            course_num: item.course_num,
                        }
                    }));
                }

            });

        },
        select: function( event, ui ) {
            event.preventDefault()
            $("#number_group").html('')
            $("#number_course").html('')
            $("#search_group").val(ui.item.label)
            $("#number_course").append('<option id='+ ui.item.course_num+'value='+ ui.item.course_num+'>'+ui.item.course_num+'</option>')
            $("#number_group").append('<option id='+ ui.item.value+'value='+ ui.item.label+'>'+ ui.item.label+'</option>');
        }
    });

    $("#btn_save_timetable").click(function () {
        $.ajax({
            url: "http://localhost:8080/Students/public/timetable_for_students",
            type: "GET",
            data: {
                "daterangepicker_start": $("input[name='daterangepicker_start']").val(),
                "daterangepicker_end": $("input[name='daterangepicker_end']").val(),
                "number_course": $("#number_course").val(),
                "number_group": $("#number_group").val()
            },
            success: function (data) {
                $("#btn_save_timetable").click(function() {
                    $("#rasp").html('');
                    $("#number_group_table").html('');
                    $("#period_date").html('');
                });
                // data["group"];
                $("#number_group_table").append(data["group"]);
                $("#period_date").append($("input[name='daterangepicker_start']").val()+" - "+$("input[name='daterangepicker_end']").val());
                timetable = data["data"];
                for(var i in timetable)
                {

                    var len_pair = timetable[i]["pairs"].length;
                    var number = "    <tr >\n" +
                        "        <td colspan=\"3\" class=\"line_top\">\n" +
                        "            <b class=\"day_number\">"+timetable[i]["date"]+"</b>\n" +
                        "        </td>\n" +
                        "\n" +
                        "    </tr>";
                    var week = " <th  class=\"shedule-weekday-cell\" width=\"67\" rowspan=\""+len_pair+"\">\n" +
                        "            <span class=\"day_of_the_week\">"+timetable[i]["day_of_the_week"]+"</span>\n" +
                        "        </th>";
                    $("#rasp").append(number);
                    for(var j in timetable[i]["pairs"])
                    {
                        var time = "<td class=\"color_td time_learn time_subject\">"+timetable[i]["pairs"][j]["begin"]+"-"+timetable[i]["pairs"][j]["finish"]+"</td>";
                        var new_tr = {};
                        var subject = "<dt class=\"size_name_learn number_subject\">" +
                            "                    <nobr class=\"name_subject\">"+timetable[i]["pairs"][j]["name_subject"]+"</nobr>\n" +
                            "                </dt>";
                        var pred = "  <dd class=\"size_text_3col\">\n" +
                            "                    <span class=\"name_lecture_practice\">"+timetable[i]["pairs"][j]["name_lectpract"]+"</span><br>\n" +
                            "                    <span class=\"number_cabinet\">"+"Кабинет: "+timetable[i]["pairs"][j]["num_cabinet"]+"</span><br>\n" +
                            "                    <span class=\"name_teacher\">"+"Преподаватель: "+timetable[i]["pairs"][j]["lastname"]+" "+timetable[i]["pairs"][j]["name"]+" "+timetable[i]["pairs"][j]["patronymic"]+"</span>\n" +
                            "                </dd>"
                        if(j==0)
                        {
                            $("#rasp").append("<tr>"+week+time+"<td  class=\"color_td\">"+"<dl class=\"shedule-weekday-item\">"+subject+pred+"</dl>"+"</td>"+"</tr>");
                        }
                        else
                        {
                            $("#rasp").append("<tr>"+time+"<td  class=\"color_td\">"+"<dl class=\"shedule-weekday-item\">"+subject+pred+"</dl>"+"</td>"+"</tr>");
                        }
                    }


                }

            }
        });

    });
});
$(document).ready(function() {
    $.ajax({
        url: "http://localhost:8080/Students/public/groups",
        type: "GET",
        success: function (data) {
            $("#number_group").html('');
            for (var i in data){
                $("#number_group").append("<option value="+data[i]["value"]+">"+data[i]["group_name"]+"</option>");
            }
        }
    });

});
function getTimetableForTeacher() {

    $.ajax({
        url: "http://localhost:8080/Students/public/teachers_tietable",
        type: "GET",
        data: {
            "daterangepicker_start": $("input[name='daterangepicker_start']").val(),
            "daterangepicker_end": $("input[name='daterangepicker_end']").val(),
            "search_teacher": $("#search_teacher").val(),
        },
            success: function (data) {
                $("#btn_save_timetable").click(function() {


                });
                $("#period_date").html('');
                $("#rasp").html('');
                $("#teacher_name_table").html('');
                $("#period_date").append($("input[name='daterangepicker_start']").val()+" - "+$("input[name='daterangepicker_end']").val());
                timetable = data["data"];
                for(var i in timetable)
                {

                    var len_pair = timetable[i]["pairs"].length;
                    var number = "    <tr >\n" +
                        "        <td colspan=\"3\" class=\"line_top\">\n" +
                        "            <b class=\"day_number\">"+timetable[i]["date"]+"</b>\n" +
                        "        </td>\n" +
                        "\n" +
                        "    </tr>";
                    var week = " <th  class=\"shedule-weekday-cell\" width=\"67\" rowspan=\""+len_pair+"\">\n" +
                        "            <span class=\"day_of_the_week\">"+timetable[i]["day_of_the_week"]+"</span>\n" +
                        "        </th>";
                    $("#rasp").append(number);
                    for(var j in timetable[i]["pairs"])
                    {
                        var time = "<td class=\"color_td time_learn time_subject\">"+timetable[i]["pairs"][j]["begin"]+"-"+timetable[i]["pairs"][j]["finish"]+"</td>";
                        var new_tr = {};
                        var subject = "<dt class=\"size_name_learn number_subject\">" +
                            "                    <nobr class=\"name_subject\">"+timetable[i]["pairs"][j]["name_subject"]+"</nobr>\n" +
                            "                </dt>";
                        var pred = "  <dd class=\"size_text_3col\">\n" +
                            "                    <span class=\"name_lecture_practice\">"+timetable[i]["pairs"][j]["name_lectpract"]+"</span><br>\n" +
                            "                    <span class=\"number_cabinet\">"+"Кабинет: "+timetable[i]["pairs"][j]["num_cabinet"]+"</span><br>\n" +
                            "                    <span class=\"name_teacher\">"+"Преподаватель: "+timetable[i]["pairs"][j]["lastname"]+" "+timetable[i]["pairs"][j]["name"]+" "+timetable[i]["pairs"][j]["patronymic"]+"</span>\n" +
                            "                </dd>"
                        if(j==0)
                        {
                            $("#rasp").append("<tr>"+week+time+"<td  class=\"color_td\">"+"<dl class=\"shedule-weekday-item\">"+subject+pred+"</dl>"+"</td>"+"</tr>");
                        }
                        else
                        {
                            $("#rasp").append("<tr>"+time+"<td  class=\"color_td\">"+"<dl class=\"shedule-weekday-item\">"+subject+pred+"</dl>"+"</td>"+"</tr>");
                        }
                    }


                }

            }
        });

}

// $(document).ready(function() {
//     $( "#search_group").autocomplete({
//         source: function( request, response ) {
//             $.ajax( {
//                 url: "http://localhost:8080/Students/public/groups",
//             } );
//         },
//         select: function( event, ui ) {
//             event.preventDefault()
//             //$("#number_group").html('')
//             $("#search_group").val(ui.item.value)
//             $(this).val(ui.item.label);
//             //$("#number_course").val(ui.item.course_num)
//            // $("#number_group").append('<option id='+ ui.item.value+'value='+ ui.item.label+'>'+ ui.item.label+'</option>');
//         }
//     });
// });