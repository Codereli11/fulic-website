<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $result = $_POST['result'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'school_db');
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $sql = "INSERT INTO results (student_id, result) VALUES ('$student_id', '$result')";
    if ($conn->query($sql) === TRUE) {
        echo "Result uploaded successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>
<h2>Principal's Dashboard</h2>
<form method="POST">
    <input type="text" name="student_id" placeholder="Student ID" required>
    <textarea name="result" placeholder="Enter result" required></textarea>
    <button type="submit">Upload Result</button>
</form>
