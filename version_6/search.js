$(document).ready(function () {
    // Function to perform AJAX search
    function performSearch(searchParams) {
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: searchParams,
            dataType: 'json',
            success: function (data) {
                // Handle the data received from the server
                if (data.error) {
                    console.error('Error:', data.error);
                } else {
                    // Update your HTML content with the retrieved data
                    updateContent(data);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }

    // Function to update HTML content with search results
    function updateContent(data) {
        // Implement your logic to update the HTML content
        // For now, let's log the data to the console
        console.log('Search Results:', data);
    }

    // Example: Trigger search when the page loads
    // performSearch({ keyword: 'initialKeyword' });

    // Example: Trigger search when a button is clicked
    $('#searchButton').on('click', function () {
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