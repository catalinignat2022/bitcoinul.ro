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
                        <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='bitcoinGrad' x1='0%25' y1='0%25' x2='100%25' y2='100%25'%3E%3Cstop offset='0%25' style='stop-color:%23f7931a;stop-opacity:1' /%3E%3Cstop offset='100%25' style='stop-color:%23ff6b00;stop-opacity:1' /%3E%3C/linearGradient%3E%3C/defs%3E%3Ccircle cx='100' cy='100' r='90' fill='url(%23bitcoinGrad)' stroke='%23fff' stroke-width='4'/%3E%3Ctext x='100' y='120' font-family='Arial,sans-serif' font-size='90' font-weight='bold' text-anchor='middle' fill='%23fff'%3E₿%3C/text%3E%3C/svg%3E" 
                             alt="Bitcoin Logo România" 
                             class="bitcoin-logo"
                             loading="eager">
                    </div>
                    <div class="hero-text">
                        <h1 class="hero-main-title">
                            <span class="gradient-text">Bitcoin România</span>
                        </h1>
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
                    Cele mai bune <span class="text-orange">Exchange-uri Bitcoin</span> din România
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
                        <div class="exchange-logo">B</div>
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
                        <a href="#binance-affiliate" class="exchange-cta" rel="nofollow sponsored">
                            Începe pe Binance →
                        </a>
                    </div>
                </div>

                <!-- Exchange 2 - Coinbase -->
                <div class="exchange-card fade-in-up">
                    <div class="exchange-badge">Cel mai sigur</div>
                    <div class="exchange-header">
                        <div class="exchange-logo">C</div>
                        <h3 class="exchange-name">Coinbase Pro</h3>
                        <div class="exchange-rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <small>(4.6/5)</small>
                        </div>
                    </div>
                    <div class="exchange-content">
                        <ul class="exchange-features">
                            <li>Cea mai mare siguranță din lume</li>
                            <li>Reglementat în SUA și Europa</li>
                            <li>Interfață perfectă pentru începători</li>
                            <li>Asigurare fonduri până la $250,000</li>
                            <li>Card de debit Bitcoin gratuit</li>
                            <li>Câștigă 4% APY pe staking</li>
                        </ul>
                        <a href="#coinbase-affiliate" class="exchange-cta" rel="nofollow sponsored">
                            Încearcă Coinbase →
                        </a>
                    </div>
                </div>

                <!-- Exchange 3 - eToro -->
                <div class="exchange-card fade-in-up">
                    <div class="exchange-badge">Social Trading</div>
                    <div class="exchange-header">
                        <div class="exchange-logo">e</div>
                        <h3 class="exchange-name">eToro România</h3>
                        <div class="exchange-rating">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">☆</span>
                            <small>(4.2/5)</small>
                        </div>
                    </div>
                    <div class="exchange-content">
                        <ul class="exchange-features">
                            <li>Copy Trading - copiază traderii profesioniști</li>
                            <li>Platformă reglementată CySEC</li>
                            <li>Depunere minimă doar 50$</li>
                            <li>Fără comisioane la cumpărarea Bitcoin</li>
                            <li>Portofoliu diversificat crypto</li>
                            <li>Comunitate activă de traderi</li>
                        </ul>
                        <a href="#etoro-affiliate" class="exchange-cta" rel="nofollow sponsored">
                            Descoperă eToro →
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

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
document.addEventListener('DOMContentLoaded', updateBitcoinPrice);

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