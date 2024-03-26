$(document).ready(function () {
    // Function to perform AJAX search
    function performSearch(searchParams) {
        // Log search parameters
        console.log('Performing search with params:', searchParams);

        $.ajax({
            type: 'POST',
            url: 'ajaxHandler.php',
            data: searchParams,
            dataType: 'json',
            success: function (data) {
                console.log('Data received:', data);
                console.log('AJAX Success. Data received:', data);
                // Handle the data received from the server
                updateContent(data);
            },
            error: function (xhr, status, error) {
                console.log('AJAX Error:', status, error);
            }
        });
    }

    // Function to update HTML content with search results
    function updateContent(data) {
        $('#searchResults').empty();
    
        if (data.error && data.error === 'No records found') {
            $('#searchResults').html('<p>No records found.</p>');
            return;
        } else if (data.error) {
            console.error('Error:', data.error);
            return;
        } else {
            console.log('Updating content with data:', data);
    
            // Clear previous search results
            $('#searchResults').empty();
    
            // Output data in a table
            var table = '<table><thead><tr>';
    
            // Generate table headers dynamically
            Object.keys(data[0]).forEach(function(key) {
                table += '<th>' + key + '</th>';
            });
    
            table += '</tr></thead><tbody>';
    
            // Generate table rows dynamically
            data.forEach(function(record) {
                table += '<tr>';
                Object.values(record).forEach(function(value) {
                    table += '<td>' + value + '</td>';
                });
                table += '</tr>';
            });
    
            table += '</tbody></table>';
    
            // Append the table to the search results container
            $('#searchResults').append(table);
        }
    }

    // Example: Trigger search when a button is clicked
    $('#searchButton').on('click', function (event) {
        event.preventDefault(); // Prevent default form submission
        console.log('Search button clicked!');
        //searchParams look at the HTML input field id tags
        var searchParams = {};

    // Iterate over each input field and add it to searchParams if it's not empty
    $('input[type="text"], input[type="number"], input[type="date"]').each(function() {
        var value = $(this).val().trim(); // Trim whitespace
        if (value !== '') {
            var columnName = $(this).data('column'); // Get the data-column attribute value
            if (columnName) {
                searchParams[columnName] = value; // Use the column name as the key
            }
        }
    });

    // Perform the search if there are any parameters
    if (Object.keys(searchParams).length > 0) {
        performSearch(searchParams);
    } else {
        console.log('No search parameters provided');
    }

    // Log if all input fields are empty
    if (Object.keys(searchParams).length === 0) {
        console.log('All input fields are empty');
    }
    });
});