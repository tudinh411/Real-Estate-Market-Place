<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    

    $host = "localhost";
    $user = "tdinh31";
    $pass = "tdinh31";
    $dbname = "tdinh31";
    $conn = new mysqli($host, $user, $pass, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM USERS WHERE username='$username' AND passwrd='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;

        if ($row["userrole"] == 'seller') {
            header("Location: welcome.php");
        } else if ($row["userrole"] == 'admin') {
            header("Location: admin.html");
        } else {
            header("Location: buyer.php");
        }
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>

    <style>
        body {
            width: 100vw;
            height: 100vh;
            overflow-y: auto;
            margin: 0;
            background-image: url('p1.webp');
            background-position: center;
            background-size: cover;
            font-family: 'Inter';
        }

        header {
            position: fixed;
            align-items: center;
            display: flex;
            background-color: white;
            justify-content: center;
            top: 0;
            left: 0;
            right: 0;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        a {
            text-decoration: none;
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
        input[type="password"] {
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

        input[type="button"] {
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
        <a href="homepage.html">
            <h1 class="title">HAVEN</h1>
        </a>
    </header>
    <div class="container">
        <h2>Login</h2>
        <?php
        if (isset($errorMessage)) {
            echo "<p style='color: red;'>$errorMessage</p>";

        }
        ?>
        <form action="login.php" method="post">
            <input type="text" id="username" name="username" placeholder="Username" required><br><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" value="Log In">
            <br><br><br><br>
            <p>Don't have an account?</p>
            <input type="button" value="Create an account" onclick="window.location.href='register.php';">
        </form>
    </div>
</body>

</html>