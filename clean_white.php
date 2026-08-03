<?php
$images = [
    'assets/images/hero_cutout_couple.png',
    'assets/images/curated_home_couple.png',
    'assets/images/card_two_wheeler.png',
    'assets/images/gold_loan_people.png'
];

foreach ($images as $imgPath) {
    $fullPath = __DIR__ . '/' . $imgPath;
    if (!file_exists($fullPath)) {
        echo "File not found: $imgPath\n";
        continue;
    }

    echo "Processing white background for $imgPath...<br>";
    $img = imagecreatefrompng($fullPath);
    if (!$img) {
        echo "Failed to load $imgPath<br>";
        continue;
    }

    $width = imagesx($img);
    $height = imagesy($img);

    $outImg = imagecreatetruecolor($width, $height);
    imagealphablending($outImg, false);
    imagesavealpha($outImg, true);

    for ($x = 0; $x < $width; $x++) {
        for ($y = 0; $y < $height; $y++) {
            $rgb = imagecolorat($img, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;

            $minVal = min($r, $g, $b);
            $maxVal = max($r, $g, $b);
            $isGrayishWhite = ($maxVal - $minVal) < 15;

            if ($minVal > 245 && $isGrayishWhite) {
                $color = imagecolorallocatealpha($outImg, 0, 0, 0, 127);
            } elseif ($minVal > 215 && $isGrayishWhite) {
                $ratio = ($minVal - 215) / (245 - 215);
                $alphaVal = (int)($ratio * 127);
                $color = imagecolorallocatealpha($outImg, $r, $g, $b, $alphaVal);
            } else {
                $color = imagecolorallocatealpha($outImg, $r, $g, $b, 0);
            }
            imagesetpixel($outImg, $x, $y, $color);
        }
    }

    imagepng($outImg, $fullPath);
    imagedestroy($img);
    imagedestroy($outImg);
    echo "Saved white-cleaned version to $imgPath<br>";
}
echo "All white-background images cleaned successfully!<br>";
