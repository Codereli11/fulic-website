<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'school_db');
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Simulate a password reset link
        echo "Password reset link sent to your email!";
    } else {
        echo "Email not found!";
    }
    $conn->close();
}
?>
<form method="POST">
    <input type="email" name="email" placeholder="Enter Your Email" required>
    <button type="submit">Send Reset Link</button>
</form>
