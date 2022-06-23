<!--Page Title-->
<head>
        <title>Add Doctor</title>
</head>

<?php
    include "../header.php";
?> 

<?php

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

    $d_type = $row["array_id"];

?>


   <!--Content-->
   <body>
    <div class="content">
        <div class="container">
                    <div class="container-fluid px-4">
                        <h1 class="mt-3 mb-3">Add Doctor</h1>
                        <div class="row">
                            <div class="col-md-4">

                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $_GET['success']; ?></div>
                            <?php } ?>
                            
                                    <!--Adding Form-->
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class='bx bxs-pencil'></i> Add new Doctor
                                        </div>
                                        <div class="card-body">

                                            <form method="post" action="../functions/add_doctor.php">
                                                <div class="mb-3">
                                                    <label class="form-label">Doctor Name</label>
                                                    <input type="text" name="name" id="name" class="form-control"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Doctor Surname</label>
                                                    <input type="text" name="surname" id="surname" class="form-control"/>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Doctors Type</label>
                                                    <select name="d-type" id="email" class="form-control">
                                                        <?php echo doctor_list(); ?>
                                                    </select>
                                                </div>

                                                <div class="mt-4 mb-0">
                                                    <input type="submit" name="save_button" class="btn btn-primary" value="Add Doctor" />
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


    