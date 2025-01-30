<?php
// Includes the database connection
include('includes/conn.php');

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'create') {

    // Get form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $retype_password = mysqli_real_escape_string($conn, $_POST['retype_password']);

    // Simple validation for password matching
    if ($password != $retype_password) {
        // If passwords don't match, return an error
        echo json_encode(['status' => 'error', 'message' => 'Passwords do not match!']);
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO users (first_name, middle_name, last_name, empid, user_type, password) 
            VALUES ('$first_name', '$middle_name', '$last_name', '$user_id', '$user_type', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        // Success response
        echo json_encode(['status' => 'success', 'message' => 'New user created successfully!']);
    } else {
        // Error response
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . mysqli_error($conn)]);
    }
}
?>
