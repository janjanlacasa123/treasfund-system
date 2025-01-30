<?php
$sourceHost = 'localhost';
$sourceUser = 'root';
$sourcePass = '';
$sourceDB = 'hailhydra';

$destHost = 'localhost';
$destUser = 'root';
$destPass = '';
$destDB = 'ctogensandb';

// Connect to source database
$sourceConn = new mysqli($sourceHost, $sourceUser, $sourcePass, $sourceDB);
if ($sourceConn->connect_error) {
    die("Connection failed: " . $sourceConn->connect_error);
}

// Fetch data from source
$data = $sourceConn->query("SELECT * FROM view_toro_report");
if ($data === false) {
    die("Error fetching data: " . $sourceConn->error);
}

// Connect to destination database
$destConn = new mysqli($destHost, $destUser, $destPass, $destDB);
if ($destConn->connect_error) {
    die("Connection failed: " . $destConn->connect_error);
}

// Insert data into destination
while ($row = $data->fetch_assoc()) {
    $columns = implode(", ", array_keys($row));
    $values = implode(", ", array_map([$destConn, 'real_escape_string'], array_values($row)));
    $insertQuery = "INSERT INTO transaction
     ($columns) VALUES ($values)";
    if (!$destConn->query($insertQuery)) {
        echo "Error inserting data: " . $destConn->error;
    }
}

// Close connections
$sourceConn->close();
$destConn->close();
echo "Data transfer complete.";
?>
