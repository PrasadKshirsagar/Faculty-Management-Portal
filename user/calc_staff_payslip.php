<?php
include '../includes/connection.php';
session_start();
	
	if(isset($_SESSION['ID']) && isset($_POST['accept']) )
		{
			$staff_id = $_SESSION['ID'];
			$sql = "select * from staff_pay_roll_paper_trail where staff_id='".$_POST['staff_id']."' and pay_month='".$_POST['month']."' and pay_year='".$_POST['year']."'";
			$result = $conn->query($sql);
			if ($result->num_rows>0){
				$message = "Pay slip already created for this month,year for this staff";
				echo "<script> alert('$message');
				  window.location.href='staffmake_payslips.php';
				</script>";
			}
			else{
				$sql = "select * from staff_pay_roll where staff_id='".$_POST['staff_id']."' and pay_month='".$_POST['month']."' and pay_year='".$_POST['year']."'";
				$result = $conn->query($sql);
				if ($result->num_rows>0){
					$message = "Pay slip in pending for this month,year for this staff";
					echo "<script> alert('$message');
					  window.location.href='staffmake_payslips.php';
					</script>";
				}
				else{
					$sql = "select * from staff_cfti where goe='".$_POST['grade']."' and experience='".$_POST['experience']."'";
					$result = $conn->query($sql);
					$row  = $result->fetch_assoc();
					$salary = $row['salary'];
					$sql = "select * from staff_calendar where month1='".$_POST['month']."' and year1='".$_POST['year']."'";
					$result = $conn->query($sql);
					$bonus = 0;
					if ($result->num_rows>0){
						$row  = $result->fetch_assoc();
						$bonus = $row['bonus'];
					}
					$sql = "insert into staff_pay_roll values (".$_POST['staff_id'].",".$_POST['month'].",".$_POST['year'].",".$salary.",".$bonus.",".$staff_id.")";
					$result = $conn->query($sql);
					$message = "Pay slip added";
					echo "<script> alert('$message');
					  window.location.href='staffmake_payslips.php';
					</script>";
				}
			}
			
				 
			
		}
	
	else
		{
			$message = "Invalid Access";
			echo "<script> alert('$message');
			window.location.href='index.php';
			</script>";
        }
?>