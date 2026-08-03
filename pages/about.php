<?php
$page_title = "About Us - Your Trusted Partner for Smarter Financial Solutions";
include '../includes/header.php';
?>

<!-- Full Width Hero Banner with Overlay Text -->
<div class="w-full h-[280px] sm:h-[360px] md:h-[460px] relative overflow-hidden flex items-center justify-center text-center">
  <!-- Banner Background Image -->
  <img src="<?php echo PATH_PREFIX; ?>assets/images/about_us_banner.png" alt="About AavivaCred" class="absolute inset-0 w-full h-full object-cover object-[center_35%]">
  
  <!-- Deep Blue Semi-Transparent Mask for Contrast (Waqt Style) -->
  <div class="absolute inset-0 bg-[#021435]/75 backdrop-blur-[1px] z-10"></div>
  
  <!-- Content overlay -->
  <div class="container mx-auto px-4 max-w-4xl relative z-20 text-white space-y-4 sm:space-y-6 pt-16">
    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-accentYellow text-xs font-bold border border-white/10 backdrop-blur-sm shadow-sm mx-auto uppercase tracking-wider">
      <i data-lucide="info" class="w-3.5 h-3.5"></i> Corporate Profile
    </div>
    
    <h1 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white drop-shadow-sm">
      About AavivaCred
    </h1>
    
    <p class="text-slate-200 text-sm sm:text-base md:text-lg max-w-2xl mx-auto font-medium drop-shadow-sm">
      Your Trusted Partner for Smarter Financial Solutions
    </p>

    <!-- Breadcrumb -->
    <div class="flex items-center justify-center gap-2 text-xs font-bold text-white/60">
      <a href="<?php echo PATH_PREFIX; ?>index.php" class="hover:text-accentYellow transition-colors">Home</a>
      <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
      <span class="text-accentYellow">About Us</span>
    </div>
  </div>
</div>

<!-- Hero Content Section -->
<section class="relative py-16 md:py-20 overflow-hidden bg-white text-slate-800 border-b border-slate-200/60 bg-grid">
  <!-- Decorative Background Elements -->
  <div class="absolute left-[-15%] top-[-30%] w-[380px] h-[220%] bg-gradient-to-b from-indigo-500/8 via-purple-500/3 to-transparent rotate-[22deg] transform pointer-events-none z-0"></div>
  <div class="absolute right-[-12%] top-[-20%] w-[320px] h-[200%] bg-gradient-to-t from-teal-400/10 via-emerald-400/3 to-transparent rotate-[22deg] transform pointer-events-none z-0"></div>
  
  <div class="absolute left-1/3 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[400px] bg-indigo-500/5 rounded-full blur-3xl pointer-events-none z-0"></div>
  <div class="absolute right-[10%] bottom-[-10%] w-[300px] h-[300px] bg-teal-400/6 rounded-full blur-3xl pointer-events-none z-0"></div>

  <!-- Decorative Outline SVGs -->
  <span class="absolute left-[8%] top-[15%] text-6xl font-black text-indigo-500/12 rotate-[-15deg] pointer-events-none select-none z-0">₹</span>
  <span class="absolute right-[10%] top-[15%] text-5xl font-black text-teal-500/12 rotate-[12deg] pointer-events-none select-none z-0">%</span>
  
  <div class="container mx-auto px-4 lg:px-8 max-w-6xl relative z-10 reveal-on-scroll">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
      <!-- Left Column: Highlight Philosophy -->
      <div class="lg:col-span-5 space-y-6 text-left">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-bold border border-primary/20 backdrop-blur-sm shadow-sm">
          <i data-lucide="info" class="w-3.5 h-3.5"></i> Our Philosophy
        </div>
        
        <h3 class="font-display text-3xl md:text-4xl font-extrabold tracking-tight leading-tight text-darkBlue">
          Making Credit <span class="text-gradient">Simple, Transparent</span> & Stress-Free
        </h3>
        
        <!-- Trust checklist features -->
        <div class="pt-4 space-y-3.5 text-xs font-bold text-slate-700">
          <div class="flex items-center gap-3">
            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
            <span>Customer-Focused Guidance</span>
          </div>
          <div class="flex items-center gap-3">
            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
            <span>Digital-First Sourcing Platform</span>
          </div>
          <div class="flex items-center gap-3">
            <span class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
            <span>Responsible Financial Practice</span>
          </div>
        </div>
      </div>
      
      <!-- Right Column: Content Paragraphs -->
      <div class="lg:col-span-7 space-y-6 text-left text-slate-600 text-xs sm:text-sm font-semibold leading-relaxed">
        <p class="text-slate-900 text-sm sm:text-base font-extrabold leading-relaxed border-l-4 border-primary pl-4">
          At AavivaCred, we believe that every financial goal deserves the right support. Whether you're planning to buy a home, expand your business, manage an unexpected expense, or meet personal financial commitments, accessing the right loan should be simple, transparent, and stress-free.
        </p>
        <p>
          We are a customer-focused financial services platform that helps eligible individuals, professionals, entrepreneurs, and businesses explore suitable loan solutions through trusted lending partners. Our digital-first approach, combined with personalized assistance, makes the borrowing journey easier while helping customers make informed financial decisions.
        </p>
        <p>
          Rather than simply facilitating loan applications, we focus on creating a seamless borrowing experience by providing clear information, dedicated support, and responsible financial guidance at every stage of the process.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Who We Are & Our Story Section -->
<section class="py-20 bg-white relative overflow-hidden border-b border-slate-100">
  <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
    <div class="grid md:grid-cols-2 gap-12 items-stretch">
      <!-- Who We Are -->
      <div class="glass-card rounded-[32px] p-8 md:p-10 border border-slate-150 flex flex-col justify-between reveal-on-scroll">
        <div>
          <div class="loan-icon-wrapper bg-primary/10 text-primary mb-6">
            <i data-lucide="users" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display text-2xl font-bold text-slate-900 mb-6">Who We Are</h3>
          <div class="text-slate-500 text-xs font-semibold leading-relaxed space-y-4">
            <p>
              AavivaCred is committed to simplifying access to financial solutions for customers across India. We understand that every borrower has different financial goals, repayment capacity, and funding requirements. That's why we help applicants explore loan options that align with their unique needs.
            </p>
            <p>
              Whether you're applying for a Personal Loan, Business Loan, Home Loan, Gold Loan, Payday Loan, or EDI Loan, our team works closely with you to explain the application process, documentation requirements, and lender criteria.
            </p>
            <p>
              Our mission is to make borrowing easier by combining technology with human support, ensuring that every customer receives the guidance they need throughout their financial journey.
            </p>
          </div>
        </div>
      </div>

      <!-- Our Story -->
      <div class="glass-card rounded-[32px] p-8 md:p-10 border border-slate-150 flex flex-col justify-between reveal-on-scroll delay-100">
        <div>
          <div class="loan-icon-wrapper bg-purple-50 text-purple-650 mb-6">
            <i data-lucide="book-open" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display text-2xl font-bold text-slate-900 mb-2">Our Story</h3>
          <p class="text-xs text-primary font-bold uppercase tracking-wider mb-6">Every successful journey begins with a purpose.</p>
          <div class="text-slate-500 text-xs font-semibold leading-relaxed space-y-4">
            <p>
              AavivaCred was established with the vision of making financial services more accessible, transparent, and customer-friendly. We recognized that many borrowers found traditional loan processes complicated, time-consuming, and difficult to understand.
            </p>
            <p>
              To address this challenge, we created a platform where customers can explore multiple loan solutions in one place while receiving professional assistance from a dedicated support team.
            </p>
            <p>
              Over time, our commitment to transparency, customer satisfaction, and responsible lending has helped us build strong relationships with both customers and lending partners.
            </p>
            <p>
              Today, we continue to simplify the borrowing experience by focusing on trust, convenience, and long-term customer value.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Mission & Vision Section -->
<section class="py-20 bg-slate-50 relative overflow-hidden border-b border-slate-200/50">
  <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
    <div class="grid md:grid-cols-2 gap-12">
      <!-- Mission -->
      <div class="space-y-6 reveal-on-scroll">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold">
          <i data-lucide="target" class="w-4 h-4"></i> Our Mission
        </div>
        <h3 class="font-display text-2xl font-bold text-slate-900">Empowering Through Transparency</h3>
        <p class="text-slate-650 text-sm font-semibold leading-relaxed">
          Our mission is to empower individuals and businesses by making access to finance simpler, faster, and more transparent.
        </p>
        
        <p class="text-xs text-slate-400 font-bold uppercase tracking-wide">We are committed to:</p>
        
        <ul class="space-y-3">
          <li class="flex items-start gap-3 text-xs font-semibold text-slate-700">
            <span class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3 h-3"></i></span>
            <span>Simplifying the loan application process</span>
          </li>
          <li class="flex items-start gap-3 text-xs font-semibold text-slate-700">
            <span class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3 h-3"></i></span>
            <span>Providing accurate and transparent financial information</span>
          </li>
          <li class="flex items-start gap-3 text-xs font-semibold text-slate-700">
            <span class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3 h-3"></i></span>
            <span>Helping customers make informed borrowing decisions</span>
          </li>
          <li class="flex items-start gap-3 text-xs font-semibold text-slate-700">
            <span class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3 h-3"></i></span>
            <span>Delivering exceptional customer service</span>
          </li>
          <li class="flex items-start gap-3 text-xs font-semibold text-slate-700">
            <span class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3 h-3"></i></span>
            <span>Building long-term relationships based on trust and integrity</span>
          </li>
          <li class="flex items-start gap-3 text-xs font-semibold text-slate-700">
            <span class="w-5 h-5 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3 h-3"></i></span>
            <span>Promoting responsible borrowing practices</span>
          </li>
        </ul>
        
        <p class="text-xs text-slate-500 font-bold italic pt-2">
          We believe that financial solutions should support people's goals—not create unnecessary complexity.
        </p>
      </div>

      <!-- Vision -->
      <div class="space-y-6 reveal-on-scroll delay-100">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-bold">
          <i data-lucide="eye" class="w-4 h-4"></i> Our Vision
        </div>
        <h3 class="font-display text-2xl font-bold text-slate-900">Setting the Standard for Digital Finance</h3>
        <div class="text-slate-650 text-sm font-semibold leading-relaxed space-y-4">
          <p>
            Our vision is to become one of India's most trusted financial services platforms by connecting eligible borrowers with reliable lending partners through technology-driven solutions and outstanding customer service.
          </p>
          <p>
            We aspire to create an environment where customers can confidently explore financing options with complete transparency and professional guidance.
          </p>
          <p>
            By continuously improving our digital platform and customer experience, we aim to make financial services more accessible for individuals, professionals, startups, and businesses across the country.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- What We Offer Section -->
<section class="py-20 bg-white relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
    <div class="text-center mb-16 reveal-on-scroll">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold mb-4">
        <i data-lucide="grid" class="w-4 h-4"></i> What We Offer
      </div>
      <h2 class="font-display text-3xl font-extrabold text-darkBlue">Our Loan Solutions</h2>
      <p class="text-xs text-slate-500 mt-2 font-medium max-w-2xl mx-auto">
        AavivaCred helps eligible applicants explore a wide range of financing solutions designed to support different financial needs.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Personal Loan -->
      <div class="loan-card flex flex-col justify-between reveal-on-scroll">
        <div>
          <div class="absolute top-0 left-0 right-0 h-1.5 bg-primary rounded-t-[20px]"></div>
          <div class="loan-icon-wrapper bg-primary/10 text-primary mb-6">
            <i data-lucide="user" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display text-lg font-bold text-slate-900 mb-4">Personal Loan</h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Personal Loans can help eligible borrowers manage expenses such as medical emergencies, higher education, weddings, travel, home renovation, or other genuine personal financial requirements.
          </p>
        </div>
      </div>

      <!-- Business Loan -->
      <div class="loan-card flex flex-col justify-between reveal-on-scroll delay-75">
        <div>
          <div class="absolute top-0 left-0 right-0 h-1.5 bg-indigo-500 rounded-t-[20px]"></div>
          <div class="loan-icon-wrapper bg-indigo-50 text-indigo-600 mb-6">
            <i data-lucide="briefcase" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display text-lg font-bold text-slate-900 mb-4">Business Loan</h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Business Loans support MSMEs, startups, retailers, manufacturers, traders, and entrepreneurs with funding for working capital, inventory, equipment, machinery, business expansion, and operational expenses.
          </p>
        </div>
      </div>

      <!-- Home Loan -->
      <div class="loan-card flex flex-col justify-between reveal-on-scroll delay-150">
        <div>
          <div class="absolute top-0 left-0 right-0 h-1.5 bg-emerald-500 rounded-t-[20px]"></div>
          <div class="loan-icon-wrapper bg-emerald-50 text-emerald-600 mb-6">
            <i data-lucide="home" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display text-lg font-bold text-slate-900 mb-4">Home Loan</h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Whether you're purchasing your first home, constructing a new house, renovating an existing property, or transferring your current home loan, we help you explore suitable home financing options.
          </p>
        </div>
      </div>

      <!-- Gold Loan -->
      <div class="loan-card flex flex-col justify-between reveal-on-scroll delay-225">
        <div>
          <div class="absolute top-0 left-0 right-0 h-1.5 bg-amber-500 rounded-t-[20px]"></div>
          <div class="loan-icon-wrapper bg-amber-50 text-amber-600 mb-6">
            <i data-lucide="coins" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display text-lg font-bold text-slate-900 mb-4">Gold Loan</h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Gold Loans allow eligible borrowers to access funds against eligible gold jewellery without selling their valuable assets, subject to lender terms and conditions.
          </p>
        </div>
      </div>

      <!-- Payday Loan -->
      <div class="loan-card flex flex-col justify-between reveal-on-scroll delay-300">
        <div>
          <div class="absolute top-0 left-0 right-0 h-1.5 bg-purple-500 rounded-t-[20px]"></div>
          <div class="loan-icon-wrapper bg-purple-50 text-purple-600 mb-6">
            <i data-lucide="calendar" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display text-lg font-bold text-slate-900 mb-4">Payday Loan</h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Payday Loans are designed to help eligible salaried individuals manage temporary financial requirements before their next salary or expected source of income.
          </p>
        </div>
      </div>

      <!-- EDI Loan -->
      <div class="loan-card flex flex-col justify-between reveal-on-scroll delay-375">
        <div>
          <div class="absolute top-0 left-0 right-0 h-1.5 bg-rose-500 rounded-t-[20px]"></div>
          <div class="loan-icon-wrapper bg-rose-50 text-rose-600 mb-6">
            <i data-lucide="activity" class="w-6 h-6"></i>
          </div>
          <h3 class="font-display text-lg font-bold text-slate-900 mb-4">EDI Loan</h3>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            EDI (Equated Daily Instalment) Loans are suitable for businesses with regular daily cash flow, offering repayment through smaller daily instalments instead of monthly EMIs, depending on the lender's offering.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose AavivaCred? Section -->
<section class="py-20 bg-slate-50 border-t border-b border-slate-200/50 relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
    <div class="text-center mb-16 reveal-on-scroll">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold mb-4">
        <i data-lucide="thumbs-up" class="w-4 h-4"></i> Why Choose Us
      </div>
      <h2 class="font-display text-3xl font-extrabold text-darkBlue">Why Choose AavivaCred?</h2>
      <p class="text-xs text-slate-500 mt-2 font-medium max-w-2xl mx-auto">
        Choosing the right financial services platform can make your borrowing experience more convenient and transparent. At AavivaCred, we focus on helping customers understand their options and complete their applications with confidence.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Customer-First Approach -->
      <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative reveal-on-scroll">
        <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-4">
          <i data-lucide="user-check" class="w-5 h-5"></i>
        </div>
        <h4 class="font-display text-base font-bold text-slate-900 mb-2">Customer-First Approach</h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          Every customer has unique financial goals. We take the time to understand your requirements and help you explore financing options that suit your profile.
        </p>
      </div>

      <!-- Transparent Process -->
      <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative reveal-on-scroll delay-75">
        <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4">
          <i data-lucide="eye" class="w-5 h-5"></i>
        </div>
        <h4 class="font-display text-base font-bold text-slate-900 mb-2">Transparent Process</h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          We explain eligibility criteria, required documents, repayment terms, applicable charges, and lender policies clearly so that you can make informed decisions.
        </p>
      </div>

      <!-- Digital Convenience -->
      <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative reveal-on-scroll delay-150">
        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">
          <i data-lucide="smartphone" class="w-5 h-5"></i>
        </div>
        <h4 class="font-display text-base font-bold text-slate-900 mb-2">Digital Convenience</h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          Our online application process allows you to begin your loan journey from anywhere, reducing paperwork and saving valuable time.
        </p>
      </div>

      <!-- Trusted Lending Partners -->
      <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative reveal-on-scroll delay-225">
        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-4">
          <i data-lucide="shield" class="w-5 h-5"></i>
        </div>
        <h4 class="font-display text-base font-bold text-slate-900 mb-2">Trusted Lending Partners</h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          We work with established lending partners to help eligible customers access a variety of loan products.
        </p>
      </div>

      <!-- Dedicated Support Team -->
      <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative reveal-on-scroll delay-300">
        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-4">
          <i data-lucide="headphones" class="w-5 h-5"></i>
        </div>
        <h4 class="font-display text-base font-bold text-slate-900 mb-2">Dedicated Support Team</h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          From your first enquiry to the completion of your application, our experienced team is available to provide assistance whenever you need it.
        </p>
      </div>

      <!-- Secure Information Handling -->
      <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative reveal-on-scroll delay-375">
        <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mb-4">
          <i data-lucide="lock" class="w-5 h-5"></i>
        </div>
        <h4 class="font-display text-base font-bold text-slate-900 mb-2">Secure Information Handling</h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          Protecting your personal and financial information is one of our highest priorities. Your data is handled securely and shared only where necessary for loan processing.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Our Core Values Section -->
<section class="py-20 bg-white relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
    <div class="text-center mb-16 reveal-on-scroll">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold mb-4">
        <i data-lucide="heart" class="w-4 h-4"></i> Our Values
      </div>
      <h2 class="font-display text-3xl font-extrabold text-darkBlue">Our Core Values</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Trust -->
      <div class="p-6 bg-slate-50 rounded-2xl border border-slate-150 hover:border-slate-250 transition-all reveal-on-scroll">
        <h4 class="font-display text-base font-bold text-slate-900 mb-2 flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-primary"></span> Trust
        </h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          We believe trust is built through honesty, consistency, and transparent communication.
        </p>
      </div>

      <!-- Transparency -->
      <div class="p-6 bg-slate-50 rounded-2xl border border-slate-150 hover:border-slate-250 transition-all reveal-on-scroll delay-75">
        <h4 class="font-display text-base font-bold text-slate-900 mb-2 flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-indigo-500"></span> Transparency
        </h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          We provide clear information about loan products, documentation, eligibility, and repayment terms so customers can make confident financial decisions.
        </p>
      </div>

      <!-- Integrity -->
      <div class="p-6 bg-slate-50 rounded-2xl border border-slate-150 hover:border-slate-250 transition-all reveal-on-scroll delay-150">
        <h4 class="font-display text-base font-bold text-slate-900 mb-2 flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Integrity
        </h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          We conduct our business ethically and professionally while maintaining the highest standards of customer service.
        </p>
      </div>

      <!-- Customer Commitment -->
      <div class="p-6 bg-slate-50 rounded-2xl border border-slate-150 hover:border-slate-250 transition-all reveal-on-scroll delay-225">
        <h4 class="font-display text-base font-bold text-slate-900 mb-2 flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-amber-500"></span> Customer Commitment
        </h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          Our customers remain at the centre of everything we do. We strive to provide timely support, accurate information, and a positive borrowing experience.
        </p>
      </div>

      <!-- Innovation -->
      <div class="p-6 bg-slate-50 rounded-2xl border border-slate-150 hover:border-slate-250 transition-all reveal-on-scroll delay-300">
        <h4 class="font-display text-base font-bold text-slate-900 mb-2 flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-purple-500"></span> Innovation
        </h4>
        <p class="text-slate-500 text-xs font-semibold leading-relaxed">
          We continuously improve our digital processes to make financial services more accessible, efficient, and convenient.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Our Loan Application Process Section -->
<section class="py-20 bg-slate-50 border-t border-b border-slate-200/50 overflow-hidden relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-5xl relative z-10">
    <div class="text-center mb-16 reveal-on-scroll">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold mb-4">
        <i data-lucide="git-commit" class="w-4 h-4"></i> How It Works
      </div>
      <h2 class="font-display text-3xl font-extrabold text-darkBlue">Our Loan Application Process</h2>
      <p class="text-xs text-slate-500 mt-2 font-medium max-w-2xl mx-auto">
        Applying for a loan through AavivaCred is designed to be simple and straightforward.
      </p>
    </div>

    <!-- Steps Timeline Wrapper -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 relative">
      <!-- Step 1 -->
      <div class="bg-white border border-slate-200/85 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all duration-300 reveal-on-scroll flex flex-col justify-between h-full">
        <div>
          <div class="w-10 h-10 rounded-2xl bg-primary/10 text-primary font-display font-extrabold text-sm flex items-center justify-center mb-4 shadow-sm border border-primary/15">01</div>
          <h4 class="font-display text-sm font-extrabold text-slate-900 mb-2 leading-tight">Step 1 – Choose Your Loan</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">
            Select the loan product that best matches your financial requirement.
          </p>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="bg-white border border-slate-200/85 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all duration-300 reveal-on-scroll delay-75 flex flex-col justify-between h-full">
        <div>
          <div class="w-10 h-10 rounded-2xl bg-primary/10 text-primary font-display font-extrabold text-sm flex items-center justify-center mb-4 shadow-sm border border-primary/15">02</div>
          <h4 class="font-display text-sm font-extrabold text-slate-900 mb-2 leading-tight">Step 2 – Complete the Application</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">
            Fill out the online application form with your personal or business details.
          </p>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="bg-white border border-slate-200/85 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all duration-300 reveal-on-scroll delay-150 flex flex-col justify-between h-full">
        <div>
          <div class="w-10 h-10 rounded-2xl bg-primary/10 text-primary font-display font-extrabold text-sm flex items-center justify-center mb-4 shadow-sm border border-primary/15">03</div>
          <h4 class="font-display text-sm font-extrabold text-slate-900 mb-2 leading-tight">Step 3 – Submit Documents</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">
            Upload the required KYC, income, business, or property documents securely.
          </p>
        </div>
      </div>

      <!-- Step 4 -->
      <div class="bg-white border border-slate-200/85 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all duration-300 reveal-on-scroll delay-225 flex flex-col justify-between h-full">
        <div>
          <div class="w-10 h-10 rounded-2xl bg-primary/10 text-primary font-display font-extrabold text-sm flex items-center justify-center mb-4 shadow-sm border border-primary/15">04</div>
          <h4 class="font-display text-sm font-extrabold text-slate-900 mb-2 leading-tight">Step 4 – Verification & Assessment</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">
            The lending partner reviews your application, verifies your documents, and evaluates your eligibility.
          </p>
        </div>
      </div>

      <!-- Step 5 -->
      <div class="bg-white border border-slate-200/85 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all duration-300 reveal-on-scroll delay-300 flex flex-col justify-between h-full">
        <div>
          <div class="w-10 h-10 rounded-2xl bg-primary/10 text-primary font-display font-extrabold text-sm flex items-center justify-center mb-4 shadow-sm border border-primary/15">05</div>
          <h4 class="font-display text-sm font-extrabold text-slate-900 mb-2 leading-tight">Step 5 – Loan Decision</h4>
          <p class="text-slate-500 text-[11px] font-semibold leading-relaxed">
            If approved, the lender communicates the loan offer and proceeds with disbursement according to its policies.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Responsible Lending & Trust Section -->
<section class="py-20 bg-white overflow-hidden relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-5xl relative z-10">
    <div class="grid md:grid-cols-2 gap-12">
      <!-- Responsible Lending -->
      <div class="space-y-6 reveal-on-scroll">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold">
          <i data-lucide="shield-alert" class="w-4 h-4"></i> Responsible Lending
        </div>
        <h3 class="font-display text-2xl font-bold text-slate-900">Our Commitment to Responsible Lending</h3>
        <p class="text-slate-650 text-sm font-semibold leading-relaxed">
          At AavivaCred, we believe responsible borrowing is essential for long-term financial well-being.
        </p>
        
        <p class="text-xs text-slate-400 font-bold uppercase tracking-wide">We encourage every applicant to:</p>
        
        <ul class="space-y-3">
          <li class="flex items-start gap-2.5 text-xs font-semibold text-slate-700">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 shrink-0 mt-2"></span>
            <span>Borrow only the amount required.</span>
          </li>
          <li class="flex items-start gap-2.5 text-xs font-semibold text-slate-700">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 shrink-0 mt-2"></span>
            <span>Assess repayment capacity before applying.</span>
          </li>
          <li class="flex items-start gap-2.5 text-xs font-semibold text-slate-700">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 shrink-0 mt-2"></span>
            <span>Compare loan options carefully.</span>
          </li>
          <li class="flex items-start gap-2.5 text-xs font-semibold text-slate-700">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 shrink-0 mt-2"></span>
            <span>Read the lender's terms and conditions thoroughly.</span>
          </li>
          <li class="flex items-start gap-2.5 text-xs font-semibold text-slate-700">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 shrink-0 mt-2"></span>
            <span>Make repayments on time.</span>
          </li>
          <li class="flex items-start gap-2.5 text-xs font-semibold text-slate-700">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 shrink-0 mt-2"></span>
            <span>Understand all applicable fees and charges before accepting a loan.</span>
          </li>
        </ul>
        
        <p class="text-xs text-slate-500 font-bold leading-relaxed pt-2">
          Our role is to help customers make informed financial decisions while promoting transparency and financial responsibility.
        </p>
      </div>

      <!-- Why Customers Trust Us -->
      <div class="space-y-6 reveal-on-scroll delay-100">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold">
          <i data-lucide="check-circle" class="w-4 h-4"></i> Customer Trust
        </div>
        <h3 class="font-display text-2xl font-bold text-slate-900">Why Customers Trust AavivaCred</h3>
        <p class="text-slate-650 text-sm font-semibold leading-relaxed">
          Customers choose AavivaCred because we combine technology with personalized service to create a smooth borrowing experience.
        </p>
        
        <p class="text-xs text-slate-400 font-bold uppercase tracking-wide">What Sets Us Apart</p>
        
        <ul class="space-y-2 text-xs font-semibold text-slate-700">
          <li class="flex items-center gap-3">
            <i data-lucide="check-circle-2" class="w-4.5 h-4.5 text-emerald-600 shrink-0"></i>
            <span>Wide range of loan solutions</span>
          </li>
          <li class="flex items-center gap-3">
            <i data-lucide="check-circle-2" class="w-4.5 h-4.5 text-emerald-600 shrink-0"></i>
            <span>Easy online application</span>
          </li>
          <li class="flex items-center gap-3">
            <i data-lucide="check-circle-2" class="w-4.5 h-4.5 text-emerald-600 shrink-0"></i>
            <span>Transparent process</span>
          </li>
          <li class="flex items-center gap-3">
            <i data-lucide="check-circle-2" class="w-4.5 h-4.5 text-emerald-600 shrink-0"></i>
            <span>Trusted lending partner network</span>
          </li>
          <li class="flex items-center gap-3">
            <i data-lucide="check-circle-2" class="w-4.5 h-4.5 text-emerald-600 shrink-0"></i>
            <span>Dedicated customer assistance</span>
          </li>
          <li class="flex items-center gap-3">
            <i data-lucide="check-circle-2" class="w-4.5 h-4.5 text-emerald-600 shrink-0"></i>
            <span>Secure information handling</span>
          </li>
          <li class="flex items-center gap-3">
            <i data-lucide="check-circle-2" class="w-4.5 h-4.5 text-emerald-600 shrink-0"></i>
            <span>Responsible financial guidance</span>
          </li>
          <li class="flex items-center gap-3">
            <i data-lucide="check-circle-2" class="w-4.5 h-4.5 text-emerald-600 shrink-0"></i>
            <span>Customer-focused approach</span>
          </li>
        </ul>
        
        <p class="text-xs text-slate-500 font-bold leading-relaxed pt-2">
          We are committed to helping every eligible applicant navigate the loan process with confidence and clarity.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action Banner -->
<section class="py-20 bg-slate-50 border-t border-slate-200/50">
  <div class="container mx-auto px-4 max-w-7xl">
    <div class="bg-gradient-to-br from-[#020e26] via-[#01091b] to-[#000511] border border-white/10 rounded-[40px] p-10 md:p-14 text-white relative overflow-hidden shadow-2xl reveal-on-scroll">
      <!-- Grid Overlay and Glow spots -->
      <div class="absolute inset-0 bg-grid opacity-[0.04] pointer-events-none"></div>
      <div class="absolute -right-20 -top-20 w-80 h-80 bg-primary/10 rounded-full blur-3xl pointer-events-none z-0"></div>
      <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-accentYellow/5 rounded-full blur-3xl pointer-events-none z-0"></div>
 
      <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
        <!-- Left Side: Copy and CTAs -->
        <div class="lg:col-span-7 space-y-6 text-left">
          
          <h2 class="font-display text-3xl md:text-4xl font-extrabold leading-tight">
            Let's Build Your Financial Future Together
          </h2>
          
          <div class="text-slate-300 text-xs sm:text-sm font-medium space-y-4 leading-relaxed">
            <p>
              Financial goals are achieved with careful planning and the right support. Whether you're looking to finance a personal milestone, grow your business, purchase a home, or manage a short-term financial need, AavivaCred is here to assist you.
            </p>
            <p>
              Our team is dedicated to helping you explore loan solutions that align with your financial objectives while providing guidance throughout the application process.
            </p>
          </div>

          <div class="pt-4 flex flex-col sm:flex-row items-center gap-4">
            <a href="<?php echo PATH_PREFIX; ?>pages/apply.php" class="btn-buddy-primary inline-flex items-center justify-center px-8 py-4 shadow-lg text-sm w-full sm:w-auto">
              Apply Now <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
            </a>
            <a href="https://wa.me/919711149319?text=Hi%20AavivaCred%20Support,%20I%20am%20interested%20in%20applying%2520for%2520an%2520instant%2520loan.%20Please%2520help%2520me." target="_blank" rel="noopener noreferrer" class="btn-buddy-secondary inline-flex items-center justify-center px-8 py-4 text-sm w-full sm:w-auto">
              <i data-lucide="message-circle" class="w-5 h-5 mr-2"></i> Connect with Support
            </a>
          </div>
        </div>

        <!-- Right Side: Value Checklist -->
        <div class="lg:col-span-5 space-y-6">
          <div class="space-y-3">
            <div class="flex items-center gap-3 p-3.5 bg-white/5 border border-white/8 rounded-2xl hover:bg-white/10 hover:border-white/15 transition-all duration-300">
              <span class="w-6 h-6 rounded-full bg-accentYellow/10 text-accentYellow flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
              <span class="text-xs font-bold text-white/95">Explore Our Loan Solutions</span>
            </div>
            <div class="flex items-center gap-3 p-3.5 bg-white/5 border border-white/8 rounded-2xl hover:bg-white/10 hover:border-white/15 transition-all duration-300">
              <span class="w-6 h-6 rounded-full bg-accentYellow/10 text-accentYellow flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
              <span class="text-xs font-bold text-white/95">Apply Online</span>
            </div>
            <div class="flex items-center gap-3 p-3.5 bg-white/5 border border-white/8 rounded-2xl hover:bg-white/10 hover:border-white/15 transition-all duration-300">
              <span class="w-6 h-6 rounded-full bg-accentYellow/10 text-accentYellow flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
              <span class="text-xs font-bold text-white/95">Speak with Our Loan Experts</span>
            </div>
            <div class="flex items-center gap-3 p-3.5 bg-white/5 border border-white/8 rounded-2xl hover:bg-white/10 hover:border-white/15 transition-all duration-300">
              <span class="w-6 h-6 rounded-full bg-accentYellow/10 text-accentYellow flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
              <span class="text-xs font-bold text-white/95">Request a Free Callback</span>
            </div>
          </div>

          <p class="text-[11px] text-slate-400 font-medium italic leading-relaxed text-left border-l-2 border-accentYellow/30 pl-3">
            Take the next step towards your financial goals with confidence. Let AavivaCred help you find the right financing solution for your needs.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>
