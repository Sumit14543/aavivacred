<?php
$page_title = "Prevailing Interest Rates & APR";
include '../includes/header.php';
?>

<!-- Hero Section -->
<section class="relative pt-24 pb-12 overflow-hidden bg-mesh reveal-on-scroll">
  <div class="container mx-auto px-4 relative z-10 text-center max-w-4xl">
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-bold mb-6 border border-primary/20 backdrop-blur-sm shadow-sm">
      <i data-lucide="percent" class="w-4 h-4 text-primary"></i> Lending Rates
    </div>
    <h1 class="font-display text-4xl md:text-5xl font-extrabold tracking-tight mb-4 text-slate-900 leading-tight">
      Interest Rates & <span class="text-gradient">APR Guidelines</span>
    </h1>
    <p class="text-slate-600 text-lg max-w-2xl mx-auto">
      Review prevailing interest rates, tenures, and representative loan cost calculations.
    </p>
  </div>
</section>

<!-- Content Section -->
<section class="py-12 bg-white relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
    <div class="glass-card rounded-3xl p-8 md:p-12 bg-white shadow-xl border border-slate-150 space-y-8 text-slate-700 leading-relaxed font-medium reveal-on-scroll delay-100">
      
      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">Indicative Interest Rates Matrix</h2>
        <p class="mb-6">
          The following matrix shows interest rates offered by our partner banks and NBFCs based on loan categories:
        </p>

        <!-- Interest Rates Table -->
        <div class="overflow-x-auto border border-slate-200 rounded-2xl mb-8">
          <table class="w-full text-left text-sm text-slate-700">
            <thead class="bg-slate-50 border-b border-slate-200">
              <tr>
                <th class="p-4 font-bold text-slate-900">Loan Type</th>
                <th class="p-4 font-bold text-slate-900">Indicative Rate (p.a.)</th>
                <th class="p-4 font-bold text-slate-900">Available Tenures</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-150">
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">Personal Loan</td>
                <td class="p-4 text-emerald-600 font-bold">10.49% - 29.99% (reducing)</td>
                <td class="p-4">12 to 60 Months</td>
              </tr>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">Business Loan</td>
                <td class="p-4 text-emerald-600 font-bold">13.50% - 34.00% (reducing)</td>
                <td class="p-4">12 to 60 Months</td>
              </tr>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">Home Loan</td>
                <td class="p-4 text-emerald-600 font-bold">8.50% - 14.00%</td>
                <td class="p-4">Up to 30 Years</td>
              </tr>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">Gold Loan</td>
                <td class="p-4 text-emerald-600 font-bold">9.00% - 21.00%</td>
                <td class="p-4">3 to 36 Months</td>
              </tr>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">Payday Loan</td>
                <td class="p-4 text-emerald-600 font-bold">1.50% - 3.00% (monthly)</td>
                <td class="p-4">30 to 90 Days</td>
              </tr>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="p-4 font-bold text-darkBlue">EDI Merchant Loan</td>
                <td class="p-4 text-emerald-600 font-bold">12.00% - 24.00%</td>
                <td class="p-4">Daily Repayments</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Representative Example -->
      <div class="p-6 bg-slate-50 border border-slate-200/60 rounded-2xl">
        <h3 class="font-display text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
          <i data-lucide="calculator" class="w-5 h-5 text-primary"></i>
          Representative Loan Calculation Example
        </h3>
        <p class="text-sm text-slate-600 mb-4 font-semibold">
          For a principal loan of ₹1,00,000 borrowed at an interest rate of 12.00% p.a. (reducing balance):
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-xs font-bold text-slate-700">
          <div class="p-4 bg-white border border-slate-150 rounded-xl">
            <p class="text-slate-500 uppercase text-[9px] mb-1">Tenure</p>
            <p class="text-slate-900 text-sm">12 Months</p>
          </div>
          <div class="p-4 bg-white border border-slate-150 rounded-xl">
            <p class="text-slate-500 uppercase text-[9px] mb-1">Monthly EMI</p>
            <p class="text-slate-900 text-sm">₹8,885</p>
          </div>
          <div class="p-4 bg-white border border-slate-150 rounded-xl">
            <p class="text-slate-500 uppercase text-[9px] mb-1">Total Interest</p>
            <p class="text-slate-900 text-sm text-emerald-600">₹6,620</p>
          </div>
          <div class="p-4 bg-white border border-slate-150 rounded-xl">
            <p class="text-slate-500 uppercase text-[9px] mb-1">Processing Fee (2%)</p>
            <p class="text-slate-900 text-sm">₹2,000 + GST</p>
          </div>
        </div>
        <p class="text-xs text-slate-500 mt-4 leading-relaxed font-semibold">
          Total amount repaid over 1 year will be ₹1,06,620. The Annual Percentage Rate (APR) including processing fees and stamp duty calculates to approximately **16.20%**.
        </p>
      </div>

      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">How Lenders Determine Interest Rates</h2>
        <p class="mb-4">
          Lending partners assess your credit risk profile using these main criteria:
        </p>
        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
            <div>
              <strong>CIBIL Score:</strong> Scores above 750 reflect strong credit health and help qualify you for lowest available interest rates.
            </div>
          </li>
          <li class="flex items-start gap-3">
            <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
            <div>
              <strong>Income Stability:</strong> Lenders review income continuity and employment status (Salaried vs. Self-Employed).
            </div>
          </li>
          <li class="flex items-start gap-3">
            <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0"><i data-lucide="check" class="w-3.5 h-3.5"></i></span>
            <div>
              <strong>Debt Burden:</strong> Lower current liabilities (FOIR ratio under 45%) suggest better debt capacity, reducing risk.
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
