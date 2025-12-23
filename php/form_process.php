<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitize helper function
    function clean($v) {
        return htmlspecialchars(trim($v), ENT_QUOTES, 'UTF-8');
    }

    // Your receiving email
    $to = "shrestha29106@gmail.com"; // <-- CHANGE THIS
    $siteEmail = "arturtest@waterpros.com.au"; // <-- SAFEST "From" email

    // -----------------------------
    // 1️⃣  SUBSCRIBE FORM
    // -----------------------------
    if (isset($_POST['action']) && $_POST['action'] === 'subscribe') {

        $email = clean($_POST["email"]);
        $subject = "New Subscriber";
        
        $headers  = "From: $siteEmail\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";

        $messageBody = "
            <h3>New Subscription Request</h3>
            <p><strong>Email:</strong> $email</p>
        ";

        echo mail($to, $subject, $messageBody, $headers) ? "success" : "error";
        exit;
    }

    // -----------------------------
    // 2️⃣  APPOINTMENT FORM
    // -----------------------------
    if (isset($_POST['action']) && $_POST['action'] === 'appointment') {

        $name = clean($_POST["name"]);
        $phone = clean($_POST["phone"]);
        $date = clean($_POST["date"]);
        $duration = clean($_POST["duration"]);
        $studio = clean($_POST["studio"]);
        $message = clean($_POST["message"]);

        $subject = "New Appointment Request";

        $headers  = "From: $siteEmail\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";

        $messageBody = "
            <h3>Appointment Request</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Date:</strong> $date</p>
            <p><strong>Duration:</strong> $duration</p>
            <p><strong>Studio:</strong> $studio</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        echo mail($to, $subject, $messageBody, $headers) ? "success" : "error";
        exit;
    }

    // -----------------------------
    // 3️⃣  CONTACT FORM (default)
    // -----------------------------

    $name = clean($_POST["name"]);
    $email = clean($_POST["email"]);
    $message = clean($_POST["message"]);

    $subject = "New Contact Form Message";

    $headers  = "From: $siteEmail\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    $messageBody = "
        <h3>Contact Message</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong><br>$message</p>
    ";

    echo mail($to, $subject, $messageBody, $headers) ? "success" : "error";
}
?>
