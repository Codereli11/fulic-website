<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate user input
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter
    
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'school_db');
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "Sign-up successful!";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Sign Up</button>
</form>
