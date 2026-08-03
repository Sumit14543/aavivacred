<?php
$page_title = "Grievance Redressal Mechanism";
include '../includes/header.php';
?>

<!-- Hero Section -->
<section class="relative pt-24 pb-12 overflow-hidden bg-mesh reveal-on-scroll">
  <div class="container mx-auto px-4 relative z-10 text-center max-w-4xl">
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-bold mb-6 border border-primary/20 backdrop-blur-sm shadow-sm">
      <i data-lucide="help-circle" class="w-4 h-4 text-primary"></i> Complaint Redressal
    </div>
    <h1 class="font-display text-4xl md:text-5xl font-extrabold tracking-tight mb-4 text-slate-900 leading-tight">
      Grievance & <span class="text-gradient">Escalation Matrix</span>
    </h1>
    <p class="text-slate-600 text-lg max-w-2xl mx-auto">
      Review our structured customer complaint resolution channel and Grievance Officer contact details.
    </p>
  </div>
</section>

<!-- Content Section -->
<section class="py-12 bg-white relative">
  <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
    <div class="glass-card rounded-3xl p-8 md:p-12 bg-white shadow-xl border border-slate-150 space-y-8 text-slate-700 leading-relaxed font-medium reveal-on-scroll delay-100">
      
      <div>
        <h2 class="font-display text-2xl font-bold text-slate-900 mb-4">Our Customer Commitment</h2>
        <p class="mb-4">
          AavivaCred values your experience. We are committed to addressing any issues related to our referral service, data processing, and platform operations within defined timelines.
        </p>
      </div>

      <!-- Level 1: Support Helpdesk -->
      <div class="p-6 bg-slate-50 border border-slate-200/60 rounded-2xl">
        <h3 class="font-display text-lg font-bold text-slate-900 mb-2 flex items-center gap-2">
          <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs font-bold">Level 1</span>
          Support Helpdesk
        </h3>
        <p class="text-sm text-slate-600 mb-3">
          For basic queries, application status, or feedback, you can contact our primary support channel:
        </p>
        <ul class="text-sm space-y-1.5 text-slate-700 font-semibold">
          <li>Email: <a href="mailto:support@aavivacred.com" class="text-primary hover:underline">support@aavivacred.com</a></li>
          <li>Hotline Support: +91 9711149319</li>
          <li>Working Hours: Monday to Saturday (9:30 AM to 6:30 PM)</li>
        </ul>
        <p class="text-xs text-slate-500 mt-3 font-medium">Turnaround Time: Queries are typically resolved within 5 to 7 business days.</p>
      </div>

      <!-- Level 2: Grievance Redressal Officer -->
      <div class="p-6 bg-slate-50 border border-slate-200/60 rounded-2xl">
        <h3 class="font-display text-lg font-bold text-slate-900 mb-2 flex items-center gap-2">
          <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs font-bold">Level 2</span>
          Grievance Officer
        </h3>
        <p class="text-sm text-slate-600 mb-3">
          If your complaint remains unresolved at Level 1, or if you are not satisfied with the support response, you can escalate the matter directly to our Grievance Redressal Officer:
        </p>
        <ul class="text-sm space-y-1.5 text-slate-700 font-semibold">
          <li>Designation: Grievance Redressal Officer</li>
          <li>Corporate Address: 71 Navyug Market, Ghaziabad, Uttar Pradesh - 201001</li>
          <li>Phone Contact: +91 9711149319</li>
          <li>Escalation Email: <a href="mailto:grievance@aavivacred.com" class="text-primary hover:underline">grievance@aavivacred.com</a></li>
        </ul>
        <p class="text-xs text-slate-500 mt-3 font-medium">Turnaround Time: Resolved within 15 business days of ticket receipt.</p>
      </div>

      <!-- Level 3: Ombudsman Escalation -->
      <div class="p-6 bg-slate-50 border border-slate-200/60 rounded-2xl">
        <h3 class="font-display text-lg font-bold text-slate-900 mb-2 flex items-center gap-2">
          <span class="w-6 h-6 rounded-full bg-primary/10 text-primary flex items-center justify-center text-xs font-bold">Level 3</span>
          Regulatory Redressal
        </h3>
        <p class="text-sm text-slate-600 leading-relaxed">
          If your loan query relates to an issue with a partner bank/NBFC (such as collections harassment, repayment delays, or foreclosure calculations), we recommend lodging a complaint directly with the lender's nodal officer. 
        </p>
        <p class="text-sm text-slate-600 mt-2">
          If your concern is not resolved by the lender within 30 days, you can lodge an online grievance with the Reserve Bank of India (RBI) Ombudsman through their CMS Portal at <a href="https://cms.rbi.org.in" target="_blank" rel="noopener noreferrer" class="text-primary hover:underline font-bold">cms.rbi.org.in</a> or through the Sachet portal.
        </p>
      </div>

      <div class="border-t border-slate-150 pt-8 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-slate-500 font-semibold">
        <span>Last Updated: July 2026</span>
        <span>Version 2.0</span>
      </div>

    </div>
  </div>
</section>

<?php include '../includes/footer.php'; ?>
