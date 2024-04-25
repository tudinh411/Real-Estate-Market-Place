<!DOCTYPE html>
<html>

<body>
    <form action="sqlpractice.php" method="post">
        <input type="text" id="username" name="username" placeholder="Username">
        <input type="text" id="password" name="password" placeholder="Password">
        <select id="role" name="role">
            <option value="user">User</option>
            <option value="seller">Seller</option>
        </select><br><br>
        <input type="email" id="email" name="email" placeholder="Email" required><br><br>
        <input type="text" id="creditcard" name="creditcard" placeholder="Credit Card" required><br><br>
        <input type="text" id="expiration" name="expiration" placeholder="Exp. MM/YYYY" required><br><br>
        <input type="password" id="cvv" name="cvv" placeholder="CVV" required><br><br>
        <input type="text" id="address" name="address" placeholder="Address" required><br><br>
        <input type="text" id="billing" name="billing" placeholder="Billing Address" required><br><br>
        <input type="text" id="phone" name="phone" placeholder="Phone Number" required><br><br>
        <div class="credit-card-type" id="card-type"></div><br><br>
        <input type="submit" value="Submit">
    </form>
    <script>
    function detectCardType() {
        var cardNumber = document.getElementById("creditcard").value;
        var cardType = document.getElementById("card-type");
        var detectedType = "Unknown";
        
        if (/^4/.test(cardNumber)) {
            detectedType = "Visa";
        } else if (/^5[1-5]/.test(cardNumber)) {
            detectedType = "MasterCard";
        } else if (/^3[47]/.test(cardNumber)) {
            detectedType = "American Express";
        }
        console.log("Detected Card Type: " + detectedType); 
        cardType.textContent = "Detected Card Type: " + detectedType;
    }
        document.getElementById("creditcard").addEventListener("input", detectCardType);
        detectCardType();
</script>
</body>

</html>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $passwrd = $_POST["password"];
    $userrole = $_POST["role"];
    $email = $_POST['email'];
    $creditcard = $_POST['creditcard'];
    $expiration = $_POST['expiration'];
    $cvv = $_POST['cvv'];
    $useraddress = $_POST['address'];
    $billing = $_POST['billing'];
    $phone = $_POST['phone'];
}

$host = "localhost";
$user = "syosef2";
$pass = "syosef2";
$dbname = "syosef2";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {

  $sql_create_table = "CREATE TABLE IF NOT EXISTS USERINFO (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    passwrd VARCHAR(30) NOT NULL,
    userrole VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    creditcard VARCHAR(30) NOT NULL,
    expiration VARCHAR(30) NOT NULL,
    cvv VARCHAR(30) NOT NULL,
    useraddress VARCHAR(30) NOT NULL,
    billing VARCHAR(30) NOT NULL,
    phone VARCHAR(30) NOT NULL
)";

    $sql_insert_data = "INSERT INTO USERINFO (username, passwrd, userrole, email, creditcard, expiration, cvv, useraddress, billing, phone) 
    VALUES ('$username', '$passwrd', '$userrole', '$email', '$creditcard', '$expiration', '$cvv', '$useraddress', '$billing', '$phone')";

    if ($conn->query($sql_insert_data) === TRUE) {
        echo "Registration was succesful";
    } else {
        echo "Registration was unsuccesful";
    }
}

$conn->close();
?>