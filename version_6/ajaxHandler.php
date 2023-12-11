<!DOCTYPE html>

<script src="jquery-3.6.4.min.js"></script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="stylesheet" href="style.css">

</head>

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

// Process as AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if search parameters are sent via POST
    if (
        isset($_POST['date']) &&
        isset($_POST['quarter']) &&
        isset($_POST['section']) &&
        isset($_POST['township']) &&
        isset($_POST['range']) &&
        isset($_POST['grantorLName']) &&
        isset($_POST['grantorFName']) &&
        isset($_POST['granteeLName']) &&
        isset($_POST['granteeFName'])
    ) {
        // Retrieve search parameters
        $date = $_POST['date'];
        $quarter = $_POST['quarter'];
        $section = $_POST['section'];
        $township = $_POST['township'];
        $range = $_POST['range'];
        $grantorLName = $_POST['grantorLName'];
        $grantorFName = $_POST['grantorFName'];
        $granteeLName = $_POST['granteeLName'];
        $granteeFName = $_POST['granteeFName'];

        // Adjust your SQL query based on the search criteria
        $sql = "SELECT * FROM land_records WHERE 
                DATE LIKE '%$date%' AND 
                QUARTER LIKE '%$quarter%' AND 
                SECTION LIKE '%$section%' AND 
                TOWNSHIP LIKE '%$township%' AND 
                RANGE LIKE '%$range%' AND 
                Grantor_Last_Name LIKE '%$grantorLName%' AND 
                Grantor_First_Name LIKE '%$grantorFName%' AND 
                Grantee_Last_Name LIKE '%$granteeLName%' AND 
                Grantee_First_Name LIKE '%$granteeFName%'";

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

</html>