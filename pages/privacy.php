<?php
$page_title = "Privacy Policy";
include '../includes/header.php';
?>

<!-- Privacy Hero Section -->
<section class="relative pt-24 pb-12 overflow-hidden bg-mesh reveal-on-scroll">
  <div class="container mx-auto px-4 relative z-10 text-center max-w-4xl">
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-bold mb-6 border border-primary/20 backdrop-blur-sm shadow-sm">
      <i data-lucide="file-text" class="w-4 h-4 text-primary"></i> Privacy Policy
    </div>
    <h1 class="font-display text-4xl md:text-5xl font-extrabold tracking-tight mb-4 text-slate-900 leading-tight">
      Privacy & <span class="text-gradient">Data Protection</span>
    </h1>
    <p class="text-slate-600 text-lg max-w-2xl mx-auto">
      Learn how we handle data, ensure digital consent, and comply with information security regulations.
    </p>
  </div>
</section>

<!-- Content Section -->
<section class="py-12 bg-white relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
    <div class="glass-card rounded-3xl p-8 md:p-12 bg-white shadow-xl border border-slate-150 space-y-8 text-slate-700 leading-relaxed font-medium reveal-on-scroll delay-100">
      
      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">1. Consent-Based Data Acquisition</h2>
        <p class="mb-4">
          At AavivaCred, data integrity and compliance form the cornerstone of our operations. We strictly deliver <strong>consent-based leads</strong>. 
        </p>
        <p>
          Every prospect profile we package includes complete validation tokens (timestamps, IP validation metadata, and recorded verification records) confirming their intent to be contacted for financial services. We never purchase or sell unauthorized list databases.
        </p>
      </div>
      
      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">2. Compliance and Filtering</h2>
        <p class="mb-4">
          All leads are actively filtered against the National Customer Preference Register (NCPR) / National Do Not Call (NDNC) lists prior to delivery.
        </p>
        <p>
          We take active measures to ensure that our NBFC, bank, and brokerage partners receive leads in compliance with relevant directives issued by regulatory bodies like TRAI and RBI.
        </p>
      </div>

      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">3. Lead Delivery Security</h2>
        <p class="mb-4">
          Client database exports (CSV/JSON/CRM APIs) are encrypted in transit and at rest. We enforce access control policies to ensure that lead directories are accessed only by authorized personnel of our purchasing partners.
        </p>
        <p>
          Lead details are permanently purged from our active distribution servers within 90 days of generation to limit database footprints and enhance security.
        </p>
      </div>

      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">4. Right to Erasure & Access Procedures</h2>
        <p class="mb-4">
          Under the Digital Personal Data Protection (DPDP) Act, you possess the right to seek correction, completion, or erasure of your personal data shared with us. If you wish to revoke your consent, you can submit an official request to our Data Protection Officer at <a href="mailto:privacy@aavivacred.com" class="text-primary hover:underline font-bold">privacy@aavivacred.com</a>.
        </p>
        <p>
          Upon request validation, AavivaCred will purge your active records from our routing systems within 30 operational business days and notify partner lenders to cease further processing.
        </p>
      </div>

      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">5. Credit Bureau Soft-Pull Consent Terms</h2>
        <p class="mb-4">
          To display customized loan offers and match you with correct interest rates, our platform queries authorized credit bureaus (such as Experian or CRIF High Mark) to retrieve eligibility insights.
        </p>
        <p>
          This check is executed as a **soft pull** inquiry. Unlike a hard pull initiated by direct bank applications, our eligibility search has absolutely **zero impact** on your active credit score rating or history.
        </p>
      </div>

      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">6. NBFC Referral Partners & Data Handling</h2>
        <p class="mb-4">
          AavivaCred operates exclusively as a digital lending agent and referral platform. We securely package and transfer consumer application details to our RBI-regulated NBFC and bank partners.
        </p>
        <p>
          Once your data is transmitted, it becomes subject to the respective partner's privacy policy. Our partners are contractually bound to maintain strict confidentiality and utilize the information solely for credit assessment purposes.
        </p>
      </div>

      <!-- Privacy & Data Security FAQ Accordion -->
      <div class="border-t border-slate-150 pt-8 mt-8">
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-6 text-center">Privacy & Security FAQ</h2>
        <div class="space-y-4 max-w-3xl mx-auto">
          <!-- FAQ 1 -->
          <div class="faq-item bg-[#f8fafc] rounded-xl p-5 border border-slate-200 cursor-pointer transition-all hover:border-primary/20">
            <button class="faq-trigger flex justify-between items-center w-full text-left font-bold text-slate-800 text-sm focus:outline-none">
              <span>Is my personal data encrypted on AavivaCred?</span>
              <i data-lucide="chevron-down" class="faq-chevron w-5 h-5 text-slate-505"></i>
            </button>
            <div class="faq-content text-xs text-slate-500 font-semibold leading-relaxed mt-2">
              Yes, all sensitive data transmission is encrypted using 256-bit SHA-256 SSL technology, and records stored in our database region are encrypted at rest under AWS secure environment guidelines.
            </div>
          </div>
          <!-- FAQ 2 -->
          <div class="faq-item bg-[#f8fafc] rounded-xl p-5 border border-slate-200 cursor-pointer transition-all hover:border-primary/20">
            <button class="faq-trigger flex justify-between items-center w-full text-left font-bold text-slate-800 text-sm focus:outline-none">
              <span>Does checking my loan offer sell my data to telemarketers?</span>
              <i data-lucide="chevron-down" class="faq-chevron w-5 h-5 text-slate-505"></i>
            </button>
            <div class="faq-content text-xs text-slate-500 font-semibold leading-relaxed mt-2">
              No. We strictly operate on opt-in, consent-based routing. Your details are only shared with the specific banks or NBFCs you match with, never sold to external third-party telemarketing networks.
            </div>
          </div>
        </div>
      </div>

      <div class="border-t border-slate-150 pt-8 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-slate-500 font-semibold">
        <span>Last Updated: July 2026</span>
        <span>Version 3.0 (Expanded Compliance)</span>
      </div>

    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>
