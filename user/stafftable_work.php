<?php
include '../includes/connection.php';
session_start();
	
	if(isset($_SESSION['ID']) && isset($_POST['delete_app']) )
		{
			$staff_id = $_SESSION['ID'];
			$sql = "delete from staff_leave_status where staff_id = '".$staff_id."'";						
			if ($conn->query($sql) === TRUE)
					{
						$message = "leave_app Deleted ";
						echo "<script> alert('$message');
				        window.location.href='staff_pres_leave_app.php';
					    </script>";
					}
				else {
						$message = "leave_app Error Occured ";
						echo "<script> alert('$message');
				        window.location.href='staffuserprofile.php';
					    </script>";
					}				 
		}
	else if(isset($_SESSION['ID']) && isset($_POST['accept']) )
		{
			$staff_id = $_SESSION['ID'];
			$post = $_SESSION['post'];
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
			
			$date1=strtotime($_POST['t_date']);
			$date2=strtotime($_POST['f_date']);
			$diff=($date1 - $date2)/60/60/24;
			$diff = $diff + 1;
			$sql2 = "select * from staff where staff_id='".$_POST['id']."'";
			$result2 = $conn->query($sql2);
			$row2 = $result2->fetch_assoc();
			$leaves_this_year = $row2['leaves'];
			$leaves_next_year = $row2['next_year_leaves'];
			if ($diff>$leaves_this_year){
				$leaves_next_year = $leaves_this_year + $leaves_next_year - $diff;
				$leaves_this_year = 0;
				$sql2 = "update staff set leaves='".$leaves_this_year."',next_year_leaves='".$leaves_next_year."' where staff_id='".$_POST['id']."'";
			}
			else{
				$leaves_this_year = $leaves_this_year - $diff;
				$sql2 = "update staff set leaves='".$leaves_this_year."' where staff_id='".$_POST['id']."'";
			}
			
			if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE)
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
					}				 
			
		}
	else if(isset($_SESSION['ID']) && isset($_POST['reject']) )
		{		
			
			$staff_id = $_SESSION['ID'];
			$post = $_SESSION['post'];

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
			
					
				
									
			
			if($result!=false && $result->num_rows > 0 ) 
					{
						
						while( $row = $result->fetch_assoc() )
							{
								$sql = "insert into staff_leave_paper_trail values ('".$row['staff_id']."','".$row['leave_from']."','".$row['leave_to']."','".$row['comment_added']."','rejected','".$staff_id."')";
								$conn->query($sql);
							
							}
					}
			$sql = "delete from staff_previous_leave_app where staff_id_wants_leave='".$_POST['id']."'";
			$result = $conn->query($sql);
			$sql = "select * from staff_leave_status where staff_id = '".$_POST['id']."' and current_authority_post='".$post."'";						
			$result = $conn->query($sql);
			if($result!=false && $result->num_rows > 0 ) 
			{			
				while( $row = $result->fetch_assoc() )
					{
						
						$sql = "insert into staff_previous_leave_app values ('".$row['staff_id']."','".$row['leave_from']."','".$row['leave_to']."','".$row['comment_added']."','Rejected','".$post."')";
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
	else
		{
			$message = "Invalid Access";
			echo "<script> alert('$message');
			window.location.href='index.php';
			</script>";
        }
?>