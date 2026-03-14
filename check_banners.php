<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Banner;
foreach(Banner::all() as $b) {
    echo "ID: " . $b->id . " | Image: " . $b->image . "\n";
}
