<?php
session_start();
session_destroy();
header('Location: signup_option.php');
exit();
?>
