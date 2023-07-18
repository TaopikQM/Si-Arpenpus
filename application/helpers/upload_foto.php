function upload_foto($ft){
    $target_dir = "img/";
    $target_file = $target_dir . basename($ft["name"]);   
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($ft["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if(!in_array($imageFileType, $allowedTypes)){
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false;
    } else {
        if (move_uploaded_file($ft["tmp_name"], $target_file)) {
            return true;
        } else {
            return false;
        }
    }      
}
