<?php
include_once 'controller/doctor_controller.php';

$doctor_controller=new DoctorsController();
$id=$_POST['id'];
$result=$doctor_controller->deleteDoctors($id);
if($result){
    echo 'unsuccess';
}
else{
    echo 'success';
}


?>