
<html>
<center>
		<?php
		session_start();
		if($_SESSION['admin_id']) {
			$name = $_SESSION['admin_id'];
		
		} else {
			echo "User not found";
            echo"<script>window.location='../stafflog.html</script>'";
		}
		$sql = mysqli_query($conn, "SELECT DISTINCT project.p_id,session.ses_name,vehicle.v_number,pro_emp.role,pro_emp.status,quattion.date
		FROM pro_emp
		INNER JOIN quattion ON pro_emp.q_id=quattion.q_id
		INNER JOIN request ON quattion.request=request.r_id
		INNER JOIN project ON request.r_id=project.request
		INNER JOIN session ON quattion.session=session.s_id
		INNER JOIN vehicle ON pro_emp.vehicle=vehicle.v_id
		WHERE pro_emp.employee='$name'");
		?>
		</center>
<head>
	
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Supervisor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d1950e8188.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
	<div class="sidebar">
		<ul>
			<li><h2 style="background-color:gray;">Supervisor</h2></li>
			<li><a href="super.php"><i class="fas fa-home"></i> Home</a></li>
			<li><a href="holiday.php?data=<?php echo $name; ?>"><i class="fas fa-calendar"></i> Holiday</a></li>  
			<li>
				<a href="s_equipment.php"><i class="fas fa-tools"></i> Equipment</a>	
			</li>
			<li><a href="s_requestlist.php"><i class="fas fa-cogs"></i> Service Request</a></li>
			<li><a href="task_super.php"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
			<li><a href="s_addwork.php"><i class="fas fa-plus-circle"></i> Add to Work</a></li>
			<li><a href="s_proDetails.php"><i class="fas fa-project-diagram"></i> Projects</a></li>
			<li><a href="../home.html"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
		</ul>
	</div>
	</div>
	
	<div class="content">
		
	

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
