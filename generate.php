<?php
// Read the HTML file
$html = file_get_contents('king.html');

// Create a DOMDocument object
$dom = new DOMDocument();

// Suppress errors for invalid HTML
libxml_use_internal_errors(true);

// Load the HTML content into the DOMDocument
$dom->loadHTML($html);

// Restore error handling
libxml_use_internal_errors(false);

// Create a DOMXPath object to query the DOMDocument
$xpath = new DOMXPath($dom);

// Create an empty string to store the SQL queries
$sqlQueries = "";

// Find all <tr> elements within the <table> element
$trElements = $xpath->query('//table/tr[position()>1]'); // Skip the first row as it contains headers

// Iterate through each <tr> element
foreach ($trElements as $tr) {
    // Extract machine_id and local_id values from the <td> elements
    $tdElements = $tr->getElementsByTagName('td');
    $machine_id = $tdElements->item(0)->nodeValue;
    $local_id = $tdElements->item(1)->nodeValue;

    // Construct the SQL query with placeholders replaced by the extracted values
    $sqlQuery = 
    "QUERY";

    // Append the SQL query to the string
     // Append the SQL query to the string with a big space
     $sqlQueries .= $sqlQuery . "\n\n\n\n\n"; // Add big space
}

// Set the headers to force download
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="queries.txt"');

// Output the SQL queries
echo $sqlQueries;
?>