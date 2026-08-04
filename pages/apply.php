<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/lead_handler.php';

$handler = new LeadHandler();
$errors = $handler->getErrors();
$values = $handler->getValues();
$submitted = $handler->isSubmitted();

// Pre-fill from query params on GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['qty'])) {
        $values['loan_amount'] = intval($_GET['qty']);
    }
    if (isset($_GET['type'])) {
        $typeParam = htmlspecialchars($_GET['type']);
        if ($typeParam === 'personal') $values['category'] = 'payday';
        if ($typeParam === 'business') $values['category'] = 'business';
        if ($typeParam === 'gold') $values['category'] = 'mutual_fund';
        if ($typeParam === 'home') $values['category'] = 'home_loan';
        if ($typeParam === 'edi') $values['category'] = 'edi';
        if ($typeParam === 'two_wheeler' || $typeParam === 'bike') $values['category'] = 'two_wheeler';
    }
}

$page_title = "Apply for Your Loan | Instant FinTech Verification";
include __DIR__ . '/../includes/header.php';
?>

<!-- Load Canvas Confetti & Lucide Icons -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<style>
  /* Premium Modern FinTech Card Theme */
  .apply-card {
    background: #ffffff;
    border: 1px solid rgba(15, 23, 42, 0.08);
    box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.04), 
                0 0 0 1px rgba(15, 23, 42, 0.02),
                0 4px 20px -2px rgba(15, 23, 42, 0.02);
  }

  /* Premium inputs with floating focus transitions */
  .premium-input {
    background-color: #f8fafc;
    border: 1.5px solid #e2e8f0;
    border-radius: 1.25rem;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 600;
    color: #021435;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    width: 100%;
  }
  .premium-input:focus {
    background-color: #ffffff;
    border-color: #0284c7;
    box-shadow: 0 0 0 4px rgba(2, 132, 199, 0.08);
    outline: none;
  }
  .premium-input::placeholder {
    color: #94a3b8;
    font-weight: 500;
  }

  /* Step Enter Slide Animation */
  .step-slide-enter {
    animation: slideInUp 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
  }

  @keyframes slideInUp {
    from { opacity: 0; transform: translateY(16px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .error-shake {
    animation: shake 0.4s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
  }
  @keyframes shake {
    10%, 90% { transform: translate3d(-1px, 0, 0); }
    20%, 80% { transform: translate3d(2px, 0, 0); }
    30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
    40%, 60% { transform: translate3d(4px, 0, 0); }
  }

  /* Fully Responsive OTP Input Boxes for Mobile (320px - 768px) */
  .otp-box {
    width: 100%;
    max-width: 42px;
    height: 48px;
    text-align: center;
    font-size: 18px;
    font-weight: 800;
    border-radius: 10px;
    border: 2px solid #cbd5e1;
    background: #f8fafc;
    transition: all 0.2s ease;
  }
  .otp-box:focus {
    border-color: #0284c7;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
    outline: none;
  }
  @media (max-width: 380px) {
    .otp-box {
      max-width: 36px;
      height: 44px;
      font-size: 16px;
      border-radius: 8px;
    }
  }
  /* Hide scroll-to-top button on apply page to prevent layout clutter and overlap */
  #scroll-to-top-btn {
    display: none !important;
  }
</style>

<!-- CLEAN SIMPLE UP-DOWN BOUNCING LOADER OVERLAY -->
<div id="transition-overlay" class="fixed inset-0 bg-darkBlue/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
  <div class="bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-8 max-w-xs w-full text-center space-y-4 shadow-2xl step-slide-enter">
    
    <!-- Up-Down Bouncing Dots Spinner -->
    <div class="flex items-center justify-center gap-2.5 py-2">
      <span class="w-4 h-4 rounded-full bg-primary animate-bounce [animation-delay:-0.3s] shadow-sm"></span>
      <span class="w-4 h-4 rounded-full bg-sky-400 animate-bounce [animation-delay:-0.15s] shadow-sm"></span>
      <span class="w-4 h-4 rounded-full bg-accentYellow animate-bounce shadow-sm"></span>
    </div>

    <!-- Loader Status Text -->
    <div class="space-y-1">
      <h4 id="transition-title" class="font-display font-black text-base text-darkBlue">Processing...</h4>
      <p id="transition-desc" class="text-xs text-slate-500 font-semibold">Please wait a moment</p>
    </div>

    <!-- Progress percentage bar -->
    <div class="w-full space-y-1.5 pt-1">
      <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden">
        <div id="transition-bar" class="bg-gradient-to-r from-primary to-sky-400 h-full w-0 transition-all duration-300 ease-out"></div>
      </div>
      <div class="flex justify-end text-[10px] font-black text-slate-400">
        <span id="loader-pct">25%</span>
      </div>
    </div>

  </div>
</div>

<!-- COMPACT & RESPONSIVE PAN CARD VERIFICATION POPUP MODAL DIALOG -->
<div id="pan-modal" class="fixed inset-0 bg-darkBlue/85 backdrop-blur-md z-50 flex items-center justify-center p-3 sm:p-4 hidden opacity-0 transition-all duration-300 overflow-y-auto">
  <div class="max-w-md w-full my-auto relative step-slide-enter">
    
    <!-- Close Icon Button -->
    <button type="button" onclick="closePanModal()" aria-label="Close PAN verification modal" class="absolute -top-2.5 -right-2.5 sm:-top-3 sm:-right-3 w-8 h-8 sm:w-9 sm:h-9 bg-white border border-slate-200 text-slate-700 hover:text-darkBlue rounded-full shadow-xl flex items-center justify-center font-bold z-20 transition hover:scale-105">
      ✕
    </button>

    <!-- REALISTIC & COMPACT GOVT. OF INDIA DIGITAL PAN CARD VISUAL MODAL -->
    <div id="pan-card-preview" class="relative w-full bg-gradient-to-tr from-[#d2e4fc] via-[#eaf2fd] to-[#c2daf8] border-2 border-[#102a43]/25 rounded-2xl sm:rounded-[2rem] p-4 sm:p-6 shadow-2xl space-y-3 sm:space-y-4 overflow-hidden text-slate-800 font-sans">
      
      <!-- Ambient Watermark Emblem -->
      <div class="absolute -right-8 -bottom-8 w-40 h-40 rounded-full border-[10px] border-[#102a43]/5 pointer-events-none flex items-center justify-center">
        <span class="text-5xl opacity-[0.07]">🏛️</span>
      </div>
      <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-4xl opacity-[0.04] pointer-events-none select-none font-serif tracking-widest">
        आयकर विभाग
      </div>

      <!-- Header: Official Bilingual Header -->
      <div class="flex items-center justify-between border-b border-[#102a43]/15 pb-2.5">
        <div class="flex items-center gap-2 sm:gap-3">
          <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-gradient-to-b from-[#102a43] to-[#0b1d3a] text-accentYellow flex items-center justify-center shadow-sm border border-amber-300/40 shrink-0">
            <span class="text-base sm:text-lg">🏛️</span>
          </div>
          <div>
            <h4 class="text-[10px] sm:text-xs font-black text-[#102a43] uppercase tracking-wider leading-none">आयकर विभाग / INCOME TAX DEPARTMENT</h4>
            <p class="text-[8.5px] sm:text-[9px] font-extrabold text-slate-600 uppercase tracking-widest mt-0.5">भारत सरकार / GOVT. OF INDIA</p>
          </div>
        </div>
      </div>

      <!-- Details Grid -->
      <div class="grid grid-cols-2 gap-2.5 sm:gap-3 text-left pt-0.5">
        <!-- Taxpayer Name -->
        <div class="col-span-1">
          <span class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">नाम / Name</span>
          <h4 id="pan-card-name" class="font-display font-black text-xs sm:text-sm text-[#102a43] uppercase tracking-wide leading-tight mt-0.5">SUMIT KUMAR</h4>
        </div>

        <!-- Date of Birth -->
        <div class="col-span-1">
          <span class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">जन्म तिथि / Date of Birth</span>
          <h5 id="pan-card-dob" class="font-extrabold text-[11px] sm:text-xs text-slate-800 mt-0.5">10/07/2003</h5>
        </div>

        <!-- Gender -->
        <div class="col-span-1">
          <span class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">लिंग / Gender</span>
          <h5 id="pan-card-gender" class="font-extrabold text-[11px] sm:text-xs text-slate-800 uppercase mt-0.5">MALE</h5>
        </div>

        <!-- Masked Aadhaar -->
        <div class="col-span-1">
          <span class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">मास्क आधार / Masked Aadhaar</span>
          <div class="flex items-center gap-1 mt-0.5">
            <h5 id="pan-card-aadhaar" class="font-mono font-black text-[11px] text-slate-800">50XXXXXXXX16</h5>
            <span class="px-1.5 py-0.2 bg-emerald-600 text-white rounded text-[7.5px] font-black uppercase tracking-tighter">Linked</span>
          </div>
        </div>

        <!-- PAN Number -->
        <div class="col-span-2 pt-1">
          <span class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">स्थायी खाता संख्या / PAN Number</span>
          <div class="inline-block px-3 py-1 bg-white/80 border border-slate-300 rounded-lg shadow-inner mt-0.5">
            <h5 id="pan-card-number" class="font-mono font-black text-sm text-[#102a43] uppercase tracking-widest">KXTPK3744P</h5>
          </div>
        </div>
      </div>

      <!-- Action Button -->
      <button type="button" onclick="confirmPanAndContinue()" class="w-full bg-gradient-to-r from-primary to-[#053d60] hover:from-darkBlue hover:to-primary text-white py-2.5 sm:py-3 px-4 rounded-xl font-extrabold text-xs flex items-center justify-center gap-2 shadow-md hover:scale-[1.02] transition-all active:scale-95 mt-2">
        <span>Confirm Details & Continue</span> <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-accentYellow"></i>
      </button>

    </div>
  </div>
</div>

<!-- COMPACT & RESPONSIVE BUSINESS VERIFICATION POPUP MODAL DIALOG -->
<div id="biz-modal" class="fixed inset-0 bg-darkBlue/85 backdrop-blur-md z-50 flex items-center justify-center p-3 sm:p-4 hidden opacity-0 transition-all duration-300 overflow-y-auto">
  <div class="max-w-md w-full my-auto relative step-slide-enter">
    
    <!-- Close Icon Button -->
    <button type="button" onclick="closeBizModal()" aria-label="Close Business verification modal" class="absolute -top-2.5 -right-2.5 sm:-top-3 sm:-right-3 w-8 h-8 sm:w-9 sm:h-9 bg-white border border-slate-200 text-slate-700 hover:text-darkBlue rounded-full shadow-xl flex items-center justify-center font-bold z-20 transition hover:scale-105">
      ✕
    </button>

    <!-- REALISTIC & COMPACT REGISTRATION CERTIFICATE VISUAL MODAL -->
    <div id="biz-card-preview" class="relative w-full bg-gradient-to-tr from-[#fcf6e8] via-[#fdfbf7] to-[#f4eada] border-2 border-[#855d18]/25 rounded-2xl sm:rounded-[2rem] p-4 sm:p-6 shadow-2xl space-y-3 sm:space-y-4 overflow-hidden text-slate-800 font-sans">
      
      <!-- Emblem/Watermark -->
      <div class="absolute -right-8 -bottom-8 w-40 h-40 rounded-full border-[10px] border-[#855d18]/5 pointer-events-none flex items-center justify-center">
        <span class="text-5xl opacity-[0.07]">💼</span>
      </div>

      <!-- Header: Official Bilingual Header -->
      <div class="flex items-center justify-between border-b border-[#855d18]/15 pb-2.5">
        <div class="flex items-center gap-2 sm:gap-3">
          <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg bg-gradient-to-b from-[#855d18] to-[#593d0d] text-accentYellow flex items-center justify-center shadow-sm border border-amber-300/40 shrink-0">
            <span class="text-base sm:text-lg">🏛️</span>
          </div>
          <div>
            <h4 id="biz-card-header-main" class="text-[10px] sm:text-xs font-black text-[#593d0d] uppercase tracking-wider leading-none">भारत सरकार / GOVERNMENT OF INDIA</h4>
            <p id="biz-card-header-sub" class="text-[8.5px] sm:text-[9px] font-extrabold text-slate-600 uppercase tracking-widest mt-0.5">सूक्ष्म, लघु एवं मध्यम उद्यम मंत्रालय / MINISTRY OF MSME & GST</p>
          </div>
        </div>
      </div>

      <!-- Details Grid -->
      <div class="grid grid-cols-2 gap-2.5 sm:gap-3 text-left pt-0.5">
        <!-- Business Name -->
        <div class="col-span-2">
          <span id="biz-card-name-title" class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">उद्यम का नाम / Enterprise Trade Name</span>
          <h4 id="biz-card-name" class="font-display font-black text-xs sm:text-sm text-[#593d0d] uppercase tracking-wide leading-tight mt-0.5">AAVIVACRED ENTERPRISES</h4>
        </div>

        <!-- Registration Number -->
        <div class="col-span-2 sm:col-span-1">
          <span id="biz-card-reg-title" class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">पंजीकरण संख्या / Registration Number</span>
          <div class="inline-block px-3 py-1 bg-white/80 border border-slate-300 rounded-lg shadow-inner mt-0.5">
            <h5 id="biz-card-reg" class="font-mono font-black text-xs sm:text-sm text-[#593d0d] uppercase tracking-widest">UDYAM-DL-01-0012345</h5>
          </div>
        </div>

        <!-- Registration Status -->
        <div class="col-span-2 sm:col-span-1">
          <span class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">स्थिति / Registration Status</span>
          <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-buddyGreen/10 border border-buddyGreen/20 rounded-full text-buddyGreen text-[10px] font-black uppercase tracking-wider mt-1 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-buddyGreen/100 animate-pulse"></span>
            <span id="biz-card-status">ACTIVE / सक्रिय</span>
          </div>
        </div>

        <!-- Enterprise Type -->
        <div>
          <span id="biz-card-type-title" class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">प्रकार / Type of Enterprise</span>
          <h5 id="biz-card-type" class="font-extrabold text-[11px] sm:text-xs text-slate-800 uppercase leading-tight mt-0.5">MICRO SERVICES</h5>
        </div>

        <!-- Major Activity -->
        <div>
          <span id="biz-card-activity-title" class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">मुख्य गतिविधि / Major Activity</span>
          <h5 id="biz-card-activity" class="font-extrabold text-[11px] sm:text-xs text-slate-800 mt-0.5">SERVICES</h5>
        </div>

        <!-- Organization Type -->
        <div>
          <span id="biz-card-org-title" class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">संगठन प्रकार / Org Type</span>
          <h5 id="biz-card-org" class="font-extrabold text-[11px] sm:text-xs text-slate-800 mt-0.5">PROPRIETARY</h5>
        </div>

        <!-- Date of Commencement -->
        <div>
          <span id="biz-card-commence-title" class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">आरंभ तिथि / Commencement Date</span>
          <h5 id="biz-card-commence" class="font-extrabold text-[11px] sm:text-xs text-slate-800 mt-0.5">15/04/2021</h5>
        </div>

        <!-- Contact Mobile -->
        <div id="biz-card-mobile-container" class="col-span-2 sm:col-span-1">
          <span id="biz-card-mobile-title" class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">पंजीकृत मोबाइल / Registered Mobile</span>
          <h5 id="biz-card-mobile" class="font-extrabold text-[11px] sm:text-xs text-slate-800 mt-0.5">98*****905</h5>
        </div>

        <!-- Address/State -->
        <div class="col-span-2">
          <span id="biz-card-state-title" class="text-[8.5px] font-black text-slate-500 uppercase tracking-wider block">व्यवसाय का स्थान / Business Location</span>
          <h5 id="biz-card-state" class="font-extrabold text-[10px] sm:text-xs text-slate-800 leading-tight mt-0.5">DELHI, INDIA</h5>
        </div>
      </div>

      <!-- Action Button -->
      <button type="button" onclick="confirmBizAndContinue()" class="w-full bg-gradient-to-r from-primary to-[#053d60] hover:from-darkBlue hover:to-primary text-white py-2.5 sm:py-3 px-4 rounded-xl font-extrabold text-xs flex items-center justify-center gap-2 shadow-md hover:scale-[1.02] transition-all active:scale-95 mt-2">
        <span>Confirm Details & Continue</span> <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-accentYellow"></i>
      </button>

    </div>
  </div>
</div>

<!-- RESUME OR START FRESH MODAL -->
<div id="resume-modal" class="fixed inset-0 bg-[#021435]/80 backdrop-blur-md z-50 flex items-center justify-center p-4 hidden opacity-0 transition-all duration-300">
  <div class="bg-white border border-slate-200/90 rounded-[2.5rem] p-6 sm:p-10 max-w-md w-full text-center space-y-6 shadow-2xl step-slide-enter">
    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto text-primary animate-pulse">
      <i data-lucide="history" class="w-8 h-8"></i>
    </div>
    
    <div class="space-y-2">
      <h3 class="font-display font-black text-xl sm:text-2xl text-darkBlue">Resume Application?</h3>
      <p class="text-xs sm:text-sm text-slate-500 font-semibold leading-relaxed">
        We found an incomplete application from your earlier session. Would you like to resume where you left off or start fresh?
      </p>
    </div>

    <div class="flex flex-col gap-3 pt-2">
      <button type="button" onclick="resumeJourney()" class="w-full bg-gradient-to-r from-primary to-[#053d60] hover:from-darkBlue hover:to-primary text-white py-3.5 px-6 rounded-2xl font-black text-sm shadow-lg shadow-primary/20 hover:scale-[1.02] transition-all active:scale-[0.98]">
        Resume Saved Application
      </button>
      <button type="button" onclick="startFreshJourney()" class="w-full bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 py-3.5 px-6 rounded-2xl font-black text-sm hover:scale-[1.02] transition-all active:scale-[0.98]">
        Start Fresh / Clear
      </button>
    </div>
  </div>
</div>

<!-- MAIN APPLICATION PAGE CONTAINER -->
<div class="bg-slate-50 min-h-screen <?php echo $submitted ? 'pt-24 sm:pt-28 pb-16' : 'pt-24 pb-32 sm:pb-24'; ?> relative overflow-hidden">
  
  <!-- HERO BRAND NAVY ARCH BACKDROP -->
  <div class="absolute top-0 left-0 right-0 <?php echo $submitted ? 'h-[240px] sm:h-[260px]' : 'h-[380px]'; ?> bg-gradient-to-b from-darkBlue via-darkBlueLight to-darkBlue text-white z-0 overflow-hidden transition-all duration-300">
    <div class="absolute -top-20 left-1/2 -translate-x-1/2 w-[900px] h-[300px] bg-primary/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-10 right-[10%] w-72 h-72 bg-accentYellow/10 rounded-full blur-2xl pointer-events-none"></div>
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-accentYellow/30 to-transparent"></div>
  </div>

  <div class="container mx-auto px-4 max-w-4xl relative z-10">
    
    <?php if (!$submitted): ?>

    <!-- CENTERED TOP HEADER -->
    <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10 space-y-3 pt-2 sm:pt-4">
      <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/10 border border-white/20 backdrop-blur-md rounded-full shadow-lg">
        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
        <span class="text-[10.5px] font-black text-accentYellow uppercase tracking-widest">Fast Track Loan Sourcing</span>
      </div>

      <h1 class="font-display text-2.5xl sm:text-4xl md:text-5xl font-black text-white leading-tight">
        Apply for Your Loan in <span class="text-accentYellow font-black">Minutes</span>
      </h1>

      <p class="text-slate-300 text-xs sm:text-sm font-semibold max-w-lg mx-auto leading-relaxed">
        Complete your application in simple steps with quick verification, paperless processing, and instant approval.
      </p>
    </div>

    <!-- CENTERED MULTI-STEP FORM CARD -->
    <div class="max-w-2xl mx-auto">
      <div class="apply-card rounded-[2rem] sm:rounded-[2.5rem] p-4 sm:p-10 md:p-12 relative overflow-hidden">
        
        <!-- TOP PROGRESS HEADER -->
        <div class="mb-8 border-b border-slate-100 pb-6 space-y-4">
          <div class="flex justify-between items-center text-xs font-bold">
            <span id="step-counter" class="bg-darkBlue text-accentYellow border border-accentYellow/20 px-3 py-0.5 sm:px-3.5 sm:py-1 rounded-full text-[10px] sm:text-[11px] font-black uppercase tracking-wider shadow-sm">STEP 1 OF 8</span>
            <span id="est-time" class="text-slate-500 flex items-center gap-1 font-extrabold text-[11px] sm:text-xs"><i data-lucide="clock" class="w-3.5 h-3.5 text-primary"></i> ~ 2 Mins Remaining</span>
          </div>

          <!-- Animated Progress Bar (hidden on desktop because of modern stepper) -->
          <div class="w-full bg-slate-100 rounded-full h-1.5 overflow-hidden shadow-inner sm:hidden">
            <div id="step-progress-bar" class="bg-gradient-to-r from-darkBlue via-primary to-accentYellow h-full rounded-full transition-all duration-500 ease-out" style="width: 12.5%;"></div>
          </div>

          <!-- Modern Horizontal Progress Timeline for Desktop -->
          <div class="hidden sm:block pt-2 pb-6">
            <div class="relative flex items-center justify-between">
              <!-- Background connecting line -->
              <div class="absolute left-4 right-4 h-0.5 bg-slate-100 z-0"></div>
              <!-- Active/Completed progress fill line -->
              <div id="timeline-progress-fill" class="absolute left-4 h-0.5 bg-gradient-to-r from-darkBlue via-primary to-accentYellow z-0 transition-all duration-500 ease-out" style="width: 0%;"></div>

              <!-- Circles & Labels -->
              <?php
              $steps = [
                1 => ['icon' => 'phone', 'label' => 'Contact'],
                2 => ['icon' => 'indian-rupee', 'label' => 'Loan'],
                3 => ['icon' => 'user', 'label' => 'Profile'],
                4 => ['icon' => 'credit-card', 'label' => 'PAN'],
                5 => ['icon' => 'fingerprint', 'label' => 'Aadhaar'],
                6 => ['icon' => 'briefcase', 'label' => 'Business'],
                7 => ['icon' => 'landmark', 'label' => 'Bank'],
                8 => ['icon' => 'upload-cloud', 'label' => 'Docs'],
              ];
              foreach ($steps as $idx => $s):
              ?>
              <div class="relative flex flex-col items-center group z-10">
                <div id="step-dot-<?php echo $idx; ?>" class="w-8 h-8 rounded-full bg-white border-2 border-slate-200 flex items-center justify-center text-slate-400 transition-all duration-300 shadow-sm">
                  <i data-lucide="<?php echo $s['icon']; ?>" class="w-3.5 h-3.5"></i>
                </div>
                <span id="st-lbl-<?php echo $idx; ?>" class="absolute top-10 text-[9px] font-extrabold text-slate-400 uppercase tracking-wider whitespace-nowrap transition-colors duration-300">
                  <?php echo $s['label']; ?>
                </span>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Mobile Compact Active Step Badge (< sm screens) -->
          <div class="flex sm:hidden items-center justify-between text-xs pt-1 border-t border-slate-100/60 mt-2">
            <span id="mobile-current-step-name" class="font-black text-primary text-[11px] uppercase tracking-wider">Step 1: Contact Verification</span>
            <span id="mobile-step-count" class="text-[10px] font-extrabold text-slate-400">1 / 8</span>
          </div>
        </div>

        <!-- MULTI-STEP FORM -->
        <form id="apply-form" method="POST" action="apply.php" enctype="multipart/form-data">
          <?php echo \AavivaCred\Security\Security::csrfField(); ?>
          <input type="hidden" id="input-business-name" name="business_name" value="<?php echo htmlspecialchars($values['business_name'] ?? ''); ?>">
          <input type="hidden" id="input-legal-owner-name" name="legal_owner_name" value="<?php echo htmlspecialchars($values['legal_owner_name'] ?? ''); ?>">
          <input type="hidden" id="input-business-nature" name="business_nature" value="<?php echo htmlspecialchars($values['business_nature'] ?? ''); ?>">
          <input type="hidden" id="input-organization-type" name="organization_type" value="<?php echo htmlspecialchars($values['organization_type'] ?? ''); ?>">
          <input type="hidden" id="input-gst-turnover" name="gst_turnover" value="<?php echo htmlspecialchars($values['gst_turnover'] ?? ''); ?>">
          <input type="hidden" id="input-business-address" name="business_address" value="<?php echo htmlspecialchars($values['business_address'] ?? ''); ?>">
          <input type="hidden" id="input-aadhaar-ref-id" name="aadhaar_ref_id" value="<?php echo htmlspecialchars($values['aadhaar_ref_id'] ?? ($_SESSION['last_aadhaar_ref'] ?? '')); ?>">

          <!-- STEP 1: CONTACT VERIFICATION -->
          <div id="step-1" class="step-container space-y-6 text-left">
            <div class="space-y-1">
              <h3 class="font-display font-black text-lg sm:text-xl text-darkBlue">Verify Contact Information</h3>
              <p class="text-xs text-slate-500 font-semibold">Verify your mobile and email first to register your application.</p>
            </div>

            <div id="sub-mobile-box" class="space-y-4">
              <div class="space-y-1.5">
                <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Mobile Number *</label>
                <div class="flex items-center bg-white border border-slate-200 hover:border-slate-300 rounded-2xl overflow-hidden focus-within:border-[#0284c7] focus-within:ring-4 focus-within:ring-[#0284c7]/8 transition-all shadow-sm">
                  <div class="flex items-center gap-1 px-3 sm:px-4 py-3.5 border-r border-slate-200 bg-slate-50 text-slate-700 font-black text-sm select-none shrink-0">
                    <span class="text-base">🇮🇳</span> <span>+91</span>
                  </div>
                  <input type="tel" id="input-mobile" name="mobile" maxlength="10" autocomplete="tel" 
                    value="<?php echo htmlspecialchars($values['mobile']); ?>" 
                    class="w-full bg-transparent px-3 sm:px-4 py-3.5 text-base font-semibold text-darkBlue tracking-wider focus:outline-none" 
                    placeholder="98765 43210" />
                </div>
                <p id="err-mobile" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1 mt-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter a valid 10-digit mobile number</p>
              </div>

              <div class="space-y-1.5">
                <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Email Address *</label>
                <div class="flex items-center bg-white border border-slate-200 hover:border-slate-300 rounded-2xl overflow-hidden focus-within:border-[#0284c7] focus-within:ring-4 focus-within:ring-[#0284c7]/8 transition-all shadow-sm">
                  <div class="flex items-center gap-1 px-3 sm:px-4 py-3.5 border-r border-slate-200 bg-slate-50 text-slate-700 font-black text-sm select-none shrink-0">
                    <i data-lucide="mail" class="w-4 h-4 text-slate-500"></i>
                  </div>
                  <input type="email" id="input-email-step1" autocomplete="email" 
                    value="<?php echo htmlspecialchars($values['email']); ?>" 
                    class="w-full bg-transparent px-3 sm:px-4 py-3.5 text-base font-semibold text-darkBlue focus:outline-none" 
                    placeholder="rahul@example.com" />
                </div>
                <p id="err-email-step1" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1 mt-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter a valid email address</p>
              </div>

              <button type="button" onclick="sendEmailOTP()" class="w-full bg-gradient-to-r from-[#021435] via-[#0b2447] to-[#021435] hover:from-[#0b2447] hover:to-[#021435] text-white py-3.5 sm:py-4 px-6 rounded-2xl font-black text-xs sm:text-sm flex items-center justify-center gap-2 shadow-xl hover:shadow-2xl border border-accentYellow/20 transition active:scale-[0.98]">
                <span>Send Verification Code</span> <i data-lucide="arrow-right" class="w-4 h-4 text-accentYellow"></i>
              </button>
            </div>

            <div id="sub-otp-box" class="hidden space-y-5 border-t border-slate-100 pt-5">
              <p class="text-xs font-semibold text-darkBlue">Enter 6-digit OTP sent to <span id="disp-email" class="text-primary font-black">your email</span></p>
              
              <div class="flex items-center justify-center gap-1.5 sm:gap-2 max-w-xs mx-auto w-full">
                <input type="text" maxlength="1" class="otp-box" oninput="otpNext(this, 1)" onkeydown="otpBack(event, 1)" id="otp-1" autofocus />
                <input type="text" maxlength="1" class="otp-box" oninput="otpNext(this, 2)" onkeydown="otpBack(event, 2)" id="otp-2" />
                <input type="text" maxlength="1" class="otp-box" oninput="otpNext(this, 3)" onkeydown="otpBack(event, 3)" id="otp-3" />
                <input type="text" maxlength="1" class="otp-box" oninput="otpNext(this, 4)" onkeydown="otpBack(event, 4)" id="otp-4" />
                <input type="text" maxlength="1" class="otp-box" oninput="otpNext(this, 5)" onkeydown="otpBack(event, 5)" id="otp-5" />
                <input type="text" maxlength="1" class="otp-box" oninput="otpNext(this, 6)" onkeydown="otpBack(event, 6)" id="otp-6" />
              </div>
              <p id="err-otp" class="text-[11px] text-buddyRed font-bold hidden flex items-center justify-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Invalid OTP entered. Try again.</p>

              <div class="flex justify-between items-center text-xs font-bold px-1">
                <span id="timer-text" class="text-slate-500">Resend code in <strong id="resend-timer" class="text-primary">30s</strong></span>
                <button type="button" id="btn-resend" onclick="sendEmailOTP()" disabled class="text-slate-400 hover:text-primary disabled:opacity-50">Resend OTP</button>
              </div>

              <button type="button" onclick="verifyOTP()" class="w-full bg-buddyGreen hover:bg-[#159a63] text-white py-3.5 sm:py-4 px-6 rounded-2xl font-extrabold text-xs sm:text-sm flex items-center justify-center gap-2 shadow-md hover:shadow-lg hover:scale-102 transition-all active:scale-[0.98]">
                <span>Verify OTP & Continue</span> <i data-lucide="check-circle" class="w-4 h-4 text-accentYellow"></i>
              </button>
            </div>
          </div>

          <!-- STEP 2: LOAN REQUIREMENTS -->
          <div id="step-2" class="step-container space-y-6 text-left hidden">
            <div class="space-y-1">
              <h3 class="font-display font-black text-xl text-darkBlue">Loan Requirements</h3>
              <p class="text-xs text-slate-500 font-semibold">Select the loan product and your required capital.</p>
            </div>

            <div class="space-y-4">
              <div class="space-y-1.5">
                <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Loan Product *</label>
                <select id="input-category" name="category" class="premium-input">
                  <option value="payday" <?php echo ($values['category'] === 'payday' || $values['category'] === 'personal') ? 'selected' : ''; ?>>Personal Loan / Short Term</option>
                  <option value="business" <?php echo ($values['category'] === 'business') ? 'selected' : ''; ?>>Business Loan</option>
                  <option value="home_loan" <?php echo ($values['category'] === 'home_loan') ? 'selected' : ''; ?>>Home Loan / Mortgage</option>
                  <option value="mutual_fund" <?php echo ($values['category'] === 'mutual_fund' || $values['category'] === 'gold') ? 'selected' : ''; ?>>Gold / Securities Loan</option>
                  <option value="edi" <?php echo ($values['category'] === 'edi') ? 'selected' : ''; ?>>EDI Loan</option>
                </select>
              </div>

              <!-- Required Loan Amount Input Field -->
              <div class="space-y-1.5 pt-1">
                <div class="flex justify-between items-center">
                  <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Required Loan Amount (₹) *</label>
                  <span id="amount-formatted" class="text-xs font-black text-primary">₹50,000</span>
                </div>
                
                <div class="flex items-center bg-white border border-slate-200 hover:border-slate-300 rounded-2xl overflow-hidden focus-within:border-[#0284c7] focus-within:ring-4 focus-within:ring-[#0284c7]/8 transition-all shadow-sm">
                  <div class="flex items-center justify-center px-4 py-3.5 border-r border-slate-200 bg-slate-50 text-slate-700 font-black text-base select-none shrink-0">
                    <span>₹</span>
                  </div>
                  <input type="number" id="input-amount" name="loan_amount" min="10000" max="10000000" step="5000"
                    value="<?php echo intval($values['loan_amount'] ?: 50000); ?>"
                    oninput="updateAmountDisplay(this.value)"
                    class="w-full bg-transparent px-4 py-3.5 text-base font-black text-darkBlue focus:outline-none" />
                </div>
                <p id="err-amount" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter loan amount between ₹10,000 and ₹1,00,00,000</p>
              </div>

              <!-- Fast Amount Quick Chips -->
              <div class="flex flex-wrap gap-2 pt-1">
                <button type="button" onclick="setQuickAmount(25000)" class="px-3 py-1.5 bg-primary/5 hover:bg-primary/10 border border-primary/10 rounded-xl text-xs font-bold text-primary transition">₹25K</button>
                <button type="button" onclick="setQuickAmount(50000)" class="px-3 py-1.5 bg-primary/5 hover:bg-primary/10 border border-primary/10 rounded-xl text-xs font-bold text-primary transition">₹50K</button>
                <button type="button" onclick="setQuickAmount(100000)" class="px-3 py-1.5 bg-primary/5 hover:bg-primary/10 border border-primary/10 rounded-xl text-xs font-bold text-primary transition">₹1 Lakh</button>
                <button type="button" onclick="setQuickAmount(250000)" class="px-3 py-1.5 bg-primary/5 hover:bg-primary/10 border border-primary/10 rounded-xl text-xs font-bold text-primary transition">₹2.5 Lakh</button>
                <button type="button" onclick="setQuickAmount(500000)" class="px-3 py-1.5 bg-primary/5 hover:bg-primary/10 border border-primary/10 rounded-xl text-xs font-bold text-primary transition">₹5 Lakh</button>
              </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row sm:justify-between items-center gap-3 sm:gap-0 pt-4 border-t border-slate-100">
              <button type="button" onclick="goToStep(1)" class="w-full sm:w-auto text-center justify-center text-slate-500 hover:text-darkBlue font-extrabold text-xs flex items-center justify-center gap-1 py-2 sm:py-0 transition-all">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back
              </button>

              <button type="button" onclick="validateStep2()" class="w-full sm:w-auto justify-center bg-gradient-to-r from-primary to-[#053d60] hover:from-darkBlue hover:to-primary text-white py-3.5 px-6 rounded-2xl font-extrabold text-xs flex items-center gap-2 shadow-md hover:shadow-lg hover:scale-105 transition-all active:scale-95">
                <span>Continue</span> <i data-lucide="arrow-right" class="w-4 h-4 text-accentYellow"></i>
              </button>
            </div>
          </div>

          <!-- STEP 3: PROFILE DETAILS -->
          <div id="step-3" class="step-container space-y-6 text-left hidden">
            <div class="space-y-1">
              <h3 class="font-display font-black text-xl text-darkBlue">Personal & Professional Profile</h3>
              <p class="text-xs text-slate-500 font-semibold">Provide your details to customize your credit scoring.</p>
            </div>

            <div class="space-y-4">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="space-y-1.5">
                  <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Full Name *</label>
                  <input type="text" id="input-name" name="name" 
                    value="<?php echo htmlspecialchars($values['name']); ?>" 
                    class="premium-input" 
                    placeholder="e.g. Rahul Sharma" />
                  <p id="err-name" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter your full name</p>
                </div>

                <div class="space-y-1.5">
                  <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">City of Residence *</label>
                  <input type="text" id="input-city" name="city" 
                    value="<?php echo htmlspecialchars($values['city']); ?>" 
                    class="premium-input" 
                    placeholder="e.g. New Delhi" />
                  <p id="err-city" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter your city</p>
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="space-y-1.5">
                  <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Employment Type *</label>
                  <select id="input-employment" name="employment_type" class="premium-input">
                    <option value="Salaried" <?php echo ($values['employment_type'] === 'Salaried') ? 'selected' : ''; ?>>Salaried Professional</option>
                    <option value="Self Employed" <?php echo ($values['employment_type'] === 'Self Employed' || $values['employment_type'] === 'Business') ? 'selected' : ''; ?>>Self Employed Business Owner</option>
                  </select>
                </div>

                <div class="space-y-1.5">
                  <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Monthly Income (₹) *</label>
                  <input type="number" id="input-income" name="monthly_income" 
                    value="<?php echo htmlspecialchars($values['monthly_income'] ?: '25000'); ?>" 
                    class="premium-input" 
                    placeholder="e.g. 35000" />
                  <p id="err-income" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter valid monthly income</p>
                </div>
              </div>

              <!-- Hidden email field to be submitted with form -->
              <input type="hidden" id="input-email" name="email" value="<?php echo htmlspecialchars($values['email']); ?>" />
            </div>

            <div class="flex flex-col-reverse sm:flex-row sm:justify-between items-center gap-3 sm:gap-0 pt-4 border-t border-slate-100">
              <button type="button" onclick="goToStep(2)" class="w-full sm:w-auto text-center justify-center text-slate-500 hover:text-darkBlue font-extrabold text-xs flex items-center justify-center gap-1 py-2 sm:py-0 transition-all">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back
              </button>

              <button type="button" onclick="validateStep3()" class="w-full sm:w-auto justify-center bg-gradient-to-r from-primary to-[#053d60] hover:from-darkBlue hover:to-primary text-white py-3.5 px-6 rounded-2xl font-extrabold text-xs flex items-center gap-2 shadow-md hover:shadow-lg hover:scale-105 transition-all active:scale-95">
                <span>Continue</span> <i data-lucide="arrow-right" class="w-4 h-4 text-accentYellow"></i>
              </button>
            </div>
          </div>

          <!-- STEP 4: PAN CARD VERIFICATION -->
          <div id="step-4" class="step-container space-y-6 text-left hidden">
            <div class="space-y-1">
              <h3 class="font-display font-black text-xl text-darkBlue">PAN Card Verification</h3>
              <p class="text-xs text-slate-500 font-semibold">Verify your PAN Card for identity verification.</p>
            </div>

            <div class="space-y-4">
              <!-- PAN Number Field -->
              <div class="space-y-1.5">
                <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">PAN Number *</label>
                <div class="relative flex items-center">
                  <input type="text" id="input-pan" name="pan_number" maxlength="10" 
                    value="<?php echo htmlspecialchars($values['pan_number'] ?? ''); ?>" 
                    oninput="handlePanInput(this)"
                    class="premium-input pl-4 pr-24 py-3.5 text-base font-black text-darkBlue tracking-widest uppercase" 
                    placeholder="ABCDE1234F" />
                  <button type="button" id="btn-verify-pan" onclick="verifyPan()" class="absolute right-2 px-4 py-2 bg-[#021435] hover:bg-[#0b2447] text-white text-xs font-black rounded-xl transition">Verify</button>
                </div>
                <p id="err-pan" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter a valid 10-character PAN number</p>
              </div>

              <!-- PAN Status Verification Badge -->
              <div id="pan-status-badge" class="hidden p-3.5 rounded-2xl bg-buddyGreen/10 border border-buddyGreen/20 text-buddyGreen text-xs font-bold flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2">
                  <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i>
                  <span>PAN Verified via NSDL / Income Tax Database</span>
                </div>
                <button type="button" onclick="openPanModal()" class="text-primary font-black underline text-xs">View Digital Card</button>
              </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row sm:justify-between items-center gap-3 sm:gap-0 pt-4 border-t border-slate-100">
              <button type="button" onclick="goToStep(3)" class="w-full sm:w-auto text-center justify-center text-slate-500 hover:text-darkBlue font-extrabold text-xs flex items-center justify-center gap-1 py-2 sm:py-0 transition-all">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back
              </button>

              <button type="button" onclick="validateStep4()" class="w-full sm:w-auto justify-center bg-gradient-to-r from-primary to-[#053d60] hover:from-darkBlue hover:to-primary text-white py-3.5 px-6 rounded-2xl font-extrabold text-xs flex items-center gap-2 shadow-md hover:shadow-lg hover:scale-105 transition-all active:scale-95">
                <span>Continue</span> <i data-lucide="arrow-right" class="w-4 h-4 text-accentYellow"></i>
              </button>
            </div>
          </div>

          <!-- STEP 5: AADHAAR E-KYC VERIFICATION -->
          <div id="step-5" class="step-container space-y-6 text-left hidden">
            <div class="space-y-1">
              <h3 class="font-display font-black text-xl text-darkBlue">Aadhaar e-KYC Verification</h3>
              <p class="text-xs text-slate-500 font-semibold">Verify your Aadhaar using government DigiLocker portal.</p>
            </div>

            <!-- PAN Details Panel (Display Name and Masked Aadhaar) -->
            <div class="bg-slate-50 border border-slate-200/65 rounded-3xl p-5 space-y-4 shadow-sm">
              <div class="flex justify-between items-center border-b border-slate-200/60 pb-3">
                <span class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">KYC Profile (from PAN)</span>
                <span class="bg-primary/10 text-primary text-[10px] font-black px-2.5 py-0.5 rounded-full uppercase">Linked</span>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">PAN Holder Name</label>
                  <span id="aadhaar-pan-name" class="text-sm font-black text-darkBlue">-</span>
                </div>
                <div>
                  <label class="block text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Registered Aadhaar Pattern</label>
                  <span id="aadhaar-pan-mask" class="text-sm font-black text-darkBlue font-mono">-</span>
                </div>
              </div>
            </div>

            <div class="space-y-4">
              <!-- Aadhaar Input Field -->
              <div class="space-y-1.5 pt-2">
                <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Enter Aadhaar Number *</label>
                <div class="relative flex items-center">
                  <input type="text" id="input-aadhaar" name="aadhaar_number" maxlength="14" 
                    oninput="handleAadhaarInput(this)"
                    value="<?php echo htmlspecialchars($values['aadhaar_number'] ?? ''); ?>" 
                    class="premium-input pl-4 pr-4 py-3.5 text-base font-black text-darkBlue tracking-widest" 
                    placeholder="1234 5678 9012" />
                </div>
                <p id="err-aadhaar" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter a valid 12-digit Aadhaar number</p>
              </div>

              <!-- Aadhaar Status Verification Badge -->
              <div id="aadhaar-status-badge" class="hidden p-3.5 rounded-2xl bg-buddyGreen/10 border border-buddyGreen/20 text-buddyGreen text-xs font-bold flex items-center gap-2 shadow-sm">
                <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i>
                <span id="aadhaar-status-text">Aadhaar e-KYC Verified via UIDAI Engine</span>
              </div>
            </div>

            <div class="flex justify-between items-center pt-4 border-t border-slate-100">
              <button type="button" onclick="goToStep(4)" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center gap-1.5 transition">
                <i data-lucide="chevron-left" class="w-4 h-4"></i> Back
              </button>

              <!-- Verify Button (Shown when 12 digits are entered) -->
              <button type="button" id="btn-submit-aadhaar" onclick="verifyAadhaarOnly()" class="hidden bg-[#021435] hover:bg-[#0b2447] text-white py-3.5 px-8 rounded-2xl font-black text-sm shadow-lg flex items-center gap-1.5 transition">
                <span>Submit</span> <i data-lucide="arrow-right" class="w-4 h-4 text-accentYellow"></i>
              </button>

              <!-- Continue Button (Shown only when Aadhaar is verified) -->
              <button type="button" id="btn-continue-aadhaar" onclick="validateStep5()" class="hidden bg-primary hover:bg-primaryHover text-white py-3 px-6 rounded-2xl font-bold text-sm shadow-lg shadow-primary/20 flex items-center gap-1 transition">
                <span>Continue</span> <i data-lucide="chevron-right" class="w-4 h-4"></i>
              </button>
            </div>
          </div>

          <!-- STEP 5: BUSINESS VERIFICATION (Conditional) -->
          <div id="step-6" class="step-container space-y-6 text-left hidden">
            <div class="space-y-1">
              <h3 class="font-display font-black text-xl text-darkBlue">Business Verification</h3>
              <p class="text-xs text-slate-500 font-semibold">Verify your business details to continue.</p>
            </div>

            <div class="space-y-5">
            <div class="space-y-5">
              <!-- Udyam Registration (Required/Optional for Business) -->
              <div class="space-y-1.5">
                <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Udyam Registration Number</label>
                <div class="relative flex items-center">
                  <input type="text" id="input-udyam" name="udyam_number" maxlength="19"
                    value="<?php echo htmlspecialchars(($values['udyam_number'] ?? '') ?: 'UDYAM-'); ?>" 
                    oninput="handleUdyamInput(this)"
                    class="premium-input pl-4 pr-24 py-3.5 text-base font-semibold text-darkBlue uppercase tracking-widest" 
                    placeholder="UDYAM-XX-00-0000000" />
                  <button type="button" id="btn-verify-udyam" onclick="verifyUdyamOnly()" class="absolute right-2 px-4 py-2 bg-[#021435] hover:bg-[#0b2447] text-white text-xs font-black rounded-xl transition">Verify</button>
                </div>
                <p class="text-[10px] text-slate-400 font-bold mt-1">Format Guide: UDYAM-XX-00-0000000 (e.g., UDYAM-UP-29-0196409)</p>
                <p id="err-udyam" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter a valid Udyam Registration number</p>
              </div>

              <!-- Udyam Verified Badge -->
              <div id="udyam-status-badge" class="hidden p-3.5 rounded-2xl bg-buddyGreen/10 border border-buddyGreen/20 text-buddyGreen text-xs font-bold flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2">
                  <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i>
                  <span id="udyam-status-text">Udyam Verified Successfully</span>
                </div>
                <button type="button" onclick="openBizModal('udyam')" class="text-primary font-black underline text-xs">View Info</button>
              </div>

              <!-- GSTIN Number Verification -->
              <div class="space-y-1.5">
                <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">GSTIN Number (GST Verification)</label>
                <div class="relative flex items-center">
                  <input type="text" id="input-gst" name="gst_number" maxlength="15"
                    value="<?php echo htmlspecialchars($values['gst_number'] ?? ''); ?>" 
                    oninput="handleGstInput(this)"
                    class="premium-input pl-4 pr-24 py-3.5 text-base font-semibold text-darkBlue uppercase tracking-widest" 
                    placeholder="07AAAAA1111A1Z1" />
                  <button type="button" id="btn-verify-gst" onclick="verifyGstOnly()" class="absolute right-2 px-4 py-2 bg-[#021435] hover:bg-[#0b2447] text-white text-xs font-black rounded-xl transition">Verify</button>
                </div>
                <p id="err-gst" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter a valid 15-character GSTIN</p>
              </div>

              <!-- GST Verified Badge -->
              <div id="gst-status-badge" class="hidden p-3.5 rounded-2xl bg-buddyGreen/10 border border-buddyGreen/20 text-buddyGreen text-xs font-bold flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-2">
                  <i data-lucide="building" class="w-4 h-4 text-emerald-600"></i>
                  <span id="gst-status-text">GSTIN Verified Successfully</span>
                </div>
                <button type="button" onclick="openBizModal('gst')" class="text-primary font-black underline text-xs">View Info</button>
              </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row sm:justify-between items-center gap-3 sm:gap-0 pt-4 border-t border-slate-100">
              <button type="button" onclick="goToStep(4)" class="w-full sm:w-auto text-center justify-center text-slate-500 hover:text-darkBlue font-extrabold text-xs flex items-center justify-center gap-1 py-2 sm:py-0 transition-all">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back
              </button>

              <button type="button" onclick="validateStep6()" class="w-full sm:w-auto justify-center bg-gradient-to-r from-primary to-[#053d60] hover:from-darkBlue hover:to-primary text-white py-3.5 px-6 rounded-2xl font-extrabold text-xs flex items-center gap-2 shadow-md hover:shadow-lg hover:scale-105 transition-all active:scale-95">
                <span>Continue</span> <i data-lucide="arrow-right" class="w-4 h-4 text-accentYellow"></i>
              </button>
            </div>
          </div>

          <!-- STEP 6: BANK DETAILS -->
          <div id="step-7" class="step-container space-y-6 text-left hidden">
            <div class="space-y-1">
              <h3 class="font-display font-black text-xl text-darkBlue">Bank Account Details</h3>
              <p class="text-xs text-slate-500 font-semibold">Enter your bank account where the loan will be disbursed.</p>
            </div>

            <div class="space-y-4">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="space-y-1.5">
                  <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">IFSC Code *</label>
                  <input type="text" id="input-ifsc" name="ifsc_code" maxlength="11" 
                    value="<?php echo htmlspecialchars($values['ifsc_code'] ?? ''); ?>" 
                    oninput="handleIfscInput(this)"
                    class="w-full bg-white border border-slate-200 hover:border-slate-300 rounded-2xl px-4 py-3 text-sm font-semibold text-darkBlue uppercase tracking-widest focus:border-primary focus:outline-none transition shadow-sm" 
                    placeholder="HDFC0001234" />
                  <p id="err-ifsc" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter valid 11-character IFSC code</p>
                </div>

                <div class="space-y-1.5">
                  <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Bank Name *</label>
                  <input type="text" id="input-bank-name" name="bank_name" 
                    value="<?php echo htmlspecialchars($values['bank_name'] ?? ''); ?>" 
                    class="premium-input" 
                    placeholder="e.g. HDFC Bank" />
                </div>
              </div>

              <!-- IFSC Details Card -->
              <div id="ifsc-details-card" class="bg-slate-50 border border-slate-200/60 rounded-2xl p-4 hidden text-xs font-semibold text-slate-500 space-y-2">
                <div class="flex justify-between border-b border-slate-100 pb-1.5">
                  <span class="font-extrabold text-darkBlue uppercase tracking-wider text-[10px] flex items-center gap-1"><i data-lucide="landmark" class="w-3.5 h-3.5 text-primary"></i> Bank Details Verified</span>
                  <span class="text-emerald-600 font-extrabold flex items-center gap-0.5"><i data-lucide="check-circle" class="w-3 h-3"></i> IFSC MATCH</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                  <div><span class="font-extrabold text-darkBlue">Bank Name:</span> <span id="ifsc-bank-name">-</span></div>
                  <div><span class="font-extrabold text-darkBlue">Branch:</span> <span id="ifsc-branch-name">-</span></div>
                  <div><span class="font-extrabold text-darkBlue">City:</span> <span id="ifsc-city">-</span></div>
                  <div><span class="font-extrabold text-darkBlue">State:</span> <span id="ifsc-state">-</span></div>
                </div>
                <div class="pt-1.5 border-t border-slate-100"><span class="font-extrabold text-darkBlue">Branch Address:</span> <span id="ifsc-address">-</span></div>
              </div>

              <div class="space-y-1.5">
                <label class="block text-xs font-extrabold text-darkBlue uppercase tracking-wider">Account Number *</label>
                <input type="text" id="input-account-number" name="account_number" 
                  value="<?php echo htmlspecialchars($values['account_number'] ?? ''); ?>" 
                  class="w-full bg-white border border-slate-200 hover:border-slate-300 rounded-2xl px-4 py-3 text-sm font-semibold text-darkBlue tracking-wider focus:border-primary focus:outline-none transition shadow-sm" 
                  placeholder="50100012345678" />
                <p id="err-account-number" class="text-[11px] text-buddyRed font-bold hidden flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter valid account number</p>
              </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row sm:justify-between items-center gap-3 sm:gap-0 pt-4 border-t border-slate-100">
              <button type="button" onclick="goBackFromStep7()" class="w-full sm:w-auto text-center justify-center text-slate-500 hover:text-darkBlue font-extrabold text-xs flex items-center justify-center gap-1 py-2 sm:py-0 transition-all">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back
              </button>

              <button type="button" onclick="validateStep7()" class="w-full sm:w-auto justify-center bg-gradient-to-r from-primary to-[#053d60] hover:from-darkBlue hover:to-primary text-white py-3.5 px-6 rounded-2xl font-extrabold text-xs flex items-center gap-2 shadow-md hover:shadow-lg hover:scale-105 transition-all active:scale-95">
                <span>Continue</span> <i data-lucide="arrow-right" class="w-4 h-4 text-accentYellow"></i>
              </button>
            </div>
          </div>

          <!-- STEP 7: UPLOAD DOCUMENTS & SUBMIT -->
          <div id="step-8" class="step-container space-y-6 text-left hidden">
            <div class="space-y-1">
              <h3 class="font-display font-black text-xl text-darkBlue">Upload Documents & Submit</h3>
              <p class="text-xs text-slate-500 font-semibold">Upload clear copies of your KYC documents for instant approval.</p>
            </div>

            <div class="space-y-4">
              <div class="p-4 border border-dashed border-slate-300/80 hover:border-primary hover:bg-primary/5 rounded-2xl text-center space-y-2 bg-slate-50 transition cursor-pointer" onclick="document.getElementById('file-pan').click()">
                <i data-lucide="upload-cloud" class="w-8 h-8 text-primary mx-auto"></i>
                <p class="text-xs font-semibold text-darkBlue">Upload PAN Card Image / PDF</p>
                <input type="file" id="file-pan" name="doc_pan" accept="image/*,.pdf" class="hidden" onchange="updateFileLabel(this, 'lbl-pan')" />
                <span id="lbl-pan" class="text-[10px] font-semibold text-slate-400 block">No file selected</span>
              </div>

              <div class="p-4 border border-dashed border-slate-300/80 hover:border-primary hover:bg-primary/5 rounded-2xl text-center space-y-2 bg-slate-50 transition cursor-pointer" onclick="document.getElementById('file-aadhaar').click()">
                <i data-lucide="upload-cloud" class="w-8 h-8 text-primary mx-auto"></i>
                <p class="text-xs font-semibold text-darkBlue">Upload Aadhaar Front & Back</p>
                <input type="file" id="file-aadhaar" name="doc_aadhaar" accept="image/*,.pdf" class="hidden" onchange="updateFileLabel(this, 'lbl-aadhaar')" />
                <span id="lbl-aadhaar" class="text-[10px] font-semibold text-slate-400 block">No file selected</span>
              </div>

              <!-- Shop / Business Photo Upload (For Business & EDI Loans) -->
              <div id="shop-photo-upload-container" class="p-4 border border-dashed border-purple-300 hover:border-purple-600 hover:bg-purple-50/50 rounded-2xl text-center space-y-2 bg-purple-50/20 transition cursor-pointer" onclick="document.getElementById('file-shop').click()">
                <div class="flex items-center justify-center gap-1.5 text-purple-700">
                  <i data-lucide="store" class="w-6 h-6 text-purple-600"></i>
                  <span class="text-[10px] font-black uppercase tracking-wider bg-purple-100 text-purple-800 px-2 py-0.5 rounded-md">Business & EDI Loan</span>
                </div>
                <p class="text-xs font-extrabold text-darkBlue">Upload Shop / Business Location Photo (JPG / PNG / PDF)</p>
                <input type="file" id="file-shop" name="doc_shop" accept="image/*,.pdf" class="hidden" onchange="updateFileLabel(this, 'lbl-shop')" />
                <span id="lbl-shop" class="text-[10px] font-semibold text-slate-400 block">No file selected</span>
              </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row sm:justify-between items-center gap-3 sm:gap-0 pt-4 border-t border-slate-100">
              <button type="button" onclick="goBackFromStep7()" class="w-full sm:w-auto text-center justify-center text-slate-500 hover:text-darkBlue font-extrabold text-xs flex items-center justify-center gap-1 py-2 sm:py-0 transition-all">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back
              </button>

              <button type="submit" id="btn-final-submit" class="w-full sm:w-auto justify-center bg-accentYellow hover:bg-yellow-500 text-darkBlue py-3.5 px-6 sm:px-8 rounded-2xl font-black text-sm flex items-center gap-2 shadow-xl hover:shadow-2xl hover:scale-105 transition-all active:scale-[0.98]">
                <span>Submit Loan Application</span> <i data-lucide="check-circle" class="w-5 h-5 text-darkBlue"></i>
              </button>
            </div>
          </div>

        </form>

      </div>
    </div>



    <?php else: ?>

    <!-- ULTRA-ENHANCED COMPACT SUCCESS CARD -->
    <div class="max-w-md mx-auto text-center pt-2 sm:pt-6">
      <div class="bg-white/95 backdrop-blur-xl border border-slate-200/90 rounded-[2.2rem] p-6 sm:p-8 shadow-2xl shadow-[#021435]/15 space-y-5 relative overflow-hidden transition-all">
        
        <!-- Top Radiant Multi-Color Strip -->
        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-emerald-400 via-sky-400 via-amber-400 to-emerald-400"></div>

        <!-- Verified Pill Badge -->
        <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-buddyGreen/10 border border-buddyGreen/20/80 rounded-full text-buddyGreen text-[10.5px] font-black uppercase tracking-wider shadow-sm">
          <span class="w-2 h-2 rounded-full bg-buddyGreen/100 animate-pulse"></span>
          <span>Application Verified & Dispatched</span>
        </div>

        <!-- Glowing Emerald Checkmark Icon -->
        <div class="relative w-16 h-16 mx-auto flex items-center justify-center">
          <div class="absolute inset-0 bg-buddyGreen/100/20 rounded-2xl rotate-6 animate-pulse"></div>
          <div class="relative w-16 h-16 rounded-2xl bg-gradient-to-tr from-buddyGreen to-[#189b66] text-white flex items-center justify-center shadow-lg shadow-emerald-500/30 border-2 border-white">
            <i data-lucide="check-circle-2" class="w-8.5 h-8.5 stroke-[2.5]"></i>
          </div>
        </div>

        <!-- Title & Description with Color Highlights -->
        <div class="space-y-1">
          <h2 class="font-display font-black text-2.5xl text-[#021435]">Application Submitted!</h2>
          <p class="text-xs text-slate-500 font-semibold leading-relaxed">
            Thank you, <strong class="text-slate-900 font-black"><?php echo htmlspecialchars($values['name'] ?: 'Applicant'); ?></strong>. Your loan request of <span class="px-2 py-0.5 bg-buddyGreen/10 text-buddyGreen border border-buddyGreen/20 rounded-md font-mono font-black text-xs">₹<?php echo number_format(floatval($values['loan_amount'] ?: 50000)); ?></span> has been received.
          </p>
        </div>

        <!-- Premium Ticket-Style Reference Card -->
        <?php $refId = htmlspecialchars($_SESSION['last_lead_id'] ?? ('AVV-' . strtoupper(substr(md5(uniqid()), 0, 10)))); ?>
        <div class="bg-gradient-to-r from-slate-900 via-[#031d40] to-slate-900 text-white p-4 rounded-2xl text-left flex items-center justify-between gap-3 shadow-xl border border-white/10 relative overflow-hidden">
          <div class="absolute top-0 right-0 w-24 h-24 bg-accentYellow/10 rounded-full blur-xl pointer-events-none"></div>

          <div>
            <span class="text-[9px] font-black text-accentYellow uppercase tracking-widest block">Reference Number</span>
            <span class="font-mono font-black text-white text-sm sm:text-base tracking-wider"><?php echo $refId; ?></span>
          </div>

          <button type="button" onclick="copyRefCode('<?php echo $refId; ?>')" class="px-3.5 py-2 bg-accentYellow hover:bg-yellow-500 text-darkBlue rounded-xl text-xs font-extrabold transition hover:scale-105 active:scale-95 shadow-md flex items-center gap-1.5 shrink-0">
            <i data-lucide="copy" class="w-3.5 h-3.5"></i> <span id="lbl-copy">Copy</span>
          </button>
        </div>

        <!-- Quick 2-Trust Specs Bar -->
        <div class="flex items-center justify-center gap-4 text-[10.5px] text-slate-500 font-bold border-t border-slate-100 pt-3">
          <span class="flex items-center gap-1"><i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-500"></i> RBI Compliant</span>
          <span class="w-1 h-1 rounded-full bg-slate-300"></span>
          <span class="flex items-center gap-1"><i data-lucide="zap" class="w-3.5 h-3.5 text-amber-500"></i> Instant Sourcing</span>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-2.5 pt-1">
          <a href="https://wa.me/919711149319?text=Hi%20AavivaCred%20Support,%20my%20Loan%20Reference%20ID%20is%20<?php echo urlencode($refId); ?>" 
             target="_blank" rel="noopener noreferrer"
             class="w-full sm:w-1/2 bg-buddyGreen hover:bg-[#159a63] text-white py-3.5 px-4 rounded-xl font-extrabold text-xs flex items-center justify-center gap-1.5 shadow-md hover:scale-105 hover:shadow-lg transition-all active:scale-95">
            <i data-lucide="message-circle" class="w-4 h-4 text-emerald-100"></i> WhatsApp Support
          </a>

          <a href="<?php echo PATH_PREFIX; ?>index.php" 
             class="w-full sm:w-1/2 bg-gradient-to-r from-primary to-[#053d60] hover:from-darkBlue hover:to-primary text-white py-3.5 px-4 rounded-xl font-extrabold text-xs flex items-center justify-center gap-1.5 shadow-md hover:scale-105 hover:shadow-lg transition-all active:scale-95">
            <i data-lucide="home" class="w-4 h-4 text-accentYellow"></i> Back to Home
          </a>
        </div>

      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        if (typeof confetti === 'function') {
          confetti({ particleCount: 80, spread: 60, origin: { y: 0.6 } });
        }
      });

      function copyRefCode(code) {
        navigator.clipboard.writeText(code).then(() => {
          const lbl = document.getElementById('lbl-copy');
          if (lbl) {
            lbl.innerText = 'Copied!';
            setTimeout(() => lbl.innerText = 'Copy', 2000);
          }
        });
      }
    </script>

    <?php endif; ?>

  </div>
</div>

<script>
  let currentStep = 1;
  const stepTitles = [
    "Step 1: Contact Verification",
    "Step 2: Loan Requirements",
    "Step 3: Profile Details",
    "Step 4: PAN Card Verification",
    "Step 5: Aadhaar e-KYC Verification",
    "Step 6: Business Verification",
    "Step 7: Bank Details",
    "Step 8: Upload Documents"
  ];

  let isPanVerified = <?php echo (isset($_SESSION['pan_verified']) && $_SESSION['pan_verified']) ? 'true' : 'false'; ?>;
  let isAadhaarVerified = <?php echo (isset($_SESSION['aadhaar_verified']) && $_SESSION['aadhaar_verified']) ? 'true' : 'false'; ?>;
  let isUdyamVerified = <?php echo (isset($_SESSION['udyam_verified']) && $_SESSION['udyam_verified']) ? 'true' : 'false'; ?>;
  let isGstVerified = <?php echo (isset($_SESSION['gst_verified']) && $_SESSION['gst_verified']) ? 'true' : 'false'; ?>;
  let udyamData = <?php echo isset($_SESSION['udyam_data']) ? json_encode($_SESSION['udyam_data']) : 'null'; ?>;
  let gstData = <?php echo isset($_SESSION['gst_data']) ? json_encode($_SESSION['gst_data']) : 'null'; ?>;
  let panMaskedAadhaar = '<?php echo $_SESSION['pan_masked_aadhaar'] ?? ''; ?>';
  let isFormSubmitted = <?php echo $submitted ? 'true' : 'false'; ?>;

  function openPanModal() {
    const panModal = document.getElementById('pan-modal');
    if (panModal) {
      panModal.classList.remove('hidden');
      setTimeout(() => panModal.classList.remove('opacity-0'), 10);
    }

    const panName = document.getElementById('pan-card-name') ? document.getElementById('pan-card-name').innerText : '';
    const panAadhaar = document.getElementById('pan-card-aadhaar') ? document.getElementById('pan-card-aadhaar').innerText : '';

    const step5Name = document.getElementById('aadhaar-pan-name');
    const step5Mask = document.getElementById('aadhaar-pan-mask');

    if (step5Name) step5Name.innerText = panName || '-';
    if (step5Mask) {
      if (panAadhaar && panAadhaar !== 'N/A') {
        const cleanAadhaar = panAadhaar.replace(/\s+/g, '');
        let uiMask = '';
        if (cleanAadhaar.length >= 12) {
          const first2 = cleanAadhaar.substring(0, 2);
          const last2 = cleanAadhaar.substring(10, 12);
          uiMask = `${first2}xx xxxx xx${last2}`;
        } else {
          uiMask = panAadhaar;
        }
        step5Mask.innerText = uiMask;
      } else {
        step5Mask.innerText = 'Not Available';
      }
    }
  }

  function closePanModal() {
    const panModal = document.getElementById('pan-modal');
    if (panModal) {
      panModal.classList.add('opacity-0');
      setTimeout(() => panModal.classList.add('hidden'), 300);
    }
  }

  function confirmPanAndContinue() {
    const panModal = document.getElementById('pan-modal');
    if (panModal) {
      panModal.classList.add('opacity-0');
      setTimeout(() => {
        panModal.classList.add('hidden');
        validateStep4();
      }, 300);
    }
  }

  function openBizModal(type) {
    const bizModal = document.getElementById('biz-modal');
    if (!bizModal) return;

    if (type === 'udyam' && udyamData) {
      document.getElementById('biz-card-header-main').innerText = 'भारत सरकार / GOVERNMENT OF INDIA';
      document.getElementById('biz-card-header-sub').innerText = 'सूक्ष्म, लघु एवं मध्यम उद्यम मंत्रालय / MINISTRY OF MSME';
      document.getElementById('biz-card-name-title').innerText = 'उद्यम का नाम / Enterprise Name';
      document.getElementById('biz-card-name').innerText = udyamData.enterprise_name || 'N/A';
      document.getElementById('biz-card-type-title').innerText = 'प्रकार / Type of Enterprise';
      document.getElementById('biz-card-type').innerText = udyamData.enterprise_type || 'N/A';
      document.getElementById('biz-card-activity-title').innerText = 'मुख्य गतिविधि / Major Activity';
      document.getElementById('biz-card-activity').innerText = udyamData.major_activity || 'N/A';
      document.getElementById('biz-card-reg-title').innerText = 'पंजीकरण संख्या / Udyam Reg. Number';
      document.getElementById('biz-card-reg').innerText = udyamData.udyam_number || '';
      document.getElementById('biz-card-state-title').innerText = 'व्यवसाय का स्थान / MSME Location';
      document.getElementById('biz-card-state').innerText = udyamData.address || (udyamData.district + ', ' + udyamData.state) || 'N/A';

      document.getElementById('biz-card-status').innerText = 'ACTIVE / सक्रिय';
      document.getElementById('biz-card-org-title').innerText = 'संगठन प्रकार / Org Type';
      document.getElementById('biz-card-org').innerText = udyamData.organization_type || 'PROPRIETARY';
      document.getElementById('biz-card-commence-title').innerText = 'आरंभ तिथि / Commencement Date';
      document.getElementById('biz-card-commence').innerText = udyamData.commencement_date || 'N/A';
      
      const mobileContainer = document.getElementById('biz-card-mobile-container');
      if (mobileContainer) {
        mobileContainer.classList.remove('hidden');
        const mobileTitle = document.getElementById('biz-card-mobile-title');
        const mobileVal = document.getElementById('biz-card-mobile');
        if (mobileTitle) mobileTitle.innerText = 'पंजीकृत मोबाइल / Registered Mobile';
        if (mobileVal) mobileVal.innerText = udyamData.mobile_number || 'N/A';
      }
    } else if (type === 'gst' && gstData) {
      document.getElementById('biz-card-header-main').innerText = 'वस्तु एवं सेवा कर विभाग / DEPARTMENT OF GST';
      document.getElementById('biz-card-header-sub').innerText = 'वित्त मंत्रालय, भारत सरकार / MINISTRY OF FINANCE, GOVT OF INDIA';
      document.getElementById('biz-card-name-title').innerText = 'व्यवसाय का नाम / Trade & Legal Owner Name';
      
      let displayName = gstData.trade_name || '';
      if (gstData.legal_name) {
        if (displayName && displayName.toLowerCase() !== gstData.legal_name.toLowerCase()) {
          displayName += ' (' + gstData.legal_name + ')';
        } else if (!displayName) {
          displayName = gstData.legal_name;
        }
      }
      document.getElementById('biz-card-name').innerText = displayName || 'N/A';
      
      document.getElementById('biz-card-type-title').innerText = 'करदाता प्रकार / Taxpayer Type';
      document.getElementById('biz-card-type').innerText = gstData.tax_payer_type || 'REGULAR';
      
      document.getElementById('biz-card-activity-title').innerText = 'व्यापार गतिविधि / Nature of Business';
      let bizNature = '';
      if (Array.isArray(gstData.business_nature) && gstData.business_nature.length > 0) {
        bizNature = gstData.business_nature.join(', ');
      } else if (gstData.business_nature) {
        bizNature = gstData.business_nature;
      } else {
        bizNature = 'GENERAL BUSINESS';
      }
      document.getElementById('biz-card-activity').innerText = bizNature.toUpperCase();
      
      document.getElementById('biz-card-reg-title').innerText = 'जीएसटीआईएन / GSTIN';
      document.getElementById('biz-card-reg').innerText = gstData.gst_number || '';
      
      document.getElementById('biz-card-status').innerText = gstData.current_status ? gstData.current_status.toUpperCase() : 'ACTIVE / सक्रिय';
      
      document.getElementById('biz-card-org-title').innerText = 'संविधान / Constitution';
      document.getElementById('biz-card-org').innerText = gstData.business_constitution ? gstData.business_constitution.toUpperCase() : 'PROPRIETORSHIP';
      
      document.getElementById('biz-card-commence-title').innerText = 'पंजीकरण तिथि / Registration Date';
      document.getElementById('biz-card-commence').innerText = gstData.registration_date || 'N/A';
      
      // Annual Turnover Container
      const mobileContainer = document.getElementById('biz-card-mobile-container');
      if (mobileContainer) {
        mobileContainer.classList.remove('hidden');
        const mobileTitle = document.getElementById('biz-card-mobile-title');
        const mobileVal = document.getElementById('biz-card-mobile');
        if (mobileTitle) mobileTitle.innerText = 'वार्षिक कारोबार / Annual Turnover';
        if (mobileVal) mobileVal.innerText = gstData.aggre_turnover || 'Slab: Rs. 0 to 40 Lakh';
      }

      // Location Smart Fallback
      document.getElementById('biz-card-state-title').innerText = 'व्यवसाय का स्थान / Business Location & Jurisdiction';
      let locationText = '';
      if (gstData.address && gstData.address !== 'N/A' && gstData.address.trim() !== '') {
        locationText = gstData.address;
      } else {
        let parts = [];
        if (gstData.state_jurisdiction) {
          let sj = gstData.state_jurisdiction.replace(/^State\s*-\s*/i, '');
          parts.push(sj);
        }
        if (gstData.central_jurisdiction) {
          let cj = gstData.central_jurisdiction;
          let matchZone = cj.match(/Zone\s*-\s*([^,]+)/i);
          let matchDiv = cj.match(/Division\s*-\s*([^,]+)/i);
          if (matchZone) parts.push(matchZone[1].trim());
          if (matchDiv) parts.push(matchDiv[1].trim());
        }
        if (parts.length > 0) {
          locationText = parts.join(', ');
        } else {
          locationText = 'DELHI, INDIA';
        }
      }
      document.getElementById('biz-card-state').innerText = locationText.toUpperCase();
    }

    bizModal.classList.remove('hidden');
    setTimeout(() => bizModal.classList.remove('opacity-0'), 10);
  }

  function closeBizModal() {
    const bizModal = document.getElementById('biz-modal');
    if (bizModal) {
      bizModal.classList.add('opacity-0');
      setTimeout(() => bizModal.classList.add('hidden'), 300);
    }
  }

  function confirmBizAndContinue() {
    const bizModal = document.getElementById('biz-modal');
    if (bizModal) {
      bizModal.classList.add('opacity-0');
      setTimeout(() => {
        bizModal.classList.add('hidden');
        validateStep6();
      }, 300);
    }
  }

  function sendEmailOTP() {
    const mobileInput = document.getElementById('input-mobile');
    const emailInput = document.getElementById('input-email-step1');
    const errMobile = document.getElementById('err-mobile');
    const errEmail = document.getElementById('err-email-step1');
    
    const mobileVal = mobileInput.value.trim();
    const emailVal = emailInput.value.trim();

    let valid = true;

    if (!/^[6-9]\d{9}$/.test(mobileVal)) {
      errMobile.classList.remove('hidden');
      mobileInput.parentElement.classList.add('error-shake');
      setTimeout(() => mobileInput.parentElement.classList.remove('error-shake'), 400);
      valid = false;
    } else {
      errMobile.classList.add('hidden');
    }

    if (!/\S+@\S+\.\S+/.test(emailVal)) {
      errEmail.classList.remove('hidden');
      emailInput.parentElement.classList.add('error-shake');
      setTimeout(() => emailInput.parentElement.classList.remove('error-shake'), 400);
      valid = false;
    } else {
      errEmail.classList.add('hidden');
    }

    if (!valid) return;

    showTransitionLoader('Sending OTP...', 'Please wait...');
    fetch('<?php echo PATH_PREFIX; ?>send_otp.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ email: emailVal })
    })
    .then(r => r.json())
    .then(res => {
      hideTransitionLoader(() => {
        if (res && res.success) {
          document.getElementById('input-email').value = emailVal;
          document.getElementById('disp-email').innerText = emailVal;
          document.getElementById('sub-mobile-box').classList.add('hidden');
          document.getElementById('sub-otp-box').classList.remove('hidden');
          document.getElementById('otp-1').focus();
          startResendTimer();
        } else if (res && res.otp) {
          document.getElementById('input-email').value = emailVal;
          document.getElementById('disp-email').innerText = emailVal;
          document.getElementById('sub-mobile-box').classList.add('hidden');
          document.getElementById('sub-otp-box').classList.remove('hidden');
          document.getElementById('otp-1').focus();
          startResendTimer();
          alert('Note: SMTP Connection Error (' + res.message + '). \n\nFor testing/demo purposes, please use OTP: ' + res.otp);
        } else {
          alert('Error: ' + (res.message || 'Unable to send OTP. Please try again.'));
        }
      });
    })
    .catch(e => {
      console.error(e);
      hideTransitionLoader(() => {
        alert('Connection error. Failed to send OTP.');
      });
    });
  }

  function startResendTimer() {
    let seconds = 30;
    const timerEl = document.getElementById('resend-timer');
    const btnResend = document.getElementById('btn-resend');
    btnResend.disabled = true;

    const interval = setInterval(() => {
      seconds--;
      timerEl.innerText = seconds + 's';
      if (seconds <= 0) {
        clearInterval(interval);
        document.getElementById('timer-text').innerText = "Didn't receive code?";
        btnResend.disabled = false;
      }
    }, 1000);
  }

  function verifyOTP() {
    let otp = '';
    for (let i = 1; i <= 6; i++) {
      otp += (document.getElementById('otp-' + i).value || '');
    }

    if (otp.length < 6) {
      document.getElementById('err-otp').classList.remove('hidden');
      return;
    }

    document.getElementById('err-otp').classList.add('hidden');
    
    showTransitionLoader('Verifying OTP Code...', 'Validating Verification Session');
    fetch('<?php echo PATH_PREFIX; ?>verify_otp.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ otp: otp })
    })
    .then(r => r.json())
    .then(res => {
      hideTransitionLoader(() => {
        if (res && res.success) {
          goToStep(2);
        } else {
          document.getElementById('err-otp').innerText = res.message || 'Incorrect OTP. Try again.';
          document.getElementById('err-otp').classList.remove('hidden');
        }
      });
    })
    .catch(e => {
      console.error(e);
      hideTransitionLoader(() => {
        document.getElementById('err-otp').innerText = 'Verification connection failed. Please try again.';
        document.getElementById('err-otp').classList.remove('hidden');
      });
    });
  }

  function otpNext(el, idx) {
    if (el.value.length === 1 && idx < 6) {
      document.getElementById('otp-' + (idx + 1)).focus();
    }
  }

  function otpBack(e, idx) {
    if (e.key === 'Backspace' && !e.target.value && idx > 1) {
      document.getElementById('otp-' + (idx - 1)).focus();
    }
  }

  function setQuickAmount(amt) {
    const amountInput = document.getElementById('input-amount');
    amountInput.value = amt;
    updateAmountDisplay(amt);
  }

  function updateAmountDisplay(val) {
    const formatted = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 }).format(val);
    document.getElementById('amount-formatted').innerText = formatted;
  }

  function saveSessionState() {
    const getVal = (id) => {
      const el = document.getElementById(id);
      return el ? el.value.trim() : '';
    };

    const emailStep1 = getVal('input-email-step1');
    const hiddenEmail = getVal('input-email');
    const finalEmail = hiddenEmail || emailStep1;
    const emailEl = document.getElementById('input-email');
    if (emailEl && finalEmail) {
      emailEl.value = finalEmail;
    }

    const currentData = {
      mobile: getVal('input-mobile'),
      email: finalEmail,
      name: getVal('input-name'),
      city: getVal('input-city'),
      category: getVal('input-category'),
      loan_amount: getVal('input-amount'),
      employment_type: getVal('input-employment'),
      monthly_income: getVal('input-income'),
      pan_number: getVal('input-pan'),
      udyam_number: getVal('input-udyam'),
      gst_number: getVal('input-gst'),
      business_name: getVal('input-business-name'),
      legal_owner_name: getVal('input-legal-owner-name'),
      business_nature: getVal('input-business-nature'),
      organization_type: getVal('input-organization-type'),
      gst_turnover: getVal('input-gst-turnover'),
      business_address: getVal('input-business-address'),
      aadhaar_number: getVal('input-aadhaar'),
      aadhaar_ref_id: getVal('input-aadhaar-ref-id'),
      ifsc_code: getVal('input-ifsc'),
      bank_name: getVal('input-bank-name'),
      account_number: getVal('input-account-number')
    };

    fetch('<?php echo PATH_PREFIX; ?>pages/save_session_state.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(currentData)
    }).catch(err => console.error('saveSessionState error:', err));
  }

  function goToStep(stepNum) {
    saveSessionState();
    document.querySelectorAll('.step-container').forEach(el => el.classList.add('hidden'));
    const target = document.getElementById('step-' + stepNum);
    if (target) {
      target.classList.remove('hidden');
      target.classList.add('step-slide-enter');
    }

    currentStep = stepNum;
    document.getElementById('step-counter').innerText = `STEP ${stepNum} OF 8`;
    
    const bar = document.getElementById('step-progress-bar');
    if (bar) bar.style.width = ((stepNum / 8) * 100) + '%';

    // Mobile Step Badge Update
    const mobileStepName = document.getElementById('mobile-current-step-name');
    const mobileStepCount = document.getElementById('mobile-step-count');
    if (mobileStepName) mobileStepName.innerText = stepTitles[stepNum - 1];
    if (mobileStepCount) mobileStepCount.innerText = `${stepNum} / 8`;

    // Highlight timeline nodes
    const category = document.getElementById('input-category').value;
    const employment = document.getElementById('input-employment').value;
    const isBusinessSkipped = (category !== 'business' && category !== 'edi' && employment === 'Salaried');

    // Toggle shop photo upload container visibility for Business & EDI loans
    const shopBox = document.getElementById('shop-photo-upload-container');
    if (shopBox) {
      if (category === 'business' || category === 'edi') {
        shopBox.classList.remove('hidden');
      } else {
        shopBox.classList.add('hidden');
      }
    }

    // Update timeline progress fill line width
    const fillPercent = ((stepNum - 1) / 7) * 100;
    const progressFill = document.getElementById('timeline-progress-fill');
    if (progressFill) progressFill.style.width = fillPercent + '%';

    for (let i = 1; i <= 8; i++) {
      const dot = document.getElementById('step-dot-' + i);
      const lbl = document.getElementById('st-lbl-' + i);
      
      if (dot && lbl) {
        if (i === 6 && isBusinessSkipped) {
          lbl.className = 'absolute top-10 text-[9px] font-bold text-slate-300 line-through opacity-50';
          lbl.innerText = 'Business (Skip)';
          dot.className = 'w-8 h-8 rounded-full bg-slate-50 border-2 border-slate-200 text-slate-300 flex items-center justify-center opacity-50 shadow-inner';
        } else {
          if (i === 6) lbl.innerText = 'Business';
          
          if (i === stepNum) {
            dot.className = 'w-8 h-8 rounded-full bg-white border-2 border-[#0284c7] text-[#0284c7] flex items-center justify-center shadow-lg ring-4 ring-[#0284c7]/15 scale-110 transition-all duration-300';
            lbl.className = 'absolute top-10 text-[9px] font-black text-[#0284c7] uppercase tracking-wider scale-105';
          } else if (i < stepNum) {
            dot.className = 'w-8 h-8 rounded-full bg-emerald-600 border-2 border-emerald-600 text-white flex items-center justify-center shadow-md transition-all duration-300';
            lbl.className = 'absolute top-10 text-[9px] font-bold text-emerald-600 uppercase tracking-wider';
          } else {
            dot.className = 'w-8 h-8 rounded-full bg-white border-2 border-slate-200 text-slate-400 flex items-center justify-center shadow-sm transition-all duration-300';
            lbl.className = 'absolute top-10 text-[9px] font-extrabold text-slate-400 uppercase tracking-wider';
          }
        }
      }
    }

    if (window.lucide) lucide.createIcons();
    window.scrollTo({ top: 120, behavior: 'smooth' });
  }

  function validateStep2() {
    const amt = parseFloat(document.getElementById('input-amount').value || 0);

    if (amt < 10000 || amt > 10000000) {
      document.getElementById('err-amount').classList.remove('hidden');
      return;
    }
    document.getElementById('err-amount').classList.add('hidden');

    runLocalTransition('Saving Loan Configuration...', 'Initializing Sourcing Pipelines', () => {
      goToStep(3);
    });
  }

  function validateStep3() {
    const name = document.getElementById('input-name').value.trim();
    const city = document.getElementById('input-city').value.trim();
    const income = parseFloat(document.getElementById('input-income').value || 0);

    let valid = true;
    if (name.length < 2) {
      document.getElementById('err-name').classList.remove('hidden');
      valid = false;
    } else {
      document.getElementById('err-name').classList.add('hidden');
    }

    if (!city) {
      document.getElementById('err-city').classList.remove('hidden');
      valid = false;
    } else {
      document.getElementById('err-city').classList.add('hidden');
    }

    if (income <= 0) {
      document.getElementById('err-income').classList.remove('hidden');
      valid = false;
    } else {
      document.getElementById('err-income').classList.add('hidden');
    }

    if (valid) {
      runLocalTransition('Validating Sourcing Profile...', 'Connecting to FinTech Scoring Engine', () => {
        goToStep(4);
      });
    }
  }

  function handlePanInput(el) {
    el.value = el.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
    if (el.value.length === 10) {
      if (/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(el.value)) {
        verifyPan(el.value);
      } else {
        const errEl = document.getElementById('err-pan');
        errEl.innerHTML = '<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Invalid PAN format. Please check the number.';
        errEl.classList.remove('hidden');
        if (window.lucide) lucide.createIcons();
      }
    }
  }

  function verifyPan(pan) {
    if (!pan || typeof pan !== 'string') {
      pan = document.getElementById('input-pan').value.trim().toUpperCase();
    }
    const errEl = document.getElementById('err-pan');
    if (!/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(pan)) {
      errEl.innerHTML = '<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter a valid 10-character PAN number';
      errEl.classList.remove('hidden');
      if (window.lucide) lucide.createIcons();
      return;
    }
    errEl.classList.add('hidden');

    showTransitionLoader('Connecting to NSDL PAN database...', 'Validating Taxpayer Identification');
    fetch('<?php echo PATH_PREFIX; ?>api_pan_verify.php?pan=' + encodeURIComponent(pan))
      .then(response => response.json())
      .then(res => {
        hideTransitionLoader(() => {
          if (res && !res.error && res.data) {
            document.getElementById('pan-card-name').innerText = res.data.full_name || 'N/A';
            document.getElementById('pan-card-dob').innerText = res.data.dob || 'N/A';
            document.getElementById('pan-card-gender').innerText = res.data.gender || 'N/A';
            document.getElementById('pan-card-aadhaar').innerText = res.data.masked_aadhaar || 'N/A';
            document.getElementById('pan-card-number').innerText = res.data.pan || pan;
            panMaskedAadhaar = (res.data.masked_aadhaar || '').replace(/\s+/g, '');
            
            const nameEl = document.getElementById('input-name');
            if (nameEl && res.data.full_name && (!nameEl.value || nameEl.value.length < 2)) {
              nameEl.value = res.data.full_name;
            }
            if (typeof saveSessionState === 'function') saveSessionState();
            
            document.getElementById('pan-status-badge').classList.remove('hidden');
            document.getElementById('err-pan').classList.add('hidden');
            isPanVerified = true;
            openPanModal();
          } else {
            isPanVerified = false;
            document.getElementById('pan-status-badge').classList.add('hidden');
            const errMsg = document.getElementById('err-pan');
            errMsg.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> ${res.message || 'PAN Verification Failed.'}`;
            errMsg.classList.remove('hidden');
            if (window.lucide) lucide.createIcons();
          }
        });
      })
      .catch(err => {
        console.error(err);
        hideTransitionLoader(() => {
          isPanVerified = false;
          document.getElementById('pan-status-badge').classList.add('hidden');
          const errMsg = document.getElementById('err-pan');
          errMsg.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Error connecting to server.`;
          errMsg.classList.remove('hidden');
          if (window.lucide) lucide.createIcons();
        });
      });
  }

  let lastAutoUdyam = '';
  function handleUdyamInput(el) {
    let val = el.value.toUpperCase();
    
    if (!val.startsWith('UDYAM-')) {
      let clean = val.replace(/[^A-Z0-9]/g, '');
      if (clean.startsWith('UDYAM')) {
        clean = clean.substring(5);
      }
      val = 'UDYAM-' + clean;
    }
    
    let rest = val.substring(6).replace(/[^A-Z0-9]/g, '');
    let formatted = 'UDYAM-';
    
    if (rest.length > 0) {
      formatted += rest.substring(0, 2);
      if (rest.length > 2) {
        formatted += '-' + rest.substring(2, 4);
        if (rest.length > 4) {
          formatted += '-' + rest.substring(4, 11);
        }
      }
    }
    
    el.value = formatted;

    // Auto-verify as soon as complete valid Udyam number is entered (19 characters: UDYAM-XX-00-0000000)
    if (formatted.length === 19 && /^UDYAM-[A-Z]{2}-\d{2}-\d{7}$/i.test(formatted)) {
      if (lastAutoUdyam !== formatted || !isUdyamVerified) {
        lastAutoUdyam = formatted;
        verifyUdyamOnly();
      }
    } else {
      isUdyamVerified = false;
      document.getElementById('udyam-status-badge').classList.add('hidden');
    }
  }

  let lastAutoGst = '';
  function handleGstInput(el) {
    el.value = el.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
    const val = el.value;

    // Auto-verify as soon as 15 characters are entered
    if (val.length === 15) {
      if (lastAutoGst !== val || !isGstVerified) {
        lastAutoGst = val;
        verifyGstOnly();
      }
    } else if (val.length === 0) {
      isGstVerified = false;
      document.getElementById('gst-status-badge').classList.add('hidden');
      document.getElementById('err-gst').classList.add('hidden');
    }
  }

  function verifyUdyamOnly() {
    const value = document.getElementById('input-udyam').value.trim().toUpperCase();
    const errUdyam = document.getElementById('err-udyam');

    if (!/^UDYAM-[A-Z]{2}-\d{2}-\d{7}$/i.test(value)) {
      errUdyam.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter valid Udyam format (UDYAM-XX-00-0000000)`;
      errUdyam.classList.remove('hidden');
      if (window.lucide) lucide.createIcons();
      return;
    }
    errUdyam.classList.add('hidden');

    showTransitionLoader('Verifying Udyam Registration...', 'Connecting to MSME Databank');
    const panName = document.getElementById('pan-card-name') ? document.getElementById('pan-card-name').innerText : '';
    fetch('<?php echo PATH_PREFIX; ?>api_udyam_verify.php?udyam=' + encodeURIComponent(value) + '&pan=' + encodeURIComponent(document.getElementById('input-pan').value) + '&name=' + encodeURIComponent(panName))
      .then(r => r.json())
      .then(res => {
        hideTransitionLoader(() => {
          if (res && !res.error && res.data) {
            isUdyamVerified = true;
            udyamData = res.data;
            if (res.data.enterprise_name) {
              document.getElementById('input-business-name').value = res.data.enterprise_name;
            }
            const ownerVal = res.data.owner_name || panName || res.data.organization_type || '';
            if (ownerVal && ownerVal !== 'N/A') {
              document.getElementById('input-legal-owner-name').value = ownerVal;
            }
            const natParts = [res.data.major_activity, res.data.enterprise_type, res.data.organization_type].filter(x => x && x !== 'N/A');
            if (natParts.length > 0) {
              document.getElementById('input-business-nature').value = natParts.join(' - ');
            }
            if (res.data.organization_type) {
              document.getElementById('input-organization-type').value = res.data.organization_type;
            }
            if (res.data.address) {
              document.getElementById('input-business-address').value = res.data.address;
            }
            if (typeof saveSessionState === 'function') saveSessionState();
            document.getElementById('udyam-status-text').innerText = 'Udyam Registration Verified: ' + res.data.enterprise_name;
            document.getElementById('udyam-status-badge').classList.remove('hidden');
            openBizModal('udyam');
          } else {
            isUdyamVerified = false;
            document.getElementById('udyam-status-badge').classList.add('hidden');
            errUdyam.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> ${res.message || 'Udyam Verification Failed.'}`;
            errUdyam.classList.remove('hidden');
            if (window.lucide) lucide.createIcons();
          }
        });
      })
      .catch(e => {
        console.error(e);
        hideTransitionLoader(() => {
          isUdyamVerified = false;
          document.getElementById('udyam-status-badge').classList.add('hidden');
          errUdyam.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Error connecting to Udyam API.`;
          errUdyam.classList.remove('hidden');
          if (window.lucide) lucide.createIcons();
        });
      });
  }

  function verifyGstOnly() {
    const value = document.getElementById('input-gst').value.trim().toUpperCase();
    const errGst = document.getElementById('err-gst');

    if (value.length !== 15) {
      errGst.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter a valid 15-character GSTIN`;
      errGst.classList.remove('hidden');
      if (window.lucide) lucide.createIcons();
      return;
    }
    errGst.classList.add('hidden');

    showTransitionLoader('Verifying GSTIN Registration...', 'Connecting to GST Common Portal');
    fetch('<?php echo PATH_PREFIX; ?>api_gst_verify.php?gst=' + encodeURIComponent(value))
      .then(r => r.json())
      .then(res => {
        hideTransitionLoader(() => {
          if (res && !res.error && res.data) {
            isGstVerified = true;
            gstData = res.data;
            const bizName = res.data.trade_name || res.data.legal_name || '';
            if (bizName) {
              document.getElementById('input-business-name').value = bizName;
            }
            if (res.data.legal_name) {
              document.getElementById('input-legal-owner-name').value = res.data.legal_name;
            }
            if (res.data.business_nature) {
              const natureStr = Array.isArray(res.data.business_nature) ? res.data.business_nature.join(', ') : res.data.business_nature;
              document.getElementById('input-business-nature').value = natureStr;
            }
            if (res.data.aggre_turnover) {
              document.getElementById('input-gst-turnover').value = res.data.aggre_turnover;
            }
            if (res.data.business_constitution || res.data.constitution) {
              document.getElementById('input-organization-type').value = res.data.business_constitution || res.data.constitution;
            }
            if (res.data.address) {
              document.getElementById('input-business-address').value = res.data.address;
            }
            if (typeof saveSessionState === 'function') saveSessionState();
            document.getElementById('gst-status-text').innerText = 'GSTIN Verified: ' + (res.data.trade_name || res.data.legal_name);
            document.getElementById('gst-status-badge').classList.remove('hidden');
            openBizModal('gst');
          } else {
            isGstVerified = false;
            document.getElementById('gst-status-badge').classList.add('hidden');
            errGst.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> ${res.message || 'GST Verification Failed.'}`;
            errGst.classList.remove('hidden');
            if (window.lucide) lucide.createIcons();
          }
        });
      })
      .catch(e => {
        console.error(e);
        hideTransitionLoader(() => {
          isGstVerified = false;
          document.getElementById('gst-status-badge').classList.add('hidden');
          errGst.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Error connecting to GST API.`;
          errGst.classList.remove('hidden');
          if (window.lucide) lucide.createIcons();
        });
      });
  }

  function handleAadhaarInput(el) {
    let val = el.value.replace(/\s+/g, '').replace(/[^0-9]/g, '');
    
    // Limit to 12 digits max
    if (val.length > 12) {
      val = val.substring(0, 12);
    }

    el.value = val.replace(/(\d{4})/g, '$1 ').trim();
    
    const rawVal = el.value.replace(/\s+/g, '');
    const btnSubmit = document.getElementById('btn-submit-aadhaar');
    const btnContinue = document.getElementById('btn-continue-aadhaar');
    
    if (isAadhaarVerified) {
      if (btnSubmit) btnSubmit.classList.add('hidden');
      if (btnContinue) btnContinue.classList.remove('hidden');
      return;
    }

    if (rawVal.length === 12) {
      if (btnSubmit) btnSubmit.classList.remove('hidden');
    } else {
      if (btnSubmit) btnSubmit.classList.add('hidden');
    }
  }

  function verifyAadhaarOnly() {
    const value = document.getElementById('input-aadhaar').value.trim().replace(/\s+/g, '');
    const errAadhaar = document.getElementById('err-aadhaar');

    if (!/^\d{12}$/.test(value)) {
      errAadhaar.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Enter valid 12-digit Aadhaar number`;
      errAadhaar.classList.remove('hidden');
      if (window.lucide) lucide.createIcons();
      return;
    }

    if (panMaskedAadhaar) {
      const cleanMask = panMaskedAadhaar.replace(/\s+/g, '');
      const matchPrefix = cleanMask.match(/^(\d+)/);
      const matchSuffix = cleanMask.match(/(\d+)$/);
      
      const firstDigits = matchPrefix ? matchPrefix[1] : '';
      const lastDigits = matchSuffix ? matchSuffix[1] : '';
      
      if (firstDigits && value.substring(0, firstDigits.length) !== firstDigits) {
        errAadhaar.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Aadhaar first digits must match PAN registered pattern (${firstDigits}xx...)`;
        errAadhaar.classList.remove('hidden');
        if (window.lucide) lucide.createIcons();
        return;
      }
      
      if (lastDigits && value.substring(12 - lastDigits.length) !== lastDigits) {
        errAadhaar.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Aadhaar last digits must match PAN registered pattern (...xx${lastDigits})`;
        errAadhaar.classList.remove('hidden');
        if (window.lucide) lucide.createIcons();
        return;
      }
    }

    errAadhaar.classList.add('hidden');

    showTransitionLoader('Connecting to Aadhaar DigiLocker Gateway...', 'Redirecting to OAuth Authentication Session');
    
    // Collect all current form inputs to save state in session
    const currentData = {
      mobile: document.getElementById('input-mobile').value,
      email: document.getElementById('input-email').value,
      name: document.getElementById('input-name').value,
      city: document.getElementById('input-city').value,
      category: document.getElementById('input-category').value,
      loan_amount: document.getElementById('input-amount').value,
      employment_type: document.getElementById('input-employment').value,
      monthly_income: document.getElementById('input-income').value,
      pan_number: document.getElementById('input-pan').value,
      aadhaar_number: value
    };

    fetch('<?php echo PATH_PREFIX; ?>pages/save_session_state.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(currentData)
    })
    .then(() => {
      setTimeout(() => {
        window.location.href = '<?php echo PATH_PREFIX; ?>api_aadhaar_verify.php?aadhaar=' + encodeURIComponent(value);
      }, 300);
    })
    .catch(err => {
      console.error('Error saving session state:', err);
      // Fallback to redirect directly if session saving fails
      window.location.href = '<?php echo PATH_PREFIX; ?>api_aadhaar_verify.php?aadhaar=' + encodeURIComponent(value);
    });
  }

  function validateStep4() {
    if (!isPanVerified) {
      const errMsg = document.getElementById('err-pan');
      errMsg.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Please verify your PAN Card first.`;
      errMsg.classList.remove('hidden');
      if (window.lucide) lucide.createIcons();
      return;
    }
    document.getElementById('err-pan').classList.add('hidden');
    goToStep(5);
  }

  function validateStep5() {
    if (!isAadhaarVerified) {
      const errMsg = document.getElementById('err-aadhaar');
      errMsg.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Aadhaar e-KYC verification is required.`;
      errMsg.classList.remove('hidden');
      if (window.lucide) lucide.createIcons();
      return;
    }
    document.getElementById('err-aadhaar').classList.add('hidden');

    runLocalTransition('Synchronizing e-KYC Ledgers...', 'Completing Sourcing Validation', () => {
      const category = document.getElementById('input-category').value;
      const employment = document.getElementById('input-employment').value;
      if (category !== 'business' && category !== 'edi' && employment === 'Salaried') {
        goToStep(7);
      } else {
        goToStep(6);
      }
    });
  }

  function goBackFromStep6() {
    goToStep(5);
  }

  function validateStep6() {
    const udyamVal = document.getElementById('input-udyam').value.trim().toUpperCase();
    const gstVal = document.getElementById('input-gst').value.trim().toUpperCase();

    if (isUdyamVerified || isGstVerified) {
      document.getElementById('err-udyam').classList.add('hidden');
      document.getElementById('err-gst').classList.add('hidden');
      runLocalTransition('Validating Business Profile...', 'Syncing Verification Ledgers', () => {
        goToStep(7);
      });
      return;
    }

    if (/^UDYAM-[A-Z]{2}-\d{2}-\d{7}$/i.test(udyamVal)) {
      verifyUdyamOnly();
      return;
    }

    if (gstVal.length === 15) {
      verifyGstOnly();
      return;
    }

    const errMsg = document.getElementById('err-udyam');
    errMsg.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Business Verification Required: Please enter and verify your Udyam Registration Number or 15-digit GSTIN Number.`;
    errMsg.classList.remove('hidden');
    if (window.lucide) lucide.createIcons();
  }

  function goBackFromStep7() {
    const category = document.getElementById('input-category').value;
    const employment = document.getElementById('input-employment').value;
    if (category !== 'business' && category !== 'edi' && employment === 'Salaried') {
      goToStep(5);
    } else {
      goToStep(6);
    }
  }

  function validateStep7() {
    const ifsc = document.getElementById('input-ifsc').value.trim();
    const acc = document.getElementById('input-account-number').value.trim();

    let valid = true;
    if (!/^[A-Z]{4}0[A-Z0-9]{6}$/.test(ifsc)) {
      document.getElementById('err-ifsc').classList.remove('hidden');
      valid = false;
    } else {
      document.getElementById('err-ifsc').classList.add('hidden');
    }

    if (acc.length < 8) {
      document.getElementById('err-account-number').classList.remove('hidden');
      valid = false;
    } else {
      document.getElementById('err-account-number').classList.add('hidden');
    }

    if (valid) {
      runLocalTransition('Verifying Bank Account & IFSC...', 'Validating Sourcing Gateway', () => {
        goToStep(8);
      });
    }
  }

  function goBackFromStep8() {
    goToStep(7);
  }

  function handleIfscInput(el) {
    el.value = el.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
    const errEl = document.getElementById('err-ifsc');
    const detailsCard = document.getElementById('ifsc-details-card');
    
    if (el.value.length === 11) {
      if (/^[A-Z]{4}0[A-Z0-9]{6}$/.test(el.value)) {
        errEl.classList.add('hidden');
        
        fetch('https://ifsc.razorpay.com/' + el.value)
          .then(r => {
            if (!r.ok) throw new Error('Invalid IFSC');
            return r.json();
          })
          .then(res => {
            if (res && res.BANK) {
              document.getElementById('input-bank-name').value = res.BANK + ' (' + (res.BRANCH || '') + ')';
              if (typeof saveSessionState === 'function') saveSessionState();
              
              // Populate details card fields
              document.getElementById('ifsc-bank-name').innerText = res.BANK;
              document.getElementById('ifsc-branch-name').innerText = res.BRANCH || 'N/A';
              document.getElementById('ifsc-city').innerText = res.CITY || 'N/A';
              document.getElementById('ifsc-state').innerText = res.STATE || 'N/A';
              document.getElementById('ifsc-address').innerText = res.ADDRESS || 'N/A';
              
              detailsCard.classList.remove('hidden');
              errEl.classList.add('hidden');
              if (window.lucide) lucide.createIcons();
            }
          })
          .catch(err => {
            console.error(err);
            document.getElementById('input-bank-name').value = '';
            detailsCard.classList.add('hidden');
            errEl.innerHTML = '<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> IFSC not found. Please check.';
            errEl.classList.remove('hidden');
            if (window.lucide) lucide.createIcons();
          });
      } else {
        detailsCard.classList.add('hidden');
        errEl.innerHTML = '<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> Invalid IFSC format. e.g. HDFC0001234';
        errEl.classList.remove('hidden');
        if (window.lucide) lucide.createIcons();
      }
    } else {
      detailsCard.classList.add('hidden');
    }
  }

  function updateFileLabel(input, lblId) {
    const label = document.getElementById(lblId);
    if (input.files && input.files[0]) {
      label.innerText = 'Selected: ' + input.files[0].name;
      label.className = 'text-[10px] font-bold text-emerald-600 block';
    }
  }

  let loaderInterval = null;

  function showTransitionLoader(title, desc) {
    const overlay = document.getElementById('transition-overlay');
    const titleEl = document.getElementById('transition-title');
    const descEl = document.getElementById('transition-desc');
    const bar = document.getElementById('transition-bar');
    const pct = document.getElementById('loader-pct');

    if (loaderInterval) clearInterval(loaderInterval);

    titleEl.innerText = title;
    descEl.innerText = desc;
    bar.style.width = '10%';
    pct.innerText = '10%';

    overlay.classList.remove('hidden');
    setTimeout(() => overlay.classList.remove('opacity-0'), 10);

    let progress = 10;
    loaderInterval = setInterval(() => {
      if (progress < 85) {
        progress += Math.floor(Math.random() * 15) + 5;
        if (progress > 85) progress = 85;
        bar.style.width = progress + '%';
        pct.innerText = progress + '%';
      }
    }, 150);
  }

  function hideTransitionLoader(callback) {
    const overlay = document.getElementById('transition-overlay');
    const bar = document.getElementById('transition-bar');
    const pct = document.getElementById('loader-pct');

    if (loaderInterval) clearInterval(loaderInterval);

    bar.style.width = '100%';
    pct.innerText = '100%';

    setTimeout(() => {
      overlay.classList.add('opacity-0');
      setTimeout(() => {
        overlay.classList.add('hidden');
        if (typeof callback === 'function') callback();
      }, 300);
    }, 200);
  }

  function runLocalTransition(title, desc, callback) {
    showTransitionLoader(title, desc);
    let progress = 0;
    const interval = setInterval(() => {
      progress += 25;
      const bar = document.getElementById('transition-bar');
      const pct = document.getElementById('loader-pct');
      if (bar) bar.style.width = progress + '%';
      if (pct) pct.innerText = progress + '%';
      if (progress >= 100) {
        clearInterval(interval);
        setTimeout(() => {
          hideTransitionLoader(callback);
        }, 100);
      }
    }, 120);
  }

  function resumeJourney() {
    const modal = document.getElementById('resume-modal');
    if (modal) {
      modal.classList.add('opacity-0');
      setTimeout(() => modal.classList.add('hidden'), 300);
    }
    
    if (isAadhaarVerified) {
      const category = document.getElementById('input-category').value;
      const employment = document.getElementById('input-employment').value;
      const isBusinessSkipped = (category !== 'business' && category !== 'edi' && employment === 'Salaried');
      goToStep(isBusinessSkipped ? 7 : 6);
    } else if (isPanVerified) {
      goToStep(5);
    } else {
      goToStep(1);
    }
  }

  function startFreshJourney() {
    showTransitionLoader('Clearing Saved Session...', 'Starting Fresh Journey');
    fetch('<?php echo PATH_PREFIX; ?>api_clear_session.php')
      .then(r => r.json())
      .then(res => {
        hideTransitionLoader(() => {
          isPanVerified = false;
          isAadhaarVerified = false;
          isUdyamVerified = false;
          isGstVerified = false;
          
          document.getElementById('input-pan').value = '';
          document.getElementById('input-aadhaar').value = '';
          const udyamEl = document.getElementById('input-udyam');
          if (udyamEl) udyamEl.value = '';
          const gstEl = document.getElementById('input-gst');
          if (gstEl) gstEl.value = '';
          
          document.getElementById('pan-status-badge').classList.add('hidden');
          document.getElementById('aadhaar-status-badge').classList.add('hidden');
          
          const btnPan = document.getElementById('btn-verify-pan');
          if (btnPan) {
            btnPan.disabled = false;
            btnPan.innerText = 'Verify';
            btnPan.classList.add('bg-[#021435]', 'hover:bg-[#0b2447]');
            btnPan.classList.remove('bg-emerald-600', 'cursor-not-allowed');
          }
          
          const modal = document.getElementById('resume-modal');
          if (modal) {
            modal.classList.add('opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 300);
          }
          
          goToStep(1);
        });
      })
      .catch(e => {
        console.error(e);
        hideTransitionLoader(() => {
          alert('Failed to clear session. Please refresh.');
        });
      });
  }

  document.addEventListener('DOMContentLoaded', () => {
    const applyForm = document.getElementById('apply-form');
    if (applyForm) {
      applyForm.addEventListener('submit', (e) => {
        saveSessionState();
        const category = document.getElementById('input-category').value;
        const fileShop = document.getElementById('file-shop');
        if ((category === 'business' || category === 'edi') && fileShop && fileShop.files.length === 0) {
          e.preventDefault();
          alert('Upload Required: Please upload your Shop / Business Location Photo to complete your Business Loan application.');
          return false;
        }
      });
    }

    if (isFormSubmitted) {
      if (window.confetti) {
        confetti({
          particleCount: 150,
          spread: 80,
          origin: { y: 0.6 }
        });
      }
      return;
    }

    if (isPanVerified) {
      document.getElementById('pan-status-badge').classList.remove('hidden');
      const btn = document.getElementById('btn-verify-pan');
      if (btn) {
        btn.disabled = true;
        btn.innerText = 'Verified';
        btn.classList.remove('bg-[#021435]', 'hover:bg-[#0b2447]');
        btn.classList.add('bg-emerald-600', 'cursor-not-allowed');
      }

      const panName = <?php echo json_encode($_SESSION['pan_name'] ?? ''); ?>;
      const panAadhaar = <?php echo json_encode($_SESSION['pan_masked_aadhaar'] ?? ''); ?>;
      const step5Name = document.getElementById('aadhaar-pan-name');
      const step5Mask = document.getElementById('aadhaar-pan-mask');
      if (step5Name) step5Name.innerText = panName || '-';
      if (step5Mask) {
        if (panAadhaar) {
          const cleanAadhaar = panAadhaar.replace(/\s+/g, '');
          let uiMask = '';
          if (cleanAadhaar.length >= 12) {
            const first2 = cleanAadhaar.substring(0, 2);
            const last2 = cleanAadhaar.substring(10, 12);
            uiMask = `${first2}xx xxxx xx${last2}`;
          } else {
            uiMask = panAadhaar;
          }
          step5Mask.innerText = uiMask;
        } else {
          step5Mask.innerText = 'Not Available';
        }
      }
    }

    if (isAadhaarVerified) {
      const name = <?php echo json_encode($_SESSION['aadhaar_name'] ?? ''); ?>;
      const mask = <?php echo json_encode($_SESSION['aadhaar_number_masked'] ?? ''); ?>;
      if (name && mask) {
        document.getElementById('aadhaar-status-text').innerText = 'Aadhaar e-KYC Verified: ' + name + ' (' + mask + ')';
        document.getElementById('aadhaar-status-badge').classList.remove('hidden');
        
        const input = document.getElementById('input-aadhaar');
        if (input) {
          input.value = mask;
        }

        const btnSubmit = document.getElementById('btn-submit-aadhaar');
        if (btnSubmit) btnSubmit.classList.add('hidden');

        const btnContinue = document.getElementById('btn-continue-aadhaar');
        if (btnContinue) btnContinue.classList.remove('hidden');
      }
    }

    const urlParams = new URLSearchParams(window.location.search);
    const stepParam = parseInt(urlParams.get('step'));
    
    const category = document.getElementById('input-category').value;
    const employment = document.getElementById('input-employment').value;
    const isBusinessSkipped = (category !== 'business' && category !== 'edi' && employment === 'Salaried');

    // Show verification error banner if redirected back with error parameter
    const errorParam = urlParams.get('error');
    if (errorParam) {
      const errAadhaar = document.getElementById('err-aadhaar');
      if (errAadhaar) {
        let msg = 'Aadhaar e-KYC Verification failed. Please try again.';
        if (errorParam === 'mock_forbidden') {
          msg = 'Mock verification is not allowed in production environment.';
        } else if (errorParam === 'aadhaar_failed') {
          msg = 'Unable to establish DigiLocker session. Please try again.';
        }
        errAadhaar.innerHTML = `<i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> ${msg}`;
        errAadhaar.classList.remove('hidden');
        if (window.lucide) lucide.createIcons();
      }
    }

    if (stepParam >= 1 && stepParam <= 8) {
      if (stepParam === 6 && isBusinessSkipped) {
        goToStep(7);
      } else {
        goToStep(stepParam);
      }
    } else {
      if (isPanVerified) {
        const modal = document.getElementById('resume-modal');
        if (modal) {
          modal.classList.remove('hidden');
          setTimeout(() => modal.classList.remove('opacity-0'), 10);
        } else {
          if (isAadhaarVerified) {
            goToStep(isBusinessSkipped ? 7 : 6);
          } else {
            goToStep(5);
          }
        }
      } else {
        goToStep(1);
      }
    }
  });
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
