<?php
/**
 * AavivaCred - Unified Enterprise Header
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

// Initialize Session & Security Headers
\AavivaCred\Security\Security::initSession();
\AavivaCred\Security\Security::setSecurityHeaders();

$current_page = basename($_SERVER['PHP_SELF']);

function get_nav_class($page, $current) {
    $isActive = false;
    if ($page === 'home' && $current === 'index.php') {
        $isActive = true;
    } elseif ($page === 'services' && ($current === 'services.php' || $current === 'loan-product.php')) {
        $isActive = true;
    } elseif ($page === 'about' && $current === 'about.php') {
        $isActive = true;
    } elseif ($page === 'contact' && $current === 'contact.php') {
        $isActive = true;
    } elseif ($page === 'calculator' && $current === 'calculator.php') {
        $isActive = true;
    } elseif ($page === 'blog' && ($current === 'blog.php' || $current === 'blog-post.php')) {
        $isActive = true;
    }
    
    if ($isActive) {
        return 'px-4 py-2 rounded-full text-sm font-bold bg-white/10 text-accentYellow border border-accentYellow/20 shadow-sm';
    }
    return 'px-4 py-2 rounded-full text-sm font-medium text-white/85 hover:text-accentYellow hover:bg-white/5 transition-all';
}

function get_nav_class_mobile($page, $current) {
    $isActive = false;
    if ($page === 'home' && $current === 'index.php') {
        $isActive = true;
    } elseif ($page === 'services' && ($current === 'services.php' || $current === 'loan-product.php')) {
        $isActive = true;
    } elseif ($page === 'about' && $current === 'about.php') {
        $isActive = true;
    } elseif ($page === 'contact' && $current === 'contact.php') {
        $isActive = true;
    } elseif ($page === 'calculator' && $current === 'calculator.php') {
        $isActive = true;
    } elseif ($page === 'blog' && ($current === 'blog.php' || $current === 'blog-post.php')) {
        $isActive = true;
    }
    
    if ($isActive) {
        return 'block rounded-xl px-4 py-3 text-base font-bold bg-white/10 text-accentYellow border border-white/10';
    }
    return 'block rounded-xl px-4 py-3 text-base font-semibold text-white/80 hover:bg-white/5 hover:text-accentYellow transition-all';
}

$seoParams = [
    'title'        => $page_title ?? 'Smart Loan Solutions Designed Around Your Financial Goals',
    'description'  => $meta_description ?? 'Explore a wide range of personal, business, home, gold, payday, and EDI loan solutions through AavivaCred.',
    'og_title'     => $og_title ?? null,
    'og_description' => $og_description ?? null,
    'robots'       => $meta_robots ?? 'index, follow',
    'breadcrumbs'  => $breadcrumbs ?? null,
    'faqs'         => $faqs_data ?? null,
    'loan_schema'  => $loan_schema ?? null,
    'article_schema'=> $article_schema ?? null,
];
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo \AavivaCred\Security\Security::generateCsrfToken(); ?>">
    
    <!-- Enterprise Dynamic SEO Tags & Structured Data -->
    <?php echo \AavivaCred\SEO\SeoHelper::renderTags($seoParams); ?>

    <!-- Preconnect & Resource Hints for Performance Optimization -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.tailwindcss.com">
    <link rel="dns-prefetch" href="https://unpkg.com">

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo PATH_PREFIX; ?>assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo PATH_PREFIX; ?>assets/images/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo PATH_PREFIX; ?>assets/images/favicon-32x32.png">
    <link rel="apple-touch-icon" href="<?php echo PATH_PREFIX; ?>assets/images/apple-touch-icon.png">
    
    <!-- Force Light Mode -->
    <script>
      document.documentElement.classList.remove('dark');
      localStorage.setItem('theme', 'light');
    </script>

    <!-- Google Fonts: Manrope -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: '#0a7dbe',
              darkBlue: '#021435',
              darkBlueLight: '#031d40',
              accentYellow: '#ffd30f',
              buddyGreen: '#1db87a',
              buddyOrange: '#ff8a0d',
              buddyRed: '#e8414a',
            },
            fontFamily: {
              sans: ['"Manrope"', 'sans-serif'],
              display: ['"Manrope"', 'sans-serif'],
            }
          }
        }
      }
    </script>
    
    <!-- Icons (Lucide via CDN) -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo PATH_PREFIX; ?>assets/css/style.css">
</head>
<body class="antialiased overflow-x-hidden text-slate-800 bg-[#f6f8fb] relative">

<!-- Global Page-Level Slanted Background Stripes -->
<div class="absolute left-[-15%] top-[5%] w-[450px] h-[900px] bg-gradient-to-b from-primary/12 via-transparent to-transparent rotate-[18deg] transform pointer-events-none z-0"></div>
<div class="absolute right-[-15%] top-[15%] w-[400px] h-[1100px] bg-gradient-to-t from-accentYellow/10 via-transparent to-transparent rotate-[18deg] transform pointer-events-none z-0"></div>
<div class="absolute left-[-12%] top-[45%] w-[350px] h-[800px] bg-gradient-to-b from-primary/10 via-transparent to-accentYellow/5 rotate-[18deg] transform pointer-events-none z-0"></div>
<div class="absolute right-[-12%] top-[65%] w-[300px] h-[900px] bg-gradient-to-t from-primary/12 via-transparent to-transparent rotate-[18deg] transform pointer-events-none z-0"></div>

<!-- Global Page-Level Floating Blurred Color Blobs -->
<div class="absolute right-[-5%] top-[10%] w-[450px] h-[450px] bg-accentYellow/8 rounded-full blur-3xl pointer-events-none z-0"></div>
<div class="absolute left-[-10%] top-[40%] w-[550px] h-[550px] bg-primary/8 rounded-full blur-3xl pointer-events-none z-0"></div>
<div class="absolute right-[-5%] top-[70%] w-[500px] h-[500px] bg-sky-400/8 rounded-full blur-3xl pointer-events-none z-0"></div>

<!-- Main Page Flex Wrapper for Sticky Footer -->
<div class="flex flex-col min-h-screen">

<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-darkBlue/90 backdrop-blur-md border-b border-white/10 shadow-lg transition-all duration-300">
  <div class="container mx-auto flex items-center justify-between h-20 px-4 lg:px-8">
    
    <!-- Logo -->
    <a href="<?php echo PATH_PREFIX; ?>index.php" class="flex shrink-0 items-center group" aria-label="AavivaCred Home">
      <img src="<?php echo PATH_PREFIX; ?>assets/images/aavivacred_light.png" alt="AavivaCred" width="200" height="64" fetchpriority="high" class="h-10 sm:h-12 md:h-14 lg:h-16 w-auto object-contain hover:scale-105 transition-all duration-200">
    </a>

    <!-- Desktop Navigation Links -->
    <div class="hidden md:flex items-center gap-1 lg:gap-2">
      <a href="<?php echo PATH_PREFIX; ?>index.php" class="<?php echo get_nav_class('home', $current_page); ?>">Home</a>
      
      <!-- Loans Dropdown -->
      <div class="relative group">
        <button class="px-4 py-2 rounded-full text-sm font-medium text-white/85 hover:text-accentYellow flex items-center gap-1 focus:outline-none" aria-haspopup="true" aria-expanded="false">
          Loans <i data-lucide="chevron-down" class="w-4 h-4 transition-transform group-hover:rotate-180"></i>
        </button>
        <div class="absolute top-full left-0 mt-1 w-64 bg-darkBlueLight border border-white/10 rounded-2xl shadow-xl py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-205 z-50">
          <a href="<?php echo PATH_PREFIX; ?>personal-loan" class="block px-5 py-2.5 text-sm text-white/90 hover:bg-white/5 hover:text-accentYellow">Personal Loan</a>
          <a href="<?php echo PATH_PREFIX; ?>business-loan" class="block px-5 py-2.5 text-sm text-white/90 hover:bg-white/5 hover:text-accentYellow">Business Loan</a>
          <a href="<?php echo PATH_PREFIX; ?>gold-loan" class="block px-5 py-2.5 text-sm text-white/90 hover:bg-white/5 hover:text-accentYellow">Gold Loan</a>
          <a href="<?php echo PATH_PREFIX; ?>home-loan" class="block px-5 py-2.5 text-sm text-white/90 hover:bg-white/5 hover:text-accentYellow">Home Loan</a>
          <a href="<?php echo PATH_PREFIX; ?>payday-loan" class="block px-5 py-2.5 text-sm text-white/90 hover:bg-white/5 hover:text-accentYellow">Payday Loan</a>
          <a href="<?php echo PATH_PREFIX; ?>edi-loan" class="block px-5 py-2.5 text-sm text-white/90 hover:bg-white/5 hover:text-accentYellow">EDI Merchant Loan</a>
        </div>
      </div>

      <a href="<?php echo PATH_PREFIX; ?>pages/calculator.php" class="<?php echo get_nav_class('calculator', $current_page); ?>">Loan Calculator</a>
      <a href="<?php echo PATH_PREFIX ? '' : 'pages/'; ?>blog.php" class="<?php echo get_nav_class('blog', $current_page); ?>">Blog</a>
      <a href="<?php echo PATH_PREFIX ? '' : 'pages/'; ?>about.php" class="<?php echo get_nav_class('about', $current_page); ?>">About Us</a>
      <a href="<?php echo PATH_PREFIX ? '' : 'pages/'; ?>contact.php" class="<?php echo get_nav_class('contact', $current_page); ?>">Contact Us</a>
    </div>

    <!-- Desktop Actions -->
    <div class="hidden md:flex items-center gap-3">
      <!-- Direct Support Hotline Pill -->
      <div class="flex items-center gap-2 text-white/80 bg-white/5 rounded-full px-3.5 py-1.5 border border-white/10 text-xs">
        <i data-lucide="phone" class="w-3.5 h-3.5 text-accentYellow shrink-0"></i>
        <span class="text-white/40 font-bold">Support:</span>
        <a href="tel:<?php echo SITE_PHONE; ?>" class="hover:text-accentYellow transition font-extrabold text-white"><?php echo SITE_PHONE; ?></a>
      </div>

      <a href="<?php echo PATH_PREFIX ? '' : 'pages/'; ?>apply.php" class="bg-accentYellow hover:bg-yellow-500 text-darkBlue rounded-full px-6 py-2.5 font-bold text-sm shadow-md transition-all hover:scale-105 active:scale-95">
        Apply Online
      </a>
    </div>

    <!-- Mobile Actions (Menu Button) -->
    <div class="flex md:hidden items-center gap-1.5 sm:gap-2">
      <a href="<?php echo PATH_PREFIX ? '' : 'pages/'; ?>apply.php" class="text-[10px] sm:text-xs font-bold text-accentYellow border border-accentYellow/30 px-2.5 py-1.5 sm:px-4 sm:py-2 rounded-full uppercase tracking-wider bg-white/5 min-h-[38px] flex items-center justify-center">
        Apply Now
      </a>

      <button id="mobile-menu-btn" class="p-2 rounded-xl hover:bg-white/10 transition text-white min-w-[44px] min-h-[44px] flex items-center justify-center" aria-label="Open navigation menu">
        <i data-lucide="menu" class="w-6 h-6"></i>
      </button>
    </div>
  </div>
</nav>

<!-- Mobile Menu Drawer -->
<div id="mobile-menu" class="fixed inset-0 z-[100] bg-darkBlue/60 backdrop-blur-md opacity-0 pointer-events-none transition-opacity duration-300 flex justify-end" aria-hidden="true">
  <!-- Panel Drawer -->
  <div id="mobile-menu-panel" class="w-72 max-w-[85vw] bg-[#031d40] p-6 shadow-2xl flex flex-col translate-x-full transition-transform duration-300 ease-out border-l border-white/10 h-full">
    <div class="flex justify-between items-center mb-8 border-b border-white/10 pb-4">
      <div class="flex items-center">
        <img src="<?php echo PATH_PREFIX; ?>assets/images/aavivacred_light.png" alt="AavivaCred" class="h-12 w-auto object-contain">
      </div>
      <button id="close-menu-btn" class="p-2 rounded-xl hover:bg-white/10 text-white min-w-[44px] min-h-[44px] flex items-center justify-center" aria-label="Close menu">
        <i data-lucide="x" class="w-6 h-6"></i>
      </button>
    </div>
    
    <!-- Nav Links -->
    <div class="flex flex-col gap-2 overflow-y-auto max-h-[calc(100vh-250px)] pr-1">
      <a href="<?php echo PATH_PREFIX; ?>index.php" class="<?php echo get_nav_class_mobile('home', $current_page); ?>">Home</a>
      
      <!-- Mobile Loans Collapsible Accordion -->
      <div class="rounded-xl border border-white/5 bg-white/5 overflow-hidden">
        <button id="mobile-loans-toggle" class="w-full flex items-center justify-between px-4 py-3 text-base font-semibold text-white/80 hover:text-accentYellow transition-all focus:outline-none" aria-expanded="false">
          <span>Loans</span>
          <i data-lucide="chevron-down" id="mobile-loans-arrow" class="w-4 h-4 transition-transform"></i>
        </button>
        <div id="mobile-loans-submenu" class="hidden flex-col bg-darkBlue/40 border-t border-white/5 py-1.5 pl-4">
          <a href="<?php echo PATH_PREFIX; ?>personal-loan" class="block px-4 py-2 text-sm text-white/70 hover:text-accentYellow font-semibold">Personal Loan</a>
          <a href="<?php echo PATH_PREFIX; ?>business-loan" class="block px-4 py-2 text-sm text-white/70 hover:text-accentYellow font-semibold">Business Loan</a>
          <a href="<?php echo PATH_PREFIX; ?>gold-loan" class="block px-4 py-2 text-sm text-white/70 hover:text-accentYellow font-semibold">Gold Loan</a>
          <a href="<?php echo PATH_PREFIX; ?>home-loan" class="block px-4 py-2 text-sm text-white/70 hover:text-accentYellow font-semibold">Home Loan</a>
          <a href="<?php echo PATH_PREFIX; ?>payday-loan" class="block px-4 py-2 text-sm text-white/70 hover:text-accentYellow font-semibold">Payday Loan</a>
          <a href="<?php echo PATH_PREFIX; ?>edi-loan" class="block px-4 py-2 text-sm text-white/70 hover:text-accentYellow font-semibold">EDI Merchant Loan</a>
        </div>
      </div>

      <a href="<?php echo PATH_PREFIX; ?>pages/calculator.php" class="<?php echo get_nav_class_mobile('calculator', $current_page); ?>">Loan Calculator</a>
      <a href="<?php echo PATH_PREFIX ? '' : 'pages/'; ?>blog.php" class="<?php echo get_nav_class_mobile('blog', $current_page); ?>">Blog</a>
      <a href="<?php echo PATH_PREFIX ? '' : 'pages/'; ?>about.php" class="<?php echo get_nav_class_mobile('about', $current_page); ?>">About Us</a>
      <a href="<?php echo PATH_PREFIX ? '' : 'pages/'; ?>contact.php" class="<?php echo get_nav_class_mobile('contact', $current_page); ?>">Contact Us</a>
    </div>
    
    <!-- Footer actions -->
    <div class="mt-auto pt-6 border-t border-white/10 flex flex-col gap-3">
      <a href="tel:<?php echo SITE_PHONE; ?>" class="text-center w-full py-3 rounded-xl border border-white/20 text-white text-sm font-semibold hover:bg-white/5 min-h-[44px] flex items-center justify-center gap-2">
        <i data-lucide="phone" class="w-4 h-4 text-accentYellow"></i> Call Support: <?php echo SITE_PHONE; ?>
      </a>
      <a href="<?php echo PATH_PREFIX ? '' : 'pages/'; ?>apply.php" class="text-center w-full py-3 rounded-xl bg-accentYellow text-darkBlue font-bold shadow-lg shadow-accentYellow/20 hover:bg-yellow-500 transition-all min-h-[44px] flex items-center justify-center">Apply Online</a>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('mobile-menu-btn');
    const closeBtn = document.getElementById('close-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuPanel = document.getElementById('mobile-menu-panel');

    if (menuBtn && mobileMenu && mobileMenuPanel) {
      menuBtn.addEventListener('click', (e) => {
        e.preventDefault();
        mobileMenu.classList.remove('opacity-0', 'pointer-events-none');
        mobileMenu.classList.add('opacity-100', 'pointer-events-auto');
        mobileMenu.setAttribute('aria-hidden', 'false');
        mobileMenuPanel.classList.remove('translate-x-full');
        mobileMenuPanel.classList.add('translate-x-0');
      });
    }

    const closeMenu = () => {
      if (mobileMenu && mobileMenuPanel) {
        mobileMenu.classList.remove('opacity-100', 'pointer-events-auto');
        mobileMenu.classList.add('opacity-0', 'pointer-events-none');
        mobileMenu.setAttribute('aria-hidden', 'true');
        mobileMenuPanel.classList.remove('translate-x-0');
        mobileMenuPanel.classList.add('translate-x-full');
      }
    };

    if (closeBtn) {
      closeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        closeMenu();
      });
    }

    if (mobileMenu) {
      mobileMenu.addEventListener('click', (e) => {
        if (e.target === mobileMenu) {
          closeMenu();
        }
      });
    }

    const loansToggle = document.getElementById('mobile-loans-toggle');
    const loansSubmenu = document.getElementById('mobile-loans-submenu');
    const loansArrow = document.getElementById('mobile-loans-arrow');
    if (loansToggle && loansSubmenu && loansArrow) {
      loansToggle.addEventListener('click', (e) => {
        e.preventDefault();
        const isExpanded = loansToggle.getAttribute('aria-expanded') === 'true';
        loansToggle.setAttribute('aria-expanded', !isExpanded);
        loansSubmenu.classList.toggle('hidden');
        loansSubmenu.classList.toggle('flex');
        loansArrow.classList.toggle('rotate-180');
      });
    }
  });
</script>
