<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="profile">
    <?php
        echo "<h1>Login<br><br></h1>";
        /*echo "<p>Please enter your username and password to login.</p>";*/
    ?>

    <form method="post" action="display.php">
        <label> Username:</label>
        <input type="text" name="username" placeholder="Username" required><br>
        <label> Password:</label>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Login">
    </form>
    </div>
</body>
</html>
