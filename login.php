<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<h1>Login<br><br></h1>";
    ?>

    <form method="post" action="display.php">
        Please enter your login details: <br>
        <label> Username:</label>
        <input type="text" name="username" placeholder="Username" required><br>
        <label> Password:</label>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

