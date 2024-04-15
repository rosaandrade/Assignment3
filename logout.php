<!-- just the logout code -->
<?php

session_start();
session_destroy();
header("Location: index.php");
exit();

?>
