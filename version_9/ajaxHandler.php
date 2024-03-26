<?php
// Clean output buffer
ob_clean();

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
    $conditions = [];

    // Check if at least one search parameter is set
    if (!empty($_POST)) {
        // Define expected parameters
        // looks at the JavaScript searchParams
        $expectedParameters = ['DATE', 'QTR', 'SEC', 'TSP', 'RGE', 'Last_Name_Grantor_1', 'First_Name_Grantor_1', 'Last_Name_Grantee_1', 'First_Name_Grantee_1', 'Last_Name_Grantor_2', 'First_Name_Grantor_2', 'Last_Name_Grantee_2', 'First_Name_Grantee_2', 'Last_Name_Grantor_3', 'First_Name_Grantor_3'];

        // Check and add conditions for each parameter
        foreach ($expectedParameters as $param) {
            // Use null coalescing operator to provide an empty string if the key is not set
			if($_POST[$param]){
				$conditions[] = "`" . $param . "` LIKE '%" . ($_POST[$param] ?? '') . "%'";
			}
		}

        // Construct the WHERE clause
        $whereClause = implode(' AND ', $conditions);

        // Adjust your SQL query based on the search criteria
        $sql = "SELECT * FROM land_records";
        if (!empty($whereClause)) {
            $sql .= " WHERE " . $whereClause;
        }

        //It was suggested that this line might be causing an error.
        // echo "SQL Query: " . $sql . "<br>";
		//echo json_encode($sql);

        $result = $conn->query($sql);

        // Check if there are any records
        if ($result->num_rows > 0) {
            // Fetch all rows as an associative array
            $response = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $response = ['error' => 'No records found'];
        }
    } else {
        $response = ['error' => 'No search parameters provided'];
    }
	
    //It was suggested that this line might be causing an error.
	// echo $response;

    // Output response
    header('Content-Type: application/json');
    echo json_encode($response);

    // Terminate the script after processing AJAX request
    exit;
}

// Close the database connection
$conn->close();
?>