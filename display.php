<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3> Form Details </h3>
    <p> This area displays the information you entered in the submittion form except for the password. </p>
    <hr size=1px color=black>
    <?php
        echo "<p> First Name: " . $_POST['first_name'] . "</p>";
        echo "<p> Last Name: " . $_POST['last_name'] . "</p>";
        echo "<p> Email: " . $_POST['email'] . "</p>";
    ?>
    <hr size=1px color=black>
    <form method="get" action="index.php">
        Back to Form Page: <br>
        <input type="submit" value="Back">
    </form>
</body>
</html>