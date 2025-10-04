<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO Meta Tags optimizate pentru Bitcoin România -->
    <?php
      // Meta Description dinamic: excerpt pentru single/page, descrierea termenului pe arhive, fallback la tagline
      $meta_description = '';
      if (is_singular()) {
          $excerpt = get_the_excerpt();
          if ($excerpt) {
              $meta_description = wp_strip_all_tags($excerpt);
          } else {
              $content = get_post_field('post_content', get_the_ID());
              if ($content) $meta_description = wp_strip_all_tags(wp_trim_words($content, 35, ''));
          }
      } elseif (is_category() || is_tag() || is_tax()) {
          $term = get_queried_object();
          if ($term && !is_wp_error($term)) {
              $meta_description = wp_strip_all_tags(term_description($term));
          }
      }
      if (!$meta_description) {
          $meta_description = get_bloginfo('description') ?: 'Comparăm exchange-uri Bitcoin din România: comisioane, securitate, ghiduri. Vezi topul 2025 și începe în siguranță.';
      }
      if (is_home() || is_front_page()) {
          $meta_description = 'Învață cum să cumperi Bitcoin în România în 2025. Ghiduri, comparații de platforme și sfaturi de securitate — începe aici pe Bitcoinul.ro.';
      }
      // Descrieri unice pentru pagini/șabloane cheie
      if (function_exists('is_page_template')) {
          if (is_page_template('page-exchange-uri.php')) {
              $meta_description = 'Top exchange-uri Bitcoin 2025 pentru România: comisioane mici, metode de depunere RON, securitate și bonusuri. Comparație rapidă și recomandări.';
          } elseif (is_page_template('page-ghiduri.php')) {
              $meta_description = 'Ghiduri Bitcoin în limba română: începători, securitate, investiții (DCA), trading și fiscalitate. Explicații clare pas cu pas.';
          } elseif (is_page_template('page-cum-cumpar-bitcoin.php')) {
              $meta_description = 'Cum cumperi Bitcoin în România, pas cu pas: cont, KYC, depunere RON și cumpărare BTC pe spot. Tutorial rapid pentru începători.';
          } elseif (is_page_template('page-portofel-bitcoin-sigur.php')) {
              $meta_description = 'Portofele Bitcoin sigure: hardware wallet, seed phrase, 2FA, self‑custody. Învață cum îți protejezi BTC în România în 2025.';
          } elseif (is_page_template('page-taxe-bitcoin-romania.php')) {
              $meta_description = 'Taxe Bitcoin în România (2025): ce impozite plătești, cum declari câștigurile și bune practici pentru evidență fiscală.';
          }
      }
      // Trim la ~155 caractere
      $md_trim = function($text){
          $text = trim(preg_replace('/\s+/', ' ', $text));
          if (function_exists('mb_substr')) {
              return (mb_strlen($text) > 155) ? (mb_substr($text, 0, 152) . '…') : $text;
          }
          return (strlen($text) > 155) ? (substr($text, 0, 152) . '…') : $text;
      };
      $meta_description = $md_trim($meta_description);
      // Robots: noindex pentru căutare și 404; follow pe paginare
      $robots = 'index, follow';
      if (is_search() || is_404()) {
          $robots = 'noindex, follow';
      }
    ?>
    <meta name="description" content="<?php echo esc_attr($meta_description); ?>">
    <meta name="keywords" content="bitcoin romania, exchange bitcoin, cumpar bitcoin, vand bitcoin, platforma bitcoin, binance romania, coinbase romania, crypto romania">
    <meta name="author" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
    <meta name="robots" content="<?php echo esc_attr($robots); ?>">
    
    <!-- Open Graph pentru Social Media -->
    <meta property="og:title" content="<?php echo wp_get_document_title(); ?>">
    <meta property="og:description" content="<?php echo esc_attr($meta_description); ?>">
    <meta property="og:type" content="<?php echo is_single() ? 'article' : 'website'; ?>">
    <?php
      // Canonical URL robust
      $canonical = function_exists('wp_get_canonical_url') ? wp_get_canonical_url() : '';
      if (!$canonical) {
          if (is_singular()) {
              $canonical = get_permalink();
          } elseif (is_home() || is_front_page()) {
              $canonical = home_url('/');
          } else {
              // Fallback: URL curent fără parametri periculoși
              $canonical = home_url(add_query_arg(array(), remove_query_arg(array(), $_SERVER['REQUEST_URI'] ?? '/')));
          }
      }
      // OG/Twitter image – featured sau site icon/fallback
      $og_image = '';
      if (is_singular() && has_post_thumbnail()) {
          $og_image = get_the_post_thumbnail_url(null, 'full');
      }
      if (!$og_image) {
          if (function_exists('get_site_icon_url') && get_site_icon_url()) {
              $og_image = get_site_icon_url(512);
          } else {
              $og_image = get_template_directory_uri() . '/assets/favicon.png';
          }
      }
    ?>
    <meta property="og:url" content="<?php echo esc_url($canonical); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:locale" content="ro_RO">
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo wp_get_document_title(); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($meta_description); ?>">
    
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
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "<?php echo esc_js(get_bloginfo('name')); ?>",
            "url": "<?php echo esc_url(home_url('/')); ?>",
            "logo": "<?php echo esc_url(get_template_directory_uri() . '/assets/favicon.png'); ?>",
            "sameAs": [
                "https://t.me/bitcoinulro"
            ]
        }
        </script>
                <?php if (is_archive() || is_category() || is_tag()): ?>
                <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "BreadcrumbList",
                    "itemListElement": [
                        {"@type":"ListItem","position":1,"name":"Acasă","item":"<?php echo esc_url(home_url('/')); ?>"},
                        {"@type":"ListItem","position":2,"name":"<?php echo esc_js( single_term_title('', false) ?: post_type_archive_title('', false) ?: 'Arhivă' ); ?>","item":"<?php echo esc_url( $canonical ); ?>"}
                    ]
                }
                </script>
                <?php endif; ?>
                <?php if (is_single() || (is_page() && !is_front_page())): ?>
                <?php
                    $breadcrumbs = array();
                    $breadcrumbs[] = array('name' => 'Acasă', 'item' => home_url('/'));
                    if (is_single()) {
                        $cats = get_the_category();
                        if (!empty($cats)) {
                            // ia prima categorie
                            $cat = $cats[0];
                            $breadcrumbs[] = array('name' => $cat->name, 'item' => get_category_link($cat));
                        }
                        $breadcrumbs[] = array('name' => get_the_title(), 'item' => $canonical);
                    } else {
                        // pagini cu părinți
                        global $post;
                        $anc = array_reverse(get_post_ancestors($post));
                        foreach ($anc as $aid) {
                            $breadcrumbs[] = array('name' => get_the_title($aid), 'item' => get_permalink($aid));
                        }
                        $breadcrumbs[] = array('name' => get_the_title(), 'item' => $canonical);
                    }
                    $items = array();
                    foreach ($breadcrumbs as $i => $b) {
                        $items[] = '{"@type":"ListItem","position":' . ($i+1) . ',"name":' . json_encode($b['name']) . ',"item":' . json_encode($b['item']) . '}';
                    }
                ?>
                <script type="application/ld+json">
                {"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[<?php echo implode(',', $items); ?>]}
                </script>
                <?php endif; ?>
    
        <!-- Preconnect pentru optimizarea performanței -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://api.coingecko.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdn.simpleicons.org" crossorigin>
    <!-- DNS Prefetch pentru domenii afiliate externe -->
    <link rel="dns-prefetch" href="//accounts.binance.com">
    <link rel="dns-prefetch" href="//www.bybit.com">
    <link rel="dns-prefetch" href="//revolut.com">
    <?php $cdn_base = trim(get_theme_mod('bitcoinul_ro_cdn_base', '')); if ($cdn_base): ?>
    <link rel="preconnect" href="<?php echo esc_url($cdn_base); ?>" crossorigin>
    <?php endif; ?>
    <!-- Preload font CSS (Inter) – stylesheet is enqueued via functions.php -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
        <?php 
            // Preload local Inter variable font if present
            $local_woff2 = get_template_directory() . '/assets/fonts/inter/Inter-Variable.woff2';
            if (file_exists($local_woff2)) : ?>
                <link rel="preload" as="font" type="font/woff2" href="<?php echo esc_url(get_template_directory_uri() . '/assets/fonts/inter/Inter-Variable.woff2'); ?>" crossorigin>
        <?php endif; ?>
    
    <!-- Canonical URL pentru SEO -->
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">
    <!-- Hreflang (site în română) -->
    <link rel="alternate" hreflang="ro-RO" href="<?php echo esc_url($canonical); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo esc_url($canonical); ?>">
    
    <!-- Favicon și iconițe -->
    <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.svg">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/apple-touch-icon.png">
    
        <?php 
            // Meta Search Console (opțional) – setări în Customizer
            $gsc_ver = trim(get_theme_mod('bitcoinul_ro_gsc_verification', ''));
            if ($gsc_ver) echo '<meta name="google-site-verification" content="' . esc_attr($gsc_ver) . '">';
            $bing_ver = trim(get_theme_mod('bitcoinul_ro_bing_verification', ''));
            if ($bing_ver) echo '<meta name="msvalidate.01" content="' . esc_attr($bing_ver) . '">';
        ?>
    
    <?php wp_head(); ?>
    
    <!-- CSS personalizat pentru optimizări -->
    <style>
        /* Optimizări critice pentru viteza de încărcare */
        body { font-display: swap; }
        img { loading: lazy; height: auto; max-width: 100%; }
        
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
        /* Brand text next to logo */
        .site-logo { display: inline-flex; align-items: center; gap: .5rem; }
        .site-title { font-weight: 800; letter-spacing: .2px; color: #e5e7eb; line-height: 1; font-size: 1.1rem; }
        .site-title .tld { color: #f9a34d; }
        @media (min-width: 992px) { .site-title { font-size: 1.25rem; } }
        .updated-at{display:inline-block;margin:.25rem 0 .5rem;color:#6b7280;font-size:.9rem}
        /* Badge mic pentru secțiunile FAQ */
        .faq-badge{display:inline-flex;align-items:center;gap:.5rem;background:#111827;color:#fff;border-radius:999px;padding:.35rem .7rem;font-weight:700;font-size:.8rem}
        .faq-badge .emoji{font-size:1rem}
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<script>
// Safe no-op analytics helpers (avoid errors if GA is not configured)
window.trackEvent = window.trackEvent || function(){ try{ if(window.gtag){ gtag('event', arguments[0]||'event', {event_category: arguments[1]||'', event_label: arguments[2]||'', value: arguments[3]||0}); } }catch(e){} };
window.trackAffiliateClick = window.trackAffiliateClick || function(exchangeName, linkType){ try{ if(window.gtag){ gtag('event','affiliate_click',{event_category:'affiliate_marketing',event_label:(exchangeName||'')+'_'+(linkType||'')}); } }catch(e){} };
window.trackGuideEngagement = window.trackGuideEngagement || function(guideName, action){ try{ if(window.gtag){ gtag('event','guide_interaction',{event_category:'content_engagement',event_label:(guideName||'')+'_'+(action||'')}); } }catch(e){} };
// Ensure security attributes on external links opened in new tabs
document.addEventListener('DOMContentLoaded', function(){
    try {
        document.querySelectorAll('a[target="_blank"]').forEach(function(a){
            var rel = (a.getAttribute('rel')||'').toLowerCase().split(/\s+/).filter(Boolean);
            if (rel.indexOf('noopener') === -1) rel.push('noopener');
            if (rel.indexOf('noreferrer') === -1) rel.push('noreferrer');
            a.setAttribute('rel', rel.join(' '));
        });
        // Enforce sponsored + nofollow on known affiliate domains
        var affiliateDomains = [
            'accounts.binance.com',
            'www.bybit.com',
            'revolut.com'
        ];
        document.querySelectorAll('a[href]').forEach(function(a){
            try{
                var url = new URL(a.href, window.location.origin);
                if (affiliateDomains.indexOf(url.hostname) !== -1 || /ref=|aff/i.test(url.search) ) {
                    var rel = (a.getAttribute('rel')||'').toLowerCase().split(/\s+/).filter(Boolean);
                    if (rel.indexOf('nofollow') === -1) rel.push('nofollow');
                    if (rel.indexOf('sponsored') === -1) rel.push('sponsored');
                    if (rel.indexOf('noopener') === -1) rel.push('noopener');
                    if (rel.indexOf('noreferrer') === -1) rel.push('noreferrer');
                    a.setAttribute('rel', rel.join(' '));
                }
            }catch(e){}
        });
    } catch(e){}
});
</script>

<div id="page" class="site">
    
    <header class="site-header" role="banner">
        <div class="container">
            <div class="header-content">
                
                <!-- Logo și branding -->
                <div class="site-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" title="bitcoinul.ro - Acasă">
                        <span class="btc-symbol" aria-hidden="true">₿</span>
                        <span class="site-title" aria-label="bitcoinul.ro">bitcoinul<span class="tld">.ro</span></span>
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
                            echo '<li><a href="' . esc_url(home_url('/despre-noi/')) . '">Despre</a></li>';
                            echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
                            // CTA mutat din meniu pentru a păstra navigația curată în header
                            echo '</ul>';
                        }
                    ));
                    ?>
                </nav>

                <!-- Căutare vizibilă în header -->
                <form role="search" method="get" class="site-search" action="<?php echo esc_url(home_url('/')); ?>">
                    <label class="sr-only" for="s">Căutare</label>
                    <input type="search" id="s" class="search-field" placeholder="Caută ghiduri, exchange-uri…" value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" class="search-submit" aria-label="Caută">🔎</button>
                </form>
                
                <!-- Buton mobil pentru meniu -->
                <button class="mobile-menu-toggle" aria-controls="primary-menu" aria-expanded="false" style="display: none;" aria-label="Deschide meniul principal">
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

<style>
.site-search{display:flex;gap:.5rem;align-items:center;margin-left:1rem}
.site-search .search-field{background:#111827;color:#fff;border:1px solid rgba(255,255,255,.15);border-radius:8px;padding:.5rem .75rem;min-width:220px}
.site-search .search-submit{background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;border:none;border-radius:8px;padding:.5rem .75rem;font-weight:700;cursor:pointer}
@media (max-width:768px){.site-search{display:none}}
</style>

<!-- Cookie consent minimal (GDPR) -->
<style>
.cookie-consent{position:fixed;left:1rem;right:1rem;bottom:1rem;z-index:9999;background:#111827;color:#fff;padding:1rem 1.25rem;border-radius:12px;box-shadow:0 10px 25px rgba(0,0,0,.35);display:none}
.cookie-consent a{color:#f7931a;text-decoration:underline}
.cookie-actions{display:flex;gap:.5rem;margin-top:.75rem;flex-wrap:wrap}
.cookie-btn{background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;border:none;border-radius:10px;padding:.6rem 1rem;font-weight:700;cursor:pointer}
.cookie-btn.secondary{background:#374151}
</style>
<div id="cookie-consent" class="cookie-consent" role="dialog" aria-live="polite" aria-label="Consimțământ cookies">
    Folosim cookies pentru a îmbunătăți experiența și a analiza traficul. Poți citi detalii în <a href="<?php echo esc_url(home_url('/politica-confidentialitate/')); ?>">Politica de confidențialitate</a>.
    <div class="cookie-actions">
        <button class="cookie-btn" id="cookie-accept">Accept</button>
        <button class="cookie-btn secondary" id="cookie-later">Mai târziu</button>
    </div>
    <small style="opacity:.8;display:block;margin-top:.25rem">Poți modifica preferințele oricând din setările browserului.</small>
    </div>
<script>
(function(){
    const box=document.getElementById('cookie-consent');
    if(!box) return;
    const key='btc_cookie_consent_v1';
    const accepted=localStorage.getItem(key);
    if(!accepted){ box.style.display='block'; }
    const acceptBtn=document.getElementById('cookie-accept');
    const laterBtn=document.getElementById('cookie-later');
    function close(){ box.style.display='none'; }
    acceptBtn&&acceptBtn.addEventListener('click',function(){ localStorage.setItem(key,'1'); close(); });
    laterBtn&&laterBtn.addEventListener('click',close);
})();
</script>