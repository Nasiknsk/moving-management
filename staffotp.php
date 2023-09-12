<?php
$conn=mysqli_connect('localhost','root','','packing');


session_start();
$mail=$_SESSION['email'];

?>


<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Otp Staff</title>
  <link rel="stylesheet" href="../css/register.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <div class="title">Otp Staff</div>
    <div class="content">
      <form action="staffotp.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Otp</span>
            <input type="text" placeholder="Enter your OTP" name="otp" required><br>
          </div>
          
        </div>
        

        <div class="button">
          <div class="user-details">
            <div class="input-box">

          <input type="submit" value="SEND" name="submit"><br>

          
        </div>
      </div>

        <a href="../stafflog.html">Back</a>
        </div>
      </form>
    </div>
  </div>

</body>

</html>
<?php

  if(isset($_POST['submit']))
  {
    $otp=$_POST['otp'];
    $sql=mysqli_query($conn,"SELECT * FROM admin WHERE code='$otp' and email='$mail'");
    $num=mysqli_num_rows($sql);
    
    if($num==1)
    {
        echo"<script> alert('OTP is correct .Now set your new password')</script>";
        echo"<script> window.location='newstaffpw.php'</script>";
        $_SESSION['email']=$mail;
    }
    else
    {
        echo"<script> alert('Incorrect OTP try again with correct OTP')</script>";
        echo"<script> window.location='staffotp.php'</script>";
    }
    
  }
?>