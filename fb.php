<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fb.css">
    <title>Food Bank Donor Form</title>
</head>
<body>
    <div class="container">
        <h1>Donate Food</h1>
        <form id="donor-form" action="donation.php" method="post" enctype="multipart/form-data">
            <label for="donor-name">Name:</label>
            <input type="text" id="donor-name" name="donor-name" required>
            
            <label for="donor-email">Email:</label>
            <input type="email" id="donor-email" name="donor-email" required>
            
            <label for="donor-phone">Phone Number:</label>
            <input type="tel" id="donor-phone" name="donor-phone" required>
            
            <label for="donor-address">Address:</label>
            <input type="text" id="donor-address" name="donor-address" required>

            <label for="food-name">Food Name:</label>
            <input type="text" id="food-name" name="food-name" required>
            
            <label for="food-type">Food Type:</label>
            <input type="text" id="food-type" name="food-type" required>
            
            <label for="food-quantity">Quantity :</label>
            <input type="number" id="food-quantity" name="food-quantity" required>
            
            <label for="pickup-option">Choose Pickup or Volunteer:</label>
            <select id="pickup-option" name="pickup-option">
                <option value="pickup">Pick up at the shop</option>
                <option value="volunteer">Volunteer distribution</option>
            </select>

            <label for="food-photo">Upload Food Photo:</label>
            <input type="file" id="food-photo" name="food-photo" accept="image/*">

            <button type="button" id="confirm-button">Donate</button>
        </form>
    </div>
    <script src="Fb.js"></script>
</body>
</html>










