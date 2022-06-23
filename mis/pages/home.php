<!--Page Title-->
<head>
        <title>Home</title>
</head>

<?php
    include "../header.php";
    ?> 


   <!--Content-->
    <div class="content">
        <div class="container">

            <div class="home_title">
                <h1>Hello, <i><?php echo $_SESSION['user_name'];?></i></h1>
                <h2>Let's start the work!</h2>
            </div>

            <?php
                include "../footer.php";
            ?> 
            </div>
        </div>
        
       

