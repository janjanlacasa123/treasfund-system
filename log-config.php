<?php
include('includes/conn.php');
// Start Session
session_start();

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $password = $_POST['password'];

        if (empty($user) || empty($password)) {
            $response['status'] = "Employee ID and password are required!";
            $response['status_code'] = "error";
        } else {
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                if (password_verify($password, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];

                    // Successful login
                    $response['status'] = "Login successful!";
                    $response['status_code'] = "success";
                } else {
                    // Invalid password
                    $response['status'] = "Invalid Employee ID or password!";
                    $response['status_code'] = "error";
                }
            } else {
                // User not found
                $response['status'] = "Invalid Employee ID or password!";
                $response['status_code'] = "error";
            }
        }
    } else {
        // Missing data
        $response['status'] = "Employee ID and password are required!";
        $response['status_code'] = "error";
    }
} else {
    // Invalid request method
    $response['status'] = "Invalid request method!";
    $response['status_code'] = "error";
}

// Return the response as JSON
echo json_encode($response);
?>
