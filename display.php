<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Account Management </h2>
    <p> This area displays the username and the password. </p>
    <hr size=1px color=black>
    <?php
        echo "<p> Username: " . $_POST['username'] . "</p>";
        echo "<p> Password: " . $_POST['password'] . "</p>";
    ?>
    <hr size=1px color=black>
    <form method="get" action="index.php">
        Back to Form Page: <br>
        <input type="submit" value="Back">
    </form>
</body>
</html>