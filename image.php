<?php
if(isset($_POST['upload']))
{
    
    $filename=$_FILES['image']['name'];
    $filesize=$_FILES['image']['size'];
    $temfile=$_FILES['image']['tmp_name'];
    if($_FILES['image']['error']!=0)
    {
        echo "File is empty";
    }
    else
    {
     //string to array based on delimiter (.,/,,)
        $fileinfo=explode('.',$filename);
        var_dump($fileinfo);
        $actual_extension=end($fileinfo);
        $allowed_extensions=['jpg','jpeg','png','svg','pdf'];
        if(in_array($actual_extension,$allowed_extensions))
        {
            if($filesize<=2000000)
            {
                $filename= time().$filename;
                move_uploaded_file($temfile,'uploads/'. $filename);
            }
            else
            {
                echo "Max file size is 2 M and your file excceeds max file size";
            }
        }
        else{
            echo "File type is not allowed";
        }
    }
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
        <div>
            
            <input type="file" name="image" id="" class="form-control">
        </div>
        <div class="mt-5">
            <button class="btn btn-primary" type="submit" name="upload">Upload</button>
            
        </div>
    </form>
    
</body>
</html>