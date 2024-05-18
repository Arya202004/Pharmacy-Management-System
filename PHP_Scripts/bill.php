<?php
if(isset($_POST['submit'])){
    // Retrieve form data
    $bill_id = $_POST['bill_id'];
    $store_name = $_POST['store_name'];
    $location = $_POST['location'];
    $amount = $_POST['amount'];
    $quantity = $_POST['quantity'];
    $batch_no = $_POST['batch_no'];
    $pid = $_POST['pid'];


    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'pharmacy';

    // Create connection
    $conn = new mysqli($host, $user, $pass, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind statement
    $stmt = $conn->prepare("INSERT INTO retailbill (bill_id, store_name, location, amount, quantity, batch_no, pid) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issiiii", $bill_id, $store_name, $location, $amount, $quantity, $batch_no, $pid);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Form Submitted Successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff; /* White background */
	    background-image: url('hospital.jpg'); /* Specify the path to your image */
    	    background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background image */

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffb6c1; /* Baby pink */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h2 {
            color: #fff; /* White text */
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #fff; /* White text for labels */
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #ff69b4; /* Hot pink */
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e64980; /* Lighter pink on hover */
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Bill Information</h2>
    <form method="post">
        <div class="input-group">
            <label for="bill_id">Bill id</label>
            <input type="text" id="bill_id" name="bill_id" required>
        </div>
        <div class="input-group">
            <label for="store_name">Store name</label>
            <input type="text" id="store_name" name="store_name" required>
        </div>
        <div class="input-group">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" required>
        </div>
        <div class="input-group">
            <label for="amount">Amount</label>
            <input type="text" id="amount" name="amount" required>
        </div>
        <div class="input-group">
            <label for="quantity">Quantity</label>
            <input type="text" id="quantity" name="quantity" required>
        </div>
	<div class="input-group">
            <label for="batch_no">Batch no</label>
            <input type="text" id="batch_no" name="batch_no" required>
        </div>
        <div class="input-group">
            <label for="pid">Patient ID</label>
            <input type="text" id="pid" name="pid" required>
        </div>
        <button type="submit" name="submit">Submit</button>

    </form>
</div>

</body>
</html>
