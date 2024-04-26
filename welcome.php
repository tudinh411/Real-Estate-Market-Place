<!DOCTYPE html>
<html>

<head>
    <title>Haven</title>

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
            justify-content: center;
            text-decoration: none;
            background-color: white;
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

        .container {
            display: flex;
        }

        .text {
            flex-grow: 1;
            margin-top: 10%;
            padding: 40px;
            font-family: 'Inter';
            font-size: 25px;
            color: rgb(65, 65, 65);
        }

        button {
            background-color: #76A5BF;
            color: white;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            border-radius: 20px;
            padding: 20px 40px;
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
        <div class="text">
            <p>Seller Dashboard</p>
            <button type="button" onclick="window.location.href='seller.php';">Add Property</button>
        </div>
    </div>
</body>

</html>