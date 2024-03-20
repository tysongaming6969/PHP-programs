<?php
// Set the content-type
header('Content-Type: image/png');

// Create the image
$width = 600;
$height = 600;
$image = imagecreatetruecolor($width, $height);

// Allocate colors
$white = imagecolorallocate($image, 255, 255, 255);
$red = imagecolorallocate($image, 255, 0, 0);
$green = imagecolorallocate($image, 0, 128, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
$yellow = imagecolorallocate($image, 255, 255, 0);
$orange = imagecolorallocate($image, 255, 165, 0);
$peacockBlue = imagecolorallocate($image, 51, 51, 255);
$gold = imagecolorallocate($image, 255, 215, 0);

// Fill the background with white
imagefill($image, 0, 0, $white);

// Draw the outermost circle
imagefilledellipse($image, $width / 2, $height / 2, 580, 580, $red);

// Draw concentric circles with different colors
$colors = [$orange, $yellow, $green, $blue];
$radius = 250;
foreach ($colors as $color) {
    imagefilledellipse($image, $width / 2, $height / 2, $radius * 2, $radius * 2, $color);
    $radius -= 40;
}

// Draw lotus petals around the center circle
for ($i = 0; $i < 360; $i += 20) {
    $x = $width / 2 + cos(deg2rad($i)) * 150;
    $y = $height / 2 + sin(deg2rad($i)) * 150;
    $petalWidth = 60;
    $petalHeight = 120;
    imagefilledarc($image, $x, $y, $petalWidth, $petalHeight, 0, 360, $gold, IMG_ARC_PIE);
}

// Draw paisley patterns inside the lotus petals
for ($i = 0; $i < 360; $i += 20) {
    $x = $width / 2 + cos(deg2rad($i)) * 150;
    $y = $height / 2 + sin(deg2rad($i)) * 150;
    $petalWidth = 20;
    $petalHeight = 40;
    imagefilledarc($image, $x, $y, $petalWidth, $petalHeight, 0, 360, $peacockBlue, IMG_ARC_PIE);
}

// Add a peacock motif in the center
imagefilledellipse($image, $width / 2, $height / 2, 100, 100, $peacockBlue);
imagefilledarc($image, $width / 2, $height / 2, 100, 100, 0, 180, $gold, IMG_ARC_PIE);

// Save the image
imagepng($image, 'enhanced_rangoli.png');
imagedestroy($image);
?>
