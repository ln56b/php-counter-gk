<?php
$error = null;
$hash = '$2y$12$KXgYXo9Fq3/qVg91E67JdO4sB/8EzDW/yTs2AOZajevhxciLKGeGm';
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    if ($_POST['login'] === 'John' && password_verify($_POST['password'], $hash)) {
        session_start();
        $_SESSION['connected'] = 1;
        header('Location: /php-counter-GK/dashboard.php');
    } else {
        $error = "Invalid email or password";
    }
}

require_once 'functions/auth.php';
if (is_connected()) {
    header('Location: /php-counter-GK/dashboard.php');
    exit();
}

require_once 'elements/header.php';
?>

<?php if ($error): ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>

<?php endif; ?>
<form action="" method="POST">
    <div class="form-group">
        <input class="form-control" type="text" name="login" placeholder="login">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="password">
    </div>
    <button class="btn btn-primary">Sign in</button>
</form>
<?php
require 'elements/footer.php';
?>
