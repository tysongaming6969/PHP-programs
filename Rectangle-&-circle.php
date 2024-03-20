<?php
// Set the content-type
header('Content-Type: image/png');

// Create the image
$width = 1366; // Replace with your screen width
$height = 768; // Replace with your screen height
$image = imagecreatetruecolor($width, $height);

// Colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

// Fill the background with white
imagefill($image, 0, 0, $white);

// Initialize variables
$x = 0;
$y = 0;
$padding = 10; // Padding between shapes

// Draw the pattern
while ($width > 0 && $height > 0) {
    // Draw rectangle
    imagerectangle($image, $x, $y, $x + $width - 1, $y + $height - 1, $black);

    // Reduce dimensions for the circle
    $width -= 2 * $padding;
    $height -= 2 * $padding;
    $x += $padding;
    $y += $padding;

    // Check if there's enough space for a circle
    if ($width > 0 && $height > 0) {
        // Draw circle
        $radius = min($width, $height) / 2;
        imagefilledellipse($image, $x + $radius, $y + $radius, $width, $height, $black);

        // Reduce dimensions for the next rectangle
        $width -= 2 * $radius;
        $height -= 2 * $radius;
        $x += $radius;
        $y += $radius;
    }
}

// Output the image
imagepng($image);
imagedestroy($image);
?>
