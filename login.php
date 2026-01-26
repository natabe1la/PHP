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

    <form method="post" action="display.php">
        <div class="space">
        <label> Username:</label>
        <input type="text" name="username" placeholder="Username" class="l_label" required>
        </div>

        <div class="space">
        <label class> Password:</label>
        <input type="password" name="password" placeholder="Password" class="l_label" required>
        </div>
       <button type="submit" class="button">
            Login
        </button>
    </form>
    <p> Dont have an account? <a href="index.php">Register here</a></p>
    </div>
</body>
</html>
