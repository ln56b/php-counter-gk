<?php
require 'functions.php';
$year = (int)date('Y');
$selected_year = empty($_GET['year']) ? null : (int)$_GET['year'];
$selected_month = empty($_GET['month']) ? null : $_GET['month'];

if ($selected_year && $selected_month) {
    $total = total_views_per_month($selected_year, $selected_month);
    $detailed_total = detailed_views_per_month($selected_year, $selected_month);
} else {
    $total = total_views();
}

$months = [
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December'
];

require 'elements/header.php';
?>

<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for ($i = 0; $i < 5; $i++): ?>
                <a class="list-group-item <?= ($year - $i === $selected_year) ? 'active' : ''; ?>"
                   href="dashboard.php?year=<?= $year - $i ?>"><?= $year - $i ?></a>
                <?php if ($year - $i === $selected_year) : ?>
                    <div class="list-group">
                        <?php foreach ($months as $k => $month): ?>
                            <a
                                    class="list-group-item <?= ($k === $selected_month) ? 'active' : ''; ?>"
                                    href="dashboard.php?year=<?= $selected_year ?>&month=<?= $k ?>"><?= $month ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <strong style="font-size:3em;"><?= $total ?></strong>
                Visitor<?= $total > 1 ? 's' : '' ?> in total
            </div>
        </div>
        <?php if (isset($detailed_total)): ?>
            <h2>Total visitors per month</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Day</th>
                    <th>Visitors</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($detailed_total as $row): ?>
                    <tr>
                        <td><?= $row['day'] ?></td>
                        <td><?= $row['visitors'] ?> visitor<?= $row['visitors'] > 1 ? 's' :''  ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<?php
require 'elements/footer.php';
?>
