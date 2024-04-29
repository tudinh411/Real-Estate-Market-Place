<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "tdinh31";
    $pass = "tdinh31";
    $dbname = "tdinh31";

    $conn = new mysqli($host, $user, $pass, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $card_id = $_POST['card_id'];


    $sql = "DELETE FROM property_cards WHERE id = '$card_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Property card deleted successfully.');</script>";
        header("Location: welcome.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>