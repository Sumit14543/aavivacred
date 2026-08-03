<?php
$page_title = "Lending Fees & Charges Schedule";
include '../includes/header.php';
?>

<!-- Hero Section -->
<section class="relative pt-24 pb-12 overflow-hidden bg-mesh reveal-on-scroll">
  <div class="container mx-auto px-4 relative z-10 text-center max-w-4xl">
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-bold mb-6 border border-primary/20 backdrop-blur-sm shadow-sm">
      <i data-lucide="credit-card" class="w-4 h-4 text-primary"></i> Pricing Disclosures
    </div>
    <h1 class="font-display text-4xl md:text-5xl font-extrabold tracking-tight mb-4 text-slate-900 leading-tight">
      Lending Fees & <span class="text-gradient">Charges Schedule</span>
    </h1>
    <p class="text-slate-600 text-lg max-w-2xl mx-auto">
      Detailed overview of processing fees, late penalties, bounce charges, and foreclosure terms.
    </p>
  </div>
</section>

<!-- Content Section -->
<section class="py-12 bg-white relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
    <div class="glass-card rounded-3xl p-8 md:p-12 bg-white shadow-xl border border-slate-150 space-y-8 text-slate-700 leading-relaxed font-medium reveal-on-scroll delay-100">
      
      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">Standard Fees Structure</h2>
        <p class="mb-6">
          Below are the standard rates and penalties levied by lending banks and NBFC partners. AavivaCred does not directly charge or collect any of these fees:
        </p>

        <!-- Charges Table -->
        <div class="overflow-x-auto border border-slate-200 rounded-2xl mb-8">
          <table class="w-full text-left text-sm text-slate-700">
            <thead class="bg-slate-50 border-b border-slate-200">
              <tr>
                <th class="p-4 font-bold text-slate-900">Fee Category</th>
                <th class="p-4 font-bold text-slate-900">Indicative Rate</th>
                <th class="p-4 font-bold text-slate-900">Application Terms</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-150">
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">Processing Fees</td>
                <td class="p-4 text-slate-800 font-bold">1.50% - 5.00% of loan principal</td>
                <td class="p-4">Deducted from the sanctioned loan amount prior to disbursement.</td>
              </tr>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">Foreclosure Charges</td>
                <td class="p-4 text-slate-800 font-bold">2.00% - 6.00% on outstanding amount</td>
                <td class="p-4">Applicable if outstanding principal is prepaid early (Nil for individual floating rate loans as per RBI).</td>
              </tr>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">Late Payment Penalties</td>
                <td class="p-4 text-slate-800 font-bold">2.00% per month on overdue EMI</td>
                <td class="p-4">Levied monthly on the unpaid installment balance until fully cleared.</td>
              </tr>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">NACH Bounce Fees</td>
                <td class="p-4 text-slate-800 font-bold">₹295 - ₹590 per failure (incl. GST)</td>
                <td class="p-4">Charged if auto-debit fails due to insufficient bank funds.</td>
              </tr>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">Stamp Duty / Documentation</td>
                <td class="p-4 text-slate-800 font-bold">As per State Stamp Act</td>
                <td class="p-4">Mandatory legal charge for digital/physical loan agreement stamping.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">Key Consumer Disclosures</h2>
        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
            <div>
              <strong>No Foreclosure Fees on Floating Rates:</strong> In compliance with RBI directions, lenders do not levy foreclosure charges or prepayment penalties on individual borrowers for floating interest rate term loans (such as home loans and personal loans).
            </div>
          </li>
          <li class="flex items-start gap-3">
            <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
            <div>
              <strong>Sanction Letter Review:</strong> Always review the Key Fact Statement (KFS) and Sanction Letter provided by the bank or NBFC before signing the agreement to verify the exact APR, fees, and penalties.
            </div>
          </li>
        </ul>
      </div>

      <div class="border-t border-slate-150 pt-8 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-slate-500 font-semibold">
        <span>Last Updated: July 2026</span>
        <span>Version 2.0</span>
      </div>

    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>
