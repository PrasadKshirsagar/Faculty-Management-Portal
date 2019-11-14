<?php
function redirect($url){
    if (headers_sent()){
      die('<script type="text/javascript">window.location=\''.$url.'\';</script>');
    }else{
      header('Location: ' . $url);
      die();
    }    
}
        /*Connection =.php will be included in inncludes folder*/
        include("includes/connection.php");
        
        session_start();
				
        if(isset($_POST["Login"]))
		{
			$user_id = $_POST['user_id'];
			$password = $_POST['password'];
		
			$sql = "select * from login where  login.user_id= '".$user_id."' and login.password = '".$password."'"; 
            $result = $conn->query($sql);
			
			
			if($result->num_rows > 0){
						$_SESSION['post'] = $result->fetch_assoc()['post'];
						if ($_SESSION['post']=='faculty' ||$_SESSION['post']=='hod' ||$_SESSION['post']=='dean' ||$_SESSION['post']=='assoc_dean' ||$_SESSION['post']=='director' ){
							$sql = "select * from faculty where  faculty.user_id= '".$user_id."'";						
							$result = $conn->query($sql);
							$row  = $result->fetch_assoc();
											
							$_SESSION['login_user'] = $row['name'];
							$_SESSION['ID'] = $row['faculty_id'];
							  $_SESSION['leave'] = $row['leaves'];
							  $_SESSION['next_year_leaves'] = $row['next_year_leaves'];
							  $_SESSION['dept_id'] = $row['dept_id'];
							  redirect('user/userprofile.php');
						}
						/*
						else{
							$sql = "select * from staff where  staff.user_id= '".$user_id."'";						
							$result = $conn->query($sql);
							$row  = $result->fetch_assoc();
											
							$_SESSION['login_user'] = $row['name'];
							$_SESSION['ID'] = $row['staff_id'];
							  $_SESSION['leave'] = $row['leaves'];
							  $_SESSION['next_year_leaves'] = $row['next_year_leaves'];
							  $_SESSION['dept_id'] = $row['dept_id'];
							  redirect('user/staffuserprofile.php');
						}  */
						
					    $message = "Succesfull Login";
					    echo "<script> alert('$message');
					      window.location.href='index.php';
					    </script>";
					}
			else
			{	$message = "Invalid user_id or password";
		        #header('Location: index.php');
				echo "<script> alert('$message');
					  window.location.href='index.php';
					  </script>";
			}
		}
        else
			{	
			   $message = "Invalid Acesss - user will be reported";
		        #header('Location: index.php');
				echo "<script> alert('$message');
					  window.location.href='index.php';
					  </script>";
			}
        
?>
