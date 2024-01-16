<?php
session_start();
include_once 'layouts/header.php';
include_once 'controller/specialization_controller.php';

$spe_controller=new SpecializationsController();
$results=$spe_controller->getSpecializations();
$page=1;
$item_page=3;
$total_page=ceil(count($results)/$item_page);
$previous=$page-1;
$next=$page+1;

if(isset($_GET['page']) && $_GET['page']>0){
   // $item_page=15;
    $page=$_GET['page'];
}
else{
    $page=1;
}
$results_page=$spe_controller->getSpecializationsPage($page);



?>
                 <main>
                    <div class="container">
                    
                       <div class="row">
                        <div class="col-md-9"></div>
                       <div class="col-md-3">
                       <a href="create_specialization.php" class="btn btn-dark"> Add New Specialization</a>
                       </div>
                       </div>
                       <div class="row">
                        <div class="col-md-12">
                           
                            <?php
                             if(isset($_SESSION['message'])){
                                echo '<span class="alert alert-danger">'.$_SESSION['message'].'</span>';
                                session_destroy();
                             }

                            ?>

                        </div>
                       </div>
                        
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <table class="table table-striped">
                                    <thead>
                                       <th>No</th>
                                        <th>Specialization</th>
                                        <th>Parent Specialization</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a=1;
                                        $count=$a+($page-1) * $item_page;
                                        for ($row=0; $row <count($results_page) ; $row++) { 
                                            echo "<tr>";
                                           echo "<td>". ($row+$count) ."</td>"; 
                                            echo "<td>". $results_page[$row]['specialization'] ."</td>";
                                            if($results_page[$row]['parent']==0){
                                                echo "<td>-</td>";
                                            }
                                            else{
                                                for ($index=0; $index <count($results) ; $index++) { 
                                                    if ($results_page[$row]['parent']==$results[$index]['id']) {
                                                        echo "<td>". $results[$index]['specialization'] ."</td>";
                                                        
                                                    }
                                                    
                                                }
                                            }
                                            echo "<td><a href='edit_specialization.php?id=".$results[$row]['id']."' class='btn btn-warning mx-2'>Edit</a><a href='delete_specialization.php?id=".$results[$row]['id']."' class='btn btn-danger mx-2'>Delete</a></td>";
                                            echo "</tr>";
                                            
                                            
                                        }



                                            ?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-1"></div>
                        </div>
                      <div class="row">
                      <ul class="pagination">
                        <?php
                        if($page<=1){
                            echo ' <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                          </li>';
                        }
                        else{
                            echo ' <li class="page-item">
                            <a class="page-link" href="specializations.php?page='.$previous.'">Previous</a>
                          </li>';
                        }

                        ?>
   
   <?php
   for ($index=1; $index <=$total_page ; $index++) { 
    if($page==$index){
        echo ' <li class="page-item active"><a class="page-link" href="specializations.php?page='.$index.'">'.$index.'</a></li>';

    }
    else{
        echo ' <li class="page-item "><a class="page-link" href="specializations.php?page='.$index.'">'.$index.'</a></li>';

    }
   
   }
   ?>
   <?php
   if($page>=$total_page){
    echo ' <li class="page-item disabled">
    <a class="page-link" href="#">Next</a>
  </li>';
   }
   else{
    echo ' <li class="page-item ">
    <a class="page-link" href="specializations.php?page='.$next.'">Next</a>
  </li>';
   }


        ?>
     
  </ul>
                      </div>
                        
                    </div>
                </main>
      <?php
      include_once 'layouts/footer.php';
      
      ?>