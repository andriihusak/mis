<!--Page Title-->
<head>
        <title>Edit Record</title>
</head>



<?php
include '../functions/db_conn.php';

if(isset($_GET['editid'])){
    $id = $_GET['editid'];
}

    $sql = "SELECT `records`.`record_id`, `specialization`.`doctor_spec`, `records`.`record_date`
            FROM `records` 
            LEFT JOIN `doctors` ON `records`.`doctor_id` = `doctors`.`id`
            LEFT JOIN `specialization` ON `doctors`.`spec_id` = `specialization`.`id`
            WHERE `records`.`record_id` = '$id'
            ORDER BY `records`.`record_id` ASC;
    ";
    $result = mysqli_query($conn, $sql);

    if($result){
        $row = mysqli_fetch_assoc($result);
    }

    $curr_type = $row['doctor_spec'];
    $curr_date = $row['record_date'];


function doctor_array()
	{
		$doctors = array(
			array(  'array_id'=> '1',
                    'type'=> 'Oculist',
                    'name'=> 'Peter Ostin'),

            array(  'array_id'=> '2',
                    'type'=> 'Pediatricians',
                    'name'=> 'Anna Marlow'),

            array(  'array_id'=> '3',
                    'type'=> 'Psychiatrists',
                    'name'=> 'Miguel O`khara'),

            array(  'array_id'=> '4',
                    'type'=> 'Surgeon',
                    'name'=> 'Jack Paul'),
		);	
		
		return $doctors;
	}

	function doctor_list()
	{
		$html = '
            <option value="">--Select Doctor--</option>
		';
		$data = doctor_array();
		foreach($data as $row)
		{
			$html .= '<option value="'.$row["array_id"].'">'.$row["type"].' - '.$row["name"].'</option>';
		}
		return $html;
	}

    if (isset($_POST['d-type']) || isset($_POST['date'])) {

        $curr_type = $_POST['d-type'];
        $curr_date = $_POST['date'];
    
        $sql2 = "UPDATE `records` SET `doctor_id` = '$curr_type', `record_date` = '$curr_date' WHERE `records`.`record_id` = $id";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            header("Location: edit-record.php?success=Record has been edited!");
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
                        <h1 class="mt-3 mb-3">Edit Record</h1>
                        <div class="row">
                            <div class="col-md-6">


                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $_GET['success']; ?></div>
                            <?php } ?>
                            
                                    <!--Editing Form-->
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class='bx bxs-pencil'></i> Edit Record
                                        </div>
                                        <div class="card-body">

                                                <form method="post">
                                                <div class="mb-3">
                                                    <label class="form-label">Doctors Type</label>
                                                    <select name="d-type" id="d-type" class="form-control">
                                                        <?php echo doctor_list(); ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Date</label>
                                                    <input type="text" name="date" id="date" class="form-control" value="<?php echo $curr_date ?>" />
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


    