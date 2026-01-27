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