<?php
	require_once 'connection.php';
	session_start();
	if(ISSET($_POST['login']))
    {
		$email = $_POST['email'];
		$password = $_POST['password'];
	
		@$query = mysqli_query($conn, "SELECT * FROM admin  WHERE email = '$email' AND password = '$password'") or die(mysqli_connect_error());
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		
		if($row > 0)
        {

			$_SESSION['admin_id']=$fetch['admin_id'];

			$q1 =mysqli_query($conn,"SELECT type FROM admin WHERE email='$email'");
			$res = mysqli_fetch_array($q1);
            $type=$res['type'];

            if($type=="admin")
            {
				$_SESSION['admin_id']=$fetch['admin_id'];
			echo "<script>alert('Login Successfully!')</script>";
			echo "<script>window.location='admin_home.php'</script>";
		    }

		    else if($type=="supervisor")
            {
				$_SESSION['admin_id']=$fetch['admin_id'];
		     	echo "<script>alert('Login Successfully!')</script>";
			    echo "<script>window.location='task_super.php'</script>";
		    }
            else if($type=="employee" or $type=="driver" or $type="worker")
            {
				$_SESSION['admin_id']=$fetch['admin_id'];
		     	echo "<script>alert('Login Successfully!')</script>";
			    echo "<script>window.location='task_emp.php'</script>";
		    }
		}
		else
        {
			echo "<script>alert('Invalid username or password')</script>";
			echo "<script>window.location='../stafflog.html'</script>";
		}
		
	}

?>