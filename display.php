<?php
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$other_username = $_POST['other_username'] ?? '';
$other_password = $_POST['other_password'] ?? '';
$dob = $_POST['dob'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';
$contact_number = $_POST['contact_number'] ?? '';
$description = $_POST['description'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background: #f5eeee;
    padding: 30px;
    color: #2b2b2b;
}

h2 {
    color: #800000;
    text-align: center;
    margin-bottom: 15px;
}

h3 {
    color: #5a0000;
    margin: 20px auto 10px;
    max-width: 600px;
}

hr {
    border: none;
    height: 2px;
    background: #800000;
    margin: 20px auto;
    max-width: 600px;
}


p {
    background: #ffffff;
    padding: 10px 15px;
    margin: 8px auto;
    max-width: 600px;
    border-left: 5px solid #800000;
    border-radius: 4px;
}


h3:first-of-type ~ p {
    background: transparent;
    border-left: none;
    padding: 5px 0;
    border-radius: 0;
    font-weight: 500;
}

form {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    max-width: 600px;
    margin: 15px auto;
    box-shadow: 0 4px 10px rgba(128, 0, 0, 0.15);
}

label {
    font-weight: 600;
    color: #5a0000;
}

input[type="text"],
input[type="tel"],
textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px;
    border: 1px solid #b35c5c;
    border-radius: 5px;
}

input:focus,
textarea:focus {
    border-color: #800000;
    box-shadow: 0 0 5px rgba(128, 0, 0, 0.4);
}

input[type="submit"] {
    background: #800000;
    color: #ffffff;
    border: none;
    padding: 10px 18px;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background: #5a0000;
}

    </style>
</head>
<body>
    <h2> Welcome, <?php echo $_POST['username']; ?>! </h2>
    <hr size=1px color=black>
    <h3> Account Information: </h3>
    <p> Full Name: <?php echo $_POST['full_name']; ?> </p>
    <p> Email: <?php echo $_POST['email']; ?> </p>
    <p> Username: <?php echo $_POST['other_username']; ?> </p>
    <p> Password: <?php echo $_POST['other_password']; ?> </p>
    <p> Date of Birth: <?php echo $_POST['dob']; ?> </p>
    <p> Phone Number: <?php echo $_POST['phone']; ?> </p>

    <?php if (!($address && $contact_number && $description)): ?>
    <h3>Additional Information:</h3>
    <form method="post" action="">
        <label> Address:</label>
        <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" required><br><br>
        <label> Contact Number:</label>
        <input type="tel" name="contact_number" placeholder="Contact Number" value="<?php echo $contact_number; ?>" required><br><br>
        <label> Short Personal Description:</label><br>
        <textarea name="description" rows="4" placeholder="Describe yourself..." required><?php echo $description; ?></textarea><br><br>
        
        <input type="hidden" name="full_name" value="<?php echo $full_name; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="other_username" value="<?php echo $other_username; ?>">
        <input type="hidden" name="other_password" value="<?php echo $other_password; ?>">
        <input type="hidden" name="dob" value="<?php echo $dob; ?>">
        <input type="hidden" name="phone" value="<?php echo $phone; ?>">
        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        
        <input type="submit" value="Submit">
    </form>
    <?php endif; ?>

    <?php
    if ($address && $contact_number && $description): ?>
        <h3> Additional Information: </h3>
        <p> Address: <?php echo $address; ?> </p>
        <p> Contact Number: <?php echo $contact_number; ?> </p>
        <p> Personal Description: <?php echo $description; ?> </p>
    <?php endif; ?>
    
    <hr size=1px color=black>
    <form method="get" action="login.php">
        Back to Form Page: <br>
        <input type="submit" value="Back">
    </form>
</body>
</html>