<?php
/**
 * AavivaCred - Dynamic XML Sitemap Generator
 */

declare(strict_types=1);

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/src/Core/Database.php';

header("Content-Type: application/xml; charset=utf-8");

$baseUrl = 'https://aavivacred.com';

$staticPages = [
    ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
    ['loc' => '/pages/calculator.php', 'priority' => '0.8', 'changefreq' => 'weekly'],
    ['loc' => '/pages/services.php', 'priority' => '0.8', 'changefreq' => 'weekly'],
    ['loc' => '/pages/about.php', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['loc' => '/pages/contact.php', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['loc' => '/pages/apply.php', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['loc' => '/pages/fees-charges.php', 'priority' => '0.6', 'changefreq' => 'monthly'],
    ['loc' => '/pages/interest-rates.php', 'priority' => '0.6', 'changefreq' => 'monthly'],
    ['loc' => '/pages/privacy.php', 'priority' => '0.4', 'changefreq' => 'monthly'],
    ['loc' => '/pages/refund-policy.php', 'priority' => '0.4', 'changefreq' => 'monthly'],
    ['loc' => '/pages/grievance-redressal.php', 'priority' => '0.4', 'changefreq' => 'monthly'],
    ['loc' => '/pages/important-information.php', 'priority' => '0.4', 'changefreq' => 'monthly'],
    ['loc' => '/pages/blog.php', 'priority' => '0.8', 'changefreq' => 'daily'],
];

$loanSlugs = [
    'personal-loan', 'business-loan', 'gold-loan', 
    'home-loan', 'payday-loan', 'edi-loan', 
    'instant-loan', 'marriage-loan', 'travel-loan', 'car-loan'
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($staticPages as $page): ?>
    <url>
        <loc><?php echo $baseUrl . $page['loc']; ?></loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq><?php echo $page['changefreq']; ?></changefreq>
        <priority><?php echo $page['priority']; ?></priority>
    </url>
<?php endforeach; ?>

<?php foreach ($loanSlugs as $slug): ?>
    <url>
        <loc><?php echo $baseUrl . '/' . $slug; ?></loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.95</priority>
    </url>
<?php endforeach; ?>

<?php
// Dynamic Blog Posts
$pdo = AavivaCred\Core\Database::getInstance()->getPdo();
if ($pdo) {
    try {
        $stmt = $pdo->query("SELECT slug, created_at FROM `blog_posts` WHERE status = 'published' ORDER BY id DESC");
        while ($post = $stmt->fetch()) {
            echo "    <url>\n";
            echo "        <loc>" . $baseUrl . "/pages/blog-post.php?slug=" . htmlspecialchars($post['slug']) . "</loc>\n";
            echo "        <lastmod>" . date('Y-m-d', strtotime($post['created_at'])) . "</lastmod>\n";
            echo "        <changefreq>monthly</changefreq>\n";
            echo "        <priority>0.7</priority>\n";
            echo "    </url>\n";
        }
    } catch (Exception $e) {}
}
?>
</urlset>
