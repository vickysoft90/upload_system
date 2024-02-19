<?php
require_once('db.php'); // Include your database connection file
$uploadDirectory = 'uploads/';
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}
function generateFileName($originalName) {
    $timestamp = time();
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    $newFileName = $timestamp . "." . $extension;
    return $newFileName;
}

// Validate and handle file upload
if (!empty($_FILES['file']['name'])) {
    $tempFile = $_FILES['file']['tmp_name'];
    $targetFile = $uploadDirectory . generateFileName($_FILES["file"]["name"]);
    // Validate file type if needed
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $validextensions = array("jpeg", "jpg", "png","JPG");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
	) && ($_FILES["file"]["size"] < 52428800 )	&& in_array($file_extension, $validextensions)){
    move_uploaded_file($tempFile, $targetFile);
    $fileName = $_FILES['file']['name'];
    $filePath = $targetFile;
    $stmt = $conn->prepare("INSERT INTO uploads (file_name, file_path) VALUES (?, ?)");
    $stmt->bind_param("ss", $fileName, $filePath);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "File uploaded successfully";
    }else{
        echo "Invalid file type/ more then 5MB";
        exit();
    }
} else {
    echo "No file selected.";
}
?>