<?php
session_start();

if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true){
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];
$userData = null;

$sql = "SELECT fullname, email, address, age, password, dob, contact FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $userData = $result->fetch_assoc();
} else {
    die("User data not found!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background: #f5eeee;
    padding: 30px;
    color: #2b2b2b;
}

h2 {
    color: #800000;
    text-align: center;
    margin-bottom: 15px;
}

h3 {
    color: #5a0000;
    margin: 20px auto 10px;
    max-width: 600px;
}

hr {
    border: none;
    height: 2px;
    background: #800000;
    margin: 20px auto;
    max-width: 600px;
}


p {
    background: #ffffff;
    padding: 10px 15px;
    margin: 8px auto;
    max-width: 600px;
    border-left: 5px solid #800000;
    border-radius: 4px;
}


h3:first-of-type ~ p {
    background: transparent;
    border-left: none;
    padding: 5px 0;
    border-radius: 0;
    font-weight: 500;
}

form {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    max-width: 600px;
    margin: 15px auto;
    box-shadow: 0 4px 10px rgba(128, 0, 0, 0.15);
}

label {
    font-weight: 600;
    color: #5a0000;
}

input[type="text"],
input[type="tel"],
textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px;
    border: 1px solid #b35c5c;
    border-radius: 5px;
}

input:focus,
textarea:focus {
    border-color: #800000;
    box-shadow: 0 0 5px rgba(128, 0, 0, 0.4);
}

input[type="submit"] {
    background: #800000;
    color: #ffffff;
    border: none;
    padding: 10px 18px;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background: #5a0000;
}

    </style>
</head>
<body>
    <h2> Welcome, <?php echo htmlspecialchars($userData['fullname']); ?>! </h2>
    <hr size=1px color=black>
    <h3> Account Information: </h3>
    <p> Full Name: <?php echo htmlspecialchars($userData['fullname']); ?> </p>
    <p> Email: <?php echo htmlspecialchars($userData['email']); ?> </p>
    <p> Address: <?php echo htmlspecialchars($userData['address']); ?> </p>
    <p> Age: <?php echo htmlspecialchars($userData['age']); ?> </p>
    <p> Date of Birth: <?php echo htmlspecialchars($userData['dob']); ?> </p>
    <p> Contact Number: <?php echo htmlspecialchars($userData['contact']); ?> </p>
    
    <hr size=1px color=black>
    
    <form method="post" action="logout.php">
        <input type="submit" value="Logout">
    </form>
</body>
</html>