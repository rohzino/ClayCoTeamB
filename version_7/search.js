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
                console.error('AJAX Error:', status, error);
            }
        });
    }

    // Function to update HTML content with search results
    function updateContent(data) {
        console.log('Updating content with data:', data);
        // Clear previous search results
        $('#searchResults').empty();

        // Check if there is an error in the data
        if (data.error) {
            console.error('Error:', data.error);
            return;
        }

        // Output data in a table
        var table = '<table>';
        table += '<tr><th>DATE</th><th>TYPE</th><th>BK</th><th>PAGE</th>';
        table += '<th>Last Name Grantor 1</th><th>First Name Grantor 1</th>';
        table += '<th>Last Name Grantor 2</th><th>First Name Grantor 2</th>';
        table += '<th>Last Name Grantor 3</th><th>First Name Grantor 3</th>';
        table += '<th>Last Name Grantee 1</th><th>First Name Grantee 1</th>';
        table += '<th>Last Name Grantee 2</th><th>First Name Grantee 2</th>';
        table += '<th>QTR</th><th>SEC</th><th>TSP</th><th>RGE</th>';
        table += '<th>INFO</th><th>LOT</th><th>BLK</th><th>ADDITION</th><th>CITY</th>';
        table += '</tr>';

        // Output data of each row
        for (var i = 0; i < data.length; i++) {
            table += '<tr>';
            table += '<td>' + (data[i]["DATE"] || '') + '</td>';
            table += '<td>' + (data[i]["TYPE"] || '') + '</td>';
            table += '<td>' + (data[i]["BK"] || '') + '</td>';
            table += '<td>' + (data[i]["PAGE"] || '') + '</td>';
            table += '<td>' + (data[i]["Last_Name_Grantor_1"] || '') + '</td>';
            table += '<td>' + (data[i]["First_Name_Grantor_1"] || '') + '</td>';
            table += '<td>' + (data[i]["Last_Name_Grantor_2"] || '') + '</td>';
            table += '<td>' + (data[i]["First_Name_Grantor_2"] || '') + '</td>';
            table += '<td>' + (data[i]["Last_Name_Grantor_3"] || '') + '</td>';
            table += '<td>' + (data[i]["First_Name_Grantor_3"] || '') + '</td>';
            table += '<td>' + (data[i]["Last_Name_Grantee_1"] || '') + '</td>';
            table += '<td>' + (data[i]["First_Name_Grantee_1"] || '') + '</td>';
            table += '<td>' + (data[i]["Last_Name_Grantee_2"] || '') + '</td>';
            table += '<td>' + (data[i]["First_Name_Grantee_2"] || '') + '</td>';
            table += '<td>' + (data[i]["QTR"] || '') + '</td>';
            table += '<td>' + (data[i]["SEC"] || '') + '</td>';
            table += '<td>' + (data[i]["TSP"] || '') + '</td>';
            table += '<td>' + (data[i]["RGE"] || '') + '</td>';
            table += '<td>' + (data[i]["INFO"] || '') + '</td>';
            table += '<td>' + (data[i]["LOT"] || '') + '</td>';
            table += '<td>' + (data[i]["BLK"] || '') + '</td>';
            table += '<td>' + (data[i]["ADDITION"] || '') + '</td>';
            table += '<td>' + (data[i]["CITY"] || '') + '</td>';
            table += '</tr>';
        }

        table += '</table>';

        // Append the table to the search results container
        $('#searchResults').append(table);
    }

    // Example: Trigger search when a button is clicked
    $('#searchButton').on('click', function () {
        console.log('Search button clicked!');
        var searchParams = {
            date: $('#dateInput').val(),
            quarter: $('#quarterInput').val(),
            section: $('#sectionInput').val(),
            township: $('#townshipInput').val(),
            range: $('#rangeInput').val(),
            grantorLName: $('#grantorLNameInput').val(),
            grantorFName: $('#grantorFNameInput').val(),
            granteeLName: $('#granteeLNameInput').val(),
            granteeFName: $('#granteeFNameInput').val()
        };

        // Perform the search
        performSearch(searchParams);
    });
});