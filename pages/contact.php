<?php
require_once __DIR__ . '/../config/config.php';

$errors = [];
$values = [
    'name' => '',
    'phone' => '',
    'email' => '',
    'subject' => '',
    'message' => ''
];
$submitted = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $values['name'] = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
    $values['phone'] = htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES, 'UTF-8');
    $values['email'] = htmlspecialchars(trim($_POST['email'] ?? ''), ENT_QUOTES, 'UTF-8');
    $values['subject'] = htmlspecialchars(trim($_POST['subject'] ?? ''), ENT_QUOTES, 'UTF-8');
    $values['message'] = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES, 'UTF-8');

    // Validate
    if (empty($values['name'])) {
        $errors['name'] = 'Full name is required.';
    }
    if (!preg_match('/^[0-9]{10}$/', $values['phone'])) {
        $errors['phone'] = 'A valid 10-digit mobile number is required.';
    }
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'A valid email address is required.';
    }
    if (empty($values['subject'])) {
        $errors['subject'] = 'Please select a subject.';
    }
    if (empty($values['message'])) {
        $errors['message'] = 'Message is required.';
    }

    // Save if no errors
    if (count($errors) === 0) {
        $contact_file = dirname(__DIR__) . '/data/contact.json';
        $contact_dir = dirname($contact_file);
        
        if (!file_exists($contact_dir)) {
            mkdir($contact_dir, 0777, true);
        }
        
        $messages = [];
        if (file_exists($contact_file)) {
            $content = file_get_contents($contact_file);
            $messages = json_decode($content, true);
            if (!is_array($messages)) {
                $messages = [];
            }
        }
        
        $new_msg = $values;
        $new_msg['id'] = uniqid('msg_', true);
        $new_msg['created_at'] = date('Y-m-d H:i:s');
        $messages[] = $new_msg;
        
        if (file_put_contents($contact_file, json_encode($messages, JSON_PRETTY_PRINT)) !== false) {
            $submitted = true;
        } else {
            $errors['global'] = 'An error occurred while saving your message. Please try again.';
        }
    }
}

$page_title = "Contact Us";
include '../includes/header.php';
?>

<!-- Full Width Hero Banner with Overlay Text -->
<div class="w-full h-[280px] sm:h-[360px] md:h-[460px] relative overflow-hidden flex items-center justify-center text-center">
  <!-- Banner Background Image -->
  <img src="<?php echo PATH_PREFIX; ?>assets/images/contact_us_banner.png" alt="Contact AavivaCred" class="absolute inset-0 w-full h-full object-cover object-[center_35%]">
  
  <!-- Deep Blue Semi-Transparent Mask for Contrast -->
  <div class="absolute inset-0 bg-[#021435]/75 backdrop-blur-[1px] z-10"></div>
  
  <!-- Content overlay -->
  <div class="container mx-auto px-4 max-w-4xl relative z-20 text-white space-y-4 sm:space-y-6 pt-16">
    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-accentYellow text-xs font-bold border border-white/10 backdrop-blur-sm shadow-sm mx-auto uppercase tracking-wider">
      <i data-lucide="mail" class="w-3.5 h-3.5"></i> Get In Touch
    </div>
    
    <h1 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white drop-shadow-sm">
      Contact AavivaCred
    </h1>
    
    <p class="text-slate-200 text-sm sm:text-base md:text-lg max-w-2xl mx-auto font-medium drop-shadow-sm">
      Let's Help You Find the Right Loan Solution
    </p>

    <!-- Breadcrumb -->
    <div class="flex items-center justify-center gap-2 text-xs font-bold text-white/60">
      <a href="<?php echo PATH_PREFIX; ?>index.php" class="hover:text-accentYellow transition-colors">Home</a>
      <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
      <span class="text-accentYellow">Contact Us</span>
    </div>
  </div>
</div>

<!-- Contact Body Section -->
<section class="py-16 md:py-24 relative overflow-hidden bg-gradient-to-b from-white via-[#f8fafc] to-white text-slate-800 border-b border-slate-200/60 bg-grid z-10">
  <!-- Decorative Background Elements -->
  <div class="absolute left-[-15%] top-[-30%] w-[380px] h-[220%] bg-gradient-to-b from-indigo-500/5 via-purple-500/2 to-transparent rotate-[22deg] transform pointer-events-none z-0"></div>
  <div class="absolute right-[-12%] top-[-20%] w-[320px] h-[200%] bg-gradient-to-t from-teal-400/8 via-emerald-400/2 to-transparent rotate-[22deg] transform pointer-events-none z-0"></div>
  
  <div class="absolute left-1/3 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[400px] bg-indigo-500/3 rounded-full blur-3xl pointer-events-none z-0"></div>
  <div class="absolute right-[10%] bottom-[-10%] w-[300px] h-[300px] bg-teal-400/4 rounded-full blur-3xl pointer-events-none z-0"></div>

  <div class="container mx-auto px-4 max-w-6xl relative z-10">
    <!-- Center Section Header (Verbatim Intro Copy) -->
    <div class="text-center max-w-4xl mx-auto mb-16 reveal-on-scroll">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider mb-4">
        <i data-lucide="phone-call" class="w-4 h-4"></i> Get in Touch
      </div>
      <h2 class="font-display text-3xl md:text-4xl font-extrabold text-darkBlue tracking-tight mb-6">
        Get in Touch with Our Team
      </h2>
      <div class="text-slate-650 text-xs sm:text-sm font-semibold leading-relaxed space-y-4 max-w-3xl mx-auto">
        <p class="text-slate-900 text-sm sm:text-base font-extrabold leading-relaxed border-l-4 border-primary pl-4 text-left md:text-center md:border-l-0 md:pl-0">
          Whether you're exploring your first loan, comparing financing options, or need assistance with an existing application, the team at AavivaCred is here to help. We believe financial decisions should begin with clear information, honest guidance, and responsive customer support.
        </p>
        <p>
          Our experienced team is committed to helping you understand the application process, documentation requirements, eligibility criteria, and available loan solutions through our trusted lending partners.
        </p>
        <p>
          Whether your requirement is for a Personal Loan, Business Loan, Home Loan, Gold Loan, Payday Loan, or an EDI Loan, we're ready to assist you at every stage of your borrowing journey.
        </p>
      </div>
    </div>

    <!-- Symmetrical Split Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch">
      
      <!-- Left Column: Support Channels & Checklist Card -->
      <div class="lg:col-span-5 bg-white border border-slate-200/80 rounded-[2rem] p-6 md:p-8 shadow-md flex flex-col justify-between h-full reveal-on-scroll text-left">
        <div class="space-y-6">
          <div>
            <h3 class="font-display text-lg font-bold text-darkBlue mb-2">Corporate Support</h3>
            <p class="text-xs text-slate-500 font-semibold leading-relaxed">
              Reach out to AavivaCred operations center through any of the channels below or explore supported services.
            </p>
          </div>

          <!-- Channels List -->
          <div class="space-y-5">
            <!-- Address -->
            <div class="flex items-start gap-4 group">
              <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary shrink-0 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                <i data-lucide="map-pin" class="w-5 h-5"></i>
              </div>
              <div>
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">📍 Corporate Address</span>
                <p class="font-display font-extrabold text-sm text-darkBlue mt-0.5">AavivaCred</p>
                <p class="text-xs text-slate-500 font-semibold mt-0.5 leading-relaxed"><?php echo SITE_ADDRESS; ?></p>
              </div>
            </div>

            <!-- Phone -->
            <div class="flex items-start gap-4 group">
              <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary shrink-0 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                <i data-lucide="phone" class="w-5 h-5"></i>
              </div>
              <div>
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">📞 Call Support</span>
                <a href="tel:<?php echo SITE_PHONE; ?>" class="font-display font-extrabold text-sm text-darkBlue hover:text-primary transition-colors block mt-0.5">
                  +91 <?php echo SITE_PHONE; ?>
                </a>
                <p class="text-[10px] text-slate-400 font-semibold mt-0.5">Mon - Sat: 9:30 AM to 6:30 PM</p>
              </div>
            </div>

            <!-- Email -->
            <div class="flex items-start gap-4 group">
              <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary shrink-0 group-hover:bg-primary group-hover:text-white transition-all duration-300">
                <i data-lucide="mail" class="w-5 h-5"></i>
              </div>
              <div>
                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-wider block">📧 Write to Us</span>
                <a href="mailto:<?php echo SITE_EMAIL; ?>" class="font-display font-extrabold text-sm text-darkBlue hover:text-primary transition-colors block mt-0.5 break-all">
                  <?php echo SITE_EMAIL; ?>
                </a>
                <p class="text-[10px] text-slate-400 font-semibold mt-0.5 font-display">We generally respond within 24 hours.</p>
              </div>
            </div>
          </div>

          <!-- Services Supported Checklist -->
          <div class="pt-6 border-t border-slate-100">
            <h4 class="text-[10px] text-slate-405 font-bold uppercase tracking-wider mb-3">Enquiry Areas Supported</h4>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs font-semibold text-slate-600">
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span><span>Personal Loan</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span><span>Business Loan</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span><span>Home Loan</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span><span>Gold Loan</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span><span>Payday Loan</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span><span>EDI Merchant Loan</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span><span>Eligibility Checks</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span><span>Documentation</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span><span>Application Status</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span><span>Customer Support</span></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Right Column: Form Container Card -->
      <div class="lg:col-span-7 bg-white border border-slate-200/80 rounded-[2rem] p-6 md:p-8 shadow-md flex flex-col justify-between h-full reveal-on-scroll delay-100">
        <?php if ($submitted): ?>
          <!-- Contact Success Screen -->
          <div class="text-center py-10 space-y-6 max-w-md mx-auto">
            <div class="w-16 h-16 bg-[#10b981]/10 rounded-full flex items-center justify-center mx-auto text-[#10b981] border border-[#10b981]/20 shadow-sm">
              <i data-lucide="check" class="w-10 h-10"></i>
            </div>
            <div>
              <h3 class="font-display text-2.5xl font-extrabold text-darkBlue mb-2">Message Sent!</h3>
              <p class="text-slate-500 font-semibold text-sm">
                Thank you for reaching out, <?php echo htmlspecialchars($values['name']); ?>. Our support desk has received your message and will reply to you shortly.
              </p>
            </div>
            <div class="bg-slate-50 border border-slate-200/50 rounded-2xl p-5 text-left text-xs space-y-2.5 max-w-sm mx-auto">
              <div class="flex justify-between border-b border-slate-200/40 pb-2">
                <span class="text-slate-400 font-bold uppercase">Inquiry Subject</span>
                <span class="text-slate-800 font-extrabold"><?php echo htmlspecialchars($values['subject']); ?></span>
              </div>
              <div class="flex justify-between border-b border-slate-200/40 pb-2">
                <span class="text-slate-400 font-bold uppercase">Mobile Number</span>
                <span class="text-slate-800 font-extrabold">+91 <?php echo htmlspecialchars($values['phone']); ?></span>
              </div>
              <div class="flex justify-between">
                <span class="text-slate-400 font-bold uppercase">Email Address</span>
                <span class="text-slate-800 font-extrabold"><?php echo htmlspecialchars($values['email']); ?></span>
              </div>
            </div>
            <p class="text-slate-500 text-xs font-semibold leading-relaxed">
              A copy of your message ticket details has been sent to your email.
            </p>
            <div class="pt-4">
              <a href="contact.php" class="bg-gradient-to-r from-primary to-[#086da7] hover:from-[#086da7] hover:to-primary text-white py-3 px-8 rounded-full font-bold text-xs inline-flex justify-center shadow-md active:scale-95 transition-all">
                Send Another Message
              </a>
            </div>
          </div>
        <?php else: ?>
          <div class="mb-8 text-left">
            <h3 class="font-display text-2.5xl font-extrabold text-darkBlue tracking-tight mb-2">
              Send Us Your Enquiry
            </h3>
            <p class="text-slate-500 font-semibold text-xs md:text-sm leading-relaxed">
              Have questions or need assistance? Fill out this simple contact form and our support desk will contact you.
            </p>
          </div>

          <form method="post" action="contact.php" class="space-y-5">
            <?php if (isset($errors['global'])): ?>
              <div class="bg-red-50 border border-buddyRed/20 rounded-xl p-4 text-xs text-buddyRed font-semibold flex items-center gap-2">
                <i data-lucide="alert-circle" class="w-5 h-5 shrink-0"></i> <?php echo $errors['global']; ?>
              </div>
            <?php endif; ?>

            <!-- Full Name and Mobile Number -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-left">
              <div>
                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Full Name *</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($values['name']); ?>" 
                  class="w-full rounded-xl border <?php echo isset($errors['name']) ? 'border-[#ef4444] bg-red-50/10 focus:ring-[#ef4444]/20' : 'border-slate-200 focus:border-primary focus:ring-primary/20'; ?> bg-slate-50 px-4 py-3 text-sm text-slate-800 transition focus:bg-white focus:outline-none" 
                  placeholder="e.g. John Doe" />
                <?php if (isset($errors['name'])): ?>
                  <p class="text-[11px] text-[#ef4444] mt-1 font-semibold flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> <?php echo $errors['name']; ?></p>
                <?php endif; ?>
              </div>

              <div>
                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Mobile Number *</label>
                <div class="flex rounded-xl border <?php echo isset($errors['phone']) ? 'border-[#ef4444] bg-red-50/10 focus:ring-[#ef4444]/20' : 'border-slate-200 focus:border-primary focus:ring-primary/20'; ?> bg-slate-50 overflow-hidden focus-within:bg-white focus-within:border-primary focus-within:ring-4 focus-within:ring-primary/10 transition-all">
                  <div class="flex items-center gap-1 px-3 border-r border-slate-200 bg-slate-100 text-slate-500 font-bold text-sm select-none">
                    <span class="text-xs">🇮🇳</span> <span>+91</span>
                  </div>
                  <input type="text" name="phone" maxlength="10" value="<?php echo htmlspecialchars($values['phone']); ?>" 
                    class="w-full bg-transparent px-4 py-3 text-sm text-slate-800 focus:outline-none border-none" 
                    placeholder="9999999999" />
                </div>
                <?php if (isset($errors['phone'])): ?>
                  <p class="text-[11px] text-[#ef4444] mt-1 font-semibold flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> <?php echo $errors['phone']; ?></p>
                <?php endif; ?>
              </div>
            </div>

            <!-- Email Address and Subject -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-left">
              <div>
                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Email Address *</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($values['email']); ?>" 
                  class="w-full rounded-xl border <?php echo isset($errors['email']) ? 'border-[#ef4444] bg-red-50/10 focus:ring-[#ef4444]/20' : 'border-slate-200 focus:border-primary focus:ring-primary/20'; ?> bg-slate-50 px-4 py-3 text-sm text-slate-800 transition focus:bg-white focus:outline-none" 
                  placeholder="e.g. john@example.com" />
                <?php if (isset($errors['email'])): ?>
                  <p class="text-[11px] text-[#ef4444] mt-1 font-semibold flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> <?php echo $errors['email']; ?></p>
                <?php endif; ?>
              </div>

              <div>
                <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Inquiry Subject *</label>
                <select name="subject" 
                  class="w-full rounded-xl border <?php echo isset($errors['subject']) ? 'border-[#ef4444] bg-red-50/10 focus:ring-[#ef4444]/20' : 'border-slate-200 focus:border-primary focus:ring-primary/20'; ?> bg-slate-50 px-4 py-3 text-sm text-slate-800 transition focus:bg-white focus:outline-none appearance-none cursor-pointer">
                  <option value="">-- Select Subject --</option>
                  <option value="Personal Loan support" <?php echo $values['subject'] === 'Personal Loan support' ? 'selected' : ''; ?>>Personal Loan support</option>
                  <option value="Business Loan guidance" <?php echo $values['subject'] === 'Business Loan guidance' ? 'selected' : ''; ?>>Business Loan guidance</option>
                  <option value="Home Loan assistance" <?php echo $values['subject'] === 'Home Loan assistance' ? 'selected' : ''; ?>>Home Loan assistance</option>
                  <option value="Gold Loan information" <?php echo $values['subject'] === 'Gold Loan information' ? 'selected' : ''; ?>>Gold Loan information</option>
                  <option value="Payday/EDI Loan support" <?php echo $values['subject'] === 'Payday/EDI Loan support' ? 'selected' : ''; ?>>Payday/EDI Loan support</option>
                  <option value="General Customer support" <?php echo $values['subject'] === 'General Customer support' ? 'selected' : ''; ?>>General Customer support</option>
                  <option value="Partnership / Corporate" <?php echo $values['subject'] === 'Partnership / Corporate' ? 'selected' : ''; ?>>Partnership / Corporate</option>
                </select>
                <?php if (isset($errors['subject'])): ?>
                  <p class="text-[11px] text-[#ef4444] mt-1 font-semibold flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> <?php echo $errors['subject']; ?></p>
                <?php endif; ?>
              </div>
            </div>

            <!-- Message box -->
            <div class="text-left">
              <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1.5">Message *</label>
              <textarea name="message" rows="5" 
                class="w-full rounded-xl border <?php echo isset($errors['message']) ? 'border-[#ef4444] bg-red-50/10 focus:ring-[#ef4444]/20' : 'border-slate-200 focus:border-primary focus:ring-primary/20'; ?> bg-slate-50 px-4 py-3 text-sm text-slate-800 transition focus:bg-white focus:outline-none" 
                placeholder="Describe your requirements in detail..."><?php echo htmlspecialchars($values['message']); ?></textarea>
              <?php if (isset($errors['message'])): ?>
                <p class="text-[11px] text-[#ef4444] mt-1 font-semibold flex items-center gap-1"><i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> <?php echo $errors['message']; ?></p>
              <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-primary hover:bg-[#086aa2] text-white py-3.5 px-6 rounded-xl font-extrabold text-sm flex items-center justify-center shadow-md hover:shadow-lg active:scale-[0.98] transition-all duration-150 gap-2">
              <i data-lucide="send" class="w-4 h-4"></i> Send Message
            </button>
          </form>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<!-- Why Contact AavivaCred Section -->
<section class="py-20 bg-white border-t border-slate-200/60 relative overflow-hidden z-10">
  <div class="container mx-auto px-4 lg:px-8 max-w-6xl relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start reveal-on-scroll">
      <!-- Left Column: Copy -->
      <div class="lg:col-span-5 space-y-6 text-left">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider">
          <i data-lucide="help-circle" class="w-4 h-4"></i> Benefits
        </div>
        <h2 class="font-display text-3xl font-extrabold text-darkBlue leading-tight">Why Contact AavivaCred?</h2>
        <div class="text-slate-650 text-sm font-semibold leading-relaxed space-y-4">
          <p class="text-slate-900 font-extrabold text-base leading-relaxed border-l-4 border-primary pl-4">
            Choosing the right loan is not only about finding funding—it is about understanding your options before making an important financial commitment.
          </p>
          <p>
            At AavivaCred, we focus on helping customers make informed decisions by providing accurate information and transparent guidance throughout the application journey.
          </p>
        </div>
      </div>

      <!-- Right Column: Expect cards -->
      <div class="lg:col-span-7 space-y-5">
        <h3 class="text-xs text-slate-404 font-bold uppercase tracking-wider mb-4 text-left">What You Can Expect</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-10">
          <!-- Expect card 1 -->
          <div class="space-y-3 text-left">
            <span class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="info" class="w-5 h-5"></i></span>
            <h4 class="font-display font-extrabold text-sm text-slate-900 leading-tight">Professional Guidance</h4>
            <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">
              Our team helps you understand loan products, eligibility criteria, documentation requirements, and repayment options before you apply.
            </p>
          </div>
          <!-- Expect card 2 -->
          <div class="space-y-3 text-left">
            <span class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="message-square" class="w-5 h-5"></i></span>
            <h4 class="font-display font-extrabold text-sm text-slate-900 leading-tight">Transparent Communication</h4>
            <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">
              We explain the application process clearly, including important terms, lender policies, and documentation requirements, so there are no unnecessary surprises.
            </p>
          </div>
          <!-- Expect card 3 -->
          <div class="space-y-3 text-left">
            <span class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="users-2" class="w-5 h-5"></i></span>
            <h4 class="font-display font-extrabold text-sm text-slate-900 leading-tight">Customer-Centric Support</h4>
            <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">
              Whether you have questions before applying or require assistance during the application process, we aim to provide timely and helpful support.
            </p>
          </div>
          <!-- Expect card 4 -->
          <div class="space-y-3 text-left">
            <span class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="lock" class="w-5 h-5"></i></span>
            <h4 class="font-display font-extrabold text-sm text-slate-900 leading-tight">Secure Information Handling</h4>
            <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">
              Your personal information is handled responsibly and shared only with the relevant lending partner for the purpose of processing your application.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Loan Products Table Section -->
<section class="py-20 bg-slate-50 border-t border-slate-200/60 relative overflow-hidden z-10">
  <div class="container mx-auto px-4 max-w-4xl relative z-10 reveal-on-scroll">
    <div class="text-center mb-12">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold mb-4">
        <i data-lucide="grid" class="w-4 h-4"></i> Loan Options
      </div>
      <h2 class="font-display text-3xl font-extrabold text-darkBlue">Loan Products We Assist With</h2>
    </div>
    
    <div class="border border-slate-250/60 rounded-3xl overflow-hidden bg-white">
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-darkBlue text-white text-xs font-extrabold uppercase tracking-wider">
              <th class="p-5">Loan Solution</th>
              <th class="p-5">Suitable For</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-slate-700 text-xs font-semibold">
            <tr class="hover:bg-slate-50/50">
              <td class="p-5 font-bold text-darkBlue">Personal Loan</td>
              <td class="p-5">Medical expenses, education, travel, weddings, emergencies</td>
            </tr>
            <tr class="hover:bg-slate-50/50">
              <td class="p-5 font-bold text-darkBlue">Business Loan</td>
              <td class="p-5">Working capital, expansion, inventory, machinery</td>
            </tr>
            <tr class="hover:bg-slate-50/50">
              <td class="p-5 font-bold text-darkBlue">Home Loan</td>
              <td class="p-5">Buying, constructing, or renovating residential property</td>
            </tr>
            <tr class="hover:bg-slate-50/50">
              <td class="p-5 font-bold text-darkBlue">Gold Loan</td>
              <td class="p-5">Loan against eligible gold jewellery</td>
            </tr>
            <tr class="hover:bg-slate-50/50">
              <td class="p-5 font-bold text-darkBlue">Payday Loan</td>
              <td class="p-5">Temporary short-term financial requirements</td>
            </tr>
            <tr class="hover:bg-slate-50/50">
              <td class="p-5 font-bold text-darkBlue">EDI Loan</td>
              <td class="p-5">Early Day Income Loan for eligible salaried individuals</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- Visit Our Office & Connect Section -->
<section class="py-20 bg-white border-t border-slate-200/60 relative overflow-hidden z-10">
  <div class="container mx-auto px-4 max-w-6xl relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-stretch">
      
      <!-- Interactive Map (Left 6 Cols) -->
      <div class="lg:col-span-6 flex flex-col justify-between reveal-on-scroll text-left space-y-6">
        <div>
          <h3 class="font-display text-2xl font-extrabold text-darkBlue mb-1">Visit Our Office</h3>
          <p class="text-xs text-slate-500 font-semibold mb-6">Visit our main operations center for corporate consultations.</p>
          
          <!-- Styled Map Wrapper -->
          <div class="relative w-full h-72 rounded-3xl overflow-hidden bg-slate-50 border border-slate-200/80 flex items-center justify-center group shadow-sm">
            <!-- Subtle Grid overlay -->
            <div class="absolute inset-0 bg-grid opacity-30"></div>
            <!-- Radial mesh glow -->
            <div class="absolute w-48 h-48 rounded-full bg-primary/10 blur-2xl z-0 pointer-events-none"></div>
            
            <div class="relative z-10 text-center space-y-3 p-6">
              <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary mx-auto group-hover:scale-110 transition-transform">
                <i data-lucide="map-pin" class="w-6 h-6"></i>
              </div>
              <h4 class="font-display font-bold text-slate-800 text-sm">AavivaCred Operations Center</h4>
              <p class="text-[11px] text-slate-500 font-semibold max-w-xs mx-auto leading-relaxed"><?php echo SITE_ADDRESS; ?></p>
              <a href="https://maps.google.com/?q=<?php echo urlencode(SITE_ADDRESS); ?>" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center gap-1.5 text-xs text-primary font-bold hover:underline">
                Open in Google Maps <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Connect With Us (Right 6 Cols) -->
      <div class="lg:col-span-6 flex flex-col justify-between reveal-on-scroll delay-100 text-left space-y-6">
        <div class="space-y-6">
          <div>
            <h3 class="font-display text-2xl font-extrabold text-darkBlue mb-1">Connect With Us</h3>
            <p class="text-xs text-slate-500 font-semibold leading-relaxed">
              Stay connected with AavivaCred for loan updates, financial insights, and customer support.
            </p>
          </div>
          
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 pt-2">
            <!-- Facebook -->
            <a href="https://facebook.com/aavivacred" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-150 rounded-2xl hover:bg-slate-100/60 hover:border-primary/20 transition-all group">
              <span class="w-8 h-8 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </span>
              <span class="text-xs font-bold text-slate-800">Facebook</span>
            </a>
            <!-- LinkedIn -->
            <a href="https://linkedin.com/company/aavivacred" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-150 rounded-2xl hover:bg-slate-100/60 hover:border-primary/20 transition-all group">
              <span class="w-8 h-8 rounded-xl bg-blue-50 text-blue-800 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
              </span>
              <span class="text-xs font-bold text-slate-800">LinkedIn</span>
            </a>
            <!-- Instagram -->
            <a href="https://instagram.com/aavivacred" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-150 rounded-2xl hover:bg-slate-100/60 hover:border-primary/20 transition-all group">
              <span class="w-8 h-8 rounded-xl bg-rose-100 text-rose-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-4 h-4 fill-none stroke-current" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                  <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
              </span>
              <span class="text-xs font-bold text-slate-800">Instagram</span>
            </a>
            <!-- Twitter/X -->
            <a href="https://twitter.com/aavivacred" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-150 rounded-2xl hover:bg-slate-100/60 hover:border-primary/20 transition-all group">
              <span class="w-8 h-8 rounded-xl bg-slate-900 text-white flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                  <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                </svg>
              </span>
              <span class="text-xs font-bold text-slate-800">X (Twitter)</span>
            </a>
          </div>
          <!-- YouTube full-width -->
          <a href="https://youtube.com/aavivacred" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-150 rounded-2xl hover:bg-slate-100/60 hover:border-primary/20 transition-all group">
            <span class="w-8 h-8 rounded-xl bg-red-100 text-red-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
              <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                <path d="M23.498 6.163a3.003 3.003 0 0 0-2.11-2.11C19.525 3.545 12 3.545 12 3.545s-7.525 0-9.388.508a3.003 3.003 0 0 0-2.11 2.11C0 8.025 0 12 0 12s0 3.975.502 5.837a3.003 3.003 0 0 0 2.11 2.11c1.863.508 9.388.508 9.388.508s7.525 0 9.388-.508a3.003 3.003 0 0 0 2.11-2.11C24 15.975 24 12 24 12s0-3.975-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
              </svg>
            </span>
            <span class="text-xs font-bold text-slate-800">YouTube Channel</span>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Frequently Asked Questions -->
<section class="py-20 bg-[#f8fafc] border-t border-slate-200/60 relative overflow-hidden z-10">
  <div class="container mx-auto px-4 max-w-4xl relative z-10">
    <div class="text-center mb-16 reveal-on-scroll">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold mb-4">
        <i data-lucide="help-circle" class="w-4 h-4"></i> FAQ
      </div>
      <h2 class="font-display text-3xl font-extrabold text-darkBlue">Frequently Asked Questions</h2>
      <p class="text-xs text-slate-500 mt-2 font-medium">Quick answers to key inquiries and security policies.</p>
    </div>

    <div class="space-y-4 max-w-3xl mx-auto reveal-on-scroll">
      <!-- FAQ 1 -->
      <div class="faq-item bg-white rounded-2xl p-6 border border-slate-200/80 hover:border-primary/20 transition-all cursor-pointer shadow-sm">
        <button class="faq-trigger flex justify-between items-center w-full text-left font-extrabold text-slate-800 text-sm focus:outline-none">
          <span>How can I contact AavivaCred?</span>
          <i data-lucide="chevron-down" class="faq-chevron w-5 h-5 text-slate-500"></i>
        </button>
        <div class="faq-content text-xs text-slate-500 font-semibold leading-relaxed mt-3">
          You can reach us through our phone number, email address, or by submitting the online enquiry form available on this page.
        </div>
      </div>
      
      <!-- FAQ 2 -->
      <div class="faq-item bg-white rounded-2xl p-6 border border-slate-200/80 hover:border-primary/20 transition-all cursor-pointer shadow-sm">
        <button class="faq-trigger flex justify-between items-center w-full text-left font-extrabold text-slate-800 text-sm focus:outline-none">
          <span>Can I apply for a loan online?</span>
          <i data-lucide="chevron-down" class="faq-chevron w-5 h-5 text-slate-500"></i>
        </button>
        <div class="faq-content text-xs text-slate-500 font-semibold leading-relaxed mt-3">
          Yes. Eligible applicants can begin the application process online. The final approval depends on the lending partner's assessment.
        </div>
      </div>
      
      <!-- FAQ 3 -->
      <div class="faq-item bg-white rounded-2xl p-6 border border-slate-200/80 hover:border-primary/20 transition-all cursor-pointer shadow-sm">
        <button class="faq-trigger flex justify-between items-center w-full text-left font-extrabold text-slate-800 text-sm focus:outline-none">
          <span>Does AavivaCred directly provide loans?</span>
          <i data-lucide="chevron-down" class="faq-chevron w-5 h-5 text-slate-500"></i>
        </button>
        <div class="faq-content text-xs text-slate-500 font-semibold leading-relaxed mt-3">
          No. AavivaCred is a financial services platform that helps eligible applicants explore loan options through trusted lending partners.
        </div>
      </div>
      
      <!-- FAQ 4 -->
      <div class="faq-item bg-white rounded-2xl p-6 border border-slate-200/80 hover:border-primary/20 transition-all cursor-pointer shadow-sm">
        <button class="faq-trigger flex justify-between items-center w-full text-left font-extrabold text-slate-800 text-sm focus:outline-none">
          <span>How quickly will I receive a response?</span>
          <i data-lucide="chevron-down" class="faq-chevron w-5 h-5 text-slate-500"></i>
        </button>
        <div class="faq-content text-xs text-slate-500 font-semibold leading-relaxed mt-3">
          Response times may vary depending on business hours and enquiry volume. Our team aims to respond as promptly as possible.
        </div>
      </div>
      
      <!-- FAQ 5 -->
      <div class="faq-item bg-white rounded-2xl p-6 border border-slate-200/80 hover:border-primary/20 transition-all cursor-pointer shadow-sm">
        <button class="faq-trigger flex justify-between items-center w-full text-left font-extrabold text-slate-800 text-sm focus:outline-none">
          <span>Is my information secure?</span>
          <i data-lucide="chevron-down" class="faq-chevron w-5 h-5 text-slate-500"></i>
        </button>
        <div class="faq-content text-xs text-slate-500 font-semibold leading-relaxed mt-3">
          Yes. We take reasonable measures to protect customer information and share it only with relevant lending partners as required for processing your application.
        </div>
      </div>
    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>
