$(document).ready(function() {
    var timetable = [
        {
            "date":"22.03.2018",
            "day_of_the_week":"ПН",
            "pairs": [
                {
                    "time_start":"09:00",
                    "time_end":"10:20",
                    "name_subject":"Русский",
                    "name_lecture_practice":"Лекция",
                    "number_cabinet":"102",
                    "name_teacher":"AAA"

                },
                {
                    "time_start":"10:30",
                    "time_end":"11:50",
                    "name_subject":"Математика",
                    "name_lecture_practice":"Лекция",
                    "number_cabinet":"132",
                    "name_teacher":"ABB"

                },
                {
                    "time_start":"12:20",
                    "time_end":"13:40",
                    "name_subject":"Программирование",
                    "name_lecture_practice":"Практика",
                    "number_cabinet":"132",
                    "name_teacher":"ABB"

                }
            ]
        },
        {
            "date":"23.03.2018",
            "day_of_the_week":"ВТ",
            "pairs": [
                {
                    "time_start":"09:00",
                    "time_end":"10:20",
                    "name_subject":"Русский",
                    "name_lecture_practice":"Практика",
                    "number_cabinet":"330",
                    "name_teacher":"AAA"

                }
            ]
        }
    ];


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
            var time = "<td class=\"color_td time_learn time_subject\">"+timetable[i]["pairs"][j]["time_start"]+"-"+timetable[i]["pairs"][j]["time_end"]+"</td>";
            var new_tr = {};
            var subject = "<dt class=\"size_name_learn number_subject\">" +
                "                    <nobr class=\"name_subject\">"+timetable[i]["pairs"][j]["name_subject"]+"</nobr>\n" +
                "                </dt>";
            var pred = "  <dd class=\"size_text_3col\">\n" +
                "                    <span class=\"name_lecture_practice\">"+timetable[i]["pairs"][j]["name_lecture_practice"]+"</span><br>\n" +
                "                    <span class=\"number_cabinet\">"+"Кабинет: "+timetable[i]["pairs"][j]["number_cabinet"]+"</span><br>\n" +
                "                    <span class=\"name_teacher\">"+"Преподаватель: "+timetable[i]["pairs"][j]["name_teacher"]+"</span>\n" +
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


    //
    // var availableTags = [
    //     "ActionScript",
    //     "AppleScript",
    //     "Asp",
    //     "BASIC",
    //     "C",
    //     "C++",
    //     "Clojure",
    //     "COBOL",
    //     "ColdFusion",
    //     "Erlang",
    //     "Fortran",
    //     "Groovy",
    //     "Haskell",
    //     "Java",
    //     "JavaScript",
    //     "Lisp",
    //     "Perl",
    //     "PHP",
    //     "Python",
    //     "Ruby",
    //     "Scala",
    //     "Scheme"
    // ];
    $( "#search_teacher" ).autocomplete({
        source: function( request, response ) {
            $.ajax( {
                url: "teacher"

            } );
        },
        // minLength: 2,
        select: function( event, ui ) {
            console.log( "Selected: " + ui.item.value + " aka " + ui.item.id );
        }
    });


    $("#btn_save_timetable").click(function () {
        $.ajax({
            url: "timetable_show",
            type: "GET",
            data: {
                "daterangepicker_start": $("input[name='daterangepicker_start']").val(),
                "daterangepicker_end": $("input[name='daterangepicker_end']").val(),
                "search_teacher": $("#search_teacher").val(),
            success: function (data) {
                $("#btn_save_timetable").click(function() {
                    $("#rasp").html('');
                    $("#teacher_name_table").html('');
                    $("#period_date").html('');
                });
                // data["group"];
                //препода достать
                // $("#teacher_name_table").append(data["teacher"]);
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