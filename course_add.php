<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'course.php';
	}

	if(isset($_POST['submit'])){			
		   // 🔹 Replace these with your actual input fields and columns
    $column1 = $_POST['column1_name'];
    $column2 = $_POST['column2_name'];


		  // 🔹 Replace [table name] and [columns] with your actual table and fields
    $sql = "INSERT INTO [table name] ([column1], [column2]) VALUES ('$column1', '$column2')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'New course have been created.';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	

	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	//header('location: clientAccount.php?q='.$_POST['id']);
	header('location:'.$return);
?>