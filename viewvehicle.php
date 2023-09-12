<?php

 require_once 'connection.php';
 require_once 'admin.php';


$sql = " SELECT * FROM vehicle ORDER BY v_id DESC ";
$result = mysqli_query($conn,$sql);

if(isset($_GET['data']))
{
    $rid=intval($_GET['data']); 
    $sql1=mysqli_query($conn,"DELETE  FROM vehicle where v_id= '$rid'");
    if($sql1)
    {
        echo "<script>alert('Data deleted');</script>"; 
        echo "<script>window.location.href = 'viewvehicle.php'</script>"; 
    }
    else
    {
        echo "<script>alert('Data not deleted');</script>"; 
        echo "<script>window.location.href = 'viewvehicle.php'</script>";
    }

    
}
?>

<style>
       table {
  border-collapse: collapse;
  width: 80%;
  margin-left: 220px;
  margin-right: 50px;
  font-size: 1em;
  font-family: Arial, sans-serif;
  color: #333;
}

th {
  background-color: silver;
  color: black;
  font-weight: bold;
  padding:5px;
  text-align: left;
  text-transform: uppercase;
}

td {
  border: 1px solid #ccc;
  padding: 10px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #e6f7ff;
  cursor: pointer;
}

/* Button styles */

button {
  background-color: #1abc9c;
  color: #fff;
  border: none;
  border-radius: 3px;
  padding: 10px 20px;
  font-size: 1em;
  font-weight: bold;
  text-transform: uppercase;
  cursor: pointer;
}

button:hover {
  background-color: #148f77;
}
    </style>
     <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

<center>
<h1>Vehicle List</h1>
</center>
<section>
<table>
            <tr>
                <th>Vehicle Number</th>
                <th>Type</th>
                <th>Model</th>
                <th>Height</th>
                <th>Width</th>
                <th>Capacity</th>
                <th>Fuel</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>
        
            <?php
            
                while($rows=$result->fetch_assoc())
                {
                $v_id     = $rows['v_id'];
              



            ?>
            <tr>
                
                <td><?php echo $rows['v_number'];?></td>
                <td><?php echo $rows['type'];?></td>
                <td><?php echo $rows['model'];?></td>
                <td><?php echo $rows['height'];?></td>
                <td><?php echo $rows['width'];?></td>
                <td><?php echo $rows['capacity'];?></td>
                <td><?php echo $rows['feul'];?></td>
                <td><?php echo $rows['status'];?></td>
               
                <td>

                <a href="updatevehicle.php?data2=<?php echo ($rows['v_id']); ?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil" target="_self"></span></a>
                
                <a href="viewvehicle.php?data=<?php echo ($rows['v_id']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><span class="fa fa-trash"></span></a>
                
                </td>
                
            </tr>
            <?php
                }
            ?>
        </table>
            </section>


</body>
</html>