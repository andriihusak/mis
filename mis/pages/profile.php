<!--Page Title-->
<head>
        <title>Profile</title>
</head>

<?php
    include "../header.php";
?> 


   <!--Content-->
   <body>
    <div class="content">
        <div class="container">
                    <div class="container-fluid px-4">
                        <h1 class="mt-3 mb-3">Profile</h1>
                        <div class="row">
                            <div class="col-md-6">


                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert"><ul class="list-unstyled"><?php echo $_GET['error']; ?></ul></div>
                            <?php } ?>

                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $_GET['success']; ?></div>
                            <?php } ?>
                            
                                    <!--Editing Form-->
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-user-edit"></i> Edit Profile Details
                                        </div>
                                        <div class="card-body">

                                            <form method="post" action="../functions/profile_rename.php">
                                                <div class="mb-3">
                                                    <label class="form-label">Email Address</label>
                                                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $_SESSION['user_email']; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" name="password" id="password" class="form-control" value="<?php echo $_SESSION['user_password']; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['user_name']; ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Surname</label>
                                                    <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $_SESSION['user_surname']; ?>" />
                                                </div>
                                                <div class="mt-4 mb-0">
                                                    <input type="submit" name="save_button" class="btn btn-primary" value="Edit" />
                                                </div>
                                            </form>

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


    