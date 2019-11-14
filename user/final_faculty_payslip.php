<?php
include '../includes/connection.php';
session_start();
	
	if(isset($_SESSION['ID']) && isset($_POST['accept']) )
		{
			$sql = "insert into pay_roll_paper_trail values (".$_POST['faculty_id'].",".$_POST['month'].",".$_POST['year'].",".$_POST['salary'].",".$_POST['bonus'].",".$_POST['generated_by'].")";	 
			$result = $conn->query($sql);
			$sql = "delete from pay_roll where faculty_id=".$_POST['faculty_id']." and pay_month=".$_POST['month']." and pay_year=".$_POST['year'];
			$result = $conn->query($sql);
			$message = "pay roll sent out";
			echo "<script> alert('$message');
			  window.location.href='confirmfaculty_payslips.php';
			</script>";
		}
	
	else
		{
			$message = "Invalid Access";
			echo "<script> alert('$message');
			window.location.href='index.php';
			</script>";
        }
?>