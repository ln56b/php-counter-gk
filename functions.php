<?php

function add_view(): void
{
    // Provide path to file and initialize $counter.
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter';
    $daily_counter = $file . '-' . date('Y-m-d');
    increment_counter($file);
    increment_counter($daily_counter);
}

function increment_counter(string $file): void
{
    $counter = 1;
    // Check if file counter exists
    if (file_exists($file)) {
        // If so, increment
        $counter = (int)file_get_contents($file);
        $counter++;
    }
    file_put_contents($file, $counter);
}


function total_views()
{
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter';
    return file_get_contents($file);
}

// Useful as the string from URL will lose the zero when converted into int.
function total_views_per_month(int $year, int $month): int
{
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter-' . $year . '-' . $month . '-' . '*';
    $files = glob($file);
    $total = 0;
    foreach ($files as $file) {
        $visitors = (int)file_get_contents($file);
        $total += $visitors;
    }
    return $total;
}

function detailed_views_per_month(int $year, int $month): array
{
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'counter-' . $year . '-' . $month . '-' . '*';
    $files = glob($file);
    $visitors = [];
    if (empty($files)) {
        $visitors[] = [
            'day'=> 'There was no visitor this month',
            'visitors' => '0'
        ];
    } else {
        foreach ($files as $file) {
            $file_name_parts = explode('-', basename($file));
            $visitors[] = [
                'day' => $file_name_parts[3],
                'visitors' => file_get_contents($file)
            ];
        }
    }
    return $visitors;
}
