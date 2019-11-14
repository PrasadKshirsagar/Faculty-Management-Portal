<?php

function redirect($url){
    if (headers_sent()){
		$message = "One application is already in process, can't apply for 2nd one!";
      die('<script type="text/javascript">alert($message);window.location=\''.$url.'\';</script>');
    }else{
      header('Location: ' . $url);
      die();
    }    
}
include '../includes/connection.php';
session_start();
	
	if(isset($_SESSION['ID']) && isset($_POST['leave']) )
		{
			
		
			$username = $_SESSION['login_user'];
            $faculty_id = $_SESSION['ID'];
            $post = $_SESSION['post']; 
			$comment = $_POST['reason'];
			$f_date = $_POST['f_date'];
			$t_date = $_POST['t_date'];
			$sql = "select * from faculty where  faculty.faculty_id= '".$faculty_id."'";						
			$result = $conn->query($sql);
			$row  = $result->fetch_assoc();
			$_SESSION['leave'] = $row['leaves'];
			$_SESSION['next_year_leaves'] = $row['next_year_leaves'];
			$days =  $_SESSION['leave'];
			$next_year_days = $_SESSION['next_year_leaves'];
            $date1=strtotime($t_date);
			$date2=strtotime($f_date);
			$diff=($date1 - $date2)/60/60/24;    
			$diff = $diff + 1;
			$to_send = '';
			
			if($_SESSION['post']=='faculty')	
			{
				$sql = "select * from faculty_leave_route where from_post='faculty'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = $row['to_post'];
			}	
			else if($_SESSION['post']=='dean')	
			{
				$sql = "select * from dean_leave_route where from_post='dean'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = $row['to_post'];
			}
			else if($_SESSION['post']=='hod')	
			{
				$sql = "select * from hod_leave_route where from_post='hod'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = $row['to_post'];
			}
			else if($_SESSION['post']=='assoc_dean')	
			{
				$sql = "select * from assoc_dean_leave_route where from_post='assoc_dean'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = $row['to_post'];
			}
			else if($_SESSION['post']=='director')	
			{
				$sql = "select * from director_leave_route where from_post='director'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = $row['to_post'];
			}
		
		     $indi = 0;
				$sql= "SELECT * from leave_status where faculty_id = '".$faculty_id."'";   //checking already leave is to applied
				$result = $conn->query($sql);				
				if($result->num_rows >0)
					{	
					 	redirect('userprofile.php');
					}
			 if(($days+$next_year_days)< $diff)
				{
						$message = "Not sufficient leaves";
						echo "<script> alert('$message');
				       window.location.href='userprofile.php';
					  </script>";
						
				}
			 else if($days<$diff)
				{
						$indi = 1;
						$message = "Not sufficient leaves in this year, more leaves will be borrowed from next year!";
						echo "<script> alert('$message')</script>";
				}

				
				
				
				$sql = " insert into leave_status values('".$faculty_id."','".$to_send."','".$post."','pending','".$comment."','-','".$f_date."','".$t_date."')";	
				
			    $sql2 = "";
				if ($indi==1)
					{
							$next_year_days = $days+$next_year_days-$diff;
							$days = 0;
							$sql2 = "update faculty set leaves='".$days."',next_year_leaves='".$next_year_days."' where faculty_id='".$faculty_id."'";
					}
				else
					{
							$days = $days - $diff;
							$sql2 = "update faculty set leaves='".$days."' where faculty_id='".$faculty_id."'";
					}
                if ($conn->query($sql) === TRUE  )
					{
						$message = "leave_app submitted ";
						echo "<script> alert('$message');
				        window.location.href='userprofile.php';
					    </script>";
					}
				else {
						$message = "leave_app Error Occured ";
						echo "<script> alert('$message');
				        window.location.href='userprofile.php';
					    </script>";
					}				 
				
         }
	      else{
				$message = "Invalid Access";
				echo "<script> alert('$message');
				       window.location.href='../index.php';
					  </script>";
         }
 
		
?>
