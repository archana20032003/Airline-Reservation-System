<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    if (isset($_POST['payment_method'])) {
        $paymentMethod = $_POST['payment_method'];

        if ($paymentMethod === 'credit_debit_card') {
            // Process credit/debit card payment
            $cardNumber = $_POST['card_number'];
            $expiryDate = $_POST['expiry_date'];
            $cvv = $_POST['cvv'];
            $cardHolderName = $_POST['card_holder_name'];

            // Here you can perform further processing for credit/debit card payment
            echo "<h2>Credit/Debit Card Payment Details</h2>";
            echo "<p>Card Number: $cardNumber</p>";
            echo "<p>Expiry Date: $expiryDate</p>";
            echo "<p>CVV: $cvv</p>";
            echo "<p>Cardholder Name: $cardHolderName</p>";
        } elseif ($paymentMethod === 'online_payment') {
            // Process online payment
            $onlinePaymentMethod = $_POST['online_payment_method'];

            // Here you can perform further processing for online payment
            echo "<h2>Online Payment Details</h2>";
            echo "<p>Selected Online Payment Method: $onlinePaymentMethod</p>";
        } else {
            // Handle other payment methods if needed
            echo "Invalid payment method.";
        }
    } else {
        echo "Payment method not selected.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
   <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
    body {
    font-family: Arial, sans-serif;
    
}

.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

h2 {
    text-align: center;
    font-size: 32px;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"],
input[type="password"]{
   
    font-size: 22px;
    
    padding: 2px 15px 4px 15px;
}
input[type="radio"]{
   
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
   
}
select{
    font-size: 22px;
    width: 85%;
}
button {
    width: 50%;
    height: 45px;
    background: rgb(253, 213, 159);
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px  rgba(0,0,0, .1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;
    margin-left: 70px;
}

   </style>
</head>
<body>
    <div class="container">
        <h2>Payment Details</h2><br><br>
        <form action="pay.php" method="post">
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" onchange="showPaymentFields()">
            <option value="select payment">select payment</option>
                <option value="credit_debit_card">Credit/Debit Card</option>
                <option value="online_payment">Online Payment</option>
            </select><br><br>

            <div id="card_fields">
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" required><br><br>

                <label for="expiry_date">Expiry Date:</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required><br><br>
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" maxlength="3" required><br><br>
                <label for="card_holder_name">Cardholder Name:</label>
                <input type="text" id="card_holder_name" name="card_holder_name" required><br><br>
            </div>


            <div id="online_payment_fields" style="display: none;">
                <label>Select Online Payment Method:</label>
                <input type="radio" id="phonepe" name="online_payment_method" value="phonepe">
                <label for="phonepe">PhonePe</label>

                <input type="radio" id="google_pay" name="online_payment_method" value="google_pay">
                <label for="google_pay">Google Pay</label>

                <input type="radio" id="paypal" name="online_payment_method" value="paypal">
                <label for="paypal">PayPal</label>

                <!-- Add more online payment options here -->
            </div>


            <button type="submit" onclick="window.location.href='success.php'">Pay Now</button>
        </form>
    </div>
    <script>
        function showPaymentFields() {
            var paymentMethod = document.getElementById("payment_method").value;
            var cardFields = document.getElementById("card_fields");
            var onlinePaymentFields = document.getElementById("online_payment_fields");

            if (paymentMethod === "credit_debit_card") {
                cardFields.style.display = "block";
                onlinePaymentFields.style.display = "none";
            } else if (paymentMethod === "online_payment") {
                cardFields.style.display = "none";
                onlinePaymentFields.style.display = "block";
            }
        }

    </script>
   
</body>
</html>
