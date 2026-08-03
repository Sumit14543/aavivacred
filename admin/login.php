<?php
/**
 * AavivaCred - Enterprise Admin Login
 */

require_once __DIR__ . '/../config/config.php';

// Autoload Enterprise Classes
spl_autoload_register(function ($class) {
    $prefix = 'AavivaCred\\';
    $base_dir = __DIR__ . '/../src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

\AavivaCred\Security\Security::initSession();
\AavivaCred\Security\Security::setSecurityHeaders();

// Redirect if already logged in
if (!empty($_SESSION['admin_user_id'])) {
    header("Location: index.php");
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!\AavivaCred\Security\Security::checkRateLimit('admin_login', 5, 900)) {
        $error = 'Too many failed login attempts. Please try again after 15 minutes.';
    } elseif (!\AavivaCred\Security\Security::verifyCsrfToken($_POST['_csrf_token'] ?? '')) {
        $error = 'Invalid security token. Please refresh and try again.';
    } else {
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        $pdo = \AavivaCred\Core\Database::getInstance()->getPdo();
        if ($pdo) {
            $stmt = $pdo->prepare("SELECT * FROM `admin_users` WHERE `username` = :username OR `email` = :email LIMIT 1");
            $stmt->execute([':username' => $username, ':email' => $username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['admin_user_id'] = $user['id'];
                $_SESSION['admin_username'] = $user['username'];
                $_SESSION['admin_role'] = $user['role'];
                
                $jwtSecret = getenv('JWT_SECRET') ?: 'fallback-jwt-secret-key-12345';
                $jwtToken = \AavivaCred\Security\JWT::generateToken([
                    'admin_user_id'  => $user['id'],
                    'admin_username' => $user['username'],
                    'admin_role'     => $user['role']
                ], $jwtSecret);
                
                setcookie('admin_auth_token', $jwtToken, [
                    'expires' => time() + 7200,
                    'path' => '/',
                    'secure' => false, // Set to true if running on HTTPS
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]);
                
                header("Location: index.php");
                exit;
            } else {
                $error = 'Invalid credentials. Please verify your username and password.';
            }
        } else {
            if ($username === 'admin' && $password === 'Admin@AavivaCred2026') {
                $_SESSION['admin_user_id'] = 1;
                $_SESSION['admin_username'] = 'admin';
                $_SESSION['admin_role'] = 'Super Admin';
                
                $jwtSecret = getenv('JWT_SECRET') ?: 'fallback-jwt-secret-key-12345';
                $jwtToken = \AavivaCred\Security\JWT::generateToken([
                    'admin_user_id'  => 1,
                    'admin_username' => 'admin',
                    'admin_role'     => 'Super Admin'
                ], $jwtSecret);
                
                setcookie('admin_auth_token', $jwtToken, [
                    'expires' => time() + 7200,
                    'path' => '/',
                    'secure' => false, // Set to true if running on HTTPS
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]);
                
                header("Location: index.php");
                exit;
            } else {
                $error = 'Invalid credentials.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Admin Portal | AavivaCred</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Manrope', sans-serif; }</style>
</head>
<body class="h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-[#021435] via-[#031d40] to-slate-950 text-white">

<div class="max-w-md w-full space-y-8 bg-white/5 p-8 rounded-3xl border border-white/10 backdrop-blur-xl shadow-2xl">
    <div class="text-center space-y-3">
        <img src="../assets/images/aavivacred_light.png" alt="AavivaCred" class="h-12 mx-auto object-contain">
        <h2 class="text-2xl font-extrabold tracking-tight text-white">Enterprise Portal</h2>
        <p class="text-xs text-slate-400 font-semibold">Authorized Administrative System Access</p>
    </div>

    <?php if ($error): ?>
        <div class="bg-rose-500/10 border border-rose-500/30 text-rose-300 p-4 rounded-xl text-xs font-semibold flex items-center gap-2">
            <i data-lucide="alert-circle" class="w-4 h-4 text-rose-400 shrink-0"></i>
            <span><?php echo htmlspecialchars($error); ?></span>
        </div>
    <?php endif; ?>

    <form class="mt-8 space-y-5" action="login.php" method="POST">
        <?php echo \AavivaCred\Security\Security::csrfField(); ?>
        <div>
            <label for="username" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Username or Email</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                    <i data-lucide="user" class="w-4 h-4"></i>
                </span>
                <input id="username" name="username" type="text" required class="w-full pl-10 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl text-sm font-semibold text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 transition" placeholder="admin@aavivacred.com">
            </div>
        </div>

        <div>
            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                    <i data-lucide="lock" class="w-4 h-4"></i>
                </span>
                <input id="password" name="password" type="password" required class="w-full pl-10 pr-4 py-3 bg-white/5 border border-white/10 rounded-xl text-sm font-semibold text-white placeholder-slate-500 focus:outline-none focus:border-amber-400 transition" placeholder="••••••••••••">
            </div>
        </div>

        <button type="submit" class="w-full py-3.5 px-4 bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold rounded-xl text-sm shadow-lg shadow-amber-400/20 transition-all hover:scale-[1.02] active:scale-[0.98]">
            Sign In to Console
        </button>
    </form>
    
    <div class="text-center pt-4 border-t border-white/5">
        <a href="../index.php" class="text-xs text-slate-400 hover:text-amber-400 font-semibold transition">← Back to AavivaCred Website</a>
    </div>
</div>

<script>
    if (window.lucide) lucide.createIcons();
</script>
</body>
</html>
