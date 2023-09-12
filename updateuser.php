<?php
$conn=mysqli_connect('localhost','root','','packing');
require_once('admin.php');

if(isset($_GET['data2']))
{
    $id=intval($_GET['data2']);
    $sql=mysqli_query($conn,"SELECT * FROM admin where admin_id=$id");

}
?>

<html>
<head>
	<title>Adding Users</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/reg.css">
    <title>edit user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d1950e8188.js" crossorigin="anonymous"></script>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css " />
</head>
<body style="margin-left:200px;">
	

<?php
while($rows=$sql->fetch_assoc())
{

?>
   
<div class="container">
    <div class="title">Staff Registration</div>
    <div class="content">
      <form action="" method="post">

        <div class="user-details">
          <div class="input-box">
            <span class="details">
              Full Name</span>
            <input type="text" placeholder="Enter  name" name="fname" pattern="[A-Za-z\s]+" value="<?php echo $rows['name'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">
              Phone</span>
            <input type="number" placeholder="Tele phone Number" name="tphone" required maxlength="10" value="<?php echo $rows['phone'];?>" >
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter  email address" name="email" required value="<?php echo $rows['email'];?>" >
          </div>
          <div class="input-box">
            <span class="details">
              NIC_NO</span>
            <input type="text" placeholder="Enter  NIC" name="nic" required pattern="^([0-9]{9}[x|X|v|V]|[0-9]{12})$" value="<?php echo $rows['nic'];?>" >
          </div>
          
        
          <div class="input-box">
            <span class="details">
              Address</span>
            <input type="text" placeholder="Enter Address" name="address" required value="<?php echo $rows['address'];?>" >
          </div>
          <div class="input-box">
            <span class="details">
              City</span>
            <input type="text" placeholder="Enter City" name="city" required value="<?php echo $rows['city'];?>" >
          </div>
         

          <div class="input-box">
            <span class="details">
              Password</span>
            <input type="password" placeholder="You cant edit password" name="password" required disabled><br><br>
          </div>
          
          
          <div class="input-box">
            <span class="details">Type</span>
           
              <select name="type" id="type">
                  <option value="admin">Admin</option>
                  <option value="supervisor">Supervisor</option>
                  <option value="worker">Worker</option>
                  <option value="driver">Driver</option>
                </select>
              </div>
              <div class="input-box">
            <span class="details">Type</span>
           
              <select name="status" id="type">
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                 
                </select>
              </div>
              <div class="input-box">
            <span class="details">
            </span><br>
            <input type="submit" name="add" value="Update">
          </div>
          </div>
      </form>
    </div>
  </div>
  <?php
}
?>
   
</body>
</html>
<?php




if(isset($_POST['add']))
{
    $Name=$_POST['fname'];
    $Phone=$_POST['tphone'];
    $Email=$_POST['email'];
    $Nic=$_POST['nic'];
    $Address=$_POST['address'];
    $City=$_POST['city'];
    $Password=$_POST['password'];
    $type=$_POST['type'];
    $status=$_POST['status'];



    $check=mysqli_query($conn,"SELECT * FROM admin where email='$Email' ");
    $fetch = mysqli_fetch_array($check);
	  $row = mysqli_num_rows($check);

    if($row==1)
    {
        $query="UPDATE admin SET name='$Name',phone='$Phone',email='$Email',nic='$Nic',address='$Address',city='$City',type='$type',status='$status' where admin_id='$id' ";
        $q1=mysqli_query($conn,$query);

        if($q1)
        {
            echo "<script>alert('Successfully account updated!')</script>";
		    echo "<script>window.location='viewuser.php'</script>";
        }
       
        

        
    }
    else
    {
        echo "<script>alert('You already have an account with this email or NIC')</script>";
        echo "<script>window.location='viewuser.php'</script>";
    }
    

    



}


?>