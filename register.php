<!DOCTYPE html>
<html>
<title>Register</title>
<link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
<style>
    body {
        width: 100vw;
        height: 100vh;
        overflow: hidden;
        margin: 0;
        background-image: url('p6.png');
        background-position: center;
        background-size: cover;
        font-family: 'Inter';
    }

    header {
        position: fixed;
        align-items: center;
        display: flex;
        background-color: white;
        top: 0;
        left: 0;
        right: 0;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .title {
        color: #76A5BF;
        font-family: 'Inter';
        flex-grow: 1;
        text-align: center;
        letter-spacing: 50px;
        font-size: 50px;
    }

    .img1 {
        width: 60vw;
        padding: 35px;
        border: 2px #9fc5d9b0 solid;
        background-color: #76a5bfb0;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .container {
        display: flex;
        flex-grow: 1;
        padding: 200px 190px;
        flex-direction: column;
        width: 20vw;
        height: 100vh;
        background-color: white;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
        width: 200px;
        height: 30px;
        border: 1px rgba(228, 228, 228, 0.188) solid;
    }

    input[type="submit"] {
        background-color: #76A5BF;
        color: white;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
        border: none;
        font-size: 15px;
        cursor: pointer;
        border-radius: 20px;
        padding: 10px 40px;
    }

    #b1 {
        background-color: #76A5BF;
        color: white;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
        border: none;
        font-size: 15px;
        cursor: pointer;
        border-radius: 20px;
        padding: 10px 40px;
    }
</style>
</head>
<body>
    <header>
        <h1 class="title">HAVEN</h1>
    </header>
    <div class="container">
    <h2>Register</h2>
    <form action="register.php" method="post">
        <input type="text" id="username" name="username" placeholder="Username"><br><br>
        <input type="text" id="password" name="password" placeholder="Password"><br><br>
        <label for="role">I am looking to </label>
        <select id="role" name="role">
            <option value="user">Buy</option>
            <option value="seller">Sell</option>
        </select><br><br>
        <input type="email" id="email" name="email" placeholder="Email" required><br><br>
        <input type="text" id="creditcard" name="creditcard" placeholder="Credit Card" required><br><br>
        <div class="credit-card-type" id="card-type"></div><br>
        <input type="text" id="expiration" name="expiration" placeholder="Exp. MM/YYYY" required><br><br>
        <input type="password" id="cvv" name="cvv" placeholder="CVV" required><br><br>
        <input type="text" id="address" name="address" placeholder="Address" required><br><br>
        <input type="text" id="billing" name="billing" placeholder="Billing Address" required><br><br>
        <input type="text" id="phone" name="phone" placeholder="Phone Number" required><br><br>
        <input type="submit" value="Register">
        <p>Already have an account?</p>
        <input type="button" id="b1" value="Login" onclick="window.location.href='login.php';">
    </form>
    </div>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables with form data
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $passwrd = isset($_POST["password"]) ? $_POST["password"] : "";
    $userrole = isset($_POST["role"]) ? $_POST["role"] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $creditcard = isset($_POST['creditcard']) ? $_POST['creditcard'] : "";
    $expiration = isset($_POST['expiration']) ? $_POST['expiration'] : "";
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : "";
    $useraddress = isset($_POST['address']) ? $_POST['address'] : "";
    $billing = isset($_POST['billing']) ? $_POST['billing'] : "";
    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "register";
    $conn = new mysqli($host, $user, $pass, $dbname, null, '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock');

    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    } else {

        $sql_create_table = "CREATE TABLE IF NOT EXISTS USERS (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            passwrd VARCHAR(30) NOT NULL,
            userrole VARCHAR(30) NOT NULL,
            email VARCHAR(30) NOT NULL,
            creditcard VARCHAR(30) NOT NULL,
            expiration VARCHAR(30) NOT NULL,
            cvv VARCHAR(30) NOT NULL,
            useraddress VARCHAR(255) NOT NULL,
            billing VARCHAR(255) NOT NULL,
            phone VARCHAR(30) NOT NULL
        )";

        $sql_insert_data = "INSERT INTO USERS (username, passwrd, userrole, email, creditcard, expiration, cvv, useraddress, billing, phone) 
            VALUES ('$username', '$passwrd', '$userrole', '$email', '$creditcard', '$expiration', '$cvv', '$useraddress', '$billing', '$phone')";

        if ($conn->query($sql_insert_data) === TRUE) {
            echo "<script> alert('Registration was successful'); </script>";
        } else {
            echo "<script> alert('Registration was unsuccessful'); </script>";
        }
    }

    $conn->close();
} 

?>