<?php
//echo "<script>alert('entered as'); </script>";
include '../includes/connection.php';
session_start();
if(isset($_SESSION['ID'])){
		$username = $_SESSION['login_user'];
		
		$staff_id = $_SESSION['ID'];
		
		$sql = "select * from staff where staff.staff_id = '".$staff_id."'";						
		$result = $conn->query($sql);
		$row  = $result->fetch_assoc();                
}
else{
		$message = "Invalid Access";
		echo "<script> alert('$message');
			   window.location.href='index.php';
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
	
	<form action="staffuser_leave.php" method = "post"  enctype="multipart/form-data">
	<div class = "col-sm-1"></div>
	<div class="col-sm-4">
		<li><button type="button" onclick = "window.location.href='staffpres_leave_app.php'" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Leave history</button></li>
		<li><button type="button" onclick = "window.location.href='staffuser_leave.php'" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Apply for Leave</button></li>
		<li><button type="button" onclick = "window.location.href='staffpres_payslips.php'" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Pay rolls</button></li>
		<?php if(($_SESSION['post'])=='assis_registrar' ){?>
		 <li><button type="button" onclick = "window.location.href='staffsanction_leaves.php'" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Sanction leaves</button></li>
        <?php }?>
		<br><br>
		<?php if(($_SESSION['post'])=='registrar' ){?>
		 <li><button type="button" onclick = "window.location.href='staffsanction_leaves.php'" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Sanction leaves</button></li>
        <?php }?>
		<?php if(($_SESSION['post'])=='staff'){
			$sqlq = "select * from staff where staff_id='".$_SESSION['ID']."'";
			$resultq = $conn->query($sqlq);
			$rowq  = $resultq->fetch_assoc();
			if ($rowq['dept_id']=='3'){?>
		 <li><button type="button" onclick = "window.location.href='staffmake_payslips.php'" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Staff pay slips</button></li>
		<li><button type="button" onclick = "window.location.href='faculty_payslips.php'" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Faculty pay slips</button></li>
		 <?php }}?>
		 <?php if(($_SESSION['post'])=='assis_registrar'){
			$sqlq = "select * from staff where staff_id='".$_SESSION['ID']."'";
			$resultq = $conn->query($sqlq);
			$rowq  = $resultq->fetch_assoc();
			if ($rowq['dept_id']=='3'){?>
		 <li><button type="button" onclick = "window.location.href='confirmstaff_payslips.php'" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Staff pay slips</button></li>
		<li><button type="button" onclick = "window.location.href='confirmfaculty_payslips.php'" class="btn btn-default btn-default2" style="margin-top: 25%;margin-left:5%">Faculty pay slips</button></li>
		 <?php }}?>
		<br><br>
		
		
		 
	</div>
	
	<div class = "col-sm-1"></div>
	<div class = "col-sm-6">
		<h2>profile </h2>
		     

			<div class="form-group label-floating">
				<label class="control-label" style="font-size:1.2em">Name</label>
				<input type="text" class="form-control" name = 'firstname' value = <?php echo $row['name'] ?> readonly>
			</div>
			<div class="form-group label-floating">
				<label class="control-label" style="font-size:1.2em">Address</label>
				<input type="text" class="form-control" name = 'address' placeholder="address not given" value = <?php echo $row['address'] ?> >
			</div>
			<div class="form-group label-floating">
				<label class="control-label" style="font-size:1.2em">Post</label>
				<input type="text" class="form-control" name = 'post' value = <?php echo $_SESSION['post'] ?> readonly >
			</div>
			
			
	</div>
	</form>
	
	</div>
				
 
</div>
		
	
</body>