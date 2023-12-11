<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <header>
        <div class="logo"></div>
        <h1>Clay County Interactable Map</h1>
    </header>

    <nav>
        <a href="#">Home</a>
        <a href="#">Events</a>
        <a href="#">County History</a>
        <a href="#">What Do We Offer</a>
        <a href="#">Gift Shop</a>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
        <a href="#">Volunteer</a>
        <a href="#">Township Map</a>
    </nav>

  
    <div class="content">
       <h2>Interactive Map</h2>
      <p>This is description text what will tell how to use the site and what it does</p>
    </div>

  <div id="map-container">
    <p>this is where the image will go</p>
      <!-- Image here -->
  </div>

  <div id="info-area">
      <div id="info-content">
          <!-- content later -->
          <h2>Information Area</h2>
          <p>Placeholder text. This area will be updated with information.</p>
      </div>
  </div>

  <div class="text-box-container">
      <div class="text-box">
          <h3>Date</h3>
          <p>Data from the database for Date</p>

          <label for="Date">Date of Land Transfer:</label>
          <input type="date" id="Date"><br>
      </div>

      <div class="text-box">
          <h3>Quarter</h3>
          <p>Data from the database for Quarter</p>

          <label for="Quarter">Quarter ID:</label>
          <input type="text" id="Quarter"><br>
          <!-- What does W2, E2, S2, etc mean?  need it for the description -->
      </div>

      <div class="text-box">
          <h3>Section</h3>
          <p>Data from the database for Section</p>

          <label for="Section">Section Number:</label>
          <input type="number" id="Section"><br>
      </div>

      <div class="text-box">
          <h3>Township</h3>
          <p>Data from the database for Township</p>

          <label for="Township">Township Number:</label>
          <input type="number" id="Township"><br>
          
      </div>

      <div class="text-box">
          <h3>Range</h3>
          <p>Data from the database for Range</p>

          <label for="Range">Range Number:</label>
          <input type="number" id="Range"><br>
      </div>

      <div class="text-box">
          <h3>Grantor Name</h3>
          <p>Data from the database for Grantor Name</p>

          <label for="GrantorLName">Grantor Last Name:</label>
          <input type="text" id="GrantorLName"><br>
          <label for="GrantorFName">Grantor First Name:</label>
          <input type="text" id="GrantorFName"><br>
      </div>

      <div class="text-box">
          <h3>Grantee Name</h3>
          <p>Data from the database for Grantee Name</p>

          <label for="GranteeLName">Grantee Last Name:</label>
          <input type="text" id="GranteeLName"><br>
          <label for="GranteeFName">Grantee First Name:</label>
          <input type="text" id="GranteeFName"><br>
      </div>

      <button id="searchButton">Search</button>
  </div>

  <?php

// Replace these values with your actual database credentials
$servername = "localhost:3306";
$username = "wndmogmy_clayco";
$password = "K-State1863";
$database = "wndmogmy_clayco";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//process as AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if search parameters are sent via POST
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        // Adjust your SQL query based on the search criteria
        $sql = "SELECT * FROM land_records WHERE 
                column1 LIKE '%$keyword%' OR 
                column2 LIKE '%$keyword%' OR 
                // ... add conditions for other columns
                ";
        $result = $conn->query($sql);

        // Check if there are any records
        if ($result->num_rows > 0) {
            // Output data in JSON format
            $data = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'No records found']);
        }
    } else {
        echo json_encode(['error' => 'Invalid request']);
    }
    exit; // Terminate the script after processing AJAX request
}

// SQL query to select all records from the "land_records" table
$sql = "SELECT * FROM land_records";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Output table header
    echo "<table>";
    echo "<tr>";
    echo "<th>DATE</th><th>TYPE</th><th>BK</th><th>PAGE</th>";
    echo "<th>Last Name Grantor 1</th><th>First Name Grantor 1</th>";
    echo "<th>Last Name Grantor 2</th><th>First Name Grantor 2</th>";
    echo "<th>Last Name Grantor 3</th><th>First Name Grantor 3</th>";
    echo "<th>Last Name Grantee 1</th><th>First Name Grantee 1</th>";
    echo "<th>Last Name Grantee 2</th><th>First Name Grantee 2</th>";
    echo "<th>QTR</th><th>SEC</th><th>TSP</th><th>RGE</th>";
    echo "<th>INFO</th><th>LOT</th><th>BLK</th><th>ADDITION</th><th>CITY</th>";
    echo "</tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["DATE"] . "</td><td>" . $row["TYPE"] . "</td><td>" . $row["BK"] . "</td><td>" . $row["PAGE"] . "</td>";
        echo "<td>" . $row["Last_Name_Grantor_1"] . "</td><td>" . $row["First_Name_Grantor_1"] . "</td>";
        echo "<td>" . $row["Last_Name_Grantor_2"] . "</td><td>" . $row["First_Name_Grantor_2"] . "</td>";
        echo "<td>" . $row["Last_Name_Grantor_3"] . "</td><td>" . $row["First_Name_Grantor_3"] . "</td>";
        echo "<td>" . $row["Last_Name_Grantee_1"] . "</td><td>" . $row["First_Name_Grantee_1"] . "</td>";
        echo "<td>" . $row["Last_Name_Grantee_2"] . "</td><td>" . $row["First_Name_Grantee_2"] . "</td>";
        echo "<td>" . $row["QTR"] . "</td><td>" . $row["SEC"] . "</td><td>" . $row["TSP"] . "</td><td>" . $row["RGE"] . "</td>";
        echo "<td>" . $row["INFO"] . "</td><td>" . $row["LOT"] . "</td><td>" . $row["BLK"] . "</td><td>" . $row["ADDITION"] . "</td><td>" . $row["CITY"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found";
}

// Close the database connection
$conn->close();

?>

  <footer>
      <p>Centered Text at the Top of the Footer</p>
      <img src="your-logo.png" id="footer-logo" alt="Footer Logo">
  </footer>
  
</body>

<script src="jquery-3.6.4.min.js"></script>
<script src="search.js"></script>

</html>