<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PharmAce</title>
  <style>
    * {
      margin:0;
      padding:0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    .hero {
      width: 100%;
      min-height: 100vh;
      background-image: url('hospital.jpg'); /* Adjust the path to your background image */
      background-position: center;
      background-size: cover;
      padding: 10px 10%;
      overflow: hidden;
      position: relative; /* Added position relative for absolute positioning */
    }
    nav {
      padding: 10px 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .logo {
      width: 140px;
    }
    nav ul {
      display: flex;
      align-items: center;
      list-style: none;
    }
    nav ul li {
      margin-right: 15px;
    }
    nav ul li a {
      text-decoration: none;
      color: #333;
      font-weight: 400;
    }
    .btn {
      text-decoration: none;
      padding: 10px 20px;
      color: #fff;
      background-color: #df4881; /* Adjust button color as needed */
      border-radius: 30px;
    }
    .btn:not(:last-child) {
      margin-right: 15px;
    }
    .btn:hover {
      background-color: #c430d7; /* Adjust hover color as needed */
    }
    .right-buttons {
      display: flex;
      align-items: center;
    }
  </style>
</head>
<body>
  <div class="hero">
    <nav>
      <img src="logo.png" alt="Logo">
      <ul>
        
        <!-- Add more navigation items if needed -->
      </ul>
      <div class="right-buttons">
        <a href="login.html" class="btn">Login</a>
        <a href="medicine.php" class="btn">Medicine Details</a>
        <a href="bill.php" class="btn">Bill Details</a>
        <a href="patient.php" class="btn">Patient Details</a>
      </div>
    </nav>
    <div class="content">
      <!-- Your content goes here -->
    </div>
  </div>
</body>
</html>
