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
              <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-white/80 border border-slate-200 px-3 py-1 rounded-full shadow-sm">Gold Valuation Sourcing</span>
              <h1 class="font-display text-2xl sm:text-3.5xl lg:text-4xl font-extrabold text-darkBlue leading-tight">
                Gold Loan – Unlock the Value of Your Gold <br class="hidden md:inline">
                Without <span class="text-primary font-black">Letting Go of It</span>
              </h1>
              <p class="text-slate-500 font-semibold text-xs sm:text-sm">
                Access Timely Funds While Retaining Ownership of Your Jewellery
              </p>
            </div>

            <!-- Quick Phone Form -->
            <form action="<?php echo PATH_PREFIX; ?>pages/apply.php" method="GET" class="space-y-4 max-w-md">
              <input type="hidden" name="type" value="gold" />
              
              <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-grow flex items-center bg-white border border-slate-250 rounded-xl overflow-hidden focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/20 transition-all shadow-inner">
                  <div class="flex items-center gap-1 px-4 border-r border-slate-200 bg-slate-50 text-slate-550 font-bold text-sm">
                    <span class="text-xs">🇮🇳</span> <span>+91</span>
                  </div>
                  <input type="tel" name="qty" required maxlength="10" placeholder="Enter mobile number" 
                    class="w-full bg-transparent px-4 py-3.5 text-sm text-slate-800 focus:outline-none border-none" />
                </div>
                <button type="submit" class="bg-accentYellow hover:bg-yellow-500 text-darkBlue font-extrabold px-8 py-3.5 rounded-xl text-sm transition-all shadow-md active:scale-95 shrink-0">
                  Enquire Now
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
                <i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i> 100% Secure Custody
              </span>
              <span class="flex items-center gap-1.5 text-xs font-bold text-slate-700 bg-white border border-slate-200 px-3.5 py-2 rounded-xl shadow-sm">
                <i data-lucide="coins" class="w-4 h-4 text-primary"></i> Fast Gold Evaluation
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
                <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse"></span>
                <span class="text-[11px] font-black text-darkBlue">Highest Gold Valuation</span>
              </div>

              <!-- Main Blended Image Container (No rigid photo frame) -->
              <div class="relative w-full rounded-[2rem] overflow-hidden shadow-2xl bg-white/40 border border-white/60 group transition-transform duration-300 hover:scale-[1.02]">
                <img src="<?php echo PATH_PREFIX; ?>assets/images/gold_loan_people.png" alt="Gold Loan Sourcing" 
                  class="w-full h-auto object-cover mix-blend-multiply relative z-10 transition-transform duration-500 group-hover:scale-105" />
              </div>

              <!-- Bottom-Left Floating Notification Card -->
              <div class="absolute -bottom-4 -left-3 bg-darkBlue text-white border border-white/10 px-3.5 py-2.5 rounded-2xl shadow-2xl flex items-center gap-2.5 z-30">
                <span class="w-7 h-7 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-xs shrink-0">
                  <i data-lucide="shield-check" class="w-4 h-4 text-amber-400"></i>
                </span>
                <div class="text-left">
                  <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider leading-none">Bank Vault Security</p>
                  <p class="text-xs font-black text-white leading-tight mt-0.5">Retain Full Ownership</p>
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
          <strong>Important Disclaimer:</strong> Loan approval, sanctioned amount, loan-to-value ratio, applicable interest rate, repayment tenure, gold valuation, and disbursement depend on the purity and weight of the pledged gold, applicant eligibility, documentation, and the lending partner's policies.
        </p>
      </div>
    </div>

    <!-- Gold Loan Introduction Section (Editorial Layout) -->
    <div class="mb-14 text-center max-w-5xl mx-auto reveal-on-scroll">
      <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-primary/5 border border-primary/10 px-3.5 py-1.5 rounded-full shadow-sm">Overview</span>
      
      <h2 class="font-display text-2xl sm:text-3.5xl font-extrabold text-darkBlue leading-tight mt-4">
        Unlock the Value of Your Gold Without Letting Go of It
      </h2>
      <div class="w-16 h-1 bg-primary mx-auto mt-4 mb-8"></div>
      
      <!-- Lead Paragraph -->
      <p class="text-slate-700 text-base sm:text-lg font-medium max-w-3xl mx-auto leading-relaxed mb-8">
        Gold is more than a precious metal—it often represents years of savings, family traditions, and financial security. During times when immediate funds are required, selling your jewellery may not always be the best option.
      </p>

      <!-- Two-Column Body Copy -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 text-left text-slate-600 text-sm sm:text-[15px] leading-relaxed font-normal">
        <div class="space-y-4">
          <p>
            A Gold Loan, also known as a Loan Against Gold, is a secured loan where eligible borrowers pledge gold jewellery or ornaments as collateral to obtain funds from a lending partner.
          </p>
          <p>
            The amount available under a Gold Loan generally depends on factors such as purity of the gold, weight of the pledged jewellery, applicable loan-to-value norms, lender's assessment, and internal lending policies.
          </p>
          <p>
            Because the loan is secured against gold jewellery, Gold Loans are often considered by borrowers seeking financing for short-term financial requirements. However, every application is assessed individually, and loan terms vary across lending partners.
          </p>
        </div>
        <div class="space-y-4">
          <p>
            At AavivaCred, we help eligible applicants explore Gold Loan options through trusted lending partners. Whether you need funds for a medical emergency, business working capital, education, home improvement, or other genuine financial needs, our objective is to make the borrowing process simple, transparent, and convenient.
          </p>
          <p>
            Instead of permanently parting with your valuable jewellery, you may be able to access financing while your pledged gold remains securely held by the lending partner until the loan is repaid according to the agreed terms.
          </p>
          <p>
            When the loan is repaid according to the agreed terms, the pledged jewellery is returned by the lending partner, subject to the applicable loan agreement. This makes a Gold Loan a practical financing option for individuals who own eligible gold jewellery.
          </p>
        </div>
      </div>

      <!-- Full-Width Bottom Block & Quotes -->
      <div class="mt-6 text-left text-slate-600 text-sm sm:text-[15px] leading-relaxed">
        <p class="mb-8">
          Unexpected financial requirements can arise at any stage of life. Instead of liquidating long-term investments or selling family jewellery, many eligible borrowers choose a Gold Loan because it allows them to unlock the value of their gold while preserving ownership.
        </p>
        
        <!-- Combined Quotes Box -->
        <div class="bg-gradient-to-r from-primary/5 to-transparent border-l-4 border-primary p-6 rounded-r-2xl shadow-sm space-y-3.5">
          <p class="text-xs sm:text-sm text-slate-700 font-bold italic leading-relaxed">
            "A Gold Loan allows eligible borrowers to use the value of their gold jewellery to access funds while continuing to retain ownership, subject to successful repayment and the lender's terms."
          </p>
          <p class="text-xs sm:text-sm text-slate-700 font-bold italic leading-relaxed">
            "Choosing the right platform is just as important as choosing the right loan. At AavivaCred, we believe borrowers deserve clear information, honest guidance, and a transparent borrowing experience."
          </p>
        </div>
      </div>
    </div>

    <!-- Why Borrowers Choose AavivaCred (Relocated into a grid of small cards) -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 text-left reveal-on-scroll">
      <div class="mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Key Benefits</span>
        <h3 class="font-display font-extrabold text-xl sm:text-2xl text-darkBlue">Why Choose AavivaCred for a Gold Loan?</h3>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">Key features supporting your gold finance enquiry:</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="smartphone" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Easy Online Enquiry</span>
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
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Secure Loan Process</span>
        </div>

        <!-- Card 5 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="user-check" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Dedicated Customer Support</span>
        </div>

        <!-- Card 6 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="file-check" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Simple Documentation*</span>
        </div>

        <!-- Card 7 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="calendar" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Flexible Repayment Options*</span>
        </div>
      </div>
    </div>

    <!-- Section 1B: The AavivaCred Advantage Details -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 reveal-on-scroll text-left">
      <div class="max-w-3xl mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Why Borrowers Trust Us</span>
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Why Borrowers Trust AavivaCred</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          Choosing the right platform is just as important as choosing the right loan. At AavivaCred, we believe borrowers deserve clear information, honest guidance, and a transparent borrowing experience.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        
        <!-- Box 1 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="user-check" class="w-4 h-4"></i></span>
            Personalised Guidance
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Every borrower's financial situation is different. Our team helps you understand the Gold Loan process, documentation requirements, repayment options, and lender policies before you proceed.
          </p>
        </div>

        <!-- Box 2 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="handshake" class="w-4 h-4"></i></span>
            Trusted Lending Network
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            We work with trusted lending partners that offer Gold Loan solutions to eligible applicants. Each application is evaluated individually based on the lender's internal criteria.
          </p>
        </div>

        <!-- Box 3 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="smartphone" class="w-4 h-4"></i></span>
            Digital Convenience
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            You can begin your enquiry online and receive assistance throughout the application process without unnecessary complexity.
          </p>
        </div>

        <!-- Box 4 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="lock" class="w-4 h-4"></i></span>
            Secure Info Handling
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Your personal information is handled securely, and your application details are shared only with the relevant lending partner as required for loan processing.
          </p>
        </div>

      </div>
    </div>

    <!-- Section 2B: Value Creation Scenarios -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <div class="max-w-3xl mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-primary/5 border border-primary/10 px-3 py-1 rounded-full">Scenarios</span>
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">When Can a Gold Loan Be Useful?</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          Unexpected financial requirements can arise at any stage of life. A Gold Loan can support your financial goals:
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Value point 1 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="activity" class="w-3.5 h-3.5"></i></span>
            Medical Emergencies
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Unexpected healthcare expenses may require immediate financial arrangements. A Gold Loan can be considered by eligible borrowers who own gold jewellery and need timely access to funds.
          </p>
        </div>

        <!-- Value point 2 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="briefcase" class="w-3.5 h-3.5"></i></span>
            Business Working Capital
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Small business owners, traders, and self-employed professionals may use a Gold Loan to manage temporary cash flow requirements, purchase inventory, or support business operations.
          </p>
        </div>

        <!-- Value point 3 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="graduation-cap" class="w-3.5 h-3.5"></i></span>
            Education Expenses
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Higher education, professional courses, or examination fees often require planned financial support. A Gold Loan may help eligible families manage these expenses without selling valuable jewellery.
          </p>
        </div>

        <!-- Value point 4 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="home" class="w-3.5 h-3.5"></i></span>
            Home Renovation
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Repairing or upgrading your home can involve significant costs. Financing these improvements through a Gold Loan may help preserve your savings for other long-term goals.
          </p>
        </div>

        <!-- Value point 5 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="calendar" class="w-3.5 h-3.5"></i></span>
            Seasonal Financial Needs
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Festive seasons, agricultural activities, or temporary business requirements sometimes create short-term funding needs that can be addressed through eligible Gold Loan products.
          </p>
        </div>

      </div>
    </div>

    <!-- Section 3A: Features Table -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue mb-6 flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="file-spreadsheet" class="w-4.5 h-4.5"></i></span>
        Gold Loan Features at a Glance
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
            <tr><td class="p-4 font-bold text-darkBlue">Loan Type</td><td class="p-4 text-xs sm:text-sm">Secured Loan Against Eligible Gold Jewellery</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Purpose</td><td class="p-4 text-xs sm:text-sm">Personal, Business, Education, Medical & Other Genuine Financial Needs</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Collateral</td><td class="p-4 text-xs sm:text-sm">Eligible Gold Jewellery / Ornaments</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Loan Amount</td><td class="p-4 text-xs sm:text-sm">Based on gold valuation and lender assessment</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Interest Rate</td><td class="p-4 text-xs sm:text-sm">Determined by the lending partner</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Repayment</td><td class="p-4 text-xs sm:text-sm">EMI, interest servicing, or bullet repayment options</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Processing</td><td class="p-4 text-xs sm:text-sm">Gold evaluation, documentation, and verification</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Ownership</td><td class="p-4 text-xs sm:text-sm">Jewellery is returned after successful repayment as per terms</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Section 3B: Gold Valuation & Repayment Options -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-16 shadow-sm text-left reveal-on-scroll">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Valuation Explanation -->
        <div class="space-y-4">
          <h3 class="font-display text-lg sm:text-xl font-extrabold text-darkBlue flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="calculator" class="w-4 h-4"></i></span>
            Understanding Gold Valuation
          </h3>
          <p class="text-slate-500 text-xs sm:text-sm font-semibold leading-relaxed">
            One of the most common questions borrowers have is how the loan amount is determined. The lending partner generally evaluates:
          </p>
          <ul class="space-y-2 text-xs sm:text-sm font-semibold text-slate-700 pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Purity of the gold</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Net weight of the jewellery</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Applicable loan-to-value (LTV) guidelines</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Internal lending policies & regulatory norms</li>
          </ul>
          <p class="text-xs text-slate-400 font-semibold italic border-t border-slate-100 pt-3">
            The final sanctioned amount depends on the lender's valuation process and applicable norms.
          </p>
        </div>

        <!-- Repayment Options -->
        <div class="space-y-4">
          <h3 class="font-display text-lg sm:text-xl font-extrabold text-darkBlue flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="refresh-cw" class="w-4 h-4"></i></span>
            Gold Loan Repayment Options
          </h3>
          <p class="text-slate-500 text-xs sm:text-sm font-semibold leading-relaxed">
            Different lenders may offer different repayment methods depending on the loan product:
          </p>
          <div class="space-y-3">
            <div class="bg-slate-50/50 p-3.5 rounded-xl border border-slate-100 space-y-1">
              <h5 class="font-bold text-xs text-darkBlue">Regular EMI Repayment</h5>
              <p class="text-[11px] text-slate-500 font-semibold">Repay the principal and interest through fixed monthly instalments.</p>
            </div>
            <div class="bg-slate-50/50 p-3.5 rounded-xl border border-slate-100 space-y-1">
              <h5 class="font-bold text-xs text-darkBlue">Interest Servicing</h5>
              <p class="text-[11px] text-slate-500 font-semibold">Pay interest periodically and repay the principal according to agreed terms.</p>
            </div>
            <div class="bg-slate-50/50 p-3.5 rounded-xl border border-slate-100 space-y-1">
              <h5 class="font-bold text-xs text-darkBlue">Bullet Repayment</h5>
              <p class="text-[11px] text-slate-500 font-semibold">Structured repayment for certain products, subject to lender policies.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Section 4A: Eligibility Requirements -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <div class="space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="shield-check" class="w-4.5 h-4.5"></i></span>
          Gold Loan Eligibility – Who Can Apply?
        </h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          A Gold Loan is generally available to eligible individuals who own gold jewellery that meets the lending partner's valuation and purity requirements. Since the loan is secured against pledged gold, lenders evaluate both the applicant and the pledged jewellery before making a lending decision.
        </p>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          Although eligibility criteria vary, borrowers should ensure they have valid identity documents and eligible gold ornaments before applying.
        </p>
        
        <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50 pt-2 mt-6">
          <h3 class="font-display font-extrabold text-xs text-slate-800 px-4 pb-2 border-b border-slate-100 uppercase tracking-wider">Gold Loan Eligibility Overview</h3>
          <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
            <thead>
              <tr class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100 text-[10px] sm:text-xs">
                <th class="p-4 w-1/3 sm:w-1/4">Eligibility Criteria</th>
                <th class="p-4">General Requirement</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
              <tr><td class="p-4 font-bold text-darkBlue">Applicant Type</td><td class="p-4">Salaried, Self-employed, Business Owners, Professionals, Farmers*</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Age</td><td class="p-4">As per lender guidelines</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Ownership</td><td class="p-4">Eligible gold jewellery or ornaments</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Gold Purity</td><td class="p-4">As accepted by the lending partner</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">KYC Documents</td><td class="p-4">Valid identity and address proof</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Repayment Capacity</td><td class="p-4">Considered where applicable</td></tr>
            </tbody>
          </table>
        </div>
      </div>
      <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
        <strong>Please Note:</strong> Meeting the basic eligibility requirements does not guarantee loan approval. The final loan amount, loan-to-value ratio, and approval depend on the lending partner's evaluation of the pledged gold and the applicant's profile.
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
          Applying for a Gold Loan usually involves fewer documents compared to many other loan products. However, exact documentation may differ depending on the lender and regulatory requirements.
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
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Passport</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Driving Licence / Voter ID</li>
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

        <!-- Gold Jewellery -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="coins" class="w-3.5 h-3.5"></i></span>
            Gold Jewellery
          </h4>
          <p class="text-xs text-slate-600 font-semibold leading-relaxed">
            Eligible gold ornaments are evaluated by the lending partner to determine the loan amount. Passport-size photographs may also be requested.
          </p>
        </div>

      </div>

      <!-- Document Checklist Table -->
      <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50 pt-2">
        <h3 class="font-display font-extrabold text-xs text-slate-800 px-4 pb-2 border-b border-slate-100 uppercase tracking-wider">Gold Loan Document Checklist</h3>
        <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
          <thead>
            <tr class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100 text-[10px] sm:text-xs">
              <th class="p-4 w-1/3 sm:w-1/4">Document Type</th>
              <th class="p-4">Examples</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
            <tr><td class="p-4 font-bold text-darkBlue">Identity Proof</td><td class="p-4">PAN Card, Aadhaar Card</td></tr>
            <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Address Proof</td><td class="p-4">Passport, Utility Bill</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Photographs</td><td class="p-4">Passport-size photographs (if required)</td></tr>
            <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Gold Jewellery</td><td class="p-4">Eligible ornaments for valuation</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Additional Documents</td><td class="p-4">As requested by the lender</td></tr>
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
        <h2 class="font-display text-2.5xl md:text-3.5xl font-extrabold text-white">How to Apply for a Gold Loan</h2>
        <p class="text-xs text-slate-300 font-semibold">At AavivaCred, we aim to make the application process simple, transparent, and convenient.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-5 gap-6 relative z-10 text-left">
        
        <!-- Step 1 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">01</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">1</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Submit Enquiry</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Share basic details & financing requirement through online enquiry form.</p>
        </div>

        <!-- Step 2 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">02</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">2</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Document Verification</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Provide KYC documents requested by the lending partner.</p>
        </div>

        <!-- Step 3 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">03</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">3</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Gold Evaluation</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Gold jewellery is evaluated based on purity, weight, and LTV norms.</p>
        </div>

        <!-- Step 4 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">04</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">4</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Loan Offer</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Receive an offer with sanctioned amount, interest rate, and terms.</p>
        </div>

        <!-- Step 5 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">05</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">5</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Disbursement</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Complete required documentation to receive funds according to process.</p>
        </div>

      </div>
    </div>

    <!-- Section 6: Borrow Responsibly & Expert Tips -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-16 items-start reveal-on-scroll">
      
      <!-- Expert Tips Card -->
      <div class="lg:col-span-7 bg-white border border-slate-200/70 rounded-[2.5rem] p-8 shadow-sm text-left">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue mb-4 flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="award" class="w-4.5 h-4.5"></i></span>
          Expert Tips Before Pledging Your Gold
        </h2>
        <div class="text-slate-650 text-xs sm:text-sm font-semibold leading-relaxed space-y-4">
          <p class="text-slate-500">
            A Gold Loan can be a useful financial solution when used responsibly. Before applying, consider the following:
          </p>
          <div class="space-y-3.5 pl-1">
            <div class="space-y-1">
              <h5 class="text-darkBlue font-bold text-xs sm:text-sm flex items-center gap-1.5"><i data-lucide="check" class="w-3.5 h-3.5 text-primary"></i> Borrow Only What You Need</h5>
              <p class="text-[11px] sm:text-xs text-slate-500 font-semibold pl-5">Avoid borrowing more than your actual financial requirement.</p>
            </div>
            <div class="space-y-1">
              <h5 class="text-darkBlue font-bold text-xs sm:text-sm flex items-center gap-1.5"><i data-lucide="check" class="w-3.5 h-3.5 text-primary"></i> Understand the Loan Terms</h5>
              <p class="text-[11px] sm:text-xs text-slate-500 font-semibold pl-5">Review the interest rate, repayment schedule, applicable charges, and consequences of delayed repayment.</p>
            </div>
            <div class="space-y-1">
              <h5 class="text-darkBlue font-bold text-xs sm:text-sm flex items-center gap-1.5"><i data-lucide="check" class="w-3.5 h-3.5 text-primary"></i> Plan Your Repayment</h5>
              <p class="text-[11px] sm:text-xs text-slate-500 font-semibold pl-5">Choose a repayment option that comfortably fits your monthly budget.</p>
            </div>
            <div class="space-y-1">
              <h5 class="text-darkBlue font-bold text-xs sm:text-sm flex items-center gap-1.5"><i data-lucide="check" class="w-3.5 h-3.5 text-primary"></i> Verify Your Jewellery Records</h5>
              <p class="text-[11px] sm:text-xs text-slate-500 font-semibold pl-5">Keep invoices or ownership records, if available, as they may be helpful during the process.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Borrow Responsibly Card -->
      <div class="lg:col-span-5 bg-white border border-slate-200/70 rounded-[2.5rem] p-8 shadow-sm text-left">
        <div class="space-y-4">
          <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Borrow Responsibly</h2>
          <p class="text-slate-500 text-xs sm:text-sm font-semibold">
            A Gold Loan provides timely support, but involves pledging valuable personal assets. Before accepting an offer:
          </p>
          <div class="border-t border-slate-100 pt-3">
            <ul class="space-y-3.5 text-xs font-bold text-slate-700">
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Read the lender's terms carefully</span></li>
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Understand the repayment schedule</span></li>
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Borrow only what you can comfortably repay</span></li>
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Keep track of repayment dates</span></li>
            </ul>
          </div>
        </div>
        <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-8 leading-relaxed">
          *Timely repayment helps ensure pledged jewellery is released according to loan terms.
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
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Personalised guidance throughout</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Easy digital enquiry process</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Dedicated customer support</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Trusted lending partners</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Transparent loan communication</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Secure handling of information</span></li>
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
        <span class="text-[9px] font-extrabold tracking-widest text-accentYellow uppercase bg-white/5 border border-white/10 px-3 py-1 rounded-full">Secure Sourcing</span>
        <h2 class="font-display text-2.5xl md:text-3.5xl font-extrabold text-white leading-tight">
          Unlock the Value of Your Gold with Confidence
        </h2>
        <p class="text-xs sm:text-sm text-slate-300 font-semibold leading-relaxed">
          Whether you're planning for an important life event or managing an unexpected financial requirement, choosing the right financing solution can make a meaningful difference.
        </p>

        <div class="flex flex-wrap justify-center gap-4 text-slate-300 text-[10px] sm:text-xs font-bold py-2">
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Easy Online Enquiry</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Trusted Lending Partners</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Transparent Process</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> 100% Secure Vault Custody</span>
        </div>

        <div class="pt-4">
          <a href="<?php echo PATH_PREFIX; ?>pages/apply.php?type=gold" class="inline-block bg-accentYellow hover:bg-yellow-500 text-darkBlue font-black text-sm px-10 py-4 rounded-2xl shadow-lg transition-all transform hover:-translate-y-0.5 active:scale-98">
            Apply for a Gold Loan Today
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
