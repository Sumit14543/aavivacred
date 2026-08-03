<?php
/**
 * AavivaCred - Enterprise System Settings Console (Dual Theme: Light & Dark Mode)
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

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (\AavivaCred\Security\Security::verifyCsrfToken($_POST['_csrf_token'] ?? '')) {
        $message = 'System configuration parameters updated successfully.';
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-full dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Settings | AavivaCred Enterprise Admin</title>

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
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Manrope', sans-serif; }</style>
</head>
<body class="h-full bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 flex flex-col lg:flex-row min-h-screen transition-colors duration-300">

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
                <a href="blog.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-semibold text-sm transition">
                    <i data-lucide="file-text" class="w-4 h-4"></i> Blog CMS
                </a>
                <a href="settings.php" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-amber-400 text-slate-950 font-bold text-sm shadow-lg shadow-amber-400/20">
                    <i data-lucide="settings" class="w-4 h-4"></i> System Settings
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

    <main class="flex-1 p-6 lg:p-10 overflow-y-auto">
        <header class="mb-8">
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight">Enterprise System Settings</h1>
            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 font-semibold mt-1">Configure company credentials, API endpoints & notification templates</p>
        </header>

        <?php if ($message): ?>
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-xl text-xs font-bold flex items-center gap-2">
                <i data-lucide="check-circle-2" class="w-4 h-4"></i> <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="settings.php" class="space-y-6 max-w-3xl">
            <?php echo \AavivaCred\Security\Security::csrfField(); ?>
            <div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 p-6 rounded-3xl shadow-lg dark:shadow-2xl space-y-4">
                <h2 class="text-sm font-extrabold uppercase tracking-wider text-amber-600 dark:text-amber-400 flex items-center gap-2">
                    <i data-lucide="building" class="w-4 h-4"></i> Company Information
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Company Name</label>
                        <input type="text" name="company_name" value="<?php echo SITE_NAME; ?>" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-semibold text-slate-900 dark:text-white focus:outline-none focus:border-amber-400">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Support Email</label>
                        <input type="email" name="site_email" value="<?php echo SITE_EMAIL; ?>" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-semibold text-slate-900 dark:text-white focus:outline-none focus:border-amber-400">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Support Phone</label>
                        <input type="text" name="site_phone" value="<?php echo SITE_PHONE; ?>" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-semibold text-slate-900 dark:text-white focus:outline-none focus:border-amber-400">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Corporate Address</label>
                        <input type="text" name="site_address" value="<?php echo SITE_ADDRESS; ?>" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-semibold text-slate-900 dark:text-white focus:outline-none focus:border-amber-400">
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 p-6 rounded-3xl shadow-lg dark:shadow-2xl space-y-4">
                <h2 class="text-sm font-extrabold uppercase tracking-wider text-amber-600 dark:text-amber-400 flex items-center gap-2">
                    <i data-lucide="shield-check" class="w-4 h-4"></i> Security & Limits
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Rate Limit (Requests / 10 Mins)</label>
                        <input type="number" value="10" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-semibold text-slate-900 dark:text-white focus:outline-none focus:border-amber-400">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Session Lifetime (Seconds)</label>
                        <input type="number" value="7200" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-semibold text-slate-900 dark:text-white focus:outline-none focus:border-amber-400">
                    </div>
                </div>
            </div>

            <button type="submit" class="px-6 py-3 bg-amber-400 text-slate-950 font-bold rounded-xl text-xs hover:bg-amber-300 transition shadow-lg shadow-amber-400/20">
                Save System Settings
            </button>
        </form>
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
        });
    </script>
</body>
</html>
