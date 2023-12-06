<!-- volunteer.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Information</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Added a slightly different background color for the containers */
        .container:nth-child(odd) {
            background-color: #e2f0cb; /* Light green */
        }

        .container:nth-child(even) {
            background-color: #f0cbcb; /* Light red */
        }

        .container {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
            margin: 10px;
            text-align: center;
            position: relative;
        }

        h1 {
            color: #3498db;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin: 10px 0;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 20px;
        }

        .select-button {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px; /* Added margin-top to space the button from the information */
        }
    </style>
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    try {
        // Database connection
        $db = new PDO('mysql:host=localhost;dbname=donorInfo', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch all volunteer information from the database
        $query = "SELECT * FROM donorDetails WHERE `pickupOption` = 'volunteer' ORDER BY id DESC";
        $stmt = $db->query($query);
        $volunteerData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($volunteerData) {
            echo "<h1>Volunteer Information</h1>";

            foreach ($volunteerData as $data) {
                echo "<div class='container'>";
                echo "<p>Name: " . htmlspecialchars($data['donorName']) . "</p>";
                echo "<p>Email: " . htmlspecialchars($data['donorEmail']) . "</p>";
                echo "<p>Address: " . htmlspecialchars($data['donorAddress']) . "</p>";
                echo "<p>Food Name: " . htmlspecialchars($data['foodName']) . "</p>";
                echo "<p>Food Type: " . htmlspecialchars($data['foodType']) . "</p>";
                echo "<p>Food Quantity: " . htmlspecialchars($data['foodQuantity']) . "</p>";
                // Display other information as needed
                echo "<button class='select-button' onclick='selectAction(\"" . htmlspecialchars($data['donorName']) . "\")'>Select</button>";
                echo "</div>";
            }
        } else {
            echo "<h1>No Volunteer Information Available</h1>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>

    <script>
        function selectAction(donorName) {
            // Add your logic here for the action to be performed on selecting a donor
            alert("Selected: " + donorName);
        }
    </script>
</body>
</html>

