<?php
// Set the content-type
header('Content-Type: image/png');

// Create the image
$width = 50; // Circle width
$height = 50; // Circle height
$image = imagecreatetruecolor($width, $height);

// Colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

// Fill the background with white
imagefill($image, 0, 0, $white);

// Draw the circle
imagefilledellipse($image, $width / 2, $height / 2, $width, $height, $black);

// Output the image
imagepng($image);
imagedestroy($image);
?>
