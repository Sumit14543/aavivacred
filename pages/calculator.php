<?php
$page_title = "Interactive Loan & Eligibility Calculator Suite | AavivaCred";
include '../includes/header.php';
?>

<!-- Full Width Hero Banner with Frosted Glass Overlay -->
<div class="w-full h-[280px] sm:h-[360px] md:h-[460px] relative overflow-hidden flex items-center justify-center text-center">
  <!-- Realistic Stock Banner Background Image -->
  <img src="<?php echo PATH_PREFIX; ?>assets/images/about_finance_banner.png" alt="Loan Calculator AavivaCred" class="absolute inset-0 w-full h-full object-cover object-[center_55%]">
  
  <!-- Deep Blue Semi-Transparent Mask for High Contrast -->
  <div class="absolute inset-0 bg-[#021435]/75 backdrop-blur-[1.5px] z-10"></div>
  
  <!-- Content overlay -->
  <div class="container mx-auto px-4 max-w-4xl relative z-20 text-white space-y-4 sm:space-y-6 pt-16">
    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 text-accentYellow text-xs font-bold border border-white/10 backdrop-blur-md shadow-sm mx-auto uppercase tracking-widest">
      <i data-lucide="calculator" class="w-4 h-4 text-accentYellow"></i> Financial Toolkit
    </div>
    
    <h1 class="font-display text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white drop-shadow-md">
      Interactive Loan Calculators
    </h1>
    
    <p class="text-slate-200 text-sm sm:text-base md:text-lg max-w-2xl mx-auto font-medium drop-shadow-sm leading-relaxed">
      Estimate your monthly repayments and check your estimated loan eligibility instantly
    </p>

    <!-- Breadcrumb -->
    <div class="flex items-center justify-center gap-2 text-xs font-bold text-white/60">
      <a href="<?php echo PATH_PREFIX; ?>index.php" class="hover:text-accentYellow transition-colors">Home</a>
      <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
      <span class="text-accentYellow">Loan Calculator</span>
    </div>
  </div>
</div>

<!-- Dedicated Sourcing Calculator Section -->
<section class="py-16 md:py-24 bg-gradient-to-b from-[#f8fafc] via-white to-[#f8fafc] relative overflow-hidden z-10 border-b border-slate-200/60 bg-grid">
  <!-- Glowing Background Mesh Blobs -->
  <div class="absolute left-[-15%] top-[10%] w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl pointer-events-none z-0"></div>
  <div class="absolute right-[-15%] bottom-[10%] w-[600px] h-[600px] bg-teal-400/3 rounded-full blur-3xl pointer-events-none z-0"></div>

  <div class="container mx-auto px-4 lg:px-8 max-w-6xl relative z-10">
    
    <!-- Main Tool Selector Tabs (Sliding Pill Design) -->
    <div class="flex items-center justify-center max-w-lg mx-auto bg-slate-100 border border-slate-200/60 p-1.5 rounded-2xl shadow-sm mb-16 reveal-on-scroll">
      <button onclick="switchMainTab('repayment')" id="main-tab-repayment" class="w-1/2 py-3.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all duration-300 flex items-center justify-center gap-2 bg-primary text-white shadow-md focus:outline-none">
        <i data-lucide="calculator" class="w-4 h-4"></i> EMI Repayment Calculator
      </button>
      <button onclick="switchMainTab('eligibility')" id="main-tab-eligibility" class="w-1/2 py-3.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all duration-300 flex items-center justify-center gap-2 text-slate-500 hover:text-slate-800 focus:outline-none">
        <i data-lucide="award" class="w-4 h-4"></i> Loan Eligibility Calculator
      </button>
    </div>

    <!-- TAB 1: EMI REPAYMENT WORKSPACE -->
    <div id="workspace-repayment" class="space-y-16">
      
      <!-- Page Header -->
      <div class="text-center max-w-4xl mx-auto reveal-on-scroll mb-12">
        <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-primary/10 px-3.5 py-1.5 rounded-full">Repayment Planner</span>
        <h2 class="font-display text-2.5xl sm:text-3.5xl font-black text-darkBlue mt-4 leading-tight">
          EMI Calculator – Plan Your Loan Repayments with Confidence
        </h2>
        <p class="text-slate-500 text-sm sm:text-base font-bold mt-2">
          Estimate Your Monthly EMI Before You Apply for a Loan
        </p>
        <div class="text-slate-600 text-xs sm:text-sm font-semibold leading-relaxed space-y-4 mt-6 max-w-3xl mx-auto text-left md:text-center">
          <p class="text-slate-900 text-sm sm:text-base font-extrabold leading-relaxed border-l-4 border-primary pl-4 md:border-l-0 md:pl-0">
            Whether you're planning to apply for a Personal Loan, Business Loan, Home Loan, Gold Loan, or an EDI Loan, understanding your monthly repayment is one of the most important steps before borrowing.
          </p>
          <p>
            Knowing your estimated Equated Monthly Instalment (EMI) in advance helps you choose a loan amount and repayment tenure that fits comfortably within your monthly budget.
          </p>
        </div>
        
        <!-- Disclaimer Box -->
        <div class="bg-amber-50/70 border border-amber-200/80 rounded-2xl p-5 text-left text-xs text-amber-900 max-w-3xl mx-auto mt-6 flex gap-3 shadow-sm">
          <i data-lucide="alert-triangle" class="w-5 h-5 shrink-0 text-amber-600"></i>
          <p class="font-semibold leading-relaxed">
            <strong>Disclaimer:</strong> EMI calculations are indicative only. The final EMI, interest rate, processing fee, repayment tenure, and loan amount are determined by the respective lending partner after evaluating your eligibility.
          </p>
        </div>
      </div>

      <!-- Mode Selector (EMI vs EDI vs Payday) -->
      <div class="flex items-center justify-center max-w-md mx-auto bg-slate-100 p-1.5 rounded-xl shadow-inner border border-slate-200/40 mb-12 reveal-on-scroll">
        <button onclick="switchMode('emi')" id="tab-emi" class="w-1/3 py-2.5 rounded-lg text-xs font-extrabold transition-all flex items-center justify-center gap-1.5 bg-primary text-white shadow-sm focus:outline-none">
          <i data-lucide="calendar" class="w-3.5 h-3.5"></i> Standard EMI
        </button>
        <button onclick="switchMode('edi')" id="tab-edi" class="w-1/3 py-2.5 rounded-lg text-xs font-extrabold transition-all flex items-center justify-center gap-1.5 text-slate-500 hover:text-slate-800 focus:outline-none">
          <i data-lucide="coins" class="w-3.5 h-3.5"></i> Daily EDI
        </button>
        <button onclick="switchMode('payday')" id="tab-payday" class="w-1/3 py-2.5 rounded-lg text-xs font-extrabold transition-all flex items-center justify-center gap-1.5 text-slate-500 hover:text-slate-800 focus:outline-none">
          <i data-lucide="wallet" class="w-3.5 h-3.5"></i> Payday Advance
        </button>
      </div>

      <!-- Main Calculator Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch reveal-on-scroll">
        
        <!-- Left Column: Inputs (7 Cols) -->
        <div class="lg:col-span-7 bg-white border border-slate-200/70 rounded-3xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 flex flex-col justify-between h-full">
          
          <!-- Standard EMI Inputs -->
          <div id="inputs-emi" class="calculator-inputs space-y-6">
            <h3 class="font-display font-extrabold text-slate-800 text-base flex items-center gap-2 border-b border-slate-100 pb-3">
              <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="calculator" class="w-4 h-4"></i></span>
              Monthly EMI Parameters
            </h3>
            
            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Loan Amount (₹)</label>
                <input type="number" id="emi-amount-box" class="input-val-box w-28 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="500000" min="10000" max="10000000" />
              </div>
              <input type="range" id="emi-amount-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="10000" max="10000000" step="10000" value="500000" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>₹10,000</span>
                <span>₹1 Crore</span>
              </div>
            </div>

            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Annual Interest Rate (% p.a.)</label>
                <input type="number" id="emi-rate-box" class="input-val-box w-20 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="12.00" min="5" max="25" step="0.01" />
              </div>
              <input type="range" id="emi-rate-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="5" max="25" step="0.1" value="12.00" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>5% p.a.</span>
                <span>25% p.a.</span>
              </div>
            </div>

            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Repayment Tenure (Months)</label>
                <input type="number" id="emi-months-box" class="input-val-box w-20 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="60" min="12" max="360" />
              </div>
              <input type="range" id="emi-months-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="12" max="360" step="1" value="60" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>12 Months (1 Yr)</span>
                <span>360 Months (30 Yrs)</span>
              </div>
            </div>
          </div>

          <!-- Daily EDI Inputs -->
          <div id="inputs-edi" class="calculator-inputs space-y-6 hidden">
            <h3 class="font-display font-extrabold text-slate-800 text-base flex items-center gap-2 border-b border-slate-100 pb-3">
              <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="coins" class="w-4 h-4"></i></span>
              Daily EDI Parameters
            </h3>
            
            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Loan Amount (₹)</label>
                <input type="number" id="edi-amount-box" class="input-val-box w-28 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="200000" min="10000" max="5000000" />
              </div>
              <input type="range" id="edi-amount-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="10000" max="5000000" step="10000" value="200000" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>₹10,000</span>
                <span>₹50 Lakhs</span>
              </div>
            </div>

            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Annual Interest Rate (% p.a.)</label>
                <input type="number" id="edi-rate-box" class="input-val-box w-20 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="12.00" min="6" max="25" step="0.01" />
              </div>
              <input type="range" id="edi-rate-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="6" max="25" step="0.1" value="12.00" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>6% p.a.</span>
                <span>25% p.a.</span>
              </div>
            </div>

            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Repayment Tenure (Days)</label>
                <input type="number" id="edi-days-box" class="input-val-box w-20 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="180" min="30" max="365" />
              </div>
              <input type="range" id="edi-days-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="30" max="365" step="1" value="180" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>30 Days</span>
                <span>365 Days (1 Yr)</span>
              </div>
            </div>
          </div>

          <!-- Payday Advance Inputs -->
          <div id="inputs-payday" class="calculator-inputs space-y-6 hidden">
            <h3 class="font-display font-extrabold text-slate-800 text-base flex items-center gap-2 border-b border-slate-100 pb-3">
              <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="clock" class="w-4 h-4"></i></span>
              Short-Term Salary Advance Parameters
            </h3>
            
            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Advance Amount (₹)</label>
                <input type="number" id="payday-amount-box" class="input-val-box w-28 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="30000" min="5000" max="200000" />
              </div>
              <input type="range" id="payday-amount-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="5000" max="200000" step="5000" value="30000" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>₹5,000</span>
                <span>₹2,00,000</span>
              </div>
            </div>

            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Flat Monthly Interest Rate (% per month)</label>
                <input type="number" id="payday-rate-box" class="input-val-box w-20 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="1.5" min="1.0" max="5.0" step="0.1" />
              </div>
              <input type="range" id="payday-rate-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="1.0" max="5.0" step="0.1" value="1.5" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>1.0% per month</span>
                <span>5.0% per month</span>
              </div>
            </div>

            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Advance Tenure (Days)</label>
                <input type="number" id="payday-days-box" class="input-val-box w-20 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="30" min="30" max="180" />
              </div>
              <input type="range" id="payday-days-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="30" max="180" step="15" value="30" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>30 Days</span>
                <span>180 Days</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column: Outputs Card (5 Cols) -->
        <div class="lg:col-span-5 bg-gradient-to-br from-[#021435] via-[#05295c] to-[#021435] text-white rounded-3xl overflow-hidden flex flex-col justify-between min-h-[500px] relative shadow-xl">
          <div class="absolute inset-0 bg-grid opacity-[0.03] pointer-events-none"></div>
          
          <div class="relative z-10 p-6 sm:p-8 space-y-6">
            <h3 class="font-display font-extrabold text-slate-300 text-xs uppercase tracking-widest text-left">Calculation Summary</h3>
            
            <div class="bg-white/5 rounded-2xl p-5 border border-white/10 flex justify-between items-center text-left backdrop-blur-md">
              <div>
                <p id="output-payment-lbl" class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Monthly Installment (EMI)</p>
                <p id="output-payment-val" class="text-3xl font-display font-black text-accentYellow mt-1">₹0</p>
              </div>
              <span class="w-12 h-12 rounded-xl bg-accentYellow/10 text-accentYellow flex items-center justify-center shrink-0 border border-accentYellow/20"><i data-lucide="banknote" class="w-6 h-6"></i></span>
            </div>

            <!-- SVG Donut Chart -->
            <div class="relative w-44 h-44 flex items-center justify-center shrink-0 mx-auto">
              <svg class="w-full h-full" viewBox="0 0 100 100">
                <g transform="rotate(-90 50 50)">
                  <circle cx="50" cy="50" r="32" stroke="#0e2f66" stroke-width="7.5" fill="transparent" />
                  <circle id="donut-interest" cx="50" cy="50" r="32" stroke="#ffd30f" stroke-width="7.5" fill="transparent" 
                          stroke-dasharray="201.06" stroke-dashoffset="201.06" stroke-linecap="round" class="transition-all duration-500" />
                </g>
              </svg>
              
              <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-4">
                <p class="text-[9px] font-medium text-slate-400 leading-normal">Total Amount Payable</p>
                <p id="total-amount-display" class="text-base font-black text-white font-mono mt-0.5 tracking-tight">₹0</p>
              </div>
            </div>

            <!-- Visual bullet progress bars breakdown -->
            <div class="space-y-4 text-xs font-semibold">
              <!-- Principal breakdown -->
              <div class="space-y-1.5">
                <div class="flex justify-between items-center text-left">
                  <span class="inline-flex items-center gap-2 text-slate-300 text-[10px] font-bold uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-primary border border-white/10"></span> Principal Amount
                  </span>
                  <span id="breakdown-principal" class="text-white font-black font-mono">₹0</span>
                </div>
                <div class="w-full h-2 bg-white/10 rounded-full overflow-hidden">
                  <div id="bar-principal" class="h-full bg-primary rounded-full transition-all duration-500" style="width: 0%"></div>
                </div>
              </div>
              
              <!-- Interest breakdown -->
              <div class="space-y-1.5">
                <div class="flex justify-between items-center text-left">
                  <span class="inline-flex items-center gap-2 text-slate-300 text-[10px] font-bold uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-accentYellow border border-white/10"></span> Interest Charges
                  </span>
                  <span id="breakdown-interest" class="text-accentYellow font-black font-mono">₹0</span>
                </div>
                <div class="w-full h-2 bg-white/10 rounded-full overflow-hidden">
                  <div id="bar-interest" class="h-full bg-accentYellow rounded-full transition-all duration-500" style="width: 0%"></div>
                </div>
              </div>
              
              <div class="flex justify-between border-t border-white/10 pt-3 text-left">
                <span class="text-slate-400 text-[10px] font-bold uppercase tracking-wider">Repayment Tenure</span>
                <span id="breakdown-tenure" class="text-white font-black font-mono">0 Months</span>
              </div>
            </div>
          </div>

          <!-- Bottom Segmented Breakdown (EMI Rates) -->
          <div class="border-t border-white/10 overflow-hidden">
            <div class="bg-white/5 py-3 px-4 flex border-b border-white/5">
              <div id="lbl-period-1" class="w-1/3 text-center text-[9px] text-slate-300 font-bold uppercase tracking-wider">Monthly EMI</div>
              <div id="lbl-period-2" class="w-1/3 text-center text-[9px] text-slate-300 font-bold uppercase tracking-wider border-x border-white/10">Quarterly EMI</div>
              <div id="lbl-period-3" class="w-1/3 text-center text-[9px] text-slate-300 font-bold uppercase tracking-wider">Yearly EMI</div>
            </div>
            <div class="bg-white/10 py-4 px-2 flex items-center justify-around text-center backdrop-blur-md">
              <div id="val-period-1" class="w-1/3 text-sm font-black text-white font-mono">₹0.00</div>
              <div id="val-period-2" class="w-1/3 text-sm font-black text-white font-mono border-x border-white/10">₹0.00</div>
              <div id="val-period-3" class="w-1/3 text-sm font-black text-white font-mono">₹0.00</div>
            </div>
            <div class="p-5 bg-white/5 flex flex-col gap-3">
              <a id="calculator-cta-btn" href="apply.php" class="w-full bg-accentYellow hover:bg-[#ebd000] text-darkBlue hover:text-[#01091a] py-3.5 px-6 rounded-xl font-extrabold text-sm flex items-center justify-center gap-2 shadow-lg active:scale-[0.98] transition-all duration-300">
                Check Pre-Approved Offers <i data-lucide="arrow-right" class="w-4 h-4"></i>
              </a>
            </div>
          </div>
        </div>

      </div>

      <!-- EMI INFORMATIONAL SECTIONS (VERBATIM COPY) -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
        
        <!-- What Is an EMI? -->
        <div class="bg-white border border-slate-200/60 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 space-y-4">
          <h2 class="font-display text-xl font-bold text-darkBlue flex items-center gap-2">
            <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="help-circle" class="w-4.5 h-4.5"></i></span>
            What Is an EMI?
          </h2>
          <div class="text-slate-600 text-xs sm:text-sm font-medium leading-relaxed space-y-3">
            <p>
              An Equated Monthly Instalment (EMI) is the fixed amount a borrower pays every month towards repaying a loan. Each EMI consists of two components:
            </p>
            <ul class="space-y-2 border-l border-slate-100 pl-4 py-1 font-bold text-slate-800">
              <li><strong class="text-slate-800">Principal Amount</strong> – The original loan amount borrowed.</li>
              <li><strong class="text-slate-800">Interest Amount</strong> – The cost charged by the lender for providing the loan.</li>
            </ul>
            <p>
              As the loan progresses, the proportion of principal and interest in each EMI changes. During the initial months, a larger portion of the EMI generally goes towards interest. Over time, a greater share of each EMI contributes towards reducing the principal balance.
            </p>
          </div>
        </div>

        <!-- Information Required to Calculate EMI -->
        <div class="bg-white border border-slate-200/60 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 space-y-4">
          <h2 class="font-display text-xl font-bold text-darkBlue flex items-center gap-2">
            <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="file-text" class="w-4.5 h-4.5"></i></span>
            Information Required to Calculate EMI
          </h2>
          <div class="text-slate-600 text-xs sm:text-sm font-medium leading-relaxed space-y-4">
            <p>To calculate an estimated EMI, you typically need three inputs:</p>
            <div class="space-y-3 font-semibold">
              <div>
                <h4 class="font-extrabold text-slate-800 text-xs uppercase tracking-wider mb-0.5">Loan Amount</h4>
                <p>The total amount you plan to borrow from the lending partner.</p>
              </div>
              <div>
                <h4 class="font-extrabold text-slate-800 text-xs uppercase tracking-wider mb-0.5">Interest Rate</h4>
                <p>The annual interest rate applicable to your loan. This varies depending on the lender's assessment, loan type, and prevailing policies.</p>
              </div>
              <div>
                <h4 class="font-extrabold text-slate-800 text-xs uppercase tracking-wider mb-0.5">Loan Tenure</h4>
                <p>The repayment period over which you plan to repay the loan.</p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Why Use an EMI Calculator? & Benefits Stack -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 text-left">
        
        <!-- Why Use an EMI Calculator? -->
        <div class="lg:col-span-7 bg-white border border-slate-200/60 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 space-y-6">
          <div>
            <h2 class="font-display text-xl font-bold text-darkBlue mb-2">Why Use an EMI Calculator?</h2>
            <p class="text-slate-550 text-xs font-semibold">Before accepting any loan offer, it's important to know how the repayment will impact your monthly finances.</p>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-xs font-semibold text-slate-650">
            <div class="space-y-1">
              <h4 class="font-extrabold text-slate-850">Plan Your Monthly Budget</h4>
              <p class="text-slate-555 font-medium">Estimate your monthly repayment and check whether it fits comfortably within your income.</p>
            </div>
            <div class="space-y-1">
              <h4 class="font-extrabold text-slate-855">Compare Loan Scenarios</h4>
              <p class="text-slate-555 font-medium">Adjust the loan amount or repayment tenure to understand how different combinations affect your EMI.</p>
            </div>
            <div class="space-y-1">
              <h4 class="font-extrabold text-slate-855">Understand the Cost of Borrowing</h4>
              <p class="text-slate-555 font-medium">An EMI Calculator helps you estimate the total repayment amount, making it easier to evaluate different loan options.</p>
            </div>
            <div class="space-y-1">
              <h4 class="font-extrabold text-slate-855">Make Better Financial Decisions</h4>
              <p class="text-slate-555 font-medium">Instead of relying on assumptions, borrowers can make informed decisions based on estimated repayment figures.</p>
            </div>
            <div class="space-y-1 sm:col-span-2">
              <h4 class="font-extrabold text-slate-855">Save Time</h4>
              <p class="text-slate-555 font-medium">The calculator provides instant estimates without requiring manual calculations.</p>
            </div>
          </div>
        </div>

        <!-- Benefits of Planning Your EMI in Advance -->
        <div class="lg:col-span-5 bg-gradient-to-br from-[#021435] to-[#010b1d] text-white rounded-3xl p-6 md:p-8 shadow-xl space-y-5">
          <div>
            <h2 class="font-display text-xl font-bold text-accentYellow mb-2">Benefits of Planning Your EMI in Advance</h2>
            <p class="text-slate-300 text-xs font-medium">Borrowing becomes more manageable when repayment is planned carefully. An EMI Calculator helps you:</p>
          </div>
          <ul class="space-y-3.5 text-xs font-bold text-slate-200">
            <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0 mt-1.5"></span><span>Avoid borrowing beyond your repayment capacity.</span></li>
            <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0 mt-1.5"></span><span>Select a suitable repayment tenure.</span></li>
            <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0 mt-1.5"></span><span>Estimate your monthly financial commitment.</span></li>
            <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0 mt-1.5"></span><span>Compare multiple loan options.</span></li>
            <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0 mt-1.5"></span><span>Prepare for future financial obligations.</span></li>
            <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-accentYellow shrink-0 mt-1.5"></span><span>Support responsible borrowing decisions.</span></li>
          </ul>
        </div>

      </div>

      <!-- Formula & Calculation Example -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 text-left">
        
        <!-- EMI Calculator Formula -->
        <div class="lg:col-span-6 bg-white border border-slate-200/60 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 space-y-5 flex flex-col justify-between">
          <div class="space-y-3">
            <h2 class="font-display text-xl font-bold text-darkBlue flex items-center gap-2">
              <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="percent" class="w-4.5 h-4.5"></i></span>
              EMI Calculator Formula
            </h2>
            <p class="text-slate-500 text-xs font-semibold leading-relaxed">
              The standard EMI calculation formula is:
            </p>
            <div class="bg-slate-50 border border-slate-200/50 rounded-xl p-4 text-center font-mono font-black text-sm sm:text-base text-darkBlue my-3 shadow-inner select-all">
              EMI = P &times; R &times; (1 + R)^N &divide; [(1 + R)^N &minus; 1]
            </div>
            <p class="text-slate-500 text-xs font-semibold leading-relaxed">Where:</p>
            <div class="border border-slate-100 rounded-xl overflow-hidden bg-white shadow-sm">
              <table class="w-full text-left text-xs font-semibold border-collapse">
                <thead>
                  <tr class="bg-slate-50 border-b border-slate-100 text-[10px] text-slate-400 font-bold uppercase tracking-wider">
                    <th class="p-3">Symbol</th>
                    <th class="p-3">Meaning</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                  <tr><td class="p-3 font-bold text-darkBlue">P</td><td class="p-3">Loan Amount</td></tr>
                  <tr><td class="p-3 font-bold text-darkBlue">R</td><td class="p-3">Monthly Interest Rate</td></tr>
                  <tr><td class="p-3 font-bold text-darkBlue">N</td><td class="p-3">Total Number of Monthly Instalments</td></tr>
                </tbody>
              </table>
            </div>
          </div>
          <p class="text-slate-400 text-[11px] font-semibold italic mt-4">
            Although the formula looks complex, an online EMI Calculator performs these calculations instantly, allowing borrowers to focus on planning rather than mathematics.
          </p>
        </div>

        <!-- EMI Calculation Example -->
        <div class="lg:col-span-6 bg-white border border-slate-200/60 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 space-y-5 flex flex-col justify-between">
          <div class="space-y-4">
            <h2 class="font-display text-xl font-bold text-darkBlue flex items-center gap-2">
              <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="bar-chart-2" class="w-4.5 h-4.5"></i></span>
              EMI Calculation Example
            </h2>
            <p class="text-slate-500 text-xs font-semibold leading-relaxed">
              The following example is for illustration purposes only.
            </p>
            <div class="border border-slate-100 rounded-2xl overflow-hidden bg-white shadow-sm">
              <table class="w-full text-left text-xs font-semibold border-collapse">
                <thead>
                  <tr class="bg-darkBlue text-white text-[10px] font-bold uppercase tracking-wider">
                    <th class="p-4">Parameter</th>
                    <th class="p-4">Value</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                  <tr><td class="p-4 font-bold text-darkBlue">Loan Amount</td><td class="p-4 font-mono">₹5,00,000</td></tr>
                  <tr><td class="p-4 font-bold text-darkBlue">Interest Rate</td><td class="p-4">12% p.a.</td></tr>
                  <tr><td class="p-4 font-bold text-darkBlue">Tenure</td><td class="p-4">5 Years</td></tr>
                  <tr class="bg-primary/5 text-primary"><td class="p-4 font-black">Estimated EMI*</td><td class="p-4 font-mono font-black text-sm text-primary">Approx. ₹11,122</td></tr>
                </tbody>
              </table>
            </div>
          </div>
          <p class="text-[10px] text-slate-400 font-bold italic leading-relaxed">
            *Illustrative example only. Actual EMI may differ depending on the final loan terms offered by the lending partner.
          </p>
        </div>

      </div>

      <!-- Loans You Can Estimate Using Our EMI Calculator -->
      <div class="bg-white border border-slate-200/60 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 space-y-6 text-left">
        <h2 class="font-display text-xl font-bold text-darkBlue">Loans You Can Estimate Using Our EMI Calculator</h2>
        <p class="text-slate-500 text-xs font-semibold">Our calculator can help you estimate repayments for different types of loans, including:</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="p-5 bg-slate-50 border border-slate-200/40 rounded-2xl space-y-2">
            <h4 class="font-display font-extrabold text-sm text-slate-800">Personal Loan EMI Calculator</h4>
            <p class="text-slate-500 text-xs font-medium leading-relaxed">
              Estimate monthly repayments for medical expenses, education, weddings, travel, home renovation, or other personal financial needs.
            </p>
          </div>
          <div class="p-5 bg-slate-50 border border-slate-200/40 rounded-2xl space-y-2">
            <h4 class="font-display font-extrabold text-sm text-slate-800">Business Loan EMI Calculator</h4>
            <p class="text-slate-500 text-xs font-medium leading-relaxed">
              Calculate estimated EMIs for working capital, business expansion, machinery purchase, inventory financing, and other commercial requirements.
            </p>
          </div>
          <div class="p-5 bg-slate-50 border border-slate-200/40 rounded-2xl space-y-2">
            <h4 class="font-display font-extrabold text-sm text-slate-800">Home Loan EMI Calculator</h4>
            <p class="text-slate-500 text-xs font-medium leading-relaxed">
              Plan long-term repayments for purchasing, constructing, renovating, or extending a residential property.
            </p>
          </div>
          <div class="p-5 bg-slate-50 border border-slate-200/40 rounded-2xl space-y-2">
            <h4 class="font-display font-extrabold text-sm text-slate-800">Gold Loan EMI Calculator</h4>
            <p class="text-slate-500 text-xs font-medium leading-relaxed">
              Estimate repayments for loans secured against eligible gold jewellery, subject to lender products.
            </p>
          </div>
          <div class="p-5 bg-slate-50 border border-slate-200/40 rounded-2xl space-y-2 md:col-span-2 lg:col-span-2">
            <h4 class="font-display font-extrabold text-sm text-slate-800">EDI Loan & Payday Loan Estimation</h4>
            <p class="text-slate-500 text-xs font-medium leading-relaxed">
              Understand estimated repayment obligations for eligible short-term financing solutions before applying.
            </p>
          </div>
        </div>
      </div>

    </div>

    <!-- TAB 2: LOAN ELIGIBILITY WORKSPACE -->
    <div id="workspace-eligibility" class="space-y-16 hidden">
      
      <!-- Page Header -->
      <div class="text-center max-w-4xl mx-auto reveal-on-scroll">
        <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-primary/10 px-3.5 py-1.5 rounded-full">Eligibility Planner</span>
        <h2 class="font-display text-2.5xl sm:text-3.5xl font-black text-darkBlue mt-4 leading-tight">
          Check Your Estimated Loan Eligibility Today
        </h2>
        <p class="text-slate-500 text-sm sm:text-base font-bold mt-2">
          Make Better Borrowing Decisions Before You Apply
        </p>
        <div class="text-slate-600 text-xs sm:text-sm font-semibold leading-relaxed space-y-4 mt-6 max-w-3xl mx-auto text-left md:text-center">
          <p class="text-slate-900 text-sm sm:text-base font-extrabold leading-relaxed border-l-4 border-primary pl-4 md:border-l-0 md:pl-0">
            Understanding your estimated eligibility is the first step towards responsible borrowing. Using the AavivaCred Loan Eligibility Calculator can help you estimate your borrowing capacity before beginning the application process.
          </p>
          <p>
            A loan eligibility calculator provides an estimate based on the information you enter. However, the final lending decision is made after the lending partner evaluates your complete financial profile.
          </p>
        </div>
      </div>

      <!-- Main Calculator Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-stretch reveal-on-scroll">
        
        <!-- Left Column: Inputs Workspace (7 Cols) -->
        <div class="lg:col-span-7 bg-white border border-slate-200/70 rounded-3xl p-6 sm:p-8 space-y-6 flex flex-col justify-between h-full hover:shadow-md transition-shadow duration-300">
          <div class="space-y-6">
            <h3 class="font-display font-extrabold text-slate-800 text-base flex items-center gap-2 border-b border-slate-100 pb-3">
              <span class="w-8 h-8 rounded-lg bg-primary/10 text-primary flex items-center justify-center"><i data-lucide="badge-check" class="w-4.5 h-4.5"></i></span>
              Eligibility Inputs
            </h3>

            <!-- Net Monthly Income -->
            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Net Monthly Income (₹)</label>
                <input type="number" id="eligibility-income-box" class="input-val-box w-28 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="50000" min="10000" max="1000000" />
              </div>
              <input type="range" id="eligibility-income-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="10000" max="1000000" step="5000" value="50000" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>₹10,000</span>
                <span>₹10 Lakhs</span>
              </div>
            </div>

            <!-- Existing Monthly EMIs -->
            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Existing Monthly EMIs (₹)</label>
                <input type="number" id="eligibility-emis-box" class="input-val-box w-28 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="0" min="0" max="500000" />
              </div>
              <input type="range" id="eligibility-emis-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="0" max="500000" step="1000" value="0" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>₹0</span>
                <span>₹5 Lakhs</span>
              </div>
            </div>

            <!-- Interest Rate -->
            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Expected Interest Rate (% p.a.)</label>
                <input type="number" id="eligibility-rate-box" class="input-val-box w-20 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="12.0" min="5" max="25" step="0.1" />
              </div>
              <input type="range" id="eligibility-rate-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="5" max="25" step="0.1" value="12.0" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>5% p.a.</span>
                <span>25% p.a.</span>
              </div>
            </div>

            <!-- Preferred Tenure -->
            <div class="space-y-3 text-left">
              <div class="flex justify-between items-center">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Preferred Tenure (Months)</label>
                <input type="number" id="eligibility-tenure-box" class="input-val-box w-20 text-right bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-xs font-black text-slate-800 focus:outline-none focus:border-primary focus:bg-white focus:ring-2 focus:ring-primary/10 transition-all" value="60" min="12" max="360" />
              </div>
              <input type="range" id="eligibility-tenure-slider" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-[#053d60] transition-all" min="12" max="360" step="12" value="60" />
              <div class="flex justify-between text-[9px] text-slate-400 font-bold uppercase tracking-wider">
                <span>12 Months</span>
                <span>360 Months (30 Yrs)</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column: Outputs Card (5 Cols) -->
        <div class="lg:col-span-5 bg-gradient-to-br from-[#021435] via-[#05295c] to-[#021435] text-white rounded-3xl overflow-hidden flex flex-col justify-between min-h-[500px] relative shadow-xl">
          <div class="absolute inset-0 bg-grid opacity-[0.03] pointer-events-none"></div>
          
          <div class="relative z-10 p-6 sm:p-8 space-y-6">
            <h3 class="font-display font-extrabold text-slate-300 text-xs uppercase tracking-widest text-left">Eligibility Results</h3>
            
            <div class="bg-white/5 rounded-2xl p-5 border border-white/10 flex justify-between items-center text-left backdrop-blur-md">
              <div>
                <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Estimated Eligible Loan Amount</p>
                <p id="output-eligibility-val" class="text-3xl font-display font-black text-accentYellow mt-1">₹0</p>
              </div>
              <span class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center shrink-0 border border-emerald-500/20"><i data-lucide="shield-check" class="w-6 h-6"></i></span>
            </div>

            <!-- Gauge Meter SVG -->
            <div class="relative w-44 h-44 flex items-center justify-center shrink-0 mx-auto">
              <svg class="w-full h-full" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="40" stroke="#0e2f66" stroke-width="7.5" fill="transparent" />
                <circle id="eligibility-gauge" cx="50" cy="50" r="40" stroke="#10b981" stroke-width="7.5" fill="transparent" 
                        stroke-dasharray="251.2" stroke-dashoffset="251.2" stroke-linecap="round" transform="rotate(-90 50 50)" class="transition-all duration-500" />
              </svg>
              
              <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-4">
                <p class="text-[9px] font-medium text-slate-400 leading-normal">Obligation-to-Income Ratio</p>
                <p id="eligibility-ratio-label" class="text-base font-black text-white font-mono mt-0.5">0%</p>
              </div>
            </div>

            <!-- Parameters breakdown -->
            <div class="space-y-3.5 text-xs font-semibold">
              <div class="flex justify-between border-b border-white/10 pb-2.5 text-left">
                <span class="text-slate-350 text-[10px] font-bold uppercase tracking-wider">Net Monthly Income</span>
                <span id="eligibility-breakdown-income" class="text-white font-extrabold font-mono">₹0</span>
              </div>
              <div class="flex justify-between border-b border-white/10 pb-2.5 text-left">
                <span class="text-slate-350 text-[10px] font-bold uppercase tracking-wider">Existing EMIs</span>
                <span id="eligibility-breakdown-emis" class="text-[#e8414a] font-extrabold font-mono">₹0</span>
              </div>
              <div class="flex justify-between border-b border-white/10 pb-2.5 text-left">
                <span class="text-slate-350 text-[10px] font-bold uppercase tracking-wider">Estimated Eligible EMI</span>
                <span id="eligibility-breakdown-emi" class="text-emerald-400 font-extrabold font-mono">₹0</span>
              </div>
              <div class="flex justify-between text-left">
                <span class="text-slate-350 text-[10px] font-bold uppercase tracking-wider">Preferred Tenure</span>
                <span id="eligibility-breakdown-tenure" class="text-white font-extrabold font-mono">0 Months</span>
              </div>
            </div>
          </div>

          <div class="p-6 sm:p-8 bg-white/5 border-t border-white/10">
            <p class="text-[9px] text-slate-400 font-semibold text-center italic mb-4">
              *Indicative output only. Respective lending partner determines final limits.
            </p>
            <a href="apply.php" class="w-full bg-accentYellow hover:bg-[#ebd000] text-darkBlue hover:text-[#01091a] py-3.5 px-6 rounded-xl font-extrabold text-sm flex items-center justify-center gap-2 shadow-lg active:scale-[0.98] transition-all duration-300">
              Apply Now with Estimated Limits <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
          </div>
        </div>

      </div>

      <!-- Eligibility informational blocks -->
      <div class="bg-white border border-slate-200/60 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 space-y-6 text-left">
        <h2 class="font-display text-2xl font-bold text-darkBlue">Factors That Influence Your Loan Eligibility</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="space-y-2 border-l-2 border-primary/20 pl-4 py-1">
            <h4 class="font-display font-extrabold text-slate-800 text-sm">Monthly Income</h4>
            <p class="text-slate-600 text-xs font-semibold leading-relaxed">
              Your monthly income is one of the most important factors considered during the assessment process. A stable and verifiable income generally demonstrates repayment capacity.
            </p>
          </div>
          <div class="space-y-2 border-l-2 border-primary/20 pl-4 py-1">
            <h4 class="font-display font-extrabold text-slate-800 text-sm">Employment Stability</h4>
            <p class="text-slate-600 text-xs font-semibold leading-relaxed">
              Lenders usually prefer applicants who have a stable employment history or a well-established business to ensure regular repayments.
            </p>
          </div>
          <div class="space-y-2 border-l-2 border-primary/20 pl-4 py-1">
            <h4 class="font-display font-extrabold text-slate-800 text-sm">Existing Obligations</h4>
            <p class="text-slate-600 text-xs font-semibold leading-relaxed">
              Lenders review your existing EMIs. A high existing debt-to-income ratio reduces your available borrowing limit.
            </p>
          </div>
        </div>
      </div>

      <!-- How to Improve & Loan Types split content -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 text-left">
        
        <!-- How to Improve Your Loan Eligibility -->
        <div class="lg:col-span-7 bg-white border border-slate-200/60 rounded-3xl p-6 md:p-8 shadow-sm hover:shadow-md transition-shadow duration-300 space-y-5">
          <h2 class="font-display text-xl font-bold text-darkBlue flex items-center gap-2">
            <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center"><i data-lucide="trending-up" class="w-4.5 h-4.5"></i></span>
            How to Improve Your Loan Eligibility
          </h2>
          <p class="text-slate-500 text-xs font-semibold leading-relaxed">
            Although every application is evaluated independently, there are several practical steps that may strengthen your financial profile:
          </p>
          <div class="space-y-4">
            <div class="flex gap-3">
              <span class="w-6 h-6 bg-slate-100 text-slate-600 rounded-full flex items-center justify-center text-xs font-extrabold shrink-0 mt-0.5">1</span>
              <div>
                <h4 class="font-bold text-slate-800 text-xs uppercase tracking-wider mb-0.5">Maintain a Healthy Credit Profile</h4>
                <p class="text-slate-600 text-xs font-semibold leading-relaxed">Pay EMIs and credit card bills on time. Avoid unnecessary defaults to show credit discipline.</p>
              </div>
            </div>
            <div class="flex gap-3">
              <span class="w-6 h-6 bg-slate-100 text-slate-600 rounded-full flex items-center justify-center text-xs font-extrabold shrink-0 mt-0.5">2</span>
              <div>
                <h4 class="font-bold text-slate-800 text-xs uppercase tracking-wider mb-0.5">Keep Financial Documents Updated</h4>
                <p class="text-slate-600 text-xs font-semibold leading-relaxed">Ensure salary slips, bank statements, and tax returns are organized to prevent processing delays.</p>
              </div>
            </div>
            <div class="flex gap-3">
              <span class="w-6 h-6 bg-slate-100 text-slate-600 rounded-full flex items-center justify-center text-xs font-extrabold shrink-0 mt-0.5">3</span>
              <div>
                <h4 class="font-bold text-slate-800 text-xs uppercase tracking-wider mb-0.5">Reduce Existing Debt</h4>
                <p class="text-slate-600 text-xs font-semibold leading-relaxed">Try to pay off smaller outstanding credit obligations to lower your debt-to-income ratio.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Why Use AavivaCred's Loan Eligibility Calculator? -->
        <div class="lg:col-span-5 bg-gradient-to-br from-[#021435] to-[#010b1d] text-white rounded-3xl p-6 md:p-8 shadow-xl flex flex-col justify-between">
          <div class="space-y-5">
            <h2 class="font-display text-xl font-bold text-accentYellow">Why Use AavivaCred's Loan Eligibility Calculator?</h2>
            <p class="text-slate-300 text-xs font-medium leading-relaxed">
              Our calculator helps you establish clean expectations:
            </p>
            <ul class="space-y-3.5 text-xs font-bold text-slate-200">
              <li class="flex items-center gap-3"><i data-lucide="check-circle" class="w-4 h-4 text-accentYellow shrink-0"></i> <span>Instant Eligibility Estimate</span></li>
              <li class="flex items-center gap-3"><i data-lucide="check-circle" class="w-4 h-4 text-accentYellow shrink-0"></i> <span>Better Financial Planning</span></li>
              <li class="flex items-center gap-3"><i data-lucide="check-circle" class="w-4 h-4 text-accentYellow shrink-0"></i> <span>Helps Compare Loan Scenarios</span></li>
              <li class="flex items-center gap-3"><i data-lucide="check-circle" class="w-4 h-4 text-accentYellow shrink-0"></i> <span>Saves Time</span></li>
            </ul>
          </div>
        </div>

      </div>

      <!-- Loan Eligibility for Different Loan Types -->
      <div class="bg-white border border-slate-200/80 rounded-3xl p-6 md:p-8 shadow-sm space-y-6 text-left">
        <h2 class="font-display text-xl font-bold text-darkBlue">Loan Eligibility for Different Loan Types</h2>
        <p class="text-slate-500 text-xs font-semibold">Every loan product has different assessment parameters.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-3">
            <h4 class="font-display font-extrabold text-sm text-slate-800">Personal Loan Eligibility</h4>
            <p class="text-slate-555 text-xs font-semibold mb-2">Generally assessed based on:</p>
            <ul class="text-[11px] font-bold text-slate-600 space-y-1 border-t border-slate-200/40 pt-2 grid grid-cols-2 gap-1">
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Income</li>
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Employment</li>
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Credit profile</li>
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Existing EMIs</li>
            </ul>
          </div>
          
          <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-3">
            <h4 class="font-display font-extrabold text-sm text-slate-800">Business Loan Eligibility</h4>
            <p class="text-slate-555 text-xs font-semibold mb-2">Business Loans may be evaluated based on:</p>
            <ul class="text-[11px] font-bold text-slate-600 space-y-1 border-t border-slate-200/40 pt-2 grid grid-cols-2 gap-1">
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Business vintage</li>
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Turnover</li>
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Profitability</li>
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> GST registry</li>
            </ul>
          </div>

          <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-3">
            <h4 class="font-display font-extrabold text-sm text-slate-800">Home Loan Eligibility</h4>
            <p class="text-slate-555 text-xs font-semibold mb-2">Home Loan assessment generally includes:</p>
            <ul class="text-[11px] font-bold text-slate-600 space-y-1 border-t border-slate-200/40 pt-2 grid grid-cols-2 gap-1">
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Monthly income</li>
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Liabilities</li>
              <li class="flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Credit history</li>
              <li class="flex items-center gap-1.5 sm:col-span-2"><span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Down payment</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Frequently Asked Questions (FAQ) Section -->
      <div class="bg-white border border-slate-200/60 rounded-3xl p-6 md:p-8 shadow-sm space-y-6 text-left">
        <div class="text-center mb-8">
          <h2 class="font-display text-2xl font-extrabold text-darkBlue mb-2">Frequently Asked Questions</h2>
          <p class="text-slate-500 text-xs font-semibold">Common enquiries regarding our Loan Eligibility Calculator.</p>
        </div>

        <div class="space-y-4 max-w-4xl mx-auto">
          <!-- Q1 -->
          <div class="bg-slate-50/50 hover:bg-slate-50 border border-slate-200/50 rounded-2xl overflow-hidden transition-all duration-300">
            <button onclick="toggleFAQ(1)" class="w-full flex justify-between items-center p-5 text-left text-xs sm:text-sm font-extrabold text-slate-800 focus:outline-none">
              <span>1. What is a Loan Eligibility Calculator?</span>
              <i id="faq-arrow-1" data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform duration-300"></i>
            </button>
            <div id="faq-ans-1" class="hidden p-5 bg-white border-t border-slate-200/40 text-xs sm:text-sm font-medium text-slate-600 leading-relaxed">
              A Loan Eligibility Calculator is an online tool that provides an estimated indication of the loan amount you may qualify for based on details such as income, employment type, existing financial obligations, and repayment capacity.
            </div>
          </div>
          <!-- Q2 -->
          <div class="bg-slate-50/50 hover:bg-slate-50 border border-slate-200/50 rounded-2xl overflow-hidden transition-all duration-300">
            <button onclick="toggleFAQ(2)" class="w-full flex justify-between items-center p-5 text-left text-xs sm:text-sm font-extrabold text-slate-800 focus:outline-none">
              <span>2. Is the result guaranteed?</span>
              <i id="faq-arrow-2" data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform duration-300"></i>
            </button>
            <div id="faq-ans-2" class="hidden p-5 bg-white border-t border-slate-200/40 text-xs sm:text-sm font-medium text-slate-600 leading-relaxed">
              No. The calculator provides an estimate only. Final loan approval and eligibility are determined by the lending partner after reviewing your complete application.
            </div>
          </div>
          <!-- Q3 -->
          <div class="bg-slate-50/50 hover:bg-slate-50 border border-slate-200/50 rounded-2xl overflow-hidden transition-all duration-300">
            <button onclick="toggleFAQ(3)" class="w-full flex justify-between items-center p-5 text-left text-xs sm:text-sm font-extrabold text-slate-800 focus:outline-none">
              <span>3. Does using the calculator affect my credit score?</span>
              <i id="faq-arrow-3" data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform duration-300"></i>
            </button>
            <div id="faq-ans-3" class="hidden p-5 bg-white border-t border-slate-200/40 text-xs sm:text-sm font-medium text-slate-600 leading-relaxed">
              No. Using the calculator is an informational activity and does not impact your credit score.
            </div>
          </div>
          <!-- Q4 -->
          <div class="bg-slate-50/50 hover:bg-slate-50 border border-slate-200/50 rounded-2xl overflow-hidden transition-all duration-300">
            <button onclick="toggleFAQ(4)" class="w-full flex justify-between items-center p-5 text-left text-xs sm:text-sm font-extrabold text-slate-800 focus:outline-none">
              <span>4. Can self-employed applicants use the calculator?</span>
              <i id="faq-arrow-4" data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform duration-300"></i>
            </button>
            <div id="faq-ans-4" class="hidden p-5 bg-white border-t border-slate-200/40 text-xs sm:text-sm font-medium text-slate-600 leading-relaxed">
              Yes. Business owners, freelancers, consultants, and self-employed professionals can use the calculator to obtain an estimated eligibility.
            </div>
          </div>
          <!-- Q5 -->
          <div class="bg-slate-50/50 hover:bg-slate-50 border border-slate-200/50 rounded-2xl overflow-hidden transition-all duration-300">
            <button onclick="toggleFAQ(5)" class="w-full flex justify-between items-center p-5 text-left text-xs sm:text-sm font-extrabold text-slate-800 focus:outline-none">
              <span>5. Is the calculator free?</span>
              <i id="faq-arrow-5" data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform duration-300"></i>
            </button>
            <div id="faq-ans-5" class="hidden p-5 bg-white border-t border-slate-200/40 text-xs sm:text-sm font-medium text-slate-600 leading-relaxed">
              Yes. The AavivaCred Loan Eligibility Calculator is available free of cost.
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- Calculations and Tabs Script -->
<script>
  let activeMainTab = 'repayment';
  let activeMode = 'emi';

  function switchMainTab(tab) {
    activeMainTab = tab;
    
    // Switch styling of the buttons
    const repaymentBtn = document.getElementById('main-tab-repayment');
    const eligibilityBtn = document.getElementById('main-tab-eligibility');
    
    if (tab === 'repayment') {
      repaymentBtn.className = "w-1/2 py-3.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all duration-300 flex items-center justify-center gap-2 bg-primary text-white shadow-md focus:outline-none";
      eligibilityBtn.className = "w-1/2 py-3.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all duration-300 flex items-center justify-center gap-2 text-slate-500 hover:text-slate-800 focus:outline-none";
      
      document.getElementById('workspace-repayment').classList.remove('hidden');
      document.getElementById('workspace-eligibility').classList.add('hidden');
    } else {
      repaymentBtn.className = "w-1/2 py-3.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all duration-300 flex items-center justify-center gap-2 text-slate-500 hover:text-slate-800 focus:outline-none";
      eligibilityBtn.className = "w-1/2 py-3.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all duration-300 flex items-center justify-center gap-2 bg-primary text-white shadow-md focus:outline-none";
      
      document.getElementById('workspace-repayment').classList.add('hidden');
      document.getElementById('workspace-eligibility').classList.remove('hidden');
      updateEligibility();
    }
  }

  function switchMode(mode) {
    activeMode = mode;
    
    // Toggle active tab buttons styling
    const tabs = ['emi', 'edi', 'payday'];
    tabs.forEach(t => {
      const btn = document.getElementById('tab-' + t);
      if (t === mode) {
        btn.className = "w-1/3 py-2.5 rounded-lg text-xs font-extrabold transition-all flex items-center justify-center gap-1.5 bg-primary text-white shadow-sm focus:outline-none";
      } else {
        btn.className = "w-1/3 py-2.5 rounded-lg text-xs font-extrabold transition-all flex items-center justify-center gap-1.5 text-slate-500 hover:text-slate-800 focus:outline-none";
      }
    });

    // Toggle active inputs panels
    document.querySelectorAll('.calculator-inputs').forEach(el => el.classList.add('hidden'));
    document.getElementById('inputs-' + mode).classList.remove('hidden');

    // Run calculations for the new mode
    updateCalculation();
  }

  // Formatting utilities
  const indianFormatter = new Intl.NumberFormat('en-IN', {
    style: 'currency',
    currency: 'INR',
    maximumFractionDigits: 0
  });

  function updateCalculation() {
    let principal = 0;
    let totalInterest = 0;
    let totalRepayment = 0;
    let paymentPerPeriod = 0;
    let tenureText = "";
    let ctaUrl = "apply.php";

    if (activeMode === 'emi') {
      principal = parseFloat(document.getElementById('emi-amount-slider').value);
      const annualRate = parseFloat(document.getElementById('emi-rate-slider').value);
      const months = parseInt(document.getElementById('emi-months-slider').value);

      const monthlyRate = annualRate / 12 / 100;
      
      if (monthlyRate === 0) {
        paymentPerPeriod = principal / months;
      } else {
        paymentPerPeriod = principal * monthlyRate * Math.pow(1 + monthlyRate, months) / (Math.pow(1 + monthlyRate, months) - 1);
      }

      totalRepayment = paymentPerPeriod * months;
      totalInterest = totalRepayment - principal;
      tenureText = months + " Months";
      ctaUrl = "apply.php?type=personal";

      document.getElementById('output-payment-lbl').innerText = "Monthly Installment (EMI)";
      document.getElementById('output-payment-val').innerText = indianFormatter.format(paymentPerPeriod);

      // Bottom Segmented table updates
      document.getElementById('lbl-period-1').innerText = "Monthly EMI";
      document.getElementById('lbl-period-2').innerText = "Quarterly EMI";
      document.getElementById('lbl-period-3').innerText = "Yearly EMI";
      
      document.getElementById('val-period-1').innerText = indianFormatter.format(paymentPerPeriod);
      document.getElementById('val-period-2').innerText = indianFormatter.format(paymentPerPeriod * 3);
      document.getElementById('val-period-3').innerText = indianFormatter.format(paymentPerPeriod * 12);

    } else if (activeMode === 'edi') {
      principal = parseFloat(document.getElementById('edi-amount-slider').value);
      const annualRate = parseFloat(document.getElementById('edi-rate-slider').value);
      const days = parseInt(document.getElementById('edi-days-slider').value);

      totalInterest = principal * (annualRate / 100) * (days / 365);
      totalRepayment = principal + totalInterest;
      paymentPerPeriod = totalRepayment / days;
      tenureText = days + " Days";
      ctaUrl = "apply.php?type=edi";

      document.getElementById('output-payment-lbl').innerText = "Equated Daily Installment (EDI)";
      document.getElementById('output-payment-val').innerText = indianFormatter.format(paymentPerPeriod);

      // Bottom Segmented table updates
      document.getElementById('lbl-period-1').innerText = "Daily EDI";
      document.getElementById('lbl-period-2').innerText = "Weekly EDI";
      document.getElementById('lbl-period-3').innerText = "Monthly EDI";
      
      document.getElementById('val-period-1').innerText = indianFormatter.format(paymentPerPeriod);
      document.getElementById('val-period-2').innerText = indianFormatter.format(paymentPerPeriod * 7);
      document.getElementById('val-period-3').innerText = indianFormatter.format(paymentPerPeriod * 30);

    } else if (activeMode === 'payday') {
      principal = parseFloat(document.getElementById('payday-amount-slider').value);
      const flatMonthlyRate = parseFloat(document.getElementById('payday-rate-slider').value);
      const days = parseInt(document.getElementById('payday-days-slider').value);

      const months = days / 30;
      totalInterest = principal * (flatMonthlyRate / 100) * months;
      totalRepayment = principal + totalInterest;
      paymentPerPeriod = totalRepayment; // lump-sum repayment on payday
      tenureText = days + " Days";
      ctaUrl = "apply.php?type=payday";

      document.getElementById('output-payment-lbl').innerText = "Lump-Sum Repayment";
      document.getElementById('output-payment-val').innerText = indianFormatter.format(paymentPerPeriod);

      // Bottom Segmented table updates
      document.getElementById('lbl-period-1').innerText = "Flat Interest";
      document.getElementById('lbl-period-2').innerText = "Principal";
      document.getElementById('lbl-period-3').innerText = "Total Payable";
      
      document.getElementById('val-period-1').innerText = indianFormatter.format(totalInterest);
      document.getElementById('val-period-2').innerText = indianFormatter.format(principal);
      document.getElementById('val-period-3').innerText = indianFormatter.format(totalRepayment);
    }

    // Set results parameters
    document.getElementById('breakdown-principal').innerText = indianFormatter.format(principal);
    document.getElementById('breakdown-interest').innerText = indianFormatter.format(totalInterest);
    document.getElementById('breakdown-tenure').innerText = tenureText;
    document.getElementById('calculator-cta-btn').href = ctaUrl;
    document.getElementById('total-amount-display').innerText = indianFormatter.format(totalRepayment);

    // Update progress bars
    const principalPct = totalRepayment > 0 ? Math.round((principal / totalRepayment) * 100) : 0;
    const interestPct = totalRepayment > 0 ? Math.round((totalInterest / totalRepayment) * 100) : 0;
    const barPrincipal = document.getElementById('bar-principal');
    const barInterest = document.getElementById('bar-interest');
    if (barPrincipal) barPrincipal.style.width = principalPct + '%';
    if (barInterest) barInterest.style.width = interestPct + '%';

    // SVG Donut calculation: Circumference = 201.06
    const circumference = 201.06;
    const interestRatio = totalRepayment > 0 ? (totalInterest / totalRepayment) : 0;
    const interestOffset = circumference * (1 - interestRatio);
    
    const donutInterest = document.getElementById('donut-interest');
    if (donutInterest) {
      donutInterest.style.strokeDashoffset = interestOffset;
    }
  }

  function updateEligibility() {
    const income = parseFloat(document.getElementById('eligibility-income-slider').value);
    const emis = parseFloat(document.getElementById('eligibility-emis-slider').value);
    const annualRate = parseFloat(document.getElementById('eligibility-rate-slider').value);
    const months = parseInt(document.getElementById('eligibility-tenure-slider').value);

    // Assume FOIR (Fixed Obligation to Income Ratio) of 50%
    const foir = 0.50;
    const maxEligibleEmi = (income * foir) - emis;

    let eligibleLoanAmount = 0;
    let expectedEmi = 0;

    if (maxEligibleEmi > 0) {
      const monthlyRate = annualRate / 12 / 100;
      if (monthlyRate === 0) {
        eligibleLoanAmount = maxEligibleEmi * months;
      } else {
        eligibleLoanAmount = maxEligibleEmi * (1 - Math.pow(1 + monthlyRate, -months)) / monthlyRate;
      }
      expectedEmi = maxEligibleEmi;
    } else {
      eligibleLoanAmount = 0;
      expectedEmi = 0;
    }

    // Display results
    document.getElementById('output-eligibility-val').innerText = indianFormatter.format(eligibleLoanAmount);
    document.getElementById('eligibility-breakdown-income').innerText = indianFormatter.format(income);
    document.getElementById('eligibility-breakdown-emis').innerText = indianFormatter.format(emis);
    document.getElementById('eligibility-breakdown-emi').innerText = indianFormatter.format(expectedEmi);
    document.getElementById('eligibility-breakdown-tenure').innerText = months + " Months (" + Math.round(months/12) + " Yrs)";

    // Update gauge chart
    const totalObligations = emis + expectedEmi;
    const ratio = income > 0 ? Math.round((totalObligations / income) * 100) : 0;
    
    document.getElementById('eligibility-ratio-label').innerText = ratio + "%";
    
    const gaugeCircle = document.getElementById('eligibility-gauge');
    if (gaugeCircle) {
      const circumference = 251.2; // 2 * pi * 40
      const pct = Math.min(ratio, 100);
      const offset = circumference * (1 - pct / 100);
      gaugeCircle.style.strokeDashoffset = offset;
      
      // Color coding safety level
      if (pct > 70) {
        gaugeCircle.setAttribute('stroke', '#ef4444'); // Red / Critical risk
      } else if (pct > 40) {
        gaugeCircle.setAttribute('stroke', '#ffd30f'); // Yellow / Moderate
      } else {
        gaugeCircle.setAttribute('stroke', '#10b981'); // Green / Healthy
      }
    }
  }

  // Connect Sliders and Inputs Box Sync
  function connectInputs(mode, paramName, callback) {
    const slider = document.getElementById(mode + '-' + paramName + '-slider');
    const box = document.getElementById(mode + '-' + paramName + '-box');

    if (!slider || !box) return;

    slider.addEventListener('input', () => {
      box.value = slider.value;
      callback();
    });

    box.addEventListener('change', () => {
      let val = parseFloat(box.value);
      const min = parseFloat(slider.min);
      const max = parseFloat(slider.max);
      
      if (isNaN(val)) val = min;
      if (val < min) val = min;
      if (val > max) val = max;
      
      box.value = val;
      slider.value = val;
      callback();
    });
  }

  // FAQ Accordion toggles
  function toggleFAQ(idx) {
    const ans = document.getElementById('faq-ans-' + idx);
    const arrow = document.getElementById('faq-arrow-' + idx);
    const container = ans.parentElement;
    
    if (ans.classList.contains('hidden')) {
      ans.classList.remove('hidden');
      arrow.style.transform = "rotate(180deg)";
      container.classList.add('border-primary/30', 'bg-white', 'shadow-sm');
    } else {
      ans.classList.add('hidden');
      arrow.style.transform = "rotate(0deg)";
      container.classList.remove('border-primary/30', 'bg-white', 'shadow-sm');
    }
  }

  // Connect all sliders and textboxes
  window.addEventListener('DOMContentLoaded', () => {
    // Light range input CSS rules inject
    const style = document.createElement('style');
    style.innerHTML = `
      input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #0a7dbe;
        cursor: pointer;
        border: 3px solid #ffffff;
        box-shadow: 0 0 10px rgba(10, 125, 190, 0.3);
        transition: transform 0.1s ease, background-color 0.1s ease;
      }
      input[type="range"]::-webkit-slider-thumb:hover {
        transform: scale(1.2);
        background: #053d60;
      }
      input[type="range"]::-moz-range-thumb {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #0a7dbe;
        cursor: pointer;
        border: 3px solid #ffffff;
        box-shadow: 0 0 10px rgba(10, 125, 190, 0.3);
        transition: transform 0.1s ease, background-color 0.1s ease;
      }
      input[type="range"]::-moz-range-thumb:hover {
        transform: scale(1.2);
        background: #053d60;
      }
    `;
    document.head.appendChild(style);

    // Repayment sliders
    connectInputs('emi', 'amount', updateCalculation);
    connectInputs('emi', 'rate', updateCalculation);
    connectInputs('emi', 'months', updateCalculation);

    connectInputs('edi', 'amount', updateCalculation);
    connectInputs('edi', 'rate', updateCalculation);
    connectInputs('edi', 'days', updateCalculation);

    connectInputs('payday', 'amount', updateCalculation);
    connectInputs('payday', 'rate', updateCalculation);
    connectInputs('payday', 'days', updateCalculation);

    // Eligibility sliders
    connectInputs('eligibility', 'income', updateEligibility);
    connectInputs('eligibility', 'emis', updateEligibility);
    connectInputs('eligibility', 'rate', updateEligibility);
    connectInputs('eligibility', 'tenure', updateEligibility);

    updateCalculation();
    updateEligibility();
  });
</script>

<?php include '../includes/footer.php'; ?>
