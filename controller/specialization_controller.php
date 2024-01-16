<?php
include_once __DIR__."/../model/specialization_model.php";

class SpecializationsController extends Specialization{
    public function getSpecializations(){
        $speciality=$this->getSpeciality();
        return $speciality;
    }
  public function addSpecialization($name,$parent){
    $results=$this->addSpecial($name,$parent);
    return $results;
  }

  public function getSpecialization($id){
    $special=$this->getSpecial($id);
    return $special;
  }

  public function UpdateSpecialization($id,$name,$parent){
    $results=$this->UpdateSpecial($id,$name,$parent);
    return $results;
  }

  public function deleteSpecialization($id){
    $results=$this->deleteSpecial($id);
    return $results;

  }

  public function getSpecializationsPage($page){
    $result=parent::getSpecializationPage($page);
    return $result;
  }

}

?>