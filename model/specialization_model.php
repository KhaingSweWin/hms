<?php
include_once __DIR__."/../includes/db.php";
class Specialization{
    private $cont;
    public function getSpeciality(){
        //1.Connection
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select*from specialization";
        $statement=$this->cont->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function addSpecial($name,$parent){
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql='insert into specializations(specialization,parent) values(:name,:parent)';
        $statement=$this->cont->prepare($sql);
        $statement->bindParam(":name",$name);
        $statement->bindParam(":parent",$parent);

        if($statement->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function getSpecial($id){
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select*from specializations where id=:id";
        $statement=$this->cont->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
       
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function UpdateSpecial($id,$name,$parent){
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="update specializations set specialization=:name,parent=:parent where id=:id";
        $statement=$this->cont->prepare($sql);
        $statement->bindparam(":id",$id);
        $statement->bindparam(":name",$name);
        $statement->bindparam(":parent",$parent);

          return   $statement->execute();
       

    }

    public function deleteSpecial($id){
       try{
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="delete from specializations where id=:id";
        $statement=$this->cont->prepare($sql);
        $statement->bindparam(":id",$id);
        return $statement->execute();
       }
       catch(PDOException $e){
        return false;
       }
       

    }

    public function getSpecializationPage($page){
        $item_page=3;
        $offset=($page-1) * $item_page;
        $this->cont=Database::connect();
        $this->cont->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.sql statement
        $sql="select*from specialization limit $offset, $item_page ";
        $statement=$this->cont->prepare($sql);
       // $statement->bindParam(":id",$id);
        $statement->execute();
       
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}


?>