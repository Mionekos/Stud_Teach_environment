var temp_url = "http://localhost:8080/Students/public/teacher_visit_mark";
(function ($) {
    $('#basic').multiselect({
        templates: {
            li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>'
        },
        numberDisplayed:1,
        nonSelectedText:'Не выбрано',
        nSelectedText: 'выбрано',
        allSelectedText:'Всего выбрано'
    });

    $(".btn-group").css('width', '100%');

    var getTableAttr = function () {
        return temp;
    };

    var myTable = $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": temp_url,
            "data": function (d) {
                d.period = $("#daterange").val();
            },
            success: function (data) {
                console.log(data);
            }
            // "type":"POST",

        },
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
        }
    });



})(jQuery); // End of use strict


