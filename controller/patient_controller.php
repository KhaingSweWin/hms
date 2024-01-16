<?php
include_once __DIR__."/../model/patient_model.php";

class PatientsController extends Patients{
    public function getPatients(){
        $results=$this->getPatient();
        return $results;
        
    }
    public function updatePatients($id,$name,$phone,$email,$address,$gender,$age){
        $results=$this->updatePatient($id,$name,$phone,$email,$address,$gender,$age);
        return $results;
    }
    public function deletePatients($id){
        $results=$this->deletePatient($id);
        return $results;
    }
    public function addPatients($name,$phone,$email,$address,$gender,$age){
        $results=$this->addPatient($name,$phone,$email,$address,$gender,$age);
        return $results;
    }
    
}