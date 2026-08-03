<?php
require_once __DIR__ . '/../config/config.php';

// Define B2C Loan Product configurations with newly generated realistic images
$products = [
    'personal-loan' => [
        'title' => 'Personal Loan',
        'max_amount' => '₹35 Lakhs',
        'badge' => 'Instant Approval',
        'features' => [
            'Quick • Reliable • Secure',
            '100% Paperless Digital Process',
            'Interest Rate starts from 10.99%'
        ],
        'image' => 'assets/images/personal_loan_banner.png',
        'category_key' => 'payday',
        'related' => ['instant-loan', 'marriage-loan', 'medical-loan', 'travel-loan']
    ],
    'instant-loan' => [
        'title' => 'Instant Loan',
        'max_amount' => '₹5 Lakhs',
        'badge' => 'Disbursal in 2 Hours',
        'features' => [
            '2-Hour Direct Account Disbursal',
            '100% Paperless Eligibility Check',
            'Minimal Processing Fees & Charges'
        ],
        'image' => 'assets/images/payday_loan_banner.png',
        'category_key' => 'payday',
        'related' => ['personal-loan', 'payday-loan', 'medical-loan', 'travel-loan']
    ],
    'marriage-loan' => [
        'title' => 'Marriage Loan',
        'max_amount' => '₹15 Lakhs',
        'badge' => 'Wedding Sourcing',
        'features' => [
            'Fund all wedding venue & catering costs',
            'Flexible repayment tenures up to 5 Years',
            'Instant disbursal with no collateral'
        ],
        'image' => 'assets/images/personal_loan_banner.png',
        'category_key' => 'payday',
        'related' => ['personal-loan', 'travel-loan', 'instant-loan', 'medical-loan']
    ],
    'travel-loan' => [
        'title' => 'Travel Loan',
        'max_amount' => '₹10 Lakhs',
        'badge' => 'Holiday Finance',
        'features' => [
            'Finance domestic & international holidays',
            'Special holiday interest rates starting 10.99%',
            'No collateral, fast-track digital approval'
        ],
        'image' => 'assets/images/personal_loan_banner.png',
        'category_key' => 'payday',
        'related' => ['personal-loan', 'marriage-loan', 'instant-loan', 'medical-loan']
    ],
    'medical-loan' => [
        'title' => 'Medical Loan',
        'max_amount' => '₹20 Lakhs',
        'badge' => 'Emergency Medical Limit',
        'features' => [
            'Immediate emergency coverage',
            'Zero collateral, zero downpayment',
            'Paperless documentation and verification'
        ],
        'image' => 'assets/images/personal_loan_banner.png',
        'category_key' => 'payday',
        'related' => ['personal-loan', 'instant-loan', 'payday-loan', 'travel-loan']
    ],
    'business-loan' => [
        'title' => 'Business Loan',
        'max_amount' => '₹50 Lakhs',
        'badge' => 'SME Capital',
        'features' => [
            'Collateral-free business expansion limits',
            'Hassle-free document verification',
            'Quick approval & disbursal in 48 Hours'
        ],
        'image' => 'assets/images/business_loan_banner.png',
        'category_key' => 'business',
        'related' => ['edi-loan', 'gold-loan', 'personal-loan', 'instant-loan']
    ],
    'gold-loan' => [
        'title' => 'Gold Loan',
        'max_amount' => '₹2 Crore',
        'badge' => 'Gold Valuation Sourcing',
        'features' => [
            'Highest gold gram-rate valuation',
            'Interest rates starting from 8.5% P.A.',
            'Flexible repayment options (monthly/bullet)'
        ],
        'image' => 'assets/images/gold_loan_people.png',
        'category_key' => 'mutual_fund',
        'related' => ['business-loan', 'personal-loan', 'edi-loan', 'home-loan']
    ],
    'home-loan' => [
        'title' => 'Home Loan',
        'max_amount' => '₹5 Crore',
        'badge' => 'Dream Home Funding',
        'features' => [
            'Finance house purchase or construction',
            'Extremely low EMI structures',
            'Long repayment tenures up to 30 Years'
        ],
        'image' => 'assets/images/home_loan_banner.png',
        'category_key' => 'home_loan',
        'related' => ['personal-loan', 'gold-loan', 'car-loan', 'two-wheeler-loan']
    ],
    'car-loan' => [
        'title' => 'Car Loan',
        'max_amount' => '₹50 Lakhs',
        'badge' => 'New & Used Cars',
        'features' => [
            'Finance new or pre-owned vehicles',
            'Up to 100% on-road funding options',
            'Zero pre-closure charges for select models'
        ],
        'image' => 'assets/images/personal_loan_banner.png',
        'category_key' => 'payday',
        'related' => ['two-wheeler-loan', 'personal-loan', 'home-loan', 'education-loan']
    ],
    'two-wheeler-loan' => [
        'title' => 'Two-Wheeler Loan',
        'max_amount' => '₹5 Lakhs',
        'badge' => 'Bike & Scooter Finance',
        'features' => [
            'Immediate bike & scooter funding',
            'Flexible tenures up to 3 Years',
            'Low monthly EMIs and processing fees'
        ],
        'image' => 'assets/images/card_two_wheeler.png',
        'category_key' => 'payday',
        'related' => ['car-loan', 'personal-loan', 'travel-loan', 'instant-loan']
    ],
    'education-loan' => [
        'title' => 'Education Loan',
        'max_amount' => '₹75 Lakhs',
        'badge' => 'Study Abroad & Domestic',
        'features' => [
            'Finance studies in India and abroad',
            'Covers tuition fee, hostel, and travel',
            'Flexible repayment moratorium benefits'
        ],
        'image' => 'assets/images/personal_loan_banner.png',
        'category_key' => 'payday',
        'related' => ['personal-loan', 'travel-loan', 'home-loan', 'car-loan']
    ],
    'payday-loan' => [
        'title' => 'Payday Loan',
        'max_amount' => '₹2 Lakhs',
        'badge' => 'Salary Advances',
        'features' => [
            'Short-term unsecured salary advances',
            'Instant approval with zero documentation',
            'Repay within 30 to 90 days flexible paths'
        ],
        'image' => 'assets/images/payday_loan_banner.png',
        'category_key' => 'payday',
        'related' => ['instant-loan', 'personal-loan', 'medical-loan', 'edi-loan']
    ],
    'edi-loan' => [
        'title' => 'EDI Merchant Loan',
        'max_amount' => '₹10 Lakhs',
        'badge' => 'Daily Collection Finance',
        'features' => [
            'Daily collection repayment structures',
            'Tailored for retail shopkeepers & small vendors',
            'Zero collateral, immediate cash limit'
        ],
        'image' => 'assets/images/edi_loan_banner.png',
        'category_key' => 'edi',
        'related' => ['business-loan', 'gold-loan', 'payday-loan', 'instant-loan']
    ]
];

// Read request parameter from rewritten URL router
$product_key = isset($_GET['type']) ? htmlspecialchars($_GET['type']) : 'personal-loan';

// Fallback to personal loan if invalid product requested
if (!array_key_exists($product_key, $products)) {
    $product_key = 'personal-loan';
}

$prod = $products[$product_key];
$page_title = $prod['title'];

// Define product-specific eligibility, documents, and FAQs
$eligibility_data = [
    'personal-loan' => [
        'criteria' => ['Age: 21 - 58 Years', 'Monthly Income: ₹20,000+ (Salaried/Self-employed)', 'CIBIL Score: 650+ preferred', 'Employment Vintage: Minimum 1 Year stable'],
        'docs' => ['Identity Proof: PAN Card / Aadhaar Card', 'Address Proof: Electricity Bill / Passport', 'Income Proof: Last 3 Months Salary Slips', 'Bank Statement: Last 6 Months active account']
    ],
    'business-loan' => [
        'criteria' => ['Business Vintage: 2+ Years active', 'Annual Turnover: ₹12 Lakhs+ minimum', 'GST Registration: Active registration required', 'CIBIL Score: 680+ with clear payment history'],
        'docs' => ['Identity Proof: Owner PAN & Aadhaar Card', 'Business Proof: GST Registration / Shop Act License', 'Financials: Last 2 Years ITR & Audit reports', 'Bank Statement: Last 12 Months current account statement']
    ],
    'gold-loan' => [
        'criteria' => ['Age: 18 - 70 Years', 'Gold Quality: 18 to 22 Karat purity', 'Collateral: Gold jewelry/ornaments to be pledged', 'Income Proof: Not mandatory for basic limits'],
        'docs' => ['Identity Proof: Aadhaar Card / Voter ID', 'PAN Card: Mandatory for disbursals', 'Ownership Proof: Self-declaration of gold ownership', 'Passport Photos: 2 recent photographs']
    ],
    'payday-loan' => [
        'criteria' => ['Employment: Stable monthly salary', 'Monthly Income: ₹15,000+ net salary', 'Age: 21 - 50 Years', 'Salary Account: Active bank account with netbanking'],
        'docs' => ['Identity Proof: Aadhaar Card & PAN Card', 'Income Proof: Last 3 Months Salary Slips & Form 16', 'Bank Statement: Last 3 Months salary credit statement', 'Employment ID Card: Issued by corporate company']
    ],
    'edi-loan' => [
        'criteria' => ['Shop Category: Retail / Local merchant store', 'Daily Collection Setup: Agrees to daily EDI collection auto-debit', 'Vintage: Minimum 1 Year shop ownership', 'CIBIL Score: No strict limit, based on retail turnover'],
        'docs' => ['Owner ID: Aadhaar Card & PAN Card', 'Shop License: Local municipal corporation permit / trade license', 'Collection Ledger: Last 3 months daily sales ledger', 'Bank Statement: Last 6 months savings/current account']
    ],
    'home-loan' => [
        'criteria' => ['Age: 21 - 65 Years', 'Income: Salaried/Business professionals', 'Stable Employment: Minimum 3 Years stability', 'Co-Applicant: Allowed to increase loan eligibility'],
        'docs' => ['Kyc Docs: Aadhaar Card, PAN Card & Passport size photos', 'Property Documents: Agreement of Sale, Title Deed, Approved Plan', 'Income Proof: 3 months Salary Slips / 2 Years ITR', 'Bank Statement: Last 6 months account statement showing regular savings']
    ]
];

$faqs_data = [
    'personal-loan' => [
        ['q' => 'How long does the loan approval take?', 'a' => 'With AavivaCred, our digital matching engine processes personal loan offers in under 15 minutes. Final bank verification and disbursal take 24-48 hours.'],
        ['q' => 'Can I prepay or foreclosure my personal loan?', 'a' => 'Yes, prepayments are permitted. Foreclosure rules and charges vary from 0% to 4% depending on the lending bank partner.'],
        ['q' => 'Is a guarantor required for AavivaCred personal loans?', 'a' => 'No guarantor or collateral is required. Loans are approved based on your income eligibility and CIBIL credit history.'],
        ['q' => 'What is the minimum CIBIL score required?', 'a' => 'Lenders prefer a CIBIL score of 650 or above, but we also have partners that cater to individuals with slightly lower scores or new-to-credit profiles.'],
        ['q' => 'Are there any prepayment penalty charges?', 'a' => 'Prepayment terms vary by lender. Many partners offer zero foreclosure charges after 6 or 12 successful EMI payments.'],
        ['q' => 'How does AavivaCred match me with lenders?', 'a' => 'We analyze your income profile and credit parameters against the algorithms of 30+ banks and NBFCs, matching you with the lender most likely to approve your loan at the lowest rate.']
    ],
    'business-loan' => [
        ['q' => 'Do I need to submit collateral for a business loan?', 'a' => 'No, AavivaCred matches you with unsecured MSME business loans that require zero collateral or security.'],
        ['q' => 'What is the maximum loan tenure available?', 'a' => 'Business loan tenures range from 12 months up to 60 months, depending on the turnover stability and bank policies.'],
        ['q' => 'Is ITR mandatory for availing a business loan?', 'a' => 'For loans up to ₹5 Lakhs, self-declaration and bank statements may suffice. For higher limits, last 2 years of filed ITR are mandatory.'],
        ['q' => 'How is the interest rate calculated?', 'a' => 'Interest rates start from 11.25% p.a. and are calculated based on your business turnover, credit score, financial records, and operational vintage.'],
        ['q' => 'Can I get a loan if my business is under 1 year old?', 'a' => 'Most bank partners prefer businesses with at least 2 years of operational vintage. However, micro-lenders on AavivaCred offer small working capital limits for newer businesses with high monthly digital collections.'],
        ['q' => 'What business registration documents are accepted?', 'a' => 'Acceptable documents include GST Registration Certificates, Shop & Establishment Licenses, MSME/Udyam Registrations, and Partnership Deeds.']
    ],
    'gold-loan' => [
        ['q' => 'How is the value of my gold ornaments calculated?', 'a' => 'The lending bank evaluates the purity (karat) and net weight of the gold. Valuation is done as per daily market rates, and loans are approved up to 75% of the appraised gold value (LTV).'],
        ['q' => 'Is my gold safe and insured with the bank?', 'a' => 'Yes, your pledged gold is stored in highly secure, fireproof vaults inside the lender\'s branch and is fully insured against theft and damage.'],
        ['q' => 'What are the interest payment options for Gold Loans?', 'a' => 'Lenders offer highly flexible interest repayments, including monthly interest pay, bullet repayment (principal + interest at the end), or EMI options.'],
        ['q' => 'Can I get my gold ornaments back partially?', 'a' => 'Yes, you can make partial payments to release specific gold ornaments while keeping the rest pledged, subject to your remaining loan balance matching the required LTV ratio.'],
        ['q' => 'What is the minimum gold weight required?', 'a' => 'The minimum net gold weight accepted is usually 10 grams, and the ornament must have a purity of at least 18 karat.'],
        ['q' => 'Can a tenant or non-owner apply for a gold loan?', 'a' => 'Yes! A gold loan is a collateralized loan, so any individual possessing gold jewelry can apply with valid KYC documents, regardless of property ownership status.']
    ],
    'payday-loan' => [
        ['q' => 'What is a payday loan / salary advance?', 'a' => 'A payday loan is a short-term loan that helps you bridge cash shortages before your next paycheck arrives. It is repaid automatically when your salary gets credited.'],
        ['q' => 'What happens if my salary is delayed?', 'a' => 'We offer a grace period of 3-5 days. If your salary is delayed, you can request a repayment extension via the AavivaCred portal.'],
        ['q' => 'Are there any hidden processing charges?', 'a' => 'No, AavivaCred operates with 100% transparency. Processing fees are deducted upfront from the disbursed loan amount.'],
        ['q' => 'Can I apply if I am self-employed?', 'a' => 'Payday loans are specifically designed for salaried employees. Self-employed individuals can check out our Business Loan or EDI Merchant Loan options.'],
        ['q' => 'How does auto-debit recovery work?', 'a' => 'Recovery is automated via e-NACH/Auto-Debit setup during disbursal, aligning the payment date precisely with your salary credit date.'],
        ['q' => 'What is the maximum amount I can borrow?', 'a' => 'You can borrow up to 50% of your net monthly salary, starting from ₹10,000 up to ₹2 Lakhs, depending on your employer profile and repayment record.']
    ],
    'edi-loan' => [
        ['q' => 'What is EDI daily collection?', 'a' => 'EDI stands for Equated Daily Installment. Instead of paying a large monthly sum, merchant repayments are auto-debited in micro-installments daily from your business sales.'],
        ['q' => 'Is daily collection manual or digital?', 'a' => 'Repayments are fully automated via e-NACH/Auto-Debit from your registered business bank account daily. No physical collection agents visit.'],
        ['q' => 'Can I pay off the loan early?', 'a' => 'Yes, merchants can foreclose their daily collection limit at any point without any foreclosure fee penalty.'],
        ['q' => 'What happens on retail holidays/Sundays?', 'a' => 'Daily debits are executed on banking working days. Weekend collection amounts are aggregated and debited on the next working day.'],
        ['q' => 'Do I need GST registration for EDI loans?', 'a' => 'GST is not mandatory for smaller EDI collection limits. Local trade permits, municipal vendor licenses, or bank transaction summaries are sufficient.'],
        ['q' => 'Can I get top-up loans based on repayment?', 'a' => 'Yes, merchants with a clean repayment record of 60 days of regular daily debits are eligible for instant top-up approvals.']
    ],
    'home-loan' => [
        ['q' => 'Can I get a home loan for property registration/purchase?', 'a' => 'Yes, home loans are structured to cover flat purchases, under-construction properties, self-construction plots, and renovation.'],
        ['q' => 'Can I apply for a home loan with a co-applicant?', 'a' => 'Yes, co-applying with your spouse, parents, or siblings is highly recommended as it aggregates incomes, increasing the total loan limit.'],
        ['q' => 'Are there any tax benefits on home loans?', 'a' => 'Yes, borrowers can claim deductions on principal repayment under Section 80C and interest paid under Section 24(b) of the Income Tax Act.'],
        ['q' => 'What is the maximum loan-to-value (LTV) for homes?', 'a' => 'Home loan LTV ratios go up to 90% of the property value for loans under ₹30 Lakhs, and up to 75-80% for higher loan amounts.'],
        ['q' => 'Can I transfer my existing home loan to AavivaCred?', 'a' => 'Yes, we offer Balance Transfer home loan facilities that allow you to shift your outstanding loan to another bank for lower interest rates.'],
        ['q' => 'How are property valuations and legal checks done?', 'a' => 'Our lending bank partners conduct physical property valuation and complete a title search check through legal experts to verify the property documents.']
    ]
];

$selected_eligibility = $eligibility_data[$product_key] ?? $eligibility_data['personal-loan'];
$selected_faqs = $faqs_data[$product_key] ?? $faqs_data['personal-loan'];

include '../includes/header.php';

// Helper function to map category keys to clean Lucide icons
function get_product_icon($slug) {
    switch ($slug) {
        case 'personal-loan': return 'user';
        case 'instant-loan': return 'zap';
        case 'marriage-loan': return 'heart';
        case 'travel-loan': return 'plane';
        case 'medical-loan': return 'activity';
        case 'business-loan': return 'building';
        case 'gold-loan': return 'coins';
        case 'home-loan': return 'home';
        case 'car-loan': return 'car';
        case 'two-wheeler-loan': return 'bike';
        case 'education-loan': return 'graduation-cap';
        case 'payday-loan': return 'clock';
        case 'edi-loan': return 'briefcase';
        case 'credit-card': return 'credit-card';
        default: return 'help-circle';
    }
}
?>

<?php if ($product_key === 'business-loan'): ?>
  <?php include 'business-loan-layout.php'; ?>
<?php elseif ($product_key === 'personal-loan'): ?>
  <?php include 'personal-loan-layout.php'; ?>
<?php elseif ($product_key === 'payday-loan'): ?>
  <?php include 'payday-loan-layout.php'; ?>
<?php elseif ($product_key === 'gold-loan'): ?>
  <?php include 'gold-loan-layout.php'; ?>
<?php elseif ($product_key === 'home-loan'): ?>
  <?php include 'home-loan-layout.php'; ?>
<?php elseif ($product_key === 'edi-loan'): ?>
  <?php include 'edi-loan-layout.php'; ?>
<?php else: ?>

<div class="bg-[#f6f8fb] min-h-screen pt-28 pb-12">
  <div class="container mx-auto px-4 max-w-7xl relative z-10">

    <!-- Combined Banner Card (Buddy Loan Style) -->
    <div class="bg-white border border-slate-200/80 shadow-2xl rounded-[2.5rem] overflow-hidden mb-16 reveal-on-scroll relative">
      <!-- Light Gradient Top Banner Container -->
      <div class="bg-gradient-to-r from-white via-[#f3f7fd] to-[#e6effb] p-6 md:p-10 relative">
        
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
              <defs>
                <linearGradient id="waveGrad1" x1="0%" y1="100%" x2="100%" y2="0%">
                  <stop offset="0%" stop-color="#f0f6fe" />
                  <stop offset="100%" stop-color="#d4e5f9" />
                </linearGradient>
                <linearGradient id="waveGrad2" x1="0%" y1="100%" x2="100%" y2="0%">
                  <stop offset="0%" stop-color="#e8f2fd" />
                  <stop offset="100%" stop-color="#cbe0f7" />
                </linearGradient>
              </defs>
              <!-- Layer 1: Base Wave -->
              <path d="M25,100 Q8,55 65,0 L100,0 L100,100 Z" fill="url(#waveGrad1)" />
              <!-- Layer 2: Middle Wave -->
              <path d="M40,100 Q20,65 78,0 L100,0 L100,100 Z" fill="url(#waveGrad2)" opacity="0.6" />
              <!-- Layer 3: Top Wave Accent -->
              <path d="M55,100 Q35,75 88,0 L100,0 L100,100 Z" fill="#b9d6f3" opacity="0.3" />
            </svg>
          </div>

          <!-- Floating background light-blue circles/blurs -->
          <div class="absolute right-10 top-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
          <div class="absolute left-1/3 bottom-5 w-40 h-40 bg-accentYellow/5 rounded-full blur-2xl"></div>
          
          <!-- Slanted accent color stripe ("tirchi patti") -->
          <div class="absolute left-[-5%] top-[-20%] w-[180px] h-[160%] bg-gradient-to-b from-primary/5 to-sky-400/5 rotate-[20deg] transform pointer-events-none z-0"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
          
          <!-- Left Column: B2C Form & Details (Clean 50/50 Split) -->
          <div class="lg:col-span-6 space-y-6">
            <div class="space-y-3">
              <span class="text-[10px] font-extrabold tracking-widest text-primary uppercase bg-white/80 border border-slate-205 px-3 py-1 rounded-full shadow-sm"><?php echo $prod['badge']; ?></span>
              <h2 class="font-display text-2.5xl md:text-4xl font-extrabold text-darkBlue leading-tight">
                Get <?php echo $prod['title']; ?> of up to <br class="hidden md:inline">
                <span class="text-primary font-black"><?php echo $prod['max_amount']; ?>!</span>
              </h2>
            </div>

            <!-- Quick Phone Form -->
            <form action="<?php echo PATH_PREFIX; ?>pages/apply.php" method="GET" class="space-y-4 max-w-md">
              <!-- Hidden category reference to pre-select category on apply.php -->
              <input type="hidden" name="type" value="<?php echo str_replace('-loan', '', $product_key); ?>" />
              
              <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-grow flex items-center bg-white border border-slate-250 rounded-xl overflow-hidden focus-within:border-primary focus-within:ring-2 focus-within:ring-primary/20 transition-all shadow-inner">
                  <!-- Country flag indicator code (+91) -->
                  <div class="flex items-center gap-1 px-4 border-r border-slate-200 bg-slate-50 text-slate-550 font-bold text-sm">
                    <span class="text-xs">🇮🇳</span> <span>+91</span>
                  </div>
                  <input type="tel" name="qty" required maxlength="10" placeholder="Enter phone number" 
                    class="w-full bg-transparent px-4 py-3.5 text-sm text-slate-800 focus:outline-none border-none" />
                </div>
                <button type="submit" class="bg-accentYellow hover:bg-yellow-500 text-darkBlue font-extrabold px-8 py-3.5 rounded-xl text-sm transition-all shadow-md active:scale-95 shrink-0">
                  Submit
                </button>
              </div>
              
              <!-- Terms Agreement -->
              <label class="flex items-start gap-2.5 text-[10px] text-slate-500 font-semibold cursor-pointer">
                <input type="checkbox" required checked class="mt-0.5 rounded border-slate-300 text-primary focus:ring-primary" />
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
          
          <!-- Right Column: Premium Graphics (Clean 50/50 Split, No smartphones or overlapping circles) -->
          <div class="lg:col-span-6 flex justify-center relative">
            <!-- Glowing background effect behind the image -->
            <div class="absolute inset-0 bg-gradient-to-tr from-primary/10 via-transparent to-accentYellow/10 rounded-full blur-3xl pointer-events-none scale-125"></div>
            
            <!-- Underlay glow halo behind the subject -->
            <div class="absolute w-64 h-64 rounded-full bg-gradient-to-tr from-primary/10 to-sky-300/10 border border-white/30 shadow-inner z-0 animate-pulse-slow"></div>

            <!-- Floating interactive nodes/bubbles -->
            <div class="absolute right-10 top-6 w-3 h-3 bg-accentYellow rounded-full animate-ping opacity-60 z-20 pointer-events-none"></div>
            <div class="absolute left-10 bottom-6 w-2 h-2 bg-primary rounded-full animate-pulse z-20 pointer-events-none"></div>

            <?php if (in_array($product_key, ['business-loan', 'payday-loan', 'edi-loan'])): ?>
              <!-- Clean framed photo card with premium white borders and crisp shadows (No foggy vignettes!) -->
              <div class="relative w-full max-w-sm rounded-[2rem] overflow-hidden border-[6px] border-white shadow-2xl z-10 group transition-transform duration-300 hover:scale-102">
                <img src="<?php echo PATH_PREFIX . $prod['image']; ?>" alt="<?php echo $prod['title']; ?>" 
                  class="w-full h-auto object-cover relative z-10 transition-transform duration-500 group-hover:scale-105" />
              </div>
              <!-- Floating sparkles around photo card for premium finish -->
              <div class="absolute right-[-10px] top-[15%] text-sky-400 animate-pulse z-20 pointer-events-none"><i data-lucide="sparkles" class="w-5 h-5"></i></div>
              <div class="absolute left-[-10px] bottom-[15%] text-primary animate-pulse z-20 pointer-events-none"><i data-lucide="sparkle" class="w-4 h-4"></i></div>
            <?php else: ?>
              <!-- Large transparent graphic cutout sitting centered on the background wave -->
              <div class="relative w-full h-[340px] flex items-center justify-center z-10">
                <!-- Glowing background halo specifically for cutouts (scaled up) -->
                <div class="absolute w-72 h-72 rounded-full bg-gradient-to-tr from-primary/15 to-sky-300/20 border border-white/40 shadow-inner z-0 animate-float-slow"></div>
                
                <!-- Product-Specific Floating Elements to enrich layout -->
                <?php if ($product_key === 'gold-loan'): ?>
                  <!-- Floating Gold Coins for Gold Loan -->
                  <div class="absolute right-[2%] top-[5%] w-8 h-8 bg-amber-450 rounded-full flex items-center justify-center text-white text-xs font-black shadow-lg animate-pulse z-20">₹</div>
                  <div class="absolute left-[5%] bottom-[10%] w-6 h-6 bg-amber-300 rounded-full flex items-center justify-center text-white text-[9px] font-black shadow-lg z-20">₹</div>
                  <div class="absolute right-[20%] bottom-[5%] w-5 h-5 bg-yellow-400 rounded-full flex items-center justify-center text-white text-[7px] font-black shadow-md z-0 opacity-80 animate-ping">₹</div>
                <?php elseif ($product_key === 'personal-loan'): ?>
                  <!-- Floating Sparkles for Personal Loan -->
                  <div class="absolute right-[5%] top-[8%] text-sky-400 animate-pulse z-20"><i data-lucide="sparkles" class="w-5 h-5"></i></div>
                  <div class="absolute left-[8%] bottom-[12%] text-primary animate-pulse z-20"><i data-lucide="sparkle" class="w-4 h-4"></i></div>
                  <div class="absolute right-[25%] bottom-[5%] text-sky-350 opacity-60 z-0 animate-float"><i data-lucide="sparkles" class="w-3.5 h-3.5"></i></div>
                <?php elseif ($product_key === 'home-loan'): ?>
                  <!-- Floating Home Elements for Home Loan -->
                  <div class="absolute left-[8%] top-[8%] text-primary/15 z-0 animate-bounce-slow"><i data-lucide="home" class="w-10 h-10"></i></div>
                  <div class="absolute right-[8%] bottom-[10%] text-sky-400/25 z-0 animate-float"><i data-lucide="key" class="w-7 h-7"></i></div>
                <?php endif; ?>

                <img src="<?php echo PATH_PREFIX . $prod['image']; ?>" alt="<?php echo $prod['title']; ?>" 
                  class="h-[345px] w-auto object-contain mix-blend-multiply relative z-10 drop-shadow-2xl transition-transform duration-300 hover:scale-105" />
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Dark Blue Stats Banner Attached directly below (Buddy Loan style) -->
      <div class="bg-[#031d40] text-white p-6 md:p-8 relative border-t border-slate-100/5 z-20">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 items-center text-center">
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
      </div>
    </div>

    <!-- New Content Section 1: Eligibility & Documents Grid (Side-by-Side) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16 reveal-on-scroll">
      
      <!-- Eligibility Card -->
      <div class="bg-white border border-slate-200/80 rounded-[2rem] p-8 shadow-xl relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
        <div class="absolute -right-16 -top-16 w-36 h-36 bg-primary/5 rounded-full blur-2xl group-hover:scale-125 transition-transform duration-500"></div>
        <!-- Slanted background stripe -->
        <div class="absolute -left-16 top-0 w-24 h-[150%] bg-gradient-to-b from-primary/5 to-transparent rotate-[15deg] transform pointer-events-none z-0"></div>
        <div class="flex items-center gap-3 mb-6">
          <span class="w-12 h-12 bg-primary/10 text-primary rounded-2xl flex items-center justify-center shrink-0">
            <i data-lucide="check-square" class="w-6 h-6"></i>
          </span>
          <div>
            <h3 class="font-display font-extrabold text-lg md:text-xl text-darkBlue">Eligibility Criteria</h3>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Who can apply</p>
          </div>
        </div>
        <ul class="space-y-4 relative z-10">
          <?php foreach ($selected_eligibility['criteria'] as $item): ?>
            <li class="flex items-start gap-3">
              <span class="w-5 h-5 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
              <span class="text-sm font-semibold text-slate-700 leading-relaxed"><?php echo $item; ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Documents Required Card -->
      <div class="bg-white border border-slate-200/80 rounded-[2rem] p-8 shadow-xl relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
        <div class="absolute -right-16 -top-16 w-36 h-36 bg-accentYellow/5 rounded-full blur-2xl group-hover:scale-125 transition-transform duration-500"></div>
        <!-- Slanted background stripe -->
        <div class="absolute -left-16 top-0 w-24 h-[150%] bg-gradient-to-b from-accentYellow/10 to-transparent rotate-[15deg] transform pointer-events-none z-0"></div>
        <div class="flex items-center gap-3 mb-6">
          <span class="w-12 h-12 bg-accentYellow/15 text-darkBlue rounded-2xl flex items-center justify-center shrink-0">
            <i data-lucide="file-text" class="w-6 h-6"></i>
          </span>
          <div>
            <h3 class="font-display font-extrabold text-lg md:text-xl text-darkBlue">Documents Required</h3>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Keep these ready</p>
          </div>
        </div>
        <ul class="space-y-4 relative z-10">
          <?php foreach ($selected_eligibility['docs'] as $item): ?>
            <li class="flex items-start gap-3">
              <span class="w-5 h-5 rounded-full bg-sky-50 text-primary flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="file" class="w-3 h-3"></i></span>
              <span class="text-sm font-semibold text-slate-700 leading-relaxed"><?php echo $item; ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

    </div>

    <!-- New Content Section 2: Step-by-Step Digital Application Journey -->
    <div class="bg-gradient-to-r from-[#031d40] to-darkBlue text-white rounded-[2.5rem] p-8 md:p-12 mb-16 relative overflow-hidden shadow-2xl reveal-on-scroll">
      <!-- Glow points in container background -->
      <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-primary/10 rounded-full blur-3xl"></div>
      <div class="absolute right-0 top-0 w-64 h-64 bg-accentYellow/5 rounded-full blur-2xl"></div>

      <div class="text-center max-w-2xl mx-auto mb-10 space-y-2 relative z-10">
        <span class="text-[10px] font-extrabold text-accentYellow uppercase tracking-widest bg-white/5 border border-white/10 px-3.5 py-1 rounded-full">Simple Process</span>
        <h3 class="font-display text-2xl md:text-3.5xl font-extrabold text-white">Apply digitally in 3 simple steps</h3>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
        
        <!-- Step 1 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 relative hover:bg-white/10 transition-all duration-300 group">
          <div class="absolute right-6 top-6 text-5xl font-black text-white/5 group-hover:text-white/10 transition-colors">01</div>
          <span class="w-10 h-10 bg-accentYellow/20 text-accentYellow rounded-xl flex items-center justify-center mb-4"><i data-lucide="smartphone" class="w-5 h-5"></i></span>
          <h4 class="font-display font-extrabold text-base text-white mb-2">Register Online</h4>
          <p class="text-xs text-slate-300 font-semibold leading-relaxed">Enter your phone number and complete a secure mobile verification process.</p>
        </div>

        <!-- Step 2 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 relative hover:bg-white/10 transition-all duration-300 group">
          <div class="absolute right-6 top-6 text-5xl font-black text-white/5 group-hover:text-white/10 transition-colors">02</div>
          <span class="w-10 h-10 bg-accentYellow/20 text-accentYellow rounded-xl flex items-center justify-center mb-4"><i data-lucide="shield-check" class="w-5 h-5"></i></span>
          <h4 class="font-display font-extrabold text-base text-white mb-2">Compare & Approve</h4>
          <p class="text-xs text-slate-300 font-semibold leading-relaxed">Instantly match and view eligible offers from leading bank partners paperlessly.</p>
        </div>

        <!-- Step 3 -->
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 relative hover:bg-white/10 transition-all duration-300 group">
          <div class="absolute right-6 top-6 text-5xl font-black text-white/5 group-hover:text-white/10 transition-colors">03</div>
          <span class="w-10 h-10 bg-accentYellow/20 text-accentYellow rounded-xl flex items-center justify-center mb-4"><i data-lucide="banknote" class="w-5 h-5"></i></span>
          <h4 class="font-display font-extrabold text-base text-white mb-2">Instant Disbursal</h4>
          <p class="text-xs text-slate-300 font-semibold leading-relaxed">Get the loan amount credited directly into your active bank account in hours.</p>
        </div>

      </div>
    </div>

    <!-- New Content Section 3: Frequently Asked Questions Two-Column Layout -->
    <div class="bg-gradient-to-br from-[#f8faff] via-white to-[#edf4fc] border border-slate-200/80 shadow-xl rounded-[2.5rem] p-8 md:p-12 mb-16 relative overflow-hidden reveal-on-scroll">
      <!-- Background glowing radial blur circles for color effect -->
      <div class="absolute left-[-10%] top-[-10%] w-72 h-72 bg-primary/10 rounded-full blur-3xl pointer-events-none"></div>
      <div class="absolute right-[-10%] bottom-[-10%] w-72 h-72 bg-accentYellow/5 rounded-full blur-3xl pointer-events-none"></div>
      
      <!-- Slanted background color bands ("tirchi patti") -->
      <div class="absolute -left-12 -top-24 w-40 h-[150%] bg-gradient-to-b from-primary/5 to-transparent rotate-[25deg] transform pointer-events-none z-0"></div>
      <div class="absolute -right-12 -bottom-24 w-32 h-[150%] bg-gradient-to-t from-accentYellow/5 to-transparent rotate-[25deg] transform pointer-events-none z-0"></div>
      
      <div class="text-center max-w-2xl mx-auto mb-10 space-y-2 relative z-10">
        <span class="text-[10px] font-extrabold text-primary uppercase tracking-widest bg-white border border-slate-200 px-3.5 py-1 rounded-full shadow-sm">Got Questions?</span>
        <h3 class="font-display text-2xl md:text-3.5xl font-extrabold text-darkBlue">Frequently Asked Questions</h3>
        <p class="text-xs text-slate-500 font-semibold">Everything you need to know about <?php echo $prod['title']; ?> limits, payouts, and criteria.</p>
      </div>

      <!-- Two-Column Accordions Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 max-w-6xl mx-auto relative z-10">
        
        <!-- Left Column -->
        <div class="space-y-4">
          <?php for ($i = 0; $i < 3; $i++): 
            if (!isset($selected_faqs[$i])) continue;
            $faq = $selected_faqs[$i];
          ?>
            <div class="bg-white/95 border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 hover:-translate-y-0.5 group">
              <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(<?php echo $i; ?>)">
                <span><?php echo $faq['q']; ?></span>
                <span id="faq-icon-<?php echo $i; ?>" class="w-6 h-6 rounded-full bg-slate-50 text-slate-550 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
              </button>
              <div id="faq-answer-<?php echo $i; ?>" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
                <?php echo $faq['a']; ?>
              </div>
            </div>
          <?php endfor; ?>
        </div>

        <!-- Right Column -->
        <div class="space-y-4">
          <?php for ($i = 3; $i < 6; $i++): 
            if (!isset($selected_faqs[$i])) continue;
            $faq = $selected_faqs[$i];
          ?>
            <div class="bg-white/95 border border-slate-200/80 rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 hover:border-primary/30 hover:-translate-y-0.5 group">
              <button class="w-full flex items-center justify-between text-left font-display font-extrabold text-sm md:text-base text-slate-800 hover:text-primary transition-colors focus:outline-none" onclick="toggleFaq(<?php echo $i; ?>)">
                <span><?php echo $faq['q']; ?></span>
                <span id="faq-icon-<?php echo $i; ?>" class="w-6 h-6 rounded-full bg-slate-50 text-slate-550 border border-slate-200 flex items-center justify-center transition-all shrink-0"><i data-lucide="chevron-down" class="w-4 h-4"></i></span>
              </button>
              <div id="faq-answer-<?php echo $i; ?>" class="hidden mt-3 text-xs md:text-sm text-slate-500 font-semibold leading-relaxed border-t border-slate-100 pt-3">
                <?php echo $faq['a']; ?>
              </div>
            </div>
          <?php endfor; ?>
        </div>

      </div>
    </div>

    <!-- FAQ Accordion JS Script -->
    <script>
      function toggleFaq(index) {
        const answer = document.getElementById('faq-answer-' + index);
        const icon = document.getElementById('faq-icon-' + index);
        if (answer.classList.contains('hidden')) {
          answer.classList.remove('hidden');
          icon.style.transform = 'rotate(180deg)';
        } else {
          answer.classList.add('hidden');
          icon.style.transform = 'rotate(0deg)';
        }
      }
    </script>

    <!-- Sub-Products Section (e.g. Personal Loan Products) -->
    <div class="space-y-6 reveal-on-scroll">
      <h2 class="font-display font-extrabold text-xl md:text-2xl text-darkBlue">
        <?php echo $prod['title']; ?> Products
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
          <div>
            <h4 class="font-display font-bold text-xs text-slate-800 leading-tight"><?php echo $rel['title']; ?></h4>
            <p class="text-[10px] text-slate-450 font-semibold mt-0.5">Check Offers</p>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</div>

<?php endif; ?>
<?php include '../includes/footer.php'; ?>
