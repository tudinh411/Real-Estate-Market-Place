<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read the users.txt file
    $users = file('users.txt');
    foreach ($users as $user) {
        $userInfo = explode('|', $user);
        $savedUsername = trim($userInfo[0]);
        $savedHashedPassword = trim($userInfo[1]);
        $role = trim($userInfo[2]); // Assuming the role is stored in the third position

        // Check if the username exists
        if ($savedUsername === $username) {
            // Verify the password
            if (password_verify($password, $savedHashedPassword)) {
                // Password is correct, start a session and redirect based on user role
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;

                // Redirect based on user role
                switch ($role) {
                    case 'seller':
                        header("Location: seller_dashboard.php");
                        exit;
                    case 'user':
                        header("Location: user_dashboard.php");
                        exit;
                }
            } else {
                // Incorrect password, set error message
                $errorMessage = "Invalid username or password. Please try again.";
            }
        }
    }

    // Username not found, set error message
    $errorMessage = "Invalid username or password. Please try again.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>
    <?php
    // Display error message if login fails
    if (isset($errorMessage)) {
        echo "<p style='color: red;'>$errorMessage</p>";
        
    }
    ?>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Log In">
        <input type="button" value="Register a new account" onclick="window.location.href='registration.php';">
    </form>
</body>
</html>

