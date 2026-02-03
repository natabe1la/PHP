<?php
session_start();

if($_SERVER["REQUEST_METHOD"] !== "POST" && $_SERVER["REQUEST_METHOD"] !== "GET"){
    header("Location: login.php");
    exit();
}

$inputData = ($_SERVER["REQUEST_METHOD"] === "POST") ? $_POST : $_GET;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpdb";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

$inputFullName = $inputData['full_name'] ?? '';
$inputEmail = $inputData['email'] ?? '';
$inputAddress = $inputData['address'] ?? '';
$inputAge = (int)($inputData['age'] ?? 0);
$inputPassword = $inputData['password'] ?? '';
$confirmPassword = $inputData['confirm_password'] ?? '';
$inputDob = $inputData['dob'] ?? '';
$inputContact = $inputData['contact'] ?? '';

if(empty($inputEmail) || empty($inputPassword) || empty($confirmPassword) || empty($inputFullName)){
    echo "All fields are required!";
} elseif(strlen($inputPassword) < 8){
    echo "Password must be at least 8 characters long!";
} elseif($inputPassword !== $confirmPassword){
    echo "Passwords do not match. Please try again!";
} else {
    $sql = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    
    if($stmt === false){
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $inputEmail);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0){
        $_SESSION['validationError'] = "Email already exists!";
        $_SESSION['full_name'] = $inputFullName;
        $_SESSION['email'] = $inputEmail;
        $_SESSION['address'] = $inputAddress;
        $_SESSION['age'] = $inputAge;
        $_SESSION['dob'] = $inputDob;
        $_SESSION['contact'] = $inputContact;
        header("Location: index.php");
        exit();
    } else {
        $hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(fullname, email, address, age, password, dob, contact) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssisss", $inputFullName, $inputEmail, $inputAddress, $inputAge, $hashedPassword, $inputDob, $inputContact);

        if($stmt->execute()){
            $_SESSION['successMessage'] = "Register Successfully! Please log in.";
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>