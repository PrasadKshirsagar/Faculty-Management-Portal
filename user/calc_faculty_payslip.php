<?php
include '../includes/connection.php';
session_start();
	
	if(isset($_SESSION['ID']) && isset($_POST['accept']) )
		{
			$staff_id = $_SESSION['ID'];
			$sql = "select * from pay_roll_paper_trail where faculty_id='".$_POST['faculty_id']."' and pay_month='".$_POST['month']."' and pay_year='".$_POST['year']."'";
			$result = $conn->query($sql);
			if ($result->num_rows>0){
				$message = "Pay slip already created for this month,year for this faculty";
				echo "<script> alert('$message');
				  window.location.href='faculty_payslips.php';
				</script>";
			}
			else{
				$sql = "select * from pay_roll where faculty_id='".$_POST['faculty_id']."' and pay_month='".$_POST['month']."' and pay_year='".$_POST['year']."'";
				$result = $conn->query($sql);
				if ($result->num_rows>0){
					$message = "Pay slip in pending for this month,year for this faculty";
					echo "<script> alert('$message');
					  window.location.href='faculty_payslips.php';
					</script>";
				}
				else{
					$sql = "select * from prof_cfti where goe='".$_POST['grade']."' and experience='".$_POST['experience']."'";
					$result = $conn->query($sql);
					$row  = $result->fetch_assoc();
					$salary = $row['salary'];
					$sql = "select * from calendar where month1='".$_POST['month']."' and year1='".$_POST['year']."'";
					$result = $conn->query($sql);
					$bonus = 0;
					if ($result->num_rows>0){
						$row  = $result->fetch_assoc();
						$bonus = $row['bonus'];
					}
					$sql = "insert into pay_roll values (".$_POST['faculty_id'].",".$_POST['month'].",".$_POST['year'].",".$salary.",".$bonus.",".$staff_id.")";
					$result = $conn->query($sql);
					$message = "Pay slip added";
					echo "<script> alert('$message');
					  window.location.href='faculty_payslips.php';
					</script>";
				}
			}
			
			/*$post = $_SESSION['post'];
			$sql = "select * from staff where staff_id='".$_POST['id']."'";
			$result = $conn->query($sql);
			$row  = $result->fetch_assoc();
			$leavers_post = $row['post'];
			if ($leavers_post=='staff'){
					$sql = "select * from staff_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='dean_sec'){
					$sql = "select * from dean_sec_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='dept_sec'){
					$sql = "select * from dept_sec_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='registrar'){
					$sql = "select * from registrar_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='assis_registrar'){
					$sql = "select * from assis_registrar_leave_route where from_post='".$post."'";
			}
			
									
			$result = $conn->query($sql);
			
			$res = $result;
			$row  = $result->fetch_assoc();
			    
			$to_send = $row['to_post'];
			$staff_id = $_SESSION['ID'];
			$post = $_SESSION['post'];

			$sql = "select * from staff_leave_status where staff_id = '".$_POST['id']."' and current_authority_post='".$post."'";						
			$result = $conn->query($sql);
			if($result!=false && $result->num_rows > 0 ) 
			{			
				while( $row = $result->fetch_assoc() )
					{
						$sql = "insert into staff_leave_paper_trail values ('".$row['staff_id']."','".$row['leave_from']."','".$row['leave_to']."','".$row['comment_added']."','Accepted','".$staff_id."')";
						$conn->query($sql);					
					}
			}
			if($res->num_rows==0)
				{					
									$sql = "delete from staff_previous_leave_app where staff_id_wants_leave='".$_POST['id']."'";
									$result = $conn->query($sql);
									$sql = "select * from staff_leave_status where staff_id = '".$_POST['id']."' and current_authority_post='".$post."'";						
									$result = $conn->query($sql);
									if($result!=false && $result->num_rows > 0 ) 
									{			
										while( $row = $result->fetch_assoc() )
											{
												
												$sql = "insert into staff_previous_leave_app values ('".$row['staff_id']."','".$row['leave_from']."','".$row['leave_to']."','".$row['comment_added']."','Accepted','".$post."')";
												$conn->query($sql);					
											}
									}
												
									$sql = "delete from staff_leave_status where staff_id = '".$_POST['id']."' and current_authority_post='".$post."'";						
									
									if ($conn->query($sql) == TRUE)
											{
												$message = "Updated";
												echo "<script> alert('$message');
												window.location.href='staffsanction_leaves.php';
												</script>";
											}
										else {
												$message = "leave_app Error Occured ";
												echo "<script> alert('$message');
												window.location.href='staffsanction_leaves.php';
												</script>";
											}	
											
											
				}
			
			$sql = "update staff_leave_status set current_authority_post ='".$to_send."' where staff_id = '".$_POST['id']."'";						
			
			if ($conn->query($sql) === TRUE)
					{
						$message = "Updated ";
						echo "<script> alert('$message');
				        window.location.href='staffsanction_leaves.php';
					    </script>";
					}
				else {
						$message = "leave_app Error Occured ";
						echo "<script> alert('$message');
				        window.location.href='staffsanction_leaves.php';
					    </script>";
					}	*/			 
			
		}
	
	else
		{
			$message = "Invalid Access";
			echo "<script> alert('$message');
			window.location.href='index.php';
			</script>";
        }
?>