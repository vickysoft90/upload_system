<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Upload System - Pepagora Task</title>
</head>
<body onload="callAjaxGalary()">
    <div class="heading">
        <h3>IMAGE UPLOAD</h3>
    </div>
    <form action="upload.php" class="dropzone" id="myDropzone">
    </form>
    <div class="container gallery-block">
        <div id='loadingmessage' style="">
            <img src='loading.gif'/>
        </div>
        <div class="heading">
            <h4>IMAGES</h4>
        </div>
        <div class="row" id="table_ajax"></div>
    </div>
    <footer>
    &copy; 2024 Vigneswaran. All rights reserved.
    </footer>
</body>
</html>