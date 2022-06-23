<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../css/login1.css">
         
    <title>Sign Up</title>
</head>
<body>

    <div class="back-button">
        <a href="../Home.html">
            <i class="uil uil-arrow-left"></i>
        </a>
    </div>
    
    <div class="container">
        <div class="forms">

            <!-- Login Form -->
            <div class="form login">
                <span class="title">Login</span>

                <form action="../functions/login.php" method="post">

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>


                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>

                    <div class="input-field button">
                        <button type="submit">Login</button>
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not registred yet?
                        <a href="#" class="text signup-link">Signup now</a>
                    </span>
                </div>
            </div>


            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>

                <form action="../functions/signup.php" method="post">
                    
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>


                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" name="name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text"  placeholder="Enter your surname" name="surname" required>
                        <i class="uil uil-user"></i>
                    </div>


                    <div class="input-field button">
                        <button type="submit">Register</button>
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already have an account?
                        <a href="#" class="text login-link">Login now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/login.js"></script>

</body>
</html>