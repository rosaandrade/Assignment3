<!-- public page -->
<?php require 'template/header.php';?>

<?php
$message_sent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_UNSAFE_RAW);

    if ($name && $email && $message) {
        // Here you can integrate an email sending functionality
        // mail($to, $subject, $message, $headers); // Uncomment and configure if mailing is desired

        $message_sent = true;
    }
}
?>
<h2>Contact Us</h2>
<?php if ($message_sent): ?>
    <p>Thank you for contacting us!</p>
<?php else: ?>
    <form method="post" action="contact.php">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email.......:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="message">Message...:</label>
        <textarea id="message" name="message" required></textarea><br><br>
        <button type="submit">Send</button>
    </form>
<?php endif; ?>



<!-- Footer -->
<?php require 'template/footer.php'; ?>


