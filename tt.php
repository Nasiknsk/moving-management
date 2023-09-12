<?php
require_once('connection.php');
require_once('admin.php');

if (isset($_POST['submit'])) {
  $Name = $_POST['fname'];
  $Phone = $_POST['slmcid'];
  $Email = $_POST['email'];
  $Nic = $_POST['nic'];
  $Address = $_POST['address'];
  $City = $_POST['city'];
  $Password = $_POST['upassword'];
  $Type = $_POST['type'];

  $check = mysqli_query($conn, "SELECT * FROM admin WHERE email='$Email'");
  $row = mysqli_num_rows($check);

  if ($row == 0) {
    $query = "INSERT INTO admin (name, address, city, phone, email, password, type, nic) VALUES ('$Name', '$Address', '$City', '$Phone', '$Email', '$Password', '$Type', '$Nic')";
    $result = mysqli_query($conn, $query);

    if ($result) {
      echo "<script>alert('Successfully account created!')</script>";
      echo "<script>window.location='adduser.php'</script>";
    } else {
      echo "<script>alert('Account was not created!')</script>";
    }
  } else {
    echo "<script>alert('You already have an account with this email')</script>";
    echo "<script>window.location='adduser.php'</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>Staff Register</title>
  <link rel="stylesheet" href="../css/register.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="title">Staff Registration</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter name" name="fname" pattern="[A-Za-z\s]+" required>
          </div>
          <div class="input-box">
            <span class="details">Phone</span>
            <input type="number" placeholder="Telephone Number" name="slmcid" required maxlength="10">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter email address" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">NIC_NO</span>
            <input type="text" placeholder="Enter NIC" name="nic" required pattern="^([0-9]{9}[x|X|v|V]|[0-9]{12})$">
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter Address" name="address" required>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" placeholder="Enter City" name="city" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter Password" name="upassword" required><br><br>
          </div>
          <div class="input-box">
            <span class="details"></span><br>
            <input type="submit" name="submit" value="Update">
          </div>
          <div class="input-box">
            <span class="details">Type</span>
            <select name="type" id="type">
              <option value="admin">Admin</option>
              <option value="supervisor">Supervisor</option>
              <option value="plumber">Plumber</option>
              <option value="driver">Driver</option>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
