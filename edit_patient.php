<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/patient_controller.php';


$pat_controller=new PatientsController();
$result=$pat_controller->getPatients();
$id=$_GET['id'];
$results=$pat_controller->editPatient($id);
if(isset($_POST['update'])){
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    $parent=$_POST['parent'];
    if(!empty($_POST['phone'])){
        $phone=$_POST['phone'];
    }
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
    }
    if(!empty($_POST['address'])){
        $address=$_POST['address'];
    }
    if(!empty($_POST['gender'])){
        $gender=$_POST['gender'];
    }
    if(!empty($_POST['age'])){
        $age=$_POST['age'];
    }
    $update=$pat_controller->updatePatients($id,$name,$phone,$email,$address,$gender,$age);
    if($update){
        header('location:patient.php');
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
                        <form action="" method="post">
                       
                            <div class="my-2">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" id="" class="form-control" value="<?php echo $results['name']; ?>">

                            </div>

                            <div>
                                <select name="specialization" id="" class="form-control" value="<?php echo $results['specialization']; ?>">
                                    
                                    <?php
                                    echo "<option>Specialization </option>";
                                    for ($index=0; $index <count($results) ; $index++) { 
                                        echo "<option value='".$results[$index]['id']."'>".$results[$index]['specializations']."</option>";
                                    }


                                  ?>

                                </select>
                            </div>

                            <div class="my-2">
                                <label for="" class="form-label">Phone</label>
                                <input type="text" name="phone" id="" class="form-control" value="<?php echo $results['phone'];  ?>">

                            </div>
                            <div class="my-2">
                                <label for="" class="form-label">Email</label>
                                <input type="text" name="email" id="" class="form-control" value="<?php echo $results['email']; ?>">

                            </div>

                           
                            <div class="my-2">
                                <label for="" class="form-label">Address</label>
                                <input type="text" name="address" id="" class="form-control" value="<?php echo $results['address'];  ?>">

                            </div>
                            <div class="my-2">
                                <label for="" class="form-label">Gender</label>
                                <input type="text" name="gender" id="" class="form-control" value="<?php echo $results['gender'];  ?>">

                            </div>
                            <div class="my-2">
                                <label for="" class="form-label">Age</label>
                                <input type="text" name="age" id="" class="form-control" value="<?php echo $results['age']; ?>">

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
