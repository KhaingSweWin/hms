<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/doctor_controller.php';
include_once 'controller/specialization_controller.php';

$doc_controller=new DoctorsController();
$spe_controller=new SpecializationsController();

$results=$spe_controller->getSpecializations();
$result=$doc_controller->getDoctors();

$id=$_GET['id'];
$doctor=$doc_controller->editDoctor($id);




if(isset($_POST['update'])){
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
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
    if(!empty($_POST['image'])){
        $image=$_POST['image'];
    }
   
    $special=$_POST['specialization'];
    $update=$doc_controller->updateDoctors($id,$name,$phone,$email,$image,$address,$special);
    if($update){
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
                        <form action="" method="post"  enctype="multipart/form-data">
                       
                            <div class="my-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" id="" class="form-control" value="<?php echo $doctor['name']; ?>">

                            </div>


                            <div>
                                <select name="specialization" id="" class="form-control" >
                                    
                                    <?php
                                  //  echo "<option>Specialization </option>";
                                    for ($index=0; $index <count($results) ; $index++) { 
                                        if($doctor['specialization_id']==$results[$index]['id']){
                                            echo "<option value='".$results[$index]['id']."' selected>".$results[$index]['specialization']."</option>";

                                        }
                                        else{
                                            echo "<option value='".$results[$index]['id']."'>".$results[$index]['specialization']."</option>";


                                        }
        
                                        
                                    }


                                  ?>

                                </select>
                            </div>
                            <div class="my-2">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" id="" class="form-control" value="<?php echo $doctor['address'];  ?>">

                            </div>
                            <div class="my-2">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" name="phone" id="" class="form-control" value="<?php echo $doctor['phone'];  ?>">

                            </div>
                            <div class="my-2">
                                <label for="" class="form-label">Email</label>
                                <input type="text" name="email" id="" class="form-control" value="<?php echo $doctor['email']; ?>">

                            </div>
                            
        <div>
            
            <input type="file" name="image" id="" class="form-control">
        </div>
        
                           
                            <div class="my-3">
                                <button class="btn btn-dark" name="update">Update</button>
                            </div>
                        </form>

                        </div>
                        <div class="col-md-2"></div>
                       </div>
                  
                </main>
               <?php
               include_once 'layouts/footer.php'



?>
