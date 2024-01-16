<?php
include_once __DIR__."/../model/doctor_model.php";

class DoctorsController extends Doctors{
    public function getDoctors(){
        $results=$this->getDoctor();
        return $results;
        
    }
    public function addDoctor($specialization,$name,$image,$address,$phone,$email){
        $result=$this->addDoctors($specialization,$name,$image,$address,$phone,$email);
        return $result;
    }

    public function deleteDoctors($id){
        $result=$this->deleteDoctor($id);
        return $result;
    }

    public function editDoctor($id){
        $result=$this->editDoctors($id);
        return $result;
    }
    public function updateDoctors($id,$name,$phone,$email,$image,$address,$special){
        $result=parent::updateDoctors($id,$name,$phone,$email,$image,$address,$special);
        return $result;
    }
    
}