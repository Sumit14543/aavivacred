<!-- Footer -->
<footer class="w-full bg-gradient-to-b from-[#020e26] via-[#01091b] to-[#000511] text-slate-400 relative overflow-hidden border-t border-slate-950 mt-auto">
  <!-- Glowing top border line effect -->
  <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/40 to-transparent"></div>
  <!-- Deep backdrop glow spots -->
  <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[700px] h-[350px] bg-primary/5 blur-[130px] rounded-full pointer-events-none"></div>

  <div class="container mx-auto px-6 py-16 relative z-10 max-w-6xl">
    <!-- Bottom Part: Main Footer Columns -->
    <div class="flex flex-col lg:flex-row justify-between gap-10 lg:gap-8">
      
      <!-- Column 1: Brand & Bio (24% Width) -->
      <div class="w-full lg:w-[24%] space-y-6">
        <a href="<?php echo PATH_PREFIX; ?>index.php" class="inline-flex items-center group" aria-label="AavivaCred Home">
          <img src="<?php echo PATH_PREFIX; ?>assets/images/aavivacred_light.png" alt="AavivaCred" width="200" height="72" loading="lazy" class="h-12 sm:h-14 md:h-16 lg:h-18 w-auto object-contain hover:scale-105 transition-all duration-200">
        </a>
        <p class="text-xs sm:text-sm font-semibold leading-relaxed text-slate-400">
          Compare and apply for top loan products in India. We connect consumers with direct, pre-approved personal loans, business credit limits, and premium credit card deals from leading Indian banks.
        </p>
        
        <!-- Trust Seals -->
        <div class="flex flex-wrap gap-2 pt-2">
          <span class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-emerald-500/5 border border-emerald-500/10 rounded-xl text-[9.5px] text-emerald-400 font-extrabold tracking-wider uppercase shadow-inner">
            <i data-lucide="shield-check" class="w-3.5 h-3.5"></i> SSL Secured
          </span>
          <span class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-emerald-500/5 border border-emerald-500/10 rounded-xl text-[9.5px] text-emerald-400 font-extrabold tracking-wider uppercase shadow-inner">
            <i data-lucide="lock" class="w-3.5 h-3.5"></i> ISO 27001 Vault
          </span>
        </div>
      </div>

      <!-- Links Grid Column Group (50% Width, auto flex spaced) -->
      <div class="w-full lg:w-[50%] flex flex-row flex-wrap justify-between gap-6">
        <!-- Column 2: Financial Tools -->
        <div class="min-w-[120px]">
          <h4 class="text-white font-extrabold text-xs uppercase tracking-widest mb-6 relative after:content-[''] after:absolute after:bottom-[-8px] after:left-0 after:w-6 after:h-0.5 after:bg-primary after:rounded-full font-display font-black">Financial Tools</h4>
          <ul class="space-y-3.5 text-xs font-semibold mt-8">
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/calculator.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                Loan Calculator
              </a>
            </li>
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/services.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                Loan Products
              </a>
            </li>
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/apply.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                Apply for Loan
              </a>
            </li>
          </ul>
        </div>

        <!-- Column 3: Corporate Info -->
        <div class="min-w-[120px]">
          <h4 class="text-white font-extrabold text-xs uppercase tracking-widest mb-6 relative after:content-[''] after:absolute after:bottom-[-8px] after:left-0 after:w-6 after:h-0.5 after:bg-primary after:rounded-full font-display font-black">Corporate Info</h4>
          <ul class="space-y-3.5 text-xs font-semibold mt-8 font-display">
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/about.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                About Us
              </a>
            </li>
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/privacy.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                Privacy Policy
              </a>
            </li>
          </ul>
        </div>

        <!-- Column 4: Customer Service -->
        <div class="min-w-[140px]">
          <h4 class="text-white font-extrabold text-xs uppercase tracking-widest mb-6 relative after:content-[''] after:absolute after:bottom-[-8px] after:left-0 after:w-6 after:h-0.5 after:bg-primary after:rounded-full font-display font-black">Customer Service</h4>
          <ul class="space-y-3.5 text-xs font-semibold mt-8 font-display">
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/important-information.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                Important Info
              </a>
            </li>
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/contact.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                Write to us
              </a>
            </li>
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/grievance-redressal.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                Grievance Redressal
              </a>
            </li>
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/refund-policy.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                Refund Policy
              </a>
            </li>
          </ul>
        </div>

        <!-- Column 5: Rates & Charges -->
        <div class="min-w-[120px]">
          <h4 class="text-white font-extrabold text-xs uppercase tracking-widest mb-6 relative after:content-[''] after:absolute after:bottom-[-8px] after:left-0 after:w-6 after:h-0.5 after:bg-primary after:rounded-full font-display font-black">Rates</h4>
          <ul class="space-y-3.5 text-xs font-semibold mt-8 font-display">
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/interest-rates.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                Interest Rates
              </a>
            </li>
            <li>
              <a href="<?php echo PATH_PREFIX; ?>pages/fees-charges.php" class="text-slate-400 hover:text-accentYellow transition-all duration-300 flex items-center group hover:translate-x-1">
                Fees & Charges
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Column 6: Contact & Socials (22% Width) -->
      <div class="w-full lg:w-[22%] space-y-6">
        <h4 class="text-white font-extrabold text-xs uppercase tracking-widest mb-6 relative after:content-[''] after:absolute after:bottom-[-8px] after:left-0 after:w-6 after:h-0.5 after:bg-primary after:rounded-full font-display font-black font-display font-black">Contact Channels</h4>
        
        <ul class="space-y-4 text-xs font-semibold text-slate-350 mt-8">
          <li class="flex items-start gap-3.5 group/contact">
            <span class="w-9 h-9 rounded-xl bg-white/[0.03] border border-white/[0.06] flex items-center justify-center text-primary shrink-0 group-hover/contact:bg-primary group-hover/contact:text-white transition-all duration-300"><i data-lucide="mail" class="w-4.5 h-4.5"></i></span>
            <div>
              <p class="text-[9px] font-black text-slate-500 uppercase tracking-wider mb-0.5">Customer Support</p>
              <a href="mailto:<?php echo SITE_EMAIL; ?>" class="text-white hover:text-accentYellow transition-colors break-all"><?php echo SITE_EMAIL; ?></a>
            </div>
          </li>
          <li class="flex items-start gap-3.5 group/contact">
            <span class="w-9 h-9 rounded-xl bg-white/[0.03] border border-white/[0.06] flex items-center justify-center text-primary shrink-0 group-hover/contact:bg-primary group-hover/contact:text-white transition-all duration-300"><i data-lucide="phone" class="w-4.5 h-4.5"></i></span>
            <div>
              <p class="text-[9px] font-black text-slate-500 uppercase tracking-wider mb-0.5">Hotline Desk</p>
              <a href="tel:<?php echo SITE_PHONE; ?>" class="text-white hover:text-accentYellow transition-colors">+91 <?php echo SITE_PHONE; ?></a>
            </div>
          </li>
          <li class="flex items-start gap-3.5 group/contact">
            <span class="w-9 h-9 rounded-xl bg-white/[0.03] border border-white/[0.06] flex items-center justify-center text-primary shrink-0 group-hover/contact:bg-primary group-hover/contact:text-white transition-all duration-300"><i data-lucide="map-pin" class="w-4.5 h-4.5"></i></span>
            <div>
              <p class="text-[9px] font-black text-slate-500 uppercase tracking-wider mb-0.5">Corporate Office</p>
              <p class="text-white leading-relaxed font-semibold"><?php echo SITE_ADDRESS; ?></p>
            </div>
          </li>
        </ul>
      </div>

    </div>

    <!-- Indian Compliance & Disclaimer Details -->
    <div class="mt-14 pt-8 border-t border-white/5 text-[11px] text-slate-500 space-y-6 reveal-on-scroll">
      <div class="flex flex-col md:flex-row items-center justify-between gap-4">
        <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?> (A Unit of Aaviva FinTech Digital Private Limited). All rights reserved.</p>
      </div>
      
      <!-- Disclaimer Card Container -->
      <div class="border-l-2 border-accentYellow/50 bg-white/[0.02] p-5 md:p-6 rounded-r-2xl text-left leading-relaxed">
        <span class="text-[10px] font-black text-accentYellow uppercase tracking-wider mb-2 block">Disclaimer</span>
        <p class="text-slate-350 text-xs sm:text-[13px] font-medium leading-relaxed">
          AavivaCred is an online credit referral marketplace. We are not a direct lender, bank, or NBFC, and we do not issue loans or credit cards directly. All applications are collected through digital opt-in consent channels and routed to authorized bank/NBFC partners in compliance with digital lending guidelines. Loan approval, sanctioned amount, interest rate, repayment tenure, processing time, and disbursement are subject to applicant eligibility, documentation, credit assessment, income verification, property or collateral evaluation (where applicable), and individual lender policies.
        </p>
      </div>
    </div>

  </div>
</footer>

<!-- Floating Scroll to Top Button (Responsive Position & Size) -->
<button id="scroll-to-top-btn" 
        class="fixed bottom-20 sm:bottom-24 right-3 sm:right-6 z-50 flex items-center justify-center w-11 h-11 sm:w-14 sm:h-14 bg-[#031d40]/90 border border-white/10 hover:bg-primary text-white rounded-full shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300 opacity-0 pointer-events-none" 
        aria-label="Scroll to top">
  <i data-lucide="chevron-up" class="w-5 h-5 sm:w-7 sm:h-7"></i>
</button>

<!-- Floating WhatsApp Business Support Widget (Responsive Position & Size) -->
<a href="https://wa.me/919711149319?text=Hi%20AavivaCred%2520Support,%20I%2520am%2520interested%2520in%2520applying%2520for%2520an%2520instant%2520personal/business%2520loan.%20Please%2520help%2520me." 
   target="_blank" rel="noopener noreferrer" 
   class="fixed bottom-4 sm:bottom-6 right-3 sm:right-6 z-50 flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 hover:scale-110 active:scale-95 transition-all duration-300 group" 
   aria-label="Chat on WhatsApp">
  <!-- Official WhatsApp PNG Logo -->
  <img src="<?php echo PATH_PREFIX; ?>assets/images/whatsapp.png" alt="WhatsApp" width="56" height="56" loading="lazy" class="w-full h-full object-contain rounded-full shadow-2xl">
  <!-- Pulse Indicator -->
  <span class="absolute top-0 right-0 flex h-3.5 w-3.5">
    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
    <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-500"></span>
  </span>
  <!-- Tooltip -->
  <span class="absolute right-16 bg-slate-900 text-white text-xs font-bold px-3 py-1.5 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap shadow-md border border-slate-850 pointer-events-none hidden sm:block">
    Chat with Support
  </span>
</a>

</div>
<script src="<?php echo PATH_PREFIX; ?>assets/js/main.js"></script>
<script>
  // Global Scroll-to-Top behavior for all page loads & navigations
  if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
  }
  window.addEventListener('load', function() {
    window.scrollTo(0, 0);
  });
  window.addEventListener('pageshow', function() {
    window.scrollTo(0, 0);
  });

  // Initialize Lucide Icons
  if (window.lucide) lucide.createIcons();
</script>
</body>
</html>
