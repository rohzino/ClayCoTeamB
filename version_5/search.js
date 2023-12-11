$(document).ready(function () {
    // Function to perform AJAX search
    function performSearch(keyword) {
        $.ajax({
            type: 'POST',
            url: 'index.php', // Update with the correct PHP file name
            data: { keyword: keyword },
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
    //performSearch('initialKeyword');

    // Example: Trigger search when a button is clicked
    $('#searchButton').on('click', function () {
        var searchKeyword = $('#searchInput').val();
        var searchKeyword = $('#searchInput').val();
        var searchKeyword = $('#searchInput').val();
        var searchKeyword = $('#searchInput').val();
        var searchKeyword = $('#searchInput').val();
        var searchKeyword = $('#searchInput').val();
        var searchKeyword = $('#searchInput').val();
        var searchKeyword = $('#searchInput').val();
        var searchKeyword = $('#searchInput').val();
        
        //how do we make the SQL search for all available key words at once
        //instead of searching 9 times for an individual keyword?
        performSearch(searchKeyword);
    });
});