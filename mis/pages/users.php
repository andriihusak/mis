<!--Page Title-->
<head>
        <title>Users</title>
</head>

<?php
    include "../header.php";
?> 

<?php

    $sql = "SELECT `users`.`id`, `users`.`user_email`, `users`.`user_name`, `users`.`user_surname`, `users`.`user_role`
            FROM `users`
            ORDER BY `users`.`id` ASC;
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
                        <h1 class="mt-3 mb-3">Users</h1>
                        

                        <div class="row">
                            <div class="col-md-7">
                                    <div class="card mb-4">
                                        
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col col-md-6">
                                                    <i class='bx bxs-user'></i> Users
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
                                                        <th>Email</th>
                                                        <th>Name</th>
                                                        <th>Surname</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Email</th>
                                                        <th>Name</th>
                                                        <th>Surname</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </tfoot>

                                                <tbody>
                                                    <?php
                                                    foreach($result as $row) {

                                                        $user_role = '';
                                                        if($row['user_role'] == 'admin')
                                                        {
                                                            $user_role = '<span class="badge bg-primary">Admin</span>';
                                                        }
                                                        else
                                                        {
                                                            $user_role = '<span class="badge bg-success">User</span>';
                                                        }

                                                    echo '
                                                    <tr>
                                                        <th scope="row">'.$row["id"].'</th>
                                                        <td>'.$row["user_email"].'</td>
                                                        <td>'.$row["user_name"].'</td>
                                                        <td>'.$row["user_surname"].'</td>
                                                        <td ms-1>'.$user_role.'</td>
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


    