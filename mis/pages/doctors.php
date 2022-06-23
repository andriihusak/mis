<!--Page Title-->
<head>
        <title>Doctors</title>
</head>

<?php
    include "../header.php";
?> 

<?php

    $sql = "SELECT `doctors`.`id`, `doctors`.`doctor_name`, `doctors`.`doctor_surname`, `specialization`.`doctor_spec`
            FROM `doctors`
            LEFT JOIN `specialization` ON `doctors`.`spec_id` = `specialization`.`id`
            ORDER BY `doctors`.`id` ASC;
        ";
    

    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_assoc($result);
    }
       
?>


   <!--Content-->
<body>
    <div class="content">
        <div class="container">
                    <div class="container-fluid px-4">
                        <h1 class="mt-3 mb-3">Doctors</h1>
                        

                        <div class="row">
                            <div class="col-md-7">
                                    <div class="card mb-4">
                                        
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col col-md-6">
                                                    <i class='bx bxs-user'></i> Doctors
                                                </div>
                                                <div class="col col-md-6" align="right">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            
                                            <div class="mt-1 mb-3"><a href="doctor-add.php">
                                                <input type="submit" name="save_button" class="btn btn-primary" value="Add new Doctor"/>
                                            </a></div>

                                            <table id="datatablesSimple">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Surname</th>
                                                        <th>Specialization</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Surname</th>
                                                        <th>Specialization</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>

                                                <tbody>
                                                    <?php
                                                    foreach($result as $row) {
                                                    echo '
                                                    <tr>
                                                        <th scope="row">'.$row["id"].'</th>
                                                        <td>'.$row["doctor_name"].'</td>
                                                        <td>'.$row["doctor_surname"].'</td>
                                                        <td>'.$row["doctor_spec"].'</td>
                                                        <td>
                                                            <button type="button" name="edit_button" class="btn btn-sm btn-primary"><a href="../pages/doctor-edit.php?editdoc='.$row["id"].'" class="text-light text-decoration-none">Edit</a></button>
                                                            <button type="button" name="delete_button" class="btn btn-danger btn-sm"><a href="../functions/delete.php?deletedoc='.$row["id"].'" class="text-light text-decoration-none">Delete</a></button>
                                                        </td>
                                                    </tr>
                                                    ';
                                                    }
                                                    ?>
                                                </tbody>

                                                
                                            </table>
                                        </div>

                                </div>

                            </div>
                        </div>
                    </div>


                    <?php
                        include "../footer.php";
                            ?> 
                    </div>
            </div>                    
    </div>
</body>


    