<?php
$status = 0; 
$msg = "";
if(isset($_FILES['image']['name'])) {     
    $filename = $_FILES['image']['name'];
    $location = 'uploads/api/'. $filename;
     
    $file_extension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Valid extensions
    // $valid_ext = array("pdf","doc","docx","jpg","png","jpeg");
    $valid_ext = array("jpg","png","jpeg");

    $status = 0;
    if (in_array($file_extension,$valid_ext))
    { 
        // Upload file proccess
        if(move_uploaded_file($_FILES['image']['tmp_name'], $location)){
            $status = 1;
            $msg = "Upload image successfully";
        } 
    }
    else
    {
        $status = 0;
        $msg = "Invalid file extension";
    }

}

$response = array(
    'status' => $status,
    'msg' => $msg,
    'username' => $_POST['username']
);

echo json_encode($response);
die;