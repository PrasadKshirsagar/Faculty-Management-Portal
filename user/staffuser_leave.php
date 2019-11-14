<?php
include '../includes/connection.php';
session_start();
	
	/*if(isset($_SESSION['ID']) && isset($_POST['leave']) )
		{
			$username = $_SESSION['login_user'];
            $faculty_id = $_SESSION['ID'];
            
			if($_SESSION['post']='faculty')	
			{
				$sql = "select * from faculty_leave_route where from_post='faculty'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
			    
				$to_send = row['to_post'];
				$post = $_SESSION['post']; 
				$comment = $_POST['reason'];
				$f_date = $_POST['f_date'];
				$t_date = $_POST['t_date'];
				
				$sql = " insert into leave_status values('".$faculty_id."','".$to_send."','".$post."','pending','".$comment."','".$f_date."','".$t_date."')";						
			     
                if ($conn->query($sql) === TRUE)
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
				
         }
		 else */if(isset($_SESSION['ID'])){
				$username = $_SESSION['login_user'];
                $staff_id = $_SESSION['ID'];
                
				$sql = "select * from staff where staff.staff_id = '".$staff_id."'";						
				$result = $conn->query($sql);
				$row  = $result->fetch_assoc();
                
        }
		
		
		else{
				$message = "Invalid Access";
				echo "<script> alert('$message');
				       window.location.href='/../index.php';
					  </script>";
         }
 
		
?>




<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link href='https://fonts.googleapis.com/css?family=Balthazar' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Stalinist One' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.css" rel="stylesheet"/>
<script src="../assets/js/material-kit.js?v=2.0.0"></script>
  <script src = "../js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="star.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
  <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
  <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/material.min.js"></script>
  <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.css" rel="stylesheet"/>
  <link href="../assets/css/demo.css" rel="stylesheet" />
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
  <!-- star rating js -->
  </head>
<body>
<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php include 'mainheader.php'; ?>
<div class = "container" style="margin-top: 10%; margin-bottom: 10%; background-color: #EFF6F9; width: wrap-content; height: wrap-content; border-radius: 20px">
<div class = "container-fluid" style="margin-top: 10%; margin-bottom: 10%">
<form action="staffleave_back.php" method = "post" >
    <div class = "col-sm-1"></div>
	<div class="col-sm-4">
		<img id = "blah" class="img-responsive" src="images/doc.jpg">
		<br><br><br>
		 
	</div>
	
	<div class = "col-sm-1"></div>
	<div class = "col-sm-6">
		<h2>Leave Application</h2>
		     

			<div class="form-group label-floating">
				<label class="control-label" style="font-size:1.2em">From</label>
				<input type="date" class="form-control" name = 'f_date' required>
			</div>
			<div class="form-group label-floating">
				<label class="control-label" style="font-size:1.2em">To</label>
					<input type="date" class="form-control" name = 't_date' required>
			</div>
			<div class="form-group label-floating">
				<label class="control-label" style="font-size:1.2em">Reason</label>
			      <input type="text" class="form-control" name = 'reason' required>
			</div>
			
			<button type="submit" name="leave">Apply leave</button>
 
	</div>
	</form>
	</div>
			<button type="submit" onclick = 'staffpres_leave_app.php' >Leave history</button>
 	
</div>
	</body>
	