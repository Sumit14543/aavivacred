<!-- Glowing Background Mesh Blobs -->
<div class="absolute left-[-15%] top-[10%] w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl pointer-events-none z-0"></div>
<div class="absolute right-[-15%] top-[40%] w-[600px] h-[600px] bg-teal-400/3 rounded-full blur-3xl pointer-events-none z-0"></div>
<div class="absolute left-[-10%] bottom-[10%] w-[500px] h-[500px] bg-primary/3 rounded-full blur-3xl pointer-events-none z-0"></div>

<div class="bg-[#f6f8fb] min-h-screen pt-28 pb-12 relative overflow-hidden z-10 bg-grid">
  <div class="container mx-auto px-4 max-w-7xl relative z-10">

    <!-- Combined Banner Card (Buddy Loan Style) -->
    <div class="bg-white border border-slate-200/80 shadow-2xl rounded-[2.5rem] overflow-hidden mb-16 reveal-on-scroll relative">
      <!-- Light Gradient Top Banner Container -->
      <div class="bg-gradient-to-r from-white via-[#f3f7fd] to-[#e6effb] p-6 md:py-8 md:px-10 relative">
        
        <!-- Background vector wave lines and blurs -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
          <svg class="w-full h-full text-primary/10 opacity-60" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="0.3" preserveAspectRatio="none">
            <path d="M0,30 Q25,10 50,30 T100,30" />
            <path d="M0,50 Q25,35 50,50 T100,50" />
            <path d="M0,70 Q25,55 50,70 T100,70" />
          </svg>
          
          <div class="absolute right-0 bottom-0 top-0 w-full sm:w-1/2 z-0 opacity-90 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
              <path d="M25,100 Q8,55 65,0 L100,0 L100,100 Z" fill="url(#waveGrad1)" />
              <path d="M40,100 Q20,65 78,0 L100,0 L100,100 Z" fill="url(#waveGrad2)" opacity="0.6" />
              <path d="M55,100 Q35,75 88,0 L100,0 L100,100 Z" fill="#b9d6f3" opacity="0.3" />
            </svg>
          </div>
          <div class="absolute right-10 top-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
          <div class="absolute left-1/3 bottom-5 w-40 h-40 bg-accentYellow/5 rounded-full blur-2xl"></div>
          <div class="absolute left-[-5%] top-[-20%] w-[180px] h-[160%] bg-gradient-to-b from-primary/5 to-sky-400/5 rotate-[20deg] transform pointer-events-none z-0"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
          
          <!-- Left Column: Details (7:5 Split) -->
          <div class="lg:col-span-7 space-y-6 text-left">
            <div class="space-y-3">
              <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-white/80 border border-slate-200 px-3 py-1 rounded-full shadow-sm">Early Income Access</span>
              <h1 class="font-display text-2xl sm:text-3.5xl lg:text-4xl font-extrabold text-darkBlue leading-tight">
                EDI Loan – Access Your Earned Income <br class="hidden md:inline">
                Before Payday <span class="text-primary font-black">When You Need It Most</span>
              </h1>
              <p class="text-slate-500 font-semibold text-xs sm:text-sm">
                Financial Support When You Need It Most—Without Waiting for Payday
              </p>
            </div>

            <!-- Quick Phone Form -->
            <form action="<?php echo PATH_PREFIX; ?>pages/apply.php" method="GET" class="space-y-4 max-w-md">
              <input type="hidden" name="type" value="edi" />
              
              <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-grow flex items-center bg-white border border-slate-250 rounded-xl overflow-hidden focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/20 transition-all shadow-inner">
                  <div class="flex items-center gap-1 px-4 border-r border-slate-200 bg-slate-50 text-slate-550 font-bold text-sm">
                    <span class="text-xs">🇮🇳</span> <span>+91</span>
                  </div>
                  <input type="tel" name="qty" required maxlength="10" placeholder="Enter mobile number" 
                    class="w-full bg-transparent px-4 py-3.5 text-sm text-slate-800 focus:outline-none border-none" />
                </div>
                <button type="submit" class="bg-accentYellow hover:bg-yellow-500 text-darkBlue font-extrabold px-8 py-3.5 rounded-xl text-sm transition-all shadow-md active:scale-95 shrink-0">
                  Apply Now
                </button>
              </div>
              
              <label class="flex items-start gap-2.5 text-[10px] text-slate-500 font-semibold cursor-pointer">
                <input type="checkbox" required checked class="mt-0.5 rounded border-slate-300 text-primary focus:ring-primary" />
                <span>By continuing, you agree to AavivaCred's <a href="<?php echo PATH_PREFIX; ?>privacy" class="text-primary hover:underline">Privacy Policy</a> and <a href="#" class="text-primary hover:underline">Terms of Use</a>.</span>
              </label>
            </form>

            <!-- Trust Badges -->
            <div class="flex flex-wrap items-center gap-3.5 pt-2">
              <span class="flex items-center gap-1.5 text-xs font-bold text-slate-700 bg-white border border-slate-200 px-3.5 py-2 rounded-xl shadow-sm">
                <i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i> 100% Digital Process
              </span>
              <span class="flex items-center gap-1.5 text-xs font-bold text-slate-700 bg-white border border-slate-200 px-3.5 py-2 rounded-xl shadow-sm">
                <i data-lucide="zap" class="w-4 h-4 text-primary"></i> Instant Salary Transfer
              </span>
            </div>
          </div>

          <!-- Right Column: Banner Image (7:5 Split) -->
          <div class="lg:col-span-5 flex items-center justify-center relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-primary/10 via-transparent to-accentYellow/10 rounded-full blur-3xl pointer-events-none scale-125"></div>
            <div class="absolute w-64 h-64 rounded-full bg-gradient-to-tr from-primary/10 to-sky-300/10 border border-white/30 shadow-inner z-0 animate-pulse-slow"></div>
            
            <div class="absolute right-10 top-6 w-3 h-3 bg-accentYellow rounded-full animate-ping opacity-60 z-20 pointer-events-none"></div>
            <div class="absolute left-10 bottom-6 w-2 h-2 bg-primary rounded-full animate-pulse z-20 pointer-events-none"></div>

            <!-- Integrated Graphic with Floating Fintech Badges -->
            <div class="relative w-full max-w-[270px] sm:max-w-[290px] my-3 z-10">
              <!-- Top-Right Floating Badge Pill -->
              <div class="absolute -top-3 -right-2 bg-white/95 backdrop-blur-md border border-slate-200/80 px-3.5 py-2 rounded-2xl shadow-xl flex items-center gap-2 z-30 animate-bounce-slow">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span class="text-[11px] font-black text-darkBlue">Earned Income Access</span>
              </div>

              <!-- Main Blended Image Container (No rigid photo frame) -->
              <div class="relative w-full rounded-[2rem] overflow-hidden shadow-2xl bg-white/40 border border-white/60 group transition-transform duration-300 hover:scale-[1.02]">
                <img src="<?php echo PATH_PREFIX; ?>assets/images/payday_loan_banner.png" alt="EDI Loan Sourcing" 
                  class="w-full h-auto object-cover mix-blend-multiply relative z-10 transition-transform duration-500 group-hover:scale-105" />
              </div>

              <!-- Bottom-Left Floating Notification Card -->
              <div class="absolute -bottom-4 -left-3 bg-darkBlue text-white border border-white/10 px-3.5 py-2.5 rounded-2xl shadow-2xl flex items-center gap-2.5 z-30">
                <span class="w-7 h-7 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-xs shrink-0">
                  <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400"></i>
                </span>
                <div class="text-left">
                  <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider leading-none">Salary Advance</p>
                  <p class="text-xs font-black text-white leading-tight mt-0.5">100% Digital Process</p>
                </div>
              </div>
            </div>
            
            <div class="absolute right-[-10px] top-[15%] text-sky-400 animate-pulse z-20 pointer-events-none"><i data-lucide="sparkles" class="w-5 h-5"></i></div>
            <div class="absolute left-[-10px] bottom-[15%] text-primary animate-pulse z-20 pointer-events-none"><i data-lucide="sparkle" class="w-4 h-4"></i></div>
          </div>

        </div>
      </div>

      <!-- Dark Blue Stats Banner -->
      <div class="bg-[#031d40] text-white p-6 md:p-8 relative border-t border-slate-100/5 z-20">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 items-center text-center">
          <div>
            <h3 class="text-2xl md:text-3.5xl font-extrabold text-white">10L+</h3>
            <p class="text-[9px] font-bold text-slate-450 uppercase tracking-widest mt-1">Monthly Sourcing Queries</p>
          </div>
          <div class="border-l border-white/10">
            <h3 class="text-2xl md:text-3.5xl font-extrabold text-white flex items-center justify-center gap-1">4.8 <i data-lucide="star" class="w-4 h-4 fill-accentYellow text-accentYellow shrink-0"></i></h3>
            <p class="text-[9px] font-bold text-slate-450 uppercase tracking-widest mt-1">Customer Trust Score</p>
          </div>
          <div class="md:border-l border-white/10">
            <h3 class="text-2xl md:text-3.5xl font-extrabold text-white">35+</h3>
            <p class="text-[9px] font-bold text-slate-450 uppercase tracking-widest mt-1">Active NBFC & Bank Partners</p>
          </div>
          <div class="border-l border-white/10">
            <h3 class="text-2xl md:text-3.5xl font-extrabold text-white">₹500Cr+</h3>
            <p class="text-[9px] font-bold text-slate-450 uppercase tracking-widest mt-1">Loan Sourced Volume</p>
          </div>
        </div>

        <p class="text-[10px] text-slate-350 font-semibold italic text-left mt-3.5 leading-relaxed max-w-5xl mx-auto">
          <strong>Responsible Lending Notice:</strong> Loan approval, sanctioned amount, interest rate, repayment period, processing timeline, and disbursement depend on applicant eligibility, employment details, monthly income, repayment capacity, documentation, credit assessment, and the lending partner's policies. Applying does not guarantee approval.
        </p>
      </div>
    </div>

    <!-- EDI Loan Introduction Section (Editorial Layout) -->
    <div class="mb-14 text-center max-w-5xl mx-auto reveal-on-scroll">
      <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-primary/5 border border-primary/10 px-3.5 py-1.5 rounded-full shadow-sm">Overview</span>
      
      <h2 class="font-display text-2xl sm:text-3.5xl font-extrabold text-darkBlue leading-tight mt-4">
        Financial Support When You Need It Most—Without Waiting for Payday
      </h2>
      <div class="w-16 h-1 bg-primary mx-auto mt-4 mb-8"></div>
      
      <!-- Lead Paragraph -->
      <p class="text-slate-700 text-base sm:text-lg font-medium max-w-3xl mx-auto leading-relaxed mb-8">
        Monthly salaries are designed to cover routine expenses, but real life doesn't always follow a calendar. A medical emergency, an urgent family commitment, an unexpected utility bill, or a vehicle repair can create financial pressure even when your next salary is only a few days away.
      </p>

      <!-- Two-Column Body Copy -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 text-left text-slate-600 text-sm sm:text-[15px] leading-relaxed font-normal">
        <div class="space-y-4">
          <p>
            An EDI Loan (Early Day Income Loan) is a short-term financing solution designed for eligible salaried individuals who need temporary financial support before receiving their next salary.
          </p>
          <p>
            Unlike long-term loans intended for major purchases, an EDI Loan is generally considered for urgent and genuine short-term financial requirements.
          </p>
          <p>
            Depending on the lending partner, factors considered during evaluation may include monthly salary, employment stability, repayment capacity, credit assessment, banking history, and KYC documentation.
          </p>
        </div>
        <div class="space-y-4">
          <p>
            At AavivaCred, we simplify the borrowing journey by connecting eligible applicants with trusted lending partners through a transparent digital process. Our objective is to help customers understand their financing options, repayment responsibilities, and eligibility before making any borrowing decision.
          </p>
          <p>
            Whether you're managing an urgent expense or looking for temporary financial flexibility, we believe informed borrowing is the foundation of long-term financial well-being.
          </p>
          <p>
            Instead of disrupting your monthly financial planning, an EDI Loan can help bridge temporary cash flow gaps while encouraging responsible repayment.
          </p>
        </div>
      </div>

      <!-- Full-Width Bottom Block & Quotes -->
      <div class="mt-6 text-left text-slate-600 text-sm sm:text-[15px] leading-relaxed">
        <p class="mb-8">
          In these situations, waiting until payday isn't always practical. An Early Day Income Loan is intended to help eligible applicants manage these temporary situations responsibly by providing access to short-term financing, subject to lender approval. The purpose is to support essential financial requirements—not encourage unnecessary borrowing.
        </p>
        
        <!-- Combined Quotes Box -->
        <div class="bg-gradient-to-r from-primary/5 to-transparent border-l-4 border-primary p-6 rounded-r-2xl shadow-sm space-y-3.5">
          <p class="text-xs sm:text-sm text-slate-700 font-bold italic leading-relaxed">
            "Unexpected expenses don't always indicate poor financial planning. Even individuals with stable employment and regular salaries can occasionally experience temporary cash flow shortages."
          </p>
          <p class="text-xs sm:text-sm text-slate-700 font-bold italic leading-relaxed">
            "Imagine your salary is scheduled to arrive next week, but an urgent expense requires immediate attention today. An Early Day Income Loan helps bridge that period seamlessly."
          </p>
        </div>
      </div>
    </div>

    <!-- Why Borrowers Choose AavivaCred (Relocated into a grid of small cards) -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 text-left reveal-on-scroll">
      <div class="mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Key Benefits</span>
        <h3 class="font-display font-extrabold text-xl sm:text-2xl text-darkBlue">Why Choose AavivaCred for an EDI Loan?</h3>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">Key features supporting your short-term salary advance:</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="smartphone" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Simple Digital Application Process</span>
        </div>

        <!-- Card 2 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="handshake" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Trusted Lending Partners</span>
        </div>

        <!-- Card 3 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="eye" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Transparent Loan Guidance</span>
        </div>

        <!-- Card 4 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="shield-check" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Secure Document Submission</span>
        </div>

        <!-- Card 5 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="user-check" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Dedicated Customer Assistance</span>
        </div>

        <!-- Card 6 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="calendar" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Flexible Repayment Options*</span>
        </div>

        <!-- Card 7 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="heart-handshake" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Customer-First Support</span>
        </div>
      </div>
    </div>

    <!-- Section 1B: The AavivaCred Advantage Details -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 reveal-on-scroll text-left">
      <div class="max-w-3xl mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Why Choose Us</span>
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Why Choose AavivaCred?</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          At AavivaCred, we understand that short-term financial requirements demand both speed and clarity. That's why our approach focuses on transparency, convenience, and responsible financial guidance.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Box 1 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="smartphone" class="w-4 h-4"></i></span>
            A Simple Digital Experience
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Complete your application online without unnecessary paperwork or repeated office visits.
          </p>
        </div>

        <!-- Box 2 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="eye" class="w-4 h-4"></i></span>
            Transparent Information
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            We explain eligibility, documentation requirements, repayment terms, and lender policies in clear language so you know what to expect.
          </p>
        </div>

        <!-- Box 3 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="handshake" class="w-4 h-4"></i></span>
            Trusted Lending Partners
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            We connect eligible applicants with trusted lending partners that independently assess each application based on their internal lending criteria.
          </p>
        </div>

        <!-- Box 4 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="user-check" class="w-4 h-4"></i></span>
            Personalised Support
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Our experienced team remains available throughout the application process to answer questions and provide assistance whenever required.
          </p>
        </div>

        <!-- Box 5 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="lock" class="w-4 h-4"></i></span>
            Secure Info Handling
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Your personal information is processed securely and shared only with the relevant lending partner for evaluating your application.
          </p>
        </div>

      </div>
    </div>

    <!-- Section 2B: Value Creation Scenarios -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <div class="max-w-3xl mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-primary/5 border border-primary/10 px-3 py-1 rounded-full">Scenarios</span>
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">When Can an EDI Loan Be Useful?</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          Financial flexibility is often most valuable during unexpected situations:
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Scenario 1 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="activity" class="w-3.5 h-3.5"></i></span>
            Emergency Medical Expenses
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Unexpected consultations, medicines, diagnostic tests, or hospital-related expenses may require immediate financial support before salary day.
          </p>
        </div>

        <!-- Scenario 2 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="home" class="w-3.5 h-3.5"></i></span>
            Urgent Household Expenses
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Essential repairs, electricity bills, school fees, or other unavoidable household commitments sometimes cannot wait until the next salary cycle.
          </p>
        </div>

        <!-- Scenario 3 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="plane" class="w-3.5 h-3.5"></i></span>
            Emergency Travel
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Family emergencies or urgent work-related travel often require immediate financial arrangements.
          </p>
        </div>

        <!-- Scenario 4 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="clock" class="w-3.5 h-3.5"></i></span>
            Temporary Salary Gap
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Occasionally, salary credit dates may vary, creating a temporary gap between income and essential expenses. An EDI Loan helps manage this period responsibly.
          </p>
        </div>

        <!-- Scenario 5 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="heart" class="w-3.5 h-3.5"></i></span>
            Important Family Commitments
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Certain genuine personal obligations require timely financial support and may not be postponed until the next salary cycle.
          </p>
        </div>

      </div>
    </div>

    <!-- Section 3A: Features Table -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue mb-6 flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="file-spreadsheet" class="w-4.5 h-4.5"></i></span>
        Key Features of an Early Day Income Loan
      </h2>
      <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50">
        <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
          <thead>
            <tr class="bg-darkBlue text-white text-[10px] sm:text-xs font-bold uppercase tracking-wider">
              <th class="p-4 w-1/3 sm:w-1/4">Feature</th>
              <th class="p-4">Details</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
            <tr><td class="p-4 font-bold text-darkBlue">Loan Type</td><td class="p-4 text-xs sm:text-sm">Short-Term Personal Finance</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Suitable For</td><td class="p-4 text-xs sm:text-sm">Eligible Salaried Employees</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Purpose</td><td class="p-4 text-xs sm:text-sm">Temporary Financial Requirements</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Application</td><td class="p-4 text-xs sm:text-sm">Digital & Online</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Loan Amount</td><td class="p-4 text-xs sm:text-sm">Subject to eligibility and lender assessment</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Interest Rate</td><td class="p-4 text-xs sm:text-sm">Determined by the lending partner</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Repayment</td><td class="p-4 text-xs sm:text-sm">As per agreed loan terms</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Collateral</td><td class="p-4 text-xs sm:text-sm">Generally not required</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Processing</td><td class="p-4 text-xs sm:text-sm">Digital application and verification</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Section 3B: Benefits of Choosing an EDI Loan -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-16 shadow-sm text-left reveal-on-scroll">
      <div class="space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Benefits of Choosing an EDI Loan</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          An Early Day Income Loan is designed to provide short-term financial flexibility when used responsibly. It may help eligible borrowers:
        </p>
        <div class="border-t border-slate-100 pt-5">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs sm:text-sm font-semibold text-slate-700">
            <ul class="space-y-3">
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Manage temporary cash flow shortages</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Handle unexpected financial emergencies</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Avoid interrupting long-term savings</span></li>
            </ul>
            <ul class="space-y-3">
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Meet urgent payment obligations</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Maintain better financial planning between salary cycles</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Access a convenient online application process</span></li>
            </ul>
          </div>
        </div>
      </div>
      <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
        *Responsible borrowing means requesting only the amount you genuinely need and ensuring you can comfortably repay it according to the agreed schedule.
      </p>
    </div>

    <!-- Section 4A: Eligibility Requirements -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <div class="space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="shield-check" class="w-4.5 h-4.5"></i></span>
          EDI Loan Eligibility – Who Can Apply?
        </h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          An Early Day Income Loan (EDI Loan) is generally designed for eligible salaried individuals who need temporary financial support before their next salary cycle. Every application is assessed individually by the lending partner to determine repayment suitability and overall financial stability.
        </p>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          Rather than relying on a single factor, lenders usually evaluate multiple aspects of your financial profile before making a lending decision.
        </p>
        
        <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50 pt-2 mt-6">
          <h3 class="font-display font-extrabold text-xs text-slate-800 px-4 pb-2 border-b border-slate-100 uppercase tracking-wider">EDI Loan Eligibility Overview</h3>
          <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
            <thead>
              <tr class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100 text-[10px] sm:text-xs">
                <th class="p-4 w-1/3 sm:w-1/4">Eligibility Criteria</th>
                <th class="p-4">General Requirement</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
              <tr><td class="p-4 font-bold text-darkBlue">Applicant Type</td><td class="p-4">Salaried Employees</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Age</td><td class="p-4">As per lender eligibility guidelines</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Employment Status</td><td class="p-4">Stable employment preferred</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Monthly Income</td><td class="p-4">Regular and verifiable salary</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Salary Account</td><td class="p-4">Active bank account</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Credit Assessment</td><td class="p-4">Evaluated by the lending partner</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">KYC Compliance</td><td class="p-4">Valid identity and address proof</td></tr>
            </tbody>
          </table>
        </div>
      </div>
      <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
        <strong>Please Note:</strong> Meeting the above eligibility criteria does not guarantee loan approval. The final decision depends on the lending partner's assessment of your income, employment, repayment capacity, documentation, credit profile, and internal lending policies.
      </p>
    </div>

    <!-- Section 4B: Documents Required -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-16 shadow-sm text-left space-y-8 reveal-on-scroll">
      <div class="space-y-2">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="file-text" class="w-4.5 h-4.5"></i></span>
          Documents Required
        </h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          Keeping your documents ready can help streamline the verification process. The exact requirements may vary depending on the lending partner and the loan product.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 border-b border-slate-100 pb-8">
        
        <!-- Identity Proof -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="user" class="w-3.5 h-3.5"></i></span>
            Identity Proof
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> PAN Card</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Aadhaar Card</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Passport / Voter ID</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Driving Licence</li>
          </ul>
        </div>

        <!-- Address Proof -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="map-pin" class="w-3.5 h-3.5"></i></span>
            Address Proof
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Aadhaar Card</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Passport</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Utility Bill</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Driving Licence</li>
          </ul>
        </div>

        <!-- Income & Employment Proof -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="briefcase" class="w-3.5 h-3.5"></i></span>
            Income & Employment Proof
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Latest Salary Slips</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Salary Bank Statements</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Employee ID Card</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Employment / Offer Letter</li>
          </ul>
        </div>

      </div>

      <!-- Document Checklist Table -->
      <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50 pt-2">
        <h3 class="font-display font-extrabold text-xs text-slate-800 px-4 pb-2 border-b border-slate-100 uppercase tracking-wider">EDI Loan Documents Checklist</h3>
        <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
          <thead>
            <tr class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100 text-[10px] sm:text-xs">
              <th class="p-4 w-1/3 sm:w-1/4">Document Category</th>
              <th class="p-4">Examples</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
            <tr><td class="p-4 font-bold text-darkBlue">Identity Proof</td><td class="p-4">PAN Card, Aadhaar Card</td></tr>
            <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Address Proof</td><td class="p-4">Passport, Utility Bill</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Income Proof</td><td class="p-4">Salary Slips, Bank Statements</td></tr>
            <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Employment Proof</td><td class="p-4">Employee ID / Employment Letter</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Additional Documents</td><td class="p-4">As requested by the lending partner</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Section 5: How to Apply Roadmap -->
    <div class="bg-gradient-to-r from-[#031d40] to-darkBlue text-white rounded-[2.5rem] p-8 md:p-12 mb-16 relative overflow-hidden shadow-2xl reveal-on-scroll">
      <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-primary/10 rounded-full blur-3xl"></div>
      <div class="absolute right-0 top-0 w-64 h-64 bg-accentYellow/5 rounded-full blur-2xl"></div>

      <div class="text-center max-w-2xl mx-auto mb-10 space-y-2 relative z-10">
        <span class="text-[10px] font-extrabold text-accentYellow uppercase tracking-widest bg-white/5 border border-white/10 px-3.5 py-1 rounded-full">Roadmap</span>
        <h2 class="font-display text-2.5xl md:text-3.5xl font-extrabold text-white">How to Apply for an EDI Loan</h2>
        <p class="text-xs text-slate-300 font-semibold">Applying through AavivaCred is designed to be simple and transparent.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-5 gap-6 relative z-10 text-left">
        
        <!-- Step 1 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">01</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">1</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Online Application</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Fill in personal, employment, and salary details online.</p>
        </div>

        <!-- Step 2 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">02</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">2</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Upload Documents</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Provide required KYC and income documents for verification.</p>
        </div>

        <!-- Step 3 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">03</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">3</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Eligibility Review</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">The lending partner reviews income, stability, and credit profile.</p>
        </div>

        <!-- Step 4 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">04</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">4</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Receive Loan Offer</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">If eligible, receive an offer with sanctioned amount, rate, and terms.</p>
        </div>

        <!-- Step 5 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">05</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">5</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Disbursement</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Accept the offer to receive funds according to lender's process.</p>
        </div>

      </div>
    </div>

    <!-- Section 6: Right Choice, Responsible Borrowing & Expert Tips -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-16 items-start reveal-on-scroll">
      
      <!-- Expert Tips & Is EDI Right Choice Card -->
      <div class="lg:col-span-7 bg-white border border-slate-200/70 rounded-[2.5rem] p-8 shadow-sm text-left space-y-6">
        <div class="space-y-3">
          <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue flex items-center gap-2">
            <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="help-circle" class="w-4.5 h-4.5"></i></span>
            Is an EDI Loan the Right Choice?
          </h2>
          <p class="text-slate-600 text-xs sm:text-sm font-semibold leading-relaxed">
            An Early Day Income Loan is best suited for temporary financial gaps, not for long-term borrowing. It may be appropriate if:
          </p>
          <ul class="space-y-2 text-xs font-semibold text-slate-700 pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Your salary is due shortly, but an essential expense cannot wait.</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> You are facing an unexpected medical or family emergency.</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> You need to pay an important utility bill or fee before payday.</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> You require temporary support without disturbing long-term savings.</li>
          </ul>
        </div>

        <div class="border-t border-slate-100 pt-5 space-y-3">
          <h3 class="font-display font-extrabold text-xs sm:text-sm text-darkBlue flex items-center gap-2">
            <i data-lucide="award" class="w-4 h-4 text-primary"></i> Expert Financial Tips Before Applying
          </h3>
          <div class="space-y-2.5 text-xs font-semibold text-slate-600">
            <p><strong class="text-slate-800">Borrow Only for Essential Needs:</strong> Use an EDI Loan for genuine financial emergencies rather than discretionary spending.</p>
            <p><strong class="text-slate-800">Choose an Affordable Repayment Plan:</strong> Ensure the repayment fits comfortably within your upcoming salary.</p>
            <p><strong class="text-slate-800">Review All Charges:</strong> Understand applicable interest rates, processing fees, and late charges.</p>
          </div>
        </div>
      </div>

      <!-- Borrow Responsibly Card -->
      <div class="lg:col-span-5 bg-white border border-slate-200/70 rounded-[2.5rem] p-8 shadow-sm text-left">
        <div class="space-y-4">
          <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Responsible Borrowing</h2>
          <p class="text-slate-500 text-xs sm:text-sm font-semibold">
            Before accepting an EDI Loan offer:
          </p>
          <div class="border-t border-slate-100 pt-3">
            <ul class="space-y-3 text-xs font-bold text-slate-700">
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Review the complete loan agreement</span></li>
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Understand your repayment obligations</span></li>
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Borrow only what you genuinely require</span></li>
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Repay comfortably within the timeline</span></li>
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Avoid multiple short-term loans at once</span></li>
            </ul>
          </div>
        </div>
        <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
          *Responsible borrowing helps maintain financial stability and reduces repayment difficulties.
        </p>
      </div>

    </div>

    <!-- Section 8: Trust & FAQs Side-by-Side -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-16 items-start reveal-on-scroll">
      
      <!-- Trust Content -->
      <div class="lg:col-span-5 bg-white border border-slate-200/70 rounded-[2.5rem] p-8 shadow-sm text-left">
        <div class="space-y-4">
          <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Why Borrowers Trust AavivaCred</h2>
          <p class="text-slate-500 text-xs sm:text-sm font-semibold">
            Customers choose AavivaCred because we combine technology with personalised support to create a transparent borrowing experience.
          </p>
          <div class="border-t border-slate-100 pt-3">
            <p class="text-xs font-bold text-slate-800 mb-3 uppercase tracking-wider">What Makes Us Different:</p>
            <ul class="space-y-2 text-xs font-bold text-slate-700">
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Simple digital experience</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Transparent loan information</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Trusted lending partners</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Personalised customer support</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Secure information handling</span></li>
            </ul>
          </div>
        </div>
        <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
          *Our objective is to help eligible borrowers make informed financial decisions.
        </p>
      </div>

      <!-- Accordion FAQs Card -->
      <div class="lg:col-span-7 bg-white border border-slate-200/70 rounded-[2.5rem] p-8 shadow-sm text-left">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue mb-6 flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="help-circle" class="w-4.5 h-4.5"></i></span>
          Frequently Asked Questions
        </h2>
        
        <div class="space-y-3.5">
          <?php foreach ($selected_faqs as $index => $faq): ?>
            <div class="border border-slate-100 rounded-2xl overflow-hidden bg-white">
              <button onclick="toggleFaq(<?php echo $index; ?>)" 
                class="w-full flex justify-between items-center p-4 text-left font-display font-bold text-xs sm:text-sm text-darkBlue hover:bg-slate-50/50 transition-colors">
                <span><?php echo htmlspecialchars($faq['q']); ?></span>
                <i data-lucide="chevron-down" id="faq-icon-<?php echo $index; ?>" class="w-4 h-4 text-slate-400 transition-transform duration-200"></i>
              </button>
              <div id="faq-ans-<?php echo $index; ?>" class="hidden px-4 pb-4 text-xs sm:text-sm font-semibold text-slate-500 leading-relaxed border-t border-slate-50/50 pt-3">
                <?php echo htmlspecialchars($faq['a']); ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>

    <!-- Section 10: Call to Action (CTA Card) -->
    <div class="bg-gradient-to-br from-[#021435] to-[#010b1d] text-white rounded-[2.5rem] p-8 md:p-12 mb-16 relative overflow-hidden shadow-xl text-center reveal-on-scroll">
      <div class="absolute left-[-20%] top-[-20%] w-[350px] h-[350px] bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>
      <div class="absolute right-[-20%] bottom-[-20%] w-[350px] h-[350px] bg-teal-400/10 rounded-full blur-3xl pointer-events-none"></div>

      <div class="relative z-10 max-w-2xl mx-auto space-y-6">
        <span class="text-[9px] font-extrabold tracking-widest text-accentYellow uppercase bg-white/5 border border-white/10 px-3 py-1 rounded-full">Early Income Sourcing</span>
        <h2 class="font-display text-2.5xl md:text-3.5xl font-extrabold text-white leading-tight">
          Take Control of Short-Term Financial Challenges
        </h2>
        <p class="text-xs sm:text-sm text-slate-300 font-semibold leading-relaxed">
          Temporary financial gaps shouldn't prevent you from managing essential responsibilities. Explore Early Day Income Loan solutions designed to support your short-term financial needs responsibly.
        </p>

        <div class="flex flex-wrap justify-center gap-4 text-slate-300 text-[10px] sm:text-xs font-bold py-2">
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Simple Online Application</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Trusted Lending Partners</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Transparent Loan Process</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Dedicated Customer Support</span>
        </div>

        <div class="pt-4">
          <a href="<?php echo PATH_PREFIX; ?>pages/apply.php?type=edi" class="inline-block bg-accentYellow hover:bg-yellow-500 text-darkBlue font-black text-sm px-10 py-4 rounded-2xl shadow-lg transition-all transform hover:-translate-y-0.5 active:scale-98">
            Start Your EDI Loan Application Today
          </a>
        </div>
      </div>
    </div>

    <!-- Sub-Products Section -->
    <div class="space-y-6 reveal-on-scroll">
      <h2 class="font-display font-extrabold text-xl md:text-2xl text-darkBlue text-left">
        Related Loan Products
      </h2>
      
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <?php foreach ($prod['related'] as $rel_slug): 
          if (!isset($products[$rel_slug])) continue;
          $rel = $products[$rel_slug];
          $icon = get_product_icon($rel_slug);
        ?>
        <a href="<?php echo PATH_PREFIX . $rel_slug; ?>" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-5 hover:border-primary/20 hover:-translate-y-1 hover:shadow-md transition-all flex items-center gap-3">
          <span class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary shrink-0">
            <i data-lucide="<?php echo $icon; ?>" class="w-5 h-5"></i>
          </span>
          <div class="text-left">
            <h4 class="font-display font-bold text-xs text-slate-800 leading-tight"><?php echo $rel['title']; ?></h4>
            <p class="text-[10px] text-slate-450 font-semibold mt-0.5">Check Offers</p>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</div>
