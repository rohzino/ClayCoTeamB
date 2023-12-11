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
        // Debug: Log received search parameters
        error_log('Received search parameters: ' . print_r($_POST, true));

        // Define expected parameters
        $expectedParameters = ['date', 'quarter', 'section', 'township', 'range', 'grantorLName', 'grantorFName', 'granteeLName', 'granteeFName', 'Last_Name_Grantor_3', 'First_Name_Grantor_3', 'INFO'];

        // Check and add conditions for each parameter
        foreach ($expectedParameters as $param) {
            // Use null coalescing operator to provide an empty string if the key is not set
            $conditions[] = "$param LIKE '%" . ($_POST[$param] ?? '') . "%'";
        }

        // Construct the WHERE clause
        $whereClause = implode(' AND ', $conditions);

        // Debug: Log the constructed SQL query
        error_log('Constructed SQL query: ' . $whereClause);

        // Adjust your SQL query based on the search criteria
        $sql = "SELECT * FROM land_records";
        if (!empty($whereClause)) {
            $sql .= " WHERE " . $whereClause;
        }

        $result = $conn->query($sql);

        // Check if there are any records
        if ($result->num_rows > 0) {
            // Output data in JSON format
            // This line sets the content type to JSON
            header('Content-Type: application/json');
            $data = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'No records found']);
        }
    } else {
        echo json_encode(['error' => 'No search parameters provided']);
        exit; // Terminate the script after processing AJAX request
    }
}

// Close the database connection
$conn->close();

?>