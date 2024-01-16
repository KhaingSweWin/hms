<?php
include_once 'layouts/header.php';
include_once 'controller/patient_controller.php';


$pat_controller=new PatientsController();
$results=$pat_controller->getPatients();


?>
                
            <div id="layoutSidenav_content">
                <main>
                <div class="row">
                        <div class="col-md-9"></div>
                       <div class="col-md-3">
                       <a href="create_patient.php" class="btn btn-dark"> Add New Patients</a>
                       </div>
                       </div>
                   <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table class="table table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>Action</th>
                                
                            </thead>
                            <tbody id='body'>
                                <?php
                              for ($row=0; $row <count($results); $row++) { 
                                echo "<tr>";
                               
                                echo "<td>". $results[$row]['name'] ."</td>";
                                echo "<td>". $results[$row]['phone'] ."</td>";
                                echo "<td>". $results[$row]['email'] ."</td>";
                               echo "<td>". $results[$row]['gender'] ."</td>";
                                echo "<td>". $results[$row]['address'] ."</td>";
                                
                                echo "<td>". $results[$row]['age'] ."</td>";
                                echo "<td id='".$results[$row]['id']."'><a href='edit_patient.php?id=".$results[$row]['id']."' class='btn btn-warning mx-2'>Edit</a> <button class='btn btn-danger delete'>Delete</button></td>";
                                
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
