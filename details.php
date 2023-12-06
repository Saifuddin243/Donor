<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('114541459_636394753643263_8315127544916484665_n.jpg'); 
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            width: 350px;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #db6c34;
            margin: 20px 0;
        }

        p {
            font-weight: bold;
            margin: 10px 0;
        }

        span {
            font-weight: normal;
            color: #db8534; 
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Your Donation</h1>
        <h2>Your Details:</h2>
        <?php if (!empty($_GET['donorName'])): ?>
            <p>Name: <span id="donor-name"><?= htmlspecialchars($_GET['donorName']) ?></span></p>
        <?php endif; ?>
        <?php if (!empty($_GET['donorEmail'])): ?>
            <p>Email: <span id="donor-email"><?= htmlspecialchars($_GET['donorEmail']) ?></span></p>
        <?php endif; ?>
        <?php if (!empty($_GET['donorPhone'])): ?>
            <p>Phone: <span id="donor-phone"><?= htmlspecialchars($_GET['donorPhone']) ?></span></p>
        <?php endif; ?>
        <?php if (!empty($_GET['donorAddress'])): ?>
            <p>Address: <span id="donor-address"><?= htmlspecialchars($_GET['donorAddress']) ?></span></p>
        <?php endif; ?>
        <?php if (!empty($_GET['foodName'])): ?>
            <p>Food Name: <span id="food-name"><?= htmlspecialchars($_GET['foodName']) ?></span></p>
        <?php endif; ?>
        <?php if (!empty($_GET['foodType'])): ?>
            <p>Food Type: <span id="food-type"><?= htmlspecialchars($_GET['foodType']) ?></span></p>
        <?php endif; ?>
        <?php if (!empty($_GET['foodQuantity'])): ?>
            <p>Quantity: <span id="food-quantity"><?= htmlspecialchars($_GET['foodQuantity']) ?></span></p>
        <?php endif; ?>
        <?php if (!empty($_GET['pickupOption'])): ?>
            <p>Pickup/Distribution Option: <span id="pickup-option"><?= htmlspecialchars($_GET['pickupOption']) ?></span></p>
        <?php endif; ?>
    </div>
</body>
</html>




