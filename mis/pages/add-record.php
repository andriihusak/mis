<!--Page Title-->
<head>
        <title>Add Record</title>
</head>

<?php
    include "../header.php";
?> 

<?php

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


?>


   <!--Content-->
   <body>
    <div class="content">
        <div class="container">
                    <div class="container-fluid px-4">
                        <h1 class="mt-3 mb-3">Add Record</h1>
                        <div class="row">
                            <div class="col-md-4">

                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo $_GET['success']; ?></div>
                            <?php } ?>
                            
                                    <!--Adding Form-->
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <i class='bx bxs-pencil' ></i> Add new Record
                                        </div>
                                        <div class="card-body">

                                            <form method="post" action="../functions/add_record.php">
                                                <div class="mb-3">
                                                    <label class="form-label">Doctors Type</label>
                                                    <select name="d-type" id="email" class="form-control">
                                                        <?php echo doctor_list(); ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Date</label>
                                                    <input type="text" name="date" id="date" class="form-control"/>
                                                </div>

                                                <div class="mt-4 mb-0">
                                                    <input type="submit" name="save_button" class="btn btn-primary" value="Add Record" />
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


    