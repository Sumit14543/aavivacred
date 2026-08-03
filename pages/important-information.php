<?php
$page_title = "Important Information & Disclosures";
include '../includes/header.php';
?>

<!-- Hero Section -->
<section class="relative pt-24 pb-12 overflow-hidden bg-mesh reveal-on-scroll">
  <div class="container mx-auto px-4 relative z-10 text-center max-w-4xl">
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-bold mb-6 border border-primary/20 backdrop-blur-sm shadow-sm">
      <i data-lucide="info" class="w-4 h-4 text-primary"></i> Regulatory Disclosures
    </div>
    <h1 class="font-display text-4xl md:text-5xl font-extrabold tracking-tight mb-4 text-slate-900 leading-tight">
      Important Info & <span class="text-gradient">Customer Guidelines</span>
    </h1>
    <p class="text-slate-600 text-lg max-w-2xl mx-auto">
      Key regulatory compliances under RBI guidelines, safety alerts, and details of our lending panels.
    </p>
  </div>
</section>

<!-- Content Section -->
<section class="py-12 bg-white relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
    <div class="glass-card rounded-3xl p-8 md:p-12 bg-white shadow-xl border border-slate-150 space-y-8 text-slate-700 leading-relaxed font-medium reveal-on-scroll delay-100">
      
      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">1. RBI Digital Lending Guidelines (DLG) Compliance</h2>
        <p class="mb-4">
          AavivaCred (a brand of Aaviva Fintech Digital Private Limited) operates strictly as a digital Lending Service Provider (LSP) and sourcing marketplace. We do not extend credit directly on our books. 
        </p>
        <p>
          In accordance with the Reserve Bank of India (RBI) guidelines on Digital Lending, all loan sourcing, credit appraisal, and agreements are executed directly between the borrower and our partner Banks/NBFCs. All funds are disbursed directly to your verified bank account from the lender's account, and repayments are collected directly by the lender. No third-party pool accounts are used.
        </p>
      </div>
      
      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">2. Fraud Alert: Safe Borrowing Rules</h2>
        <p class="mb-4">
          We are committed to transparent digital practices. Please review these safety guidelines:
        </p>
        <div class="text-amber-700 font-bold bg-amber-50 border border-amber-100 p-5 rounded-xl space-y-2">
          <p class="flex items-center gap-2"><i data-lucide="alert-triangle" class="w-5 h-5 shrink-0 text-amber-600"></i> No Upfront Payments:</p>
          <p class="font-semibold text-sm">
            AavivaCred does NOT charge any upfront file fees, document charges, or security deposits. Lenders only charge processing fees which are deducted directly from your final loan disbursement.
          </p>
          <p class="font-semibold text-sm mt-2">
            Never pay any agent via Google Pay, PhonePe, Paytm, or direct transfers. If anyone asks you for money under our name, report it immediately to support@aavivacred.com.
          </p>
        </div>
      </div>

      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">3. Lending Partner Network</h2>
        <p class="mb-4">
          AavivaCred operates in association with multiple RBI-registered Non-Banking Financial Companies (NBFCs) and leading scheduled commercial banks across India. We strictly ensure that your application is matched and routed only to regulatory-compliant institutions.
        </p>
        <p>
          All credit facilities sourced through our platform are backed by official loan agreements executed directly between the borrower and the respective lending institution.
        </p>
      </div>

      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">4. Know Your Customer (KYC) Requirements</h2>
        <p class="mb-4">
          To qualify for digital credit, applicants must undergo verification. Lenders accept the following digital KYC tokens:
        </p>
        <ul class="list-disc pl-5 space-y-2 text-sm text-slate-600 font-semibold">
          <li>Identity Proof: PAN Card (mandatory for credit assessment)</li>
          <li>Address Proof: Aadhaar Card (via e-KYC/digilocker), Passport, or Voter ID</li>
          <li>Income Proof: Salary Slips or last 6 months Bank Statements (PDF upload via AA account aggregators)</li>
        </ul>
      </div>

      <div class="border-t border-slate-150 pt-8 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-slate-500 font-semibold">
        <span>Last Updated: July 2026</span>
        <span>Version 3.1 (RBI DLG Compliance)</span>
      </div>

    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>
