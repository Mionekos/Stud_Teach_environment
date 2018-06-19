function save() {
    $.ajax({
        url: "http://localhost:8080/Students/public/add_role",
        type: "POST",
        success: function (data) {
            console.log(data);
            if (data['content']==1){
                $("#role").click(function () {
                    $("#modal_save").modal('show');
                    // $("#ok_btn").modal('hide');
                });
            }

        }});
}




