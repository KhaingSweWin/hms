<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/specialization_controller.php';

$spe_controller=new SpecializationsController();
$results=$spe_controller->getSpecializations();

if(isset($_POST['add'])){
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    $parent=$_POST['parent'];
    $result=$spe_controller->addSpecialization($name,$parent);
    if($result){
        header('location:specializations.php');
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
                               <label for="" class="form-label">Specialization Name</label>
                               <input type="text" name="name" id="" class="form-control">
                               </div>
                               <div class="my-3">
                                <label for="" class="form-label">Parent</label>
                                <select name="parent" id="" class="form-select">
                                    <?php
                                    echo "<option value='0'>No Parent</option>";
                                    for ($row=0; $row <count($results) ; $row++) { 
                                        if ($results[$row]['parent']==0) {
                                            echo "<option value='".$results[$row]['id']."'>".$results[$row]['specialization']."</option>";
                                            
                                        }
                       
                                    }

                                    ?>

                                </select>

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