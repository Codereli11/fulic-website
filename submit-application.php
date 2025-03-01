<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['full-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $grade = $_POST['grade'];
    $address = $_POST['address'];
    $essay = $_POST['essay'];

    $to = "admissions@fulokoja.edu.ng"; // The email address where the application details should be sent
    $subject = "New Admission Application from " . $fullName;
    $message = "Name: " . $fullName . "\nEmail: " . $email . "\nPhone: " . $phone . "\nGrade: " . $grade . "\nAddress: " . $address . "\nEssay: " . $essay;
    $headers = "From: " . $email;

    if (mail($to, $subject, $message, $headers)) {
        echo "Application submitted successfully.";
    } else {
        echo "There was an error submitting your application. Please try again.";
    }
}
?>
