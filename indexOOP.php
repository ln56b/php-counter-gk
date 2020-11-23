<?php
$title = 'Page d\'accueil version POO';
require 'elements/header.php';
?>

    <h2>This is a simple visitors' counter</h2>
    <div>
        <?php
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Counter.php';
        $counter = new Counter(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter');
        $counter->addVisit();
        $visitors = $counter->getVisits();
        ?>
    </div>
    <div class="alert alert-success">
        There are
        <?= total_views() ?>
        view<?php if ($visitors > 1) : ?>s<?php endif; ?> on the site
    </div>
    <h2>This is a crazy visitors' counter that counts all visits twice</h2>
    <div>
        <?php
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'DoubleCounter.php';
        $counter = new DoubleCounter(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter');
        $counter->addVisit();
        $visitors = $counter->getVisits();
        ?>
    </div>
    <div class="alert alert-success">
        There are
        <?= total_views() ?>
        view<?php if ($visitors > 1) : ?>s<?php endif; ?> on the site
    </div>
<?php
require 'elements/footer.php';
?>