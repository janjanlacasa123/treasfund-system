<?php
session_start();
if (isset($_POST['btn_logout']) && $_POST['btn_logout'] == 1) {
    // Destroy the session and logout the user
    $_SESSION = array();
    session_destroy();

    // Optionally, you could redirect here or return a response
    echo 'Logged out successfully'; // Or you can leave it blank, as the JS handles the redirection
    exit();
} else {
    // If the logout flag is not set, you could simply redirect or do something else
    header("Location: index.php");
    exit();
}
?>

