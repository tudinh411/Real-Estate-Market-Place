<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

$host = "localhost";
$user = "tdinh31";
$pass = "tdinh31";
$dbname = "tdinh31";

//$conn = new mysqli($host, $user, $pass, $dbname, null, '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock');
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM property_cards WHERE username = '$username'";
$result = $conn->query($sql);

$property_cards = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $property_cards[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Welcome, <?php echo $username; ?></title>
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

        .property-card {
            display: inline-block;
            margin: 10px;
            padding: 10px;
            border: 1px solid grey;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            cursor: pointer;
        }

        .property-details {
            display: none;
            margin-top: 10px;
        }

        .style {
            background-color: #76A5BF;
            color: white;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            border-radius: 20px;
            padding: 20px 40px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: none;
            color: #76A5BF;
        }

        .container {
            display: flex;
        }

        .text {
            flex-grow: 1;
            margin-top: 6%;
            padding: 40px;
            font-family: 'Inter';
            font-size: 20px;
            color: rgb(65, 65, 65);
        }
    </style>
</head>

<body>
    <header>
        <h1 class="title">HAVEN</h1>
    </header>
    <div class="container">
        <div class="text">
            <h2>Welcome, <?php echo $username; ?></h2>
            <?php if (!empty($property_cards)): ?>
                <h3>Existing Property Cards:</h3>
                <?php foreach ($property_cards as $card): ?>
                    <div class="property-card" onclick="toggleDetails('details-<?php echo $card['id']; ?>')">
                        <h4><?php echo $card['street'] . ', ' . $card['state']; ?></h4>
                        <p>Property Type: <?php echo $card['propertytype']; ?></p>
                        <p>Price: $<?php echo $card['price']; ?></p>
                        <div class="property-details" id="details-<?php echo $card['id']; ?>">
                            <p>Age of Property: <?php echo $card['age']; ?></p>
                            <p>Bedrooms: <?php echo $card['bedrooms']; ?></p>
                            <p>Bathrooms: <?php echo $card['bathrooms']; ?></p>
                            <p>Square Feet: <?php echo $card['sqft']; ?></p>
                            <p>Parking: <?php echo $card['parking']; ?></p>
                            <p>Garden: <?php echo $card['garden'] == 'yes' ? 'Yes' : 'No'; ?></p>
                            <p>Nearby Town: <?php echo $card['neartown']; ?> (<?php echo $card['townprox']; ?> miles)</p>
                            <p>Nearby School: <?php echo $card['nearschool']; ?> (<?php echo $card['schoolprox']; ?> miles)</p>
                            <p>Nearby College: <?php echo $card['nearcollege']; ?> (<?php echo $card['collegeprox']; ?> miles)
                            </p>
                            <p>Tax: <?php echo $card['tax']; ?>%</p>
                        </div>
                        <input type="button" value="Update" onclick="window.location.href='update_card.php';">
                        <form action="delete_card.php" method="post" style="display: inline;">
                            <input type="hidden" name="card_id" value="<?php echo $card['id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No property cards found </p>
            <?php endif; ?>
            <input type="button" class="style" value="Add Property" onclick="window.location.href='add_cards.php';">

            <br><br>
            <a href="logout.php">Logout</a>

            <script>
                function toggleDetails(detailsId) {
                    var details = document.getElementById(detailsId);
                    details.style.display = details.style.display === "block" ? "none" : "block";
                }
            </script>
        </div>
    </div>
</body>

</html>