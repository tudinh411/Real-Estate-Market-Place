<?php
// Check if the form has been submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted username, password, and role from the form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $email = $_POST["email"];
    
    // Encrypt the password using password_hash function
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Check if user already exists
    $users = file_get_contents("users.txt");
    $users = explode("\n", $users);
    foreach ($users as $user) {
        $info = explode("|", $user);
        if ($info[0] == $username) {
            die("User already exists. Please choose a different username.");
        }
    }
    
    // Append user info to the text file with the hashed password
    $file = fopen("users.txt", "a");
    fwrite($file, "$username|$hashed_password|$role|$email||\n");
    fclose($file);
    
    echo "Registration successful. <a href='login.php'>Login here</a>";
    exit; // Exit to prevent displaying the HTML form after successful registration
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form action="registration.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="user">User</option>
            <option value="seller">Seller</option>
        </select><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Register">
        <!--log in button for ppl who have an account -->
        <input type="button" value="Already have an account?" onclick="window.location.href='login.php';">
    </form>
</body>
</html>
