<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    // Retrieve form data
    $batch_no = $_POST['batch-no'];
    $drug_name = $_POST['drug-name'];
    $mfg_date = $_POST['mfg-date'];
    $exp_date = $_POST['exp-date'];
    $price = $_POST['price'];
    $drug_type = $_POST['drug-type'];

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
    $stmt = $conn->prepare("INSERT INTO medicine (batch_no, drug_name, mfg_date, exp_date, price, drug_type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssds",$batch_no, $drug_name, $mfg_date, $exp_date, $price, $drug_type);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Form submitted successfully!";
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
    <title>Drug Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff; /* White background */
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
    <h2>Medicine Information</h2>
    <form method="post">
        <div class="input-group">
            <label for="batch-no">Batch No.</label>
            <input type="text" id="batch-no" name="batch-no" required>
        </div>
        <div class="input-group">
            <label for="drug-name">Drug Name</label>
            <input type="text" id="drug-name" name="drug-name" required>
        </div>
        <div class="input-group">
            <label for="mfg-date">Manufacturing Date</label>
            <input type="text" id="mfg-date" name="mfg-date" placeholder="YYYY-MM-DD" required>
        </div>
        <div class="input-group">
            <label for="exp-date">Expiry Date</label>
            <input type="text" id="exp-date" name="exp-date" placeholder="YYYY-MM-DD" required>
        </div>
        <div class="input-group">
            <label for="price">Price</label>
            <input type="text" id="price" name="price" required>
        </div>
        <div class="input-group">
            <label for="drug-type">Drug Type</label>
            <input type="text" id="drug-type" name="drug-type" required>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>

</body>
</html>
