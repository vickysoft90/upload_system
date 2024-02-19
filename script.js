Dropzone.options.myDropzone = {
    maxFiles: 5,
    maxFilesize: 5,
    acceptedFiles: ".jpg, .jpeg, .PNG ",
    addRemoveLinks: true,
    dictDefaultMessage: "Drop files here or click to upload",
    dictRemoveFile: "Remove file",
    init: function() {
        this.on("success", function(file, responseText) {
            if (file.status === 'success') {
                handleResponse.handelSuccess(file, responseText);
            } else {
                handleResponse.handelError(responseText);
            }
        });

        var handleResponse = {
            handelSuccess: function(file, responseText) {
                file.previewTemplate.appendChild(document.createTextNode(responseText));
                if (responseText == "File uploaded successfully") {
                    callAjaxGalary();
                }
            },
            handelError: function(responseText) {
                alert("Error In uploading file");
            }
        }
    }
};

function callAjaxGalary() {
    $('#loadingmessage').show();
    $.ajax({
        url: "loadimage.php",
        type: "GET",
        data: "",
        success: function(data) {
            $('#table_ajax').html(data);
            $('#loadingmessage').hide();
        },
        error: function() {
            alert('Error fetching images.');
        }

    });
}
