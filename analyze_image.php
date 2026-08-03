<?php
$imgPath = 'assets/images/curated_home_couple.png';
$img = imagecreatefrompng($imgPath);
if (!$img) {
    die("Failed to load");
}
echo "Top-left 10x10 pixels:<br>";
for ($y = 0; $y < 10; $y++) {
    for ($x = 0; $x < 10; $x++) {
        $rgb = imagecolorat($img, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        $alpha = ($rgb >> 24) & 0x7F;
        echo "x=$x, y=$y: RGB($r, $g, $b), Alpha=$alpha<br>";
    }
}
