<?php
/**
 * AavivaCred - Single Blog Article View
 */

require_once __DIR__ . '/../config/config.php';

// Autoload
spl_autoload_register(function ($class) {
    $prefix = 'AavivaCred\\';
    $base_dir = __DIR__ . '/../src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require_once $file;
});

$slug = $_GET['slug'] ?? '';
$blogService = new \AavivaCred\Services\BlogService();
$post = $blogService->getPostBySlug($slug);

if (!$post) {
    header("Location: blog.php");
    exit;
}

$page_title = $post['title'];
$meta_description = $post['excerpt'];
$article_schema = $post;

require_once __DIR__ . '/../includes/header.php';
?>

<section class="relative pt-32 pb-16 bg-gradient-to-b from-[#021435] to-[#031d40] text-white border-b border-white/10">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="mb-4">
            <a href="blog.php" class="inline-flex items-center gap-1 text-xs font-bold text-accentYellow hover:underline mb-3">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back to Insights
            </a>
            <span class="block text-xs font-extrabold uppercase tracking-widest text-slate-400 mt-2">
                <?php echo htmlspecialchars($post['category']); ?>
            </span>
        </div>

        <h1 class="text-2xl md:text-4xl font-extrabold text-white leading-tight mb-6">
            <?php echo htmlspecialchars($post['title']); ?>
        </h1>

        <div class="flex flex-wrap items-center gap-4 text-xs font-semibold text-slate-350 border-t border-white/10 pt-4">
            <span class="flex items-center gap-1.5"><i data-lucide="user" class="w-4 h-4 text-accentYellow"></i> <?php echo htmlspecialchars($post['author']); ?></span>
            <span>•</span>
            <span class="flex items-center gap-1.5"><i data-lucide="clock" class="w-4 h-4 text-accentYellow"></i> <?php echo intval($post['read_time']); ?> Min Read</span>
            <span>•</span>
            <span>Published on <?php echo date('F d, Y', strtotime($post['created_at'])); ?></span>
        </div>
    </div>
</section>

<article class="py-16 bg-[#f6f8fb]">
    <div class="container mx-auto px-4 max-w-4xl">
        <?php if (!empty($post['image_url'])): ?>
            <div class="rounded-3xl overflow-hidden mb-10 shadow-xl border border-slate-200">
                <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" loading="lazy" class="w-full h-80 sm:h-96 object-cover">
            </div>
        <?php endif; ?>

        <div class="bg-white p-8 md:p-12 rounded-3xl border border-slate-200/80 shadow-md prose prose-slate max-w-none prose-headings:font-extrabold prose-headings:text-darkBlue prose-p:text-slate-650 prose-p:leading-relaxed prose-a:text-primary">
            <?php echo $post['content']; ?>
        </div>

        <!-- CTA Box -->
        <div class="mt-12 bg-gradient-to-r from-[#021435] via-[#031d40] to-darkBlue text-white p-8 rounded-3xl border border-white/10 shadow-xl flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="text-xl font-extrabold text-white mb-2">Ready to Apply for a Loan?</h3>
                <p class="text-xs text-slate-300 font-medium">Compare direct pre-approved rates from India's leading banks & NBFCs.</p>
            </div>
            <a href="apply.php" class="px-6 py-3 bg-accentYellow hover:bg-yellow-500 text-darkBlue font-bold text-xs rounded-full shadow-md transition-all shrink-0">
                Apply Online Now
            </a>
        </div>
    </div>
</article>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
