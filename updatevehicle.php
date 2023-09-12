<?php
$conn=mysqli_connect('localhost','root','','packing');

require_once('admin.php');


if(isset($_GET['data2']))
{
    $id=intval($_GET['data2']);
    $sql=mysqli_query($conn,"SELECT * FROM vehicle where v_id='$id'");
    
}
$sql1=mysqli_query($conn,"SELECT * FROM vehicle where v_id='$id'");


?>

<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/reg.css">
	


<?php

while($rows=$sql1->fetch_assoc())
{
    

?>
   
   <div class="container">
    <div class="title">Add Vehicles</div>
    <div class="content">
      <form action="updatevehicle.php" method="post">

        <div class="user-details">
          <div class="input-box">
            <span class="details">
              Vehicle Number</span>
            <input type="text" placeholder="Enter vehicle number" name="vnum" value="<?php echo $rows['v_number'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">
              Height<i>(in feet)</i></span>
            <input type="number" placeholder="height in feet" name="height" value="<?php echo $rows['height'];?>" required >
          </div>
          <div class="input-box">
            <span class="details">
              Width<i>(in feet)</i></span>
            <input type="number" placeholder="width in feet" name="width" value="<?php echo $rows['width'];?>" required >
          </div>
          <div class="input-box">
            <span class="details">Capacity<i>(in tons)</i></span>
            <input type="number" placeholder="Enter the capacity" name="capacity" value="<?php echo $rows['capacity'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">
              Fuel Capacity<i>(litre)</i></span>
            <input type="number" placeholder="tank capacity in litre" name="ltr" value="<?php echo $rows['feul'];?>" required">
          </div>

          <div class="input-box">
            <span class="details">
              Model</span>
            <input type="text" placeholder="vehicle model" name="model" value="<?php echo $rows['model'];?>" required">
          </div>
                    
          <div class="input-box">
            <span class="details">Type</span>
           
              <select name="type" id="type">
                  <option value="Refregirator Truck">Refregirator Truck</option>
                  <option value="Dump Track">Dump Track</option>
                  <option value="Full Body">Full Body</option>
                  <option value="Flat Bed">Flat Bed</option>
                </select>
              </div>

              <div class="input-box">
            <span class="details">Type</span>
           
              <select name="status" id="type">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                  
                </select>
              </div>
        
              
              <div class="input-box">
            <span class="details">
            </span><br>
            <input type="hidden" name="id" value="<?php echo $id;?>">
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
    $Num=$_POST['vnum'];
    $Width=$_POST['width'];
    $Height=$_POST['height'];
    $Capacity=$_POST['capacity'];
    $ltr=$_POST['ltr'];
    $Type=$_POST['type'];
    $Model=$_POST['model'];
    $Status=$_POST['status'];
    $id2=$_POST['id'];
    

    $check=mysqli_query($conn,"SELECT * FROM vehicle where v_number='$Num' ");
    $fetch = mysqli_fetch_array($check);
	  $row = mysqli_num_rows($check);
    

    if($row == 0)
    {
        
        $query = "UPDATE vehicle SET v_number='$Num', width='$Width', height='$Height', capacity='$Capacity', feul='$ltr', type='$Type', status='$Status', model='$Model' WHERE v_id='$id2'";
        $q1 = mysqli_query($conn, $query);

        if($q1)
        {
        echo "<script>alert('Successfully record updated!')</script>";
		    echo "<script>window.location='viewvehicle.php'</script>";
        }
   
    }
    else
    {
        echo "<script>alert('You already have a vehicle with number')</script>";
        echo "<script>window.location='viewvehicle.php'</script>";
    }

}


?>