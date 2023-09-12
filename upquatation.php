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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Combo Box with Reduced Width</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
</head>
<center>
  <h1>Quotation Form</h1>
</center>

<body style="margin-left:200px;">
  <div class="container mt-5">
    <form action="quotation.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="num_days">Enter the number of days:</label>
        <input type="number" class="form-control" id="num_days" name="num_days" min="1" required>
      </div>

      <button type="button" class="btn btn-primary" name="dynamic_submit" id="dynamic_submit">Submit</button>
      <div class="container mt-5" id="dynamic_form"></div>
      <div class="form-group">
        <label for="request-id">Request ID</label>
        <input type="number" class="form-control" id="request-id" name="request-id" value="<?php echo $id; ?>" disabled
          required>
      </div>

      <div class="form-group">
        <label for="file">File</label>
        <input type="file" class="form-control-file" id="file" name="file" accept=".pdf,.xlsx,.doc" required>
      </div>
      <input type="hidden" name="request" value="<?php echo $id; ?>">
      <button type="submit" name="submits" class="btn btn-primary">Submit</button>
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
    document.getElementById('dynamic_submit').addEventListener('click', function (event) {
      event.preventDefault();

      var numDays = parseInt(document.getElementById('num_days').value);

      // Generate date and session input fields based on the number of days
      var inputsHTML = '';
      var currentDate = new Date(); // Get the current date
      var maxDate = new Date();
      maxDate.setMonth(maxDate.getMonth() + 1); // Add one month to the current date

      for (var i = 1; i <= numDays; i++) {
        inputsHTML += '<div class="row">';

        inputsHTML += '<div class="col-md-6">';
        inputsHTML += '<div class="form-group">';
        inputsHTML += '<label for="date_' + i + '">Date ' + i + ':</label>';
        inputsHTML += '<input type="date" class="form-control" id="date_' + i + '" name="dates[]" required';
        inputsHTML += ' min="' + formatDate(currentDate) + '" max="' + formatDate(maxDate) + '"';
        inputsHTML += ' onchange="handleDateChange(this)">';
        inputsHTML += '</div>';
        inputsHTML += '</div>';

        inputsHTML += '<div class="col-md-6">';
        inputsHTML += '<div class="form-group">';
        inputsHTML += '<label for="session_' + i + '">Session ' + i + ':</label>';
        inputsHTML += '<select class="form-control" id="session_' + i + '" name="sessions[]">';
<?php
$ses = mysqli_query($conn, "SELECT * FROM session ORDER BY s_id");
while ($rows = $ses->fetch_assoc()) {
  ?>
            inputsHTML += '<option value="<?php echo $rows['s_id']; ?>"><?php echo $rows['ses_name']; ?></option>';
   <?php
}
?>
          inputsHTML += '</select>';
        inputsHTML += '</div>';
        inputsHTML += '</div>';


        inputsHTML += '</div>'; // Closing row div
      }

      // Set the generated HTML to the dynamic form container
      var dynamicFormContainer = document.getElementById('dynamic_form');
      dynamicFormContainer.innerHTML = inputsHTML;
    });

    // Function to format date as "YYYY-MM-DD"
    function formatDate(date) {
      var year = date.getFullYear();
      var month = String(date.getMonth() + 1).padStart(2, '0');
      var day = String(date.getDate()).padStart(2, '0');
      return year + '-' + month + '-' + day;
    }

    // Function to handle date change and prevent selecting the same date
    function handleDateChange(element) {
      var selectedDate = new Date(element.value);
      var dateInputs = document.getElementsByName('dates[]');

      for (var i = 0; i < dateInputs.length; i++) {
        if (dateInputs[i] !== element) {
          var existingDate = new Date(dateInputs[i].value);

          if (selectedDate.getTime() === existingDate.getTime()) {
            element.setCustomValidity('Please select a different date.');
            return;
          }
        }
      }

      element.setCustomValidity('');
    }
  </script>

</body>



</html>