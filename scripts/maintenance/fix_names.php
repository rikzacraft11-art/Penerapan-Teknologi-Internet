<?php

$baseDir = dirname(__DIR__, 2);
if (file_exists($baseDir . '/vendor/autoload.php') && !defined('LARAVEL_START')) {
    require $baseDir . '/vendor/autoload.php';
    $app = require_once $baseDir . '/bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();
}

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

// Rename 'Add Budget:' to 'Alokasi Budget :'
Transaction::where('description', 'like', 'Add Budget:%')
    ->update(['description' => DB::raw("REPLACE(description, 'Add Budget:', 'Alokasi Budget :')")]);

echo "Renamed transactions successfully.\n";
