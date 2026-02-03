<?php
session_start();

$loginError = '';
$successMessage = '';

if (isset($_SESSION['successMessage'])) {
    $successMessage = $_SESSION['successMessage'];
    unset($_SESSION['successMessage']);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $inputEmail = $_POST['email'] ?? '';
    $inputPassword = $_POST['password'] ?? '';

    if(empty($inputEmail) || empty($inputPassword)){
        $loginError = "Email and password are required!";
    } else {
        $sql = "SELECT password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        
        if($stmt === false){
            die("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("s", $inputEmail);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt->bind_result($hashedPassword);
            $stmt->fetch();
            
            if(password_verify($inputPassword, $hashedPassword)){
                $_SESSION['email'] = $inputEmail;
                $_SESSION['loggedIn'] = true;
                header("Location: display.php");
                exit();
            } else {
                $loginError = "Invalid email or password!";
            }
        } else {
            $loginError = "Invalid email or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <h1>Login to your account</h1>
        <p>Please enter your email and password to login.</p>
        
        <div style="height: 30px; margin-bottom: 0;">
            <?php if(!empty($successMessage)): ?>
                <p style='color:green; margin: 0 0 5px 0;'><?php echo htmlspecialchars($successMessage); ?></p>
            <?php endif; ?>
        </div>
        
        <?php
            if(!empty($loginError)){
                echo "<p style='color:red;'>" . htmlspecialchars($loginError) . "</p>";
            }
        ?>
        <br>

        <form method="post" action="login.php">
            <div class="space">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Email" class="l_label" required>
            </div>

            <div class="space">
            <label>Password:</label>
            <input type="password" name="password" placeholder="Password" class="l_label" required>
            </div>

            <br>
            
            <button type="submit" class="button">
                Login
            </button>
        </form>
        <p>Don't have an account? <a href="index.php">Register here</a></p>
    </div>
</body>
</html>
