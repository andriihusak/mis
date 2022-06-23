<!--Page Title-->
<head>
        <title>Calendar</title>
</head>

<?php
    include "../header.php";
?> 

<?php

    $curr = $_SESSION['user_id'];

    if($_SESSION['user_role'] === 'admin'){ 
        $sql = "SELECT `records`.`record_id`, `users`.`user_name`, `users`.`user_surname`, `doctors`.`doctor_name`, `doctors`.`doctor_surname`, `specialization`.`doctor_spec`, `records`.`record_date`
                FROM `records` 
                LEFT JOIN `users` ON `records`.`user_id` = `users`.`id` 
                LEFT JOIN `doctors` ON `records`.`doctor_id` = `doctors`.`id`
                LEFT JOIN `specialization` ON `doctors`.`spec_id` = `specialization`.`id`
                ORDER BY `records`.`record_id` ASC;
            ";
    }else{
        $sql = "SELECT `records`.`record_id`, `records`.`user_id`, `doctors`.`doctor_name`, `doctors`.`doctor_surname`, `specialization`.`doctor_spec`, `records`.`record_date`
                FROM `records` 
                LEFT JOIN `doctors` ON `records`.`doctor_id` = `doctors`.`id`
                LEFT JOIN `specialization` ON `doctors`.`spec_id` = `specialization`.`id`
                WHERE `records`.`user_id` = '$curr'
                ORDER BY `records`.`record_id` ASC;
            ";
    } 
    

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

                        <?php if($_SESSION['user_role'] === 'admin'){ ?>
                            <h1 class="mt-3 mb-3">All Records</h1>
                        <?php }else{ ?>
                            <h1 class="mt-3 mb-3">Calendare</h1>
                        <?php } ?>

                        <div class="row">
                            <div class="col-md-8">
                                    <div class="card mb-4">
                                        

                                    <!--ADMIN CALENDAR-->
                                    <?php if($_SESSION['user_role'] === 'admin'){ ?>

                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col col-md-6">
                                                    <i class="fas fa-table me-1"></i> All Records
                                                </div>
                                                <div class="col col-md-6" align="right">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <table id="datatablesSimple">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>User</th>
                                                        <th>Doctor</th>
                                                        <th>Doctor Specific</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>User</th>
                                                        <th>Doctor</th>
                                                        <th>Doctor Specific</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>

                                                <tbody>
                                                    <?php
                                                    foreach($result as $row) {
                                                    echo '
                                                    <tr>
                                                        <th scope="row">'.$row["record_id"].'</th>
                                                        <td>'.$row["user_name"],' ', $row["user_surname"].'</td>
                                                        <td>'.$row["doctor_name"],' ', $row["doctor_surname"].'</td>
                                                        <td>'.$row["doctor_spec"].'</td>
                                                        <td>'.$row["record_date"].'</td>
                                                        <td>
                                                            <button type="button" name="edit_button" class="btn btn-sm btn-primary"><a href="../pages/edit-record.php?editid='.$row["record_id"].'" class="text-light text-decoration-none">Edit</a></button>
                                                            <button type="button" name="delete_button" class="btn btn-danger btn-sm"><a href="../functions/delete.php?deleteid='.$row["record_id"].'" class="text-light text-decoration-none">Delete</a></button>
                                                        </td>
                                                    </tr>
                                                    ';
                                                    }
                                                    ?>
                                                    </tbody>

                                                
                                            </table>
                                        </div>

                                    <?php }else{ ?>

                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col col-md-6">
                                                        <i class="fas fa-table me-1"></i> Calendare
                                                    </div>
                                                    <div class="col col-md-6" align="right">
                                                    </div>
                                                </div>
                                            </div>


                                        <!--USER CALENDAR-->
                                        <div class="card-body">
                                            <table id="datatablesSimple">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Doctor</th>
                                                        <th>Doctor Specific</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Doctor</th>
                                                        <th>Doctor Specific</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>

                                                <tbody>
                                                    <?php
                                                    foreach($result as $row) {
                                                    echo '
                                                    <tr>
                                                        <th scope="row">'.$row["record_id"].'</th>
                                                        <td>'.$row["doctor_name"],' ', $row["doctor_surname"].'</td>
                                                        <td>'.$row["doctor_spec"].'</td>
                                                        <td>'.$row["record_date"].'</td>
                                                        <td>
                                                        <button type="button" name="edit_button" class="btn btn-sm btn-primary"><a href="../pages/edit-record.php?editid='.$row["record_id"].'" class="text-light text-decoration-none">Edit</a></button>
                                                            <button type="button" name="delete_button" class="btn btn-danger btn-sm"><a href="../functions/delete.php?deleteid='.$row["record_id"].'" class="text-light text-decoration-none">Delete</a></button>
                                                        </td>
                                                    </tr>
                                                    ';
                                                    }
                                                    ?>
                                                    </tbody>

                                                
                                            </table>
                                        </div>
                                    
                                    <?php } ?>


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


    