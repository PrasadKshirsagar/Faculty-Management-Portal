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
            $staff_id = $_SESSION['ID'];
            $post = $_SESSION['post']; 
			$comment = $_POST['reason'];
			$f_date = $_POST['f_date'];
			$t_date = $_POST['t_date'];
			$sql = "select * from staff where  staff.staff_id= '".$staff_id."'";						
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
			
			if($_SESSION['post']=='staff')	
			{
				$sql = "select * from staff_leave_route where from_post='staff'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = $row['to_post'];
			}	
			else if($_SESSION['post']=='assis_registrar')	
			{
				$sql = "select * from assis_registrar_leave_route where from_post='assis_registrar'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = $row['to_post'];
			}
			else if($_SESSION['post']=='registrar')	
			{
				$sql = "select * from registrar_leave_route where from_post='registrar'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = $row['to_post'];
			}
			else if($_SESSION['post']=='dean_sec')	
			{
				$sql = "select * from dean_sec_leave_route where from_post='dean_sec'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = $row['to_post'];
			}
			else if($_SESSION['post']=='dept_sec')	
			{
				$sql = "select * from dept_sec_leave_route where from_post='dept_sec'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = $row['to_post'];
			}
		
		     $indi = 0;
				$sql= "SELECT * from staff_leave_status where staff_id = '".$staff_id."'";   //checking already leave is to applied
				$result = $conn->query($sql);				
				if($result->num_rows >0)
					{	
					 	redirect('staffuserprofile.php');
					}
			 if(($days+$next_year_days)< $diff)
				{
						$message = "Not sufficient leaves";
						echo "<script> alert('$message');
				       window.location.href='staffuserprofile.php';
					  </script>";
						
				}
			 else if($days<$diff)
				{
						$indi = 1;
						$message = "Not sufficient leaves in this year, more leaves will be borrowed from next year!";
						echo "<script> alert('$message')</script>";
				}

				
				
				
				$sql = " insert into staff_leave_status values('".$staff_id."','".$to_send."','".$post."','pending','".$comment."','".$f_date."','".$t_date."')";	
				
			    $sql2 = "";
				if ($indi==1)
					{
							$next_year_days = $days+$next_year_days-$diff;
							$days = 0;
							$sql2 = "update staff set leaves='".$days."',next_year_leaves='".$next_year_days."' where staff_id='".$staff_id."'";
					}
				else
					{
							$days = $days - $diff;
							$sql2 = "update staff set leaves='".$days."' where staff_id='".$staff_id."'";
					}
                if ($conn->query($sql) === TRUE )
					{
						$message = "leave_app submitted ";
						echo "<script> alert('$message');
				        window.location.href='staffuserprofile.php';
					    </script>";
					}
				else {
						echo $sql;
						echo $sql2;
						$message = "leave_app Error Occured ";
						echo "<script> alert('$message');
				        window.location.href='staffuserprofile.php';
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
