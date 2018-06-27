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
});

function getVisitMarkForStudent() {

        //url:"http://localhost:8080/Students/public/student_visit_mark",
        //type:"GET",
        // data:{
        //     "subject": $('#subject').val(),
        // },
        // success:function (data) {
            //console.log(data);
            //$("#example").html('');

            // $('#example').append("<thead>\n" +
            //     "        <tr>\n" +
            //     "            <th>Дата</th>\n" +
            //     "            <th>Номер пары</th>\n" +
            //     "            <th>Предмет</th>\n" +
            //     "            <th>Посещаемость</th>\n" +
            //     "            <th>Оценка</th>\n" +
            //     "        </tr>\n" +
            //     "        </thead>\n" +
            //     "        <tfoot>\n" +
            //     "        <tr>\n" +
            //     "            <th>Дата</th>\n" +
            //     "            <th>Номер пары</th>\n" +
            //     "            <th>Предмет</th>\n" +
            //     "            <th>Посещаемость</th>\n" +
            //     "            <th>Оценка</th>\n" +
            //     "        </tr>\n" +
            //     "        </tfoot>");

            //console.log(data.data[0])
            // cols.push({mData:data.data[0]['date']})
            // cols.push({mData:data.data[0]['id_time']})
            // cols.push({mData:data.data[0]['name_subject']})
            // cols.push({mData:data.data[0]['options']})
            // cols.push({mData:data.data[0]['mark']})
            $('#example').dataTable({
                // "data": function (d) {
                //     d.subject = $("#subject").val();
                // },
                destroy: true,
                "bProcessing": true,
                "sAjaxSource": "student_visit_mark",
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




