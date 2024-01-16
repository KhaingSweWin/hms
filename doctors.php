<?php
include_once 'layouts/header.php';
include_once 'controller/doctor_controller.php';
include_once 'controller/specialization_controller.php';

$doc_controller=new DoctorsController();
$results=$doc_controller->getDoctors();

$spe_controller=new SpecializationsController();
$special=$spe_controller->getSpecializations();
?>
                
            <div id="layoutSidenav_content">
                <main>
                <div class="row">
                        <div class="col-md-9"></div>
                       <div class="col-md-3">
                       <a href="create_doctor.php" class="btn btn-dark"> Add New Doctors</a>
                       </div>
                       </div>
                   <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table class="table table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Specialization</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id='tbody'>
                                <?php
                              for ($row=0; $row <count($results); $row++) { 
                                echo "<tr>";
                               
                                echo "<td>". $results[$row]['name'] ."</td>";
                               
                                for ($index=0; $index <count($special) ; $index++) { 
                                   if($special[$index]['id']==$results[$row]['specialization_id']){
                                    echo "<td>". $special[$index]['specialization'];
                                }
                                }
                                echo "<td>". $results[$row]['address'] ."</td>";
                                echo "<td>". $results[$row]['phone'] ."</td>";
                                echo "<td>". $results[$row]['email'] ."</td>"; 
                                echo "<td>
                                <img src='uploads/".$results[$row]["image"]."' alt='' style='width: 50px; height: 50px;'>
                                </td>";
                                echo "<td id='".$results[$row]['id']."'><a href='edit_doctor.php?id=".$results[$row]['id']."' class='btn btn-warning mx-2'>Edit</a> <button class='btn btn-danger delete'>Delete</button></td>";
                                
                                echo "</tr>";
                              }

                                ?>
                            </tbody>

                        </table>

                    </div>
                    <div class="col-md-1"></div>
                   </div>
                </main>
               <?php
               include_once 'layouts/footer.php'



?>
