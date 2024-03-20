<?php
// Set the content-type
header('Content-Type: image/png');

// Create the image
$width = 400;
$height = 300;
$image = imagecreatetruecolor($width, $height);

// Allocate colors
$skyBlue = imagecolorallocate($image, 135, 206, 235);
$yellow = imagecolorallocate($image, 255, 255, 0);
$brown = imagecolorallocate($image, 139, 69, 19);
$red = imagecolorallocate($image, 255, 0, 0);
$gray = imagecolorallocate($image, 128, 128, 128);
$green = imagecolorallocate($image, 0, 128, 0);

// Fill the background with a gradient sky
for ($i = 0; $i < $height; $i++) {
    $shade = 235 - $i * 0.5;
    $gradientColor = imagecolorallocate($image, 135, $shade, $shade + 20);
    imageline($image, 0, $i, $width, $i, $gradientColor);
}

// Draw the sun
imagefilledellipse($image, 320, 80, 50, 50, $yellow);

// Draw the temple base
imagefilledrectangle($image, 100, 150, 300, 250, $brown);

// Draw the temple roof
$roofPoints = array(
    100, 150,
    200, 50,
    300, 150
);
imagefilledpolygon($image, $roofPoints, 3, $red);

// Draw the temple door with a design
$doorPoints = array(
    180, 250,
    180, 190,
    200, 170,
    220, 190,
    220, 250
);
imagefilledpolygon($image, $doorPoints, 5, $gray);

// Draw steps
$stepColors = [$brown, $gray, $red];
for ($j = 0; $j < 3; $j++) {
    imagefilledrectangle($image, 130 - $j * 10, 250 + $j * 10, 270 + $j * 10, 260 + $j * 10, $stepColors[$j]);
}

// Draw windows
imagefilledellipse($image, 140, 180, 20, 20, $yellow);
imagefilledellipse($image, 260, 180, 20, 20, $yellow);

// Draw some greenery
imagefilledrectangle($image, 0, 250, 400, 300, $green);

// Output the image
imagepng($image);
imagedestroy($image);
?>
