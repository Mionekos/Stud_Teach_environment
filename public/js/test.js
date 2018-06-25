$( document ).ready(function() {
    $('#example').dataTable({
        "bProcessing": true,
        "sAjaxSource": "table",
        "aoColumns": [
            { mData: 'id_time' } ,
            { mData: 'name_subject' },
            { mData: 'lastname' },
            { mData: 'name' },
        ]
    });
});