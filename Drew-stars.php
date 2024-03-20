<?php
// Function to draw a filled star with different colors
function drawStar($image, $centerX, $centerY, $radius, $points, $color) {
    $pointArray = array();
    // Calculate points of the star
    for ($i = 0; $i < $points * 2; $i++) {
        $angle = pi() * $i / $points;
        $r = $radius * (($i % 2 === 0) ? 1 : 0.5);
        $pointArray[] = $centerX + $r * cos($angle);
        $pointArray[] = $centerY + $r * sin($angle);
    }
    // Draw the star
    imagefilledpolygon($image, $pointArray, $points * 2, $color);
}

// Create a 400x400 image
$im = imagecreatetruecolor(400, 400);

// Colors
$white = imagecolorallocate($im, 255, 255, 255);
$red = imagecolorallocate($im, 255, 0, 0);
$green = imagecolorallocate($im, 0, 255, 0);
$blue = imagecolorallocate($im, 0, 0, 255);

// Fill the background with white color
imagefill($im, 0, 0, $white);

// Draw stars with different colors
drawStar($im, 200, 200, 100, 5, $red);
drawStar($im, 200, 200, 70, 5, $green);
drawStar($im, 200, 200, 40, 5, $blue);

// Save the image
imagepng($im, 'star.png');
imagedestroy($im);
?>
