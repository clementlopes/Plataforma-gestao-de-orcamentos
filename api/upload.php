

<?php
include_once __DIR__ . '/../includes/session.php';

$id = $_POST['idempresa'];
$target_dir = "img/";
$target_dir_fs = __DIR__ . '/../img/';
$target_file = $target_dir_fs . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) {
if($imageFileType != "png"){
    echo "Sorry, only PNG  files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $rename= 'logo';
        $newname= $rename.".".$extension;
        $filesname= $_FILES["fileToUpload"]["tmp_name"];
        if (move_uploaded_file( $filesname, $target_dir_fs . $newname)) {
//    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//var_dump($target_file); die;
 $sql = "UPDATE empresa SET LOGO='".$target_dir.$newname."' WHERE ID_EMPRESA=".$id.';';
   
    mysqli_query(bd(), $sql);
   $sql1="SELECT ROW_COUNT()as linhas ;";
    if(verifica_exist($sql1)==1){
        return 1; 
    }

header("location: ../empresa.php");

?>