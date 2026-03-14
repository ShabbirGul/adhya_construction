<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Banner;

// Fix Banner 1
$b1 = Banner::find(1);
if ($b1) {
    $b1->image = 'assets/user/images/banner-slider-img/demo-02-slide1.jpg';
    $b1->save();
}

// Fix Banner 2
$b2 = Banner::find(2);
if ($b2) {
    $b2->image = 'assets/user/images/banner-slider-img/demo-02-slide2.jpg';
    $b2->save();
}

// Fix Banner 4 or others
$b4 = Banner::find(4);
if ($b4) {
    $b4->image = 'assets/user/images/banner-slider-img/demo-02-slide3.jpg';
    $b4->save();
}

echo "Banners updated successfully.\n";
