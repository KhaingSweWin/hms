<?php
include_once __DIR__."/../includes/db.php";
class Doctors{
    private $cont;
    public function getDoctor(){
        //1.Connection
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select*from doctors";
        $statement=$this->cont->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function addDoctors($specialization,$name,$image,$address,$phone,$email){
        $this->pdo=Database::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='insert into doctors(specialization_id,name,image,address,phone,email) values(:specialization,:name,:image,:address,:phone,:email)';

        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":specialization",$specialization);
        $statement->bindParam(":name",$name);
        $statement->bindparam(":image",$image);
        $statement->bindParam(":address",$address);
        $statement->bindParam(":phone",$phone);
        $statement->bindParam(":email",$email);
       
        

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function deleteDoctor($id){
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement,
        $sql="delete from doctors where id=:id";
        $statement=$this->cont->prepare($sql);
        $statement->bindParam(':id',$id);
         return $statement->execute();
      

    }

    public function editDoctors($id){
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select * from doctors where id=:id";
        $statement=$this->cont->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
       
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateDoctors($id,$name,$phone,$email,$image,$address,$special){
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="update doctors set specialization_id=:id,name=:name,address=:address,phone=:phone,email=:email,image=:image where id=:id";
        $statement=$this->cont->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->bindparam(":name",$name);
        $statement->bindparam(":address",$address);
        $statement->bindparam(":email",$email);
        $statement->bindparam(":phone",$phone);
        $statement->bindparam(":image",$image);
        $statement->bindParam(":specialization_id",$special);
          return   $statement->execute();
    }

    }
