<?php
$page_title = "Loan Products & Financing Categories";
include '../includes/header.php';
?>

<!-- Services Hero Section -->
<section class="relative pt-24 pb-20 overflow-hidden bg-gradient-to-b from-[#f5f3ff] via-[#f0fdfa] to-white text-slate-800 border-b border-slate-200/60 bg-grid">
  <!-- Layered Slanted Stripes ("Patti Effect") - Unique Violet/Indigo & Teal/Mint Combo -->
  <!-- Left Violet/Indigo Patti -->
  <div class="absolute left-[-15%] top-[-30%] w-[380px] h-[220%] bg-gradient-to-b from-indigo-500/8 via-purple-500/3 to-transparent rotate-[22deg] transform pointer-events-none z-0"></div>
  <!-- Right Teal/Mint Patti -->
  <div class="absolute right-[-12%] top-[-20%] w-[320px] h-[200%] bg-gradient-to-t from-teal-400/10 via-emerald-400/3 to-transparent rotate-[22deg] transform pointer-events-none z-0"></div>
  <!-- Mid Accent Patti -->
  <div class="absolute left-[35%] top-[-40%] w-[150px] h-[250%] bg-gradient-to-b from-indigo-500/4 via-transparent to-transparent rotate-[22deg] transform pointer-events-none z-0"></div>
  
  <!-- Glowing Background Blobs -->
  <div class="absolute left-1/3 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[400px] bg-indigo-500/5 rounded-full blur-3xl pointer-events-none z-0"></div>
  <div class="absolute right-[10%] bottom-[-10%] w-[300px] h-[300px] bg-teal-400/6 rounded-full blur-3xl pointer-events-none z-0"></div>

  <!-- Finance Related Background Floating Elements -->
  <!-- Large Rupee symbol on left -->
  <span class="absolute left-[8%] top-[15%] text-6xl font-black text-indigo-500/12 rotate-[-15deg] pointer-events-none select-none z-0">₹</span>
  <!-- Large Percent symbol on right -->
  <span class="absolute right-[10%] top-[15%] text-5xl font-black text-teal-500/12 rotate-[12deg] pointer-events-none select-none z-0">%</span>
  
  <!-- Stack of coins outline on bottom-left -->
  <svg class="absolute left-[20%] bottom-[12%] w-14 h-14 text-indigo-500/10 pointer-events-none select-none -rotate-[12deg] z-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <ellipse cx="12" cy="6" rx="8" ry="3" />
    <path d="M4 6v6c0 1.66 3.58 3 8 3s8-1.34 8-3V6" />
    <path d="M4 12v6c0 1.66 3.58 3 8 3s8-1.34 8-3v-6" />
  </svg>
  
  <!-- Trend-up growth chart on bottom-right -->
  <svg class="absolute right-[18%] bottom-[15%] w-14 h-14 text-teal-500/10 pointer-events-none select-none rotate-[8deg] z-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <path d="M3 3v18h18" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M18.7 8l-5.1 5.2-2.8-2.7-5.3 5.3" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M14 8h4.7V12.7" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>

  <!-- Credit Card outline on right-mid -->
  <svg class="absolute right-[5%] top-[45%] w-12 h-12 text-teal-500/10 pointer-events-none select-none rotate-[15deg] z-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <rect x="2" y="5" width="20" height="14" rx="2" />
    <line x1="2" y1="10" x2="22" y2="10" />
  </svg>
  
  <!-- Shield Check outline on left-mid -->
  <svg class="absolute left-[4%] top-[45%] w-11 h-11 text-indigo-500/8 pointer-events-none select-none -rotate-[10deg] z-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
  </svg>

  <div class="container mx-auto px-4 max-w-4xl relative z-10 text-center reveal-on-scroll">
    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold mb-6 border border-primary/20 backdrop-blur-sm shadow-sm">
      <i data-lucide="briefcase" class="w-4 h-4"></i> Loan Options
    </div>
    
    <h1 class="font-display text-4xl md:text-5.5xl font-extrabold tracking-tight leading-tight mb-6 text-darkBlue">
      Explore Our <span class="text-primary">Loan Products</span>
    </h1>
    
    <p class="text-slate-500 text-sm md:text-base leading-relaxed max-w-2xl mx-auto font-semibold">
      We offer instant, paperless loans and premium credit card pre-approvals in partnership with India's top lending banks and NBFC partners.
    </p>

    <!-- Trust badge icons row centered below -->
    <div class="inline-flex flex-wrap items-center justify-center gap-6 px-6 py-2.5 rounded-full bg-white/70 border border-slate-200/80 shadow-sm backdrop-blur-sm mt-8 z-10">
      <div class="flex items-center gap-2">
        <i data-lucide="check-circle" class="w-4.5 h-4.5 text-primary"></i>
        <span class="text-[11px] font-extrabold text-slate-700">100% Digital Process</span>
      </div>
      <div class="w-1 h-1 bg-slate-300 rounded-full hidden sm:block"></div>
      <div class="flex items-center gap-2">
        <i data-lucide="zap" class="w-4.5 h-4.5 text-primary"></i>
        <span class="text-[11px] font-extrabold text-slate-700">Instant Disbursal</span>
      </div>
      <div class="w-1 h-1 bg-slate-300 rounded-full hidden sm:block"></div>
      <div class="flex items-center gap-2">
        <i data-lucide="percent" class="w-4.5 h-4.5 text-primary"></i>
        <span class="text-[11px] font-extrabold text-slate-700">Lowest Interest Rates</span>
      </div>
    </div>
  </div>
</section>

<!-- Categories Grid -->
<section class="py-20 bg-slate-50 relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php 
      $category_images = [
          'edi' => 'edi_loan_banner.png',
          'business' => 'business_loan_banner.png',
          'payday' => 'payday_loan_banner.png',
          'home_loan' => 'home_loan_banner.png',
          'mutual_fund' => 'gold_loan_people.png',
          'two_wheeler' => 'card_two_wheeler.png',
          'insurance' => 'personal_loan_banner.png'
      ];
      $category_slugs = [
          'edi' => 'edi-loan',
          'business' => 'business-loan',
          'payday' => 'payday-loan',
          'home_loan' => 'home-loan',
          'mutual_fund' => 'gold-loan',
          'two_wheeler' => 'two-wheeler-loan',
          'insurance' => 'services.php'
      ];
      
      $i = 0;
      foreach (LEAD_CATEGORIES as $key => $cat): 
        $i++;
        $delayClass = "delay-" . (($i % 4) * 100);
        $imageName = $category_images[$key] ?? 'card_personal.png';
        $slug = $category_slugs[$key] ?? 'personal-loan';
        $knowMoreUrl = ($slug === 'services.php') ? '#' : PATH_PREFIX . $slug;
        $applyUrl = PATH_PREFIX . 'pages/apply.php?type=' . str_replace('-loan', '', $slug);
        
        // Handle external Unsplash URLs
        $imgSrc = (strpos($imageName, 'http') === 0) ? $imageName : PATH_PREFIX . 'assets/images/' . $imageName;
      ?>
      <div class="bg-white border border-slate-200 shadow-xl rounded-[2.5rem] p-4 sm:p-6 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group reveal-on-scroll <?php echo $delayClass; ?>">
        <div>
          <!-- Framed Top Image with swoosh arcs and white mask -->
          <div class="relative overflow-hidden rounded-2xl h-48 sm:h-64 mb-4 sm:mb-6 bg-slate-100">
            <!-- White curved mask on left -->
            <div class="absolute left-0 top-0 bottom-0 w-12 z-20 pointer-events-none">
              <svg class="h-full w-full text-white" viewBox="0 0 50 100" fill="currentColor" preserveAspectRatio="none">
                <path d="M0,0 L50,0 Q12,50 50,100 L0,100 Z" />
              </svg>
            </div>
            
            <!-- Blue swoosh stroke lines aligned with mask -->
            <div class="absolute left-0 top-0 bottom-0 w-12 z-30 pointer-events-none">
              <svg class="h-full w-full text-primary" viewBox="0 0 50 100" fill="none" preserveAspectRatio="none">
                <path d="M50,0 Q12,50 50,100" stroke="currentColor" stroke-width="4.5" fill="none" stroke-linecap="round" />
                <path d="M40,5 Q5,50 40,95" stroke="currentColor" stroke-width="2" stroke-dasharray="3,3" fill="none" opacity="0.6" />
              </svg>
            </div>

            <!-- Soft lighting depth gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-white/10 via-transparent to-black/5 z-10 pointer-events-none"></div>

            <img src="<?php echo $imgSrc; ?>" alt="<?php echo $cat['name']; ?>" class="w-full h-full object-cover" />
          </div>
          
          <div class="text-center space-y-2">
            <h3 class="font-display font-extrabold text-lg text-slate-900"><?php echo $cat['name']; ?></h3>
            <p class="text-slate-500 text-xs font-semibold leading-relaxed px-2"><?php echo $cat['description']; ?></p>
          </div>
        </div>
        
        <!-- Center Actions -->
        <div class="flex items-center justify-center gap-3 mt-4 pt-3 sm:mt-6 sm:pt-4 border-t border-slate-100">
          <a href="<?php echo $applyUrl; ?>" class="px-4 py-2 rounded-xl bg-primary hover:bg-primary/95 text-white font-extrabold text-xs transition-all shadow-md active:scale-95">Apply Now</a>
          <a href="<?php echo $knowMoreUrl; ?>" class="px-4 py-2 rounded-xl border border-primary/20 text-primary hover:bg-primary/5 font-extrabold text-xs transition-all">Know More</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Sourcing Comparison Matrix Section -->
<section class="py-20 bg-slate-50 border-t border-b border-slate-200/50 relative overflow-hidden">
  <div class="container mx-auto px-4 lg:px-8 max-w-6xl relative z-10">
    <div class="text-center mb-16 reveal-on-scroll">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold mb-4">
        <i data-lucide="bar-chart-2" class="w-4 h-4"></i> Finance Matrix
      </div>
      <h2 class="font-display text-3xl font-extrabold text-darkBlue">Compare Financing Options</h2>
      <p class="text-xs text-slate-500 mt-2 font-medium">Compare loan parameters side-by-side to choose the ideal product.</p>
    </div>

    <!-- Responsive Table Container -->
    <div class="bg-white border border-slate-200 rounded-3xl shadow-xl overflow-hidden reveal-on-scroll">
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-darkBlue text-white text-xs font-display uppercase tracking-wider">
              <th class="p-5 font-bold">Loan Category</th>
              <th class="p-5 font-bold">Max Amount</th>
              <th class="p-5 font-bold">Starting Interest Rate</th>
              <th class="p-5 font-bold">Repayment Tenure</th>
              <th class="p-5 font-bold">Processing Fee</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-xs font-semibold text-slate-700">
            <tr class="hover:bg-slate-50 transition-colors">
              <td class="p-5 font-bold text-darkBlue">Personal Loan</td>
              <td class="p-5">Up to ₹35 Lakhs</td>
              <td class="p-5 text-emerald-600 font-bold">10.49% p.a.</td>
              <td class="p-5">12 to 60 Months</td>
              <td class="p-5">1% - 2%</td>
            </tr>
            <tr class="hover:bg-slate-50 transition-colors">
              <td class="p-5 font-bold text-darkBlue">Business Loan</td>
              <td class="p-5">Up to ₹50 Lakhs</td>
              <td class="p-5 text-emerald-600 font-bold">11.25% p.a.</td>
              <td class="p-5">12 to 60 Months</td>
              <td class="p-5">1.5% - 3%</td>
            </tr>
            <tr class="hover:bg-slate-50 transition-colors">
              <td class="p-5 font-bold text-darkBlue">Gold Loan</td>
              <td class="p-5">Up to ₹2 Crores</td>
              <td class="p-5 text-emerald-600 font-bold">8.50% p.a.</td>
              <td class="p-5">3 to 36 Months</td>
              <td class="p-5">Flat ₹299 - 1%</td>
            </tr>
            <tr class="hover:bg-slate-50 transition-colors">
              <td class="p-5 font-bold text-darkBlue">Home Loan</td>
              <td class="p-5">Up to ₹5 Crores</td>
              <td class="p-5 text-emerald-600 font-bold">8.40% p.a.</td>
              <td class="p-5">Up to 30 Years</td>
              <td class="p-5">0.5% - 1%</td>
            </tr>
            <tr class="hover:bg-slate-50 transition-colors">
              <td class="p-5 font-bold text-darkBlue">Payday Loan</td>
              <td class="p-5">Up to ₹2 Lakhs</td>
              <td class="p-5 text-emerald-600 font-bold">1.50% monthly</td>
              <td class="p-5">30 to 90 Days</td>
              <td class="p-5">2% - 4%</td>
            </tr>
            <tr class="hover:bg-slate-50 transition-colors">
              <td class="p-5 font-bold text-darkBlue">EDI Merchant Loan</td>
              <td class="p-5">Up to ₹10 Lakhs</td>
              <td class="p-5 text-emerald-600 font-bold">12.00% p.a.</td>
              <td class="p-5">Daily Collections</td>
              <td class="p-5">1% - 2%</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- How It Works Steps -->
<section id="how-it-works" class="py-20 bg-white border-t border-slate-150 relative overflow-hidden">
  <div class="container mx-auto px-4 max-w-6xl relative z-10">
    <div class="text-center mb-16 reveal-on-scroll">
      <h2 class="font-display text-3xl font-extrabold text-darkBlue">Simple 4-Step <span class="text-primary">Application</span></h2>
      <p class="text-slate-500 text-sm max-w-xl mx-auto mt-2 font-medium">Follow these direct milestones to get your loan disbursed.</p>
    </div>

    <!-- Timeline Panel Grid -->
    <div class="bg-slate-50 rounded-[32px] border border-slate-200 shadow-xl p-8 lg:p-12 relative overflow-hidden reveal-on-scroll">
      <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 lg:gap-0 divide-y lg:divide-y-0 lg:divide-x divide-slate-200">
        
        <?php
        $steps = [
          ["num" => "01", "phase" => "Step 01", "bg" => "bg-sky-50 border-sky-100", "text" => "text-primary", "hoverText" => "group-hover:text-primary/25", "icon" => "mouse-pointer-click", "title" => "Choose Product", "desc" => "Select Personal Loan, Business Loan, Gold Loan or Home Loan option.", "delay" => "delay-100"],
          ["num" => "02", "phase" => "Step 02", "bg" => "bg-sky-50 border-sky-100", "text" => "text-primary", "hoverText" => "group-hover:text-primary/25", "icon" => "sliders", "title" => "Provide Details", "desc" => "Fill in your basic eligibility criteria and target amounts.", "delay" => "delay-200"],
          ["num" => "03", "phase" => "Step 03", "bg" => "bg-sky-50 border-sky-100", "text" => "text-primary", "hoverText" => "group-hover:text-primary/25", "icon" => "download-cloud", "title" => "Upload & Check", "desc" => "Submit soft copies of your Aadhaar, PAN, and salary bank slips.", "delay" => "delay-300"],
          ["num" => "04", "phase" => "Step 04", "bg" => "bg-sky-50 border-sky-100", "text" => "text-primary", "hoverText" => "group-hover:text-primary/25", "icon" => "user-check", "title" => "Get Disbursal", "desc" => "Receive instant approvals and get funds sent to your bank account.", "delay" => "delay-400"]
        ];
        foreach($steps as $step):
        ?>
        <!-- Timeline Column Item -->
        <div class="flex flex-col items-center lg:items-start text-center lg:text-left px-6 py-6 lg:py-0 first:pl-0 last:pr-0 group reveal-on-scroll <?php echo $step['delay']; ?>">
          <span class="text-[9px] font-extrabold uppercase tracking-widest <?php echo $step['text']; ?> mb-2"><?php echo $step['phase']; ?></span>
          <div class="flex items-center gap-4 mt-2">
            <!-- Icon Badge -->
            <div class="w-12 h-12 rounded-xl <?php echo $step['bg']; ?> border <?php echo $step['text']; ?> flex items-center justify-center shadow-sm group-hover:scale-110 transition-transform duration-300">
              <i data-lucide="<?php echo $step['icon']; ?>" class="w-5 h-5"></i>
            </div>
            <!-- Dynamic Hover Text Number -->
            <span class="text-3xl font-extrabold text-slate-300 <?php echo $step['hoverText']; ?> transition-colors duration-300 font-display"><?php echo $step['num']; ?></span>
          </div>
          <h4 class="font-display text-base font-bold text-slate-800 mt-5"><?php echo $step['title']; ?></h4>
          <p class="text-slate-500 text-xs font-semibold mt-2 leading-relaxed"><?php echo $step['desc']; ?></p>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>

<!-- Call to Action Banner -->
<section class="py-20 bg-slate-50">
  <div class="container mx-auto px-4 max-w-4xl text-center">
    <div class="bg-darkBlue rounded-[32px] p-10 md:p-14 text-white relative overflow-hidden shadow-2xl reveal-on-scroll">
      <div class="absolute inset-0 bg-mesh opacity-10"></div>
      <div class="relative z-10 space-y-6">
        <h2 class="font-display text-3xl font-extrabold text-white">Looking for Customized Tenures?</h2>
        <p class="text-slate-455 text-sm max-w-2xl mx-auto font-medium">
          Our partner banks offer custom EMIs, prepayment options, interest rate adjustments, and overdraft facilities.
        </p>
        <div class="pt-4">
          <a href="apply.php" class="btn-buddy-primary inline-flex items-center justify-center px-8 py-4 text-base shadow-lg">
            Apply Online Now <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>
