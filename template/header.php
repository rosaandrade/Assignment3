<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <div id="container">
        <header id=""banner>
            <h1>Final Assignment</h1>
            <h3>Users' Info Using PHP with MySQL</h3>
        </header>
        <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>  <!-- Public Page-->
                    <!-- if the user are logged in, so the members page will appear, otherwise no -->
                    <?php if (isset($_SESSION['email']) ): ?>
                       <li><a href="member.php">Member</a></li> <!-- Members Only-->
                    <?php endif; ?>  
                    <li><a href="register.php">Register</a></li><!-- Register: Public Page-->
                    <li><a href="contact.php">Contact</a></li> <!-- Public Page-->
                    <li><a href="logout.php">Logout</a></li><!-- just code-->
                </ul>
        </nav>
        
    <main class="main-content">
<!-- the rest of the code will be in the footer -->
<!-- 
</div
</body
</html
-->