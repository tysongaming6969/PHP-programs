<?php
// Screen resolution retrieval (fallback included)
$width = imagesx(imagecreatetruecolor(1, 1));
$height = imagesy(imagecreatetruecolor(1, 1));

if (!$width || !$height) {
  $width = 800;
  $height = 600;
}

// Create true color image
$image = imagecreatetruecolor($width, $height);

// Define color palette for a gradient effect
$colors = [
  imagecolorallocate($image, 255, 0, 0),  // Red
  imagecolorallocate($image, 255, 165, 0), // Orange
  imagecolorallocate($image, 255, 255, 0), // Yellow
  imagecolorallocate($image, 0, 255, 0),  // Green
  imagecolorallocate($image, 0, 0, 255),  // Blue
  imagecolorallocate($image, 75, 0, 130), // Indigo
  imagecolorallocate($image, 238, 130, 238), // Violet
];
$numColors = count($colors);

// Center coordinates
$centerX = $width / 2;
$centerY = $height / 2;

// Loop variables
$isRectangle = true;
$currentSize = min($width, $height) / 2;
$colorIndex = 0;

while ($currentSize > 10) {
  $color = $colors[$colorIndex % $numColors]; // Use color palette cyclically

  if ($isRectangle) {
    imagerectangle($image, $centerX - $currentSize / 2, $centerY - $currentSize / 2, $centerX + $currentSize / 2, $centerY + $currentSize / 2, $color);
  } else {
    imageellipse($image, $centerX, $centerY, $currentSize, $currentSize, $color);
  }

  // Reduce size and alternate shape type
  $currentSize *= 0.8;
  $isRectangle = !$isRectangle;
  $colorIndex++;
}

// Send image header and display generated image
header('Content-type: image/png');
imagepng($image);

// Clean up memory
imagedestroy($image);
?>
