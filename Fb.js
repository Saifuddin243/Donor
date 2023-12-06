// Fb.js

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('donor-form');
    const confirmButton = document.getElementById('confirm-button');

    confirmButton.addEventListener('click', function() {
        // Get form values
        const donorName = document.getElementById('donor-name').value;
        const donorEmail = document.getElementById('donor-email').value;
        const donorPhone = document.getElementById('donor-phone').value;
        const donorAddress = document.getElementById('donor-address').value;
        const foodType = document.getElementById('food-type').value;
        const foodQuantity = parseFloat(document.getElementById('food-quantity').value);
        const pickupOption = document.getElementById('pickup-option').value;

        if (foodQuantity < 0) {
            alert('Quantity cannot be negative.');
            return;
        }

        // Display a confirmation modal with the donor's details
        const confirmationMessage = `Please confirm the following details:\n\nName: ${donorName}\nEmail: ${donorEmail}\nPhone: ${donorPhone}\nAddress: ${donorAddress}\nFood Type: ${foodType}\nQuantity: ${foodQuantity} \nPickup Option: ${pickupOption}`;

        if (confirm(confirmationMessage)) {
            // If the donor confirms, redirect to the details page
            window.location.href = `details.php?donorName=${donorName}&donorEmail=${donorEmail}&donorPhone=${donorPhone}&donorAddress=${donorAddress}&foodType=${foodType}&foodQuantity=${foodQuantity}&pickupOption=${pickupOption}`;
        }
    });
});




