<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hail_hydra";

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}
// Start Session
//Queries on Accounting Database
$select_printing_details = "SELECT BANK, BANK_ACCTNO, CHECK_NUMBER, PAYEE, FINAL_AMOUNT, CHECK_DATE FROM cheque_view WHERE YEAR(CHECK_DATE) = YEAR(CURDATE()) AND DV_NUMBER = ?";
$select_dv_numbers = "SELECT DV_NUMBER FROM cheque_view WHERE YEAR(CHECK_DATE) = YEAR(CURDATE()) AND DV_NUMBER LIKE ? ORDER BY CHECK_DATE DESC LIMIT 10"
?>