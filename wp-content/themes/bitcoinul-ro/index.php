<?php
/**
 * Template principal pentru tema Bitcoinul.ro
 * Optimizat pentru affiliate marketing cu exchange-uri Bitcoin
 */

get_header(); ?>

<main class="site-content">
    
    <!-- Hero Banner cu imagine Bitcoin -->
    <section class="bitcoin-hero-banner">
        <div class="hero-background">
            <div class="container">
                <div class="hero-wrapper">
                    <div class="hero-image">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='bitcoinGrad' x1='0%25' y1='0%25' x2='100%25' y2='100%25'%3E%3Cstop offset='0%25' style='stop-color:%23f7931a;stop-opacity:1' /%3E%3Cstop offset='100%25' style='stop-color:%23ff6b00;stop-opacity:1' /%3E%3C/linearGradient%3E%3C/defs%3E%3Ccircle cx='100' cy='100' r='90' fill='url(%23bitcoinGrad)' stroke='%23fff' stroke-width='4'/%3E%3Ctext x='100' y='120' font-family='Arial,sans-serif' font-size='90' font-weight='bold' text-anchor='middle' fill='%23fff'%3E%E2%82%BF%3C/text%3E%3C/svg%3E"
                        alt="Bitcoin Logo România"
                        class="bitcoin-logo"
                        loading="eager" fetchpriority="high" sizes="(min-width:1024px) 400px, 50vw">
                    </div>
                    <div class="hero-text">
                        <p class="hero-main-kicker" aria-label="Bitcoin România">
                            <span class="gradient-text">Bitcoin România</span>
                        </p>
                        <p class="hero-description">
                            Platforma ta de încredere pentru investiții în Bitcoin. 
                            Descoperă cele mai sigure exchange-uri din România.
                        </p>
                        <div class="hero-stats">
                            <div class="stat">
                                <span class="stat-number">50+</span>
                                <span class="stat-label">Exchange-uri<br>verificate</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">24/7</span>
                                <span class="stat-label">Monitorizare<br>preț</span>
                            </div>
                            <div class="stat">
                                <span class="stat-number">100%</span>
                                <span class="stat-label">Ghiduri<br>gratuite</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Hero Section pentru conversii -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content fade-in-up">
                <h1 class="hero-title">
                    <span class="sr-only">Bitcoin România - </span>
                    Cele mai bune <span class="text-orange">exchange-uri Bitcoin</span> în România (2025)
                </h1>
                <p class="hero-subtitle">
                    Descoperă platformele de încredere pentru cumpărarea și vânzarea Bitcoin în România. 
                    Comparăm comisioanele, securitatea și ușurința de utilizare.
                </p>
                <a href="#exchange-uri-bitcoin" 
                   class="hero-cta"
                   onclick="trackEvent('cta_click', 'user_interaction', 'hero_see_exchanges'); return true;">
                    🚀 Vezi Toate Exchange-urile
                </a>
            </div>
        </div>
    </section>

    

    <!-- Widget Preț Bitcoin Live -->
    <section class="container">
        <div class="bitcoin-price-widget pulse" id="bitcoin-price">
            <div class="price-label">Prețul Bitcoin în timp real</div>
            <div class="price-display" id="btc-price">Încărcare...</div>
            <div class="price-change" id="price-change">Actualizare în curs...</div>
            <small>Sursa: CoinGecko API</small>
        </div>
    </section>

    <!-- Secțiunea Exchange-uri Bitcoin (Affiliate) -->
    <section class="exchanges-section" id="exchange-uri-bitcoin">
        <div class="container">
            <h2 class="section-title">
                Top Exchange-uri Bitcoin România 2025
            </h2>
            <p class="section-subtitle">
                Platformele recomandate pentru cumpărarea Bitcoin în România, 
                verificate pentru siguranță, comisioane mici și ușurință în utilizare.
            </p>

            <div class="exchanges-grid">
                
                <!-- Exchange 1 - Binance -->
                <div class="exchange-card fade-in-up">
                    <div class="exchange-badge">Recomandat #1</div>
                    <div class="exchange-header">
                        <div class="exchange-logo brand-binance">
                            <img src="https://cdn.simpleicons.org/binance/ffffff" alt="Binance logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous">
                        </div>
                        <h3 class="exchange-name">Binance România</h3>
                        <div class="exchange-rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <small>(4.8/5)</small>
                        </div>
                    </div>
                    <div class="exchange-content">
                        <ul class="exchange-features">
                            <li>Comision 0.1% - cel mai mic din România</li>
                            <li>Depunere gratuită prin card bancar</li>
                            <li>Retragere rapidă în RON</li>
                            <li>Aplicație mobilă premium</li>
                            <li>Suport clienți în română</li>
                            <li>Licență oficială în UE</li>
                        </ul>
                        <a href="https://accounts.binance.com/en/register?ref=21315882" target="_blank" class="exchange-cta" rel="nofollow sponsored noopener noreferrer">
                            Începe pe Binance →
                        </a>
                    </div>
                </div>

                <!-- Exchange 2 - Bybit -->
                <div class="exchange-card fade-in-up">
                    <div class="exchange-badge">Derivate</div>
                    <div class="exchange-header">
                        <div class="exchange-logo brand-bybit" style="background: linear-gradient(135deg, #fff7ed, #f3f4f6);">
                            <img src="<?= get_stylesheet_directory_uri(); ?>/assets/img/bybit-logo.svg"
                                 alt="Bybit logo"
                                 loading="lazy"
                                 onerror="this.onerror=null; this.src='<?= get_stylesheet_directory_uri(); ?>/assets/img/exchange-placeholder.svg';">
                        </div>
                        <h3 class="exchange-name">Bybit</h3>
                        <div class="exchange-rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">☆</span>
                            <small>(4.3/5)</small>
                        </div>
                    </div>
                    <div class="exchange-content">
                        <ul class="exchange-features">
                            <li>Comisioane 0.1% pe spot</li>
                            <li>Futures și derivate pentru traderi</li>
                            <li>Lichiditate ridicată</li>
                            <li>Execuție rapidă a ordinelor</li>
                            <li>Aplicație mobilă performantă</li>
                            <li>Promoții și bonusuri periodice</li>
                        </ul>
                        <a href="https://www.bybit.com/en/invite/?ref=ZW6OLQ" target="_blank" class="exchange-cta" rel="nofollow sponsored noopener noreferrer">
                            Începe pe Bybit →
                        </a>
                    </div>
                </div>

                <!-- Exchange 3 - Revolut -->
                <div class="exchange-card fade-in-up">
                    <div class="exchange-badge">Cumpărare rapidă</div>
                    <div class="exchange-header">
                        <div class="exchange-logo brand-revolut">
                            <img src="https://cdn.simpleicons.org/revolut/ffffff" alt="Revolut logo" loading="lazy" referrerpolicy="no-referrer" crossorigin="anonymous">
                        </div>
                        <h3 class="exchange-name">Revolut</h3>
                        <div class="exchange-rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">☆</span>
                            <small>(3.8/5)</small>
                        </div>
                    </div>
                    <div class="exchange-content">
                        <ul class="exchange-features">
                            <li>Cumpărare instantă în aplicație</li>
                            <li>Depuneri rapide cu card bancar</li>
                            <li>IBAN european și transferuri SEPA</li>
                            <li>Interfață simplă pentru începători</li>
                            <li>Card fizic și virtual</li>
                            <li>Schimb valutar rapid</li>
                        </ul>
                        <a href="https://revolut.com/referral/?referral-code=cataliuiy!SEP1-25-AR-H3&amp;geo-redirect" target="_blank" class="exchange-cta" rel="nofollow sponsored noopener noreferrer">
                            Începe pe Revolut →
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Conținut SEO pe homepage (500-800 cuvinte) -->
    <section class="home-longform" aria-label="Despre Bitcoinul.ro și cum te ajutăm">
        <div class="container">
            <div class="home-longform__card">
                <div class="home-longform__badge">Ghid rapid 2025</div>
                <h2 class="home-longform__title">Bitcoin în România: ghid rapid pentru începători (2025)</h2>
                <div class="home-longform__grid">
                    <div class="home-longform__col">
                        <p>
                            Bitcoinul.ro este un proiect educațional în limba română dedicat investițiilor responsabile în Bitcoin. Scopul nostru este să te ajutăm să iei decizii informate: comparăm <a href="/exchange-uri/">exchange-urile din România</a>, explicăm comisioane, metode de depunere și retragere în RON, și publicăm ghiduri practice pentru securitate, fiscalitate și strategii de acumulare pe termen lung (DCA).
                        </p>
                        <h3>Ce oferă site-ul</h3>
                        <ul class="home-longform__list home-longform__list--check">
                            <li>Comparații detaliate între platforme populare (Binance, Bybit, Revolut) cu accent pe costuri și siguranță.</li>
                            <li>Ghiduri pentru începători: de la <a href="/cum-sa-cumperi-bitcoin-in-romania/">cum cumperi Bitcoin în România</a> până la <a href="/securitate-portofele-si-custodie/">portofele și auto-custodie</a>.</li>
                            <li>Informații fiscale: <a href="/fiscalitate-declarare-castiguri-crypto/">cum declari câștigurile crypto</a> și bune practici pentru evidență.</li>
                        </ul>
                    </div>
                    <div class="home-longform__col">
                        <h3>Recomandări de bune practici</h3>
                        <ol class="home-longform__list home-longform__list--ordered">
                            <li>Începe cu sume mici și folosește DCA pentru a reduce impactul volatilității.</li>
                            <li>Activează 2FA pe contul de exchange și mută BTC în portofelul tău când ești pregătit.</li>
                            <li>Notează-ți seed phrase-ul offline și nu îl partaja niciodată cu nimeni.</li>
                        </ol>
                        <p class="home-longform__links">
                            Pentru detalii complete, vezi <a href="/ghid-bitcoin-incepatori/">Ghidul Bitcoin pentru începători</a> și <a href="/strategii-de-investitii-in-bitcoin/">strategiile de investiții</a>. Dacă vrei să te documentezi rapid, mergi la secțiunea <a href="#exchange-uri-bitcoin">Exchange-uri recomandate</a> sau urmărește <a href="/stiri/">Știrile Bitcoin</a> pentru noutăți relevante.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stiluri pentru home-longform (scoped) -->
    <style>
    .home-longform{padding:3rem 0; background: var(--light-bg, #f6f7fb)}
    .home-longform__card{position:relative;background:#fff;border:1px solid var(--border-light, #e5e7eb);border-radius:16px;padding:clamp(1.25rem,1.8vw,2rem);box-shadow:0 12px 30px rgba(17,24,39,.08)}
    .home-longform__badge{position:absolute;top:-12px;left:1rem;background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;padding:.35rem .75rem;border-radius:999px;font-weight:800;font-size:.8rem;letter-spacing:.2px;box-shadow:0 8px 18px rgba(247,147,26,.35)}
    .home-longform__title{margin:.25rem 0 1rem;color:var(--text-primary,#111827);font-size:clamp(1.35rem,2.2vw,1.9rem);font-weight:800;line-height:1.2}
    .home-longform__grid{display:grid;grid-template-columns:1fr;gap:1.25rem}
    @media(min-width:900px){.home-longform__grid{grid-template-columns:1fr 1fr;gap:2rem}}
    .home-longform p{color:var(--text-primary,#111827);line-height:1.75;margin:0 0 1rem}
    .home-longform h3{color:var(--text-primary,#111827);font-size:1.15rem;margin:1rem 0 .5rem}
    .home-longform__list{list-style:none;margin:0 0 1.25rem;padding:0}
    .home-longform__list--check li{position:relative;padding-left:1.75rem;margin:.55rem 0;color:var(--text-primary,#111827)}
    .home-longform__list--check li:before{content:'✓';position:absolute;left:0;top:.1rem;width:1.15rem;height:1.15rem;border-radius:6px;display:inline-grid;place-items:center;background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;font-size:.8rem;box-shadow:0 4px 12px rgba(247,147,26,.35)}
    .home-longform__list--ordered{counter-reset:step}
    .home-longform__list--ordered li{counter-increment:step;position:relative;padding-left:2rem;margin:.65rem 0;color:var(--text-primary,#111827)}
    .home-longform__list--ordered li:before{content:counter(step);position:absolute;left:0;top:0;width:1.4rem;height:1.4rem;border-radius:999px;background:#111827;color:#fff;display:inline-grid;place-items:center;font-weight:800;font-size:.85rem}
    .home-longform a{color:var(--bitcoin-orange,#f7931a);font-weight:600;text-decoration:none;border-bottom:1px dashed rgba(247,147,26,.5)}
    .home-longform a:hover{border-bottom-color:transparent}
    </style>

    <!-- Secțiunea Articole Blog -->
    <section class="blog-section bg-light">
        <div class="container">
            <h2 class="section-title">
                Ultimele Știri Bitcoin România
            </h2>
            <p class="section-subtitle">
                Rămâi informat cu cele mai importante evenimente din lumea Bitcoin și criptomonedelor în România
            </p>

            <?php if (have_posts()) : ?>
                <div class="articles-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="article-card fade-in-up">
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="article-thumbnail">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="article-content">
                                
                                <?php 
                                $categories = get_the_category();
                                if ($categories) : ?>
                                    <span class="article-category">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <h3 class="article-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <div class="article-meta">
                                    <time datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date('j F Y'); ?>
                                    </time>
                                    • de <strong><?php the_author(); ?></strong>
                                </div>
                                
                                <div class="article-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="read-more" title="Citește: <?php the_title_attribute(); ?>">
                                    Citește mai mult →
                                </a>
                                
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Paginare -->
                <div class="pagination-container text-center mt-2">
                    <?php
                    the_posts_pagination(array(
                        'prev_text' => '← Anterior',
                        'next_text' => 'Următor →',
                        'before_page_number' => '<span class="sr-only">Pagina </span>',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <div class="text-center">
                    <h3>Niciun articol găsit</h3>
                    <p>Ne cerem scuze, nu am găsit articole pentru această pagină.</p>
                </div>
            <?php endif; ?>

        </div>
    </section>

</main>

<!-- Newsletter signup (placeholder; connect to service later) at bottom -->
<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-card">
            <div class="nl-left">
                <h2>Abonează-te la newsletter</h2>
                <p>Primește ghiduri practice și știri Bitcoin în limba română. Zero spam.</p>
            </div>
            <form class="nl-form" action="#" method="post" onsubmit="trackEvent('newsletter_submit','engagement','home');">
                <label class="sr-only" for="nl-email">Email</label>
                <input id="nl-email" type="email" name="email" placeholder="email@exemplu.ro" required>
                <button type="submit">Mă abonez</button>
                <small>Prin abonare accepți <a href="/politica-confidentialitate/">Politica de confidențialitate</a>.</small>
            </form>
        </div>
    </div>
    <style>
    .newsletter-section{padding:3rem 0}
    .newsletter-card{display:flex;flex-wrap:wrap;gap:1rem;align-items:center;justify-content:space-between;background:#111827;color:#fff;border-radius:16px;padding:1.25rem 1.5rem}
    .newsletter-card h2{margin:.25rem 0 .25rem;font-size:1.4rem}
    .newsletter-card p{margin:0;opacity:.9}
    .nl-form{display:flex;gap:.5rem;align-items:center;flex-wrap:wrap}
    .nl-form input{background:#0b1220;color:#fff;border:1px solid rgba(255,255,255,.15);border-radius:10px;padding:.6rem .8rem;min-width:240px}
    .nl-form button{background:linear-gradient(135deg,#f7931a,#ff6b00);color:#fff;border:none;border-radius:10px;padding:.65rem 1rem;font-weight:700;cursor:pointer}
    .nl-form small{display:block;opacity:.75}
    </style>
</section>

<!-- Script pentru prețul Bitcoin live -->
<script>
async function updateBitcoinPrice() {
    try {
        const response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd,eur,ron&include_24hr_change=true');
        const data = await response.json();
        
        if (data.bitcoin) {
            const btcData = data.bitcoin;
            const priceUSD = btcData.usd;
            const priceEUR = btcData.eur;
            const change24h = btcData.usd_24h_change;
            
            // Actualizează prețul
            document.getElementById('btc-price').innerHTML = `
                $${priceUSD.toLocaleString('en-US')} USD<br>
                <small>€${priceEUR.toLocaleString('de-DE')} EUR</small>
            `;
            
            // Actualizează schimbarea
            const changeElement = document.getElementById('price-change');
            const changeText = change24h > 0 ? '+' : '';
            changeElement.innerHTML = `${changeText}${change24h.toFixed(2)}% (24h)`;
            changeElement.className = `price-change ${change24h > 0 ? 'positive' : 'negative'}`;
        }
    } catch (error) {
        console.log('Eroare la încărcarea prețului Bitcoin:', error);
        document.getElementById('btc-price').innerHTML = 'Indisponibil momentan';
        document.getElementById('price-change').innerHTML = 'Reîncearcă mai târziu';
    }
}

// Actualizează prețul la încărcarea paginii
// Întârziem ușor execuția pentru a nu afecta LCP
if ('requestIdleCallback' in window) {
    requestIdleCallback(() => {
        document.addEventListener('DOMContentLoaded', updateBitcoinPrice);
    }, {timeout: 2000});
} else {
    setTimeout(() => document.addEventListener('DOMContentLoaded', updateBitcoinPrice), 1500);
}

// Actualizează prețul la fiecare 30 de secunde
setInterval(updateBitcoinPrice, 30000);

// Animații smooth scroll pentru linkurile interne
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Animații pe scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in-up');
        }
    });
}, observerOptions);

document.querySelectorAll('.exchange-card, .article-card').forEach(card => {
    observer.observe(card);
});
</script>

<?php get_footer(); ?>