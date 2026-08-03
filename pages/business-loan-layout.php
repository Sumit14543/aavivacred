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
        
        <!-- Background vector wave lines and blurs for "bhara bhara" look -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
          <!-- Fine vector wave lines -->
          <svg class="w-full h-full text-primary/10 opacity-60" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="0.3" preserveAspectRatio="none">
            <path d="M0,30 Q25,10 50,30 T100,30" />
            <path d="M0,50 Q25,35 50,50 T100,50" />
            <path d="M0,70 Q25,55 50,70 T100,70" />
          </svg>
          
          <!-- Large filled background color waves (Layered & organic) -->
          <div class="absolute right-0 bottom-0 top-0 w-full sm:w-1/2 z-0 opacity-90 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
              <!-- Layer 1: Base Wave -->
              <path d="M25,100 Q8,55 65,0 L100,0 L100,100 Z" fill="#f0f6fe" />
              <!-- Layer 2: Middle Wave -->
              <path d="M40,100 Q20,65 78,0 L100,0 L100,100 Z" fill="#e8f2fd" opacity="0.6" />
            </svg>
          </div>

          <!-- Floating background light-blue circles/blurs -->
          <div class="absolute right-10 top-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
          <div class="absolute left-1/3 bottom-5 w-40 h-40 bg-accentYellow/5 rounded-full blur-2xl"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
          
          <!-- Left Column: Content & Form -->
          <div class="lg:col-span-7 space-y-5 text-left">
            <div class="space-y-2">
              <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-white/80 border border-slate-200 px-3 py-1 rounded-full shadow-sm">SME Capital</span>
              <h2 class="font-display text-2.5xl sm:text-3.5xl md:text-4xl font-extrabold text-darkBlue leading-tight">
                Secure Business Funding of up to <br class="hidden md:inline">
                <span class="text-primary font-black">₹50 Lakhs!</span>
              </h2>
              <p class="text-slate-500 font-bold text-xs sm:text-sm">
                Grow your enterprise confidently, free from capital constraints.
              </p>
            </div>

            <!-- Quick Phone Form -->
            <form action="<?php echo PATH_PREFIX; ?>pages/apply.php" method="GET" class="space-y-3 max-w-md">
              <input type="hidden" name="type" value="business" />
              <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-grow flex items-center bg-white border border-slate-250 rounded-xl overflow-hidden focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/20 transition-all shadow-inner">
                  <div class="flex items-center gap-1 px-4 border-r border-slate-200 bg-slate-50 text-slate-555 font-bold text-sm">
                    <span class="text-xs">🇮🇳</span> <span>+91</span>
                  </div>
                  <input type="tel" name="qty" required maxlength="10" placeholder="Enter phone number" 
                    class="w-full bg-transparent px-4 py-3.5 text-sm text-slate-800 focus:outline-none border-none" />
                </div>
                <button type="submit" class="bg-accentYellow hover:bg-[#ebd000] text-darkBlue font-extrabold px-8 py-3.5 rounded-xl text-sm transition-all shadow-md active:scale-95 shrink-0">
                  Submit
                </button>
              </div>
              <label class="flex items-start gap-2.5 text-[10px] text-slate-500 font-semibold cursor-pointer">
                <input type="checkbox" required checked class="mt-0.5 rounded border-slate-350 text-primary focus:ring-primary" />
                <span>By entering your number, you're agreeing to AavivaCred's <a href="#" class="text-primary hover:underline">Terms & Conditions</a> and <a href="#" class="text-primary hover:underline">Privacy Policy</a>.</span>
              </label>
            </form>

            <!-- Badges Grid row -->
            <div class="flex flex-wrap items-center gap-3.5 pt-2">
              <span class="flex items-center gap-1.5 text-xs font-bold text-slate-700 bg-white border border-slate-200 px-3.5 py-2 rounded-xl shadow-sm">
                <i data-lucide="handshake" class="w-4 h-4 text-primary"></i> 100% Reliable
              </span>
              <span class="flex items-center gap-1.5 text-xs font-bold text-slate-700 bg-white border border-slate-200 px-3.5 py-2 rounded-xl shadow-sm">
                <i data-lucide="lock" class="w-4 h-4 text-primary"></i> 100% Secure
              </span>
              <span class="flex items-center gap-1.5 text-xs font-bold text-slate-700 bg-white border border-slate-200 px-3.5 py-2 rounded-xl shadow-sm">
                <i data-lucide="zap" class="w-4 h-4 text-primary"></i> Quick Process
              </span>
            </div>
          </div>
          
          <!-- Right Column: Visual Graphic -->
          <div class="lg:col-span-5 flex justify-center relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-primary/10 via-transparent to-accentYellow/10 rounded-full blur-3xl pointer-events-none scale-125 z-0"></div>
            
            <div class="absolute w-64 h-64 rounded-full bg-gradient-to-tr from-primary/10 to-sky-300/10 border border-white/30 shadow-inner z-0 animate-pulse-slow"></div>

            <div class="absolute right-10 top-6 w-3 h-3 bg-accentYellow rounded-full animate-ping opacity-60 z-20 pointer-events-none"></div>
            <div class="absolute left-10 bottom-6 w-2 h-2 bg-primary rounded-full animate-pulse z-20 pointer-events-none"></div>

            <!-- Integrated Graphic with Floating Fintech Badges -->
            <div class="relative w-full max-w-[270px] sm:max-w-[290px] my-3 z-10">
              <!-- Top-Right Floating Badge Pill -->
              <div class="absolute -top-3 -right-2 bg-white/95 backdrop-blur-md border border-slate-200/80 px-3.5 py-2 rounded-2xl shadow-xl flex items-center gap-2 z-30 animate-bounce-slow">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span class="text-[11px] font-black text-darkBlue">SME Capital Limit</span>
              </div>

              <!-- Main Blended Image Container (No rigid photo frame) -->
              <div class="relative w-full rounded-[2rem] overflow-hidden shadow-2xl bg-white/40 border border-white/60 group transition-transform duration-300 hover:scale-[1.02]">
                <img src="<?php echo PATH_PREFIX; ?>assets/images/business_loan_banner.png" alt="AavivaCred Business Loan" 
                  class="w-full h-auto object-cover mix-blend-multiply relative z-10 transition-transform duration-500 group-hover:scale-105" />
              </div>

              <!-- Bottom-Left Floating Notification Card -->
              <div class="absolute -bottom-4 -left-3 bg-darkBlue text-white border border-white/10 px-3.5 py-2.5 rounded-2xl shadow-2xl flex items-center gap-2.5 z-30">
                <span class="w-7 h-7 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-xs shrink-0">
                  <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400"></i>
                </span>
                <div class="text-left">
                  <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider leading-none">Fast Approval</p>
                  <p class="text-xs font-black text-white leading-tight mt-0.5">Collateral-Free Limits</p>
                </div>
              </div>
            </div>
            
            <div class="absolute right-[-10px] top-[15%] text-sky-400 animate-pulse z-20 pointer-events-none"><i data-lucide="sparkles" class="w-5 h-5"></i></div>
            <div class="absolute left-[-10px] bottom-[15%] text-primary animate-pulse z-20 pointer-events-none"><i data-lucide="sparkle" class="w-4 h-4"></i></div>
          </div>

        </div>
      </div>

      <!-- Dark Blue Stats & Disclaimer Banner -->
      <div class="bg-[#031d40] text-white p-5 md:py-5 md:px-8 relative border-t border-slate-100/5 z-20">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 items-center text-center pb-3.5 border-b border-white/10">
          <div>
            <h3 class="text-2xl md:text-3.5xl font-extrabold text-white">10L+</h3>
            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-1">Monthly Sourcing Queries</p>
          </div>
          <div class="border-l border-white/10">
            <h3 class="text-2xl md:text-3.5xl font-extrabold text-white flex items-center justify-center gap-1">4.8 <i data-lucide="star" class="w-4 h-4 fill-accentYellow text-accentYellow shrink-0"></i></h3>
            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-1">Customer Trust Score</p>
          </div>
          <div class="md:border-l border-white/10">
            <h3 class="text-2xl md:text-3.5xl font-extrabold text-white">35+</h3>
            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-1">Active NBFC & Bank Partners</p>
          </div>
          <div class="border-l border-white/10">
            <h3 class="text-2xl md:text-3.5xl font-extrabold text-white">₹500Cr+</h3>
            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-1">Loan Sourced Volume</p>
          </div>
        </div>
        
        <!-- Disclaimer Text (verbatim) -->
        <p class="text-[10px] text-slate-350 font-semibold italic text-left mt-3.5 leading-relaxed max-w-5xl mx-auto">
          <strong>Important Disclaimer:</strong> Loan approval, sanctioned amount, interest rate, repayment tenure, processing time, and disbursement depend on the applicant's eligibility, business performance, financial documents, repayment capacity, credit assessment, and the respective lending partner's internal policies.
        </p>
      </div>
    </div>

    <!-- Business Loan Introduction Section (Editorial Layout) -->
    <div class="mb-14 text-center max-w-5xl mx-auto reveal-on-scroll">
      <!-- Badge Category Header -->
      <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-primary/5 border border-primary/10 px-3.5 py-1.5 rounded-full shadow-sm">Overview</span>
      
      <h2 class="font-display text-2xl sm:text-3.5xl font-extrabold text-darkBlue leading-tight mt-4">
        Tailored Financial Support for Scaling Your Enterprise
      </h2>
      <div class="w-16 h-1 bg-primary mx-auto mt-4 mb-8"></div>
      
      <!-- Lead Paragraph (Centered & Prominent) -->
      <p class="text-slate-700 text-base sm:text-lg font-medium max-w-3xl mx-auto leading-relaxed mb-8">
        A Business Loan is a strategic financial solution designed to help eligible businesses access funds for operational requirements, expansion plans, equipment purchases, technology upgrades, and genuine commercial needs.
      </p>

      <!-- Two-Column Body Paragraphs (Left-Aligned on Desktop for High Readability) -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 text-left text-slate-600 text-sm sm:text-[15px] leading-relaxed font-normal">
        <div class="space-y-4">
          <p>
            Unlike personal financing, Business Loans are evaluated primarily on the financial strength and stability of the business. Lending partners generally review factors such as business vintage, turnover, profitability, banking behaviour, repayment capacity, credit profile, and supporting financial documents before making a lending decision.
          </p>
          <p>
            Depending on the lender and the chosen product, Business Loans may be available as secured or unsecured financing.
          </p>
          <p>
            Building a successful business requires vision, dedication, and consistent effort. However, even profitable businesses sometimes experience situations where additional funding becomes necessary.
          </p>
          <p>
            A Business Loan can provide eligible businesses with access to funding that supports expansion while allowing repayments to be spread over manageable instalments.
          </p>
        </div>
        <div class="space-y-4">
          <p>
            Growth-driven businesses frequently require capital injections to capitalize on new opportunities. Whether a retail outlet is stocking up for peak holiday sales, a manufacturing plant is scaling up production to fulfill bulk purchase orders, or an expanding startup is bringing on top-tier talent, timely access to funds is critical.
          </p>
          <p>
            Imagine receiving a bulk purchase order from a new client but needing immediate capital to procure raw materials. Or perhaps you're planning to open a second outlet because customer demand has outgrown your current location. Delaying these decisions due to limited working capital could mean missing valuable growth opportunities.
          </p>
          <p>
            Market opportunities are fleeting, and businesses that act decisively with ready capital are much better equipped to outperform competitors, capture market share, and ensure long-term sustainability.
          </p>
        </div>
      </div>

      <!-- Full-Width Bottom Paragraph & Quotes -->
      <div class="mt-6 text-left text-slate-600 text-sm sm:text-[15px] leading-relaxed">
        <p class="mb-5">
          At AavivaCred, we recognize that every enterprise has its own path. We specialize in connecting eligible MSMEs, startups, retail merchants, manufacturers, and independent professionals with suitable business loan options from top-rated lending institutions.
        </p>
        <p class="mb-5">
          We aim to simplify business finance by making it accessible, clear, and transparent. Rather than wasting time coordinating with multiple banks on your own, you can initiate your application through our unified portal, guided by specialists who handle the complexities of the process.
        </p>
        <p class="mb-8">
          Whether you need to ease operational cash flow, invest in high-efficiency machinery, expand physical locations, upgrade technology infrastructure, or manage seasonal supply cycles, we help you explore financing options that support stable, healthy business growth.
        </p>
        
        <!-- Strategic Quote Block with Left Border and soft primary gradient -->
        <div class="bg-gradient-to-r from-primary/5 to-transparent border-l-4 border-primary p-6 rounded-r-2xl shadow-sm space-y-3.5">
          <p class="text-xs sm:text-sm text-slate-700 font-bold italic leading-relaxed">
            "Rather than viewing a Business Loan as additional debt, many successful businesses consider it a strategic financial tool that enables growth while preserving working capital for day-to-day operations."
          </p>
          <p class="text-xs sm:text-sm text-slate-700 font-bold italic leading-relaxed">
            "When used responsibly, business financing can become a strategic investment rather than simply a source of borrowed money."
          </p>
        </div>
      </div>
    </div>

    <!-- Why Businesses Prefer AavivaCred (Relocated into a grid of small cards) -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 text-left reveal-on-scroll">
      <div class="mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Key Benefits</span>
        <h3 class="font-display font-extrabold text-xl sm:text-2xl text-darkBlue">Why Businesses Prefer AavivaCred</h3>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">Our values and features that support your business journey:</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="smartphone" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Digital Loan Application</span>
        </div>

        <!-- Card 2 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="eye" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Transparent Loan Guidance</span>
        </div>

        <!-- Card 3 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="handshake" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Trusted Lending Partners</span>
        </div>

        <!-- Card 4 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="user-check" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Dedicated Business Loan Specialists</span>
        </div>

        <!-- Card 5 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="file-check" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Secure Document Processing</span>
        </div>

        <!-- Card 6 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="calendar" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Flexible Repayment Options*</span>
        </div>

        <!-- Card 7 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="heart-handshake" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Support Throughout the Journey</span>
        </div>
      </div>
    </div>


    <!-- Section 1B: The AavivaCred Advantage -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 reveal-on-scroll text-left">
      <div class="max-w-3xl mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Why Choose Us</span>
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Why Businesses Choose AavivaCred</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          Choosing a Business Loan isn't just about comparing interest rates. It's about working with a financial platform that values transparency, professionalism, and long-term customer relationships. At AavivaCred, we believe every business owner deserves accurate information before making an important financial decision.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Box 1 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="help-circle" class="w-4 h-4"></i></span>
            We Listen Before We Recommend
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            No two businesses are alike. A neighbourhood retail shop, an IT consultancy, a manufacturing unit, and a healthcare clinic all have different financial priorities. Instead of following a one-size-fits-all approach, we help businesses explore financing options based on their operational requirements, growth objectives, and lender eligibility criteria.
          </p>
        </div>

        <!-- Box 2 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="smartphone" class="w-4 h-4"></i></span>
            A Digital Experience
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Running a business already demands your attention every day. That's why we've designed an online application process that reduces unnecessary paperwork and allows you to begin your financing journey without repeated office visits. From document submission to application updates, every stage is designed to save time while maintaining transparency.
          </p>
        </div>

        <!-- Box 3 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="message-square" class="w-4 h-4"></i></span>
            Clear Communication
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Financial decisions should never be confusing. Our team explains eligibility requirements, documentation expectations, loan repayment structure, applicable charges, business assessment process, and lender policies. This helps business owners make informed decisions with greater confidence.
          </p>
        </div>

        <!-- Box 4 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="users" class="w-4 h-4"></i></span>
            Trusted Partners
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            We work with trusted lending institutions that offer Business Loan solutions for different industries and business sizes. Every application is independently assessed by the respective lender based on business performance, financial strength, repayment capacity, banking history, and documentation.
          </p>
        </div>

        <!-- Box 5 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="user-check" class="w-4 h-4"></i></span>
            Dedicated Finance Specialists
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Applying for business finance often involves more documentation than personal borrowing. Our experienced support team remains available to answer questions, assist with documentation, and provide updates throughout the application process.
          </p>
        </div>

        <!-- Box 6 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="shield-check" class="w-4 h-4"></i></span>
            Secure Business Information
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Your financial records are valuable. Business documents submitted through AavivaCred are handled using secure processes and shared only with the relevant lending partner as required for evaluating your application.
          </p>
        </div>

      </div>
    </div>



    <!-- Section 2B: When Loan Can Create Value -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-16 shadow-sm text-left reveal-on-scroll">
      <div class="max-w-3xl mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-primary/5 border border-primary/10 px-3 py-1 rounded-full">Value Creation</span>
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">When a Business Loan Can Create Real Value</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          A Business Loan is most effective when it helps create measurable business growth:
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Value point 1 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="wallet" class="w-3.5 h-3.5"></i></span>
            Managing Working Capital
          </h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Every business experiences fluctuations in cash flow. Customer payments may be delayed while supplier payments, salaries, rent, and operational expenses continue. Additional working capital can help maintain smooth business operations without interrupting productivity.
          </p>
        </div>

        <!-- Value point 2 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="expand" class="w-3.5 h-3.5"></i></span>
            Expanding Business Operations
          </h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Growth often requires investment before revenue increases. Opening another branch, expanding warehouse capacity, increasing manufacturing output, or entering a new city requires financial planning. Business financing can help eligible enterprises execute these expansion plans with confidence.
          </p>
        </div>

        <!-- Value point 3 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="cog" class="w-3.5 h-3.5"></i></span>
            Purchasing Machinery & Equipment
          </h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Modern equipment improves efficiency, reduces operational costs, and increases production capacity. Instead of postponing important upgrades, financing allows businesses to invest today while repaying gradually through structured instalments.
          </p>
        </div>

        <!-- Value point 4 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="package" class="w-3.5 h-3.5"></i></span>
            Building Stronger Inventory
          </h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Retailers, wholesalers, distributors, and manufacturers frequently need additional inventory before festive seasons or periods of increased demand. Maintaining adequate stock levels can improve customer satisfaction while reducing missed sales opportunities.
          </p>
        </div>

        <!-- Value point 5 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="cpu" class="w-3.5 h-3.5"></i></span>
            Investing in Technology
          </h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Today's businesses rely heavily on technology. Whether upgrading software, implementing automation, improving cybersecurity, or purchasing commercial equipment, technology investments often contribute directly to productivity and long-term growth.
          </p>
        </div>

        <!-- Value point 6 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="user-plus" class="w-3.5 h-3.5"></i></span>
            Hiring Skilled Professionals
          </h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Growth isn't possible without the right people. Business funding can support recruitment, employee training, and workforce expansion during important growth phases.
          </p>
        </div>

      </div>
    </div>

    <!-- Section 3A: Features Table -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue mb-6 flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="file-spreadsheet" class="w-4.5 h-4.5"></i></span>
        Business Loan Features at a Glance
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
            <tr><td class="p-4 font-bold text-darkBlue">Loan Purpose</td><td class="p-4 text-xs sm:text-sm">Working Capital, Expansion, Equipment, Inventory, Business Growth</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Applicant Type</td><td class="p-4 text-xs sm:text-sm">MSMEs, Startups, Proprietorships, Partnerships, LLPs, Private Limited Companies & Self-employed Professionals</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Loan Amount</td><td class="p-4 text-xs sm:text-sm">Based on eligibility and lender assessment</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Interest Rate</td><td class="p-4 text-xs sm:text-sm">Determined by the lending partner</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Repayment</td><td class="p-4 text-xs sm:text-sm">Convenient EMI options</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Loan Tenure</td><td class="p-4 text-xs sm:text-sm">Flexible repayment tenure available</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Collateral</td><td class="p-4 text-xs sm:text-sm">Depends on the selected loan product and lender policy</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Processing</td><td class="p-4 text-xs sm:text-sm">Online application with document verification</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Prepayment</td><td class="p-4 text-xs sm:text-sm">Available as per lender guidelines</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Section 3B: Why Consider Finance -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-16 shadow-sm text-left reveal-on-scroll">
      <div class="space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Why Business Owners Consider Business Finance</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          Responsible business finance can do more than solve short-term cash flow challenges—it can support long-term business development.
        </p>
        <div class="border-t border-slate-100 pt-5">
          <p class="text-xs font-bold text-slate-800 mb-4 uppercase tracking-wider">A Business Loan may help you:</p>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs sm:text-sm font-semibold text-slate-700">
            <ul class="space-y-3">
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Improve operational cash flow</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Purchase inventory at the right time</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Upgrade machinery and equipment</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Expand into new markets</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Strengthen production capacity</span></li>
            </ul>
            <ul class="space-y-3">
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Invest in marketing and branding</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Modernise business technology</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Create new employment opportunities</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Improve customer service standards</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Build sustainable business growth</span></li>
            </ul>
          </div>
        </div>
      </div>
      <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
        *Business finance should always align with your repayment capacity and long-term business objectives.
      </p>
    </div>

    <!-- Section 4A: Eligibility Requirements -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <div class="space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="shield-check" class="w-4.5 h-4.5"></i></span>
          Business Loan Eligibility
        </h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          Every business has its own growth journey, and every lending partner has its own evaluation process. Instead of relying on a single factor, lenders generally review your business's overall financial health to determine whether the requested financing is suitable.
        </p>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          A strong application is usually supported by consistent business operations, organised financial records, healthy banking behaviour, and the ability to repay the loan comfortably.
        </p>
        
        <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50 pt-2 mt-6">
          <h3 class="font-display font-extrabold text-xs text-slate-800 px-4 pb-2 border-b border-slate-100 uppercase tracking-wider">Eligibility Overview</h3>
          <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
            <thead>
              <tr class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100 text-[10px] sm:text-xs">
                <th class="p-4 w-1/3 sm:w-1/4">Criteria</th>
                <th class="p-4">General Requirement</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
              <tr><td class="p-4 font-bold text-darkBlue">Applicant Type</td><td class="p-4">Proprietorship, Partnership, LLP, Private Limited Company, MSME or Self-employed Professional</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Business Vintage</td><td class="p-4">As per lender eligibility criteria</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Business Operations</td><td class="p-4">Active and operational</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Annual Turnover</td><td class="p-4">Based on lender assessment</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Credit Profile</td><td class="p-4">Healthy repayment history preferred</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Financial Records</td><td class="p-4">Updated business and banking documents</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Bank Account</td><td class="p-4">Active business current/savings account</td></tr>
            </tbody>
          </table>
        </div>
      </div>
      <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
        <strong>Please Note:</strong> Meeting the above criteria does not guarantee loan approval. The final decision is made by the respective lending partner after reviewing the complete application and supporting documents.
      </p>
    </div>

    <!-- Section 4B: Documents & Checklist -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-16 shadow-sm text-left space-y-8 reveal-on-scroll">
      <div class="space-y-2">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="file-text" class="w-4.5 h-4.5"></i></span>
          Documents That Help Complete Your Application
        </h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          Preparing your documents in advance can make the verification process smoother. Depending on your business structure and the lender's requirements, additional documents may also be requested.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 border-b border-slate-100 pb-8">
        
        <!-- Identity Proof -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="user" class="w-3.5 h-3.5"></i></span>
            Identity & Address
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> PAN Card</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Aadhaar Card</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Passport</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Driving Licence</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Voter ID</li>
          </ul>
        </div>

        <!-- Business Registration -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="file-text" class="w-3.5 h-3.5"></i></span>
            Registration
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> GST Certificate</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Udyam Registration</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Shop & Establishment</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Trade Licence</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Partnership Deed</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> LLP Incorporation</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Company Certificate</li>
          </ul>
        </div>

        <!-- Financial Documents -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="bar-chart-2" class="w-3.5 h-3.5"></i></span>
            Financial Records
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Bank Statements</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Income Tax Returns</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> GST Returns</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Profit & Loss</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Balance Sheet</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Cash Flow Statement</li>
          </ul>
        </div>

      </div>

      <!-- Document Checklist Table (verbatim) -->
      <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50 pt-2">
        <h3 class="font-display font-extrabold text-xs text-slate-800 px-4 pb-2 border-b border-slate-100 uppercase tracking-wider">Document Checklist</h3>
        <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
          <thead>
            <tr class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100 text-[10px] sm:text-xs">
              <th class="p-4 w-1/3 sm:w-1/4">Document Category</th>
              <th class="p-4">Examples</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
            <tr><td class="p-4 font-bold text-darkBlue">Identity Proof</td><td class="p-4">PAN, Aadhaar</td></tr>
            <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Address Proof</td><td class="p-4">Aadhaar, Utility Bill</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Business Proof</td><td class="p-4">GST, Udyam, Trade Licence</td></tr>
            <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Financial Records</td><td class="p-4">Bank Statements, ITR, Balance Sheet</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Additional Documents</td><td class="p-4">As requested during verification</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Section 5: Step-by-Step Business Loan Journey -->
    <div class="bg-gradient-to-r from-[#031d40] to-darkBlue text-white rounded-[2.5rem] p-8 md:p-12 mb-16 relative overflow-hidden shadow-2xl reveal-on-scroll">
      <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-primary/10 rounded-full blur-3xl"></div>
      <div class="absolute right-0 top-0 w-64 h-64 bg-accentYellow/5 rounded-full blur-2xl"></div>

      <div class="text-center max-w-2xl mx-auto mb-10 space-y-2 relative z-10">
        <span class="text-[10px] font-extrabold text-accentYellow uppercase tracking-widest bg-white/5 border border-white/10 px-3.5 py-1 rounded-full">Simple Roadmap</span>
        <h2 class="font-display text-2.5xl md:text-3.5xl font-extrabold text-white">Your Business Loan Journey with AavivaCred</h2>
        <p class="text-xs text-slate-300 font-semibold">Applying for a Business Loan shouldn't interrupt your daily operations. We've designed a simple process that keeps you informed at every stage.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-5 gap-6 relative z-10 text-left">
        
        <!-- Step 1 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">01</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">1</span>
          <h4 class="font-display font-extrabold text-sm text-white mb-2">Requirement</h4>
          <p class="text-[11px] text-slate-300 font-semibold leading-relaxed">Tell us about your business, the purpose of the loan, and your estimated funding requirement.</p>
        </div>

        <!-- Step 2 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">02</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">2</span>
          <h4 class="font-display font-extrabold text-sm text-white mb-2">Documents</h4>
          <p class="text-[11px] text-slate-300 font-semibold leading-relaxed">Upload the required KYC, business registration, and financial documents through our secure online process.</p>
        </div>

        <!-- Step 3 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">03</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">3</span>
          <h4 class="font-display font-extrabold text-sm text-white mb-2">Evaluation</h4>
          <p class="text-[11px] text-slate-300 font-semibold leading-relaxed">The lending partner reviews your application based on performance, repayment capacity, banking history, and credit assessment.</p>
        </div>

        <!-- Step 4 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">04</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">4</span>
          <h4 class="font-display font-extrabold text-sm text-white mb-2">Receive Offer</h4>
          <p class="text-[11px] text-slate-300 font-semibold leading-relaxed">If application satisfies lender's criteria, you'll receive an offer detailing amount, tenure, rates, and terms.</p>
        </div>

        <!-- Step 5 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">05</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">5</span>
          <h4 class="font-display font-extrabold text-sm text-white mb-2">Disbursement</h4>
          <p class="text-[11px] text-slate-300 font-semibold leading-relaxed">After completing the formalities and accepting terms, the sanctioned amount is disbursed according to lender's process.</p>
        </div>

      </div>
    </div>

    <!-- Section 6: Industries We Finance -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-6 sm:p-8 shadow-sm text-left mb-16 reveal-on-scroll">
      <div class="max-w-2xl mb-8 space-y-2">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Industries We Help Finance</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">Businesses across different sectors have unique financial needs. AavivaCred helps eligible enterprises explore funding options suited to their industry.</p>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        
        <!-- Ind 1 -->
        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-2 hover:border-primary/20 transition-all">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="shopping-cart" class="w-4 h-4"></i></span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Retail & Wholesale</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">Support for inventory purchases, supplier payments, seasonal stock planning, and store expansion.</p>
        </div>

        <!-- Ind 2 -->
        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-2 hover:border-primary/20 transition-all">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="factory" class="w-4 h-4"></i></span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Manufacturing</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">Funding for machinery upgrades, production expansion, raw material procurement, and factory modernisation.</p>
        </div>

        <!-- Ind 3 -->
        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-2 hover:border-primary/20 transition-all">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="activity" class="w-4 h-4"></i></span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Healthcare</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">Business finance solutions for hospitals, clinics, pharmacies, diagnostic centres, and healthcare professionals.</p>
        </div>

        <!-- Ind 4 -->
        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-2 hover:border-primary/20 transition-all">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="coffee" class="w-4 h-4"></i></span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Hospitality</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">Funding support for restaurants, cafés, hotels, cloud kitchens, and food service businesses.</p>
        </div>

        <!-- Ind 5 -->
        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-2 hover:border-primary/20 transition-all">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="hammer" class="w-4 h-4"></i></span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Construction</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">Financial assistance for contractors, builders, engineering firms, and infrastructure-related businesses.</p>
        </div>

        <!-- Ind 6 -->
        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-2 hover:border-primary/20 transition-all">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="truck" class="w-4 h-4"></i></span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Logistics & Transport</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">Support for fleet expansion, vehicle upgrades, maintenance expenses, and operational cash flow.</p>
        </div>

        <!-- Ind 7 -->
        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-2 hover:border-primary/20 transition-all">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="briefcase" class="w-4 h-4"></i></span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Professional Services</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">Suitable for consultants, chartered accountants, legal professionals, marketing agencies, IT firms, and service businesses.</p>
        </div>

        <!-- Ind 8 -->
        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-2 hover:border-primary/20 transition-all">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="globe" class="w-4 h-4"></i></span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800">E-commerce & Digital</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">Funding for inventory management, technology upgrades, digital marketing, fulfilment operations, and business expansion.</p>
        </div>

      </div>
    </div>

    <!-- Section 7: Loan Solutions -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-6 sm:p-8 shadow-sm text-left mb-16 reveal-on-scroll">
      <div class="max-w-2xl mb-8 space-y-2">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Business Loan Solutions for Different Business Needs</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">Every business has different priorities, which is why financing requirements also vary.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Sol 1 -->
        <div class="p-5 bg-slate-50/50 border border-slate-150 rounded-2xl space-y-2 hover:-translate-y-0.5 transition-all">
          <span class="text-xs font-bold text-primary bg-primary/10 px-2.5 py-1 rounded-full uppercase tracking-wider">Liquidity</span>
          <h4 class="font-display font-extrabold text-sm sm:text-base text-slate-800 mt-2">Working Capital Loan</h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">Maintain smooth day-to-day business operations by managing routine operational expenses and cash flow requirements.</p>
        </div>

        <!-- Sol 2 -->
        <div class="p-5 bg-slate-50/50 border border-slate-150 rounded-2xl space-y-2 hover:-translate-y-0.5 transition-all">
          <span class="text-xs font-bold text-primary bg-primary/10 px-2.5 py-1 rounded-full uppercase tracking-wider">Development</span>
          <h4 class="font-display font-extrabold text-sm sm:text-base text-slate-800 mt-2">MSME Business Loan</h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">Support growth initiatives for eligible Micro, Small, and Medium Enterprises with financing tailored to business development.</p>
        </div>

        <!-- Sol 3 -->
        <div class="p-5 bg-slate-50/50 border border-slate-150 rounded-2xl space-y-2 hover:-translate-y-0.5 transition-all">
          <span class="text-xs font-bold text-primary bg-primary/10 px-2.5 py-1 rounded-full uppercase tracking-wider">Scale</span>
          <h4 class="font-display font-extrabold text-sm sm:text-base text-slate-800 mt-2">Business Expansion Loan</h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">Expand to new markets, open additional branches, increase production capacity, or scale existing operations.</p>
        </div>

        <!-- Sol 4 -->
        <div class="p-5 bg-slate-50/50 border border-slate-150 rounded-2xl space-y-2 hover:-translate-y-0.5 transition-all">
          <span class="text-xs font-bold text-primary bg-primary/10 px-2.5 py-1 rounded-full uppercase tracking-wider">Assets</span>
          <h4 class="font-display font-extrabold text-sm sm:text-base text-slate-800 mt-2">Machinery & Equipment Finance</h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">Invest in commercial machinery, equipment, production tools, or technology upgrades that improve productivity.</p>
        </div>

        <!-- Sol 5 -->
        <div class="p-5 bg-slate-50/50 border border-slate-150 rounded-2xl space-y-2 hover:-translate-y-0.5 transition-all">
          <span class="text-xs font-bold text-primary bg-primary/10 px-2.5 py-1 rounded-full uppercase tracking-wider">Stock</span>
          <h4 class="font-display font-extrabold text-sm sm:text-base text-slate-800 mt-2">Inventory Finance</h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">Purchase additional stock before peak business seasons and maintain uninterrupted product availability.</p>
        </div>

        <!-- Sol 6 -->
        <div class="p-5 bg-slate-50/50 border border-slate-150 rounded-2xl space-y-2 hover:-translate-y-0.5 transition-all">
          <span class="text-xs font-bold text-primary bg-primary/10 px-2.5 py-1 rounded-full uppercase tracking-wider">Collateral Free</span>
          <h4 class="font-display font-extrabold text-sm sm:text-base text-slate-800 mt-2">Unsecured Business Loan</h4>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">Eligible businesses may explore financing options that generally do not require collateral, subject to lender assessment and product eligibility.</p>
        </div>

      </div>
    </div>

    <!-- Section 8: Expert Tips & Responsible Borrowing -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16 items-start reveal-on-scroll">
      
      <!-- Tips -->
      <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-6 sm:p-8 shadow-sm text-left space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center"><i data-lucide="badge-info" class="w-4.5 h-4.5"></i></span>
          Expert Tips Before Applying for a Business Loan
        </h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          Making informed financial decisions today can strengthen your business tomorrow. Before submitting your application, consider the following:
        </p>
        
        <ul class="space-y-3 pt-2 text-xs sm:text-sm text-slate-700 font-semibold">
          <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Clearly identify why your business needs financing.</span></li>
          <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Estimate the exact amount required instead of borrowing more than necessary.</span></li>
          <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Review your monthly cash flow before selecting the repayment tenure.</span></li>
          <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Maintain updated financial records and GST filings.</span></li>
          <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Keep business and personal finances separate.</span></li>
          <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Regularly monitor your business credit profile, where applicable.</span></li>
          <li class="flex items-start gap-2.5"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> <span>Compare loan features rather than choosing based only on interest rates.</span></li>
        </ul>
        <p class="text-slate-400 text-xs font-bold italic pt-3 border-t border-slate-100 leading-normal">
          A well-prepared application reflects positively during the lender's assessment.
        </p>
      </div>

      <!-- Responsible Borrowing -->
      <div class="bg-gradient-to-br from-[#021435] to-[#010b1d] text-white rounded-[2.5rem] p-6 sm:p-8 shadow-xl text-left space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-accentYellow flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-white/10 text-accentYellow flex items-center justify-center"><i data-lucide="shield-alert" class="w-4.5 h-4.5"></i></span>
          Responsible Business Borrowing
        </h2>
        <div class="text-slate-300 text-xs sm:text-sm font-semibold leading-relaxed space-y-3.5">
          <p>
            Business finance should contribute to sustainable growth—not unnecessary financial pressure.
          </p>
          <p>
            Borrow only when the financing supports measurable business objectives such as expansion, productivity improvements, inventory management, or operational efficiency.
          </p>
          
          <div class="border-t border-white/10 pt-3">
            <p class="text-xs font-bold text-accentYellow mb-2 uppercase tracking-wider">Before accepting any loan offer:</p>
            <ul class="space-y-2 text-xs text-slate-300 font-bold pl-2">
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0"></span> <span>Understand the total borrowing cost.</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0"></span> <span>Review repayment obligations carefully.</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0"></span> <span>Read all applicable terms and conditions.</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0"></span> <span>Plan repayments according to projected business cash flow.</span></li>
              <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0"></span> <span>Discuss financing decisions with your accountant or financial advisor if required.</span></li>
            </ul>
          </div>
        </div>
        <p class="text-slate-400 text-xs font-bold italic border-t border-white/5 pt-4 mt-6 leading-normal">
          Responsible borrowing helps businesses maintain financial stability while building long-term credibility.
        </p>
      </div>

    </div>

    <!-- Section 9: Frequently Asked Questions Two-Column Layout -->
    <div class="bg-gradient-to-br from-[#f8faff] via-white to-[#edf4fc] border border-slate-200/80 shadow-xl rounded-[2.5rem] p-8 md:p-12 mb-16 relative overflow-hidden reveal-on-scroll">
      <div class="absolute left-[-10%] top-[-10%] w-72 h-72 bg-primary/10 rounded-full blur-3xl pointer-events-none"></div>
      <div class="absolute right-[-10%] bottom-[-10%] w-72 h-72 bg-accentYellow/5 rounded-full blur-3xl pointer-events-none"></div>
      
      <div class="text-center max-w-2xl mx-auto mb-10 space-y-2 relative z-10">
        <span class="text-[10px] font-extrabold text-primary uppercase tracking-widest bg-white border border-slate-200 px-3.5 py-1 rounded-full shadow-sm">Got Questions?</span>
        <h3 class="font-display text-2xl md:text-3.5xl font-extrabold text-darkBlue">Frequently Asked Questions</h3>
        <p class="text-xs text-slate-500 font-semibold">Common enquiries regarding our Business Loan solutions.</p>
      </div>

      <!-- Two-Column Accordions Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 max-w-6xl mx-auto relative z-10">
        
        <!-- Left Column (Q1 - Q5) -->
        <div class="space-y-4">
          
          <!-- Q1 -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 group">
            <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(1)">
              <span>1. What is a Business Loan?</span>
              <span id="faq-icon-1" class="w-6 h-6 rounded-full bg-slate-50 text-slate-500 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
            </button>
            <div id="faq-answer-1" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
              A Business Loan is a financing solution that helps eligible businesses manage operational expenses, expansion projects, equipment purchases, inventory, or working capital requirements.
            </div>
          </div>

          <!-- Q2 -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 group">
            <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(2)">
              <span>2. Who can apply for a Business Loan?</span>
              <span id="faq-icon-2" class="w-6 h-6 rounded-full bg-slate-50 text-slate-500 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
            </button>
            <div id="faq-answer-2" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
              Eligible proprietorships, partnerships, LLPs, private limited companies, MSMEs, startups (where applicable), and self-employed professionals may apply, subject to lender policies.
            </div>
          </div>

          <!-- Q3 -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 group">
            <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(3)">
              <span>3. Can I apply online?</span>
              <span id="faq-icon-3" class="w-6 h-6 rounded-full bg-slate-50 text-slate-500 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
            </button>
            <div id="faq-answer-3" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
              Yes. AavivaCred provides a digital application process that allows eligible businesses to submit their applications online.
            </div>
          </div>

          <!-- Q4 -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 group">
            <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(4)">
              <span>4. Is collateral mandatory?</span>
              <span id="faq-icon-4" class="w-6 h-6 rounded-full bg-slate-50 text-slate-500 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
            </button>
            <div id="faq-answer-4" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
              Not always. Some Business Loan products may be available without collateral, while others may require security depending on the loan amount, product type, and lender's assessment.
            </div>
          </div>

          <!-- Q5 -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 group">
            <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(5)">
              <span>5. How is my loan amount decided?</span>
              <span id="faq-icon-5" class="w-6 h-6 rounded-full bg-slate-50 text-slate-500 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
            </button>
            <div id="faq-answer-5" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
              The sanctioned amount depends on your business turnover, profitability, banking history, repayment capacity, documentation, and the lending partner's internal evaluation.
            </div>
          </div>

        </div>

        <!-- Right Column (Q6 - Q10) -->
        <div class="space-y-4">
          
          <!-- Q6 -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 group">
            <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(6)">
              <span>6. How long does the process usually take?</span>
              <span id="faq-icon-6" class="w-6 h-6 rounded-full bg-slate-50 text-slate-500 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
            </button>
            <div id="faq-answer-6" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
              The processing timeline depends on document verification, business assessment, and the lending partner's procedures.
            </div>
          </div>

          <!-- Q7 -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 group">
            <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(7)">
              <span>7. Can startups apply for Business Loans?</span>
              <span id="faq-icon-7" class="w-6 h-6 rounded-full bg-slate-50 text-slate-500 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
            </button>
            <div id="faq-answer-7" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
              Some lending partners offer financing for eligible startups. Approval depends on the startup's profile and the lender's assessment criteria.
            </div>
          </div>

          <!-- Q8 -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 group">
            <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(8)">
              <span>8. Can I repay the loan early?</span>
              <span id="faq-icon-8" class="w-6 h-6 rounded-full bg-slate-50 text-slate-500 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
            </button>
            <div id="faq-answer-8" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
              Many lenders allow prepayment or foreclosure. Applicable conditions and charges differ between lenders.
            </div>
          </div>

          <!-- Q9 -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 group">
            <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(9)">
              <span>9. Does AavivaCred approve the loan?</span>
              <span id="faq-icon-9" class="w-6 h-6 rounded-full bg-slate-50 text-slate-500 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
            </button>
            <div id="faq-answer-9" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
              No. AavivaCred facilitates the application process and connects eligible applicants with trusted lending partners. Final approval rests with the lending partner.
            </div>
          </div>

          <!-- Q10 -->
          <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 group">
            <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(10)">
              <span>10. Does applying guarantee loan approval?</span>
              <span id="faq-icon-10" class="w-6 h-6 rounded-full bg-slate-50 text-slate-500 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
            </button>
            <div id="faq-answer-10" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
              No. Loan approval depends on business eligibility, financial performance, documentation, repayment capacity, credit assessment, and lender policies.
            </div>
          </div>

        </div>

      </div>
    </div>

    <!-- FAQ Accordion JS Script -->
    <script>
      function toggleFaq(index) {
        const answer = document.getElementById('faq-answer-' + index);
        const icon = document.getElementById('faq-icon-' + index);
        const container = answer.parentElement;
        
        if (answer.classList.contains('hidden')) {
          answer.classList.remove('hidden');
          icon.style.transform = 'rotate(180deg)';
          container.classList.add('border-primary/30', 'bg-white', 'shadow-md');
        } else {
          answer.classList.add('hidden');
          icon.style.transform = 'rotate(0deg)';
          container.classList.remove('border-primary/30', 'bg-white', 'shadow-md');
        }
      }
    </script>

    <!-- Sub-Products Section (Business related loan options) -->
    <div class="space-y-6 reveal-on-scroll">
      <h2 class="font-display font-extrabold text-xl md:text-2xl text-darkBlue text-left">
        Related Loan Products
      </h2>
      
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <a href="<?php echo PATH_PREFIX; ?>edi-loan" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-5 hover:border-primary/20 hover:-translate-y-1 hover:shadow-md transition-all flex items-center gap-3">
          <span class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary shrink-0">
            <i data-lucide="briefcase" class="w-5 h-5"></i>
          </span>
          <div class="text-left">
            <h4 class="font-display font-bold text-xs text-slate-800 leading-tight">EDI Merchant Loan</h4>
            <p class="text-[10px] text-slate-450 font-semibold mt-0.5">Check Offers</p>
          </div>
        </a>
        
        <a href="<?php echo PATH_PREFIX; ?>gold-loan" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-5 hover:border-primary/20 hover:-translate-y-1 hover:shadow-md transition-all flex items-center gap-3">
          <span class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary shrink-0">
            <i data-lucide="coins" class="w-5 h-5"></i>
          </span>
          <div class="text-left">
            <h4 class="font-display font-bold text-xs text-slate-800 leading-tight">Gold Loan</h4>
            <p class="text-[10px] text-slate-450 font-semibold mt-0.5">Check Offers</p>
          </div>
        </a>

        <a href="<?php echo PATH_PREFIX; ?>personal-loan" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-5 hover:border-primary/20 hover:-translate-y-1 hover:shadow-md transition-all flex items-center gap-3">
          <span class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary shrink-0">
            <i data-lucide="user" class="w-5 h-5"></i>
          </span>
          <div class="text-left">
            <h4 class="font-display font-bold text-xs text-slate-800 leading-tight">Personal Loan</h4>
            <p class="text-[10px] text-slate-450 font-semibold mt-0.5">Check Offers</p>
          </div>
        </a>

        <a href="<?php echo PATH_PREFIX; ?>instant-loan" class="bg-white border border-slate-200 shadow-sm rounded-2xl p-5 hover:border-primary/20 hover:-translate-y-1 hover:shadow-md transition-all flex items-center gap-3">
          <span class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center text-primary shrink-0">
            <i data-lucide="zap" class="w-5 h-5"></i>
          </span>
          <div class="text-left">
            <h4 class="font-display font-bold text-xs text-slate-800 leading-tight">Instant Loan</h4>
            <p class="text-[10px] text-slate-450 font-semibold mt-0.5">Check Offers</p>
          </div>
        </a>
      </div>
    </div>

  </div>
</div>
