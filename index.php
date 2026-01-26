<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<h1>Registration<br><br></h1>";
    ?>

    <form method="post" action="login.php">
        Please fill out the form below: <br>
        <label> Full Name:</label>
        <input type="text" name="full_name" placeholder="Full Name" required><br>
        <label> Email:</label>  
        <input type="email" name="email" placeholder="Email" required><br>
        <label> Username:</label>
        <input type="text" name="username" placeholder="Username" required><br>
        <label> Password:</label>
        <input type="password" name="password" placeholder="Password" required><br>
        <label> Date of Birth:</label>
        <input type="date" name="dob" placeholder="Date of Birth" required><br>
        <label> Phone Number:</label>
        <input type="tel" name="phone" placeholder="Phone Number" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>