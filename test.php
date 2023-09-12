<?php
require_once('connection.php');
require_once('admin.php');



if (isset($_GET['data3'])) {
  $id = $_GET['data3'];


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Request Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<center>
  <h1>Quotation Form</h1>
</center>

<body>
  <div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="num_days">Enter the number of days:</label>
        <input type="number" class="form-control" id="num_days" name="num_days" min="1" required>
      </div>

      <button type="submit" class="btn btn-primary" name="dynamic_submit">Submit</button>
      <div class="container mt-5" id="dynamic_form"></div>
      <div class="form-group">
        <label for="request-id">Request ID</label>
        <input type="number" class="form-control" id="request-id" name="request-id" value="<?php echo $id; ?>" disabled
          required>
      </div>

      <div class="form-group">
        <label for="file">File</label>
        <input type="file" class="form-control-file" id="file" name="file" accept=".pdf,.xlsx,.doc">
      </div>
      <button type="submit" name="regular_submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script>
    document.querySelector('form').addEventListener('submit', function(event) {
      event.preventDefault();

      var numDays = parseInt(document.getElementById('num_days').value);

      if (event.submitter.name === 'dynamic_submit') {
        // Generate date and session input fields based on the number of days
        var inputsHTML = '';
        for (var i = 1; i <= numDays; i++) {
          inputsHTML += '<div class="row">';

          inputsHTML += '<div class="col-md-6">';
          inputsHTML += '<div class="form-group">';
          inputsHTML += '<label for="date_' + i + '">Date ' + i + ':</label>';
          inputsHTML += '<input type="date" class="form-control" id="date_' + i + '" name="dates[]" required>';
          inputsHTML += '</div>';
          inputsHTML += '</div>';

          inputsHTML += '<div class="col-md-6">';
          inputsHTML += '<div class="form-group">';
          inputsHTML += '<label for="session_' + i + '">Session ' + i + ':</label>';
          inputsHTML += '<select class="form-control" id="session_' + i + '" name="sessions[]">';
          inputsHTML += '<option value="morning">Morning</option>';
          inputsHTML += '<option value="evening">Evening</option>';
          inputsHTML += '<option value="full">Full</option>';
          inputsHTML += '</select>';
          inputsHTML += '</div>';
          inputsHTML += '</div>';

          inputsHTML += '</div>'; // Closing row div
        }

        // Set the generated HTML to the dynamic form container
        var dynamicFormContainer = document.getElementById('dynamic_form');
        dynamicFormContainer.innerHTML = inputsHTML;
      } else if (event.submitter.name === 'regular_submit') {
        // Perform regular form submission
        this.submit();
      }
    });
  </script>
  <br><br>
</body>


</html>

<?php

if (isset($_POST["submit"])) {
  // Retrieve form data
  @$request_id = $_POST["request-id"];
  $working_date = $_POST["working-date"];
  $finishing_date = $_POST["finishing-date"];
  $starting_time = $_POST["starting-time"];
  $finishing_time = $_POST["finishing-time"];
  @$file_name = $_FILES["file"]["name"];
  @$file_temp = $_FILES["file"]["tmp_name"];

  // Upload file
  $target_dir = "uploadfiles/";
  $target_file = $target_dir . basename($file_name);
  if (move_uploaded_file($file_temp, $target_file)) {
    // Read file contents
    $file_data = file_get_contents($target_file);
    $file_data_encoded = base64_encode($file_data);

    // Insert data into database using prepared statement
    $val = mysqli_query($conn, "SELECT * FROM quattion where request='$id'");
    @$count = mysqli_num_rows($val);

    if ($count > 0) {
      echo "<script>alert('You have already update quatation for this')</script>";
    } else {


      $stmt = $conn->prepare("INSERT INTO quattion (request, w_date, f_date, w_time, f_time, path, file) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("issssss", $id, $working_date, $finishing_date, $starting_time, $finishing_time, $target_file, $file_data_encoded);

      if ($stmt->execute()) {
        echo "<script>alert('Data inserted successfully')</script>";
      } else {
        echo "Error: " . $stmt->error;
      }
    }
  } else {

    echo "<script>alert('Error uploading file')</script>";
  }
}




?>
<style>
  table {
    border-collapse: collapse;
    width: 75%;
    margin: auto;
    font-size: 1em;
    font-family: Arial, sans-serif;
    color: #333;
  }

  th {
    background-color: #1abc9c;
    color: #fff;
    font-weight: bold;
    padding: 10px;
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

  input[type="submit"] {
    background-color: #4CAF50;
    /* Set the background color */
    color: white;
    /* Set the text color */
    padding: 10px 20px;
    /* Set the padding */
    font-size: 16px;
    /* Set the font size */
    border: none;
    /* Remove the border */
    cursor: pointer;
    /* Add a cursor pointer */
    border-radius: 5px;
    /* Add rounded corners */
    margin: left 20px;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
    /* Change the background color on hover */
  }


  button:hover {
    background-color: #148f77;
  }
</style>
<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<center>
  <form action="assign.php" method="post" onsubmit="return validate()">
    <h1>Available Employees List</h1>
</center>
<section>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Type</th>
      <th>Action</th>
    </tr>

    <?php
    $emp = mysqli_query($conn, "SELECT * FROM pro_emp");
    $emp_num = mysqli_num_rows($emp);
    if ($emp_num == 0) {
      $admin = mysqli_query($conn, "SELECT * FROM admin");
      while ($result = $admin->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <?php echo $result['admin_id']; ?>
          </td>
          <td>
            <?php echo $result['name']; ?>
          </td>
          <td>
            <?php echo $result['type']; ?>
          </td>
          <td>

            <input type="checkbox" id="checkbox" name="emp[]" value="<?php echo $result['admin_id']; ?>">

          </td>
        </tr>
        <?php
      }

    } else {
      $data = mysqli_query($conn, "SELECT * FROM quattion");
      $f1 = mysqli_fetch_array($data);
      // $w_date = $f1['w_date'];
      // $f_date = $f1['f_date'];
      
      $admin = mysqli_query($conn, "SELECT *
        FROM admin
        WHERE admin_id NOT IN (
          SELECT pro_emp.employee
          FROM request
          INNER JOIN pro_emp ON request.r_id = pro_emp.request
          INNER JOIN quattion ON request.r_id = quattion.request
          WHERE pro_emp.status = 'assigned'
            
        );");
      while ($result = $admin->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <?php echo $result['admin_id']; ?>
          </td>
          <td>
            <?php echo $result['name']; ?>
          </td>
          <td>
            <?php echo $result['type']; ?>
          </td>
          <td>
            <input type="checkbox" id="checkbox" name="emp[]" value="<?php echo $result['admin_id']; ?>">
          </td>
        </tr>
        <?php
      }
    }

    ?>

  </table>
</section>
<center>
  <h1>Available Vehicle List</h1>
</center>
<section>
  <table>
    <tr>
      <th>ID</th>
      <th>Number</th>
      <th>Type</th>
      <th>Action</th>
    </tr>

    <?php
    $emp = mysqli_query($conn, "SELECT * FROM pro_vehicle");
    $emp_num = mysqli_num_rows($emp);
    if ($emp_num == 0) {
      $admin = mysqli_query($conn, "SELECT * FROM vehicle");
      while ($result = $admin->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <?php echo $result['v_id']; ?>
          </td>
          <td>
            <?php echo $result['v_number']; ?>
          </td>
          <td>
            <?php echo $result['type']; ?>
          </td>
          <td>
            <input type="checkbox" id="checkbox" name="veh[]" value="<?php echo $result['v_id']; ?>">
            <a href="assign.php?veh1=<?php echo $result['v_id']; ?>&req=<?php echo $id; ?>" class="mr-3" title="view"
              data-toggle="tooltip">
              <span class="fa fa-eye" target="_self"></span>
            </a>
          </td>
        </tr>
        <?php
      }

    } else {
      $admin = mysqli_query($conn, "SELECT * FROM vehicle
      WHERE vehicle.v_id NOT IN(
          SELECT pro_vehicle.vehicles
          FROM pro_vehicle
          WHERE pro_vehicle.status='assigned')");
      while ($result = $admin->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <?php echo $result['v_id']; ?>
          </td>
          <td>
            <?php echo $result['v_number']; ?>
          </td>
          <td>
            <?php echo $result['type']; ?>
          </td>
          <td>
            <input type="checkbox" id="checkbox" name="veh[]" value="<?php echo $result['v_id']; ?>">
            <a href="assign.php?veh1=<?php echo $result['v_id']; ?>&req=<?php echo $id; ?>" class="mr-3" title="view"
              data-toggle="tooltip">
              <span class="fa fa-eye" target="_self"></span>
            </a>

          </td>
        </tr>
        <?php
      }
    }

    ?>

  </table>
</section>

<center>
  <h1>Available Equipment List</h1>
</center>
<section>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Type</th>
      <th>Quantity</th>
      <th>Action</th>
    </tr>

    <?php
    $emp = mysqli_query($conn, "SELECT * FROM pro_tools");
    $emp_num = mysqli_num_rows($emp);
    if ($emp_num == 0) {
      $equ = mysqli_query($conn, "SELECT equipment.*, category.c_name, category.c_type
      FROM equipment
      INNER JOIN category
      ON equipment.cat = category.cat_id");
      while ($result = $equ->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <?php echo $result['e_id']; ?>
          </td>
          <td>
            <?php echo $result['c_name']; ?>
          </td>
          <td>
            <?php echo $result['c_type']; ?>
          </td>
          <td>
            <?php echo $result['quantity']; ?>
          </td>
          <td>
            <input type="checkbox" id="checkbox" name="equ[]" value="<?php echo $result['e_id']; ?>">
            <input type="number" name="qty[]" min="1" max="<?php echo $result['quantity']; ?>">
          </td>
        </tr>
        <?php
      }

    } else {
      $admin = mysqli_query($conn, "SELECT
      equipment.*,
      category.c_name,
      category.c_type,
      (equipment.quantity - COALESCE(SUM(pro_tools.qty), 0)) AS remain
    FROM
      equipment
      LEFT JOIN pro_tools ON equipment.e_id = pro_tools.equipment AND pro_tools.status = 'assigned'
      INNER JOIN category ON equipment.cat = category.cat_id
    GROUP BY equipment.e_id;");

      while ($result = $admin->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <?php echo $result['e_id']; ?>
          </td>
          <td>
            <?php echo $result['c_name']; ?>
          </td>
          <td>
            <?php echo $result['c_type']; ?>
          </td>
          <td>
            <?php echo $result['remain']; ?>
          </td>
          <td>
            <input type="checkbox" id="checkbox" name="equ[]" value="<?php echo $result['e_id']; ?>">
            <input type="number" name="qty[]" min="1" max="<?php echo $result['quantity']; ?>">
          </td>
        </tr>
        <?php
      }
    }

    ?>

  </table>
  <br>
  <center>
    <input type="hidden" name="req" value="<?php echo $id; ?>">
    <input type="submit" name="submit"><br><br>
  </center>
  </form>
</section>
<script>
  function validate() {
    var quan = document.getElementsByName("qty[]");
    var equ = document.getElementsByName("equ[]");

    for (var i = 0; i < equ.length; i++) {
      if (equ[i].checked == true) {
        if (quan[i].value === "") {
          alert("Please select a quantity greater than zero.");
          return false;
        }
        else {
          return true;
        }
      }
      else {
        if (quan[i].value !== "") {
          alert("Please select the equipment.");
          return false;
        }
        else {
          return true;
        }
      }
    }
  }

</script>