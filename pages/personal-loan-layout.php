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
              <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-white/80 border border-slate-200 px-3 py-1 rounded-full shadow-sm">Instant Approval</span>
              <h1 class="font-display text-2xl sm:text-3.5xl lg:text-4xl font-extrabold text-darkBlue leading-tight">
                Personal Loan – Financial Support That <br class="hidden md:inline">
                Fits Your Life, <span class="text-primary font-black">Not Just Your Budget</span>
              </h1>
              <p class="text-slate-500 font-semibold text-xs sm:text-sm">
                Manage Life's Important Expenses with Confidence
              </p>
            </div>

            <!-- Quick Phone Form -->
            <form action="<?php echo PATH_PREFIX; ?>pages/apply.php" method="GET" class="space-y-4 max-w-md">
              <input type="hidden" name="type" value="personal" />
              
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
                <i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i> Secure Digital Verification
              </span>
              <span class="flex items-center gap-1.5 text-xs font-bold text-slate-700 bg-white border border-slate-200 px-3.5 py-2 rounded-xl shadow-sm">
                <i data-lucide="clock" class="w-4 h-4 text-primary"></i> Fast Processing
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
                <span class="text-[11px] font-black text-darkBlue">Pre-Approved Limit</span>
              </div>

              <!-- Main Blended Image Container (No rigid photo frame) -->
              <div class="relative w-full rounded-[2rem] overflow-hidden shadow-2xl bg-white/40 border border-white/60 group transition-transform duration-300 hover:scale-[1.02]">
                <img src="<?php echo PATH_PREFIX; ?>assets/images/personal_loan_banner.png" alt="Personal Loan Sourcing" 
                  class="w-full h-auto object-cover mix-blend-multiply relative z-10 transition-transform duration-500 group-hover:scale-105" />
              </div>

              <!-- Bottom-Left Floating Notification Card -->
              <div class="absolute -bottom-4 -left-3 bg-darkBlue text-white border border-white/10 px-3.5 py-2.5 rounded-2xl shadow-2xl flex items-center gap-2.5 z-30">
                <span class="w-7 h-7 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-xs shrink-0">
                  <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400"></i>
                </span>
                <div class="text-left">
                  <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider leading-none">Instant Verification</p>
                  <p class="text-xs font-black text-white leading-tight mt-0.5">100% Paperless</p>
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
          <strong>Important:</strong> Loan approval, loan amount, interest rate, repayment tenure, and disbursement are determined by the respective lending partner after evaluating the applicant's eligibility, documentation, income, repayment capacity, credit assessment, and internal lending policies.
        </p>
      </div>
    </div>

    <!-- Personal Loan Introduction Section (Editorial Layout) -->
    <div class="mb-14 text-center max-w-5xl mx-auto reveal-on-scroll">
      <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-primary/5 border border-primary/10 px-3.5 py-1.5 rounded-full shadow-sm">Overview</span>
      
      <h2 class="font-display text-2xl sm:text-3.5xl font-extrabold text-darkBlue leading-tight mt-4">
        Financial Support That Fits Your Life, Not Just Your Budget
      </h2>
      <div class="w-16 h-1 bg-primary mx-auto mt-4 mb-8"></div>
      
      <!-- Lead Paragraph -->
      <p class="text-slate-700 text-base sm:text-lg font-medium max-w-3xl mx-auto leading-relaxed mb-8">
        Financial needs don't always arrive with advance notice. Sometimes they're planned, like funding higher education, renovating your home, or celebrating a wedding. At other times, they come unexpectedly in the form of medical emergencies, urgent repairs, or family responsibilities.
      </p>

      <!-- Two-Column Body Copy -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 text-left text-slate-600 text-sm sm:text-[15px] leading-relaxed font-normal">
        <div class="space-y-4">
          <p>
            A Personal Loan is a financing solution designed to help individuals meet genuine personal financial requirements without generally requiring collateral or security. Since these loans are usually unsecured, lending partners evaluate the applicant's financial profile before making an approval decision.
          </p>
          <p>
            Several factors may influence the lender's decision, including income, employment stability, repayment history, credit score, existing financial commitments, and the completeness of the submitted documents.
          </p>
          <p>
            The flexibility offered by a Personal Loan makes it suitable for different stages of life. Instead of withdrawing long-term savings, eligible borrowers can repay the loan through structured monthly instalments over an agreed tenure.
          </p>
        </div>
        <div class="space-y-4">
          <p>
            At AavivaCred, we help eligible borrowers explore Personal Loan options through trusted lending partners. Our focus is not just on simplifying the application process but on helping customers understand their borrowing options clearly so they can make informed financial decisions.
          </p>
          <p>
            Whether you're a salaried employee, self-employed professional, freelancer, or business owner, we aim to make your borrowing experience simple, transparent, and convenient. From submission to final assessment, our team is here to guide you.
          </p>
          <p>
            Unlike loans designed for a specific purpose, a Personal Loan generally offers greater flexibility, allowing borrowers to use the funds for genuine personal requirements, subject to lender policies and applicable terms.
          </p>
        </div>
      </div>

      <!-- Full-Width Bottom Block & Quotes -->
      <div class="mt-6 text-left text-slate-600 text-sm sm:text-[15px] leading-relaxed">
        <p class="mb-8">
          In such situations, having access to the right financial support can help you move forward without disturbing your long-term savings. Technology makes the process easier, but personal guidance makes it more meaningful.
        </p>
        
        <!-- Combined Quotes Box -->
        <div class="bg-gradient-to-r from-primary/5 to-transparent border-l-4 border-primary p-6 rounded-r-2xl shadow-sm space-y-3.5">
          <p class="text-xs sm:text-sm text-slate-700 font-bold italic leading-relaxed">
            "A Personal Loan should help you achieve your financial goals—not create unnecessary financial pressure."
          </p>
          <p class="text-xs sm:text-sm text-slate-700 font-bold italic leading-relaxed">
            "Choosing a loan is an important financial decision, and choosing the right platform is equally important. At AavivaCred, we believe that customers should receive clear guidance before making any borrowing commitment."
          </p>
        </div>
      </div>
    </div>

    <!-- Why Borrowers Choose AavivaCred (Relocated into a grid of small cards) -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 text-left reveal-on-scroll">
      <div class="mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Key Benefits</span>
        <h3 class="font-display font-extrabold text-xl sm:text-2xl text-darkBlue">Why Borrowers Choose AavivaCred</h3>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">Apply Online Today and Explore Personal Loan Options That Match Your Financial Needs.</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="smartphone" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Easy Online Loan Application</span>
        </div>

        <!-- Card 2 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="eye" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Transparent & Friendly Process</span>
        </div>

        <!-- Card 3 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="handshake" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Trusted Lending Partners</span>
        </div>

        <!-- Card 4 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="user-check" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Dedicated Loan Assistance</span>
        </div>

        <!-- Card 5 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="file-check" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Secure Digital Document Submission</span>
        </div>

        <!-- Card 6 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="calendar" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Flexible Repayment Options*</span>
        </div>

        <!-- Card 7 -->
        <div class="bg-white border border-slate-200/50 p-4 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-3.5 group hover:border-primary/20">
          <span class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform"><i data-lucide="heart-handshake" class="w-4.5 h-4.5"></i></span>
          <span class="font-display font-extrabold text-xs sm:text-sm text-slate-800">Professional Customer Support</span>
        </div>
      </div>
    </div>

    <!-- Section 1B: The AavivaCred Advantage -->
    <div class="bg-slate-50/50 border border-slate-200/60 rounded-[2.5rem] p-8 md:p-10 mb-16 reveal-on-scroll text-left">
      <div class="max-w-3xl mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-white border border-slate-200 px-3 py-1 rounded-full shadow-sm">Why Choose Us</span>
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Why Choose AavivaCred?</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          Choosing a loan is an important financial decision, and choosing the right platform is equally important. Our role is to simplify the borrowing experience by helping eligible applicants connect with trusted lending partners while ensuring transparency at every stage.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Box 1 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5 animate-on-hover">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="user" class="w-4 h-4"></i></span>
            Built Around You
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Every customer has different financial priorities. Instead of offering a one-size-fits-all approach, we help customers explore loan options based on their financial profile and borrowing requirements.
          </p>
        </div>

        <!-- Box 2 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="smartphone" class="w-4 h-4"></i></span>
            Digital Convenience
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Applying for a Personal Loan should not involve unnecessary paperwork. Our digital-first platform enables customers to begin their application online, upload documents securely, and receive professional assistance without multiple branch visits.
          </p>
        </div>

        <!-- Box 3 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="message-square" class="w-4 h-4"></i></span>
            Honest & Transparent
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Financial products should be easy to understand. Our team provides clear information regarding documentation, eligibility criteria, repayment options, and lender policies so you know what to expect.
          </p>
        </div>

        <!-- Box 4 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="users" class="w-4 h-4"></i></span>
            Lending Network
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            We work with established lending partners offering a range of Personal Loan solutions. Every application is independently assessed by the respective lender based on income, credit profile, and capacity.
          </p>
        </div>

        <!-- Box 5 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="user-check" class="w-4 h-4"></i></span>
            Dedicated Support
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Technology makes the process easier, but personal guidance makes it more meaningful. Our experienced support team assists customers with application-related queries and process updates whenever required.
          </p>
        </div>

        <!-- Box 6 -->
        <div class="bg-white border border-slate-200/50 p-6 rounded-2xl shadow-sm hover:shadow-md transition-all space-y-2.5">
          <h3 class="font-display font-black text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-7 h-7 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="shield-check" class="w-4 h-4"></i></span>
            Your Privacy Matters
          </h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            We understand the importance of protecting sensitive financial information. Customer data is processed using secure systems and shared only with the relevant lending partner for evaluating the application.
          </p>
        </div>

      </div>
    </div>

    <!-- Section 2B: When Loan Can Create Value -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <div class="max-w-3xl mb-8 space-y-2">
        <span class="text-[9px] font-extrabold tracking-widest text-primary uppercase bg-primary/5 border border-primary/10 px-3 py-1 rounded-full">Use Cases</span>
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">When a Personal Loan Can Make Sense</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          Every financial decision should have a clear purpose. A Personal Loan can be useful when it supports an important goal or helps manage an unexpected situation:
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Value point 1 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="activity" class="w-3.5 h-3.5"></i></span>
            Managing Medical Expenses
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Healthcare emergencies often require immediate financial arrangements. A Personal Loan can help manage hospital bills, treatment costs, medicines, or diagnostic expenses while allowing repayments through monthly EMIs.
          </p>
        </div>

        <!-- Value point 2 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="home" class="w-3.5 h-3.5"></i></span>
            Funding Home Improvements
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Whether you're renovating your kitchen, upgrading interiors, repairing your home, or improving living spaces, planned financing can help you complete your project without disturbing emergency savings.
          </p>
        </div>

        <!-- Value point 3 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="graduation-cap" class="w-3.5 h-3.5"></i></span>
            Supporting Higher Education
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Investing in education is an investment in future opportunities. Personal financing may help manage tuition fees, certification courses, professional training, or education expenses, depending on lender terms.
          </p>
        </div>

        <!-- Value point 4 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="heart" class="w-3.5 h-3.5"></i></span>
            Planning a Wedding
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Family celebrations involve multiple expenses, including venue bookings, catering, travel, decorations, and other arrangements. Structured financing may help eligible borrowers manage these costs more comfortably.
          </p>
        </div>

        <!-- Value point 5 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="refresh-cw" class="w-3.5 h-3.5"></i></span>
            Consolidating Debt
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Handling multiple repayment schedules can become challenging. Consolidating eligible financial obligations into a single repayment plan may simplify monthly budgeting and financial management.
          </p>
        </div>

        <!-- Value point 6 -->
        <div class="bg-slate-50/50 border border-slate-200/50 p-6 rounded-2xl space-y-2.5">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-2">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="help-circle" class="w-3.5 h-3.5"></i></span>
            Unexpected Expenses
          </h4>
          <p class="text-slate-550 text-xs font-semibold leading-relaxed">
            Life is unpredictable. Whether it's urgent travel, family responsibilities, or other unforeseen requirements, timely financial support can provide additional flexibility when required.
          </p>
        </div>

      </div>
    </div>

    <!-- Section 3A: Features Table -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue mb-6 flex items-center gap-2">
        <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="file-spreadsheet" class="w-4.5 h-4.5"></i></span>
        Key Features of a Personal Loan
      </h2>
      <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50">
        <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
          <thead>
            <tr class="bg-darkBlue text-white text-[10px] sm:text-xs font-bold uppercase tracking-wider">
              <th class="p-4 w-1/3 sm:w-1/4">Feature</th>
              <th class="p-4">Description</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
            <tr><td class="p-4 font-bold text-darkBlue">Loan Type</td><td class="p-4 text-xs sm:text-sm">Generally Unsecured</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">End Use</td><td class="p-4 text-xs sm:text-sm">Genuine Personal Financial Requirements</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Application Mode</td><td class="p-4 text-xs sm:text-sm">Online & Assisted</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Loan Amount</td><td class="p-4 text-xs sm:text-sm">Subject to Eligibility & Lender Assessment</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Interest Rate</td><td class="p-4 text-xs sm:text-sm">As Determined by Lending Partner</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Repayment</td><td class="p-4 text-xs sm:text-sm">Monthly EMIs</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Loan Tenure</td><td class="p-4 text-xs sm:text-sm">Flexible Options Available</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Collateral</td><td class="p-4 text-xs sm:text-sm">Usually Not Required</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Processing</td><td class="p-4 text-xs sm:text-sm">Digital Application & Verification</td></tr>
            <tr class="bg-slate-50/30"><td class="p-4 font-bold text-darkBlue">Prepayment / Foreclosure</td><td class="p-4 text-xs sm:text-sm">Subject to Lender Terms</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Section 3B: Benefits of Personal Loan -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-16 shadow-sm text-left reveal-on-scroll">
      <div class="space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Benefits of Choosing a Personal Loan</h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold">
          A Personal Loan offers flexibility, convenience, and structured repayment, making it suitable for various personal financial needs.
        </p>
        <div class="border-t border-slate-100 pt-5">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs sm:text-sm font-semibold text-slate-700">
            <ul class="space-y-4">
              <li class="space-y-1">
                <span class="flex items-center gap-2.5 font-bold text-darkBlue"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> Financial Flexibility</span>
                <p class="text-slate-500 text-xs pl-7">Use the funds for genuine personal expenses without being restricted to a single purpose, subject to lender guidelines.</p>
              </li>
              <li class="space-y-1">
                <span class="flex items-center gap-2.5 font-bold text-darkBlue"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> No Asset Pledge</span>
                <p class="text-slate-500 text-xs pl-7">Since Personal Loans are generally unsecured, eligible borrowers typically do not need to mortgage property or pledge gold as collateral.</p>
              </li>
              <li class="space-y-1">
                <span class="flex items-center gap-2.5 font-bold text-darkBlue"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> Convenient Monthly Repayment</span>
                <p class="text-slate-500 text-xs pl-7">Repayment through EMIs helps distribute the borrowing cost over an agreed tenure, making budgeting easier.</p>
              </li>
            </ul>
            <ul class="space-y-4">
              <li class="space-y-1">
                <span class="flex items-center gap-2.5 font-bold text-darkBlue"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> Simple Digital Process</span>
                <p class="text-slate-500 text-xs pl-7">Online application and digital document submission help reduce paperwork and improve convenience.</p>
              </li>
              <li class="space-y-1">
                <span class="flex items-center gap-2.5 font-bold text-darkBlue"><span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span> Professional Guidance</span>
                <p class="text-slate-500 text-xs pl-7">AavivaCred supports customers by providing clear information and guidance throughout the application process.</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Section 4A: Eligibility Requirements -->
    <div class="bg-white border border-slate-200/70 rounded-[2.5rem] p-8 md:p-10 mb-8 shadow-sm text-left reveal-on-scroll">
      <div class="space-y-4">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="shield-check" class="w-4.5 h-4.5"></i></span>
          Who Can Apply for a Personal Loan?
        </h2>
        <p class="text-slate-500 text-xs sm:text-sm font-semibold max-w-3xl">
          A Personal Loan is designed to meet a wide range of financial needs, but every lending partner has its own eligibility requirements. Before approving an application, lenders carefully evaluate the applicant's financial profile to ensure the loan can be repaid comfortably.
        </p>
        <p class="text-slate-550 text-xs sm:text-sm font-bold mt-4">
          Commonly available to:
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 text-xs sm:text-sm font-semibold text-slate-700 pb-4">
          <div class="flex items-center gap-2.5"><span class="w-2 h-2 rounded-full bg-primary shrink-0"></span> Salaried employees (private/public sector)</div>
          <div class="flex items-center gap-2.5"><span class="w-2 h-2 rounded-full bg-primary shrink-0"></span> Government employees</div>
          <div class="flex items-center gap-2.5"><span class="w-2 h-2 rounded-full bg-primary shrink-0"></span> Self-employed professionals</div>
          <div class="flex items-center gap-2.5"><span class="w-2 h-2 rounded-full bg-primary shrink-0"></span> Freelancers with verifiable income</div>
          <div class="flex items-center gap-2.5"><span class="w-2 h-2 rounded-full bg-primary shrink-0"></span> Consultants & Business owners</div>
        </div>
        
        <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50 pt-2 mt-6">
          <h3 class="font-display font-extrabold text-xs text-slate-800 px-4 pb-2 border-b border-slate-100 uppercase tracking-wider">Personal Loan Eligibility Overview</h3>
          <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
            <thead>
              <tr class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100 text-[10px] sm:text-xs">
                <th class="p-4 w-1/3 sm:w-1/4">Eligibility Factor</th>
                <th class="p-4">General Requirement</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
              <tr><td class="p-4 font-bold text-darkBlue">Applicant Type</td><td class="p-4">Salaried & Self-employed</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Age</td><td class="p-4">As per lender guidelines</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Income</td><td class="p-4">Stable and verifiable</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Employment</td><td class="p-4">Regular employment or established business</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Credit Profile</td><td class="p-4">Healthy credit history preferred</td></tr>
              <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Bank Account</td><td class="p-4">Active savings account</td></tr>
              <tr><td class="p-4 font-bold text-darkBlue">Documentation</td><td class="p-4">Valid KYC and income proof</td></tr>
            </tbody>
          </table>
        </div>
      </div>
      <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
        <strong>Please Note:</strong> Meeting the basic eligibility criteria does not guarantee loan approval. The final decision is made by the respective lending partner after reviewing the complete application.
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
          Keeping your documents ready helps make the application process smoother and faster. The exact documents requested may differ depending on your employment type, loan amount, and the lender's internal policies.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 border-b border-slate-100 pb-8">
        
        <!-- Identity Proof -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="user" class="w-3.5 h-3.5"></i></span>
            Identity & Address Proof
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> PAN Card / Aadhaar Card</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Passport / Voter ID</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Driving Licence</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Utility Bill (Address Proof)</li>
          </ul>
        </div>

        <!-- Income Proof Salaried -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="briefcase" class="w-3.5 h-3.5"></i></span>
            For Salaried Applicants
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Latest salary slips</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Salary account statements</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Form 16 (where applicable)</li>
          </ul>
        </div>

        <!-- Income Proof Self-Employed -->
        <div class="bg-slate-50/30 p-5 rounded-2xl space-y-3">
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-slate-800 flex items-center gap-1.5">
            <span class="w-6 h-6 rounded-md bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="bar-chart-2" class="w-3.5 h-3.5"></i></span>
            For Self-Employed
          </h4>
          <ul class="space-y-2 text-xs sm:text-sm text-slate-600 font-semibold pl-2">
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Income Tax Returns (ITR)</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Business bank statements</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> GST returns (if applicable)</li>
            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Profit & Loss & Balance Sheet</li>
          </ul>
        </div>

      </div>

      <!-- Document Checklist Table -->
      <div class="border border-slate-100 rounded-2xl overflow-hidden shadow-inner bg-slate-50/50 pt-2">
        <h3 class="font-display font-extrabold text-xs text-slate-800 px-4 pb-2 border-b border-slate-100 uppercase tracking-wider">Documents Checklist</h3>
        <table class="w-full text-left text-xs sm:text-sm font-semibold border-collapse">
          <thead>
            <tr class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100 text-[10px] sm:text-xs">
              <th class="p-4 w-1/3 sm:w-1/4">Document Category</th>
              <th class="p-4">Common Documents</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100 text-slate-700 bg-white">
            <tr><td class="p-4 font-bold text-darkBlue">Identity Proof</td><td class="p-4">PAN, Aadhaar, Passport</td></tr>
            <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Address Proof</td><td class="p-4">Aadhaar, Utility Bill</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Income Proof</td><td class="p-4">Salary Slips / ITR</td></tr>
            <tr class="bg-slate-50/10"><td class="p-4 font-bold text-darkBlue">Bank Statements</td><td class="p-4">Recent Statements</td></tr>
            <tr><td class="p-4 font-bold text-darkBlue">Additional Documents</td><td class="p-4">As requested by the lender</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Section 5: Personal Loan Journey Roadmap -->
    <div class="bg-gradient-to-r from-[#031d40] to-darkBlue text-white rounded-[2.5rem] p-8 md:p-12 mb-16 relative overflow-hidden shadow-2xl reveal-on-scroll">
      <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-primary/10 rounded-full blur-3xl"></div>
      <div class="absolute right-0 top-0 w-64 h-64 bg-accentYellow/5 rounded-full blur-2xl"></div>

      <div class="text-center max-w-2xl mx-auto mb-10 space-y-2 relative z-10">
        <span class="text-[10px] font-extrabold text-accentYellow uppercase tracking-widest bg-white/5 border border-white/10 px-3.5 py-1 rounded-full">Simple Roadmap</span>
        <h2 class="font-display text-2.5xl md:text-3.5xl font-extrabold text-white">Your Personal Loan Journey in Five Simple Steps</h2>
        <p class="text-xs text-slate-300 font-semibold">At AavivaCred, we've designed the application process to be straightforward so you can focus on your financial goals instead of paperwork.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-5 gap-6 relative z-10 text-left">
        
        <!-- Step 1 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">01</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">1</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Submit Application</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Complete the online form with personal, employment, and financial info.</p>
        </div>

        <!-- Step 2 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">02</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">2</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Upload Documents</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Securely share your KYC, income proof, and other requested documents.</p>
        </div>

        <!-- Step 3 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">03</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">3</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Credit Assessment</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Lenders review application based on capacity, credit, and docs.</p>
        </div>

        <!-- Step 4 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">04</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">4</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Loan Offer</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Receive a loan offer outlining amount, rate, tenure, and terms.</p>
        </div>

        <!-- Step 5 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-5 relative hover:bg-white/10 transition-all group">
          <div class="absolute right-4 top-4 text-4xl font-black text-white/5 group-hover:text-white/10 transition-colors">05</div>
          <span class="w-8 h-8 bg-accentYellow/20 text-accentYellow rounded-lg flex items-center justify-center mb-4 text-xs font-bold">5</span>
          <h4 class="font-display font-extrabold text-xs sm:text-sm text-white mb-2 leading-tight">Disbursement</h4>
          <p class="text-slate-300 text-[10px] sm:text-xs font-semibold leading-relaxed">Accept the offer to receive funds directly based on lender policies.</p>
        </div>

      </div>
    </div>

    <!-- Section 6: Repay & Borrow Responsibly -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-16 items-start reveal-on-scroll">
      
      <!-- EMI Cost Details Card -->
      <div class="lg:col-span-7 bg-white border border-slate-200/70 rounded-[2.5rem] p-8 shadow-sm text-left">
        <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue mb-4 flex items-center gap-2">
          <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="calculator" class="w-4.5 h-4.5"></i></span>
          Understanding EMI & Loan Cost
        </h2>
        <div class="text-slate-600 text-xs sm:text-sm font-semibold leading-relaxed space-y-4">
          <p>
            Before applying for a Personal Loan, it's important to understand how repayment works. Most Personal Loans are repaid through Equated Monthly Instalments (EMIs). Each EMI includes a portion of the principal amount along with the applicable interest.
          </p>
          <p>
            Your monthly EMI depends on several factors:
          </p>
          <div class="grid grid-cols-2 gap-3 text-darkBlue font-bold text-xs pb-2 pl-2">
            <div class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Loan Amount</div>
            <div class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Interest Rate</div>
            <div class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Loan Tenure</div>
            <div class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Repayment Schedule</div>
          </div>
          <p>
            Choosing a longer tenure may reduce your monthly EMI, while a shorter tenure can reduce the overall interest payable. Before finalising any loan, review the repayment schedule carefully and choose an EMI that fits comfortably within your monthly budget.
          </p>
          <p class="border-t border-slate-100 pt-3 text-slate-500 font-bold italic">
            Using an EMI Calculator can help you estimate repayment obligations before applying.
          </p>
        </div>
      </div>

      <!-- Borrow Responsibly Checklist Card -->
      <div class="lg:col-span-5 bg-white border border-slate-200/70 rounded-[2.5rem] p-8 shadow-sm text-left">
        <div class="space-y-4">
          <h2 class="font-display text-xl sm:text-2xl font-extrabold text-darkBlue">Borrow Responsibly</h2>
          <p class="text-slate-500 text-xs sm:text-sm font-semibold">
            A Personal Loan should help you achieve your financial goals—not create unnecessary financial pressure.
          </p>
          <div class="border-t border-slate-100 pt-3">
            <p class="text-xs font-bold text-slate-800 mb-3 uppercase tracking-wider">Practical Borrowing Tips:</p>
            <ul class="space-y-2 text-xs font-bold text-slate-700">
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3 h-3"></i></span> <span>Borrow only what you require</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3 h-3"></i></span> <span>Calculate repayment capacity first</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3 h-3"></i></span> <span>Compare loan options & tenures</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3 h-3"></i></span> <span>Read terms and conditions carefully</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3 h-3"></i></span> <span>Understand processing fees & charges</span></li>
              <li class="flex items-center gap-2.5"><span class="w-5 h-5 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3 h-3"></i></span> <span>Avoid missing monthly payments</span></li>
            </ul>
          </div>
        </div>
        <p class="text-[10px] text-slate-400 font-semibold italic border-t border-slate-100 pt-4 mt-6 leading-relaxed">
          *Responsible borrowing contributes to better financial discipline.
        </p>
      </div>

    </div>

    <!-- Section 8: Trust & FAQs Side-by-Side (Matches Section 8 in Business Loan) -->
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
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Customer-focused approach</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Easy online application process</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Dedicated loan assistance</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Trusted lending partners</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Transparent communication</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Secure handling of information</span></li>
              <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-primary shrink-0"></span> <span>Guidance throughout application</span></li>
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
      <!-- Glow bubble underlay -->
      <div class="absolute left-[-20%] top-[-20%] w-[350px] h-[350px] bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>
      <div class="absolute right-[-20%] bottom-[-20%] w-[350px] h-[350px] bg-teal-400/10 rounded-full blur-3xl pointer-events-none"></div>

      <div class="relative z-10 max-w-2xl mx-auto space-y-6">
        <span class="text-[9px] font-extrabold tracking-widest text-accentYellow uppercase bg-white/5 border border-white/10 px-3 py-1 rounded-full">Apply Online Today</span>
        <h2 class="font-display text-2.5xl md:text-3.5xl font-extrabold text-white leading-tight">
          Move Closer to Your Financial Goals
        </h2>
        <p class="text-xs sm:text-sm text-slate-300 font-semibold leading-relaxed">
          Whether you're planning for an important life event or managing an unexpected financial requirement, choosing the right financing solution can make a meaningful difference.
        </p>

        <div class="flex flex-wrap justify-center gap-4 text-slate-300 text-[10px] sm:text-xs font-bold py-2">
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Easy Online Application</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Trusted Lending Partners</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Transparent Process</span>
          <span class="flex items-center gap-1.5"><i data-lucide="check" class="w-4 h-4 text-accentYellow"></i> Secure Digital Experience</span>
        </div>

        <div class="pt-4">
          <a href="<?php echo PATH_PREFIX; ?>pages/apply.php?type=personal" class="inline-block bg-accentYellow hover:bg-yellow-500 text-darkBlue font-black text-sm px-10 py-4 rounded-2xl shadow-lg transition-all transform hover:-translate-y-0.5 active:scale-98">
            Start Your Personal Loan Journey Today
          </a>
        </div>
      </div>
    </div>

    <!-- Sub-Products Section (e.g. Personal Loan Products) -->
    <div class="space-y-6 reveal-on-scroll">
      <h2 class="font-display font-extrabold text-xl md:text-2xl text-darkBlue text-left">
        Personal Loan Products
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
