<?php
// Set the content-type
header('Content-Type: image/png');

// Create the image
$width = 800; // Width of the screen
$height = 600; // Height of the screen
$image = imagecreatetruecolor($width, $height);

// Colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

// Fill the background
imagefilledrectangle($image, 0, 0, $width, $height, $white);

// Draw shapes
$padding = 10; // Padding between shapes
$x = $padding;
$y = $padding;
$w = $width - $padding * 2;
$h = $height - $padding * 2;

while ($w > 0 && $h > 0) {
    // Draw rectangle
    imagerectangle($image, $x, $y, $x + $w, $y + $h, $black);

    // Calculate the diameter of the circle
    $diameter = min($w, $h);
    // Draw circle
    imageellipse($image, $x + $w / 2, $y + $h / 2, $diameter, $diameter, $black);

    // Update variables for the next shape
    $x += $diameter / 2 + $padding;
    $y += $diameter / 2 + $padding;
    $w -= $diameter + $padding * 2;
    $h -= $diameter + $padding * 2;
}

// Output the image
imagepng($image);
imagedestroy($image);
?>
