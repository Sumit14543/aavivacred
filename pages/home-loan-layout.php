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
              <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-white/80 border border-slate-200 px-3 py-1 rounded-full shadow-sm">Dream Home Funding</span>
              <h1 class="font-display text-2xl sm:text-3.5xl lg:text-4xl font-extrabold text-darkBlue leading-tight">
                Home Loan – Turn Your Dream Home <br class="hidden md:inline">
                into Reality with <span class="text-primary font-black">Right Financial Support</span>
              </h1>
              <p class="text-slate-500 font-semibold text-xs sm:text-sm">
                Because Every Home Begins with a Dream
              </p>
            </div>

            <!-- Quick Phone Form -->
            <form action="<?php echo PATH_PREFIX; ?>pages/apply.php" method="GET" class="space-y-4 max-w-md">
              <input type="hidden" name="type" value="home" />
              
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
                <i data-lucide="home" class="w-4 h-4 text-emerald-500"></i> End-to-End Assistance
              </span>
              <span class="flex items-center gap-1.5 text-xs font-bold text-slate-700 bg-white border border-slate-200 px-3.5 py-2 rounded-xl shadow-sm">
                <i data-lucide="calendar" class="w-4 h-4 text-primary"></i> Flexible 30Yr Tenure
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
                <span class="text-[11px] font-black text-darkBlue">Lowest EMI Rates</span>
              </div>

              <!-- Main Blended Image Container (No rigid photo frame) -->
              <div class="relative w-full rounded-[2rem] overflow-hidden shadow-2xl bg-white/40 border border-white/60 group transition-transform duration-300 hover:scale-[1.02]">
                <img src="<?php echo PATH_PREFIX; ?>assets/images/home_loan_banner.png" alt="Home Loan Sourcing" 
                  class="w-full h-auto object-cover mix-blend-multiply relative z-10 transition-transform duration-500 group-hover:scale-105" />
              </div>

              <!-- Bottom-Left Floating Notification Card -->
              <div class="absolute -bottom-4 -left-3 bg-darkBlue text-white border border-white/10 px-3.5 py-2.5 rounded-2xl shadow-2xl flex items-center gap-2.5 z-30">
                <span class="w-7 h-7 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-xs shrink-0">
                  <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400"></i>
                </span>
                <div class="text-left">
                  <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider leading-none">Tenure Flexibility</p>
                  <p class="text-xs font-black text-white leading-tight mt-0.5">Up to 30 Years Tenure</p>
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
          <strong>Disclaimer:</strong> Loan approval, loan amount, interest rate, repayment tenure, and disbursement depend on the applicant's eligibility, income, property verification, credit assessment, documentation, and the policies of the respective lending partner.
        </p>
      </div>
    </div>

    <!-- Home Loan Introduction Section (Editorial Layout) -->
    <div class="mb-14 text-center max-w-5xl mx-auto reveal-on-scroll">
      <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-primary/5 border border-primary/10 px-3.5 py-1.5 rounded-full shadow-sm">Overview</span>
      
      <h2 class="font-display text-2xl sm:text-3.5xl font-extrabold text-darkBlue leading-tight mt-4">
        Turn Your Dream Home into a Reality with the Right Financial Support
      </h2>
      <div class="w-16 h-1 bg-primary mx-auto mt-4 mb-8"></div>
      
      <!-- Lead Paragraph -->
      <p class="text-slate-700 text-base sm:text-lg font-medium max-w-3xl mx-auto leading-relaxed mb-8">
        For most families, buying a home is more than a financial decision—it's a life milestone. It's the place where memories are created, families grow, and the future feels secure. Whether you're purchasing your first apartment, building a house on your own plot, or upgrading to a larger home, arranging the required funds is often the biggest challenge.
      </p>

      <!-- Two-Column Body Copy -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 text-left text-slate-600 text-sm sm:text-[15px] leading-relaxed font-normal">
        <div class="space-y-4">
          <p>
            A Home Loan, also known as a Housing Loan, is designed to help eligible individuals finance the purchase, construction, renovation, or improvement of a residential property. Instead of paying the entire property cost upfront, borrowers repay the financed amount through Equated Monthly Instalments (EMIs) over an agreed repayment tenure.
          </p>
          <p>
            The amount you may be eligible to borrow depends on several factors, including your income, existing financial obligations, repayment capacity, credit history, property value, and the lending partner's internal assessment.
          </p>
          <p>
            Because a Home Loan is a long-term financial commitment, understanding the total borrowing cost, repayment schedule, and associated charges is essential before making a decision.
          </p>
        </div>
        <div class="space-y-4">
          <p>
            At AavivaCred, we help eligible homebuyers explore Home Loan options through trusted lending partners. Our role is to simplify the process, explain every step clearly, and help you understand the available financing options before making one of the most important financial decisions of your life.
          </p>
          <p>
            Instead of visiting multiple banks or lenders, you can begin your Home Loan journey through a single platform backed by transparent guidance and dedicated customer support.
          </p>
          <p>
            Whether you're planning to buy your first home, construct a new house, renovate your existing property, or transfer an existing Home Loan, choosing the right financing solution can help you achieve your long-term goals without exhausting your savings.
          </p>
        </div>
      </div>

      <!-- Full-Width Bottom Block & Quotes -->
      <div class="mt-6 text-left text-slate-600 text-sm sm:text-[15px] leading-relaxed">
        <p class="mb-8">
          Buying a home is one of the largest financial commitments most people make. Saving the entire purchase amount before buying a property may take many years, during which property prices can also change. When planned responsibly, a Home Loan becomes an investment in your future rather than simply a borrowing decision.
        </p>
        
        <!-- Combined Quotes Box -->
        <div class="bg-gradient-to-r from-primary/5 to-transparent border-l-4 border-primary p-6 rounded-r-2xl shadow-sm space-y-3.5">
          <p class="text-xs sm:text-sm text-slate-700 font-bold italic leading-relaxed">
            "A Home Loan enables eligible buyers to purchase a property today while spreading the repayment over an agreed tenure through manageable monthly instalments."
          </p>
          <p class="text-xs sm:text-sm text-slate-700 font-bold italic leading-relaxed">
            "Purchasing a property involves several important decisions, and financing is one of the most significant. At AavivaCred, we focus on making the Home Loan process transparent, convenient, and easy to understand."
          </p>
        </div>
      </div>
    </div>

    <!-- Why Homebuyers Choose AavivaCred (Relocated into a grid of small cards) -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 text-left reveal-on-scroll">
      <div class="mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Key Benefits</span>
        <h3 class="font-display font-extrabold text-xl sm:text-2xl text-darkBlue">Why Homebuyers Choose AavivaCred</h3>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">Our core advantages designed for prospective homeowners:</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="smartphone" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Simple Digital Application</span>
        </div>

        <!-- Card 2 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="eye" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Transparent Loan Assistance</span>
        </div>

        <!-- Card 3 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="handshake" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Trusted Lending Partners</span>
        </div>

        <!-- Card 4 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="user-check" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Dedicated Home Loan Specialists</span>
        </div>

        <!-- Card 5 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="shield-check" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Secure Document Submission</span>
        </div>

        <!-- Card 6 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="calendar" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Flexible Repayment Options*</span>
        </div>

        <!-- Card 7 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="heart-handshake" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">End-to-End Customer Support</span>
        </div>
      </div>
    </div>

    <!-- Section 1B: The AavivaCred Advantage Details -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 reveal-on-scroll text-left">
      <div class="max-w-3xl mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Why Choose Us</span>
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Why Choose AavivaCred for Your Home Loan?</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          Purchasing a property involves several important decisions, and financing is one of the most significant. At AavivaCred, we focus on making the Home Loan process transparent, convenient, and easy to understand.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Box 1 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="book-open" class="w-4 h-4"></i></span>
            Understand Before You Apply
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            A Home Loan isn't just about interest rates. It also involves repayment planning, eligibility assessment, property documents, and lender requirements. Our team helps you understand these factors with confidence.
          </p>
        </div>

        <!-- Box 2 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="smartphone" class="w-4 h-4"></i></span>
            Digital + Personal Assistance
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Our online platform allows eligible applicants to begin their Home Loan application from anywhere, while our experienced support team remains available to answer your questions whenever needed.
          </p>
        </div>

        <!-- Box 3 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="eye" class="w-4 h-4"></i></span>
            Transparent Guidance
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            From documentation requirements to repayment options, we believe customers deserve clear and accurate information before making a financial commitment.
          </p>
        </div>

        <!-- Box 4 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="handshake" class="w-4 h-4"></i></span>
            Trusted Lending Partners
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            We work with trusted lending partners offering Home Loan solutions across different income profiles and property requirements. Each application is independently assessed.
          </p>
        </div>

        <!-- Box 5 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="lock" class="w-4 h-4"></i></span>
            Secure & Reliable Process
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Your personal and financial information is handled with care and shared only with the relevant lending partner for processing your application.
          </p>
        </div>

      </div>
    </div>

    <!-- Section 2B: Value Creation Scenarios -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <div class="max-w-3xl mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-primary/5 border border-primary/10 px-3 py-1 rounded-full">Scenarios</span>
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">When Can a Home Loan Help?</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          Every homebuyer's journey is different. Depending on your goals, a Home Loan may help you in several ways:
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Scenario 1 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="home" class="w-3.5 h-3.5"></i></span>
            Buying Your First Home
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            For many families, purchasing their first home marks the beginning of financial stability. A Home Loan allows eligible buyers to achieve this goal without waiting years to accumulate the full amount.
          </p>
        </div>

        <!-- Scenario 2 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="hammer" class="w-3.5 h-3.5"></i></span>
            Constructing a House
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            If you already own residential land, Home Loan solutions may help finance the construction of your dream home according to your customized specifications.
          </p>
        </div>

        <!-- Scenario 3 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="wrench" class="w-3.5 h-3.5"></i></span>
            Renovating or Improving
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Major renovations, structural repairs, or home improvements often require significant investment. Financing these through a suitable loan preserves emergency savings.
          </p>
        </div>

        <!-- Scenario 4 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="map" class="w-3.5 h-3.5"></i></span>
            Purchasing a Plot
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Some lending partners provide financing for eligible residential plot purchases, subject to their specific product offerings and internal policies.
          </p>
        </div>

        <!-- Scenario 5 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="refresh-cw" class="w-3.5 h-3.5"></i></span>
            Balance Transfer
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            If you already have an existing Home Loan, you may be able to explore balance transfer options with eligible lending partners to optimize terms.
          </p>
        </div>

      </div>
    </div>

    <!-- Section 2C: Solutions for Different Needs Grid -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 text-left reveal-on-scroll">
      <div class="mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Tailored Products</span>
        <h3 class="font-display font-extrabold text-xl sm:text-2xl text-darkBlue">Home Loan Solutions for Different Needs</h3>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">Not every borrower has the same requirement. Explore targeted solutions:</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <div class="bg-white border border-slate-200/50 p-5 rounded-2xl space-y-2 shadow-sm">
          <h4 class="font-display font-bold text-xs sm:text-sm text-darkBlue flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="home" class="w-3.5 h-3.5"></i></span>
            Home Purchase Loan
          </h4>
          <p class="text-slate-500 text-xs font-semibold">Finance the purchase of a ready-to-move or under-construction residential property.</p>
        </div>

        <div class="bg-white border border-slate-200/50 p-5 rounded-2xl space-y-2 shadow-sm">
          <h4 class="font-display font-bold text-xs sm:text-sm text-darkBlue flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="hammer" class="w-3.5 h-3.5"></i></span>
            Home Construction Loan
          </h4>
          <p class="text-slate-500 text-xs font-semibold">Suitable for eligible borrowers who already own residential land and plan to build a house.</p>
        </div>

        <div class="bg-white border border-slate-200/50 p-5 rounded-2xl space-y-2 shadow-sm">
          <h4 class="font-display font-bold text-xs sm:text-sm text-darkBlue flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="wrench" class="w-3.5 h-3.5"></i></span>
            Home Renovation Loan
          </h4>
          <p class="text-slate-500 text-xs font-semibold">Finance structural improvements, repairs, interior upgrades, or home modernisation.</p>
        </div>

        <div class="bg-white border border-slate-200/50 p-5 rounded-2xl space-y-2 shadow-sm">
          <h4 class="font-display font-bold text-xs sm:text-sm text-darkBlue flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="maximize" class="w-3.5 h-3.5"></i></span>
            Home Extension Loan
          </h4>
          <p class="text-slate-500 text-xs font-semibold">Support construction of additional rooms or expansion of your existing residential property.</p>
        </div>

        <div class="bg-white border border-slate-200/50 p-5 rounded-2xl space-y-2 shadow-sm">
          <h4 class="font-display font-bold text-xs sm:text-sm text-darkBlue flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="arrow-right-left" class="w-3.5 h-3.5"></i></span>
            Balance Transfer Loan
          </h4>
          <p class="text-slate-500 text-xs font-semibold">Transfer an existing Home Loan to another lender for potential rate and tenure benefits.</p>
        </div>
      </div>
    </div>

    <!-- Section 3A: Features Table -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue mb-6 flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="file-spreadsheet" class="w-4.5 h-4.5"></i></span>
        Home Loan Features
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
            <tr><td class="p-4 font-bold text-darkBlue">Loan Purpose</td><td class="p-4 text-xs sm:text-sm">Purchase, Construction, Renovation or Improvement of Residential Property</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Loan Type</td><td class="p-4 text-xs sm:text-sm">Secured Home Loan</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Loan Amount</td><td class="p-4 text-xs sm:text-sm">Based on eligibility and property assessment</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Interest Rate</td><td class="p-4 text-xs sm:text-sm">Determined by the lending partner</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Repayment</td><td class="p-4 text-xs sm:text-sm">Monthly EMIs</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Loan Tenure</td><td class="p-4 text-xs sm:text-sm">Flexible tenure subject to lender policies (Up to 30 Years)</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Security</td><td class="p-4 text-xs sm:text-sm">Residential property financed</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Processing</td><td class="p-4 text-xs sm:text-sm">Online application with document verification</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Prepayment</td><td class="p-4 text-xs sm:text-sm">As per lender terms</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Section 3B: EMI Planning Card -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-16 shadow-sm text-left reveal-on-scroll">
      <div class="space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="calculator" class="w-4.5 h-4.5"></i></span>
          Planning Your EMI Before You Borrow
        </h2>
        <p class="text-slate-600 text-xs sm:text-sm font-semibold leading-relaxed">
          A Home Loan is repaid through Equated Monthly Instalments (EMIs) over the agreed repayment period. Your monthly EMI depends on several factors:
        </p>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-darkBlue font-bold text-xs pb-2 pl-2">
          <div class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Loan Amount</div>
          <div class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Interest Rate</div>
          <div class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Loan Tenure</div>
          <div class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Down Payment</div>
        </div>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold border-t border-slate-100 pt-3">
          Before accepting any Home Loan offer, calculate your estimated EMI and ensure it fits comfortably within your monthly household budget. Planning your repayment carefully today can help reduce financial stress in the future.
        </p>
      </div>
    </div>

    <!-- Section 4A: Eligibility Requirements -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <div class="space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="shield-check" class="w-4.5 h-4.5"></i></span>
          Home Loan Eligibility – Are You Ready to Own Your Dream Home?
        </h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          A Home Loan is a long-term financial commitment, which is why lending partners carefully assess each application before making a decision. The purpose of this assessment is to understand whether the applicant can comfortably manage the repayment while meeting other financial responsibilities.
        </p>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          Although eligibility requirements differ from one lender to another, maintaining a stable income, healthy credit profile, and complete documentation can strengthen your application.
        </p>
        
        <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50 pt-2 mt-6">
          <h3 class="font-display font-extrabold text-xs text-slate-800 px-4 pb-2 border-b border-slate-100 uppercase tracking-wider">Home Loan Eligibility Overview</h3>
          <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
            <thead>
              <tr class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100 text-[10px] sm:text-xs">
                <th class="p-4 w-1/3 sm:w-1/4">Eligibility Criteria</th>
                <th class="p-4">General Requirement</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
              <tr><td class="p-4 font-bold text-darkBlue">Applicant Type</td><td class="p-4">Salaried, Self-employed, Professionals, Business Owners</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Age</td><td class="p-4">As per lender's eligibility guidelines</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Income</td><td class="p-4">Stable and verifiable income</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Employment / Business Stability</td><td class="p-4">Consistent employment or established business</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Credit Profile</td><td class="p-4">Good repayment history preferred</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Property</td><td class="p-4">Residential property meeting lender requirements</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Co-applicant</td><td class="p-4">May improve eligibility, subject to lender assessment</td></tr>
            </tbody>
          </table>
        </div>
      </div>
      <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
        <strong>Please Note:</strong> Meeting the above criteria does not guarantee Home Loan approval. Final approval is based on the lending partner's assessment of your income, repayment capacity, credit profile, property evaluation, and submitted documents.
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
          Preparing your documents in advance helps make the verification process smoother.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 border-b border-slate-100 pb-8">
        
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
          </ul>
        </div>

        <!-- Income Proof -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="briefcase" class="w-3.5 h-3.5"></i></span>
            Income Proof
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Salary Slips / Form 16</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> ITR & P&L Statement</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Bank Statements</li>
          </ul>
        </div>

        <!-- Property Documents -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="file-check" class="w-3.5 h-3.5"></i></span>
            Property Documents
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Sale Agreement / Title</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Approved Plan & Tax Receipts</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Occupancy Certificate</li>
          </ul>
        </div>

      </div>

      <!-- Document Checklist Table -->
      <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50 pt-2">
        <h3 class="font-display font-extrabold text-xs text-slate-800 px-4 pb-2 border-b border-slate-100 uppercase tracking-wider">Home Loan Documents Checklist</h3>
        <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
          <thead>
            <tr class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100 text-[10px] sm:text-xs">
              <th class="p-4 w-1/3 sm:w-1/4">Document Category</th>
              <th class="p-4">Examples</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
            <tr><td class="p-4 font-bold text-darkBlue">Identity Proof</td><td class="p-4">PAN, Aadhaar</td></tr>
            <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Address Proof</td><td class="p-4">Passport, Utility Bill</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Income Proof</td><td class="p-4">Salary Slips, ITR</td></tr>
            <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Bank Statements</td><td class="p-4">Latest Statements</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Property Documents</td><td class="p-4">Sale Deed, Approved Plan, Tax Receipts</td></tr>
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
        <h2 class="font-display text-2.5xl md:text-3.5xl font-extrabold text-white">Your Home Loan Journey with AavivaCred</h2>
        <p class="text-xs text-slate-300 font-semibold">Buying a home involves several important steps. Our objective is to make the financing process simple and transparent.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-5 gap-6 relative z-10 text-left">
        
        <!-- Step 1 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">01</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">1</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Share Requirement</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Tell us whether you're purchasing ready property, constructing, or renovating.</p>
        </div>

        <!-- Step 2 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">02</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">2</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Complete Application</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Submit your personal, employment, or business details along with KYC.</p>
        </div>

        <!-- Step 3 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">03</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">3</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Property Assessment</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Lenders review income, credit profile, and property-related documents.</p>
        </div>

        <!-- Step 4 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">04</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">4</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Loan Offer</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Receive a loan offer detailing sanctioned amount, interest rate, and tenure.</p>
        </div>

        <!-- Step 5 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">05</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">5</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Disbursement</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Complete legal formalities to receive the sanctioned amount according to process.</p>
        </div>

      </div>
    </div>

    <!-- Section 6: Borrow Responsibly & Expert Tips -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-16 items-start reveal-on-scroll">
      
      <!-- Expert Tips Card -->
      <div class="lg:col-span-7 bg-white border border-slate-200/70 rounded-[2.5rem] p-8 shadow-sm text-left">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue mb-4 flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="award" class="w-4.5 h-4.5"></i></span>
          Expert Tips Before Applying for a Home Loan
        </h2>
        <div class="text-slate-650 text-xs sm:text-sm font-semibold leading-relaxed space-y-4">
          <p class="text-slate-500">
            Purchasing a home is one of the biggest financial decisions you'll make. A little preparation can make the process smoother:
          </p>
          <div class="space-y-3.5 pl-1">
            <div class="space-y-1">
              <h5 class="text-darkBlue font-bold text-xs sm:text-sm flex items-center gap-1.5"><i data-lucide="check" class="w-3.5 h-3.5 text-primary"></i> Save for the Down Payment</h5>
              <p class="text-[11px] sm:text-xs text-slate-500 font-semibold pl-5">A larger down payment may reduce the loan amount and overall repayment burden.</p>
            </div>
            <div class="space-y-1">
              <h5 class="text-darkBlue font-bold text-xs sm:text-sm flex items-center gap-1.5"><i data-lucide="check" class="w-3.5 h-3.5 text-primary"></i> Check Your Credit Profile</h5>
              <p class="text-[11px] sm:text-xs text-slate-500 font-semibold pl-5">A healthy credit history may strengthen your application with the lending partner.</p>
            </div>
            <div class="space-y-1">
              <h5 class="text-darkBlue font-bold text-xs sm:text-sm flex items-center gap-1.5"><i data-lucide="check" class="w-3.5 h-3.5 text-primary"></i> Maintain Stable Income Records</h5>
              <p class="text-[11px] sm:text-xs text-slate-500 font-semibold pl-5">Consistent income and organised financial documents help during assessment.</p>
            </div>
            <div class="space-y-1">
              <h5 class="text-darkBlue font-bold text-xs sm:text-sm flex items-center gap-1.5"><i data-lucide="check" class="w-3.5 h-3.5 text-primary"></i> Compare More Than Interest Rates</h5>
              <p class="text-[11px] sm:text-xs text-slate-500 font-semibold pl-5">Review processing charges, repayment flexibility, prepayment conditions, and total cost.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Borrow Responsibly Card -->
      <div class="lg:col-span-5 bg-white border border-slate-200/70 rounded-[2.5rem] p-8 shadow-sm text-left">
        <div class="space-y-4">
          <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Borrow Responsibly</h2>
          <p class="text-slate-500 text-xs sm:text-sm font-semibold">
            A Home Loan should help you achieve home ownership while maintaining long-term financial stability:
          </p>
          <div class="border-t border-slate-100 pt-3">
            <ul class="space-y-3.5 text-xs font-bold text-slate-700">
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Borrow within your repayment capacity</span></li>
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Keep emergency savings separate</span></li>
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Consider future financial responsibilities</span></li>
              <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Review all charges & repayment terms</span></li>
            </ul>
          </div>
        </div>
        <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-8 leading-relaxed">
          *Responsible borrowing protects both your financial future and your peace of mind.
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
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Dedicated Home Loan specialists</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Simple digital application process</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>End-to-end customer support</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Trusted lending partners</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Transparent loan communication</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Secure handling of information</span></li>
            </ul>
          </div>
        </div>
        <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
          *Our objective is to help eligible homebuyers make informed financial decisions.
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
        <span class="text-[9px] font-extrabold tracking-widest text-accentYellow uppercase bg-white/5 border border-white/10 px-3 py-1 rounded-full">Dream Home Sourcing</span>
        <h2 class="font-display text-2.5xl md:text-3.5xl font-extrabold text-white leading-tight">
          Build Your Future with the Right Home Loan
        </h2>
        <p class="text-xs sm:text-sm text-slate-300 font-semibold leading-relaxed">
          A home is more than a property—it is a place where dreams, memories, and milestones come together.
        </p>

        <div class="flex flex-wrap justify-center gap-4 text-slate-300 text-[10px] sm:text-xs font-bold py-2">
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Apply Online</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Trusted Lending Partners</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Transparent Guidance</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Dedicated Support</span>
        </div>

        <div class="pt-4">
          <a href="<?php echo PATH_PREFIX; ?>pages/apply.php?type=home" class="inline-block bg-accentYellow hover:bg-yellow-500 text-darkBlue font-black text-sm px-10 py-4 rounded-2xl shadow-lg transition-all transform hover:-translate-y-0.5 active:scale-98">
            Begin Your Home Loan Journey Today
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
