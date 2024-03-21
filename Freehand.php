<?php
// Set the content-type
header('Content-Type: image/png');

// Create the image
$width = 800;
$height = 800;
$image = imagecreatetruecolor($width, $height);

// Allocate colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 255, 0, 0);
$green = imagecolorallocate($image, 0, 128, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
$yellow = imagecolorallocate($image, 255, 255, 0);
$orange = imagecolorallocate($image, 255, 165, 0);
$purple = imagecolorallocate($image, 128, 0, 128);
$gold = imagecolorallocate($image, 255, 215, 0);

// Fill the background with white
imagefill($image, 0, 0, $white);

// Draw a large central flower
$centerX = $width / 2;
$centerY = $height / 2;
$radius = 100;
for ($i = 0; $i < 360; $i += 45) {
    $angle = deg2rad($i);
    $x = $centerX + $radius * cos($angle);
    $y = $centerY + $radius * sin($angle);
    imagefilledarc($image, $x, $y, 200, 100, 0, 360, $red, IMG_ARC_PIE);
}

// Add a golden circle in the center of the flower
imagefilledellipse($image, $centerX, $centerY, 50, 50, $gold);

// Draw smaller flowers around the central flower
for ($i = 0; $i < 360; $i += 30) {
    $angle = deg2rad($i);
    $x = $centerX + ($radius + 150) * cos($angle);
    $y = $centerY + ($radius + 150) * sin($angle);
    imagefilledarc($image, $x, $y, 100, 50, 0, 360, $purple, IMG_ARC_PIE);
    imagefilledellipse($image, $x, $y, 20, 20, $yellow);
}

// Create a border with alternating colors
for ($i = 0; $i < $width; $i += 20) {
    $color = ($i % 40 == 0) ? $orange : $green;
    imagefilledrectangle($image, $i, 0, $i + 20, 20, $color);
    imagefilledrectangle($image, $i, $height - 20, $i + 20, $height, $color);
}
for ($i = 0; $i < $height; $i += 20) {
    $color = ($i % 40 == 0) ? $orange : $green;
    imagefilledrectangle($image, 0, $i, 20, $i + 20, $color);
    imagefilledrectangle($image, $width - 20, $i, $width, $i + 20, $color);
}

// Add random dots for a festive look
for ($i = 0; $i < 100; $i++) {
    $x = rand(0, $width);
    $y = rand(0, $height);
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagefilledellipse($image, $x, $y, 10, 10, $color);
}

// Output the image
imagepng($image);
imagedestroy($image);
?>
