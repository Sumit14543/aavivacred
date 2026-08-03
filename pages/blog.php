<?php
/**
 * AavivaCred - Financial Insights & Blog CMS
 */

$page_title = "Financial Insights, Loan Advice & Smart Money Tips";
$meta_description = "Read expert articles on personal loans, business credit limits, CIBIL score optimization, and financial planning from AavivaCred advisory experts.";

require_once __DIR__ . '/../includes/header.php';

$blogService = new \AavivaCred\Services\BlogService();
$posts = $blogService->getPublishedPosts();
?>

<!-- Hero Header Section -->
<section class="relative pt-32 pb-16 bg-gradient-to-b from-[#021435] to-[#031d40] text-white overflow-hidden border-b border-white/10">
    <div class="container mx-auto px-4 max-w-6xl text-center relative z-10">
        <span class="inline-block px-4 py-1.5 rounded-full bg-accentYellow/10 text-accentYellow border border-accentYellow/20 font-extrabold text-xs uppercase tracking-widest mb-4">
            AavivaCred Knowledge Center
        </span>
        <h1 class="text-3xl md:text-5xl font-black tracking-tight leading-tight mb-4 text-white">
            Smart Financial Insights & Credit Guides
        </h1>
        <p class="text-sm md:text-base text-slate-300 max-w-2xl mx-auto font-medium">
            Expert advice, interest rate trends, CIBIL score optimization, and loan comparison strategies.
        </p>
    </div>
</section>

<!-- Blog Cards Section -->
<section class="py-16 bg-[#f6f8fb]">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($posts as $post): ?>
                <article class="bg-white rounded-3xl overflow-hidden border border-slate-200/80 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <?php if (!empty($post['image_url'])): ?>
                            <div class="h-52 w-full overflow-hidden relative">
                                <img src="<?php echo htmlspecialchars($post['image_url']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" loading="lazy" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                                <span class="absolute top-4 left-4 bg-darkBlue text-accentYellow text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider shadow">
                                    <?php echo htmlspecialchars($post['category']); ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <div class="p-6 md:p-8 space-y-3">
                            <div class="flex items-center gap-3 text-xs text-slate-400 font-semibold">
                                <span class="flex items-center gap-1"><i data-lucide="clock" class="w-3.5 h-3.5 text-primary"></i> <?php echo intval($post['read_time']); ?> min read</span>
                                <span>•</span>
                                <span><?php echo date('d M Y', strtotime($post['created_at'])); ?></span>
                            </div>

                            <h2 class="text-xl font-bold text-darkBlue hover:text-primary transition leading-snug">
                                <a href="blog-post.php?slug=<?php echo htmlspecialchars($post['slug']); ?>">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </a>
                            </h2>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-medium">
                                <?php echo htmlspecialchars($post['excerpt']); ?>
                            </p>
                        </div>
                    </div>

                    <div class="p-6 md:p-8 pt-0 flex items-center justify-between border-t border-slate-100 mt-4">
                        <span class="text-xs font-bold text-slate-500"><?php echo htmlspecialchars($post['author']); ?></span>
                        <a href="blog-post.php?slug=<?php echo htmlspecialchars($post['slug']); ?>" class="text-xs font-black text-primary hover:text-darkBlue flex items-center gap-1 group">
                            Read Full Guide <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
