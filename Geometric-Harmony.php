<?php
// Set the content-type
header('Content-Type: image/png');

// Create the image
$width = 800;
$height = 600;
$image = imagecreatetruecolor($width, $height);

// Allocate colors
$white = imagecolorallocate($image, 255, 255, 255);
$lightBlue = imagecolorallocate($image, 173, 216, 230);
$darkBlue = imagecolorallocate($image, 0, 0, 139);
$gold = imagecolorallocate($image, 255, 215, 0);
$crimson = imagecolorallocate($image, 220, 20, 60);
$forestGreen = imagecolorallocate($image, 34, 139, 34);

// Fill the background with white
imagefill($image, 0, 0, $white);

// Draw overlapping rectangles with different opacities
for ($i = 0; $i < 5; $i++) {
    $col = imagecolorallocatealpha($image, rand(0, 255), rand(0, 255), rand(0, 255), 50);
    imagefilledrectangle($image, $i * 100, $i * 50, ($i + 1) * 100, ($i + 1) * 50, $col);
}

// Draw concentric arcs
for ($i = 0; $i < 360; $i += 30) {
    imagefilledarc($image, $width / 2, $height / 2, $width - $i, $height - $i, 0, 40, $lightBlue, IMG_ARC_PIE);
    imagefilledarc($image, $width / 2, $height / 2, $width - $i, $height - $i, 180, 220, $darkBlue, IMG_ARC_PIE);
}

// Draw a gold polygon in the center
$points = array(
    $width / 2, $height / 2 - 100,
    $width / 2 + 86, $height / 2 + 50,
    $width / 2 - 86, $height / 2 + 50
);
imagefilledpolygon($image, $points, 3, $gold);

// Add a crimson ellipse
imagefilledellipse($image, $width / 2, $height / 2, 300, 150, $crimson);

// Draw a forest green border
imagefilledrectangle($image, 0, 0, $width, 10, $forestGreen);
imagefilledrectangle($image, 0, $height - 10, $width, $height, $forestGreen);
imagefilledrectangle($image, 0, 0, 10, $height, $forestGreen);
imagefilledrectangle($image, $width - 10, 0, $width, $height, $forestGreen);

// Output the image
imagepng($image);
imagedestroy($image);
?>
