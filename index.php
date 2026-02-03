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
    <?php
        echo "<h1>Account Registration Form</h1>";
        echo "<p> Please fill in the form below.</p>";
    ?>
    <br>

    <form method="post" action="login.php">
        <div class="space">
        <label> Full Name:</label>
        <input type="text" name="full_name" placeholder="Full Name" class="label" required><br>
        </div>

        <div class="space">
        <label> Email Address:</label>  
        <input type="email" name="email" placeholder="Email" class="label" required>
        </div>

        <div class="space">
        <label> Home Address:</label>
        <input type="text" name="address" placeholder="Home Address" class="label" required>
        </div>

        <div class="space">
        <label> Age:</label>
        <input type="number" name="age" placeholder="Age" class="label" required>
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
        <input type="date" name="dob" placeholder="Date of Birth" class="label" required>
        </div>

        <div class="space">
        <label> Phone Number:</label>
        <input type="tel" name="phone" placeholder="Phone Number" class="label" required>
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
