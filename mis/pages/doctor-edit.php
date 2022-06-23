<!--Page Title-->
<head>
        <title>Edit Doctor</title>
</head>



<?php
include '../functions/db_conn.php';

if(isset($_GET['editdoc'])){
    $id = $_GET['editdoc'];
}

    $sql = "SELECT `doctors`.`id`, `doctors`.`doctor_name`, `doctors`.`doctor_surname`, `specialization`.`doctor_spec`
            FROM `doctors` 
            LEFT JOIN `specialization` ON `doctors`.`spec_id` = `specialization`.`id`
            WHERE `doctors`.`id` = '$id'
            ORDER BY `doctors`.`id` ASC;
    ";
    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_assoc($result);
    }

    $curr_name = $row['doctor_name'];
    $curr_sname = $row['doctor_surname'];


function doctor_array()
	{
		$doctors = array(
			array(  'array_id'=> '1',
                    'type'=> 'Oculist'),

            array(  'array_id'=> '2',
                    'type'=> 'Pediatricians'),

            array(  'array_id'=> '3',
                    'type'=> 'Psychiatrists'),

            array(  'array_id'=> '4',
                    'type'=> 'Surgeon'),
		);	
		
		return $doctors;
	}

	function doctor_list()
	{
		$html = '
            <option value="">--Select Type--</option>
		';
		$data = doctor_array();
		foreach($data as $row)
		{
			$html .= '<option value="'.$row["array_id"].'">'.$row["type"].'</option>';
		}
		return $html;
	}

    if (isset($_POST['name']) || isset($_POST['surname']) || isset($_POST['d-type'])) {

        $curr_name = $_POST['name'];
        $curr_sname = $_POST['surname'];
        $curr_type = $_POST['d-type'];
    
        $sql2 = "UPDATE `doctors` SET `doctor_name` = '$curr_name', `doctor_surname` = '$curr_sname', `spec_id` = '$curr_type' WHERE `doctors`.`id` = $id";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            header("Location: doctor-edit.php?success=Record has been edited!");
        }
    
    }


?>

<?php
    include "../header.php";
?> 

   <!--Content-->
   <body>
    <div class="content">
        <div class="container">
                    <div class="container-fluid px-4">
                        <h1 class="mt-3 mb-3">Edit Doctor</h1>
                        <div class="row">
                            <div class="col-md-6">


                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $_GET['success']; ?></div>
                            <?php } ?>
                            
                                    <!--Editing Form-->
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class='bx bxs-pencil'></i> Edit Doctor Info
                                        </div>
                                        <div class="card-body">

                                                <form method="post">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $curr_name ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Surname</label>
                                                    <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $curr_sname ?>" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Doctors Type</label>
                                                    <select name="d-type" id="d-type" class="form-control">
                                                        <?php echo doctor_list(); ?>
                                                    </select>
                                                </div>
                                                <div class="mt-4 mb-0">
                                                    <input type="submit" name="edit_button" class="btn btn-primary" value="Edit" />
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


    