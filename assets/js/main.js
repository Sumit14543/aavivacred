/**
 * AavivaCred - Main Front-End JavaScript (Optimized & Accessible)
 */
document.addEventListener("DOMContentLoaded", () => {
  "use strict";

  // Mobile Menu Toggle & Accessibility
  const menuBtn = document.getElementById("mobile-menu-btn");
  const closeBtn = document.getElementById("close-menu-btn");
  const mobileMenu = document.getElementById("mobile-menu");
  const mobileMenuPanel = document.getElementById("mobile-menu-panel");

  if (menuBtn && closeBtn && mobileMenu) {
    const openMenu = () => {
      mobileMenu.classList.remove("opacity-0", "pointer-events-none");
      mobileMenu.classList.add("opacity-100", "pointer-events-auto");
      mobileMenu.setAttribute("aria-hidden", "false");
      if (mobileMenuPanel) {
        mobileMenuPanel.classList.remove("translate-x-full");
        mobileMenuPanel.classList.add("translate-x-0");
      }
    };

    const closeMenu = () => {
      mobileMenu.classList.remove("opacity-100", "pointer-events-auto");
      mobileMenu.classList.add("opacity-0", "pointer-events-none");
      mobileMenu.setAttribute("aria-hidden", "true");
      if (mobileMenuPanel) {
        mobileMenuPanel.classList.remove("translate-x-0");
        mobileMenuPanel.classList.add("translate-x-full");
      }
    };

    menuBtn.addEventListener("click", (e) => {
      e.preventDefault();
      openMenu();
    });

    closeBtn.addEventListener("click", (e) => {
      e.preventDefault();
      closeMenu();
    });

    mobileMenu.addEventListener("click", (e) => {
      if (e.target === mobileMenu) {
        closeMenu();
      }
    });

    // Close on Escape key press
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && !mobileMenu.classList.contains("opacity-0")) {
        closeMenu();
      }
    });
  }

  // Scroll to Top Button Interaction (Debounced Scroll Listener)
  const scrollToTopBtn = document.getElementById("scroll-to-top-btn");
  if (scrollToTopBtn) {
    let scrollTicking = false;
    window.addEventListener("scroll", () => {
      if (!scrollTicking) {
        window.requestAnimationFrame(() => {
          if (window.scrollY > 300) {
            scrollToTopBtn.classList.remove("opacity-0", "pointer-events-none");
            scrollToTopBtn.classList.add("opacity-100");
          } else {
            scrollToTopBtn.classList.remove("opacity-100");
            scrollToTopBtn.classList.add("opacity-0", "pointer-events-none");
          }
          scrollTicking = false;
        });
        scrollTicking = true;
      }
    }, { passive: true });

    scrollToTopBtn.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });
  }

  // Scroll Reveal Animations using IntersectionObserver
  const revealElements = document.querySelectorAll(".reveal-on-scroll");
  if (revealElements.length > 0 && "IntersectionObserver" in window) {
    const observerOptions = {
      root: null,
      rootMargin: "0px 0px -40px 0px",
      threshold: 0.1
    };

    const revealObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("reveal-visible");
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    revealElements.forEach(el => revealObserver.observe(el));
  }

  // Numeric Counter Interpolation Helper
  function animateNumber(element, target, prefix = "", suffix = "") {
    if (!element) return;
    
    if (element.animationId) {
      cancelAnimationFrame(element.animationId);
    }

    const currentText = element.innerText.replace(/[^0-9]/g, '');
    let start = parseInt(currentText) || 0;
    const diff = target - start;
    
    if (diff === 0) {
      element.innerText = prefix + target.toLocaleString('en-IN') + suffix;
      return;
    }
    
    const duration = 200;
    const startTime = performance.now();
    
    function update(currentTime) {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      
      const ease = progress * (2 - progress);
      const current = Math.round(start + diff * ease);
      
      element.innerText = prefix + current.toLocaleString('en-IN') + suffix;
      
      if (progress < 1) {
        element.animationId = requestAnimationFrame(update);
      }
    }
    element.animationId = requestAnimationFrame(update);
  }

  // Hero Slider
  const slides = document.querySelector(".buddy-slides");
  const dots = document.querySelectorAll(".buddy-dot");
  let currentSlide = 0;
  const slideCount = dots.length;
  let slideInterval;

  function showSlide(index) {
    if (!slides || slideCount === 0) return;
    currentSlide = (index + slideCount) % slideCount;
    slides.style.transform = `translateX(-${currentSlide * (100 / slideCount)}%)`;
    
    dots.forEach((dot, idx) => {
      if (idx === currentSlide) {
        dot.classList.add("active");
        dot.setAttribute("aria-selected", "true");
      } else {
        dot.classList.remove("active");
        dot.setAttribute("aria-selected", "false");
      }
    });
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  function startSlideShow() {
    if (!slides || slideCount === 0) return;
    slideInterval = setInterval(nextSlide, 5000);
  }

  function resetSlideShow() {
    clearInterval(slideInterval);
    startSlideShow();
  }

  if (slideCount > 0 && slides) {
    dots.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        showSlide(index);
        resetSlideShow();
      });
    });
    startSlideShow();
  }

  // EMI Calculator
  const amountSlider = document.getElementById("amount-slider");
  const rateSlider = document.getElementById("rate-slider");
  const tenureSlider = document.getElementById("tenure-slider");
  
  const amountDisplay = document.getElementById("amount-display");
  const rateDisplay = document.getElementById("rate-display");
  const tenureDisplay = document.getElementById("tenure-display");
  
  const summaryEmi = document.getElementById("summary-emi");
  const summaryInterest = document.getElementById("summary-interest");
  const summaryTotal = document.getElementById("summary-total");

  function calculateEmi(useAnimation = true) {
    if (!amountSlider || !rateSlider || !tenureSlider || !amountDisplay || !rateDisplay || !tenureDisplay || !summaryEmi || !summaryInterest || !summaryTotal) return;
    
    const principal = parseInt(amountSlider.value);
    const ratePA = parseFloat(rateSlider.value);
    const tenureMonths = parseInt(tenureSlider.value);
    
    const r = (ratePA / 12) / 100;
    
    let emi = 0;
    if (r > 0) {
      const x = Math.pow(1 + r, tenureMonths);
      emi = Math.round((principal * r * x) / (x - 1));
    } else {
      emi = Math.round(principal / tenureMonths);
    }
    
    const totalRepayment = emi * tenureMonths;
    const totalInterest = totalRepayment - principal;
    
    if (useAnimation) {
      animateNumber(amountDisplay, principal, "₹");
      rateDisplay.innerText = ratePA + "%";
      tenureDisplay.innerText = tenureMonths + " Months";
      
      animateNumber(summaryEmi, emi, "₹");
      animateNumber(summaryInterest, Math.round(totalInterest), "₹");
      animateNumber(summaryTotal, Math.round(totalRepayment), "₹");
    } else {
      amountDisplay.innerText = "₹" + principal.toLocaleString('en-IN');
      rateDisplay.innerText = ratePA + "%";
      tenureDisplay.innerText = tenureMonths + " Months";
      
      summaryEmi.innerText = "₹" + emi.toLocaleString('en-IN');
      summaryInterest.innerText = "₹" + Math.round(totalInterest).toLocaleString('en-IN');
      summaryTotal.innerText = "₹" + Math.round(totalRepayment).toLocaleString('en-IN');
    }
  }

  if (amountSlider) amountSlider.addEventListener("input", () => calculateEmi(true));
  if (rateSlider) rateSlider.addEventListener("input", () => calculateEmi(true));
  if (tenureSlider) tenureSlider.addEventListener("input", () => calculateEmi(true));
  
  if (amountSlider && rateSlider && tenureSlider) {
    calculateEmi(false);
  }

  // Collapsible FAQ Accordion Toggle
  const faqItems = document.querySelectorAll(".faq-item");
  faqItems.forEach(item => {
    const trigger = item.querySelector(".faq-trigger");
    if (trigger) {
      trigger.addEventListener("click", () => {
        const isActive = item.classList.contains("active");
        
        faqItems.forEach(otherItem => {
          if (otherItem !== item) {
            otherItem.classList.remove("active");
            otherItem.setAttribute("aria-expanded", "false");
          }
        });
        
        if (isActive) {
          item.classList.remove("active");
          item.setAttribute("aria-expanded", "false");
        } else {
          item.classList.add("active");
          item.setAttribute("aria-expanded", "true");
        }
      });
    }
  });

  // Re-initialize Lucide Icons if loaded
  if (window.lucide) {
    window.lucide.createIcons();
  }
});
