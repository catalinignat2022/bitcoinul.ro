<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Meta Tags optimizate pentru Bitcoin România -->
    <meta name="description" content="<?php echo get_bloginfo('description') ?: 'Cele mai bune exchange-uri Bitcoin din România. Comparații, recenzii și ghiduri pentru cumpărarea Bitcoin în siguranță cu comisioane mici.'; ?>">
    <meta name="keywords" content="bitcoin romania, exchange bitcoin, cumpar bitcoin, vand bitcoin, platforma bitcoin, binance romania, coinbase romania, crypto romania">
    <meta name="author" content="<?php echo get_bloginfo('name'); ?>">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph pentru Social Media -->
    <meta property="og:title" content="<?php echo is_home() ? get_bloginfo('name') . ' - ' . get_bloginfo('description') : wp_get_document_title(); ?>">
    <meta property="og:description" content="<?php echo get_bloginfo('description') ?: 'Ghidul complet pentru cumpărarea Bitcoin în România. Exchange-uri verificate, comisioane mici, tranzacții sigure.'; ?>">
    <meta property="og:type" content="<?php echo is_single() ? 'article' : 'website'; ?>">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:locale" content="ro_RO">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo is_home() ? get_bloginfo('name') . ' - ' . get_bloginfo('description') : wp_get_document_title(); ?>">
    <meta name="twitter:description" content="<?php echo get_bloginfo('description') ?: 'Exchange-uri Bitcoin România verificate pentru siguranță maximă'; ?>">
    
    <!-- Schema.org pentru SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "<?php bloginfo('name'); ?>",
        "description": "<?php bloginfo('description'); ?>",
        "url": "<?php echo home_url(); ?>",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?php echo home_url(); ?>/?s={search_term_string}",
            "query-input": "required name=search_term_string"
        },
        "publisher": {
            "@type": "Organization",
            "name": "<?php bloginfo('name'); ?>",
            "url": "<?php echo home_url(); ?>"
        }
    }
    </script>
    
    <!-- Preconnect pentru optimizarea performanței -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://api.coingecko.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Canonical URL pentru SEO -->
    <link rel="canonical" href="<?php echo get_permalink(); ?>">
    
    <!-- Favicon și iconițe -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E₿%3C/text%3E%3C/svg%3E">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/apple-touch-icon.png">
    
    <!-- Google tag (gtag.js) pentru Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TS60H80BJ7"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-TS60H80BJ7', {
        // Configurări suplimentare pentru urmărire avansată
        page_title: document.title,
        page_location: window.location.href,
        send_page_view: true,
        // Enhanced ecommerce pentru affiliate tracking
        custom_map: {
          'custom_parameter_1': 'exchange_click',
          'custom_parameter_2': 'guide_engagement'
        }
      });

      // Funcție pentru urmărirea evenimentelor custom
      function trackEvent(eventName, eventCategory, eventLabel, value) {
        gtag('event', eventName, {
          event_category: eventCategory,
          event_label: eventLabel,
          value: value
        });
      }

      // Funcție pentru urmărirea click-urilor pe link-urile afiliate
      function trackAffiliateClick(exchangeName, linkType) {
        gtag('event', 'affiliate_click', {
          event_category: 'affiliate_marketing',
          event_label: exchangeName + '_' + linkType,
          custom_parameter_1: 'exchange_click'
        });
      }

      // Funcție pentru urmărirea angajamentului cu ghidurile
      function trackGuideEngagement(guideName, action) {
        gtag('event', 'guide_interaction', {
          event_category: 'content_engagement',
          event_label: guideName + '_' + action,
          custom_parameter_2: 'guide_engagement'
        });
      }

      // Funcție pentru urmărirea timpului petrecut pe pagină
      function trackTimeOnPage() {
        let startTime = Date.now();
        
        window.addEventListener('beforeunload', function() {
          let timeSpent = Math.round((Date.now() - startTime) / 1000);
          gtag('event', 'time_on_page', {
            event_category: 'engagement',
            event_label: document.title,
            value: timeSpent
          });
        });
      }
      
      // Inițializează urmărirea timpului
      trackTimeOnPage();
    </script>
    
    <?php wp_head(); ?>
    
    <!-- CSS personalizat pentru optimizări -->
    <style>
        /* Optimizări critice pentru viteza de încărcare */
        body { font-display: swap; }
        img { loading: lazy; }
        
        /* Stiluri critice pentru Above the Fold */
        .site-header {
            background: linear-gradient(135deg, #1a1d23 0%, #2c3e50 100%);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .hero-section {
            background: linear-gradient(135deg, #f7931a 0%, #ff6b00 100%);
            padding: 4rem 0;
            margin-top: 80px;
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    
    <header class="site-header" role="banner">
        <div class="container">
            <div class="header-content">
                
                <!-- Logo și branding -->
                <div class="site-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="bitcoinul.ro - Acasă">
                        <span class="btc-symbol" aria-hidden="true">₿</span>
                        <h1>bitcoinul.ro</h1>
                    </a>
                </div>
                
                <!-- Navigația principală -->
                <nav class="main-navigation" role="navigation" aria-label="Meniul principal">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => function() {
                            // Meniu de rezervă dacă nu este setat unul custom
                            echo '<ul id="primary-menu">';
                            echo '<li><a href="' . esc_url(home_url('/')) . '">Acasă</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/exchange-uri/')) . '">Exchange-uri</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/ghiduri/')) . '">Ghiduri</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/stiri/')) . '">Știri</a></li>';
                            echo '<li><a href="#exchange-uri-bitcoin" class="cta-button" onclick="trackEvent(\'cta_click\', \'navigation\', \'header_start_investing\'); return true;">Începe Investiția</a></li>';
                            echo '</ul>';
                        }
                    ));
                    ?>
                </nav>
                
                <!-- Buton mobil pentru meniu -->
                <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false" style="display: none;">
                    <span class="sr-only">Deschide meniul</span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
                
            </div>
        </div>
    </header>

    <!-- Skip link pentru accesibilitate -->
    <a class="sr-only" href="#main">Sari la conținutul principal</a>
    
    <div id="content" class="site-content">

<!-- CSS și JavaScript pentru meniul mobil -->
<style>
@media (max-width: 768px) {
    .mobile-menu-toggle {
        display: block !important;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
        position: relative;
        width: 30px;
        height: 30px;
    }
    
    .hamburger-line {
        display: block;
        width: 25px;
        height: 3px;
        background-color: var(--white);
        margin: 5px 0;
        transition: 0.3s;
        border-radius: 2px;
    }
    
    .main-navigation {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: var(--dark-bg);
        border-top: 1px solid rgba(255,255,255,0.1);
        transform: translateY(-100%);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 999;
    }
    
    .main-navigation.active {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }
    
    .main-navigation ul {
        flex-direction: column !important;
        padding: 1rem 0;
        gap: 0 !important;
    }
    
    .main-navigation li {
        text-align: center;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    
    .main-navigation a {
        display: block;
        padding: 1rem !important;
        border-radius: 0 !important;
    }
    
    /* Animație hamburger activ */
    .mobile-menu-toggle.active .hamburger-line:nth-child(1) {
        transform: rotate(-45deg) translate(-5px, 6px);
    }
    
    .mobile-menu-toggle.active .hamburger-line:nth-child(2) {
        opacity: 0;
    }
    
    .mobile-menu-toggle.active .hamburger-line:nth-child(3) {
        transform: rotate(45deg) translate(-5px, -6px);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const navigation = document.querySelector('.main-navigation');
    
    if (mobileToggle && navigation) {
        mobileToggle.addEventListener('click', function() {
            const isActive = navigation.classList.contains('active');
            
            if (isActive) {
                navigation.classList.remove('active');
                mobileToggle.classList.remove('active');
                mobileToggle.setAttribute('aria-expanded', 'false');
            } else {
                navigation.classList.add('active');
                mobileToggle.classList.add('active');
                mobileToggle.setAttribute('aria-expanded', 'true');
            }
        });
        
        // Închide meniul când se face click pe un link
        navigation.addEventListener('click', function(e) {
            if (e.target.tagName === 'A') {
                navigation.classList.remove('active');
                mobileToggle.classList.remove('active');
                mobileToggle.setAttribute('aria-expanded', 'false');
            }
        });
        
        // Închide meniul când se face click în afara lui
        document.addEventListener('click', function(e) {
            if (!navigation.contains(e.target) && !mobileToggle.contains(e.target)) {
                navigation.classList.remove('active');
                mobileToggle.classList.remove('active');
                mobileToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }
});
</script>