<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<p>Hello, User!<br><br></p>";
    ?>

    <form method="post" action="display.php">
        Please fill out the form below: <br>
        <label> First Name:</label>
        <input type="text" name="first_name" placeholder="First Name" required><br>
        <label> Last Name:</label>
        <input type="text" name="last_name" placeholder="Last Name" required><br>
        <label> Email:</label>  
        <input type="email" name="email" placeholder="Email" required><br>
        <label> Password:</label>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>