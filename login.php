<?php
$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$username = $_POST['username'] ?? '';  
$password = $_POST['password'] ?? '';
$dob = $_POST['dob'] ?? '';
$phone = $_POST['phone'] ?? '';
$other_username = $username;
$other_password = $password;
?>

<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="login">
    <?php
        echo "<h1>Login to your account</h1>";
        echo "<p>Please enter your username and password to login.</p>";
    ?>
    <br>

    <form method="post" action="display.php">
        <div class="space">
        <label> Username:</label>
        <input type="text" name="username" placeholder="Username" class="l_label" required>
        </div>

        <div class="space">
        <label class> Password:</label>
        <input type="password" name="password" placeholder="Password" class="l_label" required>
        </div>

        <input type="hidden" name="full_name" value="<?php echo $full_name; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="other_username" value="<?php echo $other_username; ?>">
        <input type="hidden" name="other_password" value="<?php echo $other_password; ?>">
        <input type="hidden" name="dob" value="<?php echo $dob; ?>">
        <input type="hidden" name="phone" value="<?php echo $phone; ?>">

        <br>
        
        <button type="submit" class="button">
            Login
        </button>
    </form>
    <p> Dont have an account? <a href="index.php">Register here</a></p>
    </div>
</body>
</html>
