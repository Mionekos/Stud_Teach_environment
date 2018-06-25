$( document ).ready(function() {

    $(".btn-group").css('width', '100%');


    var myTable = $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": 'student_visit_mark',

            // "data": function (d) {
            //     d.period = $("#daterange").val();
            // },
            // success: function (data) {
            //     console.log(data);
            // }
            // // "type":"POST",
        "aoColumns": [
            { mData: 'date' } ,
            { mData: 'id_time' } ,
            { mData: 'name_subject' },
            { mData: 'options' },
            { mData: 'mark' },
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
        }
    });




});


