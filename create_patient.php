<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/patient_controller.php';

$pat_controller=new PatientsController();
$results=$pat_controller->getPatients();

if(isset($_POST['add'])){
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
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
   $results=$pat_controller->addPatients($name,$phone,$email,$address,$gender,$age);
   if($results){
    header('location:patient.php');
   }
   
}

?>
            <main>
                    <div class="container-fluid px-4">
                        <h1 class="">Specializations</h1>
                       <div class="row">
                        <div class="col-md-9"></div>
                       <div class="col-md-3">
                       <a href="specializations.php" class="btn btn-dark">Back</a>
                       </div>
                       </div>
                       <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <form action="" method="post">
                               <div class="my-3">
                               <label for="" class="form-label">Name</label>
                               <input type="text" name="name" id="" class="form-control">
                               </div>
                               <div class="my-3">
                               <label for="" class="form-label">Phone</label>
                               <input type="text" name="phone" id="" class="form-control">
                               </div>
                               <div class="my-3">
                               <label for="" class="form-label">Email</label>
                               <input type="text" name="email" id="" class="form-control">
                               </div>
                               <div class="my-3">
                               <label for="" class="form-label">Gender</label>
                               <input type="text" name="gender" id="" class="form-control">
                               </div>
                               <div class="my-3">
                               <label for="" class="form-label">Address</label>
                               <input type="text" name="address" id="" class="form-control">
                               </div>
                               <div class="my-3">
                               <label for="" class="form-label">Age</label>
                               <input type="text" name="age" id="" class="form-control">
                               </div>
                              
                               
                               <div class="my-3">
                                <button class="btn btn-dark" name="add" type="submit">Add</button>

                               </div>
                            </form>
                        </div>
                       </div>
                        
                     
                      
                        
                    </div>
                </main>
      <?php
      include_once 'layouts/footer.php';
      
      ?>