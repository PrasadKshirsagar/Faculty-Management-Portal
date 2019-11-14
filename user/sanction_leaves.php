<?php
//echo "<script>alert('entered as'); </script>";
include '../includes/connection.php';
session_start();
if(isset($_SESSION['ID']) && $_SESSION['post']!='faculty')
			{
				if(($_SESSION['post'])=='hod' ){
				
					$username = $_SESSION['login_user'];
					$faculty_id = $_SESSION['ID'];
					$dept_id =  $_SESSION['dept_id'];
					$post = $_SESSION['post'];
					$sql = "select * from faculty inner join leave_status on faculty.faculty_id = leave_status.faculty_id  where faculty.dept_id = '".$dept_id."' and leave_status.current_authority_post='".$post."'";
					//$sql = "select * from leave_status, faculty where faculty.dept_id = '".$dept_id."' and leave_status.current_authority_post = '".$post."'";						
					$result = $conn->query($sql);
				}
				else if(($_SESSION['post'])=='dean'){
					$sqlq = "select * from dean where faculty_id='".$_SESSION['ID']."'";
					$resultq = $conn->query($sqlq);
					$rowq  = $resultq->fetch_assoc();
					if ($rowq['cc_dept_id']=='1'){
						$username = $_SESSION['login_user'];
						$faculty_id = $_SESSION['ID'];
						$post = $_SESSION['post'];
						$sql = "select * from faculty inner join leave_status on faculty.faculty_id = leave_status.faculty_id  where leave_status.current_authority_post='".$post."'";
						$result = $conn->query($sql);
					}
					else{
						$message = "Invalid Access";
						echo "<script> alert('$message');
							   window.location.href='index.php';
							  </script>";
					}
				}
				else if(($_SESSION['post'])=='assoc_dean'){
					$sqlq = "select * from assoc_dean where faculty_id='".$_SESSION['ID']."'";
					$resultq = $conn->query($sqlq);
					$rowq  = $resultq->fetch_assoc();
					if ($rowq['cc_dept_id']=='1'){
						$username = $_SESSION['login_user'];
						$faculty_id = $_SESSION['ID'];
						$post = $_SESSION['post'];
						$sql = "select * from faculty inner join leave_status on faculty.faculty_id = leave_status.faculty_id  where leave_status.current_authority_post='".$post."'";
						$result = $conn->query($sql);
					}
					else{
						$message = "Invalid Access";
						echo "<script> alert('$message');
							   window.location.href='index.php';
							  </script>";
					}
				}
				else if(($_SESSION['post'])=='director' ){
				
					$username = $_SESSION['login_user'];
					$faculty_id = $_SESSION['ID'];
					$post = $_SESSION['post'];
					$sql = "select * from faculty inner join leave_status on faculty.faculty_id = leave_status.faculty_id  where leave_status.current_authority_post='".$post."'";
					$result = $conn->query($sql);
				}
				else{
					$message = "Invalid Access";
					echo "<script> alert('$message');
						   window.location.href='index.php';
						  </script>";
				}

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

<table width="50" class="table table-striped table-responsive-md btn-table">
<br><br><br><br><br>
 <h1 style="color:blue;" > Sanction Application </h1>
<thead>
  <tr>
	<th>S_no</th>
    <th>Name</th>
    <th>curr_authority</th>
    <th>status</th>
	<th>comment</th>
	<th>Note added </th>
	<th>From date</th>
	<th>To date</th>
  </tr>
</thead>
    <?php
         $row_no= 1;
       if( $result->num_rows > 0 ) {

            while( $row = $result->fetch_assoc() ) {

                echo "<tr>";
                echo "<td>" . $row_no . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["current_authority_post"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
				echo "<td>" . $row["comment_added"] . "</td>";
				echo "<td>" . $row["note_added"] . "</td>";
				echo "<td>" . $row["leave_from"] . "</td>";
				echo "<td>" . $row["leave_to"] . "</td>";
                echo "<td><form action = 'table_work.php' method='POST'>
                <input type=hidden name=id value=".$row["faculty_id"]." >
				<input type=hidden name=f_date value=".$row["leave_from"]." >
				<input type=hidden name=t_date value=".$row["leave_to"]." >
                Add Note : <input type=text name=note_added style='background-color:black;color:white;' value=Enter_here.> </br>
                <input type=submit value=Accept style='background-color:red;'  name=accept >
				 <input type=submit value=Reject style='background-color:red;'  name=reject >

			   </form>
                </td>";
                echo "</tr>";
                $row_no = $row_no + 1;
			}

        } else {  
            die("0 results");
        }  
    ?>

</table> 