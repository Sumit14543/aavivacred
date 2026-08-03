<?php
/**
 * AavivaCred - Enterprise Blog CMS & WYSIWYG Studio (Dual Theme: Light & Dark Mode)
 */

require_once __DIR__ . '/../config/config.php';

spl_autoload_register(function ($class) {
    $prefix = 'AavivaCred\\';
    $base_dir = __DIR__ . '/../src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require_once $file;
});

\AavivaCred\Security\Security::initSession();
\AavivaCred\Security\Security::setSecurityHeaders();

$jwtToken = $_COOKIE['admin_auth_token'] ?? '';
$jwtSecret = getenv('JWT_SECRET') ?: 'fallback-jwt-secret-key-12345';
$decodedToken = null;

if (!empty($jwtToken)) {
    $decodedToken = \AavivaCred\Security\JWT::verifyToken($jwtToken, $jwtSecret);
}

if (!$decodedToken) {
    header("Location: login.php");
    exit;
}

$_SESSION['admin_user_id'] = $decodedToken['admin_user_id'];
$_SESSION['admin_username'] = $decodedToken['admin_username'];
$_SESSION['admin_role'] = $decodedToken['admin_role'];

$blogService = new \AavivaCred\Services\BlogService();
$message = '';
$error = '';

// Handle Delete Post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_post') {
    if (\AavivaCred\Security\Security::verifyCsrfToken($_POST['_csrf_token'] ?? '')) {
        $deleteId = intval($_POST['post_id'] ?? 0);
        if ($blogService->deletePost($deleteId)) {
            $message = 'Blog article deleted successfully.';
        }
    }
}

// Handle Create / Edit Post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save_post') {
    if (\AavivaCred\Security\Security::verifyCsrfToken($_POST['_csrf_token'] ?? '')) {
        $title     = \AavivaCred\Security\Security::sanitize($_POST['title'] ?? '');
        $slug      = \AavivaCred\Security\Security::sanitize($_POST['slug'] ?? '');
        $excerpt   = \AavivaCred\Security\Security::sanitize($_POST['excerpt'] ?? '');
        $content   = $_POST['content'] ?? '';
        $category  = \AavivaCred\Security\Security::sanitize($_POST['category'] ?? 'Personal Finance');
        $author    = \AavivaCred\Security\Security::sanitize($_POST['author'] ?? 'AavivaCred Advisory Desk');
        $imageUrl  = \AavivaCred\Security\Security::sanitize($_POST['image_url'] ?? '');
        $readTime  = intval($_POST['read_time'] ?? 5);
        $status    = \AavivaCred\Security\Security::sanitize($_POST['status'] ?? 'published');

        if (empty($title)) {
            $error = 'Article Title is required.';
        } elseif (empty($content)) {
            $error = 'Article content body cannot be empty.';
        } else {
            $saved = $blogService->createPost([
                'title'     => $title,
                'slug'      => $slug,
                'excerpt'   => $excerpt,
                'content'   => $content,
                'category'  => $category,
                'author'    => $author,
                'image_url' => $imageUrl,
                'read_time' => $readTime,
                'status'    => $status
            ]);

            if ($saved) {
                $message = ($status === 'published') ? 'Blog article published successfully!' : 'Blog article saved as draft.';
            } else {
                $error = 'Failed to save blog post. Please check input parameters.';
            }
        }
    }
}

$allPosts = $blogService->getAllPosts();
?>
<!DOCTYPE html>
<html lang="en" class="h-full dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Blog Studio & CMS | AavivaCred</title>
    
    <script>
        if (localStorage.getItem('admin_theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brandBlue: '#021435',
                        brandGold: '#ffd30f'
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Quill.js WYSIWYG Editor stylesheet and script -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .ql-toolbar.ql-snow {
            background-color: #031d40;
            border-color: rgba(255, 255, 255, 0.15) !important;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .ql-container.ql-snow {
            background-color: #ffffff;
            color: #0f172a;
            border-color: rgba(255, 255, 255, 0.15) !important;
            border-bottom-left-radius: 1rem;
            border-bottom-right-radius: 1rem;
            font-family: 'Manrope', sans-serif;
            font-size: 15px;
            min-height: 280px;
        }
        .ql-snow .ql-stroke { stroke: #94a3b8; }
        .ql-snow .ql-fill { fill: #94a3b8; }
        .ql-snow .ql-picker { color: #94a3b8; }
    </style>
</head>
<body class="h-full bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 flex flex-col lg:flex-row min-h-screen transition-colors duration-300">

    <!-- Sidebar Navigation -->
    <aside class="w-full lg:w-64 bg-slate-900 dark:bg-[#021435] border-b lg:border-b-0 lg:border-r border-slate-800 dark:border-white/10 p-6 flex flex-col justify-between shrink-0">
        <div>
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-800 dark:border-white/10">
                <img src="../assets/images/aavivacred_light.png" alt="AavivaCred" class="h-10 object-contain">
                <button id="theme-toggle" class="p-2 rounded-xl bg-slate-800 dark:bg-white/10 text-amber-400 hover:scale-110 transition shadow" title="Toggle Light/Dark Mode">
                    <i data-lucide="sun" class="w-4 h-4 hidden dark:block"></i>
                    <i data-lucide="moon" class="w-4 h-4 block dark:hidden text-slate-300"></i>
                </button>
            </div>

            <nav class="space-y-2">
                <a href="index.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-semibold text-sm transition">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
                </a>
                <a href="leads.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-semibold text-sm transition">
                    <i data-lucide="users" class="w-4 h-4"></i> Lead Management
                </a>
                <a href="blog.php" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-amber-400 text-slate-950 font-bold text-sm shadow-lg shadow-amber-400/20">
                    <i data-lucide="file-text" class="w-4 h-4"></i> Blog Studio & CMS
                </a>
                <a href="settings.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-semibold text-sm transition">
                    <i data-lucide="settings" class="w-4 h-4"></i> System Settings
                </a>
                <a href="../pages/blog.php" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-white/5 hover:text-amber-400 font-semibold text-sm transition mt-6">
                    <i data-lucide="external-link" class="w-4 h-4"></i> View Public Blog
                </a>
            </nav>
        </div>

        <div class="pt-6 border-t border-slate-800 dark:border-white/10 flex items-center justify-between">
            <div class="text-xs">
                <p class="font-extrabold text-white"><?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?></p>
                <p class="text-slate-400 font-semibold"><?php echo htmlspecialchars($_SESSION['admin_role'] ?? 'Super Admin'); ?></p>
            </div>
            <a href="index.php?action=logout" class="p-2 text-rose-400 hover:bg-rose-500/10 rounded-lg transition" title="Logout">
                <i data-lucide="log-out" class="w-5 h-5"></i>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-6 lg:p-10 overflow-y-auto">
        <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">Enterprise Blog Studio</h1>
                <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 font-semibold mt-1">Rich WYSIWYG editor with live preview, auto-slug, reading time & SEO controls</p>
            </div>
        </header>

        <?php if ($message): ?>
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-xl text-xs font-bold flex items-center gap-2 shadow-lg">
                <i data-lucide="check-circle-2" class="w-4 h-4"></i> <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="mb-6 p-4 bg-rose-500/10 border border-rose-500/20 text-rose-600 dark:text-rose-300 rounded-xl text-xs font-bold flex items-center gap-2 shadow-lg">
                <i data-lucide="alert-triangle" class="w-4 h-4 text-rose-400"></i> <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <!-- WYSIWYG Article Editor Card -->
        <div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 p-6 lg:p-8 rounded-3xl mb-10 shadow-lg dark:shadow-2xl space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 dark:border-white/10 pb-4">
                <h2 class="text-lg font-extrabold text-slate-900 dark:text-white flex items-center gap-2">
                    <i data-lucide="pen-tool" class="w-5 h-5 text-amber-500 dark:text-amber-400"></i> Rich Article Authoring Studio
                </h2>
                <div class="flex items-center gap-3">
                    <button type="button" id="preview-toggle-btn" class="px-3.5 py-1.5 bg-slate-100 dark:bg-white/10 hover:bg-slate-200 dark:hover:bg-white/20 text-slate-800 dark:text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5">
                        <i data-lucide="eye" class="w-3.5 h-3.5 text-amber-500 dark:text-amber-400"></i> Preview Article
                    </button>
                </div>
            </div>

            <form id="blog-form" method="POST" action="blog.php" class="space-y-6">
                <?php echo \AavivaCred\Security\Security::csrfField(); ?>
                <input type="hidden" name="action" value="save_post">
                <input type="hidden" name="content" id="hidden-content-input">
                <input type="hidden" name="status" id="post-status-input" value="published">

                <!-- Title & Slug Grid -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-5">
                    <div class="md:col-span-8 space-y-2">
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 dark:text-slate-300">Article Title <span class="text-rose-500">*</span></label>
                        <input type="text" id="post-title" name="title" required class="w-full px-4 py-3 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm font-bold text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:border-amber-400 transition" placeholder="e.g. How to Negotiate Lower Personal Loan Interest Rates in 2026">
                    </div>

                    <div class="md:col-span-4 space-y-2">
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 dark:text-slate-300">Category</label>
                        <select name="category" class="w-full px-4 py-3 bg-slate-50 dark:bg-[#031d40] border border-slate-200 dark:border-white/10 rounded-xl text-xs font-bold text-slate-800 dark:text-white focus:outline-none focus:border-amber-400">
                            <option value="Personal Finance">Personal Finance</option>
                            <option value="Business Growth">Business Growth</option>
                            <option value="Credit Score & CIBIL">Credit Score & CIBIL</option>
                            <option value="Home & Property Loans">Home & Property Loans</option>
                            <option value="Gold Loans">Gold Loans</option>
                            <option value="Short Term Advances">Short Term Advances</option>
                        </select>
                    </div>
                </div>

                <!-- URL Slug Generator & Metadata -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-5">
                    <div class="md:col-span-6 space-y-2">
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 dark:text-slate-300">SEO URL Slug</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-xs font-mono">/blog/</span>
                            <input type="text" id="post-slug" name="slug" class="w-full pl-16 pr-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-mono text-amber-600 dark:text-amber-400 placeholder-slate-400 focus:outline-none focus:border-amber-400" placeholder="auto-generated-slug">
                        </div>
                    </div>

                    <div class="md:col-span-3 space-y-2">
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 dark:text-slate-300">Author Name</label>
                        <input type="text" name="author" value="AavivaCred Advisory Desk" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-semibold text-slate-800 dark:text-white focus:outline-none focus:border-amber-400">
                    </div>

                    <div class="md:col-span-3 space-y-2">
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 dark:text-slate-300">Read Time (Mins)</label>
                        <input type="number" id="post-read-time" name="read_time" value="5" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-bold text-slate-800 dark:text-white focus:outline-none focus:border-amber-400">
                    </div>
                </div>

                <!-- Excerpt Summary -->
                <div class="space-y-2">
                    <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 dark:text-slate-300">SEO Meta Excerpt (1-2 Sentences)</label>
                    <textarea name="excerpt" id="post-excerpt" rows="2" required class="w-full px-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-medium text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-amber-400" placeholder="Brief summary of the article for Google search snippets and card previews..."></textarea>
                </div>

                <!-- Quill.js Rich Text Editor Container -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 dark:text-slate-300">Article Content Body (Rich WYSIWYG) <span class="text-rose-500">*</span></label>
                        <span id="word-count-badge" class="text-[11px] font-bold text-slate-500 dark:text-slate-400">0 words • ~1 min read</span>
                    </div>

                    <div id="quill-editor-container" class="rounded-2xl overflow-hidden shadow-inner"></div>
                </div>

                <!-- Featured Image URL & Preview -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-center">
                    <div class="md:col-span-8 space-y-2">
                        <label class="block text-xs font-extrabold uppercase tracking-wider text-slate-700 dark:text-slate-300">Featured Banner Image URL</label>
                        <input type="url" id="post-image-url" name="image_url" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-semibold text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-amber-400" placeholder="https://images.unsplash.com/photo-...">
                    </div>

                    <div class="md:col-span-4">
                        <div class="h-20 w-full bg-slate-100 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl overflow-hidden flex items-center justify-center relative">
                            <img id="image-preview" src="" class="hidden w-full h-full object-cover">
                            <span id="image-preview-placeholder" class="text-[11px] text-slate-400 font-semibold flex items-center gap-1">
                                <i data-lucide="image" class="w-3.5 h-3.5"></i> Image Preview
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Action Toolbar -->
                <div class="pt-4 border-t border-slate-100 dark:border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-xs text-slate-500 dark:text-slate-400 font-semibold">WYSIWYG Editor Active</span>
                    </div>

                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <button type="button" onclick="submitPostForm('draft')" class="w-full sm:w-auto px-5 py-3 border border-slate-300 dark:border-white/20 hover:bg-slate-100 dark:hover:bg-white/10 text-slate-800 dark:text-white font-bold rounded-xl text-xs transition">
                            Save Draft
                        </button>
                        <button type="button" onclick="submitPostForm('published')" class="w-full sm:w-auto px-8 py-3 bg-amber-400 hover:bg-amber-300 text-slate-950 font-extrabold rounded-xl text-xs shadow-lg shadow-amber-400/20 transition hover:scale-105 active:scale-95 flex items-center justify-center gap-2">
                            <i data-lucide="send" class="w-4 h-4"></i> Publish Article
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Live Preview Modal -->
        <div id="preview-modal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-md hidden items-center justify-center p-4">
            <div class="bg-white text-slate-900 rounded-3xl max-w-4xl w-full max-h-[90vh] overflow-y-auto p-6 md:p-10 shadow-2xl relative">
                <button type="button" id="close-preview-btn" class="absolute top-6 right-6 p-2 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-700">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
                <span class="text-xs font-bold uppercase tracking-widest text-primary block mb-2" id="preview-category">Category</span>
                <h1 class="text-2xl md:text-3xl font-black text-slate-900 mb-4" id="preview-title">Title Preview</h1>
                <div class="h-64 w-full rounded-2xl overflow-hidden mb-6 bg-slate-100">
                    <img id="preview-image" class="w-full h-full object-cover">
                </div>
                <div id="preview-body" class="prose max-w-none text-sm leading-relaxed"></div>
            </div>
        </div>

        <!-- Published Articles Table -->
        <div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-3xl overflow-hidden shadow-lg dark:shadow-2xl">
            <div class="p-6 border-b border-slate-100 dark:border-white/10 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white">Articles Catalog</h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400 font-semibold">Total published articles & draft posts</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-700 dark:text-slate-300">
                    <thead class="bg-slate-50 dark:bg-white/[0.03] text-slate-500 dark:text-slate-400 uppercase font-extrabold tracking-wider border-b border-slate-100 dark:border-white/10">
                        <tr>
                            <th class="p-4">Title</th>
                            <th class="p-4">Category</th>
                            <th class="p-4">Author</th>
                            <th class="p-4">Read Time</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Published Date</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-white/5">
                        <?php foreach ($allPosts as $p): ?>
                            <tr class="hover:bg-slate-50 dark:hover:bg-white/[0.02] transition">
                                <td class="p-4 font-bold text-slate-900 dark:text-white">
                                    <?php echo htmlspecialchars($p['title']); ?>
                                    <div class="text-[11px] font-mono text-amber-600 dark:text-amber-400/80 mt-0.5">/blog/<?php echo htmlspecialchars($p['slug']); ?></div>
                                </td>
                                <td class="p-4 uppercase text-slate-500 dark:text-slate-400 font-extrabold text-[10px]"><?php echo htmlspecialchars($p['category']); ?></td>
                                <td class="p-4 font-semibold"><?php echo htmlspecialchars($p['author']); ?></td>
                                <td class="p-4"><?php echo intval($p['read_time']); ?> mins</td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase border <?php echo ($p['status'] ?? 'published') === 'published' ? 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border-emerald-500/20' : 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border-amber-500/20'; ?>">
                                        <?php echo htmlspecialchars($p['status'] ?? 'published'); ?>
                                    </span>
                                </td>
                                <td class="p-4 text-slate-500 dark:text-slate-400"><?php echo date('d M Y', strtotime($p['created_at'])); ?></td>
                                <td class="p-4">
                                    <div class="flex items-center gap-3">
                                        <a href="../pages/blog-post.php?slug=<?php echo htmlspecialchars($p['slug']); ?>" target="_blank" class="text-amber-600 dark:text-amber-400 hover:underline font-bold flex items-center gap-1">
                                            View <i data-lucide="external-link" class="w-3 h-3"></i>
                                        </a>
                                        <form method="POST" action="blog.php" onsubmit="return confirm('Are you sure you want to delete this article?');" class="inline">
                                            <?php echo \AavivaCred\Security\Security::csrfField(); ?>
                                            <input type="hidden" name="action" value="delete_post">
                                            <input type="hidden" name="post_id" value="<?php echo $p['id']; ?>">
                                            <button type="submit" class="text-rose-500 hover:text-rose-400 font-bold">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) lucide.createIcons();

            const themeBtn = document.getElementById('theme-toggle');
            if (themeBtn) {
                themeBtn.addEventListener('click', () => {
                    const isDark = document.documentElement.classList.toggle('dark');
                    localStorage.setItem('admin_theme', isDark ? 'dark' : 'light');
                    if (window.lucide) lucide.createIcons();
                });
            }

            const quill = new Quill('#quill-editor-container', {
                theme: 'snow',
                placeholder: 'Write your detailed blog post here with headings, lists, links and formatting...',
                modules: {
                    toolbar: [
                        [{ 'header': [2, 3, 4, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['blockquote', 'code-block'],
                        ['link', 'image'],
                        ['clean']
                    ]
                }
            });

            const titleInput = document.getElementById('post-title');
            const slugInput = document.getElementById('post-slug');
            const readTimeInput = document.getElementById('post-read-time');
            const wordCountBadge = document.getElementById('word-count-badge');
            const imageUrlInput = document.getElementById('post-image-url');
            const imagePreview = document.getElementById('image-preview');
            const imagePlaceholder = document.getElementById('image-preview-placeholder');

            if (titleInput && slugInput) {
                titleInput.addEventListener('input', () => {
                    const slug = titleInput.value
                        .toLowerCase()
                        .trim()
                        .replace(/[^a-z0-9 -]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-');
                    slugInput.value = slug;
                });
            }

            quill.on('text-change', () => {
                const text = quill.getText().trim();
                const wordCount = text.length > 0 ? text.split(/\s+/).length : 0;
                const estimatedMins = Math.max(1, Math.ceil(wordCount / 200));
                
                wordCountBadge.innerText = `${wordCount} words • ~${estimatedMins} min read`;
                if (readTimeInput) {
                    readTimeInput.value = estimatedMins;
                }
            });

            if (imageUrlInput && imagePreview && imagePlaceholder) {
                imageUrlInput.addEventListener('input', () => {
                    const url = imageUrlInput.value.trim();
                    if (url) {
                        imagePreview.src = url;
                        imagePreview.classList.remove('hidden');
                        imagePlaceholder.classList.add('hidden');
                    } else {
                        imagePreview.src = '';
                        imagePreview.classList.add('hidden');
                        imagePlaceholder.classList.remove('hidden');
                    }
                });
            }

            const previewBtn = document.getElementById('preview-toggle-btn');
            const previewModal = document.getElementById('preview-modal');
            const closePreviewBtn = document.getElementById('close-preview-btn');

            if (previewBtn && previewModal) {
                previewBtn.addEventListener('click', () => {
                    document.getElementById('preview-title').innerText = titleInput.value || 'Untitled Article';
                    document.getElementById('preview-category').innerText = document.querySelector('select[name="category"]').value;
                    document.getElementById('preview-body').innerHTML = quill.root.innerHTML;
                    
                    const imgUrl = imageUrlInput.value;
                    const previewImg = document.getElementById('preview-image');
                    if (imgUrl) {
                        previewImg.src = imgUrl;
                        previewImg.parentElement.classList.remove('hidden');
                    } else {
                        previewImg.parentElement.classList.add('hidden');
                    }
                    
                    previewModal.classList.remove('hidden');
                    previewModal.classList.add('flex');
                });
            }

            if (closePreviewBtn && previewModal) {
                closePreviewBtn.addEventListener('click', () => {
                    previewModal.classList.add('hidden');
                    previewModal.classList.remove('flex');
                });
            }

            window.submitPostForm = function(statusValue) {
                const hiddenContent = document.getElementById('hidden-content-input');
                const statusInput = document.getElementById('post-status-input');
                const form = document.getElementById('blog-form');

                hiddenContent.value = quill.root.innerHTML;
                statusInput.value = statusValue;

                if (!titleInput.value.trim()) {
                    alert('Please enter an article title.');
                    titleInput.focus();
                    return;
                }

                if (quill.getText().trim().length === 0) {
                    alert('Please write article content before publishing.');
                    return;
                }

                form.submit();
            };
        });
    </script>
</body>
</html>
