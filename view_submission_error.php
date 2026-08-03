<?php
/**
 * AavivaCred - Submission Error Log Viewer
 * Access via: http://yourdomain.com/view_submission_error.php?secret=check321
 */

if (($_GET['secret'] ?? '') !== 'check321') {
    die('Forbidden');
}

$logFile = __DIR__ . '/data/submission_error.log';

echo "<h3 style='font-family: sans-serif; color: #0f172a;'>Form Submission Error Log Viewer</h3>";

if (!file_exists($logFile)) {
    echo "<p style='color:green; font-family: sans-serif;'>✔ No submission errors logged yet (file does not exist).</p>";
    exit;
}

$content = file_get_contents($logFile);
if (empty($content)) {
    echo "<p style='color:green; font-family: sans-serif;'>✔ Error log is empty.</p>";
    exit;
}

$lines = explode("\n", trim($content));
$lines = array_reverse($lines); // show latest first

echo "<div style='font-family: monospace; font-size: 12px; background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 15px; border-radius: 8px; max-height: 500px; overflow-y: auto;'>";
foreach ($lines as $line) {
    if (empty($line)) continue;
    
    // Parse time and details
    if (preg_match('/^\[(.*?)\] (.*)$/', $line, $matches)) {
        $time = $matches[1];
        $rest = $matches[2];
        echo "<div style='margin-bottom: 10px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;'>";
        echo "<span style='color: #64748b; font-weight: bold;'>[$time]</span><br>";
        
        // Check if there is JSON
        if (strpos($rest, ' | POST: ') !== false) {
            list($errJson, $postJson) = explode(' | POST: ', substr($rest, strlen('Form Submission Failed: ')));
            
            $err = json_decode($errJson, true);
            $post = json_decode($postJson, true);
            
            echo "<span style='color: #ef4444; font-weight: bold;'>Errors:</span> " . print_r($err, true) . "<br>";
            echo "<span style='color: #3b82f6; font-weight: bold;'>POST Payload (without secret info):</span> ";
            if ($post) {
                // mask sensitive fields before printing
                if (isset($post['account_number'])) $post['account_number'] = 'XXXX' . substr($post['account_number'], -4);
                if (isset($post['pan_number'])) $post['pan_number'] = 'XXXXX' . substr($post['pan_number'], -4);
                if (isset($post['aadhaar_number'])) $post['aadhaar_number'] = 'XXXX' . substr($post['aadhaar_number'], -4);
                echo "<pre style='margin: 5px 0 0 0; background: #ffffff; padding: 5px; border: 1px dashed #cbd5e1;'>" . htmlspecialchars(print_r($post, true)) . "</pre>";
            } else {
                echo "Invalid JSON";
            }
        } else {
            echo htmlspecialchars($rest);
        }
        echo "</div>";
    } else {
        echo "<div style='margin-bottom: 10px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px; color: #ef4444;'>" . htmlspecialchars($line) . "</div>";
    }
}
echo "</div>";
