<?php
// Set the directory where you want to upload the file
$upload_dir = 'uploads/';

// Check if a file was uploaded
if(isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Validate the file size (e.g., maximum 50MB)
    if($file_size > 52428800) {
        echo "File size exceeded the maximum allowed size (50MB).";
    } else {
        // Validate the file extension
        $allowed_extensions = array('jpg', 'jpeg', 'txt', 'pptx', 'ppt', 'doc', 'docx', 'zip', 'mp4', 'pdf', 'xlsx');
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if(in_array($file_extension, $allowed_extensions)) {
            // Move the uploaded file to the uploads directory
            $upload_file = $upload_dir . basename($file_name);
            if(move_uploaded_file($file_tmp, $upload_file)) {
                echo "File uploaded successfully.";
            } else {
                echo "There was an error uploading your file.";
            }
        } else {
            echo "File extension not allowed.";
        }
    }
}
?>