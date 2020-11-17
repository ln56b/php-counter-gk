<?php

function add_view(): void {
    // Provide path to file and initialize $counter.
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'data'. DIRECTORY_SEPARATOR . 'counter' ;
    $daily_counter = $file . '-' . date('Y-m-d');
    increment_counter($file);
    increment_counter($daily_counter);
}

function increment_counter(string $file): void {
    $counter = 1;
    // Check if file counter exists
    if (file_exists($file)) {
        // If so, increment
        $counter = (int)file_get_contents($file);
        $counter ++;
    }
    file_put_contents($file, $counter);
}


function total_views() {
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'data'. DIRECTORY_SEPARATOR . 'counter' ;
    return file_get_contents($file);
}
