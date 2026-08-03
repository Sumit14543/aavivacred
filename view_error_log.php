<?php
header('Content-Type: text/plain');
$logFile = __DIR__ . '/data/aadhaar_error.log';
if (file_exists($logFile)) {
    echo file_get_contents($logFile);
} else {
    echo "Log file not found.";
}
