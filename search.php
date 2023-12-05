<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Land Records</title>
    <style>
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
    </style>
</head>
<body>

<h2>Land Records</h2>

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

</body>
</html>
