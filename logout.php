<?php
session_start();
unset($_SESSION['connected']);
header('Location: /php-counter-GK/login.php');
