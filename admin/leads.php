<?php
/**
 * AavivaCred - Enterprise Lead Management Console with Bulk Dispatch Studio
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

$service = new \AavivaCred\Services\LeadService();
$message = '';

// Handle Bulk Assignment Action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'bulk_assign') {
    if (\AavivaCred\Security\Security::verifyCsrfToken($_POST['_csrf_token'] ?? '')) {
        $selectedLeads = $_POST['selected_leads'] ?? [];
        $assignee = trim($_POST['assignee'] ?? '');
        $customAssignee = trim($_POST['custom_assignee'] ?? '');
        $finalAssignee = !empty($customAssignee) ? $customAssignee : $assignee;

        if (!empty($selectedLeads) && !empty($finalAssignee)) {
            $service->assignLeads($selectedLeads, $finalAssignee);
            $message = count($selectedLeads) . " leads successfully dispatched/assigned to '" . htmlspecialchars($finalAssignee) . "'.";
        }
    }
}

// Handle Bulk Export to CSV
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'bulk_export_csv') {
    if (\AavivaCred\Security\Security::verifyCsrfToken($_POST['_csrf_token'] ?? '')) {
        $selectedIds = $_POST['selected_leads'] ?? [];
        $allLeads = $service->getLeads();
        $filtered = array_filter($allLeads, function($l) use ($selectedIds) {
            $id = $l['lead_id'] ?? $l['id'];
            return in_array($id, $selectedIds);
        });

        if (empty($filtered)) {
            $filtered = $allLeads;
        }

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=aavivacred_selected_leads_' . date('Y-m-d_H-i') . '.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, ['Lead ID', 'Name', 'Email', 'Mobile', 'Category', 'City', 'Loan Amount', 'Employment Type', 'Monthly Income', 'PAN Number', 'Aadhaar Number', 'Udyam Number', 'GSTIN Number', 'Bank Name', 'IFSC Code', 'Account Number', 'Status', 'Assigned To', 'Submitted At']);
        foreach ($filtered as $lead) {
            fputcsv($output, [
                $lead['lead_id'] ?? ('AVV-' . $lead['id']),
                $lead['name'] ?? '',
                $lead['email'] ?? '',
                $lead['mobile'] ?? '',
                $lead['category'] ?? '',
                $lead['city'] ?? '',
                $lead['loan_amount'] ?? 0,
                $lead['employment_type'] ?? '',
                $lead['monthly_income'] ?? 0,
                $lead['pan_number'] ?? '',
                $lead['aadhaar_number'] ?? '',
                $lead['udyam_number'] ?? '',
                $lead['gst_number'] ?? '',
                $lead['bank_name'] ?? '',
                $lead['ifsc_code'] ?? '',
                $lead['account_number'] ?? '',
                $lead['status'] ?? 'New',
                $lead['assigned_to'] ?? 'Unassigned',
                $lead['created_at'] ?? ''
            ]);
        }
        fclose($output);
        exit;
    }
}

// Handle Single Status Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_status') {
    if (\AavivaCred\Security\Security::verifyCsrfToken($_POST['_csrf_token'] ?? '')) {
        $leadId = $_POST['lead_id'] ?? '';
        $newStatus = $_POST['status'] ?? 'New';
        $service->updateLeadStatus($leadId, $newStatus);
        header("Location: leads.php?updated=1");
        exit;
    }
}

// Global Export to CSV
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    $leads = $service->getLeads();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=aavivacred_all_leads_' . date('Y-m-d_H-i') . '.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Lead ID', 'Name', 'Email', 'Mobile', 'Category', 'City', 'Loan Amount', 'Employment Type', 'Monthly Income', 'PAN Number', 'Aadhaar Number', 'Udyam Number', 'GSTIN Number', 'Bank Name', 'IFSC Code', 'Account Number', 'Status', 'Assigned To', 'Submitted At']);
    foreach ($leads as $lead) {
        fputcsv($output, [
            $lead['lead_id'] ?? ('AVV-' . $lead['id']),
            $lead['name'] ?? '',
            $lead['email'] ?? '',
            $lead['mobile'] ?? '',
            $lead['category'] ?? '',
            $lead['city'] ?? '',
            $lead['loan_amount'] ?? 0,
            $lead['employment_type'] ?? '',
            $lead['monthly_income'] ?? 0,
            $lead['pan_number'] ?? '',
            $lead['aadhaar_number'] ?? '',
            $lead['udyam_number'] ?? '',
            $lead['gst_number'] ?? '',
            $lead['bank_name'] ?? '',
            $lead['ifsc_code'] ?? '',
            $lead['account_number'] ?? '',
            $lead['status'] ?? 'New',
            $lead['assigned_to'] ?? 'Unassigned',
            $lead['created_at'] ?? ''
        ]);
    }
    fclose($output);
    exit;
}

$search     = trim($_GET['search'] ?? '');
$category   = trim($_GET['category'] ?? '');
$status     = trim($_GET['status'] ?? '');
$assignedTo = trim($_GET['assigned_to'] ?? '');

$leads = $service->getLeads($search, $category, $status, $assignedTo);
?>
<!DOCTYPE html>
<html lang="en" class="h-full dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Management & Dispatch Studio | AavivaCred Enterprise Admin</title>

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
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Manrope', sans-serif; }</style>
</head>
<body class="h-full bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 flex flex-col lg:flex-row min-h-screen transition-colors duration-300 relative">

    <aside class="w-full lg:w-56 bg-slate-900 dark:bg-[#021435] border-b lg:border-b-0 lg:border-r border-slate-800 dark:border-white/10 p-5 flex flex-col justify-between shrink-0">
        <div>
            <div class="flex items-center justify-between mb-6 pb-3 border-b border-slate-800 dark:border-white/10">
                <img src="../assets/images/aavivacred_light.png" alt="AavivaCred" class="h-8 object-contain">
                <button id="theme-toggle" class="p-2 rounded-xl bg-slate-800 dark:bg-white/10 text-amber-400 hover:scale-105 transition shadow" title="Toggle Light/Dark Mode">
                    <i data-lucide="sun" class="w-4 h-4 hidden dark:block"></i>
                    <i data-lucide="moon" class="w-4 h-4 block dark:hidden text-slate-300"></i>
                </button>
            </div>

            <nav class="space-y-1.5">
                <a href="index.php" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-bold text-xs transition">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Command Center
                </a>
                <a href="leads.php" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl bg-amber-400 text-slate-950 font-extrabold text-xs shadow-md shadow-amber-400/20">
                    <i data-lucide="users" class="w-4 h-4"></i> Lead Management
                </a>
                <a href="blog.php" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-bold text-xs transition">
                    <i data-lucide="file-text" class="w-4 h-4"></i> Blog Studio CMS
                </a>
                <a href="settings.php" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl text-slate-300 hover:bg-white/5 hover:text-white font-bold text-xs transition">
                    <i data-lucide="settings" class="w-4 h-4"></i> System Settings
                </a>
            </nav>
        </div>

        <div class="pt-4 border-t border-slate-800 dark:border-white/10 flex items-center justify-between">
            <div class="text-xs">
                <p class="font-extrabold text-white"><?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?></p>
                <p class="text-slate-400 font-semibold"><?php echo htmlspecialchars($_SESSION['admin_role'] ?? 'Super Admin'); ?></p>
            </div>
            <a href="index.php?action=logout" class="p-2 text-rose-400 hover:bg-rose-500/10 rounded-lg transition" title="Logout">
                <i data-lucide="log-out" class="w-5 h-5"></i>
            </a>
        </div>
    </aside>

    <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto pb-24">
        <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <div>
                <h1 class="text-xl sm:text-2xl font-black text-slate-900 dark:text-white tracking-tight">Lead Portal & Bulk Dispatch Studio</h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-0.5">Select multiple leads, assign to bank partners/agents & filter by assignment status</p>
            </div>
            <div>
                <a href="leads.php?export=csv" class="px-3.5 py-2 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold rounded-xl text-xs flex items-center gap-1.5 shadow-sm transition">
                    <i data-lucide="file-spread-sheet" class="w-3.5 h-3.5"></i> Export All CSV
                </a>
            </div>
        </header>

        <?php if ($message): ?>
            <div class="mb-5 p-3.5 bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-xl text-xs font-bold flex items-center gap-2 shadow-sm">
                <i data-lucide="check-circle-2" class="w-4 h-4"></i> <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <!-- Advanced Filters Bar with Clear Labels & Wording -->
        <form method="GET" action="leads.php" class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 p-4 rounded-2xl mb-6 shadow-sm">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-3 items-end">
                
                <!-- Search Box -->
                <div class="md:col-span-4 space-y-1">
                    <label class="block text-[10px] font-black uppercase tracking-wider text-slate-500 dark:text-slate-400">Search Applicant / Lead ID / Mobile</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-slate-400">
                            <i data-lucide="search" class="w-3.5 h-3.5"></i>
                        </span>
                        <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search by name, mobile, email, PAN..." class="w-full pl-9 pr-3 py-2 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-xs font-bold text-slate-800 dark:text-white placeholder-slate-400 focus:outline-none focus:border-amber-400">
                    </div>
                </div>

                <!-- Partner Assignment Filter -->
                <div class="md:col-span-3 space-y-1">
                    <label class="block text-[10px] font-black uppercase tracking-wider text-slate-500 dark:text-slate-400">Partner Assignment</label>
                    <select name="assigned_to" class="w-full px-3 py-2 bg-slate-50 dark:bg-[#031d40] border border-slate-200 dark:border-white/10 rounded-xl text-xs font-bold text-slate-800 dark:text-white focus:outline-none focus:border-amber-400">
                        <option value="">All Assignments (Show All)</option>
                        <option value="unassigned" <?php echo $assignedTo === 'unassigned' ? 'selected' : ''; ?>>⚠️ Unassigned Only</option>
                        <option value="HDFC Bank DSA Desk" <?php echo $assignedTo === 'HDFC Bank DSA Desk' ? 'selected' : ''; ?>>🏦 HDFC Bank DSA</option>
                        <option value="ICICI Bank Business Desk" <?php echo $assignedTo === 'ICICI Bank Business Desk' ? 'selected' : ''; ?>>🏦 ICICI Bank Desk</option>
                        <option value="Bajaj Finance Team" <?php echo $assignedTo === 'Bajaj Finance Team' ? 'selected' : ''; ?>>🏦 Bajaj Finance</option>
                        <option value="Axis Bank Processing Desk" <?php echo $assignedTo === 'Axis Bank Processing Desk' ? 'selected' : ''; ?>>🏦 Axis Bank Desk</option>
                        <option value="Field Executive 1 (North)" <?php echo $assignedTo === 'Field Executive 1 (North)' ? 'selected' : ''; ?>>👤 Executive 1 (North)</option>
                        <option value="Field Executive 2 (South)" <?php echo $assignedTo === 'Field Executive 2 (South)' ? 'selected' : ''; ?>>👤 Executive 2 (South)</option>
                    </select>
                </div>

                <!-- Loan Product Filter -->
                <div class="md:col-span-2 space-y-1">
                    <label class="block text-[10px] font-black uppercase tracking-wider text-slate-500 dark:text-slate-400">Loan Product</label>
                    <select name="category" class="w-full px-3 py-2 bg-slate-50 dark:bg-[#031d40] border border-slate-200 dark:border-white/10 rounded-xl text-xs font-bold text-slate-800 dark:text-white focus:outline-none focus:border-amber-400">
                        <option value="">All Loan Products</option>
                        <option value="personal" <?php echo $category === 'personal' ? 'selected' : ''; ?>>Personal Loan</option>
                        <option value="business" <?php echo $category === 'business' ? 'selected' : ''; ?>>Business Loan</option>
                        <option value="gold" <?php echo $category === 'gold' ? 'selected' : ''; ?>>Gold Loan</option>
                        <option value="home" <?php echo $category === 'home' ? 'selected' : ''; ?>>Home Loan</option>
                        <option value="payday" <?php echo $category === 'payday' ? 'selected' : ''; ?>>Payday Loan</option>
                        <option value="edi" <?php echo $category === 'edi' ? 'selected' : ''; ?>>EDI Loan</option>
                    </select>
                </div>

                <!-- Lead Status Filter -->
                <div class="md:col-span-2 space-y-1">
                    <label class="block text-[10px] font-black uppercase tracking-wider text-slate-500 dark:text-slate-400">Lead Status</label>
                    <select name="status" class="w-full px-3 py-2 bg-slate-50 dark:bg-[#031d40] border border-slate-200 dark:border-white/10 rounded-xl text-xs font-bold text-slate-800 dark:text-white focus:outline-none focus:border-amber-400">
                        <option value="">All Statuses</option>
                        <option value="New" <?php echo $status === 'New' ? 'selected' : ''; ?>>New</option>
                        <option value="In Review" <?php echo $status === 'In Review' ? 'selected' : ''; ?>>In Review</option>
                        <option value="Approved" <?php echo $status === 'Approved' ? 'selected' : ''; ?>>Approved</option>
                        <option value="Rejected" <?php echo $status === 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                    </select>
                </div>

                <!-- Filter Submit Button -->
                <div class="md:col-span-1">
                    <button type="submit" class="w-full py-2 bg-amber-400 hover:bg-yellow-400 text-slate-950 font-black rounded-xl text-xs transition shadow-md flex items-center justify-center gap-1">
                        <i data-lucide="filter" class="w-3.5 h-3.5"></i> Apply
                    </button>
                </div>

            </div>
        </form>

        <!-- Main Form for Bulk Operations -->
        <form id="bulk-leads-form" method="POST" action="leads.php">
            <?php echo \AavivaCred\Security\Security::csrfField(); ?>
            <input type="hidden" name="action" id="bulk-action-type" value="bulk_assign">

            <!-- Leads Table with Checkboxes -->
            <div class="bg-white dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-2xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-slate-700 dark:text-slate-300">
                        <thead class="bg-slate-50 dark:bg-white/[0.03] text-slate-500 dark:text-slate-400 uppercase font-black tracking-wider border-b border-slate-100 dark:border-white/10 text-[10px]">
                            <tr>
                                <th class="p-3 w-10 text-center">
                                    <input type="checkbox" id="select-all" class="w-4 h-4 rounded border-slate-300 text-amber-500 focus:ring-amber-400 cursor-pointer">
                                </th>
                                <th class="p-3">Lead ID & Date</th>
                                <th class="p-3">Applicant Info</th>
                                <th class="p-3">Loan Specs</th>
                                <th class="p-3">Verification Badges</th>
                                <th class="p-3">Assigned Partner</th>
                                <th class="p-3">Status</th>
                                <th class="p-3 text-center">Actions & Dossier</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-white/5">
                            <?php if (empty($leads)): ?>
                                <tr>
                                    <td colspan="8" class="p-6 text-center text-slate-400 font-medium">No lead applications matched your search criteria.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($leads as $lead): ?>
                                    <?php $lid = $lead['lead_id'] ?? $lead['id']; ?>
                                    <tr class="hover:bg-slate-50 dark:hover:bg-white/[0.02] transition">
                                        <td class="p-3 text-center">
                                            <input type="checkbox" name="selected_leads[]" value="<?php echo htmlspecialchars($lid); ?>" class="lead-checkbox w-4 h-4 rounded border-slate-300 text-amber-500 focus:ring-amber-400 cursor-pointer">
                                        </td>
                                        <td class="p-3">
                                            <div class="font-mono font-black text-amber-600 dark:text-amber-400 text-xs"><?php echo htmlspecialchars($lead['lead_id'] ?? ('AVV-' . $lead['id'])); ?></div>
                                            <div class="text-[9.5px] text-slate-400 font-semibold mt-0.5"><?php echo htmlspecialchars(date('d M Y, h:i A', strtotime($lead['created_at'] ?? 'now'))); ?></div>
                                        </td>
                                        <td class="p-3">
                                            <div class="font-extrabold text-slate-900 dark:text-white text-xs"><?php echo htmlspecialchars($lead['name']); ?></div>
                                            <div class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold flex items-center gap-1 mt-0.5">
                                                <i data-lucide="phone" class="w-3 h-3 text-emerald-500"></i> <?php echo htmlspecialchars($lead['mobile']); ?>
                                            </div>
                                            <div class="text-[10px] text-slate-500 dark:text-slate-400 flex items-center gap-1">
                                                <i data-lucide="mail" class="w-3 h-3 text-sky-400"></i> <?php echo htmlspecialchars($lead['email']); ?>
                                            </div>
                                            <div class="text-[9.5px] font-bold text-slate-400 uppercase mt-0.5">📍 <?php echo htmlspecialchars($lead['city']); ?></div>
                                        </td>
                                        <td class="p-3">
                                            <div class="font-black text-emerald-600 dark:text-emerald-400 text-sm">₹<?php echo number_format(floatval($lead['loan_amount'])); ?></div>
                                            <div class="text-[9.5px] text-slate-500 dark:text-slate-300 uppercase font-extrabold tracking-wider mt-0.5"><?php echo htmlspecialchars($lead['category']); ?></div>
                                            <div class="text-[9.5px] text-slate-400 font-semibold mt-0.5"><?php echo htmlspecialchars($lead['employment_type'] ?? 'N/A'); ?> (₹<?php echo number_format(floatval($lead['monthly_income'] ?? 0)); ?>/mo)</div>
                                        </td>

                                        <!-- Verification Badges Column -->
                                        <td class="p-3 space-y-1">
                                            <div class="flex flex-wrap gap-1">
                                                <?php if (!empty($lead['pan_number'])): ?>
                                                    <span class="px-1.5 py-0.5 rounded bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 text-[9px] font-bold">
                                                        PAN: <?php echo htmlspecialchars($lead['pan_number']); ?>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if (!empty($lead['aadhaar_number'])): ?>
                                                    <span class="px-1.5 py-0.5 rounded bg-sky-500/10 text-sky-600 dark:text-sky-400 border border-sky-500/20 text-[9px] font-bold">
                                                        Aadhaar: <?php echo htmlspecialchars(substr($lead['aadhaar_number'], 0, 4) . '...'); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="flex flex-wrap gap-1">
                                                <?php if (!empty($lead['udyam_number'])): ?>
                                                    <span class="px-1.5 py-0.5 rounded bg-purple-500/10 text-purple-600 dark:text-purple-300 border border-purple-500/20 text-[9px] font-bold">
                                                        Udyam: <?php echo htmlspecialchars($lead['udyam_number']); ?>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if (!empty($lead['gst_number'])): ?>
                                                    <span class="px-1.5 py-0.5 rounded bg-amber-500/10 text-amber-600 dark:text-amber-300 border border-amber-500/20 text-[9px] font-bold">
                                                        GST: <?php echo htmlspecialchars($lead['gst_number']); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($lead['bank_name']) || !empty($lead['ifsc_code'])): ?>
                                                <div class="text-[9.5px] text-slate-400 font-semibold truncate max-w-[160px]">
                                                    🏦 <?php echo htmlspecialchars($lead['bank_name'] ?: $lead['ifsc_code']); ?>
                                                </div>
                                            <?php endif; ?>
                                        </td>

                                        <!-- Assigned To Column -->
                                        <td class="p-3">
                                            <?php if (!empty($lead['assigned_to'])): ?>
                                                <span class="px-2.5 py-1 rounded-lg bg-purple-500/10 text-purple-600 dark:text-purple-300 border border-purple-500/20 text-[10px] font-bold flex items-center gap-1 w-max">
                                                    <i data-lucide="user-check" class="w-3 h-3 text-purple-500"></i> <?php echo htmlspecialchars($lead['assigned_to']); ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="text-[10px] text-amber-600 dark:text-amber-400 font-semibold bg-amber-500/10 px-2 py-0.5 rounded-md border border-amber-500/20">Unassigned</span>
                                            <?php endif; ?>
                                        </td>

                                        <!-- Status -->
                                        <td class="p-3">
                                            <?php 
                                            $st = strtolower($lead['status'] ?? 'new');
                                            $badge = 'bg-slate-500/10 text-slate-600 dark:text-slate-300 border-slate-500/20';
                                            if ($st === 'approved') $badge = 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border-emerald-500/20';
                                            elseif ($st === 'in review') $badge = 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border-amber-500/20';
                                            elseif ($st === 'rejected') $badge = 'bg-rose-500/10 text-rose-600 dark:text-rose-400 border-rose-500/20';
                                            ?>
                                            <span class="px-2.5 py-0.5 rounded-full border text-[9px] font-black uppercase tracking-wider <?php echo $badge; ?>">
                                                <?php echo htmlspecialchars($lead['status'] ?? 'New'); ?>
                                            </span>
                                        </td>

                                        <!-- Actions & Dossier Trigger -->
                                        <td class="p-3 text-center">
                                            <div class="flex items-center justify-center gap-1.5">
                                                <button type="button" onclick='openLeadDossier(<?php echo htmlspecialchars(json_encode($lead), ENT_QUOTES, "UTF-8"); ?>)' class="px-2.5 py-1.5 bg-amber-400 hover:bg-yellow-400 text-slate-950 font-black rounded-lg text-[10px] flex items-center gap-1 shadow-sm transition active:scale-95">
                                                    <i data-lucide="eye" class="w-3.5 h-3.5"></i> Details
                                                </button>

                                                <form method="POST" action="leads.php" class="inline-block">
                                                    <?php echo \AavivaCred\Security\Security::csrfField(); ?>
                                                    <input type="hidden" name="action" value="update_status">
                                                    <input type="hidden" name="lead_id" value="<?php echo htmlspecialchars($lid); ?>">
                                                    <select name="status" onchange="this.form.submit()" class="px-1.5 py-1 bg-slate-100 dark:bg-[#031d40] border border-slate-200 dark:border-white/10 rounded-lg text-[10px] font-bold text-slate-800 dark:text-white focus:outline-none">
                                                        <option value="New" <?php echo ($lead['status'] ?? 'New') === 'New' ? 'selected' : ''; ?>>New</option>
                                                        <option value="In Review" <?php echo ($lead['status'] ?? '') === 'In Review' ? 'selected' : ''; ?>>In Review</option>
                                                        <option value="Approved" <?php echo ($lead['status'] ?? '') === 'Approved' ? 'selected' : ''; ?>>Approved</option>
                                                        <option value="Rejected" <?php echo ($lead['status'] ?? '') === 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sticky Floating Bulk Dispatch Toolbar -->
            <div id="sticky-dispatch-bar" class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 bg-slate-900/95 dark:bg-[#021435]/95 text-white backdrop-blur-xl border border-white/20 px-6 py-3.5 rounded-2xl shadow-2xl hidden items-center gap-4 transition-all duration-300 w-11/12 max-w-4xl">
                <div class="flex items-center gap-2 shrink-0 border-r border-white/15 pr-4">
                    <span class="w-3 h-3 rounded-full bg-amber-400 animate-ping"></span>
                    <span id="selected-count-badge" class="text-xs font-black text-amber-400">0 Selected</span>
                </div>

                <!-- Select Partner / Executive -->
                <div class="flex items-center gap-2 flex-1">
                    <select name="assignee" id="assignee-select" class="px-3 py-2 bg-slate-800 dark:bg-white/10 border border-white/20 rounded-xl text-xs font-bold text-white focus:outline-none focus:border-amber-400">
                        <option value="HDFC Bank DSA Desk">🏦 HDFC Bank DSA Desk</option>
                        <option value="ICICI Bank Business Desk">🏦 ICICI Bank Business Desk</option>
                        <option value="Bajaj Finance Team">🏦 Bajaj Finance Team</option>
                        <option value="Axis Bank Processing Desk">🏦 Axis Bank Processing Desk</option>
                        <option value="Field Executive 1 (North)">👤 Field Executive 1 (North)</option>
                        <option value="Field Executive 2 (South)">👤 Field Executive 2 (South)</option>
                        <option value="custom">✏️ Custom Partner / Executive...</option>
                    </select>

                    <input type="text" name="custom_assignee" id="custom-assignee-input" placeholder="Enter custom name / DSA..." class="px-3 py-2 bg-slate-800 dark:bg-white/10 border border-white/20 rounded-xl text-xs font-semibold text-white placeholder-slate-400 hidden focus:outline-none">
                </div>

                <div class="flex items-center gap-2 shrink-0">
                    <button type="button" onclick="executeBulkAction('bulk_assign')" class="px-4 py-2 bg-amber-400 hover:bg-yellow-400 text-slate-950 font-black rounded-xl text-xs flex items-center gap-1.5 shadow-lg shadow-amber-400/20 transition active:scale-95">
                        <i data-lucide="send" class="w-3.5 h-3.5"></i> Assign & Dispatch
                    </button>
                    <button type="button" onclick="executeBulkAction('bulk_export_csv')" class="px-4 py-2 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black rounded-xl text-xs flex items-center gap-1.5 shadow-lg shadow-emerald-500/20 transition active:scale-95">
                        <i data-lucide="download" class="w-3.5 h-3.5"></i> Export Selected CSV
                    </button>
                </div>
            </div>
        </form>
    </main>

    <!-- FULL LEAD DOSSIER MODAL DIALOG -->
    <div id="lead-details-modal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-md z-50 flex items-center justify-center p-3 sm:p-5 hidden opacity-0 transition-all duration-300 overflow-y-auto">
      <div class="max-w-2xl w-full my-auto bg-slate-900 text-white border border-white/15 rounded-3xl p-5 sm:p-7 shadow-2xl space-y-5 relative overflow-hidden">
        
        <!-- Close Header Button -->
        <button type="button" onclick="closeLeadDossier()" class="absolute top-4 right-4 w-9 h-9 bg-white/10 hover:bg-white/20 text-white rounded-full flex items-center justify-center font-bold text-sm transition">
          ✕
        </button>

        <!-- Top Header -->
        <div class="flex items-center justify-between border-b border-white/10 pb-4 pr-10">
          <div>
            <div class="flex items-center gap-2">
              <span id="dos-lead-id" class="font-mono font-black text-amber-400 text-base">AVV-XXXXX</span>
              <span id="dos-status-badge" class="px-2.5 py-0.5 rounded-full border text-[9.5px] font-black uppercase tracking-wider bg-emerald-500/10 text-emerald-400 border-emerald-500/20">NEW</span>
            </div>
            <p id="dos-created-at" class="text-[11px] text-slate-400 font-semibold mt-0.5">Submitted on: --</p>
          </div>
        </div>

        <div class="space-y-4 max-h-[70vh] overflow-y-auto pr-1">
          
          <!-- Section 1: Applicant Profile -->
          <div class="bg-white/5 border border-white/10 rounded-2xl p-4 space-y-3">
            <h4 class="text-xs font-black uppercase tracking-wider text-amber-400 flex items-center gap-1.5 border-b border-white/10 pb-2">
              <i data-lucide="user" class="w-4 h-4"></i> Applicant Personal Details
            </h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Full Name</span>
                <span id="dos-name" class="font-extrabold text-white text-sm">--</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">City / Location</span>
                <span id="dos-city" class="font-bold text-slate-200">--</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Mobile Number</span>
                <a id="dos-mobile-link" href="#" class="font-black text-emerald-400 hover:underline flex items-center gap-1">
                  <span id="dos-mobile">--</span> <i data-lucide="phone-call" class="w-3 h-3"></i>
                </a>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Email Address</span>
                <a id="dos-email-link" href="#" class="font-bold text-sky-400 hover:underline flex items-center gap-1">
                  <span id="dos-email">--</span> <i data-lucide="external-link" class="w-3 h-3"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Section 2: Loan Requirements & Financials -->
          <div class="bg-white/5 border border-white/10 rounded-2xl p-4 space-y-3">
            <h4 class="text-xs font-black uppercase tracking-wider text-amber-400 flex items-center gap-1.5 border-b border-white/10 pb-2">
              <i data-lucide="indian-rupee" class="w-4 h-4"></i> Loan Requirements & Financial Profile
            </h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Required Loan Amount</span>
                <span id="dos-amount" class="font-black text-emerald-400 text-base">₹0</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Loan Product Category</span>
                <span id="dos-category" class="font-extrabold text-amber-300 uppercase">--</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Employment Type</span>
                <span id="dos-employment" class="font-bold text-slate-200">--</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Monthly Income</span>
                <span id="dos-income" class="font-bold text-slate-200">₹0 / month</span>
              </div>
            </div>
          </div>

          <!-- Section 3: Identity & Business Verification -->
          <div class="bg-white/5 border border-white/10 rounded-2xl p-4 space-y-3">
            <h4 class="text-xs font-black uppercase tracking-wider text-amber-400 flex items-center gap-1.5 border-b border-white/10 pb-2">
              <i data-lucide="shield-check" class="w-4 h-4"></i> Identity & Government Verification Details
            </h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">PAN Card Number</span>
                <span id="dos-pan" class="font-mono font-black text-amber-300 text-sm">Not Provided</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Aadhaar Number</span>
                <span id="dos-aadhaar" class="font-mono font-extrabold text-sky-300 text-sm">Not Provided</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Udyam Registration Number</span>
                <span id="dos-udyam" class="font-mono font-bold text-purple-300">Not Provided</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">GSTIN Number</span>
                <span id="dos-gst" class="font-mono font-bold text-emerald-300">Not Provided</span>
              </div>
            </div>
          </div>

          <!-- Section 4: Bank Account & Disbursement Details -->
          <div class="bg-white/5 border border-white/10 rounded-2xl p-4 space-y-3">
            <h4 class="text-xs font-black uppercase tracking-wider text-amber-400 flex items-center gap-1.5 border-b border-white/10 pb-2">
              <i data-lucide="landmark" class="w-4 h-4"></i> Bank Account & Disbursement Info
            </h4>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Bank Name</span>
                <span id="dos-bank-name" class="font-bold text-white">Not Provided</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">IFSC Code</span>
                <span id="dos-ifsc" class="font-mono font-bold text-amber-300">Not Provided</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase">Account Number</span>
                <span id="dos-account" class="font-mono font-bold text-slate-200">Not Provided</span>
              </div>
            </div>
          </div>

          <!-- Section 5: Uploaded Documents -->
          <div id="dos-docs-container" class="bg-white/5 border border-white/10 rounded-2xl p-4 space-y-3">
            <h4 class="text-xs font-black uppercase tracking-wider text-amber-400 flex items-center gap-1.5 border-b border-white/10 pb-2">
              <i data-lucide="file-check" class="w-4 h-4"></i> Uploaded Documents
            </h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase mb-1">PAN Card Image / File</span>
                <span id="dos-pan-doc-status" class="text-slate-400">Not Uploaded</span>
              </div>
              <div>
                <span class="text-[10px] font-bold text-slate-400 block uppercase mb-1">Aadhaar Card Front/Back</span>
                <span id="dos-aadhaar-doc-status" class="text-slate-400">Not Uploaded</span>
              </div>
            </div>
          </div>

        </div>

        <!-- Footer Quick Contact Buttons -->
        <div class="flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-white/10">
          <div class="flex items-center gap-2">
            <a id="btn-dos-whatsapp" href="#" target="_blank" class="px-3 py-2 bg-emerald-600 hover:bg-emerald-500 text-white font-extrabold rounded-xl text-xs flex items-center gap-1.5 shadow">
              <i data-lucide="message-circle" class="w-3.5 h-3.5"></i> WhatsApp
            </a>
            <a id="btn-dos-call" href="#" class="px-3 py-2 bg-sky-600 hover:bg-sky-500 text-white font-extrabold rounded-xl text-xs flex items-center gap-1.5 shadow">
              <i data-lucide="phone" class="w-3.5 h-3.5"></i> Call Applicant
            </a>
          </div>

          <button type="button" onclick="closeLeadDossier()" class="px-5 py-2 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl text-xs transition">
            Close Dossier
          </button>
        </div>

      </div>
    </div>

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

            // Checkbox Selection Logic
            const selectAll = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('.lead-checkbox');
            const dispatchBar = document.getElementById('sticky-dispatch-bar');
            const countBadge = document.getElementById('selected-count-badge');
            const assigneeSelect = document.getElementById('assignee-select');
            const customAssigneeInput = document.getElementById('custom-assignee-input');

            function updateSelectionState() {
                const checked = document.querySelectorAll('.lead-checkbox:checked');
                const count = checked.length;
                if (count > 0) {
                    countBadge.innerText = `${count} Leads Selected`;
                    dispatchBar.classList.remove('hidden');
                    dispatchBar.classList.add('flex');
                } else {
                    dispatchBar.classList.add('hidden');
                    dispatchBar.classList.remove('flex');
                }
            }

            if (selectAll) {
                selectAll.addEventListener('change', (e) => {
                    checkboxes.forEach(cb => cb.checked = e.target.checked);
                    updateSelectionState();
                });
            }

            checkboxes.forEach(cb => {
                cb.addEventListener('change', () => {
                    updateSelectionState();
                });
            });

            if (assigneeSelect && customAssigneeInput) {
                assigneeSelect.addEventListener('change', () => {
                    if (assigneeSelect.value === 'custom') {
                        customAssigneeInput.classList.remove('hidden');
                        customAssigneeInput.focus();
                    } else {
                        customAssigneeInput.classList.add('hidden');
                    }
                });
            }

            window.executeBulkAction = function(actionType) {
                const checked = document.querySelectorAll('.lead-checkbox:checked');
                if (checked.length === 0) {
                    alert('Please select at least one lead from the table.');
                    return;
                }

                document.getElementById('bulk-action-type').value = actionType;
                document.getElementById('bulk-leads-form').submit();
            };

            // Lead Dossier Modal Logic
            window.openLeadDossier = function(lead) {
                document.getElementById('dos-lead-id').innerText = lead.lead_id || ('AVV-' + (lead.id || ''));
                document.getElementById('dos-status-badge').innerText = (lead.status || 'New').toUpperCase();
                document.getElementById('dos-created-at').innerText = 'Submitted on: ' + (lead.created_at || 'N/A');

                document.getElementById('dos-name').innerText = lead.name || 'N/A';
                document.getElementById('dos-city').innerText = lead.city || 'N/A';
                
                const mobile = lead.mobile || '';
                document.getElementById('dos-mobile').innerText = mobile || 'N/A';
                document.getElementById('dos-mobile-link').href = mobile ? 'tel:' + mobile : '#';
                
                const email = lead.email || '';
                document.getElementById('dos-email').innerText = email || 'N/A';
                document.getElementById('dos-email-link').href = email ? 'mailto:' + email : '#';

                const amt = parseFloat(lead.loan_amount || 0);
                document.getElementById('dos-amount').innerText = '₹' + amt.toLocaleString('en-IN');
                document.getElementById('dos-category').innerText = lead.category || 'N/A';
                document.getElementById('dos-employment').innerText = lead.employment_type || 'N/A';
                
                const income = parseFloat(lead.monthly_income || 0);
                document.getElementById('dos-income').innerText = '₹' + income.toLocaleString('en-IN') + ' / month';

                document.getElementById('dos-pan').innerText = lead.pan_number || 'Not Provided';
                document.getElementById('dos-aadhaar').innerText = lead.aadhaar_number || 'Not Provided';
                document.getElementById('dos-udyam').innerText = lead.udyam_number || 'Not Provided';
                document.getElementById('dos-gst').innerText = lead.gst_number || 'Not Provided';

                document.getElementById('dos-bank-name').innerText = lead.bank_name || 'Not Provided';
                document.getElementById('dos-ifsc').innerText = lead.ifsc_code || 'Not Provided';
                document.getElementById('dos-account').innerText = lead.account_number || 'Not Provided';

                // Document links
                const panStatus = document.getElementById('dos-pan-doc-status');
                if (lead.doc_pan) {
                    panStatus.innerHTML = `<a href="../${lead.doc_pan}" target="_blank" class="px-3 py-1 bg-amber-400 text-slate-950 font-bold rounded-lg inline-flex items-center gap-1 hover:bg-yellow-400 transition"><i data-lucide="download" class="w-3 h-3"></i> Download PAN Doc</a>`;
                } else {
                    panStatus.innerText = 'Not Uploaded';
                }

                const aadhaarStatus = document.getElementById('dos-aadhaar-doc-status');
                if (lead.doc_aadhaar) {
                    aadhaarStatus.innerHTML = `<a href="../${lead.doc_aadhaar}" target="_blank" class="px-3 py-1 bg-amber-400 text-slate-950 font-bold rounded-lg inline-flex items-center gap-1 hover:bg-yellow-400 transition"><i data-lucide="download" class="w-3 h-3"></i> Download Aadhaar Doc</a>`;
                } else {
                    aadhaarStatus.innerText = 'Not Uploaded';
                }

                // WhatsApp action link
                const cleanMob = mobile.replace(/[^0-9]/g, '');
                const waMob = cleanMob.length === 10 ? '91' + cleanMob : cleanMob;
                document.getElementById('btn-dos-whatsapp').href = waMob ? `https://wa.me/${waMob}?text=Hi%20${encodeURIComponent(lead.name || '')},%20regarding%20your%20loan%20application%20(${encodeURIComponent(lead.lead_id || '')})` : '#';
                document.getElementById('btn-dos-call').href = mobile ? 'tel:' + mobile : '#';

                const modal = document.getElementById('lead-details-modal');
                modal.classList.remove('hidden');
                setTimeout(() => modal.classList.remove('opacity-0'), 10);
                if (window.lucide) lucide.createIcons();
            };

            window.closeLeadDossier = function() {
                const modal = document.getElementById('lead-details-modal');
                modal.classList.add('opacity-0');
                setTimeout(() => modal.classList.add('hidden'), 300);
            };
        });
    </script>
                    alert('Please select at least one lead from the table.');
                    return;
                }

                document.getElementById('bulk-action-type').value = actionType;
                document.getElementById('bulk-leads-form').submit();
            };
        });
    </script>
</body>
</html>
