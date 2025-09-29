    </div><!-- #content -->

    <footer class="site-footer" role="contentinfo">
        <div class="container">
            
            <div class="footer-content">
                
                <!-- Secțiunea 1: Despre Bitcoinul.ro -->
                <div class="footer-section">
                    <h3>Despre Bitcoinul.ro</h3>
                    <p style="color: rgba(255,255,255,0.8); line-height: 1.6; margin-bottom: 1rem;">
                        Platforma ta de încredere pentru investiții în Bitcoin în România. 
                        Comparăm cele mai bune exchange-uri și îți oferim ghiduri complete pentru începători.
                    </p>
                    <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                        <a href="https://facebook.com/bitcoinulro" 
                           target="_blank" 
                           rel="noopener" 
                           style="color: var(--bitcoin-orange); font-size: 1.5rem;" 
                           title="Urmărește-ne pe Facebook" 
                           aria-label="Facebook"
                           onclick="trackEvent('social_media_click', 'engagement', 'facebook_footer'); return true;">📘</a>
                        <a href="https://twitter.com/bitcoinulro" 
                           target="_blank" 
                           rel="noopener" 
                           style="color: var(--bitcoin-orange); font-size: 1.5rem;" 
                           title="Urmărește-ne pe Twitter" 
                           aria-label="Twitter"
                           onclick="trackEvent('social_media_click', 'engagement', 'twitter_footer'); return true;">🐦</a>
                        <a href="https://t.me/bitcoinulro" 
                           target="_blank" 
                           rel="noopener" 
                           style="color: var(--bitcoin-orange); font-size: 1.5rem;" 
                           title="Alătură-te grupului Telegram" 
                           aria-label="Telegram"
                           onclick="trackEvent('social_media_click', 'engagement', 'telegram_footer'); return true;">✈️</a>
                        <a href="https://youtube.com/bitcoinulro" 
                           target="_blank" 
                           rel="noopener" 
                           style="color: var(--bitcoin-orange); font-size: 1.5rem;" 
                           title="Urmărește-ne pe YouTube" 
                           aria-label="YouTube"
                           onclick="trackEvent('social_media_click', 'engagement', 'youtube_footer'); return true;">📺</a>
                    </div>
                </div>

                <!-- Secțiunea 2: Exchange-uri Recomandate -->
                <div class="footer-section">
                    <h3>Exchange-uri Bitcoin</h3>
                    <ul>
                        <li><a href="https://accounts.binance.com/en/register?ref=21315882" target="_blank" rel="nofollow sponsored noopener noreferrer">Binance România</a></li>
                        <li><a href="https://www.bybit.com/en/invite/?ref=ZW6OLQ" target="_blank" rel="nofollow sponsored noopener noreferrer">Bybit</a></li>
                        <li><a href="https://revolut.com/referral/?referral-code=cataliuiy!SEP1-25-AR-H3&amp;geo-redirect" target="_blank" rel="nofollow sponsored noopener noreferrer">Revolut</a></li>
                        <li><a href="#kraken-affiliate" rel="nofollow sponsored">Kraken Exchange</a></li>
                        <li><a href="#crypto-com-affiliate" rel="nofollow sponsored">Crypto.com</a></li>
                        <li><a href="<?php echo esc_url(home_url('/comparatie-exchange-uri/')); ?>">Compară toate →</a></li>
                    </ul>
                </div>

                <!-- Secțiunea 3: Resurse utile -->
                <div class="footer-section">
                    <h3>Resurse Bitcoin</h3>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/ghid-bitcoin-incepatori/')); ?>">Ghid pentru începători</a></li>
                        <li><a href="<?php echo esc_url(home_url('/cum-cumpar-bitcoin/')); ?>">Cum cumpăr Bitcoin?</a></li>
                        <li><a href="<?php echo esc_url(home_url('/portofel-bitcoin-sigur/')); ?>">Portofele Bitcoin sigure</a></li>
                        <li><a href="<?php echo esc_url(home_url('/taxe-bitcoin-romania/')); ?>">Taxe Bitcoin în România</a></li>
                        <li><a href="<?php echo esc_url(home_url('/stiri-bitcoin/')); ?>">Știri Bitcoin</a></li>
                        <li><a href="<?php echo esc_url(home_url('/calculatoare-bitcoin/')); ?>">Calculatoare crypto</a></li>
                    </ul>
                </div>

                <!-- Secțiunea 4: Informații Legale -->
                <div class="footer-section">
                    <h3>Informații Legale</h3>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/despre/')); ?>">Despre noi</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                        <li><a href="<?php echo esc_url(home_url('/termeni-conditii/')); ?>">Termeni și condiții</a></li>
                        <li><a href="<?php echo esc_url(home_url('/politica-confidentialitate/')); ?>">Politica de confidențialitate</a></li>
                        <li><a href="<?php echo esc_url(home_url('/disclaimer-investitii/')); ?>">Disclaimer investiții</a></li>
                        <li><a href="<?php echo esc_url(home_url('/affiliate-disclosure/')); ?>">Affiliate Disclosure</a></li>
                    </ul>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div style="margin-bottom: 1rem; padding: 1rem; background-color: rgba(247, 147, 26, 0.1); border-radius: 8px; color: rgba(255,255,255,0.9);">
                    <strong>⚠️ Avertisment important despre investiții:</strong><br>
                    Bitcoin și criptomonedele sunt investiții cu risc ridicat. Prețurile pot fluctua semnificativ. 
                    Nu investi mai mult decât îți permiți să pierzi. Această platformă conține linkuri de afiliere. 
                    Cercetează întotdeauna înainte de a investi.
                </div>
                
                <p>&copy; <?php echo date('Y'); ?> <strong><?php bloginfo('name'); ?></strong> - Toate drepturile rezervate.</p>
                <p style="margin-top: 0.5rem; font-size: 0.9rem;">
                    Dezvoltat cu ❤️ pentru comunitatea Bitcoin din România. 
                    <span style="color: var(--bitcoin-orange);">Powered by WordPress</span>
                </p>
                
                <!-- Schema.org pentru footer -->
                <div itemscope itemtype="https://schema.org/Organization" style="display: none;">
                    <span itemprop="name"><?php bloginfo('name'); ?></span>
                    <span itemprop="url"><?php echo home_url(); ?></span>
                    <span itemprop="description"><?php bloginfo('description'); ?></span>
                    <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <span itemprop="addressCountry">România</span>
                    </div>
                </div>
            </div>
            
        </div>
    </footer>

</div><!-- #page -->

<!-- Buton Back to Top -->
<button id="back-to-top" title="Înapoi sus" style="display: none; position: fixed; bottom: 20px; right: 20px; background: linear-gradient(135deg, var(--bitcoin-orange), var(--bitcoin-dark)); color: white; border: none; border-radius: 50%; width: 50px; height: 50px; font-size: 1.2rem; cursor: pointer; box-shadow: var(--shadow); z-index: 999; transition: all 0.3s ease;">
    ↑
</button>

<!-- Cookie Consent (GDPR) -->
<div id="cookie-consent" style="display: none; position: fixed; bottom: 0; left: 0; right: 0; background: var(--dark-bg); color: white; padding: 1rem; z-index: 1001; box-shadow: 0 -4px 15px rgba(0,0,0,0.2);">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
        <div style="flex: 1; min-width: 300px;">
            <p style="margin: 0;">
                🍪 Folosim cookie-uri pentru a îmbunătăți experiența ta pe site și pentru a afișa reclame relevante. 
                <a href="<?php echo esc_url(home_url('/politica-confidentialitate/')); ?>" style="color: var(--bitcoin-orange);">Află mai multe</a>
            </p>
        </div>
        <div style="display: flex; gap: 1rem;">
            <button onclick="acceptCookies()" style="background: var(--bitcoin-orange); color: white; border: none; padding: 0.5rem 1rem; border-radius: 5px; cursor: pointer;">Accept</button>
            <button onclick="declineCookies()" style="background: transparent; color: white; border: 1px solid white; padding: 0.5rem 1rem; border-radius: 5px; cursor: pointer;">Refuz</button>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<!-- JavaScript pentru funcționalități -->
<script>
// Back to Top Button
window.addEventListener('scroll', function() {
    const backToTop = document.getElementById('back-to-top');
    if (window.pageYOffset > 300) {
        backToTop.style.display = 'block';
    } else {
        backToTop.style.display = 'none';
    }
});

document.getElementById('back-to-top').addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Cookie Consent
function showCookieConsent() {
    if (!localStorage.getItem('cookieConsent')) {
        document.getElementById('cookie-consent').style.display = 'block';
    }
}

function acceptCookies() {
    localStorage.setItem('cookieConsent', 'accepted');
    document.getElementById('cookie-consent').style.display = 'none';
    
    // Încarcă Google Analytics sau alte scripturi de tracking aici
    // gtag('config', 'GA_MEASUREMENT_ID');
}

function declineCookies() {
    localStorage.setItem('cookieConsent', 'declined');
    document.getElementById('cookie-consent').style.display = 'none';
}

// Afișează cookie consent după 2 secunde
setTimeout(showCookieConsent, 2000);

// Smooth scrolling pentru toate linkurile interne
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const headerHeight = document.querySelector('.site-header').offsetHeight;
            const targetPosition = target.offsetTop - headerHeight - 20;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    });
});

// Lazy loading pentru imagini (pentru browsere mai vechi)
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                observer.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
}

// Tracking pentru linkurile de afiliere (opțional)
function trackAffiliateClick(platform) {
    // Aici poți adăuga Google Analytics event tracking
    if (typeof gtag !== 'undefined') {
        gtag('event', 'click', {
            'event_category': 'Affiliate',
            'event_label': platform,
            'value': 1
        });
    }
    
    console.log('Affiliate click tracked:', platform);
}

// Adaugă tracking pe linkurile de afiliere
document.querySelectorAll('a[rel*="sponsored"]').forEach(link => {
    link.addEventListener('click', function() {
        const platform = this.textContent.trim();
        trackAffiliateClick(platform);
    });
});

// Performance monitoring
window.addEventListener('load', function() {
    // Raportează timpul de încărcare pentru optimizare
    const loadTime = performance.now();
    console.log('Pagina s-a încărcat în:', Math.round(loadTime), 'ms');
    
    // Aici poți trimite datele către Google Analytics
    if (typeof gtag !== 'undefined') {
        gtag('event', 'timing_complete', {
            'name': 'load',
            'value': Math.round(loadTime)
        });
    }
});
</script>

<!-- Schema.org pentru site-ul întreg -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FinancialService",
    "name": "<?php bloginfo('name'); ?>",
    "description": "<?php bloginfo('description'); ?>",
    "url": "<?php echo home_url(); ?>",
    "logo": "<?php echo get_template_directory_uri(); ?>/assets/logo.png",
    "sameAs": [
        "https://facebook.com/bitcoinulro",
        "https://twitter.com/bitcoinulro",
        "https://t.me/bitcoinulro"
    ],
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "RO"
    },
    "serviceType": "Compararea platformelor de tranzacționare Bitcoin",
    "areaServed": "România",
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Exchange-uri Bitcoin România",
        "itemListElement": [
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Binance România",
                    "description": "Platforma de tranzacționare Bitcoin cu cele mai mici comisioane"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Bybit",
                    "description": "Exchange-ul cel mai sigur pentru Bitcoin în România"
                }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Service",
                        "name": "Revolut",
                        "description": "Cumpărare instantă de Bitcoin în aplicația Revolut"
                    }
                }
        ]
    }
}
</script>

<!-- Script avansat pentru tracking Analytics -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tracking pentru scroll depth
    let scrollDepthTracked = {
        25: false,
        50: false,
        75: false,
        100: false
    };

    function trackScrollDepth() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const documentHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrollPercent = Math.round((scrollTop / documentHeight) * 100);

        // Track la diferite procente de scroll
        for (let threshold in scrollDepthTracked) {
            if (scrollPercent >= threshold && !scrollDepthTracked[threshold]) {
                scrollDepthTracked[threshold] = true;
                gtag('event', 'scroll_depth', {
                    event_category: 'engagement',
                    event_label: threshold + '%',
                    value: parseInt(threshold)
                });
            }
        }
    }

    // Tracking pentru click-uri pe link-uri externe
    function trackExternalLinks() {
        const externalLinks = document.querySelectorAll('a[href^="http"]:not([href*="' + window.location.hostname + '"])');
        
        externalLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                const linkText = this.textContent.trim();
                
                gtag('event', 'external_link_click', {
                    event_category: 'outbound',
                    event_label: href,
                    transport_type: 'beacon'
                });
            });
        });
    }

    // Tracking pentru interacțiuni cu formulare
    function trackFormInteractions() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(function(form) {
            // Track când utilizatorul începe să completeze formularul
            form.addEventListener('focusin', function(e) {
                gtag('event', 'form_start', {
                    event_category: 'engagement',
                    event_label: 'form_interaction'
                });
            }, { once: true });

            // Track submit-ul formularului
            form.addEventListener('submit', function(e) {
                gtag('event', 'form_submit', {
                    event_category: 'conversion',
                    event_label: 'form_completion'
                });
            });
        });
    }

    // Tracking pentru video interactions (dacă există)
    function trackVideoInteractions() {
        const videos = document.querySelectorAll('video, iframe[src*="youtube"], iframe[src*="vimeo"]');
        
        videos.forEach(function(video) {
            if (video.tagName === 'VIDEO') {
                video.addEventListener('play', function() {
                    gtag('event', 'video_play', {
                        event_category: 'engagement',
                        event_label: 'video_content'
                    });
                });
                
                video.addEventListener('ended', function() {
                    gtag('event', 'video_complete', {
                        event_category: 'engagement',
                        event_label: 'video_content'
                    });
                });
            }
        });
    }

    // Tracking pentru download-uri
    function trackDownloads() {
        const downloadLinks = document.querySelectorAll('a[href$=".pdf"], a[href$=".zip"], a[href$=".doc"], a[href$=".docx"], a[href$=".xls"], a[href$=".xlsx"]');
        
        downloadLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const fileName = this.getAttribute('href').split('/').pop();
                
                gtag('event', 'file_download', {
                    event_category: 'engagement',
                    event_label: fileName
                });
            });
        });
    }

    // Tracking pentru search queries
    function trackSearchQueries() {
        const searchForms = document.querySelectorAll('form[role="search"], .search-form, #searchform');
        
        searchForms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                const searchInput = this.querySelector('input[type="search"], input[name="s"]');
                const query = searchInput ? searchInput.value.trim() : '';
                
                if (query) {
                    gtag('event', 'search', {
                        event_category: 'engagement',
                        search_term: query
                    });
                }
            });
        });
    }

    // Tracking pentru read time (estimare)
    function trackReadTime() {
        let readingTime = 0;
        let isReading = true;
        
        // Detectează când utilizatorul nu citește (tab nu este activ)
        document.addEventListener('visibilitychange', function() {
            isReading = !document.hidden;
        });

        // Urmărește timpul de citire
        setInterval(function() {
            if (isReading) {
                readingTime += 5; // incrementează cu 5 secunde
                
                // Trimite evenimente la intervale specifice
                if (readingTime === 30) { // 30 secunde
                    gtag('event', 'read_time', {
                        event_category: 'engagement',
                        event_label: '30_seconds',
                        value: 30
                    });
                } else if (readingTime === 60) { // 1 minut
                    gtag('event', 'read_time', {
                        event_category: 'engagement',
                        event_label: '1_minute',
                        value: 60
                    });
                } else if (readingTime === 180) { // 3 minute
                    gtag('event', 'read_time', {
                        event_category: 'engagement',
                        event_label: '3_minutes',
                        value: 180
                    });
                }
            }
        }, 5000); // verifică la fiecare 5 secunde
    }

    // Tracking pentru error 404
    if (document.body.classList.contains('error404')) {
        gtag('event', 'page_404', {
            event_category: 'error',
            event_label: window.location.pathname
        });
    }

    // Tracking pentru device type
    function trackDeviceInfo() {
        let deviceType = 'desktop';
        if (window.innerWidth <= 768) {
            deviceType = 'mobile';
        } else if (window.innerWidth <= 1024) {
            deviceType = 'tablet';
        }

        gtag('event', 'device_info', {
            event_category: 'technical',
            event_label: deviceType,
            custom_parameter_1: deviceType
        });
    }

    // Inițializează toate tracking-urile
    window.addEventListener('scroll', trackScrollDepth);
    trackExternalLinks();
    trackFormInteractions();
    trackVideoInteractions();
    trackDownloads();
    trackSearchQueries();
    trackReadTime();
    trackDeviceInfo();

    // Tracking pentru page engagement score
    setTimeout(function() {
        gtag('event', 'page_engagement', {
            event_category: 'engagement',
            event_label: 'engaged_user',
            value: 1
        });
    }, 30000); // După 30 secunde pe pagină
});

// Tracking pentru erori JavaScript
window.addEventListener('error', function(e) {
    gtag('event', 'javascript_error', {
        event_category: 'error',
        event_label: e.message,
        value: 0
    });
});
</script>

</body>
</html>