<?php
session_start();
include_once 'controller/specialization_controller.php';

$spe_controller=new SpecializationsController();
$id=$_GET['id'];
$result=$spe_controller->deleteSpecialization($id);
if($result){
    header('location:specializations.php');
}
else{
    $_SESSION['message']='It cannot be deleted';
    header('location:specializations.php');
}



?>