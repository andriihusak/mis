<?php
    include "functions/db_conn.php";
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Information System</title>

    <!--CSS-->
    <link rel="stylesheet" href="../css/style.css">

    <!--Boxicons Connect-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!--Favicon-->
    <link rel="shortcut icon" href="../img/logo.png">

    <!--Bootstrap-->
    <link href="../css/simple-datatables-style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="../js/font-awesome-5-all.min.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Header -->
    <div class="header">
        <div class="container"> 

            <div class="logo_field">
                <a href="home.php"><img src="../img/logo.png" alt="none"></a>
                <a href="home.php" id="logo_name">MIS</a>
            </div>    

            <div class="profile_field">

                    <ul class="toogle_bar">
                        <li id="toogle-bar">
                            <a href="#">Profile</a>
                            <i class='bx bxs-chevron-down' ></i>
                            <ul class="dropmenu">

                                <li>
                                    <ul class="prof_info">
                                        <li id="prof_photo">
                                            <img src="../img/user_logo.png" alt="">
                                        </li>
                                        <li id="prof_status">
                                            <h1><i>Email: </i><?php echo $_SESSION['user_email'];?></h1> 

                                            <?php if($_SESSION['user_role'] === 'admin'){ ?>
                                            <h2><i>Status: </i><?php echo $_SESSION['user_role'];?></h2>

                                            <?php }else{ ?>
                                            <h3><i>Status: </i><?php echo $_SESSION['user_role'];?></h3>
                                            <?php } ?> 
                                            
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="../pages/profile.php">
                                        <i class='bx bx-edit' ></i>
                                        <span>Edit Profile</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="../functions/logout.php">
                                        <i class='bx bx-exit' ></i>
                                        <span>Log Out</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                

            </div>
        </div>
    </div>


     <!-- Nav Side-bar -->
     <div class="sidebar">
        <div class="container">


            <?php if($_SESSION['user_role'] === 'admin'){ ?>                                   
            
                <ul class="sb-nav_list">
                <li>
                    <a href="../pages/calendar.php">
                        <i class='bx bx-calendar bx-sm' ></i>
                        <span >All Records</span>
                    </a>
                </li>

                <li>
                    <a href="../pages/users.php">
                        <i class='bx bxs-user bx-sm'></i>
                        <span >Users</span>
                    </a>
                </li>

                <li>
                    <a href="../pages/doctors.php">
                        <i class='bx bx-plus-medical bx-sm'></i>
                        <span>Doctors</span>
                    </a>
                </li>
                </ul>

                <ul class="log_out_a">
                    <li>
                        <a href="../functions/logout.php">
                            <i class='bx bx-exit bx-sm' ></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            
            <?php }else{ ?>

                <ul class="sb-nav_list" >
                <li>
                    <a href="../pages/add-record.php">
                        <i class='bx bx-plus bx-sm'></i>
                        <span>New Record</span>
                    </a>
                </li>

                <li>
                    <a href="../pages/calendar.php">
                        <i class='bx bx-calendar bx-sm' ></i>
                        <span >Calendar</span>
                    </a>
                </li>
                </ul>

                <ul class="log_out_u">
                    <li>
                        <a href="../functions/logout.php">
                            <i class='bx bx-exit bx-sm' ></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>


            <?php } ?> 

        </div>
    </div>

