<?php
header('Content-Type: text/plain');
$logFile = __DIR__ . '/data/aadhaar_mappings.json';
if (file_exists($logFile)) {
    echo file_get_contents($logFile);
} else {
    echo "Mappings file not found.";
}
