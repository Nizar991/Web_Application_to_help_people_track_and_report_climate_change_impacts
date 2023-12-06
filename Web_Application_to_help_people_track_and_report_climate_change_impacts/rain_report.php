<?php 
include "./dataBase_Connection.php";
$sql = "SELECT * FROM rain_data";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rain Report</title>
  <style>
    body {
      /* Set background image and adjust other background properties */
      background-image: url('image/raindrop.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image file */
      background-size: cover; 
      background-repeat: no-repeat; 
      margin: 0; 
      font-family: Arial, sans-serif; 
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    h2{
    color: #282828;
  }
  </style>
</head>
<body>
  <h2>Rain Report</h2>
  <table id="data-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Time</th>
        <th>Location</th>
        <th>Duration</th>
        <th>Intensity</th>
        <th>Humidity</th>
        <th>Wind Speed</th>
      </tr>
    </thead>
  <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <tr>
        <td><?php echo $row['r_id']; ?></td>
        <td><?php echo $row['r_date']; ?></td>
        <td><?php echo $row['r_time']; ?></td>
        <td><?php echo $row['r_location']; ?></td>
        <td><?php echo $row['r_duration']; ?></td>
        <td><?php echo $row['r_intensity']; ?></td>
        <td><?php echo $row['r_humidity']; ?></td>
        <td><?php echo $row['r_windspeed']; ?></td>>
        </tr>                       
<?php   }
}
$conn->close(); 
?>              
</tbody>
</table>
<!-- <a style="color:black;" class="btn btn-warning" href="temp_data_form.php"><b>Create User</b></a> -->
</div> 

  <script>
    // Fetch data from the JSON file
    fetch('data.json')
      .then(response => response.json())
      .then(data => {
        // Call a function to display the data in a table
        displayDataInTable(data);
      })
      .catch(error => console.error('Error fetching data:', error));

    // Function to display data in a table
    function displayDataInTable(data) {
      var tableBody = document.getElementById('table-body');

      // Clear existing table rows
      tableBody.innerHTML = '';

      // Loop through the data and create table rows
      data.forEach(function (item) {
        var row = document.createElement('tr');

        var nameCell = document.createElement('td');
        nameCell.textContent = item.name;
        row.appendChild(nameCell);

        var ageCell = document.createElement('td');
        ageCell.textContent = item.age;
        row.appendChild(ageCell);

        var emailCell = document.createElement('td');
        emailCell.textContent = item.email;
        row.appendChild(emailCell);

        tableBody.appendChild(row);
      });
    }
  </script>
</body>
</html>