<?php
include_once __DIR__."/../includes/db.php";
class Patients{
    private $cont;
    public function getPatient(){
        //1.Connection
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select*from patients";
        $statement=$this->cont->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function editPatient($id){
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select*from patients where id=:id";
        $statement=$this->cont->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
       
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updatePatient($id,$name,$phone,$email,$address,$gender,$age){
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="update patients set name=:name,phone=:phone,email=:email,address=:address,gender=:gender,age=:age where id=:id";
        $statement=$this->cont->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->bindparam(":name",$name);
        $statement->bindparam(":phone",$phone);
        $statement->bindparam(":email",$email);
        $statement->bindparam(":address",$address);
        $statement->bindparam(":gender",$gender);
        
       
        $statement->bindparam(":age",$age);

          return   $statement->execute();

    }

    public function addPatient($name,$phone,$email,$address,$gender,$age){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='insert into patients(name,phone,email,address,gender,age) values(:name,:phone,:email,:address,:gender,:age)';
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":email",$email);
        $statement->bindParam(":address",$address);
        $statement->bindParam(":gender",$gender);
        $statement->bindParam(":age",$age);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function deletePatient($id){
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement,
        $sql="delete from patients where id=:id";
        $statement=$this->cont->prepare($sql);
        $statement->bindParam(':id',$id);
         return $statement->execute();
    }
}