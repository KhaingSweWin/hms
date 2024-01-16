<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/doctor_controller.php';
include_once 'controller/specialization_controller.php';

$doc_controller=new DoctorsController();
$spe_controller=new SpecializationsController();
$results=$spe_controller->getSpecializations();
$result=$doc_controller->getDoctors();


if(isset($_POST['add'])){
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    if(!empty($_POST['specialization'])){
        $specialization=$_POST['specialization'];
    
    }

    if(!empty($_POST['address'])){
        $address=$_POST['address'];
    }
    if(!empty($_POST['phone'])){
        $phone=$_POST['phone'];
    }
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
    }



    
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
    $result=$doc_controller->addDoctor($specialization,$name,$filename,$address,$phone,$email);
    if($result){
        header('location:doctors.php');
    }
}
   
  
    



?>
                   <div id="layoutSidenav_content">
                <main>
                <div class="row">
                        <div class="col-md-9"></div>
                       <div class="col-md-3">
                       <a href="doctors.php" class="btn btn-dark">Back</a>
                       </div>
                       </div>
                       <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <form action="" method="post" enctype="multipart/form-data">
                       
                            <div class="my-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" id="" class="form-control">

                            </div>

                            <div>
                                <select name="specialization" id="" class="form-control">
                                    
                                    <?php
                                    echo "<option>Specialization </option>";
                                    for ($index=0; $index <count($results) ; $index++) { 
                                        echo "<option value='".$results[$index]['id']."'>".$results[$index]['specialization']."</option>";
                                    }


                                  ?>

                                </select>
                              
                            </div>
                           
                            <div class="my-2">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" id="" class="form-control">

                            </div>
                            <div class="my-2">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" name="phone" id="" class="form-control">

                            </div>
                            <div class="my-2">
                                <label for="" class="form-label">Email</label>
                                <input type="text" name="email" id="" class="form-control">

                            </div>
                            
        <div>
            
            <input type="file" name="image" id="" class="form-control">
        </div>
        <!-- <div class="mt-2">
            <button class="btn btn-primary" type="submit" name="upload">Upload</button>
            
        </div> -->
    
                           
                            <div class="my-3">
                                <button class="btn btn-dark" name="add">Add</button>
                            </div>
                        </form>

                        </div>
                        <div class="col-md-2"></div>
                       </div>
                  
                </main>
               <?php
               include_once 'layouts/footer.php'



?>
