<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$username = $_SESSION['username'];

$host = 'localhost';
$user = "tdinh31";
$pass = "tdinh31";
$dbname = "tdinh31";

//$conn = new mysqli($host, $user, $pass, $dbname, null, '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock');
$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_id = $_POST['card_id'];
    $new_street = $_POST['new_street'];
    $new_state = $_POST['new_state'];
    $new_age = $_POST['new_age'];
    $new_propertytype = $_POST['new_propertytype'];
    $new_bedrooms = $_POST['new_bedrooms'];
    $new_bathrooms = $_POST['new_bathrooms'];
    $new_sqft = $_POST['new_sqft'];
    $new_parking = $_POST['new_parking'];
    $new_garden = $_POST['new_garden'];

    $sql_update = "UPDATE property_cards SET 
                street = '$new_street', 
                state = '$new_state', 
                age = '$new_age', 
                propertytype = '$new_propertytype', 
                bedrooms = '$new_bedrooms', 
                bathrooms = '$new_bathrooms', 
                sqft = '$new_sqft', 
                parking = '$new_parking', 
                garden = '$new_garden' 
                WHERE id = '$card_id' AND username = '$username'";



    $result_update = $conn->query($sql_update);

    if ($result_update === TRUE) {
        header("Location: welcome.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql_card_id = "SELECT id FROM property_cards WHERE username = '$username'";
$result_card_id = $conn->query($sql_card_id);
if ($result_card_id->num_rows > 0) {
    $row_card_id = $result_card_id->fetch_assoc();
    $card_id = $row_card_id['id'];
} else {
    echo "No property card found for this user.";
}

$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Update card</title>
    <style>
        body {
            width: 100vw;
            height: 100vh;
            overflow-y: auto;
            margin: 0;
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

        form {
            display: flex;
            flex-direction: column;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            margin-top: 10%;
            padding: 50px 50px;
            font-family: 'Inter';
            font-size: 15px;
            border: 1px grey solid;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            align-items: flex-start;
            justify-content: center;
        }

        input[type="text"],
        input[type="number"] {
            width: 200px;
            margin-bottom: 1%;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #76A5BF;
            color: white;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            border-radius: 20px;
            padding: 20px 40px;
            width: 300px;
            margin-bottom: 20px;
        }

        select {
            width: 205px;
            margin-bottom: 6%;
        }

        label {
            font-size: 13px;
            display: inline;
        }

        .info {
            margin-right: 20px;
            padding: 20px;
        }

        .otherinfo {
            padding: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1 class="title">HAVEN</h1>
    </header>
    <div class="edit-form">
        <form action="update_card.php" method="post">
            <input type="hidden" name="card_id" value="<?php echo $card_id; ?>">
            <label for="new_street">New Street:</label>
            <input type="text" id="new_street" name="new_street"
                value="<?php echo isset($_POST['new_street']) ? $_POST['new_street'] : ''; ?>"><br><br>
            <label for="new_state">New State:</label>
            <input type="text" id="new_state" name="new_state"
                value="<?php echo isset($_POST['new_state']) ? $_POST['new_state'] : ''; ?>"><br><br>
            <label for="new_age">New Age of Property:</label>
            <input type="number" id="new_age" name="new_age"
                value="<?php echo isset($_POST['new_age']) ? $_POST['new_age'] : ''; ?>"><br><br>
            <label for="new_propertytype">New Property Type:</label>
            <select id="new_propertytype" name="new_propertytype">
                <option value="house" <?php echo (isset($_POST['new_propertytype']) && $_POST['new_propertytype'] == 'house') ? 'selected' : ''; ?>>House</option>
                <option value="townhome" <?php echo (isset($_POST['new_propertytype']) && $_POST['new_propertytype'] == 'townhome') ? 'selected' : ''; ?>>Townhome</option>
                <option value="multifamily" <?php echo (isset($_POST['new_propertytype']) && $_POST['new_propertytype'] == 'multifamily') ? 'selected' : ''; ?>>Multi-family</option>
                <option value="condo" <?php echo (isset($_POST['new_propertytype']) && $_POST['new_propertytype'] == 'condo') ? 'selected' : ''; ?>>Condo</option>
                <option value="apartment" <?php echo (isset($_POST['new_propertytype']) && $_POST['new_propertytype'] == 'apartment') ? 'selected' : ''; ?>>Apartment</option>
            </select><br><br>
            <label for="new_bedrooms">New Number of Bedrooms:</label>
            <input type="number" id="new_bedrooms" name="new_bedrooms"
                value="<?php echo isset($_POST['new_bedrooms']) ? $_POST['new_bedrooms'] : ''; ?>"><br><br>
            <label for="new_bathrooms">New Number of Bathrooms:</label>
            <input type="number" id="new_bathrooms" name="new_bathrooms"
                value="<?php echo isset($_POST['new_bathrooms']) ? $_POST['new_bathrooms'] : ''; ?>"><br><br>
            <label for="new_sqft">New Square Feet:</label>
            <input type="number" id="new_sqft" name="new_sqft"
                value="<?php echo isset($_POST['new_sqft']) ? $_POST['new_sqft'] : ''; ?>"><br><br>
            <label for="new_parking">New Parking Availability:</label>
            <select id="new_parking" name="new_parking">
                <option value="garageone" <?php echo (isset($_POST['new_parking']) && $_POST['new_parking'] == 'garageone') ? 'selected' : ''; ?>>Garage</option>
                <option value="garageone" <?php echo (isset($_POST['new_parking']) && $_POST['new_parking'] == 'garageone') ? 'selected' : ''; ?>>Garage - 1 door</option>
                <option value="garagetwo" <?php echo (isset($_POST['new_parking']) && $_POST['new_parking'] == 'garagetwo') ? 'selected' : ''; ?>>Garage - 2 door</option>
                <option value="garagethree" <?php echo (isset($_POST['new_parking']) && $_POST['new_parking'] == 'garagethree') ? 'selected' : ''; ?>>Garage - 3 door</option>
                <option value="lot" <?php echo (isset($_POST['new_parking']) && $_POST['new_parking'] == 'lot') ? 'selected' : ''; ?>>Parking lot</option>
            </select><br><br>
            <label for="new_garden">New Garden:</label>
            <input type="radio" id="new_garden_yes" name="new_garden" value="yes" <?php echo (isset($_POST['new_garden']) && $_POST['new_garden'] == 'yes') ? 'checked' : ''; ?>>
            <label for="new_garden_yes">Yes</label>
            <input type="radio" id="new_garden_no" name="new_garden" value="no" <?php echo (isset($_POST['new_garden']) && $_POST['new_garden'] == 'no') ? 'checked' : ''; ?>>
            <label for="new_garden_no">No</label><br><br>

            <input type="submit" value="Update">
            <input type="button" value="Back to your homepage" onclick="window.location.href='welcome.php';">
        </form>
    </div>
</body>

</html>