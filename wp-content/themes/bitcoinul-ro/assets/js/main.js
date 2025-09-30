(function(){
  // GA4 click tracking for exchange CTA buttons
  function getExchangeName(el){
    // Prefer data-exchange, fallback to closest card heading
    var name = el.getAttribute('data-exchange');
    if (name) return name;
    try {
      var card = el.closest('.exchange-card');
      if (card) {
        var h = card.querySelector('.exchange-name, h3, h2, .exchange-header .exchange-name');
        if (h && h.textContent) return h.textContent.trim();
      }
    } catch(e){}
    return 'Unknown';
  }

  function fireGAEvent(exchangeName, href){
    if (typeof gtag === 'function') {
      gtag('event', 'click_exchange_cta', {
        event_category: 'engagement',
        event_label: exchangeName,
        exchange_name: exchangeName,
        link_url: href,
        outbound: true
      });
    } else if (window.dataLayer && Array.isArray(window.dataLayer)) {
      window.dataLayer.push({
        event: 'click_exchange_cta',
        exchange_name: exchangeName,
        link_url: href,
        outbound: true
      });
    }
  }

  function onClickCTA(e){
    var a = e.currentTarget;
    if (a && a.dataset && a.dataset.gaFired) { return; }
    var name = getExchangeName(a);
    var href = a.getAttribute('href') || '';
    // Fire GA event
    fireGAEvent(name, href);
    if (a && a.dataset) { a.dataset.gaFired = '1'; }
  }

  function init(){
    var links = document.querySelectorAll('a.exchange-cta');
    links.forEach(function(a){
      a.addEventListener('click', onClickCTA, {passive: true});
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  // Expose inline-compatible tracker for /exchange-uri/ template
  // Usage in HTML: onclick="trackAffiliateClick('Binance','cta_click')"
  // 'this' is expected to be the <a> element when used inline.
  window.trackAffiliateClick = function(exchangeName, action){
    try {
      var href = '';
      if (this && this.tagName === 'A') {
        if (this.dataset && this.dataset.gaFired) return true;
        href = this.getAttribute('href') || '';
      }
      // Fallback: try active element
      if (!href && document.activeElement && document.activeElement.tagName === 'A') {
        href = document.activeElement.getAttribute('href') || '';
      }
      fireGAEvent(exchangeName || 'Unknown', href);
      if (this && this.dataset) { this.dataset.gaFired = '1'; }
    } catch(e) { /* no-op */ }
    // Do not block navigation
    return true;
  };

  // Delegated listener for /exchange-uri/ page: capture clicks on CTA anchors
  // This covers anchors without the .exchange-cta class that live in cards.
  document.addEventListener('click', function(e){
    try {
      var a = e.target && e.target.closest && e.target.closest('.exchange-page .action-container a[href]');
      if (!a) return;
      if (a.dataset && a.dataset.gaFired) return;
      var name = getExchangeName(a);
      var href = a.getAttribute('href') || '';
      fireGAEvent(name, href);
      if (a.dataset) a.dataset.gaFired = '1';
    } catch(_) { /* ignore */ }
  }, true);
})();
