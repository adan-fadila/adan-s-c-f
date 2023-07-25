<?php 
    include 'db.php';
    
    // Check if the form is submitted with a search query
    if (isset($_POST['search'])) {
        // Get the search query from the form input
        $searchQuery = $_POST['search'];
    
        // TODO: Implement your search logic here
        // For example, you can use this $searchQuery to query your database or search through other data sources.
        // Perform the search and get the search results.
    
        // For demonstration purposes, let's assume you have an array of data to search through.
        $data = array(
            "apple",
            "banana",
            "orange",
            "grape",
            "kiwi",
            // ... other data ...
        );
    
        // Perform the search using array_filter and a custom search function
        $searchResults = array_filter($data, function ($item) use ($searchQuery) {
            // Use stripos for case-insensitive search, change to strpos for case-sensitive search
            return stripos($item, $searchQuery) !== false;
        });
    
        // Display the search results
        if (count($searchResults) > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<ul>";
            foreach ($searchResults as $result) {
                echo "<li>$result</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No results found.</p>";
        }
    }
    ?>
    