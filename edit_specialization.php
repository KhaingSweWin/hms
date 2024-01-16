<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/specialization_controller.php';

$spe_controller=new SpecializationsController();
$results=$spe_controller->getSpecializations();
$id=$_GET['id'];
$result=$spe_controller->getSpecialization($id);
if(isset($_POST['update'])){
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    $parent=$_POST['parent'];
    $update_result=$spe_controller->UpdateSpecialization($id,$name,$parent);
    if($update_result){
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
                               <input type="text" name="name" id="" class="form-control" value="<?php echo $result['specialization'];?>">
                               </div>
                               <div class="my-3">
                                <label for="" class="form-label">Parent</label>
                                <select name="parent" id="" class="form-select">
                                    <?php
                                    echo "<option value='0'>No Parent</option>";
                                    for ($row=0; $row <count($results) ; $row++) { 
                                        if ($results[$row]['parent']==0) {
                                            if($result['parent']==$results[$row]['id'])
                                            echo "<option value='".$results[$row]['id']."' selected>".$results[$row]['specialization']."</option>";
                                            else
                                            echo "<option value='".$results[$row]['id']."'>".$results[$row]['specialization']."</option>";

                                        }
                       
                                    }

                                    ?>

                                </select>

                               </div>
                               <div class="my-3">
                                <button class="btn btn-dark" name="update" type="submit">Update</button>

                               </div>
                            </form>
                        </div>
                       </div>
                        
                     
                      
                        
                    </div>
                </main>
      <?php
      include_once 'layouts/footer.php';
      
      ?>