<?php
include_once 'controller/patient_controller.php';

$pat_controller=new PatientsController();
$id=$_POST['id'];
$result=$pat_controller->deletePatients($id);
if($result){
    echo 'unsuccess';
}
else{
    echo 'success';
}


?>