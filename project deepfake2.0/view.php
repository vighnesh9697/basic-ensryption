<?php
include('dbconnect.php');

// Use prepared statements to avoid SQL injection
$query = 'SELECT * FROM login';

$result = mysqli_query($con, $query);

if (!$result) {
    $message = 'ERROR: ' . mysqli_error($con);
    echo $message;
    return;
} else {
    echo '
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User List</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(to bottom, #121212, #4b0082); /* Fading to deep violet */
                color: #ffffff; /* Light text color */
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            table {
                width: 80%;
                border-collapse: collapse;
                margin: 20px auto;
                background-color: #2c2c2c; /* Darker container for table */
                border-radius: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            }
            th, td {
                border: 1px solid #444; /* Softer border color */
                padding: 12px;
                text-align: center;
            }
            th {
                background-color: #4CAF50; /* Header color */
                color: white;
                font-weight: bold;
            }
            tr:nth-child(even) {
                background-color: #3a3a3a; /* Slightly lighter for even rows */
            }
            tr:nth-child(odd) {
                background-color: #2c2c2c; /* Darker for odd rows */
            }
            tr:hover {
                background-color: #5a5a5a; /* Highlight on hover */
            }
            a {
                color: #ffcc00; /* Gold color for links */
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>';

    // Fetch field names dynamically and create table headers
    $fields = mysqli_fetch_fields($result);
    foreach ($fields as $field) {
        echo '<th>' . ucfirst($field->name) . '</th>';
    }

    echo '<th>Delete</th></tr>';

    // Fetch table rows
    while ($row = mysqli_fetch_row($result)) {
        echo '<tr>';
        $idval = $row[0]; // Assume the first column is the id
        foreach ($row as $cell) {
            echo '<td>' . htmlspecialchars($cell) . '</td>'; // Use htmlspecialchars to prevent XSS
        }
        echo '<td><a href="delpatient.php?id=' . $idval . '" onclick="return confirm(\'Are you sure you want to delete this record?\');">Delete</a></td>';
        echo '</tr>';
    }

    echo '</table>
    </body>
    </html>';

    mysqli_free_result($result);
}

mysqli_close($con);
?>
