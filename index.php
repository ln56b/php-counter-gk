<?php
$title = 'Page d\'accueil';
require 'elements/header.php';
?>

<h2>This is a simple visitors' counter</h2>
<div>
    <?php
    require_once './functions/counter.php';
    add_view();
    $views = total_views();
    ?>
</div>
<div class="alert alert-success">
    There are
    <?= total_views() ?>
    view<?php if ($views > 1) : ?>s<?php endif; ?> on the site
</div>
<?php
require 'elements/footer.php';
?>
