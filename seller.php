<!DOCTYPE html>
<html>

<head>
    <title>Haven - Sell Property</title>

    <style>
        body {
            width: 100vw;
            height: 100vh;
            overflow: hidden;
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
            /* flex-grow: 1; */
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            margin-top: 10%;
            padding: 10px 20px;
            font-family: 'Inter';
            font-size: 15px;
            border: 2px red solid;
            flex-direction: row;
            align-items: flex-start;
            justify-content: center;
        }

        input[type="text"],
        input[type="number"] {
            width: 200px;
            margin-bottom: 6%;
        }

        input[type="submit"] {
            background-color: #76A5BF;
            color: white;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            border-radius: 20px;
            padding: 20px 40px;
            width: 300px;
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
            border: 2px green solid;
            margin-right: 20px;
            padding: 20px;
        }

        .otherinfo {
            border: 2px pink solid;
            padding: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1 class="title">HAVEN</h1>
    </header>
    <div class="container"></div>
    <form action="">
        <div class="info">
            <p>Please fill out the following fields</p>
            <input type="text" id="street" name="street" placeholder="Street" required><br>
            <select id="state" name="state" required>
                <option value="">Select a State</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select><br>
            <input type="number" id="age" name="age" placeholder="Age of Property" required><br>
            <select id="propertytype" name="propertytype">
                <option value="">Select Property Type</option>
                <option value="house">House</option>
                <option value="townhome">Townhome</option>
                <option value="multifamily">Multi-family</option>
                <option value="condo">Condo</option>
                <option value="apartment">Apartment</option>
            </select><br>
            <input type="number" id="bedrooms" name="bedrooms" placeholder="Number of Bedrooms" required><br>
            <input type="number" id="bathrooms" name="bathrooms" placeholder="Number of Bathrooms" required><br>
            <input type="number" id="sqft" name="sqft" placeholder="Square Feet" required><br>
            <select id="parking" name="parking" required>
                <option value="">Parking Availability</option>
                <option value="garageone">Garage</option>
                <option value="garageone">Garage - 1 door</option>
                <option value="garagetwo">Garage - 2 door</option>
                <option value="garagethree">Garage - 3 door</option>
                <option value="lot">Parking lot</option>
            </select>
            <div class="nextto">
                <p>Does this property have a garden?</p>
                <input type="radio" id="yes" name="garden" value="yes"><label for="yes">Yes</label>
                <input type="radio" id="no" name="garden" value="no"><label for="no">No</label><br>
            </div>
            <br>
            <label for="img">Upload images:</label>
            <input type="file" id="img" name="img" accept="image/*">
            <br>
        </div>
        </div>
        <div class="otherinfo">
            <p>Nearby Locations</p>
            <div class="nextto">
                <input type="text" id="neartown" name="neartown" placeholder="Nearest Town" required>
                <input type="number" id="townprox" name="townprox" placeholder="Distance (mi)" required>
            </div>
            <div class="nextto">
                <input type="text" id="nearschool" name="nearschool" placeholder="Nearest School" required>
                <input type="number" id="schoolprox" name="schoolprox" placeholder="Distance (mi)" required>
            </div>
            <div class="nextto">
                <input type="text" id="nearcollege" name="nearcollege" placeholder="Nearest College" required>
                <input type="number" id="collegeprox" name="collegeprox" placeholder="Distance (mi)" required>
            </div>
            <p>Finances</p>
            <input type="number" id="price" name="price" placeholder="Listing Price" required>
            <input type="number" id="tax" name="tax" placeholder="Propert Tax Record (%)" required>
            <br><br><input type="submit" value="Submit Propery">
        </div>

    </form>
    <br><br><br><br><br><br>
    </div>

    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $street = $_POST["street"];
        $state = $_POST["state"];
        $age = $_POST["age"];
        $propertytype = $_POST["propertytype"];
        $bedrooms = $_POST["bedrooms"];
        $bathrooms = $_POST["bathrooms"];
        $sqft = $_POST["sqft"];
        $parking = $_POST["parking"];
        $garden = $_POST["garden"];
        $img = $_POST["img"];
        $neartown = $_POST["neartown"];
        $townprox = $_POST["townprox"];
        $nearcollege = $_POST["nearcollege"];
        $collegeprox = $_POST["collegeprox"];
        $nearschool = $_POST["nearschool"];
        $schoolprox = $_POST["schoolprox"];
        $price = $_POST["price"];
        $tax = $_POST["tax"];
    }
    ?>
</body>

</html>