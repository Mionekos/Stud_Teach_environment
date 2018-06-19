$(document).ready(function () {

    $("#file-select").change(function () {
        console.log("sdfghjkl");
        var fileSelect = document.getElementById('file-select');
        var file = fileSelect.files[0];
        var formData = new FormData();
        formData.append('img_name', file);
        console.log("QQ");
        $.ajax({
            url: "http://localhost:8080/Students/public/start_page/",
            type: "POST",
            data: formData,
            processData: false,
            // contentType: false,
            contentType: 'multipart/form-data',
            success: function (data) {
                console.log("WWW");
                //таня должна возвращать путь до картинки а я его менять  в src
            }
        });
    });
});