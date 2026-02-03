<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body style=background-color:aliceblue;>
    <div class="profile">
    <h1>Account Registration Form</h1>
    <p> Please fill in the form below.</p>

    <?php
session_start();

$validationError = '';
$full_name = '';
$email = '';
$address = '';
$age = '';
$dob = '';
$contact = '';

if (isset($_SESSION['validationError'])) {
    $validationError = $_SESSION['validationError'];
    unset($_SESSION['validationError']);
}

if (isset($_SESSION['full_name'])) {
    $full_name = $_SESSION['full_name'];
    unset($_SESSION['full_name']);
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    unset($_SESSION['email']);
}
if (isset($_SESSION['address'])) {
    $address = $_SESSION['address'];
    unset($_SESSION['address']);
}
if (isset($_SESSION['age'])) {
    $age = $_SESSION['age'];
    unset($_SESSION['age']);
}
if (isset($_SESSION['dob'])) {
    $dob = $_SESSION['dob'];
    unset($_SESSION['dob']);
}
if (isset($_SESSION['contact'])) {
    $contact = $_SESSION['contact'];
    unset($_SESSION['contact']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $age = $_POST['age'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $contact = $_POST['contact'] ?? '';
    
    if (strlen($password) < 8) {
        $_SESSION['validationError'] = "Password must be at least 8 characters long.";
        $_SESSION['full_name'] = $full_name;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        $_SESSION['age'] = $age;
        $_SESSION['dob'] = $dob;
        $_SESSION['contact'] = $contact;
        header("Location: index.php");
        exit();
    } elseif ($password !== $confirm_password) {
        $_SESSION['validationError'] = "Passwords do not match. Please try again.";
        $_SESSION['full_name'] = $full_name;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        $_SESSION['age'] = $age;
        $_SESSION['dob'] = $dob;
        $_SESSION['contact'] = $contact;
        header("Location: index.php");
        exit();
    } else {
        header("Location: database.php?" . http_build_query($_POST));
        exit();
    }
}
?>
    
    <div style="height: 30px; margin-bottom: 0;">
        <?php if(!empty($validationError)): ?>
            <p style='color:red; margin: 0 0 5px 0;'><?php echo $validationError; ?></p>
        <?php endif; ?>
    </div>

    <form method="post" action="index.php">
        <div class="space">
        <label> Full Name:</label>
        <input type="text" name="full_name" placeholder="Full Name" class="label" value="<?php echo $full_name; ?>" required><br>
        </div>

        <div class="space">
        <label> Email Address:</label>  
        <input type="email" name="email" placeholder="Email" class="label" value="<?php echo $email; ?>" required>
        </div>

        <div class="space">
        <label> Home Address:</label>
        <input type="text" name="address" placeholder="Home Address" class="label" value="<?php echo $address; ?>" required>
        </div>

        <div class="space">
        <label> Age:</label>
        <input type="number" name="age" placeholder="Age" class="label" value="<?php echo $age; ?>" required>
        </div>

        <div class="space">
        <label> Password:</label>
        <input type="password" name="password" placeholder="Password" class="label" required>
        </div>

        <div class="space">
        <label> Confirm Password:</label>
        <input type="password" name="confirm_password" placeholder="Confirm Password" class="label" required>
        </div>

        <div class="space">
        <label> Date of Birth:</label>
        <input type="date" name="dob" placeholder="Date of Birth" class="label" value="<?php echo $dob; ?>" required>
        </div>

        <div class="space">
        <label> Contact Number:</label>
        <input type="tel" name="contact" placeholder="Contact Number" class="label" value="<?php echo $contact; ?>" required>
        </div>

        <br>

        <button type="submit" class="button">
            Register
        </button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

</body>
</html>
