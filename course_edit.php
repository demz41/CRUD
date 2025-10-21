<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'course.php';
	}

	if(isset($_POST['submit'])){
		$ID 		= $_POST['id'];
		 // 🔹 Replace these field names with your actual column names
    $column1 = $_POST['column1_name'];
    $column2 = $_POST['column2_name'];
    // Add more as needed

    // 🔹 Replace [table name] and [table id] with your actual table and ID column
    $sql = "UPDATE [table name] 
            SET [column1] = '$column1',
                [column2] = '$column2'
            WHERE [table id] = '$ID'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Course updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select recird to edit first';
	}

	header('location:'.$return);
?>