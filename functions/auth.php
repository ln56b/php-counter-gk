<?php
function is_connected(): bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['connected']);
}

function require_user_connection(): void
{
    if (!is_connected()) {
        header('Location: ./login.php');
        exit();
    };
}
