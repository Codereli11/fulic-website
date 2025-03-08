<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Secure database connection
    $conn = new mysqli('localhost', 'root', '', 'school_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];

            // Fetch student's result securely
            $result_stmt = $conn->prepare("SELECT result FROM results WHERE student_id = ?");
            $result_stmt->bind_param("i", $row['id']);
            $result_stmt->execute();
            $result_result = $result_stmt->get_result();

            if ($result_result->num_rows > 0) {
                $result_data = $result_result->fetch_assoc();
                echo "Your result: " . htmlspecialchars($result_data['result']);
            } else {
                echo "No result found!";
            }
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found!";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>

