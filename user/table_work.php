<?php
include '../includes/connection.php';
session_start();
	
	if(isset($_SESSION['ID']) && isset($_POST['delete_app']) )
		{
			$faculty_id = $_SESSION['ID'];
			$sql = "delete from leave_status where faculty_id = '".$faculty_id."'";						
			if ($conn->query($sql) === TRUE)
					{
						$message = "leave_app Deleted ";
						echo "<script> alert('$message');
				        window.location.href='pres_leave_app.php';
					    </script>";
					}
				else {
						$message = "leave_app Error Occured ";
						echo "<script> alert('$message');
				        window.location.href='userprofile.php';
					    </script>";
					}				 
		}
	else if(isset($_SESSION['ID']) && isset($_POST['accept']) )
		{
			$faculty_id = $_SESSION['ID'];
			$post = $_SESSION['post'];
			$sql = "select * from faculty where faculty_id='".$_POST['id']."'";
			$result = $conn->query($sql);
			$row  = $result->fetch_assoc();
			$leavers_post = $row['post'];
			if ($leavers_post=='faculty'){
					$sql = "select * from faculty_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='hod'){
					$sql = "select * from hod_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='director'){
					$sql = "select * from director_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='dean'){
					$sql = "select * from dean_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='assoc_dean'){
					$sql = "select * from assoc_dean_leave_route where from_post='".$post."'";
			}
			
									
			$result = $conn->query($sql);
			
			$res = $result;
			$row  = $result->fetch_assoc();
			    
			$to_send = $row['to_post'];
			$faculty_id = $_SESSION['ID'];
			$post = $_SESSION['post'];

			$sql = "select * from leave_status where faculty_id = '".$_POST['id']."' and current_authority_post='".$post."'";						
			$result = $conn->query($sql);
			if($result!=false && $result->num_rows > 0 ) 
			{			
				while( $row = $result->fetch_assoc() )
					{
						$sql = "insert into leave_paper_trail values ('".$row['faculty_id']."','".$row['leave_from']."','".$row['leave_to']."','".$row['comment_added']."','".$_POST['note_added']."','Accepted','".$faculty_id."')";
						$conn->query($sql);					
					}
			}
			if($res->num_rows==0)
				{					
									$sql = "delete from previous_leave_app where faculty_id_wants_leave='".$_POST['id']."'";
									$result = $conn->query($sql);
									$sql = "select * from leave_status where faculty_id = '".$_POST['id']."' and current_authority_post='".$post."'";						
									$result = $conn->query($sql);
									if($result!=false && $result->num_rows > 0 ) 
									{			
										while( $row = $result->fetch_assoc() )
											{
												
												$sql = "insert into previous_leave_app values ('".$row['faculty_id']."','".$row['leave_from']."','".$row['leave_to']."','".$row['comment_added']."','".$_POST['note_added']."','Accepted','".$post."')";
												$conn->query($sql);					
											}
									}
												
									$sql = "delete from leave_status where faculty_id = '".$_POST['id']."' and current_authority_post='".$post."'";						
									
									$date1=strtotime($_POST['t_date']);
									$date2=strtotime($_POST['f_date']);
									$diff=($date1 - $date2)/60/60/24;
									$diff = $diff + 1;
									$sql2 = "select * from faculty where faculty_id='".$_POST['id']."'";
									$result2 = $conn->query($sql2);
									$row2 = $result2->fetch_assoc();
									$leaves_this_year = $row2['leaves'];
									$leaves_next_year = $row2['next_year_leaves'];
									if ($diff>$leaves_this_year){
										$leaves_next_year = $leaves_this_year + $leaves_next_year - $diff;
										$leaves_this_year = 0;
										$sql2 = "update faculty set leaves='".$leaves_this_year."',next_year_leaves='".$leaves_next_year."' where faculty_id='".$_POST['id']."'";
									}
									else{
										$leaves_this_year = $leaves_this_year - $diff;
										$sql2 = "update faculty set leaves='".$leaves_this_year."' where faculty_id='".$_POST['id']."'";
									}
									
									
									if ($conn->query($sql) == TRUE && $conn->query($sql2))
											{
												$message = "Updated";
												echo "<script> alert('$message');
												window.location.href='sanction_leaves.php';
												</script>";
											}
										else {
												$message = "leave_app Error Occured ";
												echo "<script> alert('$message');
												window.location.href='sanction_leaves.php';
												</script>";
											}	
											
											
				}
			
			$sql = "update leave_status set note_added='".$_POST['note_added']."', current_authority_post ='".$to_send."' where faculty_id = '".$_POST['id']."'";						
			
			if ($conn->query($sql) === TRUE)
					{
						$message = "Updated ";
						echo "<script> alert('$message');
				        window.location.href='sanction_leaves.php';
					    </script>";
					}
				else {
						$message = "leave_app Error Occured ";
						echo "<script> alert('$message');
				        window.location.href='sanction_leaves.php';
					    </script>";
					}				 
			
		}
	else if(isset($_SESSION['ID']) && isset($_POST['reject']) )
		{		
			
			$faculty_id = $_SESSION['ID'];
			$post = $_SESSION['post'];

			$sql = "select * from faculty where faculty_id='".$_POST['id']."'";
			$result = $conn->query($sql);
			$row  = $result->fetch_assoc();
			$leavers_post = $row['post'];
			if ($leavers_post=='faculty'){
					$sql = "select * from faculty_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='hod'){
					$sql = "select * from hod_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='director'){
					$sql = "select * from director_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='dean'){
					$sql = "select * from dean_leave_route where from_post='".$post."'";
			}
			else if ($leavers_post=='assoc_dean'){
					$sql = "select * from assoc_dean_leave_route where from_post='".$post."'";
			}
			
			$result = $conn->query($sql);
			
					
				
									
			
			if($result!=false && $result->num_rows > 0 ) 
					{
						
						while( $row = $result->fetch_assoc() )
							{
								$sql = "insert into leave_paper_trail values ('".$row['faculty_id']."','".$row['leave_from']."','".$row['leave_to']."','".$row['comment_added']."','".$_POST['note_added']."','rejected','".$faculty_id."')";
								$conn->query($sql);
							
							}
					}
			$sql = "delete from previous_leave_app where faculty_id_wants_leave='".$_POST['id']."'";
			$result = $conn->query($sql);
			$sql = "select * from leave_status where faculty_id = '".$_POST['id']."' and current_authority_post='".$post."'";						
			$result = $conn->query($sql);
			if($result!=false && $result->num_rows > 0 ) 
			{			
				while( $row = $result->fetch_assoc() )
					{
						
						$sql = "insert into previous_leave_app values ('".$row['faculty_id']."','".$row['leave_from']."','".$row['leave_to']."','".$row['comment_added']."','".$_POST['note_added']."','Rejected','".$post."')";
						$conn->query($sql);					
					}
			}			
			$sql = "delete from leave_status where faculty_id = '".$_POST['id']."' and current_authority_post='".$post."'";						
			
			if ($conn->query($sql) == TRUE)
					{
						$message = "Updated";
						echo "<script> alert('$message');
				        window.location.href='sanction_leaves.php';
					    </script>";
					}
				else {
						$message = "leave_app Error Occured ";
						echo "<script> alert('$message');
				        window.location.href='sanction_leaves.php';
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