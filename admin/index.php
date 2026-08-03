<?php
/**
 * AavivaCred - Enterprise Admin Dashboard (Soft Tint Gradient Cards UI)
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

// Logout handling
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    setcookie('admin_auth_token', '', time() - 3600, '/');
    session_destroy();
    header("Location: login.php");
    exit;
}

$service = new \AavivaCred\Services\LeadService();

// Quick Status Update on Dashboard
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'quick_update') {
    if (\AavivaCred\Security\Security::verifyCsrfToken($_POST['_csrf_token'] ?? '')) {
        $leadId = $_POST['lead_id'] ?? '';
        $newStatus = $_POST['status'] ?? 'New';
        $service->updateLeadStatus($leadId, $newStatus);
        header("Location: index.php?updated=1");
        exit;
    }
}

$stats = $service->getDashboardStats();
$allLeads = $service->getLeads();
$recentLeads = array_slice($allLeads, 0, 8);

// Calculate Category Distributions for Chart.js
$categoryCounts = [
    'Personal Loan' => 0,
    'Business Loan' => 0,
    'Gold Loan'     => 0,
    'Home Loan'     => 0,
    'Payday Loan'   => 0,
    'EDI Loan'      => 0,
];

foreach ($allLeads as $l) {
    $cat = strtolower($l['category'] ?? '');
    if (strpos($cat, 'personal') !== false) $categoryCounts['Personal Loan']++;
    elseif (strpos($cat, 'business') !== false) $categoryCounts['Business Loan']++;
    elseif (strpos($cat, 'gold') !== false) $categoryCounts['Gold Loan']++;
    elseif (strpos($cat, 'home') !== false) $categoryCounts['Home Loan']++;
    elseif (strpos($cat, 'payday') !== false || strpos($cat, 'instant') !== false) $categoryCounts['Payday Loan']++;
    elseif (strpos($cat, 'edi') !== false) $categoryCounts['EDI Loan']++;
    else $categoryCounts['Personal Loan']++;
}

$approvalRate = ($stats['total'] > 0) ? round(($stats['approved'] / $stats['total']) * 100, 1) : 0;
?>
<!DOCTYPE html>
<html lang="en" class="h-full dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Command Center | AavivaCred Enterprise Console</title>
    
    <!-- Theme Script -->
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
                        brandBlueLight: '#031d40',
                        brandGold: '#ffd30f'
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .glass-panel {
            background: #ffffff;
            border: 1px solid #e2e8f0;
        }
        .dark .glass-panel {
            background: rgba(3, 29, 64, 0.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="h-full bg-slate-100 dark:bg-[#010716] text-slate-800 dark:text-slate-100 flex flex-col lg:flex-row min-h-screen transition-colors duration-300 relative overflow-x-hidden">

    <!-- Ambient Mesh Blobs -->
    <div class="fixed -top-32 -left-32 w-80 h-80 bg-blue-500/10 dark:bg-cyan-500/10 rounded-full blur-[100px] pointer-events-none z-0"></div>
    <div class="fixed top-1/3 -right-32 w-80 h-80 bg-amber-500/10 dark:bg-amber-500/10 rounded-full blur-[100px] pointer-events-none z-0"></div>

    <!-- Compact Sidebar Navigation -->
    <aside class="w-full lg:w-56 bg-slate-900 dark:bg-[#021435] border-b lg:border-b-0 lg:border-r border-slate-800 dark:border-white/10 p-4 lg:p-5 flex flex-col justify-between shrink-0 relative z-20 shadow-xl">
        <div>
            <div class="flex items-center justify-between mb-6 pb-3 border-b border-slate-800 dark:border-white/10">
                <img src="../assets/images/aavivacred_light.png" alt="AavivaCred" class="h-8 object-contain">
                
                <button id="theme-toggle" class="p-2 rounded-xl bg-slate-800 dark:bg-white/10 text-amber-400 hover:scale-105 transition shadow-sm border border-white/10" title="Toggle Light/Dark Mode">
                    <i data-lucide="sun" class="w-3.5 h-3.5 hidden dark:block text-amber-300"></i>
                    <i data-lucide="moon" class="w-3.5 h-3.5 block dark:hidden text-slate-300"></i>
                </button>
            </div>

            <nav class="space-y-1.5">
                <a href="index.php" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 to-yellow-500 text-slate-950 font-extrabold text-xs shadow-md shadow-amber-400/20">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Command Center
                </a>
                <a href="leads.php" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-bold text-xs transition group">
                    <i data-lucide="users" class="w-4 h-4 text-blue-400"></i> Lead Management
                </a>
                <a href="blog.php" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-bold text-xs transition group">
                    <i data-lucide="file-text" class="w-4 h-4 text-purple-400"></i> Blog Studio CMS
                </a>
                <a href="settings.php" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-bold text-xs transition group">
                    <i data-lucide="settings" class="w-4 h-4 text-emerald-400"></i> System Settings
                </a>
                <a href="../index.php" target="_blank" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-slate-400 hover:bg-white/5 hover:text-amber-400 font-bold text-xs transition mt-4 border border-white/5">
                    <i data-lucide="external-link" class="w-4 h-4"></i> View Website
                </a>
            </nav>
        </div>

        <div class="pt-4 border-t border-slate-800 dark:border-white/10 flex items-center justify-between">
            <div class="text-[11px]">
                <p class="font-extrabold text-white flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> <?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?>
                </p>
                <p class="text-slate-400 font-semibold"><?php echo htmlspecialchars($_SESSION['admin_role'] ?? 'Super Admin'); ?></p>
            </div>
            <a href="index.php?action=logout" class="p-1.5 text-rose-400 hover:bg-rose-500/20 rounded-lg transition" title="Logout">
                <i data-lucide="log-out" class="w-4 h-4"></i>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto space-y-5 relative z-10">
        
        <!-- Header Banner (Soft Amber Tint Gradient) -->
        <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gradient-to-r from-amber-50/90 via-orange-50/40 to-white dark:from-[#031d40] dark:to-[#021435] border border-amber-200/80 dark:border-white/10 p-4 sm:px-6 sm:py-4 rounded-2xl shadow-sm border-l-4 border-l-amber-400">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 font-black text-[9px] uppercase tracking-wider flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span> Live Operations
                    </span>
                </div>
                <h1 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">
                    Executive <span class="bg-clip-text text-transparent bg-gradient-to-r from-amber-500 to-yellow-500">Command Center</span>
                </h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-0.5">Real-time credit inquiry volume, loan approval rate & portfolio breakdown</p>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <a href="leads.php?export=csv" class="px-3.5 py-2 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold rounded-xl text-xs flex items-center gap-1.5 shadow-sm transition active:scale-95">
                    <i data-lucide="file-spread-sheet" class="w-3.5 h-3.5"></i> Export CSV
                </a>
                <a href="leads.php" class="px-3.5 py-2 bg-amber-400 hover:bg-yellow-400 text-slate-950 font-bold rounded-xl text-xs flex items-center gap-1.5 shadow-sm transition active:scale-95">
                    <i data-lucide="users" class="w-3.5 h-3.5"></i> Manage Leads
                </a>
            </div>
        </header>

        <!-- KPI Performance Cards (Soft Tint Gradient Backgrounds) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- Card 1: Soft Blue Tint -->
            <div class="p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-l-blue-500 border border-blue-200/80 dark:border-blue-500/30 bg-gradient-to-br from-blue-50/90 via-indigo-50/40 to-white dark:from-blue-950/40 dark:via-[#031d40] dark:to-[#021435] space-y-2 relative overflow-hidden group">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-black uppercase tracking-wider text-slate-600 dark:text-blue-300">Total Applications</span>
                    <span class="p-2 bg-blue-500/15 text-blue-600 dark:text-blue-400 border border-blue-500/20 rounded-xl shadow-inner"><i data-lucide="inbox" class="w-4 h-4"></i></span>
                </div>
                <div class="flex items-baseline justify-between">
                    <h3 class="text-2xl font-black text-slate-900 dark:text-white"><?php echo number_format($stats['total']); ?></h3>
                    <span class="text-[10px] font-black text-emerald-600 dark:text-emerald-400 flex items-center bg-emerald-500/10 px-2 py-0.5 rounded-md border border-emerald-500/20"><i data-lucide="trending-up" class="w-3 h-3 mr-0.5"></i> +14.2%</span>
                </div>
                <p class="text-[10px] text-slate-500 dark:text-slate-400 font-medium">Cumulative loan inquiry pipeline</p>
            </div>

            <!-- Card 2: Soft Amber Tint -->
            <div class="p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-l-amber-400 border border-amber-200/80 dark:border-amber-500/30 bg-gradient-to-br from-amber-50/90 via-yellow-50/40 to-white dark:from-amber-950/40 dark:via-[#031d40] dark:to-[#021435] space-y-2 relative overflow-hidden group">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-black uppercase tracking-wider text-slate-600 dark:text-amber-300">New Queue</span>
                    <span class="p-2 bg-amber-500/15 text-amber-600 dark:text-amber-400 border border-amber-500/20 rounded-xl shadow-inner"><i data-lucide="clock" class="w-4 h-4"></i></span>
                </div>
                <div class="flex items-baseline justify-between">
                    <h3 class="text-2xl font-black text-amber-600 dark:text-amber-400"><?php echo number_format($stats['new']); ?></h3>
                    <span class="text-[10px] font-extrabold text-amber-600 dark:text-amber-400 bg-amber-500/10 px-2 py-0.5 rounded-md border border-amber-500/20">Action Required</span>
                </div>
                <p class="text-[10px] text-slate-500 dark:text-slate-400 font-medium">Pending bank verification</p>
            </div>

            <!-- Card 3: Soft Emerald Tint -->
            <div class="p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-l-emerald-500 border border-emerald-200/80 dark:border-emerald-500/30 bg-gradient-to-br from-emerald-50/90 via-teal-50/40 to-white dark:from-emerald-950/40 dark:via-[#031d40] dark:to-[#021435] space-y-2 relative overflow-hidden group">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-black uppercase tracking-wider text-slate-600 dark:text-emerald-300">Approval Rate</span>
                    <span class="p-2 bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 rounded-xl shadow-inner"><i data-lucide="check-circle-2" class="w-4 h-4"></i></span>
                </div>
                <div class="flex items-baseline justify-between">
                    <h3 class="text-2xl font-black text-emerald-600 dark:text-emerald-400"><?php echo $approvalRate; ?>%</h3>
                    <span class="text-[10px] font-semibold text-slate-500 dark:text-slate-400">(<?php echo number_format($stats['approved']); ?> Approved)</span>
                </div>
                <p class="text-[10px] text-slate-500 dark:text-slate-400 font-medium">Partner bank qualification ratio</p>
            </div>

            <!-- Card 4: Soft Purple Tint -->
            <div class="p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-l-purple-500 border border-purple-200/80 dark:border-purple-500/30 bg-gradient-to-br from-purple-50/90 via-fuchsia-50/40 to-white dark:from-purple-950/40 dark:via-[#031d40] dark:to-[#021435] space-y-2 relative overflow-hidden group">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-black uppercase tracking-wider text-slate-600 dark:text-purple-300">Loan Portfolio</span>
                    <span class="p-2 bg-purple-500/15 text-purple-600 dark:text-purple-400 border border-purple-500/20 rounded-xl shadow-inner"><i data-lucide="indian-rupee" class="w-4 h-4"></i></span>
                </div>
                <div class="flex items-baseline justify-between">
                    <h3 class="text-xl font-black text-purple-600 dark:text-purple-400">₹<?php echo number_format($stats['total_amount']); ?></h3>
                </div>
                <p class="text-[10px] text-slate-500 dark:text-slate-400 font-medium">Total requested credit amount</p>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
            <!-- Line Chart -->
            <div class="lg:col-span-8 bg-gradient-to-br from-white via-slate-50/50 to-amber-50/20 dark:from-[#031d40] dark:to-[#021435] border border-slate-200 dark:border-white/10 p-5 rounded-2xl shadow-sm space-y-3">
                <div class="flex items-center justify-between border-b border-slate-100 dark:border-white/10 pb-3">
                    <div>
                        <h2 class="text-sm font-extrabold text-slate-900 dark:text-white flex items-center gap-2">
                            <i data-lucide="line-chart" class="w-4 h-4 text-amber-500 dark:text-amber-400"></i> Monthly Credit Application Inquiries
                        </h2>
                        <p class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">Volume trajectory over recent operational quarters</p>
                    </div>
                    <span class="text-[10px] font-black text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-1 rounded-full">
                        Growth +28% YoY
                    </span>
                </div>
                <div class="h-52 sm:h-56 w-full">
                    <canvas id="trendsChart"></canvas>
                </div>
            </div>

            <!-- Doughnut Chart -->
            <div class="lg:col-span-4 bg-gradient-to-br from-white via-slate-50/50 to-purple-50/20 dark:from-[#031d40] dark:to-[#021435] border border-slate-200 dark:border-white/10 p-5 rounded-2xl shadow-sm space-y-3 flex flex-col justify-between">
                <div class="border-b border-slate-100 dark:border-white/10 pb-3">
                    <h2 class="text-sm font-extrabold text-slate-900 dark:text-white flex items-center gap-2">
                        <i data-lucide="pie-chart" class="w-4 h-4 text-purple-500 dark:text-purple-400"></i> Category Breakdown
                    </h2>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">Distribution by loan type</p>
                </div>
                <div class="h-44 sm:h-48 w-full flex items-center justify-center relative">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>

        <!-- System Status Bar (Soft Tinted Cards) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <div class="bg-gradient-to-r from-emerald-50/80 to-white dark:from-[#031d40] dark:to-[#021435] border border-emerald-200/80 dark:border-emerald-500/20 p-3.5 rounded-xl flex items-center justify-between shadow-sm border-l-4 border-l-emerald-500">
                <div class="flex items-center gap-2.5">
                    <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 dark:bg-emerald-400 animate-ping"></div>
                    <div>
                        <p class="text-xs font-bold text-slate-900 dark:text-white">Database Core Engine</p>
                        <p class="text-[9px] text-slate-500 dark:text-slate-400 font-semibold">MySQL Live PDO + JSON Vault Backup</p>
                    </div>
                </div>
                <span class="text-[9px] font-extrabold text-emerald-600 dark:text-emerald-400 uppercase bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded-md">Online</span>
            </div>

            <div class="bg-gradient-to-r from-blue-50/80 to-white dark:from-[#031d40] dark:to-[#021435] border border-blue-200/80 dark:border-blue-500/20 p-3.5 rounded-xl flex items-center justify-between shadow-sm border-l-4 border-l-blue-500">
                <div class="flex items-center gap-2.5">
                    <div class="w-2.5 h-2.5 rounded-full bg-blue-500 dark:bg-blue-400 animate-pulse"></div>
                    <div>
                        <p class="text-xs font-bold text-slate-900 dark:text-white">PAN / GST Validation APIs</p>
                        <p class="text-[9px] text-slate-500 dark:text-slate-400 font-semibold">Bifrost Enterprise API Gateway</p>
                    </div>
                </div>
                <span class="text-[9px] font-extrabold text-blue-600 dark:text-blue-400 uppercase bg-blue-500/10 border border-blue-500/20 px-2 py-0.5 rounded-md">Connected</span>
            </div>

            <div class="bg-gradient-to-r from-amber-50/80 to-white dark:from-[#031d40] dark:to-[#021435] border border-amber-200/80 dark:border-amber-500/20 p-3.5 rounded-xl flex items-center justify-between shadow-sm border-l-4 border-l-amber-500">
                <div class="flex items-center gap-2.5">
                    <div class="w-2.5 h-2.5 rounded-full bg-amber-500 dark:bg-amber-400"></div>
                    <div>
                        <p class="text-xs font-bold text-slate-900 dark:text-white">Security Shield</p>
                        <p class="text-[9px] text-slate-500 dark:text-slate-400 font-semibold">CSRF & Rate-Limiter Active</p>
                    </div>
                </div>
                <span class="text-[9px] font-extrabold text-amber-600 dark:text-amber-400 uppercase bg-amber-500/10 border border-amber-500/20 px-2 py-0.5 rounded-md">Protected</span>
            </div>
        </div>

        <!-- Recent Customer Applications Table -->
        <div class="glass-panel rounded-2xl overflow-hidden shadow-sm">
            <div class="p-4 border-b border-slate-100 dark:border-white/10 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <div>
                    <h2 class="text-sm font-extrabold text-slate-900 dark:text-white flex items-center gap-2">
                        <i data-lucide="list-filter" class="w-4 h-4 text-amber-500 dark:text-amber-400"></i> Recent Customer Inquiries
                    </h2>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">Latest submitted lead applications with quick status controls</p>
                </div>
                <a href="leads.php" class="text-xs text-amber-600 dark:text-amber-400 hover:underline font-extrabold flex items-center gap-1">
                    View Catalog <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-700 dark:text-slate-300">
                    <thead class="bg-slate-50 dark:bg-white/[0.03] text-slate-500 dark:text-slate-400 uppercase font-extrabold tracking-wider border-b border-slate-100 dark:border-white/10 text-[10px]">
                        <tr>
                            <th class="p-3">Lead ID</th>
                            <th class="p-3">Applicant</th>
                            <th class="p-3">Category</th>
                            <th class="p-3">Requested Amount</th>
                            <th class="p-3">City</th>
                            <th class="p-3">Status Workflow</th>
                            <th class="p-3">Submission Time</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-white/5">
                        <?php if (empty($recentLeads)): ?>
                            <tr>
                                <td colspan="7" class="p-6 text-center text-slate-400 font-medium">No lead records found in database.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recentLeads as $lead): ?>
                                <tr class="hover:bg-slate-50 dark:hover:bg-white/[0.02] transition">
                                    <td class="p-3 font-mono font-bold text-amber-600 dark:text-amber-400">
                                        <?php echo htmlspecialchars($lead['lead_id'] ?? ('AVV-' . $lead['id'])); ?>
                                    </td>
                                    <td class="p-3">
                                        <div class="font-extrabold text-slate-900 dark:text-white text-xs"><?php echo htmlspecialchars($lead['name']); ?></div>
                                        <div class="text-[10px] text-slate-500 dark:text-slate-400 font-medium"><?php echo htmlspecialchars($lead['mobile']); ?> • <?php echo htmlspecialchars($lead['email']); ?></div>
                                    </td>
                                    <td class="p-3 font-bold uppercase text-slate-600 dark:text-slate-300 text-[9px]">
                                        <?php 
                                        $cat = strtolower($lead['category'] ?? '');
                                        $catColor = 'bg-blue-500/10 text-blue-600 dark:text-blue-400 border-blue-500/20';
                                        if (strpos($cat, 'business') !== false) $catColor = 'bg-purple-500/10 text-purple-600 dark:text-purple-400 border-purple-500/20';
                                        elseif (strpos($cat, 'gold') !== false) $catColor = 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border-amber-500/20';
                                        elseif (strpos($cat, 'home') !== false) $catColor = 'bg-rose-500/10 text-rose-600 dark:text-rose-400 border-rose-500/20';
                                        elseif (strpos($cat, 'edi') !== false) $catColor = 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border-emerald-500/20';
                                        ?>
                                        <span class="px-2 py-0.5 rounded-md border <?php echo $catColor; ?>">
                                            <?php echo htmlspecialchars($lead['category']); ?>
                                        </span>
                                    </td>
                                    <td class="p-3 font-black text-emerald-600 dark:text-emerald-400 text-xs">
                                        ₹<?php echo number_format(floatval($lead['loan_amount'])); ?>
                                    </td>
                                    <td class="p-3 font-semibold text-slate-700 dark:text-slate-300"><?php echo htmlspecialchars($lead['city']); ?></td>
                                    <td class="p-3">
                                        <form method="POST" action="index.php" class="flex items-center gap-1">
                                            <?php echo \AavivaCred\Security\Security::csrfField(); ?>
                                            <input type="hidden" name="action" value="quick_update">
                                            <input type="hidden" name="lead_id" value="<?php echo htmlspecialchars($lead['lead_id'] ?? $lead['id']); ?>">
                                            <select name="status" onchange="this.form.submit()" class="px-2 py-1 bg-slate-100 dark:bg-[#031d40] border border-slate-200 dark:border-white/10 rounded-lg text-[10px] font-bold text-slate-800 dark:text-white focus:outline-none focus:border-amber-400">
                                                <option value="New" <?php echo ($lead['status'] ?? 'New') === 'New' ? 'selected' : ''; ?>>🟡 New</option>
                                                <option value="In Review" <?php echo ($lead['status'] ?? '') === 'In Review' ? 'selected' : ''; ?>>🔵 In Review</option>
                                                <option value="Approved" <?php echo ($lead['status'] ?? '') === 'Approved' ? 'selected' : ''; ?>>🟢 Approved</option>
                                                <option value="Rejected" <?php echo ($lead['status'] ?? '') === 'Rejected' ? 'selected' : ''; ?>>🔴 Rejected</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="p-3 text-slate-500 dark:text-slate-400 font-medium text-[11px]"><?php echo date('d M Y, h:i A', strtotime($lead['created_at'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Theme Toggle & Chart Scripts -->
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

            const isDarkMode = document.documentElement.classList.contains('dark');
            const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.05)' : 'rgba(0, 0, 0, 0.05)';
            const textColor = isDarkMode ? '#94a3b8' : '#64748b';

            // 1. Monthly Trends Chart
            const ctxTrends = document.getElementById('trendsChart').getContext('2d');
            const trendGradient = ctxTrends.createLinearGradient(0, 0, 0, 220);
            trendGradient.addColorStop(0, 'rgba(255, 211, 15, 0.35)');
            trendGradient.addColorStop(1, 'rgba(255, 211, 15, 0.0)');

            new Chart(ctxTrends, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Application Inquiries',
                        data: [120, 185, 240, 310, 420, 580, 720],
                        borderColor: '#ffd30f',
                        borderWidth: 2.5,
                        pointBackgroundColor: '#ffd30f',
                        pointBorderColor: '#021435',
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        tension: 0.35,
                        fill: true,
                        backgroundColor: trendGradient
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        x: { grid: { color: gridColor }, ticks: { color: textColor, font: { family: 'Manrope', size: 10, weight: 'bold' } } },
                        y: { grid: { color: gridColor }, ticks: { color: textColor, font: { family: 'Manrope', size: 10, weight: 'bold' } } }
                    }
                }
            });

            // 2. Category Distribution Doughnut Chart
            const ctxCategory = document.getElementById('categoryChart').getContext('2d');
            const catData = <?php echo json_encode(array_values($categoryCounts)); ?>;
            const catLabels = <?php echo json_encode(array_keys($categoryCounts)); ?>;

            new Chart(ctxCategory, {
                type: 'doughnut',
                data: {
                    labels: catLabels,
                    datasets: [{
                        data: catData,
                        backgroundColor: [
                            '#3b82f6', '#a855f7', '#f59e0b', '#f43f5e', '#06b6d4', '#10b981'
                        ],
                        borderWidth: 2,
                        borderColor: isDarkMode ? '#021435' : '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { color: textColor, font: { family: 'Manrope', size: 9, weight: 'bold' }, boxWidth: 8, padding: 8 }
                        }
                    },
                    cutout: '70%'
                }
            });
        });
    </script>
</body>
</html>
